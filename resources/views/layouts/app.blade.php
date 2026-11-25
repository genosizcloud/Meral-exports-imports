<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#0E382B">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

@php
    $seoTitle    = ($pageTitle ?? null) ? ($pageTitle . ($settings['seo_title_separator'] ?? ' | ') . ($settings['company_name'] ?? 'Meral Exports')) : ($settings['seo_site_title'] ?? 'Meral Exports & Imports – Premium Agricultural Commodities');
    $seoDesc     = $pageDesc    ?? $settings['seo_description']   ?? 'Meral Exports & Imports Pvt Ltd is a premier Indian agricultural trading house specializing in certified wholesale export of Malabar spices, extra long grain Basmati rice, pulses, and oilseeds to international ports.';
    $seoRobots   = $settings['seo_robots']        ?? 'index, follow';
    $seoCanon    = rtrim($settings['seo_canonical_url'] ?? url('/'), '/');
    $siteLogo    = asset('primary-logo.png');
    $seoOgImage  = public_image_url($settings['seo_og_image'] ?? null, $siteLogo);
    $seoGaId     = $settings['seo_google_analytics'] ?? '';
    $seoGtmId    = $settings['seo_gtm_id']        ?? '';
    $companyName = $settings['company_name']      ?? 'Meral Exports & Imports Pvt Ltd';
    $phone1      = $settings['phone1']            ?? '';
    $phone2      = $settings['phone2']            ?? '';
    $email1      = $settings['email1']            ?? '';
    $currentRoute = request()->path();
@endphp

<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDesc }}">
@if(!empty($settings['seo_keywords']))<meta name="keywords" content="{{ $settings['seo_keywords'] }}">@endif
<meta name="robots" content="{{ $seoRobots }}">
<link rel="canonical" href="{{ $seoCanon }}/{{ $currentRoute === '/' ? '' : $currentRoute }}">

@if(!empty($settings['seo_google_verify']))<meta name="google-site-verification" content="{{ $settings['seo_google_verify'] }}">@endif
@if(!empty($settings['seo_bing_verify']))<meta name="msvalidate.01" content="{{ $settings['seo_bing_verify'] }}">@endif

<meta property="og:type"        content="{{ $settings['seo_og_type'] ?? 'website' }}">
<meta property="og:url"         content="{{ url()->current() }}">
<meta property="og:title"       content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDesc }}">
<meta property="og:image"       content="{{ $seoOgImage }}">
<meta property="og:image:width"  content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name"   content="{{ $companyName }}">
<meta property="og:locale"      content="en_IN">

<meta name="twitter:card"        content="{{ $settings['seo_twitter_card'] ?? 'summary_large_image' }}">
<meta name="twitter:title"       content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDesc }}">
<meta name="twitter:image"       content="{{ $seoOgImage }}">
@if(!empty($settings['seo_twitter_site']))<meta name="twitter:site" content="{{ $settings['seo_twitter_site'] }}">@endif

<link rel="icon" type="image/png" href="{{ asset('primary-logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('primary-logo.png') }}">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">

@php
    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $companyName,
        'url' => url('/'),
        'logo' => $siteLogo,
        'image' => $siteLogo,
        'email' => $email1 ?: null,
        'telephone' => $phone1 ?: null,
        'sameAs' => array_values(array_filter([
            $settings['facebook_url'] ?? null,
            $settings['instagram_url'] ?? null,
            $settings['whatsapp_url'] ?? null,
        ])),
    ];
@endphp
<script type="application/ld+json">{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

@yield('schema')

@if($seoGtmId)
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','{{ $seoGtmId }}');</script>
@endif
@if($seoGaId)
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $seoGaId }}"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','{{ $seoGaId }}',{'anonymize_ip':true});</script>
@endif

<!-- Preserved Original Fonts (Oswald via Bunny Fonts) -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=oswald:300,400,500,600,700" rel="stylesheet">

<!-- Material Symbols Outlined for Professional B2B Iconography -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

