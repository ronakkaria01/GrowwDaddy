#!/usr/bin/env python3
"""Send one outreach email per minute via Hostinger SMTP.

Dry run (prints what it would send, changes nothing):
    python3 send.py
Test send (one email, to you, nothing marked sent):
    python3 send.py --test you@gmail.com
Really send:
    python3 send.py --send

Credentials come from send.smtp.php (gitignored) sitting next to this file.

Marks "sent": true in edtech-prospects.json after each successful send.
"""
import imaplib, json, re, smtplib, ssl, sys, time
from email.message import EmailMessage
from email.utils import formatdate, make_msgid
from pathlib import Path

DATA = Path(__file__).with_name("edtech-prospects.json")
CONF = Path(__file__).with_name("send.smtp.php")
DELAY = 60


def sent_folder(imap):
    """Hostinger names it INBOX.Sent; other hosts just Sent. Ask, don't guess."""
    for line in imap.list()[1]:
        m = re.match(r'\(([^)]*)\) "?[^" ]*"? (.+)$', line.decode().rstrip())
        if not m:
            continue
        flags, name = m.group(1), m.group(2).strip().strip('"')
        if r'\Sent' in flags or name.split(".")[-1] == "Sent":
            return name
    return "INBOX.Sent"


def _selftest():
    """python3 send.py --selftest — folder detection is the only tricky bit."""
    class Fake:
        def __init__(self, lines): self.lines = [l.encode() for l in lines]
        def list(self): return "OK", self.lines
    assert sent_folder(Fake([r'(\HasNoChildren \Sent) "." "INBOX.Sent"'])) == "INBOX.Sent"
    assert sent_folder(Fake(['(\\HasNoChildren) "/" "Sent"'])) == "Sent"
    assert sent_folder(Fake(['(\\HasNoChildren) "/" "INBOX"'])) == "INBOX.Sent"
    # Hostinger returns the name unquoted
    assert sent_folder(Fake([r'(\HasNoChildren \Sent) "." INBOX.Sent'])) == "INBOX.Sent"
    assert sent_folder(Fake([r'(\HasNoChildren) "." INBOX.Sent'])) == "INBOX.Sent"
    print("selftest ok")


def load_conf():
    """Read the flat 'key' => 'value' pairs out of send.smtp.php.
    ponytail: regex, not a PHP parser — we author the file, it stays flat."""
    if not CONF.exists():
        sys.exit(f"missing {CONF.name} — copy the shape from the site's smtp.php")
    pairs = re.findall(r'"(\w+)"\s*=>\s*(?:"([^"]*)"|(\d+))', CONF.read_text())
    return {k: (v or n) for k, v, n in pairs}

live = "--send" in sys.argv
test_to = sys.argv[sys.argv.index("--test") + 1] if "--test" in sys.argv else None
if test_to:
    live = True  # a test really sends, just only to you

conf = load_conf() if live else {}

if "--selftest" in sys.argv:
    _selftest()
    sys.exit()

data = json.loads(DATA.read_text())
pending = [c for c in data["companies"] if not c.get("sent") and c.get("email")]
if not pending:
    sys.exit("nothing pending")
if test_to:
    pending = pending[:1]
    print(f"TEST: sending {pending[0]['name']}'s email to {test_to} only, nothing will be marked sent")
else:
    print(f"{len(pending)} pending, {'SENDING' if live else 'DRY RUN'}")

def connect():
    """Fresh connections per email — Hostinger times the socket out during the
    60s gap, so holding one open across sends fails with a 421."""
    port = int(conf.get("port", 465))
    if conf.get("encryption") == "tls":
        smtp = smtplib.SMTP(conf["host"], port, timeout=30)
        smtp.starttls(context=ssl.create_default_context())
    else:
        smtp = smtplib.SMTP_SSL(conf["host"], port, timeout=30,
                                context=ssl.create_default_context())
    smtp.login(conf["username"], conf["password"])
    imap = imaplib.IMAP4_SSL(conf.get("imap_host", "imap.hostinger.com"), 993)
    imap.login(conf["username"], conf["password"])
    return smtp, imap


for i, c in enumerate(pending):
    msg = EmailMessage()
    msg["From"] = f'{conf.get("from_name", "Shraddha")} <{conf.get("from", "Shraddha@growwdaddy.com")}>' if live else "dry-run"
    msg["To"] = test_to or c["email"]
    msg["Subject"] = c["subject"]
    msg.set_content(c["body"])
    msg["Date"] = formatdate(localtime=True)
    msg["Message-ID"] = make_msgid(domain="growwdaddy.com")
    if live:
        smtp, imap = connect()
        try:
            smtp.send_message(msg)
            # SMTP alone never fills Sent — IMAP has to file the copy itself
            imap.append(f'"{sent_folder(imap)}"', "\\Seen",
                        imaplib.Time2Internaldate(time.time()), msg.as_bytes())
        finally:
            smtp.quit()
            imap.logout()
    if live and not test_to:
        c["sent"] = True
        # write after every send so a crash never re-sends
        DATA.write_text(json.dumps(data, indent=2, ensure_ascii=False) + "\n")
    print(f"[{i+1}/{len(pending)}] {'sent' if live else 'would send'} -> {msg['To']}  {c['subject']}")
    if i < len(pending) - 1:
        time.sleep(DELAY if live else 0)
