@extends('layouts.app')

@section('content')

<style>
  @keyframes orbitSpin {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
  }
  @keyframes orbitSpinReverse {
    from { transform: rotate(360deg); }
    to   { transform: rotate(0deg); }
  }
  @keyframes globeFloat {
    0%, 100% { transform: translateY(0px); }
    50%      { transform: translateY(-6px); }
  }
  @keyframes shadowPulse {
    0%, 100% { transform: translateX(-50%) scale(1); opacity: 0.9; }
    50%      { transform: translateX(-50%) scale(0.92); opacity: 0.65; }
  }
  .globe-orbit-outer {
    animation: orbitSpin 32s linear infinite;
  }
  .globe-orbit-inner {
    animation: orbitSpinReverse 20s linear infinite;
  }
  .globe-float {
    animation: globeFloat 6s ease-in-out infinite;
  }
  .globe-shadow-pulse {
    animation: shadowPulse 6s ease-in-out infinite;
  }
  @media (prefers-reduced-motion: reduce) {
    .globe-orbit-outer,
    .globe-orbit-inner,
    .globe-float,
    .globe-shadow-pulse {
      animation: none !important;
    }
  }
</style>

<!-- HERO SECTION: Food-led, authoritative B2B proposition with 3D Rotating Export Globe -->
<section class="relative bg-forest-deep text-white overflow-hidden -mt-[80px] pt-28 pb-16 lg:pt-36 lg:pb-24">
  <!-- Responsive Maritime Cargo Ship Background (Desktop: hero-desktop.jpeg, Mobile: hero-mobile.jpeg) -->
  <picture class="hero-bg-picture absolute inset-0 z-0 pointer-events-none block overflow-hidden">
    <source media="(max-width: 1023px)" srcset="{{ asset('images/hero-mobile.jpeg') }}">
    <img
      src="{{ asset('images/hero-desktop.jpeg') }}"
      alt="Global maritime container cargo logistics"
      class="hero-bg-img w-full h-full object-cover object-[center_65%] lg:object-[40%_68%] scale-105 brightness-[0.98] contrast-[1.05]"
      loading="eager"
      fetchpriority="high"
    >
  </picture>

  <!-- Forest-Green Atmosphere Overlays (Tuned for high ship visibility while maintaining AAA text contrast) -->
  <div class="absolute inset-0 z-0 bg-gradient-to-b from-[#08241B]/68 via-[#08241B]/45 to-[#08241B]/75 lg:bg-gradient-to-r lg:from-[#08241B]/75 lg:via-[#08241B]/48 lg:to-[#08241B]/25 pointer-events-none" aria-hidden="true"></div>
  <div class="absolute inset-0 z-0 bg-gradient-to-b from-[#08241B]/40 via-transparent to-[#08241B]/65 pointer-events-none" aria-hidden="true"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
    
    <!-- Left Hero Column (7 Cols) -->
    <div class="lg:col-span-7 space-y-6 hero-text-block">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-light-secondary/60 border border-gold-light/30 text-gold-light font-label text-xs uppercase tracking-wide shadow-sm text-reveal-badge">
        <span class="material-symbols-outlined text-sm">public</span>
        <span>{{ $hero->badge ?? 'Premier B2B Agricultural & Food Commodity Export' }}</span>
      </div>
      
      <h1 class="font-headline text-3xl sm:text-4xl lg:text-[54px] lg:leading-[62px] text-white tracking-tight font-bold hero-title-animated">
        @if(!empty($hero->title))
          {!! $hero->title !!}
        @else
          Connecting Global Markets to <span class="italic text-gold-light">Pure Provenance</span> &amp; Trade Integrity.
        @endif
      </h1>

      <!-- Mobile 3D Rotating Global Export Network Visual (Compact Glass Blend) -->
      <div class="lg:hidden rounded-xl overflow-hidden border border-white/10 bg-black/25 backdrop-blur-md relative my-3 p-3 flex items-center gap-3.5 shadow-lg shadow-black/20">
        <!-- Compact Hollow 3D Rotating Globe -->
        <div class="relative w-20 h-20 shrink-0 flex items-center justify-center">
          <div class="globe-shadow-pulse absolute -bottom-1 w-14 h-2 rounded-full bg-black/40 blur-sm pointer-events-none" aria-hidden="true"></div>
          <div class="globe-orbit-outer absolute inset-0 rounded-full border border-dashed border-gold-light/35 pointer-events-none" aria-hidden="true">
            <span class="absolute -top-0.5 left-1/2 -translate-x-1/2 w-1.5 h-1.5 rounded-full bg-[#F0D28A] shadow-[0_0_6px_rgba(240,210,138,0.9)]"></span>
          </div>
          <div class="globe-orbit-inner absolute inset-1.5 rounded-full border border-gold-light/15 border-t-gold-light/65 pointer-events-none" aria-hidden="true"></div>
          <canvas id="mobileGlobeCanvas" width="360" height="360" class="globe-float relative z-10 w-16 h-16 block" aria-label="Rotating 3D global export network globe"></canvas>
        </div>
        <!-- Meta & Live Status -->
        <div class="flex-1 min-w-0">
          <div class="flex items-center justify-between gap-1 mb-0.5">
            <span class="font-label text-xs text-gold-light uppercase tracking-wider font-semibold truncate flex items-center gap-1.5">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
              Global Trade Network
            </span>
            <span class="text-[9px] bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 px-1.5 py-0.5 rounded font-mono shrink-0">FCL &amp; LCL</span>
          </div>
          <div class="text-[11px] text-slate-300 font-label tracking-wide truncate">South India Ports Dispatch</div>
          <div class="text-[10px] text-gold-light/80 font-mono mt-1 flex items-center gap-1">
            <span class="material-symbols-outlined text-xs text-gold-light">anchor</span> Direct Maritime Corridors
          </div>
        </div>
      </div>

      <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-4 text-reveal-actions">
        <a href="{{ url('/products') }}" class="w-full sm:w-auto justify-center px-6 sm:px-7 py-3 sm:py-3.5 rounded-md bg-accent text-white font-label text-xs sm:text-sm uppercase tracking-wide hover:bg-gold-light hover:text-charcoal transition-all flex items-center gap-2 shadow-lg shadow-black/30 hover:scale-[1.02]">
          <span>Explore Products</span>
          <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
        <a href="{{ url('/contact') }}" class="w-full sm:w-auto justify-center text-center px-6 sm:px-7 py-3 sm:py-3.5 rounded-md border border-white/30 text-white hover:bg-white/10 font-label text-xs sm:text-sm uppercase tracking-wide transition">
          <span>Request Wholesale Quotation</span>
        </a>
      </div>

      <!-- Mobile Spot Commodity Card (from Stitch Mobile Screen) -->
      @if($products->isNotEmpty())
      @php $mobileSpot = $products->first(); @endphp
      <div class="lg:hidden pt-3">
        <div class="flex items-center justify-between mb-1.5 px-0.5">
          <span class="font-label text-[11px] text-gold-light uppercase tracking-wider font-semibold flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 rounded-full bg-gold-light animate-pulse"></span>
            Featured Export Item
          </span>
          <span class="text-[9px] bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 px-1.5 py-0.5 rounded font-mono font-medium">Ready for Booking</span>
        </div>
        <a href="{{ url('/products/' . $mobileSpot->slug) }}" class="bg-black/25 backdrop-blur-md rounded-lg border border-white/10 p-2.5 shadow-sm flex gap-3 items-center block hover:bg-black/40 transition group">
          <div class="w-12 h-12 rounded-md overflow-hidden bg-white/5 shrink-0 flex items-center justify-center border border-white/10">
            @if($mobileSpot->image)
              <img src="{{ public_image_url($mobileSpot->image) }}" alt="{{ $mobileSpot->name }}" class="w-full h-full object-cover">
            @else
              <span class="text-lg">📦</span>
            @endif
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between gap-2">
              <h3 class="font-label text-xs sm:text-sm text-white font-semibold truncate group-hover:text-gold-light transition">{{ $mobileSpot->name }}</h3>
              <span class="text-[10px] text-gold-light font-mono shrink-0">MOQ: 1x20' FCL</span>
            </div>
            <p class="text-[11px] text-slate-300 truncate mt-0.5">{{ $mobileSpot->badge_text ?: ($mobileSpot->category->name ?? 'Export Grade') }}</p>
          </div>
          <span class="material-symbols-outlined text-sm text-slate-400 group-hover:text-gold-light transition shrink-0">arrow_forward</span>
        </a>
      </div>
      @endif

      <!-- Trust Badges Row: Elevated Institutional Trade Clearance Bar -->
      <div class="pt-4 sm:pt-6 border-t border-white/10 text-reveal-trust">
        <div class="grid grid-cols-3 gap-1 sm:gap-3 p-2 sm:p-4 rounded-xl bg-white/[0.04] backdrop-blur-md border border-white/10 shadow-[0_4px_24px_rgba(0,0,0,0.25)]">
          <!-- Badge 1: FCL & LCL -->
          <div class="flex flex-col sm:flex-row items-center sm:items-center text-center sm:text-left gap-1 sm:gap-3 p-1 sm:px-2 border-r border-white/10">
            <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-md sm:rounded-lg bg-gold-light/10 border border-gold-light/25 flex items-center justify-center text-gold-light shrink-0">
              <span class="material-symbols-outlined text-sm sm:text-xl">view_in_ar</span>
            </div>
            <div class="min-w-0">
              <div class="text-white font-headline text-[11px] sm:text-lg sm:text-xl font-bold tracking-tight leading-tight truncate sm:whitespace-normal">FCL &amp; LCL</div>
              <div class="text-[9px] sm:text-[11px] text-slate-300 font-label tracking-wide hidden sm:block">Flexible Container Loads</div>
              <div class="text-[8px] text-slate-300/80 font-label tracking-tight sm:hidden leading-tight mt-0.5">Flexible Loads</div>
            </div>
          </div>
          <!-- Badge 2: Phytosanitary -->
          <div class="flex flex-col sm:flex-row items-center sm:items-center text-center sm:text-left gap-1 sm:gap-3 p-1 sm:px-2 border-r border-white/10">
            <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-md sm:rounded-lg bg-gold-light/10 border border-gold-light/25 flex items-center justify-center text-gold-light shrink-0">
              <span class="material-symbols-outlined text-sm sm:text-xl">verified</span>
            </div>
            <div class="min-w-0">
              <div class="text-white font-headline text-[11px] sm:text-lg sm:text-xl font-bold tracking-tight leading-tight truncate sm:whitespace-normal">Phytosanitary</div>
              <div class="text-[9px] sm:text-[11px] text-slate-300 font-label tracking-wide hidden sm:block">Pre-Shipment Certified</div>
              <div class="text-[8px] text-slate-300/80 font-label tracking-tight sm:hidden leading-tight mt-0.5">Pre-Certified</div>
            </div>
          </div>
          <!-- Badge 3: Incoterms 2020 -->
          <div class="flex flex-col sm:flex-row items-center sm:items-center text-center sm:text-left gap-1 sm:gap-3 p-1 sm:px-2">
            <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-md sm:rounded-lg bg-gold-light/10 border border-gold-light/25 flex items-center justify-center text-gold-light shrink-0">
              <span class="material-symbols-outlined text-sm sm:text-xl">gavel</span>
            </div>
            <div class="min-w-0">
              <div class="text-white font-headline text-[11px] sm:text-lg sm:text-xl font-bold tracking-tight leading-tight truncate sm:whitespace-normal">Incoterms</div>
              <div class="text-[9px] sm:text-[11px] text-slate-300 font-label tracking-wide hidden sm:block">FOB, CIF, CFR Contracts</div>
              <div class="text-[8px] text-slate-300/80 font-label tracking-tight sm:hidden leading-tight mt-0.5">2020 Rules</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Hero Column: 3D Rotating Export Globe & Spot Commodities (5 Cols) -->
    <div class="lg:col-span-5 hidden lg:block">
      <div class="relative bg-gradient-to-b from-white/[0.14] via-white/[0.08] to-white/[0.04] backdrop-blur-xl rounded-2xl p-6 border border-gold-light/25 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.85)] transform hover:-translate-y-1 transition duration-300">
        
        <!-- Live Terminal Status Bar -->
        <div class="flex items-center justify-between pb-3.5 border-b border-white/10 mb-4">
          <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span class="font-label text-xs text-gold-light uppercase tracking-wider font-semibold">Live Trade Terminal</span>
          </div>
          <span class="text-[11px] font-mono text-slate-300 bg-white/5 px-2 py-0.5 rounded border border-white/10">South India Ports Dispatch</span>
        </div>

        <!-- 3D Rotating Global Export Network Sphere Card -->
        <div class="relative rounded-xl overflow-hidden mb-5 border border-white/15 bg-[#08241B] shadow-[0_15px_30px_rgba(0,0,0,0.5)] pt-5 pb-9 flex items-center justify-center">
          <div class="relative w-52 h-52 flex items-center justify-center">
            
            <!-- Contact Shadow beneath Globe -->
            <div class="globe-shadow-pulse absolute -bottom-2 w-36 h-3.5 rounded-full bg-black/70 blur-md pointer-events-none" aria-hidden="true"></div>
            
            <!-- Outer Orbital Ring with Glowing Gold Node -->
            <div class="globe-orbit-outer absolute inset-0 rounded-full border border-dashed border-gold-light/35 pointer-events-none" aria-hidden="true">
              <span class="absolute -top-1 left-1/2 -translate-x-1/2 w-2 h-2 rounded-full bg-[#F0D28A] shadow-[0_0_10px_rgba(240,210,138,0.95)]"></span>
            </div>
            
            <!-- Inner Orbital Ring -->
            <div class="globe-orbit-inner absolute inset-3 rounded-full border border-gold-light/15 border-t-gold-light/65 pointer-events-none" aria-hidden="true"></div>
            
            <!-- Main 3D Canvas -->
            <canvas id="heroGlobeCanvas" width="440" height="440" class="globe-float relative z-10 w-44 h-44 block" aria-label="Interactive 3D rotating global export network globe"></canvas>
          </div>

          <!-- Globe Card Footer Overlay -->
          <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent flex items-end justify-between p-3 pointer-events-none">
            <span class="text-xs text-gold-light font-label font-semibold flex items-center gap-1.5">
              <span class="material-symbols-outlined text-xs">public</span> Global Maritime Network
            </span>
            <span class="text-[10px] text-emerald-300 font-mono tracking-wide">24/7 Ocean Corridor Dispatch</span>
          </div>
        </div>

        <!-- Spot Commodity Focus Header -->
        <div class="flex items-center justify-between pb-2.5 border-b border-white/10 mb-3.5">
          <span class="font-label text-xs text-gold-light uppercase tracking-wider font-semibold">Spot Commodity Focus</span>
          <span class="text-xs bg-emerald-500/20 text-emerald-300 px-2 py-0.5 rounded font-mono font-medium">Ready for Booking</span>
        </div>

        <!-- Dynamic Product Items -->
        <div class="space-y-3">
          @forelse($products->take(2) as $spotItem)
          <a href="{{ url('/products/' . $spotItem->slug) }}" class="flex items-center gap-4 p-3 rounded-xl bg-black/35 hover:bg-black/55 transition border border-white/10 hover:border-gold-light/30 shadow-inner group block">
            <div class="w-14 h-14 rounded-lg overflow-hidden bg-light-surface-container shrink-0 flex items-center justify-center border border-white/15 shadow-md">
              @if($spotItem->image)
                <img src="{{ public_image_url($spotItem->image) }}" alt="{{ $spotItem->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" onerror="this.onerror=null;this.parentElement.innerHTML='<span class=\'text-2xl\'>📦</span>';">
              @else
                <span class="text-2xl">🌾</span>
              @endif
            </div>
            <div class="flex-1 min-w-0">
              <h4 class="font-label text-sm text-white font-semibold truncate group-hover:text-gold-light transition">{{ $spotItem->name }}</h4>
              <p class="text-xs text-slate-300 truncate">{{ $spotItem->badge_text ?: ($spotItem->category->name ?? 'Export Grade A') }}</p>
              <p class="text-xs text-gold-light font-mono mt-0.5">MOQ: 1x20' FCL (Standard Load)</p>
            </div>
            <span class="material-symbols-outlined text-slate-400 group-hover:text-gold-light text-sm transition-transform group-hover:translate-x-0.5">arrow_forward</span>
          </a>
          @empty
          <div class="p-4 text-center text-slate-300 text-xs">Commodities updating...</div>
          @endforelse
        </div>

        <div class="mt-4 pt-3.5 border-t border-white/10 text-center">
          <a href="{{ url('/products') }}" class="text-xs text-gold-light hover:text-white font-label uppercase tracking-wider inline-flex items-center gap-1.5 font-semibold transition">
            View Full Export Catalog <span class="material-symbols-outlined text-sm">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- SECTION: Value Proposition & Sourcing Integrity -->
