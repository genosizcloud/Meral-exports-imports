@extends('layouts.app')

@section('content')

<!-- PAGE HERO -->
<section class="bg-forest-deep text-white py-14">
  <div class="max-w-7xl mx-auto px-6 space-y-4">
    <span class="font-label text-xs text-gold-light uppercase tracking-wider font-semibold">Visual Documentation</span>
    <h1 class="font-headline text-3xl sm:text-4xl text-white font-bold">Export Facilities, Sourcing &amp; Logistics</h1>
    <p class="font-body text-sm sm:text-base text-slate-300 max-w-2xl leading-relaxed">
      A visual record of our origin harvests, hygienic processing infrastructure, testing laboratories, packaging lines, and maritime container loading.
    </p>
  </div>
</section>

<!-- GALLERY GRID WITH FILTER TABS -->
<section class="py-12 bg-light-surface">
  <div class="max-w-7xl mx-auto px-6 space-y-8">
    
    <!-- Filter Tabs -->
    <div class="flex flex-wrap items-center gap-2 border-b border-border-subtle pb-4" id="gallery-tabs">
      <button type="button" data-filter="all" class="gallery-tab active px-4 py-1.5 rounded-md bg-light-primary text-white font-label text-xs uppercase tracking-wide font-semibold shadow-sm transition">
        All Visuals
      </button>
      <button type="button" data-filter="product" class="gallery-tab px-4 py-1.5 rounded-md bg-white border border-border-subtle text-charcoal hover:border-light-primary font-label text-xs uppercase tracking-wide transition">
        Product Macro
      </button>
      <button type="button" data-filter="facility" class="gallery-tab px-4 py-1.5 rounded-md bg-white border border-border-subtle text-charcoal hover:border-light-primary font-label text-xs uppercase tracking-wide transition">
        Facility &amp; Sorting
      </button>
      <button type="button" data-filter="qa" class="gallery-tab px-4 py-1.5 rounded-md bg-white border border-border-subtle text-charcoal hover:border-light-primary font-label text-xs uppercase tracking-wide transition">
        Quality Testing Lab
      </button>
      <button type="button" data-filter="shipping" class="gallery-tab px-4 py-1.5 rounded-md bg-white border border-border-subtle text-charcoal hover:border-light-primary font-label text-xs uppercase tracking-wide transition">
        Port &amp; Shipping
      </button>
    </div>

    <!-- MASONRY / GRID OF REAL PHOTO ASSETS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="gallery-grid">
      @if(isset($galleryImages) && $galleryImages->count() > 0)
        @foreach($galleryImages as $img)
        @php
          $t = strtolower($img->title);
          if (str_contains($t, 'lab') || str_contains($t, 'chemical analysis')) {
            $catSlug = 'qa';
            $catLabel = 'Quality Testing Lab';
          } elseif (str_contains($t, 'port') || str_contains($t, 'container logistics') || str_contains($t, 'shipping')) {
            $catSlug = 'shipping';
            $catLabel = 'Port & Logistics';
          } elseif (str_contains($t, 'warehouse') || str_contains($t, 'facility') || str_contains($t, 'cleaning mill')) {
            $catSlug = 'facility';
            $catLabel = 'Facility & Warehouse';
          } else {
            $catSlug = 'product';
            $catLabel = 'Product Macro';
          }
        @endphp
        <div class="gallery-item group bg-white rounded-lg border border-border-subtle overflow-hidden shadow-sm hover:shadow-md transition duration-300" data-category="{{ $catSlug }}">
          <div class="aspect-[4/3] overflow-hidden bg-light-surface-container relative">
            <img src="{{ public_image_url($img->image) }}" alt="{{ $img->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
          </div>
          <div class="p-4">
            <span class="text-xs text-accent font-label uppercase font-semibold">{{ $catLabel }}</span>
            <h3 class="font-headline text-base font-bold text-charcoal mt-1 group-hover:text-light-primary transition">{{ $img->title }}</h3>
            <p class="font-body text-xs text-slate-muted mt-1">{{ $img->caption ?: 'Inspected export consignment certified for international standard moisture and purity tolerances.' }}</p>
          </div>
        </div>
        @endforeach
      @endif
    </div>

  </div>
</section>

@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const tabs = document.querySelectorAll('.gallery-tab');
  const items = document.querySelectorAll('.gallery-item');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => {
        t.classList.remove('active', 'bg-light-primary', 'text-white');
        t.classList.add('bg-white', 'text-charcoal');
      });
      tab.classList.add('active', 'bg-light-primary', 'text-white');
      tab.classList.remove('bg-white', 'text-charcoal');

      const filter = tab.getAttribute('data-filter');
      items.forEach(item => {
        const cat = item.getAttribute('data-category');
        if (filter === 'all' || cat === filter) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
});
</script>
@endsection
