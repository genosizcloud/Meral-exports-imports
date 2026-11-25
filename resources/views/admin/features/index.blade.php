@extends('admin.layout')
@section('title','Why Choose Us')
@section('page-title','Why Choose Us – Features')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>⭐ Why Choose Us Cards</h2>
        <a href="{{ route('admin.features.create') }}" class="btn btn-primary btn-sm">+ New Feature</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr><th>Order</th><th>Icon</th><th>Title</th><th>Description</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($features as $f)
                <tr>
                    <td>{{ $f->sort_order }}</td>
                    <td style="font-size:1.5rem;">{{ $f->icon }}</td>
                    <td><strong>{{ $f->title }}</strong></td>
                    <td style="color:#666;max-width:300px;">{{ Str::limit($f->description, 80) }}</td>
                    <td><span class="badge {{ $f->is_active ? 'badge-green' : 'badge-gray' }}">{{ $f->is_active ? 'Active' : 'Hidden' }}</span></td>
                    <td style="display:flex;gap:.5rem;">
                        <a href="{{ route('admin.features.edit', $f) }}" class="btn btn-outline btn-sm">✏️ Edit</a>
                        <form method="POST" action="{{ route('admin.features.destroy', $f) }}" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" style="text-align:center;color:#aaa;padding:2rem;">No features yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