<!-- Tailwind Play CDN for Stitch Layout Fidelity -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        'accent': '#9C7428',
        'forest-deep': '#08241B',
        'gold-light': '#DFBE7E',
        'gold-muted': '#F5EEDA',
        'charcoal': '#19211E',
        'slate-muted': '#5A6863',
        'border-subtle': '#E3DDD2',
        'light-primary': '#0E382B',
        'light-on-primary': '#FFFFFF',
        'light-secondary': '#1C4E3D',
        'light-on-secondary': '#FFFFFF',
        'light-surface': '#FAF8F5',
        'light-on-surface': '#19211E',
        'light-surface-container': '#F2EFE9',
        'light-surface-container-low': '#F7F5F0',
        'light-surface-container-high': '#EAE5DC',
        'light-outline': '#73807B',
        'light-outline-variant': '#D5CEC2',
      },
      fontFamily: {
        'display': ['"Oswald"', 'sans-serif'],
        'headline': ['"Oswald"', 'sans-serif'],
        'title': ['"Oswald"', 'sans-serif'],
        'body': ['"Oswald"', 'sans-serif'],
        'label': ['"Oswald"', 'sans-serif'],
      },
    },
  },
};
</script>

<style>
:root {
  --navy: #0E382B;
  --navy-dark: #08241B;
  --gold: #9C7428;
  --gold-light: #DFBE7E;
  --cream: #FAF8F5;
  --border: #E3DDD2;
  --charcoal: #19211E;
}
* { box-sizing: border-box; }
body {
  font-family: 'Oswald', sans-serif;
  color: var(--charcoal);
  background-color: var(--cream);
  -webkit-font-smoothing: antialiased;
}
.material-symbols-outlined {
  display: inline-block;
  width: 1em;
  height: 1em;
  line-height: 1 !important;
  overflow: hidden;
  white-space: nowrap;
  vertical-align: middle;
}
/* Accessible focus outline */
:focus-visible {
  outline: 2px solid var(--gold);
  outline-offset: 2px;
}

/* ── UNIVERSAL TEXT ANIMATION ENGINE (All Pages & Screens) ── */
/* Base fallback: All text elements are completely visible and in place if JS is disabled or fails */
.text-reveal-element,
.hero-word-wrap > span,
.text-reveal-badge,
.text-reveal-actions,
.hero-text-block .text-reveal-badge,
.hero-text-block .text-reveal-actions {
  opacity: 1;
  transform: none;
}

/* Progressive enhancement: Activated strictly when JS confirms support & reduced motion is false */
html.js-motion .hero-word-wrap {
  display: inline-block;
  overflow: hidden;
  vertical-align: bottom;
  padding-bottom: 0.16em;
  margin-bottom: -0.16em;
  line-height: inherit;
}

html.js-motion .hero-word-wrap > span {
  display: inline-block;
  opacity: 0;
  transform: translateY(115%);
  transition: transform 520ms cubic-bezier(0.16, 1, 0.3, 1),
              opacity 420ms cubic-bezier(0.16, 1, 0.3, 1);
  will-change: transform, opacity;
}

html.js-motion .hero-title-active .hero-word-wrap > span {
  opacity: 1;
  transform: translateY(0);
}

html.js-motion .text-reveal-element,
html.js-motion .hero-text-block .text-reveal-badge,
html.js-motion .hero-text-block .text-reveal-actions {
  opacity: 0;
  transform: translateY(16px);
  transition: opacity 520ms cubic-bezier(0.16, 1, 0.3, 1),
              transform 520ms cubic-bezier(0.16, 1, 0.3, 1);
  will-change: opacity, transform;
}

html.js-motion .text-reveal-element.is-revealed,
html.js-motion .hero-text-block.is-revealed .text-reveal-badge,
html.js-motion .hero-text-block.is-revealed .text-reveal-actions {
  opacity: 1;
  transform: translateY(0);
}

/* ── Commodity Verticals: Mobile Stack & Upward Scroll Reveal ── */
.mobile-stack-card {
  opacity: 1;
  transform: none;
}

html.js-motion .mobile-stack-card {
  opacity: 0;
  transform: translateY(48px);
  transition: opacity 550ms cubic-bezier(0.16, 1, 0.3, 1),
              transform 550ms cubic-bezier(0.16, 1, 0.3, 1),
              box-shadow 300ms ease;
  will-change: transform, opacity;
}

html.js-motion .mobile-stack-card.is-revealed {
  opacity: 1;
  transform: none;
}

