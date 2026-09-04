<?php
// GrowwDaddy — one-page site. No framework, no database.
$siteUrl = "https://growwdaddy.com";
$ctaUrl  = "#contact"; // swap for the Cal.com / Calendly link before launch
$email   = "hello@growwdaddy.com";
$year    = date("Y");

// ponytail: query-string cache bust instead of hashed filenames — no build step,
// works on every host. Move to output.<hash>.css only if a CDN ignores query strings.
$css    = __DIR__ . "/assets/output.css";
$cssVer = is_file($css) ? substr(md5_file($css), 0, 10) : $year;
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reddit marketing agency | GrowwDaddy</title>
<meta name="description" content="We get brands into the Reddit threads where people are already asking about what you sell. Subreddit research, account management, reputation work and lead campaigns.">
<meta name="author" content="GrowwDaddy">
<meta name="theme-color" content="#070709">
<link rel="canonical" href="<?php echo $siteUrl; ?>/">

<meta property="og:type" content="website">
<meta property="og:title" content="Reddit marketing agency | GrowwDaddy">
<meta property="og:description" content="We get brands into the Reddit threads where people are already asking about what you sell.">
<meta property="og:url" content="<?php echo $siteUrl; ?>/">
<meta property="og:image" content="<?php echo $siteUrl; ?>/assets/og-image.png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="GrowwDaddy">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Reddit marketing agency | GrowwDaddy">
<meta name="twitter:description" content="A small team that only does Reddit.">
<meta name="twitter:image" content="<?php echo $siteUrl; ?>/assets/og-image.png">

