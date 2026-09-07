#!/usr/bin/env python3
"""Find Reddit threads worth citing in an outreach email.

    python3 outreach/research.py                 # every company still missing a draft
    python3 outreach/research.py scaler          # just one, by name
    python3 outreach/research.py newton masai    # a few, by name
    python3 outreach/research.py scaler --force  # redo one that is already done

Companies that already have a draft are skipped, so it picks up where it left
off if you stop it or it dies. Takes roughly 8 minutes per company: the API is
free, slow, and rate limits hard.

Writes a brief per company to outreach/research/<slug>.md and a filled-in
Version B draft to outreach/drafts/<slug>.txt.

Data comes from Arctic Shift (the public Pushshift successor). Reddit's own
API needs credentials and every unauthenticated route is blocked, so this is
what's available. Two consequences worth knowing:

  ponytail: the index lags a few days and comment counts are as-of-crawl, not
  live. Good enough to FIND threads, not to quote numbers from. Open the
  permalink before you send anything.

  ponytail: free-text search must be scoped to a subreddit, so coverage is only
  as good as SUBREDDITS below. Add to it when you learn a new one.
"""
import hashlib, json, re, subprocess, sys, time, pathlib, datetime, urllib.parse

API = "https://arctic-shift.photon-reddit.com/api"
HERE = pathlib.Path(__file__).parent
MONTHS_BACK = 18
PER_COMPANY = 5
PACE = 3           # gap after a successful request
TRIES = 6          # its "Timeout, slow down" is a server-side query timeout,
                   # not a ban. It fails in <1s and usually serves the retry.

# Where edtech buyers actually argue. Not used in any email, only for searching.
# Split by market so we run half the queries. Arctic Shift is slow and free,
# every query we don't send is 15 seconds we don't wait.
SUBREDDIT_SETS = {
    "india": ["developersIndia", "india", "IndianWorkplace", "Indian_Academia",
              "btechtards", "gradadmissions"],
    "us":    ["cscareerquestions", "leetcode", "ExperiencedDevs",
              "csMajors", "developersIndia"],
}

# A title worth citing sounds like someone about to spend money.
INTENT = re.compile(
    r"\b(worth it|worth the|vs\.?|versus|review|reviews|scam|refund|"
    r"should i|is it good|any good|experience|placement|fees?|honest|"
    r"thoughts on|alternative|better than|regret)\b", re.I)


CACHE = HERE / ".cache"


def api(path, **params):
    """Arctic Shift over curl. urllib gets 422 from it, curl doesn't.

    Responses are cached to disk forever: this data is historical, and a rerun
    while you tweak the scoring shouldn't hammer somebody's free service.
    """
    url = f"{API}/{path}?" + urllib.parse.urlencode(params)
    label = params.get("subreddit") and f'r/{params["subreddit"]} "{params.get("query", "")}"'
    label = label or f'comments of {params.get("link_id", "")}'
    CACHE.mkdir(exist_ok=True)
    cached = CACHE / (hashlib.md5(url.encode()).hexdigest() + ".json")
    if cached.exists():
        data = json.loads(cached.read_text())
        print(f"      {label:44} cached      {len(data)} results")
        return data

    for attempt in range(TRIES):
        print(f"      {label:44} GET", end=" ", flush=True)
        started = time.time()
        out = subprocess.run(
            ["curl", "-s", "-m", "120", "-w", "\n%{http_code}",
             "-H", "User-Agent: growwdaddy-research/0.1", url],
            capture_output=True, text=True)
        body, _, status = out.stdout.rpartition("\n")
        took = time.time() - started
        try:
            payload = json.loads(body)
            data = payload.get("data")
            if data is not None:
                print(f"{status} {took:5.1f}s  {len(data)} results")
                cached.write_text(json.dumps(data))
                time.sleep(PACE)
                return data
            error = payload.get("error") or "unknown error"
            # Both of its throttle messages mean the same thing: wait longer.
            wait = 5 * (attempt + 1)
            print(f"{status} {took:5.1f}s  {error} -> retry in {wait}s")
            time.sleep(wait)
            continue
        except json.JSONDecodeError:
            print(f"{status} {took:5.1f}s  unparseable: {body[:60]!r}")
            time.sleep(5 * (attempt + 1))
    print(f"      {label:44} GAVE UP after {TRIES} attempts")
    return []


def score(post, aliases):
    """Higher is a better thread to put in an email.

    The brand being the SUBJECT beats everything. An earlier version weighted
    comment count too heavily and ranked a 45-comment thread about TCS above a
    7-comment thread titled "Should I join <brand>", which is the exact thread
    you want to send someone.
    """
    title = (post.get("title") or "").lower()
    body = (post.get("selftext") or "").lower()
    comments = post.get("num_comments") or 0
    age_days = (time.time() - (post.get("created_utc") or 0)) / 86400
    named = [a.lower() for a in aliases]

    if any(a in title for a in named):
        s = 120                                   # they are what the thread is about
    elif any(a in body for a in named):
        s = 30                                    # mentioned in passing
    else:
        s = 0                                     # matched on a comment somewhere

    if INTENT.search(title):
        s += 40                                   # someone is deciding
    s += min(comments, 40)                        # capped: volume is a tiebreak
    if comments == 0:
        s -= 30                                   # nothing to be absent from
    if age_days < 120:
        s += 20
    elif age_days < 365:
        s += 10
    if post.get("removed_by_category") or body in ("[removed]", "[deleted]"):
        s -= 200
    return s


