@extends('admin.layout')
@section('title','Hero Section')
@section('page-title','Hero Section')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>🖼️ Edit Hero / Banner Section</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.hero.update') }}">
            @csrf @method('PUT')
            <div class="form-grid">

                <div class="form-group">
                    <label>Badge Text (top banner)</label>
                    <input type="text" name="badge_text" value="{{ old('badge_text', $hero->badge_text) }}" required>
                    <span class="hint">e.g. "Trusted Worldwide Food Exporter"</span>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div class="form-group">
                        <label>Title – Line 1</label>
                        <input type="text" name="title_line1" value="{{ old('title_line1', $hero->title_line1) }}" required>
                        <span class="hint">Normal colour text e.g. "Delivering"</span>
                    </div>
                    <div class="form-group">
                        <label>Title – Highlighted Word (Gold)</label>
                        <input type="text" name="title_highlight" value="{{ old('title_highlight', $hero->title_highlight) }}" required>
                        <span class="hint">e.g. "Premium"</span>
                    </div>
                    <div class="form-group">
                        <label>Title – Line 2</label>
                        <input type="text" name="title_line2" value="{{ old('title_line2', $hero->title_line2) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Title – Line 3</label>
                        <input type="text" name="title_line3" value="{{ old('title_line3', $hero->title_line3) }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Subtitle / Description (Optional)</label>
                    <textarea name="subtitle">{{ old('subtitle', $hero->subtitle) }}</textarea>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div class="form-group">
                        <label>Primary Button Text</label>
                        <input type="text" name="btn_primary_text" value="{{ old('btn_primary_text', $hero->btn_primary_text) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Secondary Button Text</label>
                        <input type="text" name="btn_secondary_text" value="{{ old('btn_secondary_text', $hero->btn_secondary_text) }}" required>
                    </div>
                </div>

                <div>
                    <p style="font-size:.83rem;font-weight:600;color:#444;margin-bottom:.75rem;">Mini Stats (in hero card)</p>
                    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;">
                        @foreach([1,2,3] as $i)
                        <div class="card" style="padding:1rem;">
                            <div class="form-group" style="margin-bottom:.5rem;">
                                <label>Stat {{ $i }} Number</label>
                                <input type="text" name="stat{{ $i }}_number" value="{{ old('stat'.$i.'_number', $hero->{'stat'.$i.'_number'}) }}" required>
                            </div>
                            <div class="form-group">
                                <label>Stat {{ $i }} Label</label>
                                <input type="text" name="stat{{ $i }}_label" value="{{ old('stat'.$i.'_label', $hero->{'stat'.$i.'_label'}) }}" required>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Save Changes</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
