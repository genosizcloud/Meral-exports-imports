@extends('layouts.app')

@section('content')

<main class="flex-1 py-12 bg-light-surface">
  <div class="max-w-7xl mx-auto px-6">
    
    <!-- BREADCRUMB -->
    <nav class="flex items-center gap-2 text-xs text-slate-muted font-label uppercase tracking-wide mb-8" aria-label="Breadcrumb">
      <a href="{{ url('/') }}" class="hover:text-light-primary">Home</a>
      <span>/</span>
      <a href="{{ url('/products') }}" class="hover:text-light-primary">Products Catalog</a>
      <span>/</span>
      @if($product->category)
      <a href="{{ url('/products') }}?cat={{ $product->category->slug }}" class="hover:text-light-primary">{{ $product->category->name }}</a>
      <span>/</span>
      @endif
      <span class="text-charcoal font-semibold">{{ $product->name }}</span>
    </nav>

    <!-- PRODUCT SHOWCASE ROW -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start pb-16 border-b border-border-subtle">
      
      <!-- Left: Image Gallery & Badges -->
      <div class="lg:col-span-6 space-y-4">
        <div class="relative bg-white rounded-xl border border-border-subtle overflow-hidden shadow-sm aspect-[4/3] flex items-center justify-center">
          <span class="absolute top-4 left-4 z-10 inline-flex items-center gap-1.5 px-3 py-1 rounded bg-gold-muted text-accent font-label text-xs uppercase font-semibold border border-gold-light/40">
            <span class="material-symbols-outlined text-sm">verified</span> {{ $product->badge_text ?: 'Export Verified' }}
          </span>
          @if($product->image)
            <img src="{{ public_image_url($product->image) }}" alt="{{ $product->name }}" id="mainProductImage" class="w-full h-full object-cover">
          @else
            <div class="w-full h-full flex items-center justify-center text-7xl bg-light-surface-container">
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

        <div class="grid grid-cols-3 gap-4">
          <div class="aspect-[4/3] rounded-lg border-2 border-light-primary overflow-hidden bg-light-surface-container flex items-center justify-center">
            @if($product->image)
              <img src="{{ public_image_url($product->image) }}" alt="Thumbnail" class="w-full h-full object-cover">
            @else
              <span class="text-3xl">📦</span>
            @endif
          </div>
          <div class="aspect-[4/3] rounded-lg border border-border-subtle overflow-hidden bg-white flex flex-col items-center justify-center p-3 text-center">
            <span class="material-symbols-outlined text-light-primary text-2xl">science</span>
            <span class="text-[11px] font-label font-semibold text-slate-600 mt-1 uppercase">Lab Tested</span>
          </div>
          <div class="aspect-[4/3] rounded-lg border border-border-subtle overflow-hidden bg-white flex flex-col items-center justify-center p-3 text-center">
            <span class="material-symbols-outlined text-accent text-2xl">local_shipping</span>
            <span class="text-[11px] font-label font-semibold text-slate-600 mt-1 uppercase">FCL Marine</span>
          </div>
        </div>
      </div>

      <!-- Right: Primary Metadata, Commodity Overview & Direct Action -->
      <div class="lg:col-span-6 space-y-6">
        <div>
          <div class="flex flex-wrap items-center gap-3 text-xs font-label text-slate-muted uppercase tracking-wider mb-2">
            <span class="px-2 py-0.5 rounded bg-light-surface-container text-charcoal font-semibold">
              Vertical: {{ $product->category->name ?? 'Export Commodity' }}
            </span>
            <span>•</span>
            <span class="text-accent font-semibold">Origin: Certified Indian Harvest</span>
          </div>
          <h1 class="font-headline text-3xl sm:text-4xl text-charcoal font-bold">
            {{ $product->name }}
          </h1>
          <p class="font-body text-base text-slate-muted mt-3 leading-relaxed">
            {{ $product->description }}
          </p>
        </div>

        <!-- Quick Trade At-a-Glance Box -->
        <div class="p-5 rounded-lg bg-light-surface-container-low border border-border-subtle grid grid-cols-2 sm:grid-cols-3 gap-4 text-xs">
          <div>
            <span class="text-slate-muted block font-label uppercase">Grade Standard</span>
            <span class="text-charcoal font-headline text-base font-bold">{{ $product->badge_text ?: 'Export Grade A' }}</span>
          </div>
          <div>
            <span class="text-slate-muted block font-label uppercase">Moisture Level</span>
            <span class="text-charcoal font-headline text-base font-bold">&lt; 12.0% Max</span>
          </div>
          <div>
            <span class="text-slate-muted block font-label uppercase">Minimum Order</span>
            <span class="text-charcoal font-headline text-base font-bold">1x20' FCL (Bulk)</span>
          </div>
          <div>
            <span class="text-slate-muted block font-label uppercase">Port of Loading</span>
            <span class="text-charcoal font-semibold">Cochin / Designated Port</span>
          </div>
          <div>
            <span class="text-slate-muted block font-label uppercase">Standard Pack</span>
            <span class="text-charcoal font-semibold">25kg / 50kg PP / Jute</span>
          </div>
          <div>
            <span class="text-slate-muted block font-label uppercase">Shelf Life</span>
            <span class="text-charcoal font-semibold">24 Months</span>
          </div>
        </div>

        <!-- CTAs -->
        <div class="flex flex-wrap items-center gap-4 pt-2">
          <a href="#rfq-section" class="px-7 py-3 rounded-md bg-light-primary text-white font-label text-xs uppercase tracking-wide hover:bg-forest-deep transition flex items-center gap-2 shadow-sm font-semibold">
            <span class="material-symbols-outlined text-sm">request_quote</span>
            <span>Request Spot Quotation</span>
          </a>
          <a href="{{ url('/products') }}" class="px-6 py-3 rounded-md border border-border-subtle text-charcoal hover:bg-white font-label text-xs uppercase tracking-wide transition font-semibold">
            Back to Catalog
          </a>
        </div>

        <!-- Compliance Checkpoints -->
        <div class="pt-4 border-t border-border-subtle flex flex-wrap items-center gap-4 text-xs text-slate-500 font-label">
          <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm text-emerald-600">check_circle</span> Pre-Shipment Inspection</span>
          <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm text-emerald-600">check_circle</span> Fumigation Certified</span>
          <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm text-emerald-600">check_circle</span> Phytosanitary Cleared</span>
        </div>
      </div>

    </div>

    <!-- TECHNICAL SPECIFICATIONS & COMPLIANCE -->
    <div class="py-16 border-b border-border-subtle grid grid-cols-1 lg:grid-cols-12 gap-12">
      <div class="lg:col-span-8 space-y-6">
        <h2 class="font-headline text-2xl font-bold text-charcoal">Technical Quality Parameters</h2>
        <div class="overflow-x-auto rounded-lg border border-border-subtle bg-white shadow-sm">
          <table class="w-full text-left text-xs border-collapse">
            <thead class="bg-light-surface-container font-label uppercase text-slate-500 border-b border-border-subtle">
              <tr>
                <th class="py-3 px-4">Parameter</th>
                <th class="py-3 px-4">Export Standard Value</th>
                <th class="py-3 px-4">Test Methodology</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-border-subtle text-charcoal font-body">
              <tr>
                <td class="py-3 px-4 font-semibold">Product Description</td>
                <td class="py-3 px-4">{{ $product->name }}</td>
                <td class="py-3 px-4 text-slate-500">Visual &amp; Optical Sorter</td>
              </tr>
              <tr>
                <td class="py-3 px-4 font-semibold">Purity Baseline</td>
                <td class="py-3 px-4">99.0% - 99.8% Minimum</td>
                <td class="py-3 px-4 text-slate-500">Gravimetric Density Separator</td>
              </tr>
              <tr>
                <td class="py-3 px-4 font-semibold">Moisture Tolerance</td>
                <td class="py-3 px-4">&lt; 12.0% Maximum</td>
                <td class="py-3 px-4 text-slate-500">Standard Oven Dry / Halogen Meter</td>
              </tr>
              <tr>
                <td class="py-3 px-4 font-semibold">Extraneous Foreign Matter</td>
                <td class="py-3 px-4">&lt; 0.5% by weight max</td>
                <td class="py-3 px-4 text-slate-500">ISO / ASTA Physical Test</td>
              </tr>
              <tr>
                <td class="py-3 px-4 font-semibold">Packaging Formats</td>
                <td class="py-3 px-4">25kg / 50kg Multiwall Paper, Jute, or PP Bags</td>
                <td class="py-3 px-4 text-slate-500">Food Grade Heavy-Duty Sealing</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="lg:col-span-4 space-y-4">
        <h3 class="font-headline text-xl font-bold text-charcoal">Contract Documentation Package</h3>
        <div class="bg-white p-5 rounded-lg border border-border-subtle shadow-sm space-y-3 text-xs text-slate-600">
          <div class="flex items-start gap-2">
            <span class="material-symbols-outlined text-base text-accent">description</span>
            <div>
              <span class="font-semibold text-charcoal block">Commercial Invoice &amp; Packing List</span>
              Itemized weights, batch codes, and shipping marks.
            </div>
          </div>
          <div class="flex items-start gap-2">
            <span class="material-symbols-outlined text-base text-accent">verified</span>
            <div>
              <span class="font-semibold text-charcoal block">Phytosanitary Certificate</span>
              Issued by authorized government inspection agencies.
            </div>
          </div>
          <div class="flex items-start gap-2">
            <span class="material-symbols-outlined text-base text-accent">local_shipping</span>
            <div>
              <span class="material-symbols-outlined text-xs"></span>
              <span class="font-semibold text-charcoal block">Clean Shipped On-Board Bill of Lading</span>
              Express maritime container tracking.
            </div>
          </div>
          <div class="flex items-start gap-2">
            <span class="material-symbols-outlined text-base text-accent">biotech</span>
            <div>
              <span class="font-semibold text-charcoal block">Certificate of Analysis (COA)</span>
              Accredited laboratory analysis with batch release.
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- INLINE REQUEST FOR QUOTE FORM -->
    <div id="rfq-section" class="py-16">
      <div class="bg-white rounded-xl border border-border-subtle p-8 shadow-sm max-w-4xl mx-auto">
        <div class="border-b border-border-subtle pb-4 mb-6">
          <span class="text-xs text-accent font-label uppercase font-semibold">Direct Trade Desk Allocation</span>
          <h2 class="font-headline text-2xl sm:text-3xl font-bold text-charcoal mt-1">Submit RFQ for {{ $product->name }}</h2>
          <p class="font-body text-xs sm:text-sm text-slate-muted mt-1">
            Complete the form below to receive a formal proforma quotation and delivery schedule within 24 business hours.
          </p>
        </div>

        <form action="{{ route('enquiry.store') }}" method="POST" class="space-y-6">
          @csrf
          <input type="hidden" name="product_name" value="{{ $product->name }}">

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            
            <div>
              <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1">Your Full Name *</label>
              <input type="text" name="name" required class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
            </div>

            <div>
              <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1">Company / Importer Name *</label>
              <input type="text" name="company" required class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
            </div>

            <div>
              <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1">Corporate Email Address *</label>
              <input type="email" name="email" required class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
            </div>

            <div>
              <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1">Phone / WhatsApp with Country Code *</label>
              <input type="tel" name="phone" required class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
            </div>

            <div>
              <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1">Estimated Order Volume *</label>
              <select name="volume" class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
                <option value="1x20 FCL">1 x 20' FCL (Standard Container)</option>
                <option value="2-5x20 FCL">2 to 5 x 20' FCL Consignment</option>
                <option value="LCL Trial">Trial LCL Consignment (Palletized)</option>
                <option value="Annual Contract">Annual Supply Agreement (Multiple FCL)</option>
              </select>
            </div>

            <div>
              <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1">Destination Port &amp; Country *</label>
              <input type="text" name="destination_port" required class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
            </div>

            <div>
              <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1">Preferred Incoterm</label>
              <select name="incoterm" class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
                <option value="CIF">CIF (Cost, Insurance &amp; Freight)</option>
                <option value="FOB">FOB (Free on Board Loading Port)</option>
                <option value="CFR">CFR (Cost &amp; Freight)</option>
              </select>
            </div>

            <div>
              <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1">Packaging Preference</label>
              <select name="packaging" class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
                <option value="Standard Jute/PP">Standard 25kg / 50kg PP &amp; Jute Bags</option>
                <option value="Private Label">Buyer Custom Private-Label Bags</option>
                <option value="Bulk Totes">1-Ton Heavy Duty Bulk Totes</option>
              </select>
            </div>

          </div>

          <div>
            <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1">Additional Specification or Special Inspection Demands</label>
            <textarea name="message" rows="3" class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none"></textarea>
          </div>

          <div class="pt-2 text-center">
            <button type="submit" class="px-8 py-3.5 rounded-md bg-light-primary text-white font-label text-xs uppercase tracking-wide hover:bg-forest-deep shadow-md transition font-semibold">
              Submit Formal RFQ to Trade Desk
            </button>
            <p class="text-xs text-slate-muted mt-2">Commercial proforma quotes are issued to corporate emails within 24 business hours.</p>
          </div>
        </form>
      </div>
    </div>

    <!-- RELATED COMMODITIES -->
    @if(isset($relatedProducts) && $relatedProducts->count() > 0)
    <div class="pt-8 border-t border-border-subtle">
      <h3 class="font-headline text-2xl font-bold text-charcoal mb-6">Related Commodities</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($relatedProducts as $rel)
        <a href="{{ url('/products/' . $rel->slug) }}" class="group bg-white rounded-lg border border-border-subtle overflow-hidden hover:shadow-md hover:border-accent transition flex flex-col">
          <div class="aspect-[4/3] bg-light-surface-container overflow-hidden">
            @if($rel->image)
              <img src="{{ public_image_url($rel->image) }}" alt="{{ $rel->name }}" class="w-full h-full object-cover group-hover:scale-105 transition">
            @else
              <div class="w-full h-full flex items-center justify-center text-3xl">📦</div>
            @endif
          </div>
          <div class="p-4 flex-1 flex flex-col justify-between">
            <div>
              <div class="text-xs text-emerald-700 font-semibold mb-1">{{ $rel->badge_text ?: 'Export Grade' }}</div>
              <h4 class="font-headline text-base font-bold text-charcoal group-hover:text-light-primary transition">{{ $rel->name }}</h4>
            </div>
            <div class="mt-3 text-xs text-light-primary font-semibold flex items-center gap-1">
              <span>View Specs</span>
              <span class="material-symbols-outlined text-xs">arrow_forward</span>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    @endif

  </div>
</main>

@endsection
