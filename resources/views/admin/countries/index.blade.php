@extends('admin.layout')
@section('title', 'Export Countries')
@section('page-title', 'Countries We Export To')

@section('content')

{{-- Section heading settings --}}
<div class="card" style="margin-bottom:1.25rem;">
    <div class="card-header">
        <h2>🌍 Section Heading</h2>
        <span style="font-size:.78rem;color:#888;">Shown on the Services page</span>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.countries.section') }}">
            @csrf @method('PUT')
            <div class="form-grid">
                <div class="form-group">
                    <label>Section Label (small badge)</label>
                    <input type="text" name="countries_section_label" value="{{ $section['countries_section_label'] }}" required maxlength="80" placeholder="Global Reach">
                </div>
                <div class="form-group">
                    <label>Section Title *</label>
                    <input type="text" name="countries_section_title" value="{{ $section['countries_section_title'] }}" required maxlength="120" placeholder="Countries We Export To">
                </div>
                <div class="form-group">
                    <label>Section Subtitle *</label>
                    <textarea name="countries_section_subtitle" rows="2" required maxlength="500">{{ $section['countries_section_subtitle'] }}</textarea>
                </div>
                <div class="form-actions" style="border-top:none;padding-top:0;">
                    <button type="submit" class="btn btn-primary btn-sm">💾 Save Heading</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Countries list --}}
<div class="card">
    <div class="card-header">
        <h2>🗺️ Export Countries ({{ $countries->count() }})</h2>
        <a href="{{ route('admin.countries.create') }}" class="btn btn-primary btn-sm">+ Add Country</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Flag</th>
                    <th>Country Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($countries as $country)
                <tr>
                    <td>{{ $country->sort_order }}</td>
                    <td style="font-size:1.5rem;">{{ $country->flag_emoji }}</td>
                    <td><strong>{{ $country->name }}</strong></td>
                    <td>
                        @if($country->is_active)
                        <span style="color:#27ae60;font-size:.8rem;font-weight:600;">● Active</span>
                        @else
                        <span style="color:#aaa;font-size:.8rem;">○ Hidden</span>
                        @endif
                    </td>
                    <td style="display:flex;gap:.5rem;">
                        <a href="{{ route('admin.countries.edit', $country) }}" class="btn btn-outline btn-sm">✏️ Edit</a>
                        <form method="POST" action="{{ route('admin.countries.destroy', $country) }}" onsubmit="return confirm('Remove this country?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center;color:#aaa;padding:2rem;">No countries yet. <a href="{{ route('admin.countries.create') }}">Add one</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<p style="font-size:.8rem;color:#888;margin-top:1rem;">
    💡 Tip: Use flag emojis like 🇦🇪 🇬🇧 🇺🇸 — copy from <a href="https://emojipedia.org/flags" target="_blank">Emojipedia</a>
</p>
@endsection
