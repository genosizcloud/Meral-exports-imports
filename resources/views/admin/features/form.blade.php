@extends('admin.layout')
@section('title', ($action === 'create' ? 'New' : 'Edit') . ' Feature')
@section('page-title', ($action === 'create' ? 'New' : 'Edit') . ' Feature')

@section('content')
<div style="max-width:560px;">
<div class="card">
    <div class="card-header">
        <h2>{{ $action === 'create' ? '➕ New Feature' : '✏️ Edit Feature' }}</h2>
        <a href="{{ route('admin.features.index') }}" class="btn btn-outline btn-sm">← Back</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ $action === 'create' ? route('admin.features.store') : route('admin.features.update', $feature) }}">
            @csrf
            @if($action === 'edit') @method('PUT') @endif
            <div class="form-grid">
                <div style="display:grid;grid-template-columns:auto 1fr;gap:1rem;align-items:start;">
                    <div class="form-group">
                        <label>Icon (emoji)</label>
                        <input type="text" name="icon" value="{{ old('icon', $feature->icon) }}" required placeholder="✅" maxlength="10" style="width:72px;text-align:center;font-size:1.5rem;">
                    </div>
                    <div class="form-group">
                        <label>Title *</label>
                        <input type="text" name="title" value="{{ old('title', $feature->title) }}" required placeholder="e.g. ISO Certified">
                    </div>
                </div>
                <div class="form-group">
                    <label>Description *</label>
                    <textarea name="description" required>{{ old('description', $feature->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $feature->sort_order ?? 0) }}" min="0">
                </div>
                <label class="toggle-label">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $feature->is_active ?? true) ? 'checked' : '' }}>
                    Show on website
                </label>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Save</button>
                    <a href="{{ route('admin.features.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
