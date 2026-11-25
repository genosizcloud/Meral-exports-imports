@extends('layouts.app')

@section('content')

<!-- PAGE HEADER & SEARCH TOOLBAR -->
<section class="relative bg-gradient-to-b from-[#0d2118] via-forest-deep to-[#091611] text-white py-14 border-b border-light-secondary/40 overflow-hidden">
  <!-- Subtle ambient glow for authentic frosted glass refraction -->
  <div class="pointer-events-none absolute -top-24 -right-12 w-96 h-96 bg-emerald-400/10 rounded-full blur-3xl"></div>
  <div class="pointer-events-none absolute -bottom-20 right-1/4 w-80 h-80 bg-gold-light/5 rounded-full blur-3xl"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-6 space-y-4">
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
      <div>
        <span class="font-label text-xs text-gold-light uppercase tracking-wider font-semibold">Wholesale Trade Catalog</span>
        <h1 class="font-headline text-3xl sm:text-4xl text-white font-bold mt-1">Export-Grade Food Commodities</h1>
        <p class="font-body text-sm sm:text-base text-slate-300 mt-2 max-w-2xl leading-relaxed">
          Strictly B2B institutional supply. Search specifications, check container minimum order quantities (MOQ), and request spot commercial quotations.
        </p>
      </div>

      <!-- iPhone Frosted Glass Search Bar -->
      <div class="w-full lg:w-[420px] shrink-0">
        <div class="ios-glass-search group relative flex items-center h-12 px-4 rounded-full transition-all duration-300">
          <!-- Glass background with multi-stop gradient & refraction specular highlight -->
          <div class="pointer-events-none absolute inset-0 rounded-full transition-all duration-300 ios-glass-bg"></div>
          
          <!-- Top hairline specular light refraction (iOS Apple Glass Sheen) -->
          <div class="pointer-events-none absolute inset-x-6 top-0 h-[1px] bg-gradient-to-r from-transparent via-white/80 to-transparent rounded-full z-10"></div>
          
          <!-- iOS Crisp Search SVG Icon -->
          <svg class="relative z-10 w-[18px] h-[18px] text-white/80 group-focus-within:text-white transition-colors duration-200 shrink-0 select-none mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="7.5"></circle>
            <path d="m21 21-4.35-4.35"></path>
          </svg>

          <!-- Input -->
          <input 
            type="text" 
            id="catalog-search" 
            placeholder="Search commodity, variety, or grade..." 
            autocomplete="off"
            spellcheck="false"
            class="relative z-10 w-full bg-transparent text-white placeholder:text-white/55 text-sm font-medium tracking-wide focus:outline-none focus:ring-0 border-0 outline-none pr-3 shadow-none">

          <!-- iOS Circular Clear Button -->
          <button 
            type="button" 
            id="catalog-search-clear" 
            class="hidden relative z-10 w-5 h-5 rounded-full bg-white/25 hover:bg-white/40 active:scale-90 flex items-center justify-center text-white transition-all duration-200 shrink-0" 
            title="Clear search">
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* ── iPhone iOS Frosted Glass Search Bar ── */
.ios-glass-search {
  position: relative;
  isolation: isolate;
}

#catalog-search {
  outline: none !important;
  box-shadow: none !important;
  border: none !important;
}

.ios-glass-bg {
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.24) 0%, rgba(255, 255, 255, 0.10) 100%);
  backdrop-filter: blur(32px) saturate(220%) brightness(118%);
  -webkit-backdrop-filter: blur(32px) saturate(220%) brightness(118%);
  border: 1px solid rgba(255, 255, 255, 0.32);
  box-shadow: 
    0 12px 32px -4px rgba(0, 0, 0, 0.40),
    0 2px 8px 0 rgba(0, 0, 0, 0.20),
    inset 0 1.5px 1.5px 0 rgba(255, 255, 255, 0.65),
    inset 0 -1px 1px 0 rgba(0, 0, 0, 0.18);
}

.ios-glass-search:hover .ios-glass-bg {
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.30) 0%, rgba(255, 255, 255, 0.14) 100%);
  border-color: rgba(255, 255, 255, 0.45);
  box-shadow: 
    0 16px 38px -4px rgba(0, 0, 0, 0.45),
    0 4px 10px 0 rgba(0, 0, 0, 0.20),
    inset 0 1.5px 1.5px 0 rgba(255, 255, 255, 0.75),
    inset 0 -1px 1px 0 rgba(0, 0, 0, 0.18);
}

