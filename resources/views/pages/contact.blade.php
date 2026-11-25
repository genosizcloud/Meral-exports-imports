@extends('layouts.app')

@section('content')

<main class="flex-1 py-14 bg-light-surface">
  <div class="max-w-7xl mx-auto px-6">
    
    <div class="text-center max-w-3xl mx-auto mb-16">
      <span class="font-label text-xs text-accent uppercase tracking-wider font-semibold">Wholesale Inquiries &amp; Formal RFQ</span>
      <h1 class="font-headline text-3xl sm:text-4xl lg:text-[44px] text-charcoal font-bold mt-1">Contact our Global Trade Desk</h1>
      <p class="font-body text-sm sm:text-base text-slate-muted mt-3 leading-relaxed">
        Our procurement specialists assist institutional importers, commodity distributors, and food brands with container allocation, sample dispatches, and contractual pricing.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      
      <!-- Left: Contact Details & Office Facts -->
      <div class="lg:col-span-5 space-y-8">
        
        <div class="bg-forest-deep text-white rounded-xl p-8 shadow-md space-y-6">
          <h3 class="font-headline text-2xl font-bold text-white">Direct Trade Desk Channels</h3>
          <p class="font-body text-xs sm:text-sm text-slate-200">
            For active contracts, urgent shipping schedules, or tender documentation:
          </p>

          <div class="space-y-4 pt-2 text-xs sm:text-sm">
            <div class="flex items-start gap-4">
              <span class="material-symbols-outlined text-gold-light mt-0.5">mail</span>
              <div>
                <div class="font-label text-xs text-slate-300 uppercase">General Procurement Inquiries</div>
                <div class="text-white font-semibold">{{ $settings['email1'] ?? 'trade@meralgroup.com' }}</div>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <span class="material-symbols-outlined text-gold-light mt-0.5">local_shipping</span>
              <div>
                <div class="font-label text-xs text-slate-300 uppercase">Logistics &amp; Shipping Documentation</div>
                <div class="text-white font-semibold">{{ $settings['email2'] ?? 'logistics@meralgroup.com' }}</div>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <span class="material-symbols-outlined text-gold-light mt-0.5">schedule</span>
              <div>
                <div class="font-label text-xs text-slate-300 uppercase">Desk Operating Hours</div>
                <div class="text-white font-semibold">{{ $settings['working_hours'] ?? 'Monday – Saturday: 08:00 – 18:00 UTC' }}</div>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <span class="material-symbols-outlined text-gold-light mt-0.5">location_on</span>
              <div>
                <div class="font-label text-xs text-slate-300 uppercase">Registered Headquarters</div>
                <div class="text-slate-200">
                  {{ $settings['company_name'] ?? 'Meral Exports & Imports Pvt Ltd' }}<br>
                  <span class="text-slate-400 text-xs">{{ $settings['address'] ?? 'Kochi, Kerala, India' }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-4 border-t border-slate-700/60 flex items-center justify-between text-xs text-slate-300 font-label">
            <span>Parent Entity: Meral Group</span>
            <span class="text-gold-light">IEC &amp; APEDA Registered</span>
          </div>
        </div>

        <!-- Trade Assurance Box -->
        <div class="bg-white rounded-xl border border-border-subtle p-6 space-y-3 shadow-sm">
          <h4 class="font-headline text-lg font-bold text-charcoal">Pre-Shipment Sample Policy</h4>
          <p class="font-body text-xs text-slate-muted leading-relaxed">
            Verified corporate buyers may request sealed 500g physical working samples dispatched via DHL/FedEx prior to contract signing. Testing certificates accompany all samples.
          </p>
        </div>

      </div>

      <!-- Right: Approachable Quotation Request Form -->
      <div class="lg:col-span-7">
        <div class="bg-white rounded-xl border border-border-subtle p-8 shadow-sm">
          
          <div class="border-b border-border-subtle pb-4 mb-6">
            <h2 class="font-headline text-2xl font-bold text-charcoal">Submit Request for Quotation (RFQ)</h2>
            <p class="font-body text-xs text-slate-muted mt-1">
              Fields marked with an asterisk (*) are required to calculate container freight and issue proforma invoices.
            </p>
          </div>

          <form action="{{ route('enquiry.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              
              <div>
                <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1.5">Your Full Name *</label>
                <input type="text" name="name" required class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
              </div>

              <div>
                <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1.5">Company / Registered Importer *</label>
                <input type="text" name="company" required class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
              </div>

              <div>
                <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1.5">Official Corporate Email *</label>
                <input type="email" name="email" required class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
              </div>

              <div>
                <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1.5">Phone / WhatsApp with Country Code *</label>
                <input type="tel" name="phone" required class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
              </div>

              <div>
                <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1.5">Primary Commodity of Interest *</label>
                <select name="product" class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
                  <option value="Malabar Black Pepper (550GL / 570GL)">Malabar Black Pepper (550GL / 570GL)</option>
                  <option value="1121 Extra Long Grain Basmati Rice">1121 Extra Long Grain Basmati Rice</option>
                  <option value="Alleppey Green Cardamom (8mm+)">Alleppey Green Cardamom (8mm+)</option>
                  <option value="Turmeric Fingers (Curcumin 3.5%+)">Turmeric Fingers (Curcumin 3.5%+)</option>
                  <option value="Kabuli Chickpeas (Jumbo Calibers)">Kabuli Chickpeas (Jumbo Calibers)</option>
                  <option value="Split Red Lentils (Masoor)">Split Red Lentils (Masoor)</option>
                  <option value="Pure Cold-Pressed Sesame Oil">Pure Cold-Pressed Sesame Oil</option>
                  <option value="Hulled White Sesame Seeds">Hulled White Sesame Seeds</option>
                  <option value="Other Custom Commodity">Other Custom Commodity Requirement</option>
                </select>
              </div>

              <div>
                <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1.5">Required Volume / Quantity *</label>
                <input type="text" name="quantity" required class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
              </div>

              <div>
                <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1.5">Destination Port &amp; Country *</label>
                <input type="text" name="country" required class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
              </div>

              <div>
                <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1.5">Quotation Incoterms</label>
                <select name="incoterm" class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
                  <option value="CIF">CIF (Cost, Insurance &amp; Freight to Port)</option>
                  <option value="FOB">FOB (Free on Board Loading Port)</option>
                  <option value="CFR">CFR (Cost &amp; Freight)</option>
                </select>
              </div>

            </div>

            <div>
              <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1.5">Specific Quality Standards, Packaging or Target Shipment Month</label>
              <textarea name="message" rows="4" class="w-full px-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none"></textarea>
            </div>

            <div class="pt-2">
              <button type="submit" class="w-full py-3.5 rounded-md bg-light-primary text-white font-label text-xs uppercase tracking-wide hover:bg-forest-deep transition shadow-md font-semibold">
                Send Formal Wholesale Request
              </button>
              <p class="text-xs text-center text-slate-muted mt-2">
                Trade quotations will be transmitted to the verified corporate email address within 24 business hours.
              </p>
            </div>
          </form>

        </div>
      </div>

    </div>

  </div>
</main>

@endsection
