@extends('admin.layout')
@section('title', 'Gallery')
@section('page-title', 'Gallery Images')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>🖼️ Gallery ({{ $images->count() }})</h2>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm">+ Upload Image</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Preview</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($images as $img)
                <tr>
                    <td>
                        <img src="{{ public_image_url($img->image) }}" alt="" style="width:72px;height:72px;object-fit:cover;border-radius:8px;border:1px solid #D5CEC2;">
                    </td>
                    <td>
                        <strong>{{ $img->title ?: '—' }}</strong>
                        @if($img->is_featured)
                        <span style="font-size:.7rem;color:#9C7428;font-weight:600;"> ★ Featured</span>
                        @endif
                    </td>
                    <td>{{ $img->category?->name ?? 'All / General' }}</td>
                    <td>{{ $img->sort_order }}</td>
                    <td>
                        @if($img->is_active)
                        <span style="color:#27ae60;font-size:.8rem;font-weight:600;">● Live</span>
                        @else
                        <span style="color:#aaa;font-size:.8rem;">○ Hidden</span>
                        @endif
                    </td>
                    <td style="display:flex;gap:.5rem;">
                        <a href="{{ route('admin.gallery.edit', $img) }}" class="btn btn-outline btn-sm">✏️ Edit</a>
                        <form method="POST" action="{{ route('admin.gallery.destroy', $img) }}" onsubmit="return confirm('Delete this image?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;color:#aaa;padding:2rem;">
                        No gallery images yet. <a href="{{ route('admin.gallery.create') }}">Upload your first image</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<p style="font-size:.8rem;color:#888;margin-top:1rem;">Images appear on the public <a href="{{ url('/gallery') }}" target="_blank">Gallery page</a>. Max 4MB per image.</p>
@endsection