<link rel="icon" type="image/svg+xml" href="assets/favicon.svg">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/output.css?v=<?php echo $cssVer; ?>">
<script type="application/ld+json"><?php echo json_encode([
  "@context"    => "https://schema.org",
  "@type"       => "ProfessionalService",
  "name"        => "GrowwDaddy",
  "description" => "Reddit marketing agency. Subreddit research, account management, reputation work and lead campaigns.",
  "url"         => $siteUrl . "/",
  "image"       => $siteUrl . "/assets/og-image.png",
  "email"       => $email,
  "areaServed"  => "Worldwide",
  "knowsAbout"  => ["Reddit marketing", "Community marketing", "Online reputation management", "Subreddit strategy"],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?></script>
<noscript><style>.reveal{opacity:1;transform:none}</style></noscript>
</head>
<body class="bg-bg text-white font-sans antialiased overflow-x-hidden">
<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-3 focus:left-3 focus:z-[60] focus:rounded-full focus:bg-accent focus:px-4 focus:py-2 focus:text-sm focus:font-semibold focus:text-zinc-900">Skip to content</a>

<!-- Navigation -->
<header id="navbar" class="sticky top-0 z-50 border-b border-line bg-bg">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
 <div class="flex h-[64px] items-center justify-between">
 <a href="#" class="flex items-center gap-3">
 <div class="w-8 h-8 rounded-lg bg-white text-zinc-900 flex items-center justify-center font-display font-bold text-sm tracking-tight">GD</div>
 <span class="font-display font-semibold text-lg tracking-tight">GrowwDaddy</span>
 </a>

 <nav class="hidden md:flex items-center gap-8">
 <a href="#services" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">Services</a>
 <a href="#how-it-works" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">Process</a>
 <a href="#why-reddit" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">Why Reddit</a>
 <a href="#faq" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">FAQ</a>
 <a href="#contact" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">Contact</a>
 </nav>

 <div class="hidden md:flex items-center gap-3">
 <a href="<?php echo htmlspecialchars($ctaUrl); ?>" class="inline-flex items-center justify-center h-9 px-5 rounded-full bg-accent text-zinc-900 text-sm font-semibold hover:bg-accent-hover transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2 focus-visible:ring-offset-bg">
 Book a call
 </a>
 </div>

 <button id="menuBtn" aria-label="Toggle menu" aria-expanded="false" aria-controls="mobileMenu" class="md:hidden inline-flex items-center justify-center w-9 h-9 rounded-full border border-line bg-zinc-800 text-white">
 <svg id="menuIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
 <svg id="closeIcon" class="hidden" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 6l12 12M18 6L6 18"/></svg>
 </button>
 </div>
 </div>

 <!-- Mobile Menu -->
 <div id="mobileMenu" class="hidden md:hidden border-t border-line bg-bg">
 <div class="px-6 py-6 space-y-5">
 <nav class="flex flex-col gap-4">
 <a href="#services" class="mobile-link text-sm font-medium text-zinc-400 hover:text-white">Services</a>
 <a href="#how-it-works" class="mobile-link text-sm font-medium text-zinc-400 hover:text-white">Process</a>
 <a href="#why-reddit" class="mobile-link text-sm font-medium text-zinc-400 hover:text-white">Why Reddit</a>
 <a href="#faq" class="mobile-link text-sm font-medium text-zinc-400 hover:text-white">FAQ</a>
 <a href="#contact" class="mobile-link text-sm font-medium text-zinc-400 hover:text-white">Contact</a>
 </nav>
 <a href="<?php echo htmlspecialchars($ctaUrl); ?>" class="mobile-link flex items-center justify-center h-11 rounded-full bg-accent text-zinc-900 font-semibold text-sm hover:bg-accent-hover transition-colors">Book a call</a>
 <p class="text-center text-xs text-zinc-400"><?php echo htmlspecialchars($email); ?></p>
 </div>
 </div>
</header>

<main id="main">
<!-- Hero -->
<section class="relative overflow-hidden">
 <div aria-hidden="true" class="pointer-events-none absolute inset-0">
 <div class="absolute -top-[40%] left-1/2 -translate-x-1/2 w-[1100px] h-[700px] bg-[radial-gradient(ellipse_at_center,_rgba(185,255,102,0.07),_transparent_65%)]"></div>
 <div class="absolute inset-0 bg-[linear-gradient(to_bottom,_transparent,_rgba(7,7,9,1)_94%)]"></div>
 <div class="absolute inset-0 opacity-[0.015]" style="background-image:url('data:image/svg+xml,%3Csvg viewBox=\'0 0 256 256\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'noiseFilter\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.9\' numOctaves=\'4\' stitchTiles=\'stitch\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23noiseFilter)\'/%3E%3C/svg%3E')"></div>
 </div>

 <div class="relative max-w-[1440px] mx-auto px-6 lg:px-8 pt-20 sm:pt-24 lg:pt-32 pb-20 lg:pb-28">
 <div class="mx-auto max-w-[860px] text-center">
 <h1 class="font-display font-semibold tracking-[-0.035em] text-[34px] sm:text-5xl lg:text-[64px]">
 Reddit marketing that reads<br class="hidden sm:block">
 like a
 <span class="inline-block -rotate-2 rounded-xl bg-accent px-3 py-0.5 text-zinc-900">person</span>
 wrote it.
 </h1>

 <p class="mt-6 mx-auto max-w-[620px] text-base sm:text-lg leading-7 text-zinc-400">
 We get your brand into the subreddits where people are already asking what to buy, then answer them properly. Real accounts, real comments, no copy-paste pitches and no upvote rings.
 </p>

 <div class="mt-9 flex flex-col sm:flex-row gap-3 sm:justify-center">
 <a href="<?php echo htmlspecialchars($ctaUrl); ?>" class="inline-flex items-center justify-center h-[50px] px-7 rounded-full bg-accent text-zinc-900 font-semibold text-sm hover:bg-accent-hover transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2 focus-visible:ring-offset-bg">
 Book a strategy call
 <svg class="ml-2" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M6 3l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
 </a>
 <a href="#how-it-works" class="inline-flex items-center justify-center h-[50px] px-7 rounded-full border border-line bg-transparent text-white font-medium text-sm hover:bg-surface transition-colors">
 See how we work
 </a>
 </div>

 <div class="mt-9 flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-xs text-zinc-500">
 <span class="inline-flex items-center gap-2">
 <span class="w-1.5 h-1.5 rounded-full bg-accent"></span>
 Subreddit research, account management, reputation and lead campaigns
 </span>
 <span class="hidden sm:block w-px h-3 bg-line"></span>
 <span>If Reddit is wrong for you, we'll say so on the call</span>
 </div>
 </div>
 </div>
</section>

<!-- Problem -->
<section class="border-t border-line bg-surface">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-20 lg:py-28">
 <div class="max-w-3xl reveal">
 <p class="text-xs font-semibold tracking-[0.14em] uppercase text-accent">Where brands get it wrong</p>
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl">Reddit doesn't behave like<br><span class="text-zinc-400">the rest of your marketing.</span></h2>
 <p class="mt-4 text-base leading-7 text-zinc-400">Post the thing you'd happily put on LinkedIn and it gets downvoted in about four minutes. These communities can smell a campaign, and the moderators delete what feels like one.</p>
 </div>

 <div class="mt-10 grid md:grid-cols-3 gap-5 lg:gap-6">
 <div class="reveal rounded-[20px] bg-bg border border-line p-6 lg:p-7">
 <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
 </div>
 <h3 class="mt-5 font-semibold text-base">People spot a pitch instantly</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">A comment that reads like your landing page does more damage than saying nothing at all. And once a subreddit has decided you're a marketer, that follows the username around.</p>
 <p class="mt-4 text-xs font-medium text-accent">Trust first, everything else after</p>
 </div>

 <div class="reveal rounded-[20px] bg-bg border border-line p-6 lg:p-7" style="transition-delay: 80ms">
 <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
 </div>
 <h3 class="mt-5 font-semibold text-base">Every subreddit is its own room</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">r/SaaS will forgive a plug if the post is genuinely useful. r/smallbusiness will not. Same words, two completely different outcomes.</p>
 <p class="mt-4 text-xs font-medium text-accent">Read the room before you speak</p>
 </div>

 <div class="reveal rounded-[20px] bg-bg border border-line p-6 lg:p-7" style="transition-delay: 160ms">
 <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
 </div>
 <h3 class="mt-5 font-semibold text-base">Nobody buys from a stranger</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">You need a comment history before anyone cares what you sell. That's weeks of showing up, which is why a two-week campaign sprint gets you nowhere.</p>
 <p class="mt-4 text-xs font-medium text-accent">Slow start, long tail</p>
 </div>
 </div>

 <div class="reveal mt-6 rounded-[20px] bg-accent text-zinc-900 p-6 lg:p-8 flex flex-col lg:flex-row lg:items-center gap-6">
 <div class="flex-1">
 <div class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase"><span class="w-1.5 h-1.5 rounded-full bg-surface"></span> That's our job</div>
 <p class="mt-2 font-display font-semibold text-lg tracking-tight">We spend the week inside those communities so your name turns up in the threads worth being in.</p>
 <p class="mt-2 text-sm leading-6 text-zinc-800">And stays out of the ones where it would only annoy people.</p>
 </div>
 <a href="#services" class="inline-flex items-center justify-center h-11 px-6 rounded-full bg-zinc-900 text-white font-semibold text-sm shrink-0 hover:bg-zinc-800 transition-colors">See what we do</a>
 </div>
 </div>
</section>

<!-- Services -->
<section id="services" class="border-t border-line">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-20 lg:py-28">
 <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
 <div class="reveal">
 <p class="text-xs font-semibold tracking-[0.14em] uppercase text-zinc-400">Services</p>
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl">What we actually do</h2>
 </div>
 <p class="reveal max-w-[520px] text-sm leading-6 text-zinc-400">Four things. We don't run paid ads, we don't touch TikTok, and we're not going to pretend otherwise on a discovery call.</p>
 </div>

 <div class="mt-10 grid md:grid-cols-2 gap-5 lg:gap-6">
 <div class="reveal group rounded-[20px] bg-surface border border-line p-7 lg:p-8 hover:border-zinc-700 hover:bg-surface2 transition-colors">
 <div class="w-10 h-10 rounded-xl bg-accent flex items-center justify-center text-zinc-900">
 <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
 </div>
 <h3 class="mt-6 font-semibold text-lg tracking-tight">Account management</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">Profiles with a real comment history behind them, built up over months. Karma that came from being useful in threads, not from reposting other people's photos.</p>
 <p class="mt-5 text-xs font-medium text-zinc-500">Profiles, history, day-to-day activity</p>
 </div>

 <div class="reveal group rounded-[20px] bg-surface border border-line p-7 lg:p-8 hover:border-zinc-700 hover:bg-surface2 transition-colors" style="transition-delay:60ms">
 <div class="w-10 h-10 rounded-xl bg-zinc-900 text-white flex items-center justify-center border border-line">
 <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
 </div>
 <h3 class="mt-6 font-semibold text-lg tracking-tight">Community research and engagement</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">We work out which subreddits your buyers actually sit in, read the rules properly, then get into the conversations that are already happening there.</p>
 <p class="mt-5 text-xs font-medium text-zinc-500">Research, targeting, replies</p>
 </div>

 <div class="reveal group rounded-[20px] bg-surface border border-line p-7 lg:p-8 hover:border-zinc-700 hover:bg-surface2 transition-colors" style="transition-delay:120ms">
 <div class="w-10 h-10 rounded-xl bg-zinc-800 border border-line flex items-center justify-center text-white">
 <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
 </div>
 <h3 class="mt-6 font-semibold text-lg tracking-tight">Reputation and mentions</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">Every few weeks somebody asks whether your product is any good. We watch for it, make sure there's a fair answer in the thread, and deal with the old posts that keep coming up in search.</p>
 <p class="mt-5 text-xs font-medium text-zinc-500">Monitoring, responses, search cleanup</p>
 </div>

 <div class="reveal rounded-[20px] bg-accent text-zinc-900 p-7 lg:p-8 lg:ml-2" style="transition-delay:180ms">
 <div class="w-10 h-10 rounded-xl bg-surface text-white flex items-center justify-center">
 <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
 </div>
 <h3 class="mt-6 font-semibold text-lg tracking-tight">Lead campaigns</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-800">Posts and comments that send people to your site, then carry on sending them, because a good Reddit answer still ranks a year after it was written.</p>
 <p class="mt-5 text-xs font-semibold text-zinc-800">Traffic, enquiries, customers</p>
 </div>
 </div>
 </div>
</section>

<!-- How it works -->
<section id="how-it-works" class="border-t border-line bg-surface">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-20 lg:py-28">
 <div class="reveal max-w-2xl">
 <p class="text-xs font-semibold tracking-[0.14em] uppercase text-accent">Process</p>
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl">The same four steps, every client</h2>
 <p class="mt-3 text-sm leading-6 text-zinc-400">The research changes completely from one client to the next. The order never does.</p>
 </div>

 <div class="mt-12 relative">
 <div aria-hidden="true" class="hidden lg:block absolute top-[34px] left-[5%] right-[5%] h-px bg-gradient-to-r from-transparent via-line to-transparent"></div>

 <div class="grid lg:grid-cols-4 gap-6 lg:gap-5">
 <div class="reveal relative rounded-[20px] bg-bg border border-line p-6 lg:p-7">
 <div class="flex items-center gap-3">
 <div class="w-10 h-10 rounded-full bg-accent text-zinc-900 flex items-center justify-center font-display font-bold text-sm">01</div>
 <div class="h-px flex-1 bg-line lg:hidden"></div>
 </div>
 <h3 class="mt-5 font-semibold text-base">Read everything</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">Roughly two weeks of reading. Your product, your competitors, and every subreddit where your buyers turn up, including the rules we'd be breaking in each one.</p>
 <p class="mt-4 text-xs font-medium text-accent">Week one and two</p>
 </div>

 <div class="reveal relative rounded-[20px] bg-bg border border-line p-6 lg:p-7" style="transition-delay:80ms">
 <div class="flex items-center gap-3">
 <div class="w-10 h-10 rounded-full bg-white text-zinc-900 flex items-center justify-center font-display font-bold text-sm">02</div>
 <div class="h-px flex-1 bg-line lg:hidden"></div>
 </div>
 <h3 class="mt-5 font-semibold text-base">Agree the plan</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">A short document. Which communities, what we'll say in them, and what we will never say. You sign it off before a single comment goes out.</p>
 <p class="mt-4 text-xs font-medium text-zinc-500">Nothing posts without your yes</p>
 </div>

 <div class="reveal relative rounded-[20px] bg-bg border border-line p-6 lg:p-7" style="transition-delay:160ms">
 <div class="flex items-center gap-3">
 <div class="w-10 h-10 rounded-full bg-zinc-800 border border-line text-white flex items-center justify-center font-display font-bold text-sm">03</div>
 <div class="h-px flex-1 bg-line lg:hidden"></div>
 </div>
 <h3 class="mt-5 font-semibold text-base">Show up daily</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">We answer questions, share what we know, and name you when you're honestly the right answer. In practice that's about one comment in ten.</p>
 <p class="mt-4 text-xs font-medium text-zinc-500">Nine helpful, one about you</p>
 </div>

 <div class="reveal relative rounded-[20px] bg-accent text-zinc-900 p-6 lg:p-7" style="transition-delay:240ms">
 <div class="flex items-center gap-3">
 <div class="w-10 h-10 rounded-full bg-surface text-white flex items-center justify-center font-display font-bold text-sm">04</div>
 <div class="h-px flex-1 bg-zinc-800/30 lg:hidden"></div>
 </div>
 <h3 class="mt-5 font-semibold text-base">Cut what fails</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-800">Once a month we go through what landed and what got ignored, then drop the communities that aren't earning their time.</p>
 <p class="mt-4 text-xs font-semibold text-zinc-800">Monthly, on a call</p>
 </div>
 </div>
 </div>
 </div>
</section>

<!-- Why Reddit -->
<section id="why-reddit" class="border-t border-line">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-20 lg:py-28">
 <div class="grid lg:grid-cols-12 gap-10 lg:gap-12 items-start">
 <div class="lg:col-span-5 reveal">
 <p class="text-xs font-semibold tracking-[0.14em] uppercase text-zinc-400">Why Reddit</p>
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl">Why we only work on this one channel</h2>
 <p class="mt-4 text-sm leading-7 text-zinc-400">
 Reddit is where people go once they've stopped believing the ads. They look for the comparison, the alternative, the "is it worth it" thread, and they read those comments far more carefully than they'll ever read your homepage.
 </p>
 <p class="mt-3 text-sm leading-7 text-zinc-400">
 Turn up in that moment with something genuinely useful and you skip most of the trust-building a normal funnel has to do the hard way.
 </p>
 <p class="mt-6 text-xs leading-5 text-zinc-500 border-l-2 border-line pl-4">
 We're not going to quote you Reddit's monthly active user count. It's a big number and it tells you nothing about whether your buyers are on there.
 </p>
 </div>

 <div class="lg:col-span-7">
 <div class="grid sm:grid-cols-2 gap-4">
 <div class="reveal rounded-[20px] bg-surface border border-line p-6">
 <div class="w-8 h-8 rounded-lg bg-zinc-800 border border-zinc-700 flex items-center justify-center text-accent">
 <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
 </div>
 <h3 class="mt-4 font-semibold text-sm">People ask right before they buy</h3>
 <p class="mt-1.5 text-sm leading-6 text-zinc-400">"Which one should I go with" threads are full of people with a card already in their hand.</p>
 </div>

 <div class="reveal rounded-[20px] bg-surface border border-line p-6" style="transition-delay:60ms">
 <div class="w-8 h-8 rounded-lg bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
 </div>
 <h3 class="mt-4 font-semibold text-sm">The niches get absurdly specific</h3>
 <p class="mt-1.5 text-sm leading-6 text-zinc-400">There's a subreddit for commercial espresso machines. There's almost certainly one for whatever you sell.</p>
 </div>

 <div class="reveal rounded-[20px] bg-surface border border-line p-6" style="transition-delay:120ms">
 <div class="w-8 h-8 rounded-lg bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
 </div>
 <h3 class="mt-4 font-semibold text-sm">A comment beats a banner</h3>
 <p class="mt-1.5 text-sm leading-6 text-zinc-400">One believable reply from somebody who has actually used the thing is worth a month of impressions.</p>
 </div>

 <div class="reveal rounded-[20px] bg-surface border border-line p-6" style="transition-delay:180ms">
 <div class="w-8 h-8 rounded-lg bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
 </div>
 <h3 class="mt-4 font-semibold text-sm">Old threads keep working</h3>
 <p class="mt-1.5 text-sm leading-6 text-zinc-400">Reddit ranks well in Google and stays there. A good answer from last year is still bringing people in.</p>
 </div>
 </div>

 <div class="reveal mt-4 rounded-full bg-zinc-800 border border-line px-4 py-3 flex flex-wrap items-center gap-3 text-xs">
 <span class="px-2.5 py-1 rounded-full bg-white text-zinc-900 font-semibold">Search driven</span>
 <span class="text-zinc-400">reviews, comparisons, alternatives, "best X for Y"</span>
 </div>
 </div>
 </div>
 </div>
</section>

<!-- Why GrowwDaddy -->
<section class="border-t border-line bg-surface">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-14 lg:py-20">
 <div class="rounded-[28px] bg-bg border border-line overflow-hidden">
 <div class="grid lg:grid-cols-12 gap-0">
 <div class="lg:col-span-7 p-8 lg:p-10 xl:p-12">
 <p class="text-xs font-semibold tracking-[0.14em] uppercase text-accent">Why us</p>
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl">We've been on Reddit long<br>enough to know what gets deleted.</h2>
 <p class="mt-4 text-sm leading-7 text-zinc-400">We've had posts pulled, comments buried at the bottom of threads, and one account shadowbanned in our first month. Most of what we know came out of those, not out of a course.</p>

 <div class="mt-8 space-y-4">
 <div class="flex gap-4">
 <div class="w-8 h-8 rounded-full bg-accent flex items-center justify-center text-zinc-900 shrink-0 mt-0.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M5 12l5 5l10 -10"/></svg></div>
 <div>
 <div class="font-semibold text-sm">We contribute more than we promote</div>
 <div class="text-sm leading-6 text-zinc-400">Most of what we post has nothing to do with your product. That's the part that makes the rest of it work.</div>
 </div>
 </div>
 <div class="flex gap-4">
 <div class="w-8 h-8 rounded-full bg-zinc-900 border border-line text-white flex items-center justify-center shrink-0 mt-0.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M5 12l5 5l10 -10"/></svg></div>
 <div>
 <div class="font-semibold text-sm">We write like people</div>
 <div class="text-sm leading-6 text-zinc-400">No corporate voice, no generated filler, and nothing that opens with "great question".</div>
 </div>
 </div>
 <div class="flex gap-4">
 <div class="w-8 h-8 rounded-full bg-zinc-800 border border-line flex items-center justify-center text-white shrink-0 mt-0.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M5 12l5 5l10 -10"/></svg></div>
 <div>
 <div class="font-semibold text-sm">One plan per subreddit</div>
 <div class="text-sm leading-6 text-zinc-400">Every community gets read before we post in it. The rules, the tone, and the thing the mods are sick of seeing.</div>
 </div>
 </div>
 <div class="flex gap-4">
 <div class="w-8 h-8 rounded-full bg-zinc-800 border border-line flex items-center justify-center text-white shrink-0 mt-0.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M5 12l5 5l10 -10"/></svg></div>
 <div>
 <div class="font-semibold text-sm">We're playing a long game</div>
 <div class="text-sm leading-6 text-zinc-400">Reddit pays off slowly, then keeps paying. We'd rather build that than spike your traffic for a fortnight and lose the account.</div>
 </div>
 </div>
 <div class="flex gap-4">
 <div class="w-8 h-8 rounded-full bg-zinc-800 border border-line flex items-center justify-center text-white shrink-0 mt-0.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M5 12l5 5l10 -10"/></svg></div>
 <div>
 <div class="font-semibold text-sm">We'll tell you when it isn't working</div>
 <div class="text-sm leading-6 text-zinc-400">If a community has produced nothing in two months we say so on the monthly call and move the hours somewhere better.</div>
 </div>
 </div>
 </div>
 </div>

 <div class="lg:col-span-5 bg-surface border-t lg:border-t-0 lg:border-l border-line p-8 lg:p-10 xl:p-12 flex flex-col">
 <div class="rounded-[20px] bg-accent text-zinc-900 p-7">
 <div class="text-xs font-bold tracking-widest uppercase">The rule we work to</div>
 <p class="mt-3 font-display font-semibold text-lg tracking-tight">
 Nobody needs to see your brand everywhere. They need to see it once, in the thread they were already reading.
 </p>
 <p class="mt-4 text-sm leading-6 text-zinc-800">It's on the first page of every brief we write.</p>
 </div>

 <div class="mt-6 rounded-2xl bg-zinc-800 border border-line p-5">
 <div class="text-sm font-semibold">What you won't get from us</div>
 <ul class="mt-3 space-y-2 text-sm leading-6 text-zinc-400">
 <li class="flex gap-2"><span class="text-zinc-600">&mdash;</span> Mass DMs or upvote rings</li>
 <li class="flex gap-2"><span class="text-zinc-600">&mdash;</span> The same comment pasted into nine subreddits</li>
 <li class="flex gap-2"><span class="text-zinc-600">&mdash;</span> Invented reviews or somebody else's case study</li>
 <li class="flex gap-2"><span class="text-zinc-600">&mdash;</span> Anything likely to get your domain banned sitewide</li>
 </ul>
 </div>

 <div class="mt-auto pt-6 flex items-center gap-3 text-xs text-zinc-500">
 <span class="w-2 h-2 rounded-full bg-accent shrink-0"></span>
 A small team. We take on a handful of clients at a time, because this work doesn't scale by hiring quickly.
 </div>
 </div>
 </div>
 </div>
 </div>
</section>

<!-- FAQ -->
<section id="faq" class="border-t border-line">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-20 lg:py-28">
 <div class="grid lg:grid-cols-12 gap-10">
 <div class="lg:col-span-4">
 <p class="text-xs font-semibold tracking-[0.14em] uppercase text-accent">FAQ</p>
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl">The questions<br><span class="text-zinc-400">we get every week</span></h2>
 <p class="mt-4 text-sm leading-6 text-zinc-400">If Reddit is a bad fit for what you sell, we'd rather tell you on the first call than three months in.</p>
 <div class="mt-6 inline-flex flex-wrap items-center gap-2 text-xs text-zinc-400">
 <span class="w-2 h-2 rounded-full bg-accent"></span>
 Something we've missed?
 <a href="mailto:<?php echo htmlspecialchars($email); ?>" class="underline decoration-zinc-600 underline-offset-4 hover:text-white">Email us</a>
 </div>
 </div>

 <div class="lg:col-span-8">
 <div class="rounded-[20px] bg-surface border border-line divide-y divide-line overflow-hidden">
 <div class="faq-item">
 <button class="faq-btn w-full flex items-center justify-between gap-6 px-6 lg:px-8 py-6 text-left group" aria-expanded="true">
 <span class="font-semibold text-sm leading-6 pr-2">Will this work for my business?</span>
 <span class="w-8 h-8 rounded-full border border-line bg-zinc-800 flex items-center justify-center shrink-0 group-hover:bg-zinc-700 transition-colors">
 <svg class="faq-icon transition-transform duration-200 rotate-45" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
 </span>
 </button>
 <div class="faq-panel px-6 lg:px-8 pb-6">
 <p class="text-sm leading-7 text-zinc-400 max-w-[640px]">
 It works when your product solves something people complain about in public, and when you can live with subreddit rules. It doesn't work for most gambling, crypto and supplement offers, and it doesn't work if your buyers simply aren't on there. We check that first, before you pay us anything, and we've turned work down on those grounds.
 </p>
 </div>
 </div>

 <div class="faq-item">
 <button class="faq-btn w-full flex items-center justify-between gap-6 px-6 lg:px-8 py-6 text-left group" aria-expanded="false">
 <span class="font-semibold text-sm leading-6 pr-2">Do you make fake accounts and pretend to be customers?</span>
 <span class="w-8 h-8 rounded-full border border-line bg-zinc-800 flex items-center justify-center shrink-0 group-hover:bg-zinc-700 transition-colors">
 <svg class="faq-icon transition-transform duration-200" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
 </span>
 </button>
 <div class="faq-panel hidden px-6 lg:px-8 pb-6">
 <p class="text-sm leading-7 text-zinc-400 max-w-[640px]">
 No. We run accounts that we'll happily tell you belong to us, or we coach your team to post under their own names. No sock puppets posing as happy buyers, no vote trading. That approach works for roughly a month and then costs you the domain, which is a bad trade.
 </p>
 </div>
 </div>

 <div class="faq-item">
 <button class="faq-btn w-full flex items-center justify-between gap-6 px-6 lg:px-8 py-6 text-left group" aria-expanded="false">
 <span class="font-semibold text-sm leading-6 pr-2">How long until anything happens?</span>
 <span class="w-8 h-8 rounded-full border border-line bg-zinc-800 flex items-center justify-center shrink-0 group-hover:bg-zinc-700 transition-colors">
 <svg class="faq-icon transition-transform duration-200" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
 </span>
 </button>
 <div class="faq-panel hidden px-6 lg:px-8 pb-6">
 <p class="text-sm leading-7 text-zinc-400 max-w-[640px]">
 First comments go out in week two or three, once the plan is signed off. Traffic you'd actually notice in your analytics is usually month two or three, and it builds from there as the threads start ranking. If you need leads by the end of the month, spend the money on ads instead. We'll still take the call, but that's the honest answer.
 </p>
 </div>
 </div>

 <div class="faq-item">
 <button class="faq-btn w-full flex items-center justify-between gap-6 px-6 lg:px-8 py-6 text-left group" aria-expanded="false">
 <span class="font-semibold text-sm leading-6 pr-2">Can you guarantee a number of leads?</span>
 <span class="w-8 h-8 rounded-full border border-line bg-zinc-800 flex items-center justify-center shrink-0 group-hover:bg-zinc-700 transition-colors">
 <svg class="faq-icon transition-transform duration-200" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
 </span>
 </button>
 <div class="faq-panel hidden px-6 lg:px-8 pb-6">
 <p class="text-sm leading-7 text-zinc-400 max-w-[640px]">
 No, and I'd be careful with anyone who does. A moderator can remove our best thread on a Tuesday afternoon and there's no appeal. What you get instead is the work itself: the research, a plan you approved, and a note every week listing what we posted, where, and what it did.
 </p>
 </div>
 </div>

 <div class="faq-item">
 <button class="faq-btn w-full flex items-center justify-between gap-6 px-6 lg:px-8 py-6 text-left group" aria-expanded="false">
 <span class="font-semibold text-sm leading-6 pr-2">How much of it do you handle?</span>
 <span class="w-8 h-8 rounded-full border border-line bg-zinc-800 flex items-center justify-center shrink-0 group-hover:bg-zinc-700 transition-colors">
 <svg class="faq-icon transition-transform duration-200" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
 </span>
 </button>
 <div class="faq-panel hidden px-6 lg:px-8 pb-6">
 <p class="text-sm leading-7 text-zinc-400 max-w-[640px]">
 All of it if you want: research, posting, monitoring, the monthly review. Or just the strategy, with your team doing the posting from their own accounts. Most people start with us running everything, then take a chunk of it in-house once they can see the pattern.
 </p>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
</section>

<!-- Contact -->
<section id="contact" class="border-t border-line bg-surface">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-14 lg:py-20">
 <div class="relative overflow-hidden rounded-[32px] bg-bg border border-line">
 <div aria-hidden="true" class="pointer-events-none absolute -top-24 -right-24 w-[520px] h-[520px] bg-[radial-gradient(ellipse_at_center,_rgba(185,255,102,0.08),_transparent_60%)]"></div>
 <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,_rgba(255,255,255,0.02),_transparent_40%)]"></div>

 <div class="relative grid lg:grid-cols-12 gap-8 p-8 lg:p-12 xl:p-14 items-center">
 <div class="lg:col-span-7">
 <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent text-zinc-900 text-xs font-bold tracking-widest uppercase">Thirty minutes, no charge</div>
 <h2 class="mt-4 font-display font-semibold tracking-[-0.02em] text-4xl">Find out whether Reddit<br>is worth your time.</h2>
 <p class="mt-4 text-base leading-7 text-zinc-400 max-w-[520px]">Half an hour, no slide deck. We'll go through your niche, name the subreddits worth being in, and tell you if there aren't any.</p>

 <div class="mt-8 flex flex-col sm:flex-row gap-3">
 <a href="<?php echo htmlspecialchars($ctaUrl); ?>" class="inline-flex items-center justify-center h-[48px] px-7 rounded-full bg-accent text-zinc-900 font-semibold text-sm hover:bg-accent-hover transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2 focus-visible:ring-offset-bg">
 Book the call
 <svg class="ml-2" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M6 3l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
 </a>
 <a href="mailto:<?php echo htmlspecialchars($email); ?>" class="inline-flex items-center justify-center h-[48px] px-7 rounded-full border border-line bg-zinc-800 text-white font-medium text-sm hover:bg-zinc-700 transition-colors">
 <?php echo htmlspecialchars($email); ?>
 </a>
 </div>

 <p class="mt-6 text-xs text-zinc-500">Or email us the name of one competitor and we'll send back the three threads they're losing.</p>
 </div>

 <div class="lg:col-span-5">
 <div class="rounded-[20px] bg-surface border border-line p-6">
 <div class="text-sm font-semibold">What you leave the call with</div>
 <ul class="mt-4 space-y-3">
 <li class="flex gap-3 text-sm leading-6 text-zinc-400"><span class="w-6 h-6 rounded-full bg-accent text-zinc-900 flex items-center justify-center shrink-0 mt-0.5"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M5 12l5 5l10 -10"/></svg></span> A list of subreddits where your buyers actually post</li>
 <li class="flex gap-3 text-sm leading-6 text-zinc-400"><span class="w-6 h-6 rounded-full bg-zinc-900 border border-line text-white flex items-center justify-center shrink-0 mt-0.5"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M5 12l5 5l10 -10"/></svg></span> The angle we'd take in each one, and what would get us removed</li>
 <li class="flex gap-3 text-sm leading-6 text-zinc-400"><span class="w-6 h-6 rounded-full bg-zinc-800 border border-line flex items-center justify-center text-white shrink-0 mt-0.5"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M5 12l5 5l10 -10"/></svg></span> A straight answer on whether to bother at all</li>
 </ul>
 <div class="mt-6 rounded-xl bg-zinc-800 border border-line px-4 py-3">
 <div class="text-xs font-semibold text-white">You'll be talking to whoever would run the account</div>
 <div class="mt-0.5 text-xs text-zinc-400">Not a salesperson reading from a script.</div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