.ios-glass-search:focus-within .ios-glass-bg {
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.34) 0%, rgba(255, 255, 255, 0.16) 100%);
  border-color: rgba(255, 255, 255, 0.65);
  box-shadow: 
    0 0 0 3.5px rgba(255, 255, 255, 0.18),
    0 20px 42px -4px rgba(0, 0, 0, 0.50),
    inset 0 1.5px 1.5px 0 rgba(255, 255, 255, 0.85),
    inset 0 -1px 1px 0 rgba(0, 0, 0, 0.15);
}
</style>

<!-- CATALOG CONTENT & CATEGORY FILTERS -->
<section class="py-12 bg-light-surface">
  <div class="max-w-7xl mx-auto px-6">
    
    <!-- Category Filter Tabs -->
    <div class="flex flex-wrap items-center justify-between gap-4 pb-8 border-b border-border-subtle">
      <div class="flex flex-wrap items-center gap-2" id="filter-tabs">
        <button type="button" data-filter="all" class="filter-tab-btn active px-4 py-2 rounded-full bg-light-primary text-white font-label text-xs uppercase tracking-wide font-semibold shadow-sm transition">
          All Commodities ({{ $products->count() }})
        </button>
        @foreach($categories as $category)
        <button type="button" data-filter="{{ $category->slug }}" class="filter-tab-btn px-4 py-2 rounded-full bg-white border border-border-subtle text-charcoal hover:border-light-primary font-label text-xs uppercase tracking-wide transition">
          {{ $category->name }}
        </button>
        @endforeach
      </div>

      <div class="text-xs text-slate-muted font-label">
        Showing <span id="visible-count" class="font-bold text-charcoal">{{ $products->count() }}</span> Export Grade Items
      </div>
    </div>

    <!-- PRODUCT GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 pt-8" id="products-grid">
      @forelse($products as $product)
      @php
        $catSlug = $product->category->slug ?? 'other';
        $catName = $product->category->name ?? 'General';
      @endphp
      <article class="product-item bg-white rounded-lg border border-border-subtle overflow-hidden shadow-sm hover:shadow-md hover:border-accent transition flex flex-col" data-cat="{{ $catSlug }}" data-title="{{ strtolower($product->name . ' ' . ($product->badge_text ?? '') . ' ' . $catName . ' ' . strip_tags($product->description ?? '')) }}">
        
        <div class="relative bg-light-surface-container aspect-[4/3] overflow-hidden">
          <span class="absolute top-3 left-3 z-10 px-2 py-0.5 rounded bg-light-primary text-gold-light text-xs font-label uppercase font-semibold">
            {{ $catName }}
          </span>
          @if($product->image)
            <img src="{{ public_image_url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-4xl bg-light-surface-container\'>📦</div>';">
          @else
            <div class="w-full h-full flex items-center justify-center text-4xl bg-light-surface-container">
              @if(str_contains(strtolower($product->name), 'pepper')) 🌶️
              @elseif(str_contains(strtolower($product->name), 'rice')) 🌾
              @elseif(str_contains(strtolower($product->name), 'cardamom')) 🌱
              @elseif(str_contains(strtolower($product->name), 'turmeric')) 🫚
              @elseif(str_contains(strtolower($product->name), 'chickpea') || str_contains(strtolower($product->name), 'lentil')) 🫘
              @elseif(str_contains(strtolower($product->name), 'oil') || str_contains(strtolower($product->name), 'sesame')) 🌻
              @else 📦 @endif
            </div>
          @endif
        </div>

        <div class="p-5 flex-1 flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between text-xs text-slate-muted mb-1">
              <span class="font-mono text-slate-500 font-semibold">{{ $catName }}</span>
              <span class="text-emerald-700 font-medium">{{ $product->badge_text ?: 'Export Grade A' }}</span>
            </div>
            <h3 class="font-headline text-lg font-bold text-charcoal mt-1">{{ $product->name }}</h3>
            <p class="font-body text-xs text-slate-muted mt-2 line-clamp-2">
              {{ $product->description }}
            </p>
            <div class="mt-3 text-xs bg-light-surface-container p-2 rounded text-slate-600 font-mono">
              MOQ: 1x20' FCL (Standard) | Jute / PP
            </div>
          </div>

          <div class="pt-4 border-t border-border-subtle mt-4 flex items-center justify-between">
            <a href="{{ url('/products/' . $product->slug) }}" class="font-label text-xs uppercase tracking-wide text-light-primary hover:text-accent font-semibold flex items-center gap-1">
              <span>Specs Sheet</span>
              <span class="material-symbols-outlined text-sm">visibility</span>
            </a>
            <a href="{{ url('/contact') }}?product={{ urlencode($product->name) }}" class="px-3.5 py-1.5 rounded bg-light-primary text-white font-label text-xs uppercase tracking-wide hover:bg-forest-deep transition">
              Enquire
            </a>
          </div>
        </div>

      </article>
      @empty
      <div class="col-span-4 p-12 bg-white rounded-lg text-center text-slate-muted">
        No commodities currently cataloged.
      </div>
      @endforelse
    </div>

    <!-- Empty search notice -->
    <div id="no-search-results" class="hidden text-center py-16">
      <span class="material-symbols-outlined text-4xl text-slate-400 mb-2">search_off</span>
      <h3 class="font-headline text-xl text-charcoal font-bold">No Matching Commodities Found</h3>
      <p class="text-sm text-slate-muted mt-1">Try adjusting your keyword or reset the category filter.</p>
    </div>

    <!-- WHOLESALE COMMODITY NOTICE -->
    <div class="mt-16 p-6 rounded-lg bg-light-surface-container border border-border-subtle flex flex-col md:flex-row items-center justify-between gap-6">
      <div class="flex items-center gap-4">
        <span class="material-symbols-outlined text-3xl text-accent">info</span>
        <div>
          <div class="font-headline text-lg font-bold text-charcoal">Need custom bulk grading or unlisted varietals?</div>
          <p class="font-body text-xs text-slate-muted">Our trade desk sources non-cataloged regional pulses, spices, and oilseeds against verified buyer specifications.</p>
        </div>
      </div>
      <a href="{{ url('/contact') }}" class="px-6 py-2.5 rounded bg-light-primary text-white font-label text-xs uppercase tracking-wide hover:bg-forest-deep transition whitespace-nowrap">
        Submit Custom Commodity Inquiry
      </a>
    </div>

  </div>
