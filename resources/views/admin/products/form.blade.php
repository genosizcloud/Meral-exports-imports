@extends('admin.layout')
@section('title', ($action === 'create' ? 'New' : 'Edit') . ' Product')
@section('page-title', ($action === 'create' ? 'New' : 'Edit') . ' Product')

@section('content')
<div style="max-width:720px;">
<div class="card">
    <div class="card-header">
        <h2>{{ $action === 'create' ? '➕ New Product' : '✏️ Edit Product' }}</h2>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline btn-sm">← Back</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ $action === 'create' ? route('admin.products.store') : route('admin.products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @if($action === 'edit') @method('PUT') @endif
            <div class="form-grid">
                <div class="form-group">
                    <label>Category *</label>
                    <select name="category_id" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->emoji }} {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="display:grid;grid-template-columns:1fr auto;gap:1rem;align-items:start;">
                    <div class="form-group">
                        <label>Product Name *</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" required placeholder="e.g. Basmati Rice (Extra Long)">
                    </div>
                    <div class="form-group">
                        <label>Emoji Icon</label>
                        <input type="text" name="emoji" value="{{ old('emoji', $product->emoji) }}" placeholder="🌾" maxlength="10" style="width:80px;text-align:center;font-size:1.4rem;">
                        <span class="hint">Fallback if no photo uploaded</span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Product Photo</label>
                    <input type="file" name="image" id="productImageInput" accept="image/*" style="border:none;padding:0;">
                    <span class="hint">JPG, PNG, WEBP or GIF. Max 4MB. Shows on products & gallery if no emoji needed.</span>
                    <div id="productImagePreview" style="margin-top:.75rem;display:{{ $action === 'edit' && $product->image ? 'flex' : 'none' }};align-items:center;gap:1rem;">
                        <img src="{{ $action === 'edit' && $product->image ? public_image_url($product->image) : '' }}" alt="Product image preview" style="width:100px;height:100px;object-fit:cover;border-radius:6px;border:1px solid #D5CEC2;">
                        <span style="font-size:.75rem;color:#888;">Current photo — upload new file to replace</span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Description *</label>
                    <textarea name="description" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div class="form-group">
                        <label>Badge Text *</label>
                        <input type="text" name="badge_text" value="{{ old('badge_text', $product->badge_text) }}" required placeholder="e.g. Export Grade">
                    </div>
                    <div class="form-group">
                        <label>Badge Colour *</label>
                        <select name="badge_type" required>
                            @foreach(['green','blue','orange'] as $bt)
                            <option value="{{ $bt }}" {{ old('badge_type', $product->badge_type ?? 'green') === $bt ? 'selected' : '' }}>{{ ucfirst($bt) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <p style="font-size:.83rem;font-weight:600;color:#444;margin-bottom:.5rem;">Card Background Gradient</p>
                    <div style="display:flex;gap:1.5rem;align-items:center;">
                        <div class="form-group" style="flex:1;">
                            <label>From Colour</label>
                            <div class="color-row">
                                <input type="color" name="bg_from" value="{{ old('bg_from', $product->bg_from ?? '#fff8e1') }}">
                                <input type="text" name="bg_from_text" value="{{ old('bg_from', $product->bg_from ?? '#fff8e1') }}" style="width:110px;" oninput="document.querySelector('[name=bg_from]').value=this.value">
                            </div>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label>To Colour</label>
                            <div class="color-row">
                                <input type="color" name="bg_to" value="{{ old('bg_to', $product->bg_to ?? '#ffecb3') }}">
                                <input type="text" name="bg_to_text" value="{{ old('bg_to', $product->bg_to ?? '#ffecb3') }}" style="width:110px;" oninput="document.querySelector('[name=bg_to]').value=this.value">
                            </div>
                        </div>
                        <div id="gradPreview" style="width:80px;height:50px;border-radius:8px;border:1px solid #D5CEC2;background:linear-gradient(135deg,{{ old('bg_from', $product->bg_from ?? '#fff8e1') }},{{ old('bg_to', $product->bg_to ?? '#ffecb3') }});"></div>
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $product->sort_order ?? 0) }}" min="0">
                    </div>
                </div>

                <div style="display:flex;gap:1.5rem;">
                    <label class="toggle-label">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                        Show on website
                    </label>
                    <label class="toggle-label">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}>
                        Mark as Featured
                    </label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <span class="material-symbols-outlined" style="font-size:1.1rem;">save</span>
                        {{ $action === 'create' ? 'Create Product' : 'Update Product' }}
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<script>
// Sync colour pickers with text inputs and update preview
document.querySelectorAll('[name=bg_from],[name=bg_to]').forEach(el => {
    el.addEventListener('input', updatePreview);
});
document.getElementById('productImageInput')?.addEventListener('change', function() {
    const file = this.files?.[0];
    if (!file || !file.type.startsWith('image/')) return;
    const preview = document.getElementById('productImagePreview');
    preview.querySelector('img').src = URL.createObjectURL(file);
    preview.querySelector('span').textContent = 'Selected image preview';
    preview.style.display = 'flex';
});
function updatePreview() {
    const from = document.querySelector('[name=bg_from]').value;
    const to   = document.querySelector('[name=bg_to]').value;
    document.getElementById('gradPreview').style.background = `linear-gradient(135deg,${from},${to})`;
    document.querySelector('[name=bg_from_text]').value = from;
    document.querySelector('[name=bg_to_text]').value = to;
}
// Override hidden color inputs so form sends bg_from / bg_to correctly
document.querySelector('form').addEventListener('submit', function() {
    document.querySelector('[name=bg_from]').value = document.querySelector('[name=bg_from]').value;
    document.querySelector('[name=bg_to]').value   = document.querySelector('[name=bg_to]').value;
});
</script>
@endsection
