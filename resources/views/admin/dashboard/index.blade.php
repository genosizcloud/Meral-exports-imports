@extends('admin.layout')
@section('title', 'Wholesale Product Catalog & Operations')
@section('page-title', 'Catalog Admin Console')

@section('content')
<div class="stats-row" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-bottom:2rem;">
    <div class="stat-card" style="background:#fff;border:1px solid #E3DDD2;border-radius:8px;padding:1.25rem 1.5rem;box-shadow:0 4px 20px -2px rgba(14,56,43,.05);border-top:3px solid #0E382B;">
        <div style="display:flex;align-items:center;justify-content:space-between;color:#5A6863;margin-bottom:.5rem;">
            <span style="font-size:.75rem;text-transform:uppercase;font-weight:600;letter-spacing:1px;">Commodities</span>
            <span class="material-symbols-outlined" style="color:#0E382B;">inventory_2</span>
        </div>
        <div class="num" style="font-size:2.2rem;font-weight:700;color:#19211E;">{{ $totalProducts }}</div>
        <div class="lbl" style="font-size:.78rem;color:#065f46;margin-top:.3rem;display:flex;align-items:center;gap:.3rem;">
            <span class="material-symbols-outlined" style="font-size:.9rem;">check_circle</span> Published &amp; Active
        </div>
    </div>

    <div class="stat-card" style="background:#fff;border:1px solid #E3DDD2;border-radius:8px;padding:1.25rem 1.5rem;box-shadow:0 4px 20px -2px rgba(14,56,43,.05);border-top:3px solid #1C4E3D;">
        <div style="display:flex;align-items:center;justify-content:space-between;color:#5A6863;margin-bottom:.5rem;">
            <span style="font-size:.75rem;text-transform:uppercase;font-weight:600;letter-spacing:1px;">Categories</span>
            <span class="material-symbols-outlined" style="color:#1C4E3D;">category</span>
        </div>
        <div class="num" style="font-size:2.2rem;font-weight:700;color:#19211E;">{{ $totalCategories }}</div>
        <div class="lbl" style="font-size:.78rem;color:#5A6863;margin-top:.3rem;">Export Verticals</div>
    </div>

    <div class="stat-card" style="background:#fff;border:1px solid #E3DDD2;border-radius:8px;padding:1.25rem 1.5rem;box-shadow:0 4px 20px -2px rgba(14,56,43,.05);border-top:3px solid #9C7428;">
        <div style="display:flex;align-items:center;justify-content:space-between;color:#5A6863;margin-bottom:.5rem;">
            <span style="font-size:.75rem;text-transform:uppercase;font-weight:600;letter-spacing:1px;">Customer Enquiries</span>
            <span class="material-symbols-outlined" style="color:#9C7428;">mark_email_unread</span>
        </div>
        <div class="num" style="font-size:2.2rem;font-weight:700;color:#19211E;">{{ $totalEnquiries }}</div>
        <div class="lbl" style="font-size:.78rem;color:#9C7428;font-weight:600;margin-top:.3rem;">
            {{ $newEnquiries }} Pending Action
        </div>
    </div>

    <div class="stat-card" style="background:#fff;border:1px solid #E3DDD2;border-radius:8px;padding:1.25rem 1.5rem;box-shadow:0 4px 20px -2px rgba(14,56,43,.05);border-top:3px solid #DFBE7E;">
        <div style="display:flex;align-items:center;justify-content:space-between;color:#5A6863;margin-bottom:.5rem;">
            <span style="font-size:.75rem;text-transform:uppercase;font-weight:600;letter-spacing:1px;">Counters</span>
            <span class="material-symbols-outlined" style="color:#9C7428;">bar_chart</span>
        </div>
        <div class="num" style="font-size:2.2rem;font-weight:700;color:#19211E;">{{ $totalStats }}</div>
        <div class="lbl" style="font-size:.78rem;color:#5A6863;margin-top:.3rem;">Live Statistics</div>
    </div>
</div>

<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.25rem;">
    <a href="{{ route('admin.products.index') }}" style="text-decoration:none;">
        <div class="card" style="padding:1.5rem;border:1px solid #E3DDD2;border-left:4px solid #0E382B;background:#fff;border-radius:8px;transition:all .2s;cursor:pointer;">
            <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:.75rem;">
                <span class="material-symbols-outlined" style="color:#0E382B;font-size:1.8rem;">inventory_2</span>
                <h3 style="color:#19211E;font-size:1.1rem;font-weight:700;">Manage Commodities</h3>
            </div>
            <p style="color:#5A6863;font-size:.84rem;line-height:1.5;">Add, edit specifications, update HS codes, grades, or upload commodity photography.</p>
        </div>
    </a>

    <a href="{{ route('admin.categories.index') }}" style="text-decoration:none;">
        <div class="card" style="padding:1.5rem;border:1px solid #E3DDD2;border-left:4px solid #1C4E3D;background:#fff;border-radius:8px;transition:all .2s;cursor:pointer;">
            <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:.75rem;">
                <span class="material-symbols-outlined" style="color:#1C4E3D;font-size:1.8rem;">category</span>
                <h3 style="color:#19211E;font-size:1.1rem;font-weight:700;">Category Taxonomy</h3>
            </div>
            <p style="color:#5A6863;font-size:.84rem;line-height:1.5;">Organize agricultural verticals such as Spices, Grains, Pulses, and Edible Oils.</p>
        </div>
    </a>

    <a href="{{ route('admin.enquiries.index') }}" style="text-decoration:none;">
        <div class="card" style="padding:1.5rem;border:1px solid #E3DDD2;border-left:4px solid #9C7428;background:#fff;border-radius:8px;transition:all .2s;cursor:pointer;">
            <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:.75rem;">
                <span class="material-symbols-outlined" style="color:#9C7428;font-size:1.8rem;">request_quote</span>
                <h3 style="color:#19211E;font-size:1.1rem;font-weight:700;">Quote Inquiries &amp; RFQs</h3>
            </div>
            <p style="color:#5A6863;font-size:.84rem;line-height:1.5;">Review incoming container quotation inquiries, volume requirements, and destination ports.</p>
        </div>
    </a>

    <a href="{{ route('admin.hero.edit') }}" style="text-decoration:none;">
        <div class="card" style="padding:1.5rem;border:1px solid #E3DDD2;border-left:4px solid #0E382B;background:#fff;border-radius:8px;transition:all .2s;cursor:pointer;">
            <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:.75rem;">
                <span class="material-symbols-outlined" style="color:#0E382B;font-size:1.8rem;">view_carousel</span>
                <h3 style="color:#19211E;font-size:1.1rem;font-weight:700;">Homepage Hero Content</h3>
            </div>
            <p style="color:#5A6863;font-size:.84rem;line-height:1.5;">Modify the main headline, introductory proposition, and trade credentials banner.</p>
        </div>
    </a>

    <a href="{{ route('admin.settings.index') }}" style="text-decoration:none;">
        <div class="card" style="padding:1.5rem;border:1px solid #E3DDD2;border-left:4px solid #5A6863;background:#fff;border-radius:8px;transition:all .2s;cursor:pointer;">
            <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:.75rem;">
                <span class="material-symbols-outlined" style="color:#5A6863;font-size:1.8rem;">settings</span>
                <h3 style="color:#19211E;font-size:1.1rem;font-weight:700;">Corporate Desk Settings</h3>
            </div>
            <p style="color:#5A6863;font-size:.84rem;line-height:1.5;">Update operating hours, headquarters address, direct inquiry email, and phone channels.</p>
        </div>
    </a>
</div>
@endsection