@media (max-width: 639px) {
  .mobile-commodity-stack {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
  }
  .mobile-commodity-stack .mobile-stack-card {
    position: sticky;
    top: calc(74px + var(--stack-index, 0) * 14px);
    z-index: calc(10 + var(--stack-index, 0));
    box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.08), 0 12px 32px rgba(0, 0, 0, 0.12);
    background: #ffffff;
  }
}

/* ── Ocean Corridors: Left & Right Scroll Entrance Tiles ── */
.corridor-tile-from-left,
.corridor-tile-from-right {
  opacity: 1;
  transform: none;
}

html.js-motion .corridor-tile-from-left {
  opacity: 0;
  transform: translateX(-45px);
  transition: opacity 580ms cubic-bezier(0.16, 1, 0.3, 1),
              transform 580ms cubic-bezier(0.16, 1, 0.3, 1);
  will-change: transform, opacity;
}

html.js-motion .corridor-tile-from-right {
  opacity: 0;
  transform: translateX(45px);
  transition: opacity 580ms cubic-bezier(0.16, 1, 0.3, 1),
              transform 580ms cubic-bezier(0.16, 1, 0.3, 1);
  will-change: transform, opacity;
}

html.js-motion .corridor-tile-from-left.is-revealed,
html.js-motion .corridor-tile-from-right.is-revealed {
  opacity: 1;
  transform: none;
}

/* Desktop Enhancements: 1024px onwards */
@media (min-width: 1024px) {
  html.js-motion .text-reveal-element,
  html.js-motion .hero-text-block .text-reveal-badge,
  html.js-motion .hero-text-block .text-reveal-actions {
    transform: translateY(22px);
    transition-duration: 600ms;
  }
  html.js-motion .hero-word-wrap > span {
    transition-duration: 580ms;
  }
}

@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
  html.js-motion .text-reveal-element,
  html.js-motion .hero-word-wrap > span,
  html.js-motion .hero-text-block .text-reveal-badge,
  html.js-motion .hero-text-block .text-reveal-actions,
  html.js-motion .mobile-stack-card,
  html.js-motion .corridor-tile-from-left,
  html.js-motion .corridor-tile-from-right {
    opacity: 1 !important;
    transform: none !important;
    transition: none !important;
    animation: none !important;
  }
}

/* ── SMART STICKY GLASS HEADER (Auto-hide on scroll down, show on scroll up) ── */
#mainHeader {
  position: sticky;
  top: 0;
  z-index: 50;
  background: rgba(255, 255, 255, 0.48) !important;
  backdrop-filter: blur(24px) saturate(190%) contrast(105%) !important;
  -webkit-backdrop-filter: blur(24px) saturate(190%) contrast(105%) !important;
  border-bottom: 1px solid rgba(255, 255, 255, 0.35) !important;
  box-shadow: 0 4px 25px -2px rgba(8, 36, 27, 0.12), 0 1px 2px rgba(8, 36, 27, 0.05) !important;
  transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), background 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease !important;
  will-change: transform;
}

#mainHeader.header-hidden {
  transform: translateY(-100%) !important;
}

#mainHeader.scrolled {
  background: rgba(255, 255, 255, 0.82) !important;
  backdrop-filter: blur(24px) saturate(190%) contrast(105%) !important;
  -webkit-backdrop-filter: blur(24px) saturate(190%) contrast(105%) !important;
  box-shadow: 0 10px 30px -4px rgba(8, 36, 27, 0.12), 0 2px 6px rgba(8, 36, 27, 0.06) !important;
  border-bottom: 1px solid rgba(14, 56, 43, 0.12) !important;
}

#mainHeader .header-logo-img {
  mix-blend-mode: multiply;
}

#mobileMenuDropdown {
  background: rgba(255, 255, 255, 0.90) !important;
  backdrop-filter: blur(24px) saturate(190%) !important;
  -webkit-backdrop-filter: blur(24px) saturate(190%) !important;
  border-bottom: 1px solid rgba(14, 56, 43, 0.12) !important;
  box-shadow: 0 16px 36px rgba(8, 36, 27, 0.15) !important;
}
</style>
</head>
<body class="bg-light-surface text-charcoal font-body antialiased min-h-screen flex flex-col">

@if(request()->is('/'))
  @include('components.home-loader')
@endif

@if($seoGtmId)
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $seoGtmId }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
@endif

