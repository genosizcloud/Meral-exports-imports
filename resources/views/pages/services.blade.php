@extends('layouts.app')

@section('content')

<!-- PAGE HERO -->
<section class="bg-forest-deep text-white py-16 lg:py-20 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 relative z-10 space-y-4">
    <span class="font-label text-xs text-gold-light uppercase tracking-wider font-semibold">End-to-End Export Capabilities</span>
    <h1 class="font-headline text-3xl sm:text-4xl lg:text-[48px] lg:leading-[56px] text-white font-bold">
      Our Five-Stage International Supply Chain Flow.
    </h1>
    <p class="font-body text-base lg:text-lg text-slate-200 max-w-3xl leading-relaxed">
      From verified farm-gate aggregation to customs-sealed marine freight containers, explore the disciplined checkpoints that ensure quality, compliance, and punctual arrival.
    </p>
  </div>
</section>

<!-- STEP BY STEP PROCESS CARDS -->
<section class="py-20 bg-white border-b border-border-subtle">
  <div class="max-w-7xl mx-auto px-6 space-y-12">
    
    <!-- Step 1: Sourcing & Aggregation -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center p-8 rounded-xl bg-light-surface-container-low border border-border-subtle">
      <div class="lg:col-span-1 flex items-center justify-center">
        <span class="w-14 h-14 rounded-full bg-light-primary text-gold-light font-headline text-2xl font-bold flex items-center justify-center">01</span>
      </div>
      <div class="lg:col-span-7 space-y-2">
        <span class="font-label text-xs text-accent uppercase font-semibold">Stage One</span>
        <h3 class="font-headline text-2xl font-bold text-charcoal">Origin Sourcing &amp; Harvest Selection</h3>
        <p class="font-body text-sm text-slate-muted leading-relaxed">
          We contract direct seasonal yields from verified agricultural zones known for specific varietals (e.g. Malabar pepper estates, Punjab Basmati belts). Primary physical checks verify moisture baseline, foreign matter tolerances, and color purity before movement to central milling.
        </p>
      </div>
      <div class="lg:col-span-4 bg-white p-5 rounded-lg border border-border-subtle text-xs space-y-2 text-slate-muted">
        <div class="font-label text-xs text-charcoal font-semibold border-b pb-1 uppercase">Stage Deliverables</div>
        <div>• Farm-gate moisture &amp; defect logs</div>
        <div>• Agronomic traceability batch identifiers</div>
        <div>• Consignment lot grouping for milling</div>
      </div>
    </div>

    <!-- Step 2: Quality Checks & Lab Testing -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center p-8 rounded-xl bg-light-surface-container-low border border-border-subtle">
      <div class="lg:col-span-1 flex items-center justify-center">
        <span class="w-14 h-14 rounded-full bg-gold-muted text-accent font-headline text-2xl font-bold flex items-center justify-center">02</span>
      </div>
      <div class="lg:col-span-7 space-y-2">
        <span class="font-label text-xs text-accent uppercase font-semibold">Stage Two</span>
        <h3 class="font-headline text-2xl font-bold text-charcoal">Grading, Optical Sorting &amp; Laboratory Clearance</h3>
        <p class="font-body text-sm text-slate-muted leading-relaxed">
          Consignments pass through multi-tier gravity separators, magnetic de-stoners, and Buhler color sorters. Composite samples are sent to accredited laboratories for moisture analysis, pesticide residue checks, aflatoxin profiling, and microbiological screening.
        </p>
      </div>
      <div class="lg:col-span-4 bg-white p-5 rounded-lg border border-border-subtle text-xs space-y-2 text-slate-muted">
        <div class="font-label text-xs text-charcoal font-semibold border-b pb-1 uppercase">Compliance Milestones</div>
        <div>• Physical analysis sheet (grain length, purity %)</div>
        <div>• Laboratory Certificate of Analysis (COA)</div>
        <div>• Pre-shipment sample dispatch to buyer if requested</div>
      </div>
    </div>

    <!-- Step 3: Packaging & Custom Branding -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center p-8 rounded-xl bg-light-surface-container-low border border-border-subtle">
      <div class="lg:col-span-1 flex items-center justify-center">
        <span class="w-14 h-14 rounded-full bg-light-primary text-gold-light font-headline text-2xl font-bold flex items-center justify-center">03</span>
      </div>
      <div class="lg:col-span-7 space-y-2">
        <span class="font-label text-xs text-accent uppercase font-semibold">Stage Three</span>
        <h3 class="font-headline text-2xl font-bold text-charcoal">Export-Grade Protective Packaging</h3>
        <p class="font-body text-sm text-slate-muted leading-relaxed">
          Commodities are packed to resist humid maritime container environments. Options include food-grade multilayer paper sacks, vacuum-sealed nitrogen-flushed poly bags, woven polypropylene (PP) bags with liners, and 1-ton heavy-duty bulk tote bags. Buyer private-label printing supported.
        </p>
      </div>
      <div class="lg:col-span-4 bg-white p-5 rounded-lg border border-border-subtle text-xs space-y-2 text-slate-muted">
        <div class="font-label text-xs text-charcoal font-semibold border-b pb-1 uppercase">Packaging Formats</div>
        <div>• Bulk 25 kg / 50 kg PP &amp; Jute bags</div>
        <div>• Retail-ready 1 kg, 5 kg pouches with barcode</div>
        <div>• Desiccant packs and container Kraft lining included</div>
      </div>
    </div>

    <!-- Step 4: Documentation & Inspection -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center p-8 rounded-xl bg-light-surface-container-low border border-border-subtle">
      <div class="lg:col-span-1 flex items-center justify-center">
        <span class="w-14 h-14 rounded-full bg-gold-muted text-accent font-headline text-2xl font-bold flex items-center justify-center">04</span>
      </div>
      <div class="lg:col-span-7 space-y-2">
        <span class="font-label text-xs text-accent uppercase font-semibold">Stage Four</span>
        <h3 class="font-headline text-2xl font-bold text-charcoal">Customs, Fumigation &amp; Trade Documentation</h3>
        <p class="font-body text-sm text-slate-muted leading-relaxed">
          We process comprehensive statutory clearances including authorized port fumigation (Methyl Bromide / Phosphine), government Phytosanitary certification, Chamber of Commerce Certificate of Origin, and export customs declaration.
        </p>
      </div>
      <div class="lg:col-span-4 bg-white p-5 rounded-lg border border-border-subtle text-xs space-y-2 text-slate-muted">
        <div class="font-label text-xs text-charcoal font-semibold border-b pb-1 uppercase">Documentation Package</div>
        <div>• Commercial Invoice &amp; Detailed Packing List</div>
        <div>• Clean Shipped on Board Bill of Lading (B/L)</div>
        <div>• Phytosanitary, Fumigation &amp; Insurance Policy</div>
      </div>
    </div>

    <!-- Step 5: Shipping & Freight Support -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center p-8 rounded-xl bg-light-surface-container-low border border-border-subtle">
      <div class="lg:col-span-1 flex items-center justify-center">
        <span class="w-14 h-14 rounded-full bg-light-primary text-gold-light font-headline text-2xl font-bold flex items-center justify-center">05</span>
      </div>
      <div class="lg:col-span-7 space-y-2">
        <span class="font-label text-xs text-accent uppercase font-semibold">Stage Five</span>
        <h3 class="font-headline text-2xl font-bold text-charcoal">Container Stuffing, Sealing &amp; Ocean Dispatch</h3>
        <p class="font-body text-sm text-slate-muted leading-relaxed">
          Supervised container stuffing with high-security bolt seals. We book shipping slots on tier-one ocean liners to reduce transshipment delays and maintain real-time container status tracking until arrival at buyer discharge ports.
        </p>
      </div>
      <div class="lg:col-span-4 bg-white p-5 rounded-lg border border-border-subtle text-xs space-y-2 text-slate-muted">
        <div class="font-label text-xs text-charcoal font-semibold border-b pb-1 uppercase">Freight Coordination</div>
        <div>• Direct feeder connections to major transshipment ports</div>
        <div>• Container seal inspection photos sent to buyer</div>
        <div>• Real-time container tracking milestones via portal</div>
      </div>
    </div>

  </div>