def find(company):
    aliases = company.get("reddit_queries") or [company["name"]]
    subs = SUBREDDIT_SETS["us" if "USA" in company.get("hq", "") else "india"]
    print(f"    searching {len(subs)} subreddits for {aliases}")
    # Rounded to midnight: an `after` built from time.time() changes every
    # second, so every URL looked new and the cache never hit once.
    today = datetime.date.today()
    after = int(time.mktime((today - datetime.timedelta(days=MONTHS_BACK * 30)).timetuple()))
    jobs = [(sub, alias) for sub in subs for alias in aliases]
    # ponytail: strictly serial with a 2s gap. Four workers tripped the API's
    # global rate limit within seconds and every search came back empty.
    batches = [api("posts/search", subreddit=sub, query=alias,
                   limit=25, sort="desc", after=after) for sub, alias in jobs]
    seen, hits = set(), []
    for batch in batches:
        for post in batch:
            if post["id"] in seen:
                continue
            seen.add(post["id"])
            hits.append(post)
    hits.sort(key=lambda p: score(p, aliases), reverse=True)
    return hits[:PER_COMPANY]


def enrich(post):
    """Top comment, and who is talking. Empty is normal on a stale index."""
    comments = api("comments/search", link_id=post["id"], limit=50)
    comments.sort(key=lambda c: c.get("score") or 0, reverse=True)
    return {
        "authors": sorted({c.get("author") for c in comments if c.get("author")}),
        "top": comments[0]["body"].strip() if comments else "",
    }


DRAFT = """To: {email}
Subject: {name} on Reddit

THREAD PICKED: "{title}"
{permalink}
r/{subreddit}, {when}, {n_comments} comments (as of the last crawl, check it)

Rewrite the first line below to match what that thread is ACTUALLY about, then
delete these four lines. The script does not know what the thread says.
--------------------------------------------------------------------------------

Found a thread from {when} where someone was [WHAT WERE THEY ACTUALLY DOING]. {n_comments} people replied. None of them were you.

[ONE LINE ON WHAT THE TOP COMMENT SAID.]

That thread is still up, it ranks on Google, and it's what the next person reads before they decide. There are {others} more like it from the last few months.

I'm Shraddha from GrowwDaddy. We only do Reddit, that's the whole business. What we do is get real people into those conversations for you. Proper accounts with history, actual reviews and case studies from people who've been through your programme.

No fake students. That gets a brand banned sitewide and it's not worth it for anyone.

Give me 20 mins and we'll show you how we work and what we'd do on your threads. Or say the word and I'll just send the threads over, no call needed.

Shraddha
Outreach Lead, GrowwDaddy
growwdaddy.com

{permalink}
"""


def main():
    prospects = json.loads((HERE / "edtech-prospects.json").read_text())["companies"]
    args = [a for a in sys.argv[1:] if not a.startswith("-")]
    force = "--force" in sys.argv
    if args:
        prospects = [c for c in prospects
                     if any(a.lower() in c["name"].lower() for a in args)]
        if not prospects:
            sys.exit(f"no company matching {args}")

    (HERE / "research").mkdir(exist_ok=True)
    (HERE / "drafts").mkdir(exist_ok=True)

    for company in prospects:
        slug = re.sub(r"\W+", "-", company["name"].lower()).strip("-")
        # Resume: a company with a draft is done. Rerun it with --force.
        if (HERE / "drafts" / f"{slug}.txt").exists() and not force:
            print(f"==> {company['name']}: already done, skipping")
            continue
        print(f"==> {company['name']}")
        posts = find(company)
        if not posts:
            print("    nothing usable, send Version A")
            continue

        lines = [f"# {company['name']} on Reddit",
                 f"_{datetime.date.today()}. Index lags, open every link before quoting it._\n"]
        for post in posts:
            extra = enrich(post)
            when = datetime.date.fromtimestamp(post["created_utc"])
            lines += [
                f"## {post['title']}",
                f"- https://reddit.com{post['permalink']}",
                f"- r/{post['subreddit']}, {when}, {post.get('num_comments', 0)} comments, score {post.get('score', 0)}",
                f"- commenters: {', '.join(extra['authors'][:12]) or 'not indexed'}",
                f"- top comment: {extra['top'][:400].replace(chr(10), ' ') or 'not indexed'}\n",
            ]
        (HERE / "research" / f"{slug}.md").write_text("\n".join(lines))

        best, when = posts[0], datetime.date.fromtimestamp(posts[0]["created_utc"])
        (HERE / "drafts" / f"{slug}.txt").write_text(DRAFT.format(
            email=company["email"], name=company["name"],
            title=best["title"], subreddit=best["subreddit"],
            when=when.strftime("%d %B"),
            n_comments=best.get("num_comments", 0),
            others=len(posts) - 1,
            permalink=f"https://reddit.com{best['permalink']}"))
        print(f"    {len(posts)} threads -> research/{slug}.md, drafts/{slug}.txt")


if __name__ == "__main__":
    main()
