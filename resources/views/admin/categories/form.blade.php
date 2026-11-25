@extends('admin.layout')
@section('title', ($action === 'create' ? 'New' : 'Edit') . ' Category')
@section('page-title', ($action === 'create' ? 'New' : 'Edit') . ' Category')

@section('content')
<div style="max-width:600px;">
<div class="card">
    <div class="card-header">
        <h2>{{ $action === 'create' ? '➕ New Category' : '✏️ Edit Category' }}</h2>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline btn-sm">← Back</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ $action === 'create' ? route('admin.categories.store') : route('admin.categories.update', $category) }}" enctype="multipart/form-data">
            @csrf
            @if($action === 'edit') @method('PUT') @endif
            <div class="form-grid">
                <div class="form-group">
                    <label>Category Name *</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" required placeholder="e.g. Rice Varieties">
                    @error('name')<span class="error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Emoji Icon *</label>
                    <input type="text" name="emoji" value="{{ old('emoji', $category->emoji) }}" required placeholder="🌾" maxlength="10">
                    <span class="hint">Fallback icon. If you upload an image below, image will show on the website card.</span>
                </div>
                <div class="form-group">
                    <label>Category Image / Icon</label>
                    @if($category->image)
                    <div style="margin-bottom:.75rem;">
                        <img src="{{ public_image_url($category->image) }}" alt="{{ $category->name }}" style="width:120px;height:90px;object-fit:cover;border-radius:10px;border:1px solid #D5CEC2;background:#F7F5F0;">
                    </div>
                    @endif
                    <input type="file" name="image" accept="image/*">
                    <span class="hint">Upload square/landscape image. JPG, PNG, WEBP or GIF up to 4MB.</span>
                    @error('image')<span class="error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Description *</label>
                    <textarea name="description" required>{{ old('description', $category->description) }}</textarea>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div class="form-group">
                        <label>Tag Label</label>
                        <input type="text" name="tag_label" value="{{ old('tag_label', $category->tag_label) }}" placeholder="10+ Varieties">
                    </div>
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order ?? 0) }}" min="0">
                    </div>
                </div>
                <label class="toggle-label">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>
                    Show this category on website
                </label>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 {{ $action === 'create' ? 'Create' : 'Update' }} Category</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
