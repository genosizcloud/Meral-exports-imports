@extends('admin.layout')
@section('title','Site Settings')
@section('page-title','Site Settings')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf @method('PUT')

    {{-- General --}}
    <div class="card" style="margin-bottom:1.25rem;">
        <div class="card-header"><h2>🏢 General</h2></div>
        <div class="card-body">
            <div class="form-grid form-grid-2">
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" name="company_name" value="{{ $settings['general']['company_name'] ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Tagline</label>
                    <input type="text" name="tagline" value="{{ $settings['general']['tagline'] ?? '' }}">
                </div>
                <div class="form-group" style="grid-column:1/-1;">
                    <label>Footer Description</label>
                    <textarea name="footer_tagline">{{ $settings['general']['footer_tagline'] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>

    {{-- Contact --}}
    <div class="card" style="margin-bottom:1.25rem;">
        <div class="card-header"><h2>📞 Contact Details</h2></div>
        <div class="card-body">
            <div class="form-grid form-grid-2">
                <div class="form-group">
                    <label>Phone 1</label>
                    <input type="text" name="phone1" value="{{ $settings['contact']['phone1'] ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Phone 2</label>
                    <input type="text" name="phone2" value="{{ $settings['contact']['phone2'] ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Email 1</label>
                    <input type="email" name="email1" value="{{ $settings['contact']['email1'] ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Email 2</label>
                    <input type="email" name="email2" value="{{ $settings['contact']['email2'] ?? '' }}">
                </div>
                <div class="form-group" style="grid-column:1/-1;">
                    <label>Office Address</label>
                    <textarea name="address" style="min-height:70px;">{{ $settings['contact']['address'] ?? '' }}</textarea>
                </div>
                <div class="form-group" style="grid-column:1/-1;">
                    <label>Working Hours</label>
                    <input type="text" name="working_hours" value="{{ $settings['contact']['working_hours'] ?? '' }}">
                </div>
            </div>
        </div>
    </div>

    {{-- Social --}}
    <div class="card" style="margin-bottom:1.25rem;">
        <div class="card-header"><h2>📱 Social Links</h2></div>
        <div class="card-body">
            <div class="form-grid form-grid-2">
                <div class="form-group">
                    <label>WhatsApp URL</label>
                    <input type="text" name="whatsapp_url" value="{{ $settings['social']['whatsapp_url'] ?? '' }}" placeholder="https://wa.me/91...">
                </div>
                <div class="form-group">
                    <label>Facebook URL</label>
                    <input type="text" name="facebook_url" value="{{ $settings['social']['facebook_url'] ?? '' }}" placeholder="https://facebook.com/...">
                </div>
                <div class="form-group">
                    <label>Instagram URL</label>
                    <input type="text" name="instagram_url" value="{{ $settings['social']['instagram_url'] ?? '' }}" placeholder="https://instagram.com/...">
                </div>
            </div>
        </div>
    </div>

    {{-- Sections --}}
    <div class="card" style="margin-bottom:1.25rem;">
        <div class="card-header"><h2>📝 Section Texts</h2></div>
        <div class="card-body">
            <div class="form-grid">
                @foreach([
                    ['categories_section_title','Categories Section Title'],
                    ['categories_section_subtitle','Categories Section Subtitle'],
                    ['products_section_title','Products Section Title'],
                    ['products_section_subtitle','Products Section Subtitle'],
                    ['whyus_section_title','Why Us Section Title'],
                    ['whyus_section_subtitle','Why Us Section Subtitle'],
                    ['contact_section_title','Contact Section Title'],
                    ['contact_section_subtitle','Contact Section Subtitle'],
                ] as [$key, $label])
                <div class="form-group">
                    <label>{{ $label }}</label>
                    @if(str_contains($key, 'subtitle'))
                        <textarea name="{{ $key }}">{{ $settings['sections'][$key] ?? '' }}</textarea>
                    @else
                        <input type="text" name="{{ $key }}" value="{{ $settings['sections'][$key] ?? '' }}">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="form-actions" style="border-top:none;padding-top:0;">
        <button type="submit" class="btn btn-primary">💾 Save All Settings</button>
    </div>
</form>
@endsection
