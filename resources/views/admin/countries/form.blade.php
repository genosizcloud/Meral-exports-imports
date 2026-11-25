@extends('admin.layout')
@section('title', ($action === 'create' ? 'New' : 'Edit') . ' Country')
@section('page-title', ($action === 'create' ? 'New' : 'Edit') . ' Export Country')

@section('content')
<div style="max-width:520px;">
<div class="card">
    <div class="card-header">
        <h2>{{ $action === 'create' ? '➕ Add Country' : '✏️ Edit Country' }}</h2>
        <a href="{{ route('admin.countries.index') }}" class="btn btn-outline btn-sm">← Back</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ $action === 'create' ? route('admin.countries.store') : route('admin.countries.update', $country) }}">
            @csrf
            @if($action === 'edit') @method('PUT') @endif
            <div class="form-grid">
                <div class="form-group">
                    <label>Country Name *</label>
                    <input type="text" name="name" value="{{ old('name', $country->name) }}" required maxlength="80" placeholder="e.g. UAE">
                </div>
                <div class="form-group">
                    <label>Flag Emoji *</label>
                    <input type="text" name="flag_emoji" value="{{ old('flag_emoji', $country->flag_emoji ?? '🌍') }}" required maxlength="20" placeholder="🇦🇪" style="font-size:1.5rem;">
                    <span class="hint">Paste a flag emoji — e.g. 🇮🇳 🇦🇪 🇬🇧 🇺🇸</span>
                </div>
                <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $country->sort_order ?? 0) }}" min="0">
                    <span class="hint">Lower numbers appear first</span>
                </div>
                <div class="form-group">
                    <label style="display:flex;align-items:center;gap:.5rem;cursor:pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $country->is_active ?? true) ? 'checked' : '' }}>
                        Show on website
                    </label>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Save</button>
                    <a href="{{ route('admin.countries.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
