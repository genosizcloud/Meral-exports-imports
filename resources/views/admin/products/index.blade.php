@extends('admin.layout')
@section('title','Products')
@section('page-title','Products')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>📦 All Products</h2>
        <div style="display:flex;gap:.5rem;align-items:center;">
            <select id="catFilter" onchange="filterTable()" style="border:1.5px solid #D5CEC2;border-radius:8px;padding:.4rem .75rem;font-size:.83rem;outline:none;">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->emoji }} {{ $cat->name }}</option>
                @endforeach
            </select>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">+ New Product</a>
        </div>
    </div>
    <div class="table-wrap">
        <table id="productsTable">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Badge</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr data-cat="{{ $product->category_id }}">
                    <td>
                        @if($product->image)
                        <img src="{{ public_image_url($product->image) }}" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:8px;border:1px solid #D5CEC2;">
                        @else
                        <span style="font-size:1.4rem;">{{ $product->emoji }}</span>
                        @endif
                    </td>
                    <td><strong>{{ $product->name }}</strong><br><small style="color:#999;">{{ Str::limit($product->description, 55) }}</small></td>
                    <td>{{ $product->category->name ?? '—' }}</td>
                    <td><span class="badge badge-{{ $product->badge_type }}">{{ $product->badge_text }}</span></td>
                    <td><span class="badge {{ $product->is_active ? 'badge-green' : 'badge-gray' }}">{{ $product->is_active ? 'Active' : 'Hidden' }}</span></td>
                    <td>{{ $product->is_featured ? '⭐' : '—' }}</td>
                    <td style="display:flex;gap:.5rem;">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-outline btn-sm">✏️ Edit</a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Delete this product?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center;color:#aaa;padding:2rem;">No products yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
function filterTable() {
    const val = document.getElementById('catFilter').value;
    document.querySelectorAll('#productsTable tbody tr').forEach(row => {
        row.style.display = (!val || row.dataset.cat === val) ? '' : 'none';
    });
}
</script>
@endsection