<!-- PRIMARY GLOBAL HEADER (Luxury Glassmorphic) -->
<header class="sticky top-0 z-40 transition-all duration-300" id="mainHeader">
  <div class="max-w-7xl mx-auto px-6 py-3.5 flex items-center justify-between gap-8">
    <a href="{{ url('/') }}" class="flex items-center gap-3">
      <img src="{{ asset('primary-logo.png') }}" alt="{{ $companyName }}" class="h-12 w-auto object-contain header-logo-img">
    </a>

    <!-- Desktop Navigation -->
    <nav class="hidden lg:flex items-center gap-7 text-charcoal font-label text-sm uppercase tracking-wide" aria-label="Main Navigation">
      <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'text-light-primary font-bold border-b-2 border-light-primary pb-1' : 'text-slate-muted hover:text-light-primary transition-colors pb-1' }}">Home</a>
      <a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'text-light-primary font-bold border-b-2 border-light-primary pb-1' : 'text-slate-muted hover:text-light-primary transition-colors pb-1' }}">About Us</a>
      <a href="{{ url('/services') }}" class="{{ request()->is('services') ? 'text-light-primary font-bold border-b-2 border-light-primary pb-1' : 'text-slate-muted hover:text-light-primary transition-colors pb-1' }}">Export Process</a>
      <a href="{{ url('/products') }}" class="{{ request()->is('products','products/*') ? 'text-light-primary font-bold border-b-2 border-light-primary pb-1' : 'text-slate-muted hover:text-light-primary transition-colors pb-1' }}">Products Catalog</a>
      <a href="{{ url('/gallery') }}" class="{{ request()->is('gallery') ? 'text-light-primary font-bold border-b-2 border-light-primary pb-1' : 'text-slate-muted hover:text-light-primary transition-colors pb-1' }}">Gallery</a>
      <a href="{{ url('/blog') }}" class="{{ request()->is('blog','blog/*') ? 'text-light-primary font-bold border-b-2 border-light-primary pb-1' : 'text-slate-muted hover:text-light-primary transition-colors pb-1' }}">Trade Insights</a>
      <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'text-light-primary font-bold border-b-2 border-light-primary pb-1' : 'text-slate-muted hover:text-light-primary transition-colors pb-1' }}">Contact</a>
    </nav>

    <!-- CTAs & Mobile Toggle -->
    <div class="flex items-center gap-3">
      <a href="{{ url('/products') }}" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-md border border-light-primary text-light-primary hover:bg-light-surface-container font-label text-sm uppercase tracking-wide transition">
        <span>Catalog</span>
      </a>
      <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 px-5 py-2 rounded-md bg-light-primary text-white font-label text-sm uppercase tracking-wide hover:bg-forest-deep shadow-sm transition">
        <span>Request a Quote</span>
        <span class="material-symbols-outlined text-sm">arrow_forward</span>
      </a>
      <!-- Hamburger / Cross toggle button -->
      <button type="button" id="mobileMenuBtn" class="lg:hidden w-10 h-10 rounded-lg border border-border-subtle bg-white/70 hover:bg-white text-charcoal hover:text-light-primary flex items-center justify-center transition-all duration-200 active:scale-95 shadow-sm" aria-label="Toggle Navigation" aria-expanded="false">
        <span id="mobileMenuIcon" class="material-symbols-outlined text-2xl transition-transform duration-200 pointer-events-none">menu</span>
      </button>
    </div>
  </div>

  <!-- Mobile Dropdown Nav (Glassmorphic) -->
  <div id="mobileMenuDropdown" class="hidden lg:hidden border-t border-border-subtle px-6 py-4 space-y-3 font-label uppercase text-sm">
    <a href="{{ url('/') }}" class="block py-1.5 {{ request()->is('/') ? 'text-light-primary font-bold' : 'text-slate-muted' }}">Home</a>
    <a href="{{ url('/about') }}" class="block py-1.5 {{ request()->is('about') ? 'text-light-primary font-bold' : 'text-slate-muted' }}">About Us</a>
    <a href="{{ url('/services') }}" class="block py-1.5 {{ request()->is('services') ? 'text-light-primary font-bold' : 'text-slate-muted' }}">Export Process</a>
    <a href="{{ url('/products') }}" class="block py-1.5 {{ request()->is('products*') ? 'text-light-primary font-bold' : 'text-slate-muted' }}">Products Catalog</a>
    <a href="{{ url('/gallery') }}" class="block py-1.5 {{ request()->is('gallery') ? 'text-light-primary font-bold' : 'text-slate-muted' }}">Gallery</a>
    <a href="{{ url('/blog') }}" class="block py-1.5 {{ request()->is('blog*') ? 'text-light-primary font-bold' : 'text-slate-muted' }}">Trade Insights</a>
    <a href="{{ url('/contact') }}" class="block py-1.5 {{ request()->is('contact') ? 'text-light-primary font-bold' : 'text-slate-muted' }}">Contact &amp; RFQ</a>
  </div>
