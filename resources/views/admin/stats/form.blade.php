@extends('admin.layout')
@section('title', ($action === 'create' ? 'New' : 'Edit') . ' Stat')
@section('page-title', ($action === 'create' ? 'New' : 'Edit') . ' Stat')

@section('content')
<div style="max-width:480px;">
<div class="card">
    <div class="card-header">
        <h2>{{ $action === 'create' ? '➕ New Stat' : '✏️ Edit Stat' }}</h2>
        <a href="{{ route('admin.stats.index') }}" class="btn btn-outline btn-sm">← Back</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ $action === 'create' ? route('admin.stats.store') : route('admin.stats.update', $stat) }}">
            @csrf
            @if($action === 'edit') @method('PUT') @endif
            <div class="form-grid">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div class="form-group">
                        <label>Number Value *</label>
                        <input type="number" name="value" value="{{ old('value', $stat->value) }}" required min="0" placeholder="500">
                    </div>
                    <div class="form-group">
                        <label>Suffix</label>
                        <input type="text" name="suffix" value="{{ old('suffix', $stat->suffix ?? '+') }}" required placeholder="+" maxlength="10">
                        <span class="hint">e.g. + or K+ or %</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Label *</label>
                    <input type="text" name="label" value="{{ old('label', $stat->label) }}" required placeholder="e.g. Products Available">
                </div>
                <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $stat->sort_order ?? 0) }}" min="0">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Save</button>
                    <a href="{{ route('admin.stats.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
