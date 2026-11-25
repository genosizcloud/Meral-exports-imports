@extends('admin.layout')
@section('title', ($action === 'create' ? 'New' : 'Edit') . ' Blog Post')
@section('page-title', ($action === 'create' ? 'New' : 'Edit') . ' Blog Post')

@section('content')
<div style="max-width:820px;">
<div class="card">
    <div class="card-header">
        <h2>{{ $action === 'create' ? '➕ New Blog Post' : '✏️ Edit Blog Post' }}</h2>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-outline btn-sm">← Back</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ $action === 'create' ? route('admin.blog.store') : route('admin.blog.update', $post) }}" enctype="multipart/form-data">
            @csrf
            @if($action === 'edit') @method('PUT') @endif
            <div class="form-grid">
                <div class="form-group">
                    <label>Title *</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}" required maxlength="200" placeholder="e.g. Top 5 Rice Varieties for Export">
                </div>
                <div class="form-group">
                    <label>URL Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" maxlength="200" placeholder="auto-generated-from-title" pattern="[a-z0-9\-]*">
                    <span class="hint">Lowercase letters, numbers and hyphens only. Leave blank to auto-generate.</span>
                </div>
                <div class="form-group">
                    <label>Short Excerpt *</label>
                    <textarea name="excerpt" required maxlength="500" rows="2" placeholder="Brief summary for blog listing (max 500 chars)">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Featured Image</label>
                    <input type="file" name="image" accept="image/*" style="border:none;padding:0;">
                    <span class="hint">JPG, PNG, WEBP or GIF. Max 4MB. Saved to public/uploads/blog/</span>
                    @if($action === 'edit' && $post->image)
                    <div style="margin-top:.75rem;">
                        <img src="{{ public_image_url($post->image) }}" alt="" style="max-width:240px;border-radius:10px;border:1px solid #D5CEC2;">
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Full Content *</label>
                    <textarea name="content" required rows="14" placeholder="Write your article here. Basic HTML allowed (p, br, strong, ul, li, a).">{{ old('content', $post->content) }}</textarea>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" value="{{ old('author', $post->author) }}" maxlength="100" placeholder="Meral Exports Team">
                    </div>
                    <div class="form-group">
                        <label>Publish Date</label>
                        <input type="datetime-local" name="published_at" value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}">
                        <span class="hint">Leave empty to use current date when publishing</span>
                    </div>
                </div>
                <label class="toggle-label">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }}>
                    Publish on website
                </label>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 {{ $action === 'create' ? 'Publish Post' : 'Update Post' }}</button>
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