<section class="py-24 bg-[#FAF8F5] border-b border-[#E3DDD2] relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center max-w-3xl mx-auto mb-16 text-reveal-group">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-light/15 border border-accent/25 text-accent font-label text-xs uppercase tracking-widest font-semibold mb-3">
        <span class="w-1.5 h-1.5 rounded-full bg-accent"></span>
        <span>Institutional Reliability</span>
      </div>
      <h2 class="font-headline text-3xl lg:text-4xl text-charcoal font-bold tracking-tight">
        Why International Wholesale Buyers Partner with Meral
      </h2>
      <div class="w-14 h-0.5 bg-accent/60 mx-auto mt-3.5 mb-3.5"></div>
      <p class="font-body text-base text-slate-muted leading-relaxed">
        In global agricultural trade, predictability and verifiable specifications are paramount. We eliminate trade friction through transparent origin sourcing, accredited laboratory analysis, and statutory customs compliance.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @if(isset($features) && $features->count() >= 3)
        @foreach($features->take(3) as $fIndex => $feature)
        <div class="group p-8 rounded-xl bg-white border border-[#E3DDD2] shadow-sm hover:shadow-xl hover:border-accent transition duration-300 relative flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-6">
              <div class="w-12 h-12 rounded-lg bg-light-surface-container flex items-center justify-center text-light-primary group-hover:bg-forest-deep group-hover:text-gold-light transition duration-300">
                <span class="material-symbols-outlined text-2xl">verified</span>
              </div>
              <span class="font-headline text-3xl font-light text-accent/40 select-none">0{{ $fIndex + 1 }}</span>
            </div>
            <h3 class="font-headline text-xl text-charcoal font-bold mb-3 group-hover:text-light-primary transition">{{ $feature->title }}</h3>
            <p class="font-body text-sm text-slate-muted leading-relaxed">
              {{ $feature->description }}
            </p>
          </div>
          <div class="mt-6 pt-4 border-t border-[#F0EBE1] flex items-center justify-between text-xs font-label text-accent font-semibold tracking-wide uppercase">
            <span>Verified Export Standard</span>
            <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
          </div>
        </div>
        @endforeach
      @else
        <!-- Card 01 -->
        <div class="group p-8 rounded-xl bg-white border border-[#E3DDD2] shadow-sm hover:shadow-xl hover:border-accent transition duration-300 relative flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-6">
              <div class="w-12 h-12 rounded-lg bg-light-surface-container flex items-center justify-center text-light-primary group-hover:bg-forest-deep group-hover:text-gold-light transition duration-300">
                <span class="material-symbols-outlined text-2xl">verified_user</span>
              </div>
              <span class="font-headline text-3xl font-light text-accent/40 select-none">01</span>
            </div>
            <h3 class="font-headline text-xl text-charcoal font-bold mb-3 group-hover:text-light-primary transition">Direct Origin Sourcing</h3>
            <p class="font-body text-sm text-slate-muted leading-relaxed">
              Consolidated procurement directly from farming clusters and certified processing mills ensures unadulterated purity, trace moisture profiles, and consistent bulk grading.
            </p>
          </div>
          <div class="mt-6 pt-4 border-t border-[#F0EBE1] flex items-center justify-between text-xs font-label text-accent font-semibold tracking-wide uppercase">
            <span>Traceability: Farm to Port</span>
            <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
          </div>
        </div>

        <!-- Card 02 -->
        <div class="group p-8 rounded-xl bg-white border border-[#E3DDD2] shadow-sm hover:shadow-xl hover:border-accent transition duration-300 relative flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-6">
              <div class="w-12 h-12 rounded-lg bg-gold-muted flex items-center justify-center text-accent group-hover:bg-forest-deep group-hover:text-gold-light transition duration-300">
                <span class="material-symbols-outlined text-2xl">biotech</span>
              </div>
              <span class="font-headline text-3xl font-light text-accent/40 select-none">02</span>
            </div>
            <h3 class="font-headline text-xl text-charcoal font-bold mb-3 group-hover:text-light-primary transition">Laboratory Verified Purity</h3>
            <p class="font-body text-sm text-slate-muted leading-relaxed">
              Every shipment undergoes rigorous lab testing for pesticide residue levels, microbial safety, aflatoxin limits, and physical purity before export documentation issue.
            </p>
          </div>
          <div class="mt-6 pt-4 border-t border-[#F0EBE1] flex items-center justify-between text-xs font-label text-accent font-semibold tracking-wide uppercase">
            <span>Safety: SGS &amp; NABL Assured</span>
            <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
          </div>
        </div>

        <!-- Card 03 -->
        <div class="group p-8 rounded-xl bg-white border border-[#E3DDD2] shadow-sm hover:shadow-xl hover:border-accent transition duration-300 relative flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-6">
              <div class="w-12 h-12 rounded-lg bg-light-surface-container flex items-center justify-center text-light-secondary group-hover:bg-forest-deep group-hover:text-gold-light transition duration-300">
                <span class="material-symbols-outlined text-2xl">local_shipping</span>
              </div>
              <span class="font-headline text-3xl font-light text-accent/40 select-none">03</span>
            </div>
            <h3 class="font-headline text-xl text-charcoal font-bold mb-3 group-hover:text-light-primary transition">Seamless Container Logistics</h3>
            <p class="font-body text-sm text-slate-muted leading-relaxed">
              Full coordination of port handling, custom documentation, Bill of Lading, Certificate of Origin, and maritime freight scheduling to designated global destinations.
            </p>
          </div>
          <div class="mt-6 pt-4 border-t border-[#F0EBE1] flex items-center justify-between text-xs font-label text-accent font-semibold tracking-wide uppercase">
            <span>Fulfillment: FOB &amp; CIF Global</span>
            <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
          </div>
        </div>
      @endif
    </div>
  </div>