</header>

@if(session('success'))
<div class="bg-emerald-900 text-emerald-100 py-3 px-6 text-sm text-center flex items-center justify-center gap-2 shadow-inner">
  <span class="material-symbols-outlined text-base">check_circle</span>
  <span>{{ session('success') }}</span>
</div>
@endif

<!-- MAIN CONTENT WRAPPER -->
<main class="flex-1">
  @yield('content')
</main>

<!-- GLOBAL FOOTER -->
<footer class="bg-[#0A1713] text-slate-300 border-t border-slate-800 pt-16 pb-12 font-body text-sm">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800/80">
      
      <!-- Company Overview -->
      <div class="lg:col-span-2 space-y-4">
        <div class="flex items-center">
          <img src="{{ asset('secondary-logo.png') }}" alt="{{ $companyName }}" class="h-12 w-auto object-contain brightness-110" onerror="this.onerror=null;this.src='{{ asset('primary-logo.png') }}';">
        </div>
        <p class="text-slate-400 text-sm leading-relaxed max-w-sm mt-3">
          {{ $settings['footer_tagline'] ?? 'Meral Exports & Imports Pvt Ltd is a premium agricultural commodity export company. Serving wholesale food importers, packaging firms, and institutional buyers across international ports.' }}
        </p>
      </div>

      <!-- Company Links -->
      <div class="space-y-3">
        <h4 class="font-label text-sm text-white uppercase tracking-wider font-semibold">Company</h4>
        <ul class="space-y-2 text-slate-400">
          <li><a href="{{ url('/about') }}" class="hover:text-gold-light transition">About Meral</a></li>
          <li><a href="{{ url('/services') }}" class="hover:text-gold-light transition">Export Capabilities</a></li>
          <li><a href="{{ url('/gallery') }}" class="hover:text-gold-light transition">Facilities &amp; Quality Lab</a></li>
          <li><a href="{{ url('/contact') }}" class="hover:text-gold-light transition">Contact &amp; Procurement</a></li>
        </ul>
      </div>

      <!-- Export Range -->
      <div class="space-y-3">
        <h4 class="font-label text-sm text-white uppercase tracking-wider font-semibold">Export Range</h4>
        <ul class="space-y-2 text-slate-400">
          @if(isset($categories) && count($categories) > 0)
            @foreach($categories->take(4) as $cat)
              <li><a href="{{ url('/products') }}?cat={{ $cat->slug }}" class="hover:text-gold-light transition">{{ $cat->name }}</a></li>
            @endforeach
          @else
            <li><a href="{{ url('/products') }}" class="hover:text-gold-light transition">Spices &amp; Seasonings</a></li>
            <li><a href="{{ url('/products') }}" class="hover:text-gold-light transition">Basmati &amp; Long Grain Rice</a></li>
            <li><a href="{{ url('/products') }}" class="hover:text-gold-light transition">Pulses &amp; Split Lentils</a></li>
            <li><a href="{{ url('/products') }}" class="hover:text-gold-light transition">Edible Cold-Pressed Oils</a></li>
          @endif
        </ul>
      </div>

      <!-- Export Desk Info -->
      <div class="space-y-3">
        <h4 class="font-label text-sm text-white uppercase tracking-wider font-semibold">Export Desk</h4>
        <p class="text-slate-300 text-sm font-medium">
          {{ $companyName }}<br>
          <span class="text-slate-400 text-xs">{{ $settings['address'] ?? 'Cochin Port / Kerala, India' }}</span>
        </p>
        <p class="text-xs text-slate-400 space-y-1">
          @if($email1)<div>Inquiry: <a href="mailto:{{ $email1 }}" class="hover:text-gold-light">{{ $email1 }}</a></div>@endif
          @if($phone1)<div>Tel: <a href="tel:{{ preg_replace('/\s+/','',$phone1) }}" class="hover:text-gold-light">{{ $phone1 }}</a></div>@endif
        </p>
      </div>

    </div>

    <!-- Bottom Attribution Bar -->
    <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-6 text-xs text-slate-400">
      <div class="flex items-center gap-3">
        <img src="{{ asset('images/brand/meral-monogram.png') }}" alt="Meral Group Monogram" class="h-10 w-auto object-contain opacity-90 hover:opacity-100 transition" onerror="this.onerror=null;this.src='{{ asset('secondary-logo.png') }}';">
        <div class="text-slate-400 border-l border-slate-700 pl-3">
          <span class="block font-label text-slate-300 font-semibold">A Division of Meral Group</span>
          <span class="text-[11px] text-slate-400">Agricultural, Trade &amp; Industrial Operations</span>
        </div>
      </div>
      <div>&copy; {{ date('Y') }} {{ $companyName }}. All rights reserved.</div>
    </div>
  </div>
