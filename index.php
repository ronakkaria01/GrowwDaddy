<?php
// GrowwDaddy - Reddit Marketing Agency
// Contact CTA URL: update $ctaUrl to your Calendly / scheduling link
$ctaUrl = "#contact";
$email = "hello@growwdaddy.com";
$year = date("Y");
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>GrowwDaddy — Turn Reddit Into Your Growth Channel</title>
 <meta name="description" content="GrowwDaddy helps brands build authentic Reddit presence, earn community trust, and turn conversations into customers — without sounding like ads. Reddit marketing, community growth & reputation.">
 <meta name="keywords" content="Reddit marketing, Reddit agency, community marketing, Reddit growth, reputation management">
 <meta name="author" content="GrowwDaddy">
 <link rel="canonical" href="https://growwdaddy.com/">

 <!-- Open Graph -->
 <meta property="og:type" content="website">
 <meta property="og:title" content="GrowwDaddy — Turn Reddit Into Your Growth Channel">
 <meta property="og:description" content="We help brands build authentic Reddit presence, earn community trust, and turn conversations into customers.">
 <meta property="og:url" content="https://growwdaddy.com/">
 <meta property="og:image" content="assets/og-image.png">
 <meta property="og:site_name" content="GrowwDaddy">
 <meta name="twitter:card" content="summary_large_image">
 <meta name="twitter:title" content="GrowwDaddy — Turn Reddit Into Your Growth Channel">
 <meta name="twitter:description" content="Reddit marketing built around trust, conversations, and growth.">

 <!-- Favicon -->
 <link rel="icon" type="image/svg+xml" href="assets/favicon.svg">
 <link rel="alternate icon" href="assets/favicon.svg">

 <!-- Fonts: Inter + Instrument Sans for headings -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

 <script src="https://cdn.tailwindcss.com"></script>
 <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
            display: ['Instrument Sans', 'Inter', 'sans-serif'],
          },
          colors: {
            bg: '#070709',
            surface: '#111113',
            surface2: '#19191B',
            line: '#232326',
            accent: '#B9FF66',
            accentHover: '#A8E635',
            muted: '#A1A1AA',
          },
          boxShadow: {
            soft: '0 1px 0 0 rgba(255,255,255,0.04), 0 8px 24px rgba(0,0,0,0.5)',
          }
        }
      }
    }
  </script>
 <style>
 * { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
 html { scroll-behavior: smooth; }
 ::selection { background: #B9FF66; color: #070709; }
 /* subtle scrollbar */
 ::-webkit-scrollbar { width: 6px; height: 6px; }
 ::-webkit-scrollbar-thumb { background: #232326; border-radius: 999px; }
 ::-webkit-scrollbar-track { background: #070709; }
 /* reveal */
 .reveal { opacity: 0; transform: translateY(14px); transition: opacity .7s ease, transform .7s ease; }
 .reveal.in { opacity: 1; transform: translateY(0); }
 @media (prefers-reduced-motion: reduce) {
 .reveal { opacity:1; transform:none; transition:none; }
 html { scroll-behavior: auto; }
 }
 </style>
 <noscript><style>.reveal{opacity:1;transform:none}</style></noscript>
</head>
<body class="bg-bg text-white font-sans antialiased overflow-x-hidden">
 <!-- Navigation -->
 <header id="navbar" class="sticky top-0 z-50 border-b border-line bg-bg">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
 <div class="flex h-[64px] items-center justify-between">
 <!-- Logo -->
 <a href="#" class="flex items-center gap-3 group">
 <div class="w-8 h-8 rounded-lg bg-white text-zinc-900 flex items-center justify-center font-display font-bold text-sm tracking-tight">GD</div>
 <span class="font-display font-semibold text-lg tracking-tight">GrowwDaddy</span>
 <span class="hidden sm:inline-flex ml-1 px-2 py-0.5 rounded-full bg-zinc-800 border border-line text-xs font-medium tracking-widest uppercase text-zinc-400">Reddit Marketing</span>
 </a>

 <!-- Desktop Nav -->
 <nav class="hidden md:flex items-center gap-8">
 <a href="#services" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">Services</a>
 <a href="#how-it-works" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">How It Works</a>
 <a href="#why-reddit" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">Why Reddit</a>
 <a href="#faq" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">FAQ</a>
 <a href="#contact" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">Contact</a>
 </nav>

 <div class="hidden md:flex items-center gap-3">
 <a href="<?php echo htmlspecialchars($ctaUrl); ?>" class="inline-flex items-center justify-center h-9 px-5 rounded-full bg-accent text-zinc-900 text-sm font-semibold hover:bg-accentHover transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2 focus-visible:ring-offset-bg">
 Book a Call
 </a>
 </div>

 <!-- Mobile toggle -->
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
 <a href="#how-it-works" class="mobile-link text-sm font-medium text-zinc-400 hover:text-white">How It Works</a>
 <a href="#why-reddit" class="mobile-link text-sm font-medium text-zinc-400 hover:text-white">Why Reddit</a>
 <a href="#faq" class="mobile-link text-sm font-medium text-zinc-400 hover:text-white">FAQ</a>
 <a href="#contact" class="mobile-link text-sm font-medium text-zinc-400 hover:text-white">Contact</a>
 </nav>
 <a href="<?php echo htmlspecialchars($ctaUrl); ?>" class="flex items-center justify-center h-11 rounded-full bg-accent text-zinc-900 font-semibold text-sm hover:bg-accentHover transition-colors">Get a Free Strategy Call</a>
 <p class="text-center text-xs text-zinc-400">hello@growwdaddy.com</p>
 </div>
 </div>
 </header>

 <!-- Hero -->
 <section class="relative overflow-hidden">
 <div aria-hidden="true" class="pointer-events-none absolute inset-0">
 <div class="absolute -top-[30%] left-1/2 -translate-x-1/2 w-[900px] h-[600px] bg-[radial-gradient(ellipse_at_center,_rgba(185,255,102,0.06),_transparent_65%)]"></div>
 <div class="absolute inset-0 bg-[linear-gradient(to_bottom,_transparent,_rgba(7,7,9,1)_92%)]"></div>
 </div>

 <div class="relative max-w-[1440px] mx-auto px-6 lg:px-8 pt-14 sm:pt-20 lg:pt-24 pb-16 lg:pb-24">
 <div class="grid lg:grid-cols-12 gap-12 lg:gap-10 items-center">
 <div class="lg:col-span-7">
 <div class="inline-flex items-center gap-2.5 px-3 py-1.5 rounded-full bg-surface border border-line">
 <span class="w-2 h-2 rounded-full bg-accent"></span>
 <span class="text-xs font-semibold tracking-[0.14em] uppercase text-zinc-400">Reddit Marketing • Community Growth • Reputation</span>
 </div>

 <h1 class="font-display font-semibold tracking-[-0.04em] leading-[0.88] text-4xl lg:text-6xl mt-6">
 Turn Reddit Into<br>
 Your <span class="relative inline-block"><span class="relative z-10">Growth</span><span aria-hidden="true" class="absolute left-0 right-0 bottom-[0.14em] h-[0.38em] bg-accent -z-0"></span></span><br>
 Channel.
 </h1>

 <p class="mt-6 text-base sm:text-lg leading-7 text-zinc-400 max-w-[560px]">
 We help brands build authentic Reddit presence, earn community trust, and turn conversations into customers — without sounding like ads.
 </p>

 <div class="mt-8 flex flex-col sm:flex-row gap-3">
 <a href="<?php echo htmlspecialchars($ctaUrl); ?>" class="inline-flex items-center justify-center h-[48px] px-7 rounded-full bg-accent text-zinc-900 font-semibold text-sm hover:bg-accentHover transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2 focus-visible:ring-offset-bg">
 Get a Free Strategy Call
 <svg class="ml-2" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M6 3l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
 </a>
 <a href="#how-it-works" class="inline-flex items-center justify-center h-[48px] px-7 rounded-full border border-line bg-transparent text-white font-medium text-sm hover:bg-surface transition-colors">
 See How It Works
 </a>
 </div>

 <div class="mt-8 flex items-center gap-4 text-xs">
 <div class="flex items-center gap-2 text-zinc-400">
 <span class="w-1.5 h-1.5 rounded-full bg-accent"></span>
 No spam. No shortcuts.
 </div>
 <span class="w-px h-3 bg-line"></span>
 <span class="text-zinc-400">Community-first, always.</span>
 </div>
 </div>

 <div class="lg:col-span-5">
 <div class="rounded-[24px] bg-surface border border-line p-6 lg:p-7">
 <div class="flex items-center justify-between">
 <div class="flex items-center gap-2">
 <span class="w-2 h-2 rounded-full bg-accent"></span>
 <span class="text-xs font-semibold tracking-widest uppercase text-zinc-400">Live community feed</span>
 </div>
 <span class="text-xs font-medium text-zinc-400">12 subreddits • 4 high-intent</span>
 </div>

 <div class="mt-6 space-y-3">
 <div class="rounded-2xl bg-bg border border-line p-4">
 <div class="flex items-center gap-2">
 <span class="px-2.5 py-0.5 rounded-full bg-accent text-zinc-900 text-xs font-semibold">r/SaaS</span>
 <span class="text-xs text-zinc-400">6h ago</span>
 <span class="ml-auto w-1.5 h-1.5 rounded-full bg-accent"></span>
 </div>
 <p class="mt-3 text-sm font-medium leading-snug text-white">Looking for a Reddit-native way to turn discussions into leads?</p>
 <div class="mt-2 flex items-center gap-2 text-xs">
 <span class="text-accent font-medium">→ High intent</span>
 <span class="text-zinc-400">• 31 replies</span>
 </div>
 </div>

 <div class="rounded-2xl bg-bg border border-line p-4">
 <div class="flex items-center gap-2">
 <span class="px-2 py-0.5 rounded-full bg-white text-zinc-900 text-xs font-semibold">r/marketing</span>
 <span class="text-xs text-zinc-400">12h ago</span>
 </div>
 <p class="mt-3 text-sm font-medium leading-snug text-white">Anyone have a framework for subreddit-specific messaging?</p>
 <div class="mt-2 text-xs text-zinc-400">Monitoring • 18 comments</div>
 </div>

 <div class="rounded-2xl bg-bg border border-line p-4">
 <div class="flex items-center gap-2">
 <span class="px-2 py-0.5 rounded-full bg-zinc-800 text-white text-xs font-semibold border border-line">r/Entrepreneur</span>
 <span class="text-xs text-zinc-400">1d ago</span>
 <span class="ml-auto text-xs font-medium text-zinc-400">Queued</span>
 </div>
 <p class="mt-3 text-sm font-medium leading-snug text-white">How do you build trust before pitching on Reddit?</p>
 </div>
 </div>

 <div class="mt-6 rounded-xl bg-accent text-zinc-900 px-4 py-3 flex items-center justify-between">
 <span class="text-sm font-semibold">GrowwDaddy reply → DM • Lead</span>
 <span class="text-xs font-medium">Human • Helpful</span>
 </div>

 <div class="mt-4 flex items-center justify-between text-xs text-zinc-400">
 <span>Real conversations, not ads</span>
 <span class="text-accent font-medium">→ Conversation → Customer</span>
 </div>
 </div>
 </div>
 </div>
 </div>
 </section>

 <!-- Problem -->
 <section class="border-t border-line bg-surface">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-20 lg:py-28">
 <div class="max-w-3xl reveal">
 <p class="text-xs font-semibold tracking-[0.14em] uppercase text-accent">Why most brands fail on Reddit</p>
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl leading-[1.05]">Reddit is different.<br><span class="text-zinc-400">Your marketing should be too.</span></h2>
 <p class="mt-4 text-base leading-7 text-zinc-400">Traditional advertising doesn’t work the same way on Reddit. The platform rewards relevance, honesty, and participation — and penalizes anything that feels like a generic pitch.</p>
 </div>

 <div class="mt-10 grid md:grid-cols-3 gap-5 lg:gap-6">
 <div class="reveal rounded-[20px] bg-surface border border-line p-6 lg:p-7">
 <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
 </div>
 <h3 class="mt-5 font-semibold text-base">Users hate obvious promotion</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">Reddit communities quickly recognize generic sales pitches. One wrong comment can hurt more than it helps.</p>
 <div class="mt-4 text-xs font-medium text-accent">→ Trust before promotion</div>
 </div>

 <div class="reveal rounded-[20px] bg-surface border border-line p-6 lg:p-7" style="transition-delay: 80ms">
 <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
 </div>
 <h3 class="mt-5 font-semibold text-base">Every subreddit has its own culture</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">What works in one community can fail badly in another. Each subreddit has its own rules, tone, and expectations.</p>
 <div class="mt-4 text-xs font-medium text-accent">→ Subreddit-specific approach</div>
 </div>

 <div class="reveal rounded-[20px] bg-surface border border-line p-6 lg:p-7" style="transition-delay: 160ms">
 <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
 </div>
 <h3 class="mt-5 font-semibold text-base">Trust comes before conversion</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">Brands need to participate authentically before expecting results. Value first, leads second.</p>
 <div class="mt-4 text-xs font-medium text-accent">→ Long-term reputation</div>
 </div>
 </div>

 <div class="reveal mt-6 rounded-[20px] bg-accent text-zinc-900 p-6 lg:p-8 flex flex-col lg:flex-row lg:items-center gap-6">
 <div class="flex-1">
 <div class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase "><span class="w-1.5 h-1.5 rounded-full bg-surface"></span> Meet GrowwDaddy</div>
 <p class="mt-2 font-display font-semibold text-lg lg:text-lg leading-tight tracking-tight">We help you show up the right way — in the right communities, with the right conversations.</p>
 <p class="mt-2 text-sm leading-6 ">No spam. No copy-paste pitches. Just a community-first system built for how Reddit actually works.</p>
 </div>
 <a href="#services" class="inline-flex items-center justify-center h-11 px-6 rounded-full bg-white text-zinc-900 font-semibold text-sm shrink-0 hover:bg-zinc-900 hover:text-white transition-colors">Explore services →</a>
 </div>
 </div>
 </section>

 <!-- Services -->
 <section id="services" class="border-t border-line">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-20 lg:py-28">
 <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
 <div class="reveal">
 <p class="text-xs font-semibold tracking-[0.14em] uppercase text-zinc-400">What we do</p>
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl leading-[1]">What We Do</h2>
 </div>
 <p class="reveal max-w-[520px] text-sm leading-6 text-zinc-400">Four focused services that turn Reddit from a confusing channel into a predictable growth engine — all built around authentic participation.</p>
 </div>

 <div class="mt-10 grid md:grid-cols-2 gap-5 lg:gap-6">
 <!-- Card 1 -->
 <div class="reveal group relative rounded-[20px] bg-surface border border-line p-7 lg:p-8 hover:border-line hover:bg-zinc-800 transition-colors">
 <div class="w-10 h-10 rounded-xl bg-accent flex items-center justify-center text-zinc-900">
 <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
 </div>
 <h3 class="mt-6 font-semibold text-lg tracking-tight">Reddit Account Management</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">Build and maintain credible Reddit accounts and profiles with consistent, authentic activity. We establish real history before any promotion.</p>
 <div class="mt-5 inline-flex items-center gap-2 text-xs font-medium text-zinc-400 group-hover:text-zinc-400 transition-colors">
 <span class="w-6 h-px bg-line group-hover:bg-line"></span>
 Profile • Karma • History
 </div>
 </div>

 <!-- Card 2 -->
 <div class="reveal group relative rounded-[20px] bg-surface border border-line p-7 lg:p-8 hover:border-line hover:bg-zinc-800 transition-colors" style="transition-delay:60ms">
 <div class="w-10 h-10 rounded-xl bg-zinc-900 text-white flex items-center justify-center">
 <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
 </div>
 <h3 class="mt-6 font-semibold text-lg tracking-tight">Community Marketing</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">Identify relevant subreddits and participate in conversations where your audience already spends time. Relevance over reach.</p>
 <div class="mt-5 inline-flex items-center gap-2 text-xs font-medium text-zinc-400 group-hover:text-zinc-400 transition-colors">
 <span class="w-6 h-px bg-line group-hover:bg-line"></span>
 Research • Targeting • Participation
 </div>
 </div>

 <!-- Card 3 -->
 <div class="reveal group relative rounded-[20px] bg-surface border border-line p-7 lg:p-8 hover:border-line hover:bg-zinc-800 transition-colors" style="transition-delay:120ms">
 <div class="w-10 h-10 rounded-xl bg-zinc-800 border border-line flex items-center justify-center text-white">
 <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
 </div>
 <h3 class="mt-6 font-semibold text-lg tracking-tight">Reddit Reputation Management</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">Monitor brand mentions, respond strategically, and help shape how your brand is perceived across Reddit threads and search.</p>
 <div class="mt-5 inline-flex items-center gap-2 text-xs font-medium text-zinc-400 group-hover:text-zinc-400 transition-colors">
 <span class="w-6 h-px bg-line group-hover:bg-line"></span>
 Monitoring • Response • Search
 </div>
 </div>

 <!-- Card 4 -->
 <div class="reveal group relative rounded-[20px] bg-accent text-zinc-900 p-7 lg:p-8" style="transition-delay:180ms">
 <div class="w-10 h-10 rounded-xl bg-surface text-white flex items-center justify-center">
 <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
 </div>
 <h3 class="mt-6 font-semibold text-lg tracking-tight">Lead & Growth Campaigns</h3>
 <p class="mt-2 text-sm leading-6 ">Turn relevant Reddit conversations into qualified traffic, leads, and customers — without ever sounding like an ad.</p>
 <div class="mt-5 inline-flex items-center gap-2 text-xs font-semibold ">
 <span class="w-6 h-px bg-zinc-300"></span>
 Traffic • Leads • Customers
 </div>
 </div>
 </div>
 </div>
 </section>

 <!-- How It Works -->
 <section id="how-it-works" class="border-t border-line bg-surface">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-20 lg:py-28">
 <div class="reveal max-w-2xl">
 <p class="text-xs font-semibold tracking-[0.14em] uppercase text-accent">Our process</p>
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl leading-[1.05]">A Smarter Way to Market on Reddit</h2>
 <p class="mt-3 text-sm leading-6 text-zinc-400">A clear, repeatable system — not guesswork. Every step is tailored to the culture of the communities you want to reach.</p>
 </div>

 <div class="mt-12 relative">
 <!-- desktop line -->
 <div aria-hidden="true" class="hidden lg:block absolute top-[34px] left-[5%] right-[5%] h-px bg-gradient-to-r from-white/0 via-stone-200 to-white/0"></div>

 <div class="grid lg:grid-cols-4 gap-6 lg:gap-5">
 <!-- Step 01 -->
 <div class="reveal relative rounded-[20px] bg-surface border border-line p-6 lg:p-7">
 <div class="flex items-center gap-3">
 <div class="w-10 h-10 rounded-full bg-accent text-zinc-900 flex items-center justify-center font-display font-bold text-sm">01</div>
 <div class="h-px flex-1 bg-line lg:hidden"></div>
 <span class="text-xs font-semibold tracking-widest uppercase text-zinc-400 lg:hidden">Step One</span>
 </div>
 <h3 class="mt-5 font-semibold text-base">Research</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">We understand your product, audience, competitors, and relevant Reddit communities — down to individual subreddit rules.</p>
 <div class="mt-4 text-xs font-medium text-accent">Audience • Competitors • Subreddits</div>
 </div>

 <!-- Step 02 -->
 <div class="reveal relative rounded-[20px] bg-surface border border-line p-6 lg:p-7" style="transition-delay:80ms">
 <div class="flex items-center gap-3">
 <div class="w-10 h-10 rounded-full bg-white text-zinc-900 flex items-center justify-center font-display font-bold text-sm">02</div>
 <div class="h-px flex-1 bg-line lg:hidden"></div>
 <span class="text-xs font-semibold tracking-widest uppercase text-zinc-400 lg:hidden">Step Two</span>
 </div>
 <h3 class="mt-5 font-semibold text-base">Strategy</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">We create a subreddit-specific strategy based on community culture and your business goals. No one-size-fits-all playbook.</p>
 <div class="mt-4 text-xs font-medium text-zinc-400">Subreddit-specific • Goal-aligned</div>
 </div>

 <!-- Step 03 -->
 <div class="reveal relative rounded-[20px] bg-surface border border-line p-6 lg:p-7" style="transition-delay:160ms">
 <div class="flex items-center gap-3">
 <div class="w-10 h-10 rounded-full bg-zinc-800 border border-line text-white flex items-center justify-center font-display font-bold text-sm">03</div>
 <div class="h-px flex-1 bg-line lg:hidden"></div>
 <span class="text-xs font-semibold tracking-widest uppercase text-zinc-400 lg:hidden">Step Three</span>
 </div>
 <h3 class="mt-5 font-semibold text-base">Engage</h3>
 <p class="mt-2 text-sm leading-6 text-zinc-400">We participate in conversations naturally and create value without sounding like traditional advertising.</p>
 <div class="mt-4 text-xs font-medium text-zinc-400">Value first • Pitch last</div>
 </div>

 <!-- Step 04 -->
 <div class="reveal relative rounded-[20px] bg-accent text-zinc-900 p-6 lg:p-7" style="transition-delay:240ms">
 <div class="flex items-center gap-3">
 <div class="w-10 h-10 rounded-full bg-surface text-white flex items-center justify-center font-display font-bold text-sm">04</div>
 <div class="h-px flex-1 bg-line lg:hidden"></div>
 <span class="text-xs font-semibold tracking-widest uppercase lg:hidden">Step Four</span>
 </div>
 <h3 class="mt-5 font-semibold text-base">Grow</h3>
 <p class="mt-2 text-sm leading-6 ">We measure results, refine the strategy, and scale what works — so growth compounds over time.</p>
 <div class="mt-4 text-xs font-semibold ">Measure • Refine • Scale</div>
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
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl leading-[1.05]">Why Brands Are Paying Attention to Reddit</h2>
 <p class="mt-4 text-sm leading-7 text-zinc-400">
 Reddit isn’t just social media — it’s where real buying decisions are influenced. Users search for recommendations, solutions, reviews, comparisons, and lived experiences before they buy.
 </p>
 <p class="mt-3 text-sm leading-7 text-zinc-400">
 When a brand shows up helpfully in those moments, trust transfers quickly. That’s why teams who understand community culture are making Reddit a core channel — not an afterthought.
 </p>
 <p class="mt-6 text-xs leading-5 text-zinc-400 border-l-2 border-line pl-4">
 Note: We don’t present inflated platform statistics as facts. The value below is based on how people actually use Reddit — not vanity metrics.
 </p>
 </div>

 <div class="lg:col-span-7">
 <div class="grid sm:grid-cols-2 gap-4">
 <div class="reveal rounded-[20px] bg-surface border border-line p-6">
 <div class="w-8 h-8 rounded-lg bg-zinc-800 border border-zinc-700 flex items-center justify-center text-accent">
 <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
 </div>
 <h3 class="mt-4 font-semibold text-sm">High-intent conversations</h3>
 <p class="mt-1.5 text-sm leading-6 text-zinc-400">People ask for help right before they buy. The right answer at the right time beats any ad.</p>
 </div>

 <div class="reveal rounded-[20px] bg-surface border border-line p-6" style="transition-delay:60ms">
 <div class="w-8 h-8 rounded-lg bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
 </div>
 <h3 class="mt-4 font-semibold text-sm">Niche communities</h3>
 <p class="mt-1.5 text-sm leading-6 text-zinc-400">From SaaS to skincare, there’s a subreddit where your exact audience already gathers.</p>
 </div>

 <div class="reveal rounded-[20px] bg-surface border border-line p-6" style="transition-delay:120ms">
 <div class="w-8 h-8 rounded-lg bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
 </div>
 <h3 class="mt-4 font-semibold text-sm">Authentic recommendations</h3>
 <p class="mt-1.5 text-sm leading-6 text-zinc-400">Reddit trusts lived experience over polished marketing. Helpful replies become trusted referrals.</p>
 </div>

 <div class="reveal rounded-[20px] bg-surface border border-line p-6" style="transition-delay:180ms">
 <div class="w-8 h-8 rounded-lg bg-zinc-800 border border-line flex items-center justify-center text-zinc-400">
 <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
 </div>
 <h3 class="mt-4 font-semibold text-sm">Long-lasting visibility</h3>
 <p class="mt-1.5 text-sm leading-6 text-zinc-400">Helpful Reddit threads rank on Google for years and keep driving qualified traffic long after posting.</p>
 </div>
 </div>

 <div class="reveal mt-4 rounded-full bg-zinc-800 border border-line px-4 py-3 flex flex-wrap items-center gap-3 text-xs">
 <span class="px-2.5 py-1 rounded-full bg-white text-zinc-900 font-semibold">Search-driven</span>
 <span class="text-zinc-400">Reviews • Comparisons • Alternatives • “Best ___ for ___”</span>
 <span class="ml-auto hidden sm:inline text-zinc-400">Where Reddit shines</span>
 </div>
 </div>
 </div>
 </div>
 </section>

 <!-- Why GrowwDaddy -->
 <section class="border-t border-line bg-surface">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-14 lg:py-20">
 <div class="rounded-[28px] bg-surface border border-line overflow-hidden">
 <div class="grid lg:grid-cols-12 gap-0">
 <div class="lg:col-span-7 p-8 lg:p-10 xl:p-12">
 <p class="text-xs font-semibold tracking-[0.14em] uppercase text-accent">Why GrowwDaddy</p>
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl leading-[1.05]">We Don’t Spam Reddit.<br>We Understand It.</h2>
 <p class="mt-4 text-sm leading-7 text-zinc-400">We’ve spent time inside the communities we serve. We know what gets upvoted, what gets ignored, and what gets removed — and we use that to protect your brand while growing it.</p>

 <div class="mt-8 space-y-4">
 <div class="flex gap-4">
 <div class="w-8 h-8 rounded-full bg-accent flex items-center justify-center text-zinc-900 shrink-0 mt-0.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12l5 5l10 -10"/></svg></div>
 <div>
 <div class="font-semibold text-sm">Community-first approach</div>
 <div class="text-sm leading-6 text-zinc-400">We prioritize contribution over promotion. Every interaction should leave the community better.</div>
 </div>
 </div>
 <div class="flex gap-4">
 <div class="w-8 h-8 rounded-full bg-zinc-900 text-white flex items-center justify-center shrink-0 mt-0.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12l5 5l10 -10"/></svg></div>
 <div>
 <div class="font-semibold text-sm">Human-sounding communication</div>
 <div class="text-sm leading-6 text-zinc-400">No AI-spam, no corporate jargon. We write like people who actually belong there.</div>
 </div>
 </div>
 <div class="flex gap-4">
 <div class="w-8 h-8 rounded-full bg-zinc-800 border border-line flex items-center justify-center text-white shrink-0 mt-0.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12l5 5l10 -10"/></svg></div>
 <div>
 <div class="font-semibold text-sm">Subreddit-specific strategies</div>
 <div class="text-sm leading-6 text-zinc-400">Custom research and playbooks for each community — not recycled templates.</div>
 </div>
 </div>
 <div class="flex gap-4">
 <div class="w-8 h-8 rounded-full bg-zinc-800 border border-line flex items-center justify-center text-white shrink-0 mt-0.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12l5 5l10 -10"/></svg></div>
 <div>
 <div class="font-semibold text-sm">Long-term reputation building</div>
 <div class="text-sm leading-6 text-zinc-400">We play the long game so your brand compounds trust instead of burning it.</div>
 </div>
 </div>
 <div class="flex gap-4">
 <div class="w-8 h-8 rounded-full bg-zinc-800 border border-line flex items-center justify-center text-white shrink-0 mt-0.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12l5 5l10 -10"/></svg></div>
 <div>
 <div class="font-semibold text-sm">Data-driven optimization</div>
 <div class="text-sm leading-6 text-zinc-400">We track what resonates and double down on what drives real conversations and leads.</div>
 </div>
 </div>
 </div>
 </div>

 <div class="lg:col-span-5 bg-surface border-t lg:border-t-0 lg:border-l border-line p-8 lg:p-10 xl:p-12 flex flex-col">
 <div class="rounded-[20px] bg-accent text-zinc-900 p-7">
 <div class="text-sm font-bold tracking-widest uppercase ">Our philosophy</div>
 <blockquote class="mt-3 font-display font-semibold text-lg leading-[1.25] tracking-tight">
 “The goal isn’t to make your brand look like it’s everywhere. It’s to make your brand show up in the right conversations.”
 </blockquote>
 <div class="mt-4 text-sm font-medium ">— GrowwDaddy Team</div>
 </div>

 <div class="mt-6 rounded-2xl bg-zinc-800 border border-line p-5">
 <div class="flex items-center gap-3">
 <div class="w-8 h-8 rounded-full bg-zinc-900 flex items-center justify-center text-white font-bold text-xs">✓</div>
 <div class="text-sm font-semibold">What you won’t get from us</div>
 </div>
 <ul class="mt-3 space-y-2 text-sm leading-6 text-zinc-400">
 <li class="flex gap-2"><span class="text-zinc-300">—</span> Mass DMing or vote manipulation</li>
 <li class="flex gap-2"><span class="text-zinc-300">—</span> Generic copy-pasted comments</li>
 <li class="flex gap-2"><span class="text-zinc-300">—</span> Fake testimonials or inflated claims</li>
 <li class="flex gap-2"><span class="text-zinc-300">—</span> Short-term spam that risks your reputation</li>
 </ul>
 </div>

 <div class="mt-auto pt-6 flex items-center gap-3 text-xs text-zinc-400">
 <span class="w-2 h-2 rounded-full bg-accent"></span>
 Trusted by early-stage & growing brands
 </div>
 </div>
 </div>
 </div>
 </div>
 </section>

 <!-- Results -->
 

 <!-- FAQ -->
 <section id="faq" class="border-t border-line bg-surface">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-20 lg:py-28">
 <div class="grid lg:grid-cols-12 gap-10">
 <div class="lg:col-span-4">
 <p class="text-xs font-semibold tracking-[0.14em] uppercase text-accent">FAQ</p>
 <h2 class="mt-3 font-display font-semibold tracking-[-0.02em] text-4xl leading-[1.05]">Questions,<br><span class="text-zinc-400">answered honestly.</span></h2>
 <p class="mt-4 text-sm leading-6 text-zinc-400">No hype, no fine print tricks. If Reddit isn’t the right fit for your offer, we’ll tell you.</p>
 <div class="mt-6 inline-flex items-center gap-2 text-xs text-zinc-400">
 <span class="w-2 h-2 rounded-full bg-accent"></span>
 Still curious?
 <a href="mailto:<?php echo htmlspecialchars($email); ?>" class="underline decoration-stone-300 underline-offset-4 hover:text-white">Email us</a>
 </div>
 </div>

 <div class="lg:col-span-8">
 <div class="rounded-[20px] bg-surface border border-line divide-y divide-stone-200 overflow-hidden">
 <!-- Q1 -->
 <div class="faq-item">
 <button class="faq-btn w-full flex items-center justify-between gap-6 px-6 lg:px-8 py-6 text-left group" aria-expanded="true">
 <span class="font-semibold text-sm leading-6 pr-2">Can you promote any business on Reddit?</span>
 <span class="w-8 h-8 rounded-full border border-line bg-zinc-800 flex items-center justify-center shrink-0 group-hover:bg-line transition-colors">
 <svg class="faq-icon transition-transform duration-200 rotate-45" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 5v14M5 12h14"/></svg>
 </span>
 </button>
 <div class="faq-panel px-6 lg:px-8 pb-6">
 <p class="text-sm leading-7 text-zinc-400 max-w-[640px]">
 Reddit marketing works best when your product genuinely provides value and you’re willing to respect individual subreddit rules. We’re selective — we only work with offers that can earn trust through helpful participation. If your category is heavily restricted or your audience isn’t active on Reddit, we’ll recommend a better channel rather than forcing it.
 </p>
 </div>
 </div>

 <!-- Q2 -->
 <div class="faq-item">
 <button class="faq-btn w-full flex items-center justify-between gap-6 px-6 lg:px-8 py-6 text-left group" aria-expanded="false">
 <span class="font-semibold text-sm leading-6 pr-2">Do you create Reddit accounts for clients?</span>
 <span class="w-8 h-8 rounded-full border border-line bg-zinc-800 flex items-center justify-center shrink-0 group-hover:bg-line transition-colors">
 <svg class="faq-icon transition-transform duration-200" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 5v14M5 12h14"/></svg>
 </span>
 </button>
 <div class="faq-panel hidden px-6 lg:px-8 pb-6">
 <p class="text-sm leading-7 text-zinc-400 max-w-[640px]">
 We build and manage credible accounts transparently and ethically. That means creating profiles that build real history, contribute value over time, and never pretend to be independent customers. We don’t use deceptive identities, vote manipulation, or fake personas. Everything is disclosed to you, and we follow Reddit’s terms and each subreddit’s rules.
 </p>
 </div>
 </div>

 <!-- Q3 -->
 <div class="faq-item">
 <button class="faq-btn w-full flex items-center justify-between gap-6 px-6 lg:px-8 py-6 text-left group" aria-expanded="false">
 <span class="font-semibold text-sm leading-6 pr-2">How long does Reddit marketing take to work?</span>
 <span class="w-8 h-8 rounded-full border border-line bg-zinc-800 flex items-center justify-center shrink-0 group-hover:bg-line transition-colors">
 <svg class="faq-icon transition-transform duration-200" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 5v14M5 12h14"/></svg>
 </span>
 </button>
 <div class="faq-panel hidden px-6 lg:px-8 pb-6">
 <p class="text-sm leading-7 text-zinc-400 max-w-[640px]">
 Results vary by niche, subreddit activity, competition, and how new your brand is to Reddit. Most clients see initial engagement within 2–4 weeks, with compounding results over 2–3 months as trust and visibility build. Reddit is a long-term channel — closer to SEO than paid ads — so we optimize for steady growth, not overnight spikes.
 </p>
 </div>
 </div>

 <!-- Q4 -->
 <div class="faq-item">
 <button class="faq-btn w-full flex items-center justify-between gap-6 px-6 lg:px-8 py-6 text-left group" aria-expanded="false">
 <span class="font-semibold text-sm leading-6 pr-2">Do you guarantee results?</span>
 <span class="w-8 h-8 rounded-full border border-line bg-zinc-800 flex items-center justify-center shrink-0 group-hover:bg-line transition-colors">
 <svg class="faq-icon transition-transform duration-200" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 5v14M5 12h14"/></svg>
 </span>
 </button>
 <div class="faq-panel hidden px-6 lg:px-8 pb-6">
 <p class="text-sm leading-7 text-zinc-400 max-w-[640px]">
 No legitimate agency can guarantee specific lead or revenue numbers — especially on Reddit, where communities control visibility. What we do guarantee is a disciplined, measurable process: clear strategy, consistent execution, weekly reporting, and continuous optimization. We focus on qualified conversations and signal that you can track.
 </p>
 </div>
 </div>

 <!-- Q5 -->
 <div class="faq-item">
 <button class="faq-btn w-full flex items-center justify-between gap-6 px-6 lg:px-8 py-6 text-left group" aria-expanded="false">
 <span class="font-semibold text-sm leading-6 pr-2">Can you manage our Reddit presence for us?</span>
 <span class="w-8 h-8 rounded-full border border-line bg-zinc-800 flex items-center justify-center shrink-0 group-hover:bg-line transition-colors">
 <svg class="faq-icon transition-transform duration-200" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 5v14M5 12h14"/></svg>
 </span>
 </button>
 <div class="faq-panel hidden px-6 lg:px-8 pb-6">
 <p class="text-sm leading-7 text-zinc-400 max-w-[640px]">
 Yes. We can handle the full scope — strategy, subreddit research, account activity, daily monitoring, engagement, and reporting — while keeping you in the loop on anything that needs your input. You can also choose a lighter collaboration where we advise and you handle replies. Either way, you get a clear dashboard of what was done and what’s next.
 </p>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </section>

 <!-- Final CTA -->
 <section id="contact" class="border-t border-line bg-surface">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-14 lg:py-20">
 <div class="relative overflow-hidden rounded-[32px] bg-surface border border-line">
 <!-- subtle accent glow -->
 <div aria-hidden="true" class="pointer-events-none absolute -top-24 -right-24 w-[520px] h-[520px] bg-[radial-gradient(ellipse_at_center,_rgba(255,69,0,0.08),_transparent_60%)]"></div>
 <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,_rgba(255,255,255,0.02),_transparent_40%)]"></div>

 <div class="relative grid lg:grid-cols-12 gap-8 p-8 lg:p-12 xl:p-14 items-center">
 <div class="lg:col-span-7">
 <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent text-zinc-900 text-xs font-bold tracking-widest uppercase">Free Strategy Call</div>
 <h2 class="mt-4 font-display font-semibold tracking-[-0.02em] text-4xl lg:text-4xl leading-[1.05]">Ready to Grow Where<br>Your Customers Are Talking?</h2>
 <p class="mt-4 text-base leading-7 text-zinc-400 max-w-[520px]">Let’s build a Reddit strategy that earns attention instead of interrupting it. We’ll audit your niche, map relevant communities, and show you where the opportunity is.</p>

 <div class="mt-8 flex flex-col sm:flex-row gap-3">
 <a href="<?php echo htmlspecialchars($ctaUrl); ?>" class="inline-flex items-center justify-center h-[48px] px-7 rounded-full bg-accent text-zinc-900 font-semibold text-sm hover:bg-accentHover transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-accent">
 Book a Free Strategy Call
 <svg class="ml-2" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M6 3l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
 </a>
 <a href="mailto:<?php echo htmlspecialchars($email); ?>" class="inline-flex items-center justify-center h-[48px] px-7 rounded-full border border-line bg-zinc-800 text-white font-medium text-sm hover:bg-zinc-800 transition-colors">
 <?php echo htmlspecialchars($email); ?>
 </a>
 </div>

 <div class="mt-6 flex flex-wrap items-center gap-4 text-xs text-zinc-400">
 <span class="inline-flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-accent"></span> No pitch deck spam</span>
 <span class="w-px h-3 bg-line hidden sm:block"></span>
 <span>30-minute audit • Actionable next steps</span>
 </div>
 </div>

 <div class="lg:col-span-5">
 <div class="rounded-[20px] bg-surface border border-line p-6">
 <div class="text-sm font-semibold">What you’ll get on the call</div>
 <ul class="mt-4 space-y-3">
 <li class="flex gap-3 text-sm leading-6 text-zinc-400"><span class="w-6 h-6 rounded-full bg-accent text-zinc-900 flex items-center justify-center shrink-0 mt-0.5"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12l5 5l10 -10"/></svg></span> Subreddit map: where your audience actually hangs out</li>
 <li class="flex gap-3 text-sm leading-6 text-zinc-400"><span class="w-6 h-6 rounded-full bg-zinc-900 text-white flex items-center justify-center shrink-0 mt-0.5"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12l5 5l10 -10"/></svg></span> Content angles that fit each community’s culture</li>
 <li class="flex gap-3 text-sm leading-6 text-zinc-400"><span class="w-6 h-6 rounded-full bg-zinc-800 border border-line flex items-center justify-center text-white shrink-0 mt-0.5"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12l5 5l10 -10"/></svg></span> Honest take on whether Reddit is the right bet right now</li>
 </ul>
 <div class="mt-6 rounded-xl bg-zinc-800 border border-line px-4 py-3 flex items-center gap-3">
 <img src="https://i.pravatar.cc/100?img=15" alt="" class="w-9 h-9 rounded-full object-cover">
 <div class="text-xs">
 <div class="font-semibold text-white">Founder-led strategy</div>
 <div class="text-zinc-400">You’ll speak with someone who actually uses Reddit daily</div>
 </div>
 <span class="ml-auto w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </section>

 <!-- Footer -->
 <footer class="border-t border-line bg-bg">
 <div class="max-w-[1440px] mx-auto px-6 lg:px-8 py-12">
 <div class="grid lg:grid-cols-12 gap-10">
 <div class="lg:col-span-6">
 <a href="#" class="flex items-center gap-3">
 <div class="w-8 h-8 rounded-lg bg-white text-zinc-900 flex items-center justify-center font-display font-bold text-sm">GD</div>
 <span class="font-display font-semibold text-lg tracking-tight">GrowwDaddy</span>
 </a>
 <p class="mt-3 text-sm leading-6 text-zinc-400 max-w-[360px]">Reddit marketing built around trust, conversations, and growth. We help brands earn attention instead of interrupting it.</p>
 <div class="mt-5 flex items-center gap-3">
 <a href="mailto:<?php echo htmlspecialchars($email); ?>" class="text-sm font-medium text-zinc-400 hover:text-white underline decoration-stone-300 underline-offset-4"><?php echo htmlspecialchars($email); ?></a>
 <span class="w-1 h-1 bg-zinc-300 rounded-full"></span>
 <span class="text-xs text-zinc-400">Remote • Global</span>
 </div>
 </div>

 <div class="lg:col-span-6 lg:flex lg:justify-end gap-16">
 <div>
 <div class="text-xs font-semibold tracking-widest uppercase text-zinc-400">Navigate</div>
 <nav class="mt-4 flex flex-col gap-2.5">
 <a href="#services" class="text-sm text-zinc-400 hover:text-white transition-colors">Services</a>
 <a href="#how-it-works" class="text-sm text-zinc-400 hover:text-white transition-colors">How It Works</a>
 <a href="#faq" class="text-sm text-zinc-400 hover:text-white transition-colors">FAQ</a>
 <a href="#contact" class="text-sm text-zinc-400 hover:text-white transition-colors">Contact</a>
 </nav>
 </div>
 <div class="mt-8 lg:mt-0">
 <div class="text-xs font-semibold tracking-widest uppercase text-zinc-400">Legal</div>
 <nav class="mt-4 flex flex-col gap-2.5">
 <a href="#" class="text-sm text-zinc-400 hover:text-white transition-colors">Privacy Policy</a>
 <a href="#" class="text-sm text-zinc-400 hover:text-white transition-colors">Terms of Service</a>
 
 </nav>
 </div>
 </div>
 </div>

 <div class="mt-10 pt-6 border-t border-line flex flex-col sm:flex-row items-center justify-between gap-3">
 <p class="text-xs text-zinc-400">© <?php echo $year; ?> GrowwDaddy. All rights reserved.</p>
 <p class="text-xs text-zinc-400">Built for clarity — no fake testimonials, no inflated stats.</p>
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
 document.querySelectorAll('.mobile-link').forEach(a => a.addEventListener('click', () => { if(menuOpen) toggleMenu(); }));

 // FAQ accordion
 document.querySelectorAll('.faq-item').forEach(item => {
 const btn = item.querySelector('.faq-btn');
 const panel = item.querySelector('.faq-panel');
 const icon = item.querySelector('.faq-icon');
 btn.addEventListener('click', () => {
 const isOpen = btn.getAttribute('aria-expanded') === 'true';
 // close all
 document.querySelectorAll('.faq-item').forEach(other => {
 const ob = other.querySelector('.faq-btn');
 const op = other.querySelector('.faq-panel');
 const oi = other.querySelector('.faq-icon');
 ob.setAttribute('aria-expanded', 'false');
 op.classList.add('hidden');
 oi.classList.remove('rotate-45');
 });
 // open clicked if was closed
 if (!isOpen) {
 btn.setAttribute('aria-expanded', 'true');
 panel.classList.remove('hidden');
 icon.classList.add('rotate-45');
 }
 });
 });

 // Smooth scroll offset for sticky nav
 document.querySelectorAll('a[href^="#"]').forEach(a => {
 a.addEventListener('click', e => {
 const href = a.getAttribute('href');
 if (href.length > 1) {
 const target = document.querySelector(href);
 if (target) {
 e.preventDefault();
 const navH = document.getElementById('navbar').offsetHeight;
 const top = target.getBoundingClientRect().top + window.scrollY - navH - 12;
 window.scrollTo({ top, behavior: 'smooth' });
 if (menuOpen) toggleMenu();
 history.pushState(null, null, href);
 }
 }
 });
 });

 // Scroll reveal
 const observer = new IntersectionObserver((entries) => {
 entries.forEach(entry => {
 if (entry.isIntersecting) {
 entry.target.classList.add('in');
 observer.unobserve(entry.target);
 }
 });
 }, { threshold: 0.12 });
 document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

 // Navbar border on scroll
 const navbar = document.getElementById('navbar');
 let ticking = false;
 window.addEventListener('scroll', () => {
 if (!ticking) {
 window.requestAnimationFrame(() => {
 if (window.scrollY > 10) {
 navbar.classList.add('shadow-soft');
 navbar.classList.replace('border-line', 'border-line');
 } else {
 navbar.classList.remove('shadow-soft');
 navbar.classList.replace('border-line', 'border-line');
 }
 ticking = false;
 });
 ticking = true;
 }
 }, { passive: true });
 </script>
</body>
</html>
