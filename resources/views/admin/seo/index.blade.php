@extends('admin.layout')
@section('title','SEO Settings')
@section('page-title','SEO Settings')

@section('content')
<form method="POST" action="{{ route('admin.seo.update') }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    {{-- ── Basic Meta ──────────────────────────────────────── --}}
    <div class="card" style="margin-bottom:1.25rem;">
        <div class="card-header">
            <h2>🔍 Basic Meta Tags</h2>
            <span style="font-size:.78rem;color:#888;">Shown in Google search results</span>
        </div>
        <div class="card-body">
            <div class="form-grid">

                <div class="form-group">
                    <label>Site Title <span style="color:#c00;">*</span></label>
                    <input type="text" name="seo_site_title" value="{{ $seo['seo_site_title'] ?? '' }}" required maxlength="120"
                        oninput="updatePreview()" id="inpTitle">
                    <span class="hint">Ideal length: 50–60 characters.
                        <span id="titleLen" style="font-weight:600;color:#555;">{{ strlen($seo['seo_site_title'] ?? '') }}/120</span>
                    </span>
                </div>

                <div class="form-group">
                    <label>Title Separator</label>
                    <input type="text" name="seo_title_separator" value="{{ $seo['seo_title_separator'] ?? ' | ' }}" maxlength="10" style="width:80px;">
                    <span class="hint">Used between page name and site name. e.g. <code> | </code> or <code> – </code></span>
                </div>

                <div class="form-group">
                    <label>Meta Description <span style="color:#c00;">*</span></label>
                    <textarea name="seo_description" required maxlength="320" rows="3"
                        oninput="updatePreview()" id="inpDesc">{{ $seo['seo_description'] ?? '' }}</textarea>
                    <span class="hint">Ideal length: 150–160 characters.
                        <span id="descLen" style="font-weight:600;color:#555;">{{ strlen($seo['seo_description'] ?? '') }}/320</span>
                    </span>
                </div>

                <div class="form-group">
                    <label>Meta Keywords</label>
                    <textarea name="seo_keywords" rows="2" maxlength="500">{{ $seo['seo_keywords'] ?? '' }}</textarea>
                    <span class="hint">Comma-separated. Not heavily used by Google but good for Bing/others.</span>
                </div>

                <div class="form-group">
                    <label>Canonical URL</label>
                    <input type="text" name="seo_canonical_url" value="{{ $seo['seo_canonical_url'] ?? '' }}" placeholder="https://meralexports.com">
                    <span class="hint">The primary/preferred URL of your site. Prevents duplicate content issues.</span>
                </div>

                <div class="form-group">
                    <label>Robots Directive</label>
                    <select name="seo_robots">
                        @foreach(['index, follow','noindex, follow','index, nofollow','noindex, nofollow'] as $r)
                        <option {{ ($seo['seo_robots'] ?? 'index, follow') === $r ? 'selected' : '' }}>{{ $r }}</option>
                        @endforeach
                    </select>
                    <span class="hint">Use "index, follow" for a live website.</span>
                </div>

                {{-- Live SERP Preview --}}
                <div>
                    <p style="font-size:.83rem;font-weight:600;color:#444;margin-bottom:.6rem;">Google SERP Preview</p>
                    <div style="background:#fff;border:1px solid #D5CEC2;border-radius:10px;padding:1rem 1.25rem;font-family:'Oswald',sans-serif;max-width:600px;">
                        <div id="prevUrl" style="font-size:.78rem;color:#0f9d58;margin-bottom:.2rem;">{{ $seo['seo_canonical_url'] ?? 'https://meralexports.com' }}</div>
                        <div id="prevTitle" style="font-size:1.1rem;color:#0E382B;font-weight:500;line-height:1.3;margin-bottom:.3rem;">{{ Str::limit($seo['seo_site_title'] ?? '', 60) }}</div>
                        <div id="prevDesc" style="font-size:.85rem;color:#545454;line-height:1.5;">{{ Str::limit($seo['seo_description'] ?? '', 160) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Open Graph ──────────────────────────────────────── --}}
    <div class="card" style="margin-bottom:1.25rem;">
        <div class="card-header">
            <h2>📘 Open Graph (Social Sharing)</h2>
            <span style="font-size:.78rem;color:#888;">Controls how your site looks when shared on Facebook, WhatsApp, LinkedIn</span>
        </div>
        <div class="card-body">
            <div class="form-grid form-grid-2">
                <div class="form-group">
                    <label>OG Type</label>
                    <select name="seo_og_type">
                        @foreach(['website','article','product'] as $t)
                        <option {{ ($seo['seo_og_type'] ?? 'website') === $t ? 'selected' : '' }}>{{ $t }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>OG Image (Social Preview Image)</label>
                    <input type="file" name="seo_og_image" accept="image/*" style="border:none;padding:0;">
                    <span class="hint">Recommended: 1200×630 px, JPG/PNG. Max 2MB.</span>
                    @if(!empty($seo['seo_og_image']))
                    <div style="margin-top:.5rem;">
                        <img src="{{ public_image_url($seo['seo_og_image']) }}" alt="OG Image" style="max-width:240px;border-radius:8px;border:1px solid #D5CEC2;">
                        <p style="font-size:.75rem;color:#888;margin-top:.25rem;">Current OG image</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ── Twitter Cards ───────────────────────────────────── --}}
    <div class="card" style="margin-bottom:1.25rem;">
        <div class="card-header">
            <h2>🐦 Twitter / X Cards</h2>
            <span style="font-size:.78rem;color:#888;">Controls how your site looks when shared on Twitter/X</span>
        </div>
        <div class="card-body">
            <div class="form-grid form-grid-2">
                <div class="form-group">
                    <label>Twitter Card Type</label>
                    <select name="seo_twitter_card">
                        @foreach(['summary_large_image','summary','app','player'] as $c)
                        <option {{ ($seo['seo_twitter_card'] ?? 'summary_large_image') === $c ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                    <span class="hint">Use "summary_large_image" for best visual impact.</span>
                </div>
                <div class="form-group">
                    <label>Twitter @username</label>
                    <input type="text" name="seo_twitter_site" value="{{ $seo['seo_twitter_site'] ?? '' }}" placeholder="@meralexports">
                </div>
            </div>
        </div>
    </div>

    {{-- ── Analytics & Verification ────────────────────────── --}}
    <div class="card" style="margin-bottom:1.25rem;">
        <div class="card-header">
            <h2>📊 Analytics & Search Console Verification</h2>
        </div>
        <div class="card-body">
            <div class="form-grid form-grid-2">
                <div class="form-group">
                    <label>Google Analytics 4 Measurement ID</label>
                    <input type="text" name="seo_google_analytics" value="{{ $seo['seo_google_analytics'] ?? '' }}" placeholder="G-XXXXXXXXXX">
                    <span class="hint">Get this from your GA4 property settings.</span>
                </div>
                <div class="form-group">
                    <label>Google Tag Manager ID</label>
                    <input type="text" name="seo_gtm_id" value="{{ $seo['seo_gtm_id'] ?? '' }}" placeholder="GTM-XXXXXXX">
                </div>
                <div class="form-group">
                    <label>Google Search Console Verification</label>
                    <input type="text" name="seo_google_verify" value="{{ $seo['seo_google_verify'] ?? '' }}" placeholder="google1234567890abcdef.html or meta content value">
                    <span class="hint">The content value from the Google verification meta tag.</span>
                </div>
                <div class="form-group">
                    <label>Bing Webmaster Verification</label>
                    <input type="text" name="seo_bing_verify" value="{{ $seo['seo_bing_verify'] ?? '' }}" placeholder="Bing meta content value">
                </div>
            </div>
        </div>
    </div>

    {{-- ── Schema.org / JSON-LD ────────────────────────────── --}}
    <div class="card" style="margin-bottom:1.25rem;">
        <div class="card-header">
            <h2>🏢 Structured Data (Schema.org / JSON-LD)</h2>
            <span style="font-size:.78rem;color:#888;">Helps Google understand your business and may show rich results</span>
        </div>
        <div class="card-body">
            <div class="form-grid form-grid-2">
                <div class="form-group">
                    <label>Founded Year</label>
                    <input type="text" name="seo_schema_founded" value="{{ $seo['seo_schema_founded'] ?? '2010' }}" placeholder="2010" maxlength="4">
                </div>
                <div class="form-group">
                    <label>Country Code (ISO 2-letter)</label>
                    <input type="text" name="seo_schema_country" value="{{ $seo['seo_schema_country'] ?? 'IN' }}" placeholder="IN" maxlength="2">
                </div>
                <div class="form-group">
                    <label>City / Locality</label>
                    <input type="text" name="seo_schema_locality" value="{{ $seo['seo_schema_locality'] ?? 'Cochin' }}" placeholder="Cochin">
                </div>
                <div class="form-group">
                    <label>Postal Code</label>
                    <input type="text" name="seo_schema_postal" value="{{ $seo['seo_schema_postal'] ?? '682001' }}" placeholder="682001">
                </div>
            </div>

            {{-- JSON-LD preview --}}
            <div style="margin-top:1.25rem;">
                <p style="font-size:.83rem;font-weight:600;color:#444;margin-bottom:.6rem;">Generated JSON-LD Preview</p>
                @php
                    $jsonLdPreview = [
                        '@context' => 'https://schema.org',
                        '@type' => 'Organization',
                        'name' => $seo['seo_site_title'] ?? 'Meral Exports',
                        'url' => $seo['seo_canonical_url'] ?? 'https://meralexports.com',
                        'logo' => url('primary-logo.png'),
                        'foundingDate' => $seo['seo_schema_founded'] ?? '2010',
                        'address' => [
                            '@type' => 'PostalAddress',
                            'addressLocality' => $seo['seo_schema_locality'] ?? 'Cochin',
                            'postalCode' => $seo['seo_schema_postal'] ?? '682001',
                            'addressCountry' => $seo['seo_schema_country'] ?? 'IN',
                        ],
                        'contactPoint' => [
                            '@type' => 'ContactPoint',
                            'telephone' => \App\Models\SiteSetting::get('phone1', '+91 98765 43210'),
                            'contactType' => 'sales',
                            'availableLanguage' => ['English', 'Malayalam'],
                        ],
                    ];
                @endphp
                <pre style="background:#1e2535;color:#a8d8a8;padding:1rem;border-radius:8px;font-size:.75rem;overflow-x:auto;line-height:1.6;">{!! json_encode($jsonLdPreview, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</pre>
            </div>
        </div>
    </div>

    {{-- ── Sitemap & Robots ────────────────────────────────── --}}
    <div class="card" style="margin-bottom:1.25rem;">
        <div class="card-header">
            <h2>🗺️ Sitemap & Robots.txt</h2>
        </div>
        <div class="card-body">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div class="card" style="padding:1.25rem;border:1px solid #E3DDD2;">
                    <h4 style="font-size:.9rem;color:#0E382B;margin-bottom:.5rem;">XML Sitemap</h4>
                    <p style="font-size:.82rem;color:#666;margin-bottom:.75rem;">Auto-generated sitemap with all products and categories for Google indexing.</p>
                    <a href="{{ url('/sitemap.xml') }}" target="_blank" class="btn btn-outline btn-sm">🔗 View sitemap.xml</a>
                </div>
                <div class="card" style="padding:1.25rem;border:1px solid #E3DDD2;">
                    <h4 style="font-size:.9rem;color:#0E382B;margin-bottom:.5rem;">Robots.txt</h4>
                    <p style="font-size:.82rem;color:#666;margin-bottom:.75rem;">Controls which pages search engines can crawl. Sitemap URL is auto-included.</p>
                    <a href="{{ url('/robots.txt') }}" target="_blank" class="btn btn-outline btn-sm">🔗 View robots.txt</a>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions" style="border-top:none;padding-top:0;">
        <button type="submit" class="btn btn-primary">💾 Save All SEO Settings</button>
    </div>
</form>

<script>
const titleEl = document.getElementById('inpTitle');
const descEl  = document.getElementById('inpDesc');

function updatePreview() {
    const t = titleEl.value;
    const d = descEl.value;
    document.getElementById('prevTitle').textContent = t.slice(0, 60);
    document.getElementById('prevDesc').textContent  = d.slice(0, 160);
    document.getElementById('titleLen').textContent  = t.length + '/120';
    document.getElementById('descLen').textContent   = d.length + '/320';

    // Colour warning
    document.getElementById('titleLen').style.color = t.length > 60 ? '#c00' : (t.length > 50 ? '#e67e22' : '#27ae60');
    document.getElementById('descLen').style.color  = d.length > 160 ? '#c00' : (d.length > 150 ? '#e67e22' : '#27ae60');
}
updatePreview();
</script>
@endsection