</section>
</main>

<!-- Footer -->
<footer class="border-t border-line bg-bg">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-12">
 <div class="grid lg:grid-cols-12 gap-10">
 <div class="lg:col-span-6">
 <a href="#" class="flex items-center gap-3">
 <div class="w-8 h-8 rounded-lg bg-white text-zinc-900 flex items-center justify-center font-display font-bold text-sm">GD</div>
 <span class="font-display font-semibold text-lg tracking-tight">GrowwDaddy</span>
 </a>
 <p class="mt-3 text-sm leading-6 text-zinc-400 max-w-[380px]">A small team that only does Reddit. We work remotely, mostly with B2B and DTC brands who are tired of paying more for the same clicks.</p>
 <div class="mt-5 flex flex-wrap items-center gap-3">
 <a href="mailto:<?php echo htmlspecialchars($email); ?>" class="text-sm font-medium text-zinc-400 hover:text-white underline decoration-zinc-600 underline-offset-4"><?php echo htmlspecialchars($email); ?></a>
 <span class="w-1 h-1 bg-zinc-600 rounded-full"></span>
 <span class="text-xs text-zinc-500">Remote, UK hours</span>
 </div>
 </div>

 <div class="lg:col-span-6 lg:flex lg:justify-end gap-16">
 <div>
 <div class="text-xs font-semibold tracking-widest uppercase text-zinc-500">This page</div>
 <nav class="mt-4 flex flex-col gap-2.5">
 <a href="#services" class="text-sm text-zinc-400 hover:text-white transition-colors">Services</a>
 <a href="#how-it-works" class="text-sm text-zinc-400 hover:text-white transition-colors">Process</a>
 <a href="#why-reddit" class="text-sm text-zinc-400 hover:text-white transition-colors">Why Reddit</a>
 <a href="#faq" class="text-sm text-zinc-400 hover:text-white transition-colors">FAQ</a>
 </nav>
 </div>
 <div class="mt-8 lg:mt-0">
 <div class="text-xs font-semibold tracking-widest uppercase text-zinc-500">Privacy</div>
 <p class="mt-4 max-w-[240px] text-sm leading-6 text-zinc-400">No cookies, no analytics and no tracking pixels on this page. Email us and we keep the email. That's the whole policy.</p>
 </div>
 </div>
 </div>

 <div class="mt-10 pt-6 border-t border-line flex flex-col sm:flex-row items-center justify-between gap-3">
 <p class="text-xs text-zinc-500">&copy; <?php echo $year; ?> GrowwDaddy</p>
 <p class="text-xs text-zinc-500">No stock photos, no borrowed case studies, no made-up numbers.</p>
 </div>
 </div>
