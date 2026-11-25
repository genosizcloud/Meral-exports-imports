@extends('layouts.app')

@section('content')

<!-- PAGE HERO -->
<section class="bg-forest-deep text-white py-16 lg:py-20 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 relative z-10 space-y-4">
    <span class="font-label text-xs text-gold-light uppercase tracking-wider font-semibold">About Meral Exports &amp; Imports Pvt Ltd</span>
    <h1 class="font-headline text-3xl sm:text-4xl lg:text-[48px] lg:leading-[56px] text-white font-bold">
      A Legacy of Agricultural Provenance &amp; Transparent Trade.
    </h1>
    <p class="font-body text-base lg:text-lg text-slate-200 max-w-3xl leading-relaxed">
      Operating as the dedicated international food trade arm under the parent Meral Group, we bridge fertile agricultural origins with demanding wholesale markets across the globe.
    </p>
  </div>
</section>

<!-- COMPANY STORY & SOURCING PHILOSOPHY -->
<section class="py-20 bg-white border-b border-border-subtle">
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
    
    <div class="lg:col-span-6 space-y-6">
      <span class="font-label text-xs text-accent uppercase tracking-wider font-semibold">Our Foundation</span>
      <h2 class="font-headline text-2xl sm:text-3xl lg:text-4xl text-charcoal font-bold">
        Engineered for Wholesale Consistency &amp; Contract Adherence
      </h2>
      <p class="font-body text-sm text-slate-muted leading-relaxed">
        International food trade leaves no margin for grading discrepancies, delayed fumigation, or compromised packaging. Meral Exports &amp; Imports Pvt Ltd was established to provide global commodity buyers with absolute predictability from crop harvest to container discharge.
      </p>
      <p class="font-body text-sm text-slate-muted leading-relaxed">
        By building direct relationships with grower cooperatives, modern cleaning mills, and solvent extraction plants, we maintain stringent control over sorting, moisture retention, and uniform grain sizing. Every trade commitment is backed by verifiable documentation and honest communication.
      </p>

      <div class="grid grid-cols-2 gap-6 pt-4 border-t border-border-subtle">
        <div>
          <div class="font-headline text-3xl font-bold text-light-primary">
            @if(isset($stats) && $stats->count() > 0)
              {{ $stats->first()->value ?? '50,000+' }} {{ $stats->first()->suffix ?? 'MT' }}
            @else
              50,000+ MT
            @endif
          </div>
          <div class="font-label text-xs text-slate-muted mt-1 uppercase">Multi-commodity processing &amp; export clearing throughput</div>
        </div>
        <div>
          <div class="font-headline text-3xl font-bold text-light-primary">100% Traceable</div>
          <div class="font-label text-xs text-slate-muted mt-1 uppercase">Batch-coded sourcing to primary collection hubs</div>
        </div>
      </div>
    </div>

    <div class="lg:col-span-6">
      <div class="relative rounded-lg overflow-hidden border border-border-subtle shadow-lg bg-light-surface-container group">
        <div class="w-full h-[400px] relative overflow-hidden">
          <img src="{{ asset('images/stitch/facility_quality_lab.jpg') }}" alt="Modern Laboratory and Quality Inspection Facility" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
          <div class="absolute inset-0 bg-gradient-to-t from-forest-deep via-forest-deep/40 to-transparent flex items-end p-6">
            <div class="space-y-1">
              <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded bg-gold-light/20 text-gold-light text-xs font-label uppercase font-semibold">
                <span class="material-symbols-outlined text-sm">verified</span> Pre-Shipment Tested
              </span>
              <h3 class="font-headline text-2xl font-bold text-white">Modern Quality Inspection &amp; Lab Sorting</h3>
            </div>
          </div>
        </div>
        <div class="p-6 bg-light-surface-container border-t border-border-subtle">
          <h4 class="font-headline text-base font-bold text-charcoal">Hygienic Sorting &amp; Grading Facilities</h4>
          <p class="font-body text-xs text-slate-muted mt-1">
            Equipped with optical color sorters, moisture testing meters, and climate-controlled dry warehousing.
          </p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- SOURCING APPROACH & VALUES -->