</footer>

<script>
// ── Mobile Menu Toggle with Animated Icon (menu <-> close) ──
(function () {
  const mobileBtn = document.getElementById('mobileMenuBtn');
  const mobileDropdown = document.getElementById('mobileMenuDropdown');
  const mobileIcon = document.getElementById('mobileMenuIcon');

  if (!mobileBtn || !mobileDropdown) return;

  function setMobileMenu(open) {
    if (open) {
      mobileDropdown.classList.remove('hidden');
      if (mobileIcon) {
        mobileIcon.textContent = 'close';
        mobileIcon.style.transform = 'rotate(90deg)';
      }
      mobileBtn.classList.add('bg-forest-deep', 'text-gold-light', 'border-forest-deep');
      mobileBtn.classList.remove('bg-white/70', 'text-charcoal', 'border-border-subtle');
      mobileBtn.setAttribute('aria-expanded', 'true');
    } else {
      mobileDropdown.classList.add('hidden');
      if (mobileIcon) {
        mobileIcon.textContent = 'menu';
        mobileIcon.style.transform = 'rotate(0deg)';
      }
      mobileBtn.classList.remove('bg-forest-deep', 'text-gold-light', 'border-forest-deep');
      mobileBtn.classList.add('bg-white/70', 'text-charcoal', 'border-border-subtle');
      mobileBtn.setAttribute('aria-expanded', 'false');
    }
  }

  mobileBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    const isCurrentlyOpen = !mobileDropdown.classList.contains('hidden');
    setMobileMenu(!isCurrentlyOpen);
  });

  // Close when clicking any nav link in dropdown
  mobileDropdown.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => setMobileMenu(false));
  });

  // Close when clicking outside header
  document.addEventListener('click', (e) => {
    if (!mobileDropdown.classList.contains('hidden') && !mobileDropdown.contains(e.target) && !mobileBtn.contains(e.target)) {
      setMobileMenu(false);
    }
  });

  // Global helper for scroll listener
  window.__closeMobileMenu = () => setMobileMenu(false);
})();

// ── Smart Header (Auto-hide on scroll down, show on scroll up) ──
(function () {
  const mainHeader = document.getElementById('mainHeader');
  if (!mainHeader) return;

  let lastScrollY = window.scrollY;
  let ticking = false;

  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        const currentScrollY = window.scrollY;

        // Apply glass scrolled style
        if (currentScrollY > 30) {
          mainHeader.classList.add('scrolled');
        } else {
          mainHeader.classList.remove('scrolled');
        }

        // Auto-hide when scrolling down, reveal when scrolling up
        if (currentScrollY > 70 && currentScrollY > lastScrollY + 4) {
          mainHeader.classList.add('header-hidden');
          if (window.__closeMobileMenu) window.__closeMobileMenu();
        } else if (currentScrollY < lastScrollY - 4 || currentScrollY <= 20) {
          mainHeader.classList.remove('header-hidden');
        }

        lastScrollY = Math.max(0, currentScrollY);
        ticking = false;
      });
      ticking = true;
    }
  }, { passive: true });
})();