</section>

@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('catalog-search');
  const clearBtn = document.getElementById('catalog-search-clear');
  const tabs = document.querySelectorAll('.filter-tab-btn');
  const items = document.querySelectorAll('.product-item');
  const countEl = document.getElementById('visible-count');
  const emptyNotice = document.getElementById('no-search-results');
  
  let currentFilter = 'all';
  let searchQuery = '';

  // Check URL params (?cat= or ?q= / ?search=)
  const urlParams = new URLSearchParams(window.location.search);
  const paramCat = urlParams.get('cat');
  if (paramCat) {
    currentFilter = paramCat;
    tabs.forEach(tab => {
      if (tab.dataset.filter === paramCat) {
        tabs.forEach(t => t.classList.remove('active', 'bg-light-primary', 'text-white'));
        tabs.forEach(t => t.classList.add('bg-white', 'text-charcoal'));
        tab.classList.add('active', 'bg-light-primary', 'text-white');
        tab.classList.remove('bg-white', 'text-charcoal');
      }
    });
  }

  const initialQuery = urlParams.get('q') || urlParams.get('search');
  if (initialQuery && searchInput) {
    searchInput.value = initialQuery;
    searchQuery = initialQuery.toLowerCase().trim();
    if (clearBtn) clearBtn.classList.remove('hidden');
  }

  function applyFilters() {
    let visible = 0;
    items.forEach(item => {
      const cat = item.dataset.cat;
      const title = item.dataset.title;
      const matchesCat = (currentFilter === 'all' || cat === currentFilter);
      const matchesSearch = !searchQuery || title.includes(searchQuery);

      if (matchesCat && matchesSearch) {
        item.style.display = '';
        visible++;
      } else {
        item.style.display = 'none';
      }
    });

    if (countEl) countEl.textContent = visible;
    if (emptyNotice) {
      emptyNotice.classList.toggle('hidden', visible > 0);
    }
  }

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => {
        t.classList.remove('active', 'bg-light-primary', 'text-white');
        t.classList.add('bg-white', 'text-charcoal');
      });
      tab.classList.add('active', 'bg-light-primary', 'text-white');
      tab.classList.remove('bg-white', 'text-charcoal');
      currentFilter = tab.dataset.filter;
      applyFilters();
    });
  });

  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      searchQuery = e.target.value.toLowerCase().trim();
      if (clearBtn) {
        clearBtn.classList.toggle('hidden', searchQuery.length === 0);
      }
      applyFilters();
    });
  }

  if (clearBtn) {
    clearBtn.addEventListener('click', () => {
      if (searchInput) {
        searchInput.value = '';
        searchInput.focus();
      }
      searchQuery = '';
      clearBtn.classList.add('hidden');
      applyFilters();
    });
  }

  applyFilters();
});
</script>
@endsection