<section class="py-20 bg-light-surface-container-low border-b border-border-subtle">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <span class="font-label text-xs text-accent uppercase tracking-wider font-semibold">Operational Principles</span>
      <h2 class="font-headline text-3xl lg:text-4xl text-charcoal font-bold mt-1">
        Our Four Pillars of Export Excellence
      </h2>
      <p class="font-body text-sm text-slate-muted mt-3">
        Every transaction is governed by standard operating protocols designed to protect buyer investments and ensure food safety compliance.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <div class="p-6 rounded-lg bg-white border border-border-subtle shadow-sm">
        <div class="w-12 h-12 rounded bg-light-surface-container text-light-primary flex items-center justify-center mb-4">
          <span class="material-symbols-outlined text-2xl">eco</span>
        </div>
        <h3 class="font-headline text-lg font-bold text-charcoal mb-2">Sustainable Grower Partnerships</h3>
        <p class="font-body text-xs text-slate-muted leading-relaxed">
          Equitable pricing structures with farming clusters guarantee first-selection crop allocation and uninterrupted supply through varying harvest cycles.
        </p>
      </div>

      <div class="p-6 rounded-lg bg-white border border-border-subtle shadow-sm">
        <div class="w-12 h-12 rounded bg-gold-muted text-accent flex items-center justify-center mb-4">
          <span class="material-symbols-outlined text-2xl">fact_check</span>
        </div>
        <h3 class="font-headline text-lg font-bold text-charcoal mb-2">Double Inspection Protocol</h3>
        <p class="font-body text-xs text-slate-muted leading-relaxed">
          Goods are sampled both at inland aggregation stations and right before container stuffing at deep-water container terminals.
        </p>
      </div>

      <div class="p-6 rounded-lg bg-white border border-border-subtle shadow-sm">
        <div class="w-12 h-12 rounded bg-light-surface-container text-light-primary flex items-center justify-center mb-4">
          <span class="material-symbols-outlined text-2xl">inventory</span>
        </div>
        <h3 class="font-headline text-lg font-bold text-charcoal mb-2">Ocean-Worthy Packing</h3>
        <p class="font-body text-xs text-slate-muted leading-relaxed">
          Industrial desiccants, Kraft paper lining, and breathable polypropylene or vacuum barriers prevent condensation and mold during transit.
        </p>
      </div>

      <div class="p-6 rounded-lg bg-white border border-border-subtle shadow-sm">
        <div class="w-12 h-12 rounded bg-gold-muted text-accent flex items-center justify-center mb-4">
          <span class="material-symbols-outlined text-2xl">description</span>
        </div>
        <h3 class="font-headline text-lg font-bold text-charcoal mb-2">Flawless Trade Documentation</h3>
        <p class="font-body text-xs text-slate-muted leading-relaxed">
          Direct courier dispatch of B/L, Commercial Invoice, Packing List, and Certificates of Analysis to buyer banks under L/C requirements.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- COMPANY FACTS TABLE / SPECIFICATIONS -->
<section class="py-20 bg-white">
  <div class="max-w-5xl mx-auto px-6">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <span class="font-label text-xs text-accent uppercase tracking-wider font-semibold">Corporate Overview</span>
      <h2 class="font-headline text-2xl sm:text-3xl font-bold text-charcoal mt-1">Export Entity Details &amp; Trade Structure</h2>
      <p class="font-body text-xs text-slate-muted mt-2">Verified entity baseline for international letters of credit and contractual execution.</p>
    </div>

    <div class="bg-white rounded-lg border border-border-subtle overflow-hidden shadow-sm">
      <table class="w-full text-left border-collapse">
        <tbody class="divide-y divide-border-subtle font-body text-xs">
          <tr class="hover:bg-light-surface-container-low">
            <th scope="row" class="py-4 px-6 font-label uppercase text-charcoal bg-light-surface-container-low w-1/3">Legal Entity Name</th>
            <td class="py-4 px-6 text-charcoal font-semibold">{{ $settings['company_name'] ?? 'Meral Exports & Imports Pvt Ltd' }}</td>
          </tr>
          <tr class="hover:bg-light-surface-container-low">
            <th scope="row" class="py-4 px-6 font-label uppercase text-charcoal bg-light-surface-container-low">Parent Organization</th>
            <td class="py-4 px-6 text-charcoal">Meral Group (Agricultural, Trade &amp; Industrial Operations)</td>
          </tr>
          <tr class="hover:bg-light-surface-container-low">
            <th scope="row" class="py-4 px-6 font-label uppercase text-charcoal bg-light-surface-container-low">Core Business Activity</th>
            <td class="py-4 px-6 text-charcoal">Wholesale Merchant Export &amp; Supply of Agricultural Food Commodities</td>
          </tr>
          <tr class="hover:bg-light-surface-container-low">
            <th scope="row" class="py-4 px-6 font-label uppercase text-charcoal bg-light-surface-container-low">Accepted Trade Incoterms</th>
            <td class="py-4 px-6 text-charcoal">FOB (Free on Board), CIF (Cost, Insurance &amp; Freight), CFR (Cost and Freight)</td>
          </tr>
          <tr class="hover:bg-light-surface-container-low">
            <th scope="row" class="py-4 px-6 font-label uppercase text-charcoal bg-light-surface-container-low">Payment Instruments</th>
            <td class="py-4 px-6 text-charcoal">Irrevocable Confirmed L/C at Sight, Telegraphic Transfer (T/T Advance + Balance against B/L copy)</td>
          </tr>
          <tr class="hover:bg-light-surface-container-low">
            <th scope="row" class="py-4 px-6 font-label uppercase text-charcoal bg-light-surface-container-low">Inspection Authorities</th>
            <td class="py-4 px-6 text-charcoal">SGS, Bureau Veritas, Intertek, or buyer-nominated inspection authority at port of loading</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="mt-8 text-center">
      <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-md bg-light-primary text-white font-label text-xs uppercase tracking-wide hover:bg-forest-deep transition font-semibold">
        <span>Connect with our Trade Desk</span>
        <span class="material-symbols-outlined text-sm">arrow_forward</span>
      </a>
    </div>
  </div>
</section>

@endsection