</section>

<!-- SECTION: Core Food Verticals (Commodity Portfolio) -->
<section class="py-24 bg-[#F7F4EE] border-b border-[#E3DDD2]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6 text-reveal-group">
      <div>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-light/15 border border-accent/25 text-accent font-label text-xs uppercase tracking-widest font-semibold mb-3">
          <span class="w-1.5 h-1.5 rounded-full bg-accent"></span>
          <span>Verified Export Portfolio</span>
        </div>
        <h2 class="font-headline text-3xl lg:text-4xl text-charcoal font-bold tracking-tight">Core Food Commodity Verticals</h2>
        <p class="font-body text-sm text-slate-muted mt-2 max-w-2xl">Standardized in 25kg / 50kg bulk export-grade bags, vacuum packaging, or customized buyer private-label packaging.</p>
      </div>
      <a href="{{ url('/products') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-white border border-[#D5CEC2] hover:border-accent text-light-primary font-label text-xs uppercase tracking-wider font-semibold shadow-sm hover:shadow transition duration-200">
        <span>Browse Full Catalog</span>
        <span class="material-symbols-outlined text-sm">arrow_forward</span>
      </a>
    </div>

    <!-- Mobile Stacking Commodity Cards / Desktop 4-Col Grid -->
    <div class="mobile-commodity-stack flex flex-col sm:grid sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-7">
      @forelse($categories as $idx => $cat)
      <a href="{{ url('/products') }}?cat={{ $cat->slug }}"
         class="mobile-stack-card group bg-white rounded-2xl sm:rounded-xl border border-[#E3DDD2] overflow-hidden hover:shadow-xl hover:border-accent hover:-translate-y-1.5 transition duration-300 flex flex-col justify-between"
         style="--stack-index: {{ $idx }};">
        <div>
          <div class="aspect-[4/3] overflow-hidden bg-light-surface-container relative">
            @if($cat->image)
              <img src="{{ public_image_url($cat->image) }}" alt="{{ $cat->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-4xl bg-light-surface-container\'>📦</div>';">
            @else
              <div class="w-full h-full flex items-center justify-center text-4xl bg-light-surface-container">
                @if(str_contains(strtolower($cat->name), 'spice')) 🌶️
                @elseif(str_contains(strtolower($cat->name), 'rice') || str_contains(strtolower($cat->name), 'grain')) 🌾
                @elseif(str_contains(strtolower($cat->name), 'pulse') || str_contains(strtolower($cat->name), 'lentil')) 🫘
                @elseif(str_contains(strtolower($cat->name), 'oil') || str_contains(strtolower($cat->name), 'seed')) 🌻
                @else 📦 @endif
              </div>
            @endif
            <!-- Subtle gradient vignette -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition"></div>
            <!-- Category Badge -->
            <div class="absolute top-3 left-3 bg-forest-deep/85 backdrop-blur-sm px-2.5 py-1 rounded text-[10px] font-mono text-gold-light border border-gold-light/20 uppercase tracking-wider">
              Vertical 0{{ $idx + 1 }}
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-headline text-xl text-charcoal font-bold group-hover:text-light-primary transition">{{ $cat->name }}</h3>
            <p class="font-body text-xs text-slate-muted mt-2 line-clamp-2 leading-relaxed">{{ $cat->description ?: 'Wholesale certified export consignments graded for moisture, purity, and standard calibre.' }}</p>
          </div>
        </div>
        <div class="px-6 pb-5 pt-3 border-t border-[#F0EBE1] flex items-center justify-between text-xs font-label text-accent font-semibold tracking-wide uppercase">
          <span>View Specifications</span>
          <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </div>
      </a>
      @empty
      <div class="col-span-4 p-8 bg-white rounded-xl text-center text-slate-muted text-sm border border-[#E3DDD2]">Categories updating...</div>
      @endforelse
    </div>
  </div>