</section>

<!-- INCOTERMS EXPLAINED FOR BUYERS -->
<section class="py-20 bg-light-surface">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <span class="font-label text-xs text-accent uppercase tracking-wider font-semibold">Commercial Contracting</span>
      <h2 class="font-headline text-3xl lg:text-4xl text-charcoal font-bold mt-1">Supported Trade Terms (Incoterms 2020)</h2>
      <p class="font-body text-sm text-slate-muted mt-3">We configure contracts to match your preferred risk allocation, maritime insurance, and freight management structure.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white p-8 rounded-xl border border-border-subtle shadow-sm">
        <div class="font-headline text-2xl font-bold text-light-primary mb-2">FOB</div>
        <div class="font-label text-xs text-accent uppercase mb-4 font-semibold">Free on Board (Port of Origin)</div>
        <p class="font-body text-xs sm:text-sm text-slate-muted leading-relaxed">
          Ideal for buyers who maintain contracted annual ocean freight rates with carriers. Meral handles inland transport, customs clearance, and loading past the ship's rail.
        </p>
      </div>

      <div class="bg-white p-8 rounded-xl border border-border-subtle shadow-sm">
        <div class="font-headline text-2xl font-bold text-light-primary mb-2">CIF</div>
        <div class="font-label text-xs text-accent uppercase mb-4 font-semibold">Cost, Insurance &amp; Freight</div>
        <p class="font-body text-xs sm:text-sm text-slate-muted leading-relaxed">
          Most preferred by regional distributors. Meral pays ocean freight and institutes comprehensive Institute Cargo Clauses (A) marine insurance until designated discharge port.
        </p>
      </div>

      <div class="bg-white p-8 rounded-xl border border-border-subtle shadow-sm">
        <div class="font-headline text-2xl font-bold text-light-primary mb-2">CFR</div>
        <div class="font-label text-xs text-accent uppercase mb-4 font-semibold">Cost and Freight</div>
        <p class="font-body text-xs sm:text-sm text-slate-muted leading-relaxed">
          Meral covers origin handling and ocean transport to destination port; the buyer procures their own maritime marine insurance coverage under corporate blanket policies.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- CALL TO ACTION -->
<section class="py-16 bg-forest-deep text-white text-center">
  <div class="max-w-4xl mx-auto px-6 space-y-4">
    <h2 class="font-headline text-3xl font-bold text-white">Have a Specific Destination Port or Specification?</h2>
    <p class="font-body text-sm text-slate-300">Submit your port details, container quantity, and grading criteria to our trade desk.</p>
    <div class="pt-4">
      <a href="{{ url('/contact') }}" class="px-8 py-3.5 rounded-md bg-accent text-white font-label text-xs uppercase tracking-wide hover:bg-gold-light hover:text-charcoal transition inline-flex items-center gap-2 font-semibold shadow-md">
        <span>Initiate Quotation Inquiry</span>
        <span class="material-symbols-outlined text-sm">arrow_forward</span>
      </a>
    </div>
  </div>
</section>

@endsection