</footer>

<script>
// Mobile menu
const menuBtn = document.getElementById('menuBtn');
const mobileMenu = document.getElementById('mobileMenu');
const menuIcon = document.getElementById('menuIcon');
const closeIcon = document.getElementById('closeIcon');
let menuOpen = false;
function toggleMenu() {
  menuOpen = !menuOpen;
  mobileMenu.classList.toggle('hidden', !menuOpen);
  menuIcon.classList.toggle('hidden', menuOpen);
  closeIcon.classList.toggle('hidden', !menuOpen);
  menuBtn.setAttribute('aria-expanded', String(menuOpen));
  document.body.style.overflow = menuOpen ? 'hidden' : '';
}
menuBtn.addEventListener('click', toggleMenu);
document.querySelectorAll('.mobile-link').forEach(a => a.addEventListener('click', () => { if (menuOpen) toggleMenu(); }));

// FAQ accordion, one open at a time
document.querySelectorAll('.faq-item').forEach(item => {
  const btn = item.querySelector('.faq-btn');
  btn.addEventListener('click', () => {
    const wasOpen = btn.getAttribute('aria-expanded') === 'true';
    document.querySelectorAll('.faq-item').forEach(other => {
      other.querySelector('.faq-btn').setAttribute('aria-expanded', 'false');
      other.querySelector('.faq-panel').classList.add('hidden');
      other.querySelector('.faq-icon').classList.remove('rotate-45');
    });
    if (!wasOpen) {
      btn.setAttribute('aria-expanded', 'true');
      item.querySelector('.faq-panel').classList.remove('hidden');
      item.querySelector('.faq-icon').classList.add('rotate-45');
    }
  });
});

// Anchor scroll, offset for the sticky header
const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const href = a.getAttribute('href');
    if (href.length < 2) return;
    const target = document.querySelector(href);
    if (!target) return;
    e.preventDefault();
    const navH = document.getElementById('navbar').offsetHeight;
    window.scrollTo({
      top: target.getBoundingClientRect().top + window.scrollY - navH - 12,
      behavior: reduceMotion ? 'auto' : 'smooth'
    });
    if (menuOpen) toggleMenu();
    history.pushState(null, '', href);
  });
});

// Scroll reveal
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('in');
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// Drop a shadow under the header once the page has moved
const navbar = document.getElementById('navbar');
let ticking = false;
window.addEventListener('scroll', () => {
  if (ticking) return;
  ticking = true;
  requestAnimationFrame(() => {
    navbar.classList.toggle('shadow-soft', window.scrollY > 10);
    ticking = false;
  });
}, { passive: true });
</script>
</body>
</html>