</section>

<!-- SECTION: Export Reach & Maritime Logistics -->
<section class="py-24 bg-white border-b border-[#E3DDD2] overflow-x-clip">
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
    
    <div class="lg:col-span-6 space-y-7 text-reveal-group">
      <div>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-light/15 border border-accent/25 text-accent font-label text-xs uppercase tracking-widest font-semibold mb-3">
          <span class="w-1.5 h-1.5 rounded-full bg-accent"></span>
          <span>Global Maritime Distribution</span>
        </div>
        <h2 class="font-headline text-3xl lg:text-4xl text-charcoal font-bold tracking-tight">
          Export Reach Across Major Ocean Corridors
        </h2>
        <div class="w-14 h-0.5 bg-accent/60 mt-3.5 mb-3.5"></div>
        <p class="font-body text-sm text-slate-muted leading-relaxed">
          Positioned with direct access to prime deep-water international ports in South India (Cochin, Tuticorin, Chennai), Meral executes scheduled containerized (FCL) and consolidated (LCL) dispatches to institutional wholesale hubs worldwide.
        </p>
      </div>

      <!-- Trade Corridors Structured List: Alternating Left & Right Entrance -->
      <div class="space-y-4 pt-1">
        <!-- Corridor Tile 1: Comes from LEFT -->
        <div class="corridor-tile-from-left p-4 rounded-xl bg-[#FAF8F5] border border-[#E8E2D8] flex items-start gap-4 hover:border-accent transition duration-200 shadow-sm">
          <div class="w-10 h-10 rounded-lg bg-light-surface-container flex items-center justify-center text-light-primary shrink-0">
            <span class="material-symbols-outlined text-xl">sailing</span>
          </div>
          <div>
            <div class="flex items-center gap-2">
              <h4 class="font-label text-sm text-charcoal font-bold">Arabian Gulf &amp; Middle East Corridors</h4>
              <span class="text-[10px] bg-emerald-50 text-emerald-700 font-mono px-1.5 py-0.5 rounded border border-emerald-200">Weekly Sailings</span>
            </div>
            <p class="font-body text-xs text-slate-muted mt-1">Direct liner calls to Jebel Ali (Dubai), King Abdulaziz Port (Dammam), Hamad (Qatar), and Sohar (Oman).</p>
          </div>
        </div>

        <!-- Corridor Tile 2: Comes from RIGHT -->
        <div class="corridor-tile-from-right p-4 rounded-xl bg-[#FAF8F5] border border-[#E8E2D8] flex items-start gap-4 hover:border-accent transition duration-200 shadow-sm">
          <div class="w-10 h-10 rounded-lg bg-gold-muted flex items-center justify-center text-accent shrink-0">
            <span class="material-symbols-outlined text-xl">inventory_2</span>
          </div>
          <div>
            <div class="flex items-center gap-2">
              <h4 class="font-label text-sm text-charcoal font-bold">Climate &amp; Moisture Controlled Packaging</h4>
              <span class="text-[10px] bg-amber-50 text-amber-800 font-mono px-1.5 py-0.5 rounded border border-amber-200">Food-Grade Standard</span>
            </div>
            <p class="font-body text-xs text-slate-muted mt-1">Multiwall Kraft paper bags, food-grade vacuum foil pouches, and desiccated container lining to eliminate condensation across equatorial routes.</p>
          </div>
        </div>

        <!-- Corridor Tile 3: Comes from LEFT -->
        <div class="corridor-tile-from-left p-4 rounded-xl bg-[#FAF8F5] border border-[#E8E2D8] flex items-start gap-4 hover:border-accent transition duration-200 shadow-sm">
          <div class="w-10 h-10 rounded-lg bg-light-surface-container flex items-center justify-center text-light-primary shrink-0">
            <span class="material-symbols-outlined text-xl">fact_check</span>
          </div>
          <div>
            <div class="flex items-center gap-2">
              <h4 class="font-label text-sm text-charcoal font-bold">Complete Statutory Export Documentation</h4>
              <span class="text-[10px] bg-sky-50 text-sky-800 font-mono px-1.5 py-0.5 rounded border border-sky-200">Verified Bill of Lading</span>
            </div>
            <p class="font-body text-xs text-slate-muted mt-1">Commercial Invoice, Packing List, Clean On-Board B/L, Certificate of Origin, Phytosanitary, and Fumigation Certificates.</p>
          </div>
        </div>
      </div>

      <div class="pt-2">
        <a href="{{ url('/services') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-lg bg-light-primary text-white font-label text-xs uppercase tracking-wider font-semibold hover:bg-forest-deep shadow-md hover:shadow-lg transition duration-200">
          <span>Review 5-Step Export Workflow</span>
          <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
      </div>
    </div>

    <!-- Maritime Image Showcase: Comes from RIGHT -->
    <div class="lg:col-span-6 corridor-tile-from-right">
      <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-[#D5CEC2] group">
        <img src="{{ asset('images/stitch/shipping_logistics_port.jpg') }}" alt="Container shipping port logistics" class="w-full h-[520px] object-cover group-hover:scale-105 transition duration-700">
        
        <!-- Luxury Floating Metric Overlay -->
        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-forest-deep via-forest-deep/90 to-transparent p-7 text-white space-y-4">
          <div class="flex items-center justify-between border-b border-white/15 pb-3">
            <div class="flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
              <span class="font-label text-xs text-gold-light uppercase tracking-wider font-semibold">Active Ocean Corridor Desk</span>
            </div>
            <span class="text-xs text-emerald-300 font-mono bg-white/10 px-2 py-0.5 rounded">Port Clearance Synchronized</span>
          </div>
          
          <h3 class="font-headline text-2xl font-bold text-white tracking-tight">Precision Maritime Ocean Freight</h3>
          <p class="text-xs text-slate-200 leading-relaxed max-w-xl">
            Pre-booked container vessel allocations ensure rapid vessel turnaround times from South Indian deep-water sea terminals to major international seaports.
          </p>

          <div class="grid grid-cols-2 gap-3.5 pt-1">
            <div class="p-3.5 rounded-xl bg-black/45 backdrop-blur-md border border-white/15">
              <div class="text-2xl font-bold font-headline text-gold-light">20' &amp; 40'</div>
              <div class="text-[11px] text-slate-300 font-label tracking-wide uppercase mt-0.5">FCL Maritime Dry &amp; Reefer</div>
            </div>
            <div class="p-3.5 rounded-xl bg-black/45 backdrop-blur-md border border-white/15">
              <div class="text-2xl font-bold font-headline text-gold-light">24 Hours</div>
              <div class="text-[11px] text-slate-300 font-label tracking-wide uppercase mt-0.5">Commercial RFQ Turnaround</div>
            </div>
          </div>

          <div class="pt-2">
            <a href="{{ url('/contact') }}" class="text-xs text-gold-light hover:text-white font-label uppercase tracking-wider inline-flex items-center gap-1.5 font-semibold transition">
              Inquire About Shipping Schedules <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- CALL TO ACTION: Direct Quotation Request -->
<section class="py-24 bg-[#08241B] text-white relative overflow-hidden">
  <!-- Subtle ambient glow -->
  <div class="absolute inset-0 bg-radial-gradient from-forest-deep via-[#08241B] to-[#04130E] pointer-events-none" aria-hidden="true"></div>

  <div class="max-w-5xl mx-auto px-6 relative z-10">
    <div class="p-8 sm:p-12 lg:p-16 rounded-2xl bg-white/[0.03] backdrop-blur-xl border border-gold-light/25 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.8)] text-center text-reveal-group">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-light/15 border border-gold-light/30 text-gold-light font-label text-xs uppercase tracking-widest font-semibold mb-4">
        <span class="w-1.5 h-1.5 rounded-full bg-gold-light"></span>
        <span>Procurement &amp; Trade Desk</span>
      </div>
      <h2 class="font-headline text-3xl sm:text-4xl lg:text-5xl text-white font-bold tracking-tight">
        Require a Formal Wholesale Quotation?
      </h2>
      <div class="w-16 h-0.5 bg-gold-light/70 mx-auto mt-4 mb-4"></div>
      <p class="font-body text-base text-slate-200 max-w-2xl mx-auto leading-relaxed">
        Share your commodity specifications, required volume (MT or Container Loads), destination port, and delivery incoterms for an official proforma quotation within 24 business hours.
      </p>

      <!-- Institutional Guarantees -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 my-8 max-w-3xl mx-auto text-left">
        <div class="flex items-center gap-3 p-3 rounded-lg bg-black/30 border border-white/10">
          <span class="material-symbols-outlined text-gold-light text-xl">bolt</span>
          <div>
            <div class="text-xs font-bold text-white font-label">24h SLA</div>
            <div class="text-[11px] text-slate-300">Fast Proforma Dispatch</div>
          </div>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-lg bg-black/30 border border-white/10">
          <span class="material-symbols-outlined text-gold-light text-xl">price_check</span>
          <div>
            <div class="text-xs font-bold text-white font-label">Direct Mill Pricing</div>
            <div class="text-[11px] text-slate-300">Competitive Bulk Rates</div>
          </div>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-lg bg-black/30 border border-white/10">
          <span class="material-symbols-outlined text-gold-light text-xl">verified_user</span>
          <div>
            <div class="text-xs font-bold text-white font-label">Statutory Clearance</div>
            <div class="text-[11px] text-slate-300">Phytosanitary &amp; B/L</div>
          </div>
        </div>
      </div>

      <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
        <a href="{{ url('/contact') }}" class="px-8 py-3.5 rounded-lg bg-accent text-white font-label text-xs uppercase tracking-wider hover:bg-gold-light hover:text-charcoal transition-all shadow-lg font-semibold hover:scale-[1.02]">
          Request Formal Quotation
        </a>
        <a href="{{ url('/products') }}" class="px-8 py-3.5 rounded-lg border border-white/30 text-white hover:bg-white/10 font-label text-xs uppercase tracking-wider transition font-semibold">
          View Product Specifications
        </a>
      </div>
    </div>
  </div>
</section>

@endsection

@section('extra-js')
<script>
(function () {
  const canvases = [
    document.getElementById("heroGlobeCanvas"),
    document.getElementById("mobileGlobeCanvas")
  ].filter(Boolean);

  if (canvases.length === 0) return;

  const reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  let angle = 0.5, tilt = 0.24;

  // Major global export port coordinates & landmass clusters
  const pts = [
    [52,-118],[45,-98],[40,-76],[34,-114],[19,-98],[8,-72],[4,-64],[-14,-52],[-26,-58],[-38,-68],
    [58,12],[52,14],[48,6],[44,26],[40,-4],[35,8],[30,31],[18,22],[4,28],[-16,24],[-33,20],
    [34,52],[25,55],[22,76],[18,74],[10,77],[34,116],[22,114],[1,104],[35,139],[-24,136],[-34,142]
  ];

  // Key maritime export trade routes
  const routes = [
    [19,73,25,55],  // Mumbai / Cochin -> Dubai (Jebel Ali)
    [25,55,51,4],   // Dubai -> Rotterdam
    [19,73,1,104],  // Mumbai / Cochin -> Singapore
    [1,104,35,139], // Singapore -> Tokyo
    [51,4,40,-74],  // Rotterdam -> New York
    [25,55,-33,18]  // Dubai -> Cape Town
  ];

  function drawCanvas(cv, ry) {
    const ctx = cv.getContext("2d");
    if (!ctx) return;
    const w = cv.width, h = cv.height, cx = w / 2, cy = h / 2, r = w * 0.44;

    function proj(la, lo) {
      const lat = la * Math.PI / 180, lon = lo * Math.PI / 180 + ry;
      const x = Math.cos(lat) * Math.sin(lon), y = Math.sin(lat), z = Math.cos(lat) * Math.cos(lon);
      return {
        x: cx + x * r,
        y: cy - (y * Math.cos(tilt) - z * Math.sin(tilt)) * r,
        z: y * Math.sin(tilt) + z * Math.cos(tilt)
      };
    }

    ctx.clearRect(0, 0, w, h);

    // 3D Sphere body radial gradient
    const isMobile = cv.id === "mobileGlobeCanvas";
    const g = ctx.createRadialGradient(cx - r * 0.32, cy - r * 0.3, r * 0.08, cx, cy, r);
    if (isMobile) {
      // Hollow / translucent glass sphere for mobile so background image shines through
      g.addColorStop(0, "rgba(28,92,72,0.18)");
      g.addColorStop(0.55, "rgba(14,56,43,0.10)");
      g.addColorStop(0.88, "rgba(8,34,26,0.05)");
      g.addColorStop(1, "rgba(212,175,95,0.30)");
    } else {
      g.addColorStop(0, "rgba(28,92,72,0.92)");
      g.addColorStop(0.55, "rgba(14,56,43,0.96)");
      g.addColorStop(0.88, "rgba(8,34,26,0.98)");
      g.addColorStop(1, "rgba(212,175,95,0.25)");
    }

    ctx.beginPath();
    ctx.arc(cx, cy, r, 0, Math.PI * 2);
    ctx.fillStyle = g;
    ctx.fill();

    // Brushed gold outer rim
    ctx.strokeStyle = "rgba(229,196,120,0.65)";
    ctx.lineWidth = 1.8;
    ctx.stroke();

    ctx.save();
    ctx.beginPath();
    ctx.arc(cx, cy, r - 1, 0, Math.PI * 2);
    ctx.clip();

    // Latitude parallels
    for (let la = -60; la <= 60; la += 20) {
      ctx.beginPath();
      let s = false;
      for (let lo = -180; lo <= 180; lo += 6) {
        const p = proj(la, lo);
        if (p.z > 0) {
          s ? ctx.lineTo(p.x, p.y) : ctx.moveTo(p.x, p.y);
          s = true;
        } else {
          s = false;
        }
      }
      ctx.strokeStyle = la === 0 ? "rgba(229,196,120,0.5)" : "rgba(212,175,95,0.22)";
      ctx.lineWidth = la === 0 ? 1.4 : 1;
      ctx.stroke();
    }

    // Longitude meridians
    for (let lo = 0; lo < 360; lo += 20) {
      ctx.beginPath();
      let s = false;
      for (let la = -88; la <= 88; la += 6) {
        const p = proj(la, lo);
        if (p.z > 0) {
          s ? ctx.lineTo(p.x, p.y) : ctx.moveTo(p.x, p.y);
          s = true;
        } else {
          s = false;
        }
      }
      ctx.strokeStyle = "rgba(212,175,95,0.24)";
      ctx.lineWidth = 1;
      ctx.stroke();
    }

    // Gold landmass clusters
    pts.forEach(([la, lo]) => {
      const p = proj(la, lo);
      if (p.z > 0.02) {
        ctx.beginPath();
        ctx.arc(p.x, p.y, 2.2 + p.z * 1.2, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(235,204,132,${Math.min(1, p.z * 0.85 + 0.2).toFixed(2)})`;
        ctx.fill();
      }
    });

    // Maritime trade route arcs
    routes.forEach(([a, b, c, d]) => {
      ctx.beginPath();
      let s = false;
      for (let t = 0; t <= 1.001; t += 0.06) {
        const p = proj(a + (c - a) * t, b + (d - b) * t);
        if (p.z > 0.05) {
          s ? ctx.lineTo(p.x, p.y) : ctx.moveTo(p.x, p.y);
          s = true;
        } else {
          s = false;
        }
      }
      ctx.strokeStyle = "rgba(240,210,138,0.72)";
      ctx.lineWidth = 1.5;
      ctx.stroke();
    });

    ctx.restore();
  }

  function loop() {
    canvases.forEach(cv => drawCanvas(cv, angle));
    if (!reduced) {
      angle += 0.0045;
      requestAnimationFrame(loop);
    }
  }

  loop();
})();
</script>
@endsection
