@extends('admin.layout')
@section('title', 'Enquiry Details')
@section('page-title', 'Enquiry Details')

@section('content')
<div style="display:flex;gap:1rem;margin-bottom:1rem;flex-wrap:wrap;">
    <a href="{{ route('admin.enquiries.index') }}" class="btn btn-outline btn-sm">← Back to Enquiries</a>
    <a href="mailto:{{ $enquiry->email }}?subject=Re: Your inquiry to Meral Exports" class="btn btn-primary btn-sm">✉️ Reply via Email</a>
    @if($enquiry->phone)
    <a href="tel:{{ preg_replace('/\s+/', '', $enquiry->phone) }}" class="btn btn-outline btn-sm">📞 Call</a>
    @if(strlen(preg_replace('/\D/', '', $enquiry->phone)) >= 10)
    <a href="https://wa.me/{{ preg_replace('/\D/', '', $enquiry->phone) }}" target="_blank" class="btn btn-outline btn-sm">💬 WhatsApp</a>
    @endif
    @endif
</div>

<div class="card">
    <div class="card-header">
        <h2>📩 {{ $enquiry->name }}</h2>
        <span style="font-size:.8rem;color:#888;">Received {{ $enquiry->created_at->format('d M Y, h:i A') }}</span>
    </div>
    <div style="padding:1.75rem;">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1.25rem;margin-bottom:1.75rem;">
            <div>
                <div style="font-size:.7rem;font-weight:700;color:#999;text-transform:uppercase;margin-bottom:.35rem;">Email</div>
                <a href="mailto:{{ $enquiry->email }}" style="color:var(--navy);font-weight:600;">{{ $enquiry->email }}</a>
            </div>
            @if($enquiry->phone)
            <div>
                <div style="font-size:.7rem;font-weight:700;color:#999;text-transform:uppercase;margin-bottom:.35rem;">Phone</div>
                <span style="font-weight:600;">{{ $enquiry->phone }}</span>
            </div>
            @endif
            @if($enquiry->company)
            <div>
                <div style="font-size:.7rem;font-weight:700;color:#999;text-transform:uppercase;margin-bottom:.35rem;">Company</div>
                <span>{{ $enquiry->company }}</span>
            </div>
            @endif
            @if($enquiry->product_interest)
            <div>
                <div style="font-size:.7rem;font-weight:700;color:#999;text-transform:uppercase;margin-bottom:.35rem;">Product Interest</div>
                <span>{{ $enquiry->product_interest }}</span>
            </div>
            @endif
            @if($enquiry->country)
            <div>
                <div style="font-size:.7rem;font-weight:700;color:#999;text-transform:uppercase;margin-bottom:.35rem;">Destination Country</div>
                <span>{{ $enquiry->country }}</span>
            </div>
            @endif
            @if($enquiry->quantity)
            <div>
                <div style="font-size:.7rem;font-weight:700;color:#999;text-transform:uppercase;margin-bottom:.35rem;">Quantity</div>
                <span>{{ $enquiry->quantity }}</span>
            </div>
            @endif
            <div>
                <div style="font-size:.7rem;font-weight:700;color:#999;text-transform:uppercase;margin-bottom:.35rem;">Status</div>
                <span style="font-weight:700;color:var(--gold);">{{ $enquiry->statusLabel() }}</span>
            </div>
        </div>

        <div style="background:#F7F5F0;border-radius:10px;padding:1.5rem;border:1px solid #E3DDD2;">
            <div style="font-size:.7rem;font-weight:700;color:#999;text-transform:uppercase;margin-bottom:.75rem;">Message</div>
            <p style="line-height:1.8;color:#444;white-space:pre-wrap;">{{ $enquiry->message }}</p>
        </div>

        <div style="margin-top:1.75rem;display:flex;gap:.75rem;flex-wrap:wrap;align-items:center;">
            <form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}" style="display:flex;gap:.5rem;align-items:center;">
                @csrf @method('PUT')
                <label style="font-size:.85rem;font-weight:600;">Update status:</label>
                <select name="status" style="padding:.45rem .75rem;border:1px solid #D5CEC2;border-radius:8px;font-size:.85rem;">
                    <option value="new" {{ $enquiry->status === 'new' ? 'selected' : '' }}>New</option>
                    <option value="read" {{ $enquiry->status === 'read' ? 'selected' : '' }}>Read</option>
                    <option value="replied" {{ $enquiry->status === 'replied' ? 'selected' : '' }}>Replied</option>
                    <option value="archived" {{ $enquiry->status === 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </form>
            <form method="POST" action="{{ route('admin.enquiries.destroy', $enquiry) }}" onsubmit="return confirm('Delete this enquiry permanently?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
