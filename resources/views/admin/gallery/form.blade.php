@extends('admin.layout')
@section('title', ($action === 'create' ? 'Upload' : 'Edit') . ' Gallery Image')
@section('page-title', ($action === 'create' ? 'Upload' : 'Edit') . ' Gallery Image')

@section('content')
<div style="max-width:560px;">
<div class="card">
    <div class="card-header">
        <h2>{{ $action === 'create' ? '📤 Upload Image' : '✏️ Edit Image' }}</h2>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline btn-sm">← Back</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ $action === 'create' ? route('admin.gallery.store') : route('admin.gallery.update', $image) }}" enctype="multipart/form-data">
            @csrf
            @if($action === 'edit') @method('PUT') @endif
            <div class="form-grid">
                <div class="form-group">
                    <label>Image {{ $action === 'create' ? '*' : '' }}</label>
                    <input type="file" name="image" accept="image/*" {{ $action === 'create' ? 'required' : '' }} style="border:none;padding:0;">
                    <span class="hint">JPG, PNG, WEBP or GIF. Max 4MB. Recommended: square or 4:3 ratio.</span>
                    @if($action === 'edit' && $image->image)
                    <div style="margin-top:.75rem;">
                        <img src="{{ public_image_url($image->image) }}" alt="" style="max-width:200px;border-radius:10px;border:1px solid #D5CEC2;">
                        <p style="font-size:.75rem;color:#888;margin-top:.35rem;">Current image — leave empty to keep</p>
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Title (optional)</label>
                    <input type="text" name="title" value="{{ old('title', $image->title) }}" maxlength="120" placeholder="e.g. Premium Basmati Rice">
                </div>
                <div class="form-group">
                    <label>Category (optional filter)</label>
                    <select name="category_id">
                        <option value="">— General / All categories —</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $image->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->emoji }} {{ $cat->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $image->sort_order ?? 0) }}" min="0">
                </div>
                <div style="display:flex;flex-direction:column;gap:.75rem;">
                    <label class="toggle-label">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $image->is_active ?? true) ? 'checked' : '' }}>
                        Show on gallery page
                    </label>
                    <label class="toggle-label">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $image->is_featured ?? false) ? 'checked' : '' }}>
                        Featured (large tile on gallery)
                    </label>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 {{ $action === 'create' ? 'Upload' : 'Update' }}</button>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
