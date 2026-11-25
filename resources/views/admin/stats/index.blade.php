@extends('admin.layout')
@section('title','Statistics')
@section('page-title','Animated Stats')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>📊 Animated Counter Stats</h2>
        <a href="{{ route('admin.stats.create') }}" class="btn btn-primary btn-sm">+ New Stat</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr><th>Order</th><th>Value</th><th>Suffix</th><th>Label</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($stats as $stat)
                <tr>
                    <td>{{ $stat->sort_order }}</td>
                    <td><strong style="font-size:1.2rem;color:#0E382B;">{{ $stat->value }}</strong></td>
                    <td>{{ $stat->suffix }}</td>
                    <td>{{ $stat->label }}</td>
                    <td style="display:flex;gap:.5rem;">
                        <a href="{{ route('admin.stats.edit', $stat) }}" class="btn btn-outline btn-sm">✏️ Edit</a>
                        <form method="POST" action="{{ route('admin.stats.destroy', $stat) }}" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center;color:#aaa;padding:2rem;">No stats yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