// ── Universal Text Animation Engine (All Pages & Screens) ──
(function () {
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (prefersReduced) return;
  if (!('IntersectionObserver' in window)) return;

  document.documentElement.classList.add('js-motion');

  // 1. Process all Hero / Page H1 titles across every page
  const heroTitles = document.querySelectorAll('main h1, .hero-title-animated');
  heroTitles.forEach(title => {
    function wrapTextNodes(node) {
      if (node.nodeType === Node.TEXT_NODE) {
        const text = node.textContent;
        if (!text.trim()) return;
        const words = text.split(/(\s+)/);
        const frag = document.createDocumentFragment();
        words.forEach(w => {
          if (!w) return;
          if (w.trim().length === 0) {
            frag.appendChild(document.createTextNode(w));
          } else {
            const wrap = document.createElement('span');
            wrap.className = 'hero-word-wrap';
            const inner = document.createElement('span');
            inner.textContent = w;
            wrap.appendChild(inner);
            frag.appendChild(wrap);
          }
        });
        node.parentNode.replaceChild(frag, node);
      } else if (node.nodeType === Node.ELEMENT_NODE) {
        Array.from(node.childNodes).forEach(wrapTextNodes);
      }
    }
    wrapTextNodes(title);

    // Stagger word entrance
    const isMobile = window.innerWidth < 1024;
    const stepDelay = isMobile ? 32 : 55;
    const baseDelay = isMobile ? 80 : 120;
    const wordSpans = title.querySelectorAll('.hero-word-wrap > span');
    wordSpans.forEach((span, idx) => {
      span.style.transitionDelay = (baseDelay + idx * stepDelay) + 'ms';
    });
  });

  // 2. Process all Section H2s, badges, and CTAs across every page
  const scrollElements = document.querySelectorAll('main h2, main section .font-headline, .text-reveal-actions, .text-reveal-badge');
  scrollElements.forEach(el => {
    el.classList.add('text-reveal-element');
  });

  // 3. Stagger Commodity Stack Cards & Corridor Left/Right Tiles
  const stackCards = document.querySelectorAll('.mobile-stack-card');
  stackCards.forEach((card, idx) => {
    const isMobile = window.innerWidth < 640;
    const delay = isMobile ? (idx * 100) : (idx * 75);
    card.style.transitionDelay = delay + 'ms';
  });

  const corridorTiles = document.querySelectorAll('.corridor-tile-from-left, .corridor-tile-from-right');
  corridorTiles.forEach((tile, idx) => {
    tile.style.transitionDelay = (idx * 90) + 'ms';
  });

  // IntersectionObserver for elements as they scroll into view
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-revealed');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.12,
    rootMargin: '0px 0px -25px 0px'
  });

  scrollElements.forEach(el => observer.observe(el));
  stackCards.forEach(el => observer.observe(el));
  corridorTiles.forEach(el => observer.observe(el));

  // Trigger page / hero entrance
  let revealed = false;
  function triggerPageEntrance() {
    if (revealed) return;
    revealed = true;

    requestAnimationFrame(() => {
      heroTitles.forEach(t => t.classList.add('hero-title-active'));
      document.querySelectorAll('.hero-text-block, .hero-text-block .text-reveal-badge, .hero-text-block .text-reveal-actions').forEach(el => {
        el.classList.add('is-revealed');
      });
    });
  }

  // Coordination with loader on Home page vs immediate on other pages
  const loader = document.getElementById('meralLuxuryLoader');
  if (loader) {
    // Wait until the loader curtain lifts!
    window.addEventListener('meralLoaderReveal', triggerPageEntrance, { once: true });
    // Backup timer in case event was missed
    setTimeout(triggerPageEntrance, 2400);
  } else {
    // All other pages (About, Services, Products, Contact, Gallery, Blog, etc.)
    setTimeout(triggerPageEntrance, 100);
  }

  // Universal fail-safe: guarantee all content is fully visible after 3.2s
  setTimeout(() => {
    heroTitles.forEach(t => t.classList.add('hero-title-active'));
    document.querySelectorAll('.text-reveal-element, .hero-text-block, .text-reveal-badge, .text-reveal-actions, .mobile-stack-card, .corridor-tile-from-left, .corridor-tile-from-right').forEach(el => {
      el.classList.add('is-revealed');
    });
  }, 3200);
})();
</script>

@yield('extra-js')

</body>
</html>
