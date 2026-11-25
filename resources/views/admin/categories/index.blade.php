@extends('admin.layout')
@section('title','Categories')
@section('page-title','Categories')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>📁 Product Categories</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">+ New Category</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Icon / Image</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Tag</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $cat)
                <tr>
                    <td>{{ $cat->sort_order }}</td>
                    <td>
                        @if($cat->image)
                        <img src="{{ public_image_url($cat->image) }}" alt="{{ $cat->name }}" style="width:52px;height:42px;object-fit:cover;border-radius:8px;border:1px solid #D5CEC2;background:#F7F5F0;">
                        @else
                        <span style="font-size:1.4rem;">{{ $cat->emoji }}</span>
                        @endif
                    </td>
                    <td><strong>{{ $cat->name }}</strong></td>
                    <td><code style="background:#F7F5F0;padding:.2rem .4rem;border-radius:4px;font-size:.78rem;">{{ $cat->slug }}</code></td>
                    <td>{{ $cat->tag_label }}</td>
                    <td>
                        <span class="badge {{ $cat->is_active ? 'badge-green' : 'badge-gray' }}">
                            {{ $cat->is_active ? 'Active' : 'Hidden' }}
                        </span>
                    </td>
                    <td style="display:flex;gap:.5rem;">
                        <a href="{{ route('admin.categories.edit', $cat) }}" class="btn btn-outline btn-sm">✏️ Edit</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $cat) }}" onsubmit="return confirm('Delete this category and all its products?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center;color:#aaa;padding:2rem;">No categories yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
