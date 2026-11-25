@extends('admin.layout')
@section('title', 'Enquiries')
@section('page-title', 'Customer Enquiries')

@section('content')
<div class="card" style="margin-bottom:1rem;">
    <div class="card-header" style="flex-wrap:wrap;gap:.75rem;">
        <h2>📩 Enquiries ({{ $counts['all'] }})</h2>
        <div style="display:flex;gap:.5rem;flex-wrap:wrap;">
            <a href="{{ route('admin.enquiries.index') }}" class="btn btn-sm {{ !$status ? 'btn-primary' : 'btn-outline' }}">All ({{ $counts['all'] }})</a>
            <a href="{{ route('admin.enquiries.index', ['status' => 'new']) }}" class="btn btn-sm {{ $status === 'new' ? 'btn-primary' : 'btn-outline' }}">New ({{ $counts['new'] }})</a>
            <a href="{{ route('admin.enquiries.index', ['status' => 'read']) }}" class="btn btn-sm {{ $status === 'read' ? 'btn-primary' : 'btn-outline' }}">Read ({{ $counts['read'] }})</a>
            <a href="{{ route('admin.enquiries.index', ['status' => 'replied']) }}" class="btn btn-sm {{ $status === 'replied' ? 'btn-primary' : 'btn-outline' }}">Replied ({{ $counts['replied'] }})</a>
            <a href="{{ route('admin.enquiries.index', ['status' => 'archived']) }}" class="btn btn-sm {{ $status === 'archived' ? 'btn-primary' : 'btn-outline' }}">Archived ({{ $counts['archived'] }})</a>
        </div>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email / Phone</th>
                    <th>Product</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($enquiries as $enquiry)
                <tr>
                    <td>
                        <strong>{{ $enquiry->created_at->format('d M Y') }}</strong>
                        <br><small style="color:#999;">{{ $enquiry->created_at->format('h:i A') }}</small>
                    </td>
                    <td>
                        <strong>{{ $enquiry->name }}</strong>
                        @if($enquiry->company)
                        <br><small style="color:#999;">{{ $enquiry->company }}</small>
                        @endif
                    </td>
                    <td>
                        <a href="mailto:{{ $enquiry->email }}" style="color:var(--navy);">{{ $enquiry->email }}</a>
                        @if($enquiry->phone)
                        <br><small style="color:#999;">{{ $enquiry->phone }}</small>
                        @endif
                    </td>
                    <td>{{ $enquiry->product_interest ?? '—' }}</td>
                    <td>{{ $enquiry->country ?? '—' }}</td>
                    <td>
                        @php
                            $badge = match($enquiry->status) {
                                'read' => '#3b82f6',
                                'replied' => '#27ae60',
                                'archived' => '#9ca3af',
                                default => '#9C7428',
                            };
                        @endphp
                        <span style="font-size:.75rem;font-weight:700;color:{{ $badge }};">● {{ $enquiry->statusLabel() }}</span>
                    </td>
                    <td style="display:flex;gap:.5rem;flex-wrap:wrap;">
                        <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="btn btn-outline btn-sm">👁 View</a>
                        <form method="POST" action="{{ route('admin.enquiries.destroy', $enquiry) }}" onsubmit="return confirm('Delete this enquiry?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center;color:#aaa;padding:2.5rem;">
                        No enquiries yet. Submissions from the contact page will appear here.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
