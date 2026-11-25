<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.bunny.net/css?family=oswald:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<title>@yield('title', 'Admin') – Meral Exports</title>
<style>
.material-symbols-outlined { line-height: 1 !important; vertical-align: middle; }
:root {
    --navy: #0E382B;
    --navy-light: #E7EEE9;
    --gold: #9C7428;
    --cream: #FAF8F5;
    --bg: #F7F5F0;
    --sidebar-w: 260px;
    --card-radius: 12px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Oswald',sans-serif;background:var(--bg);color:#333;display:flex;min-height:100vh;}

/* ─── Sidebar ─── */
.sidebar{width:var(--sidebar-w);background:var(--navy);color:#fff;display:flex;flex-direction:column;position:fixed;height:100vh;left:0;top:0;z-index:100;overflow-y:auto;}
.sidebar-logo{padding:1.5rem 1.25rem;border-bottom:1px solid rgba(255,255,255,.1);display:flex;align-items:center;gap:.75rem;}
.sidebar-logo img{height:44px;width:66px;object-fit:contain;filter:none;background:#FAF8F5;border-radius:3px;}
.sidebar-logo span{font-weight:700;font-size:.95rem;line-height:1.2;}
.sidebar-logo small{color:rgba(255,255,255,.5);font-size:.7rem;font-weight:400;}
.sidebar-nav{flex:1;padding:1rem 0;}
.nav-group{padding:.5rem 1.25rem .25rem;font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.35);}
.sidebar a{display:flex;align-items:center;gap:.75rem;padding:.7rem 1.25rem;color:rgba(255,255,255,.75);text-decoration:none;font-size:.88rem;transition:.15s;border-left:3px solid transparent;}
.sidebar a:hover,.sidebar a.active{background:rgba(255,255,255,.07);color:#fff;border-left-color:var(--gold);}
.sidebar a .icon{font-size:1.1rem;width:22px;text-align:center;}
.sidebar-footer{padding:1rem 1.25rem;border-top:1px solid rgba(255,255,255,.1);}
.sidebar-footer a{color:rgba(255,255,255,.5);font-size:.82rem;text-decoration:none;display:flex;align-items:center;gap:.5rem;}
.sidebar-footer a:hover{color:#fff;}

/* ─── Main ─── */
.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh;}
.topbar{background:#fff;border-bottom:1px solid #E3DDD2;padding:.875rem 1.75rem;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:50;box-shadow:0 1px 4px rgba(0,0,0,.06);}
.topbar h1{font-size:1.1rem;font-weight:600;color:var(--navy);}
.topbar-right{display:flex;align-items:center;gap:1rem;}
.topbar-user{display:flex;align-items:center;gap:.5rem;font-size:.85rem;color:#555;}
.topbar-user .avatar{width:34px;height:34px;background:var(--navy);color:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.9rem;}
.content{padding:1.75rem;flex:1;}

/* ─── Alert ─── */
.alert{padding:.875rem 1.25rem;border-radius:8px;margin-bottom:1.25rem;font-size:.88rem;display:flex;align-items:center;gap:.5rem;}
.alert-success{background:#d1fae5;color:#065f46;border:1px solid #a7f3d0;}
.alert-error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5;}

/* ─── Cards ─── */
.card{background:#fff;border-radius:var(--card-radius);box-shadow:0 1px 4px rgba(0,0,0,.07);overflow:hidden;}
.card-header{padding:1rem 1.5rem;border-bottom:1px solid #f0f0f0;display:flex;align-items:center;justify-content:space-between;}
.card-header h2{font-size:1rem;font-weight:600;color:var(--navy);}
.card-body{padding:1.5rem;}

/* ─── Stats row ─── */
.stats-row{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:1rem;margin-bottom:1.75rem;}
.stat-card{background:#fff;border-radius:var(--card-radius);padding:1.25rem 1.5rem;box-shadow:0 1px 4px rgba(0,0,0,.07);border-top:3px solid var(--gold);}
.stat-card .num{font-size:2rem;font-weight:700;color:var(--navy);}
.stat-card .lbl{font-size:.82rem;color:#777;margin-top:.2rem;}

/* ─── Table ─── */
.table-wrap{overflow-x:auto;}
table{width:100%;border-collapse:collapse;font-size:.875rem;}
thead{background:#F7F5F0;}
th{padding:.75rem 1rem;text-align:left;font-weight:600;color:#555;white-space:nowrap;border-bottom:2px solid #E3DDD2;}
td{padding:.75rem 1rem;border-bottom:1px solid #f0f0f0;vertical-align:middle;}
tr:hover td{background:#fafbfc;}
.badge{display:inline-block;padding:.2rem .6rem;border-radius:20px;font-size:.72rem;font-weight:600;}
.badge-green{background:#d1fae5;color:#065f46;}
.badge-blue{background:#E7EEE9;color:#0E382B;}
.badge-orange{background:#ffedd5;color:#9a3412;}
.badge-gray{background:#f1f5f9;color:#475569;}

/* ─── Buttons ─── */
.btn{display:inline-flex;align-items:center;gap:.4rem;padding:.55rem 1.1rem;border-radius:8px;font-size:.85rem;font-weight:600;cursor:pointer;text-decoration:none;border:none;transition:.15s;}
.btn-primary{background:var(--navy);color:#fff;}
.btn-primary:hover{background:var(--navy-light);}
.btn-gold{background:var(--gold);color:#fff;}
.btn-gold:hover{background:#b8943a;}
.btn-sm{padding:.35rem .75rem;font-size:.8rem;}
.btn-danger{background:#fee2e2;color:#991b1b;}
.btn-danger:hover{background:#fca5a5;}
.btn-outline{background:#fff;border:1px solid #D5CEC2;color:#444;}
.btn-outline:hover{background:#F7F5F0;}

/* ─── Forms ─── */
.form-grid{display:grid;gap:1.1rem;}
.form-grid-2{grid-template-columns:1fr 1fr;}
.form-group{display:flex;flex-direction:column;gap:.4rem;}
.form-group label{font-size:.83rem;font-weight:600;color:#444;}
.form-group input,.form-group textarea,.form-group select{border:1.5px solid #D5CEC2;border-radius:8px;padding:.65rem .9rem;font-size:.88rem;font-family:inherit;transition:.15s;outline:none;background:#fff;}
.form-group input:focus,.form-group textarea:focus,.form-group select:focus{border-color:var(--navy);box-shadow:0 0 0 3px rgba(14,56,43,.1);}
.form-group textarea{min-height:90px;resize:vertical;}
.form-group .hint{font-size:.75rem;color:#888;}
.form-group .error{color:#c00;font-size:.78rem;}
.form-actions{display:flex;gap:.75rem;align-items:center;margin-top:.5rem;padding-top:1rem;border-top:1px solid #f0f0f0;}
.toggle-label{display:flex;align-items:center;gap:.5rem;cursor:pointer;font-size:.85rem;}
.toggle-label input[type=checkbox]{width:16px;height:16px;cursor:pointer;}

/* ─── Color swatch ─── */
.color-row{display:flex;align-items:center;gap:.5rem;}
.color-row input[type=color]{width:42px;height:38px;border-radius:6px;border:1.5px solid #D5CEC2;cursor:pointer;padding:2px;}

/* ─── Responsive ─── */
@media(max-width:768px){
    .sidebar{transform:translateX(-100%);}
    .main{margin-left:0;}
    .form-grid-2{grid-template-columns:1fr;}
}
/* Stitch admin system: precise, calm workspace surfaces. */
body{font-family:'Oswald',sans-serif;background:#F7F5F0;color:#19211E}
.sidebar{background:#08241B}
.sidebar-logo{padding:1.25rem 1.2rem;border-bottom-color:rgba(255,255,255,.12)}
.sidebar a{font-size:.86rem;border-left-width:2px}
.sidebar a:hover,.sidebar a.active{background:rgba(255,255,255,.1);border-left-color:#DFBE7E}
.nav-group{color:rgba(255,255,255,.56);letter-spacing:.12em}
.main{min-width:0}
.topbar{padding:.9rem 1.75rem;background:rgba(250,248,245,.96);border-color:#E3DDD2;box-shadow:none}
.topbar h1{font-family:'Oswald',sans-serif;font-size:1.4rem;font-weight:600;color:#19211E}
.content{padding:1.5rem 1.75rem}
.card,.stat-card{border:1px solid #E3DDD2;border-radius:8px;box-shadow:0 4px 20px -2px rgba(14,56,43,.05)}
.card-header{background:#fff;border-color:#E3DDD2;padding:1rem 1.25rem}
.card-header h2{color:#0E382B}.stat-card{border-top:2px solid #9C7428}.stat-card .num{color:#0E382B}
thead{background:#F7F5F0}th{color:#50615A;border-color:#E3DDD2}td{border-color:#EEEAE3}tr:hover td{background:#FBFAF7}
.badge-green{background:#E7EEE9;color:#0E382B}.btn{border-radius:5px}.btn-primary{background:#0E382B}.btn-primary:hover{background:#1C4E3D}.btn-gold{background:#9C7428}
.form-group input,.form-group textarea,.form-group select{border-color:#D5CEC2;border-radius:5px;font-family:'Oswald',sans-serif;color:#19211E}
.form-group input:focus,.form-group textarea:focus,.form-group select:focus{border-color:#0E382B;box-shadow:0 0 0 3px rgba(14,56,43,.12)}
.btn:focus-visible,.sidebar a:focus-visible,.form-group input:focus-visible,.form-group select:focus-visible,.form-group textarea:focus-visible{outline:3px solid #9C7428;outline-offset:2px}
.mobile-nav-toggle{display:none;background:#0E382B;color:white;border:0;border-radius:5px;padding:.55rem .7rem;font:600 .82rem 'Oswald',sans-serif;cursor:pointer}
@media(max-width:768px){.sidebar{z-index:110;box-shadow:10px 0 35px rgba(0,0,0,.18)}.sidebar.open{transform:translateX(0)}.topbar{padding:.75rem 1rem;gap:.75rem}.mobile-nav-toggle{display:inline-flex;align-items:center;gap:.4rem}.content{padding:1rem}.topbar-user{font-size:.75rem}.card-header{gap:.75rem;flex-wrap:wrap}.stats-row{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:420px){.stats-row{grid-template-columns:1fr}.topbar h1{font-size:1.1rem}}
</style>
</head>
<body>

<aside class="sidebar" id="adminSidebar">
    <div class="sidebar-logo">
        <img src="{{ asset('primary-logo.png') }}" alt="Meral Group">
        <div><span>Meral Exports<br><small>Admin Panel</small></span></div>
    </div>
    <nav class="sidebar-nav">
        <div class="nav-group">Overview</div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">dashboard</span> Dashboard
        </a>
        <a href="{{ route('admin.enquiries.index') }}" class="{{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">mail</span> Enquiries
            @php $newEnquiryCount = \App\Models\Enquiry::where('status', 'new')->count(); @endphp
            @if($newEnquiryCount > 0)
            <span style="margin-left:auto;background:#9C7428;color:#0E382B;font-size:.65rem;font-weight:800;padding:.15rem .45rem;border-radius:99px;">{{ $newEnquiryCount }}</span>
            @endif
        </a>
        <div class="nav-group">Content</div>
        <a href="{{ route('admin.hero.edit') }}" class="{{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">view_carousel</span> Hero Section
        </a>
        <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">category</span> Categories
        </a>
        <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">inventory_2</span> Products
        </a>
        <a href="{{ route('admin.features.index') }}" class="{{ request()->routeIs('admin.features.*') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">verified</span> Why Choose Us
        </a>
        <a href="{{ route('admin.stats.index') }}" class="{{ request()->routeIs('admin.stats.*') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">bar_chart</span> Statistics
        </a>
        <a href="{{ route('admin.countries.index') }}" class="{{ request()->routeIs('admin.countries.*') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">public</span> Export Countries
        </a>
        <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">photo_library</span> Gallery
        </a>
        <a href="{{ route('admin.blog.index') }}" class="{{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">article</span> Blog
        </a>
        <div class="nav-group">Config</div>
        <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">settings</span> Site Settings
        </a>
        <a href="{{ route('admin.seo.index') }}" class="{{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
            <span class="icon material-symbols-outlined">search</span> SEO Settings
        </a>
        <div class="nav-group">Website Pages</div>
        <a href="{{ url('/') }}" target="_blank">
            <span class="icon material-symbols-outlined">open_in_new</span> Public Home
        </a>
        <a href="{{ url('/products') }}" target="_blank">
            <span class="icon material-symbols-outlined">open_in_new</span> Public Catalog
        </a>
    </nav>
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" style="background:none;border:none;cursor:pointer;color:rgba(255,255,255,.5);font-size:.82rem;display:flex;align-items:center;gap:.5rem;padding:0;">
                🚪 Logout
            </button>
        </form>
    </div>
</aside>

<div class="main">
    <div class="topbar">
        <button class="mobile-nav-toggle" type="button" aria-expanded="false" aria-controls="adminSidebar" onclick="toggleAdminNav(this)">☰ Menu</button>
        <h1>@yield('page-title', 'Dashboard')</h1>
        <div class="topbar-right">
            <div class="topbar-user">
                <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                {{ auth()->user()->name }}
            </div>
        </div>
    </div>

    <div class="content">
        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">❌ {{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-error" role="alert"><span><strong>Please review the form:</strong> {{ $errors->first() }}</span></div>
        @endif

        @yield('content')
    </div>
</div>

<script>
function toggleAdminNav(button){const sidebar=document.getElementById('adminSidebar');const opened=sidebar.classList.toggle('open');button.setAttribute('aria-expanded',opened?'true':'false')}
document.addEventListener('keydown',event=>{if(event.key==='Escape'){document.getElementById('adminSidebar')?.classList.remove('open');document.querySelector('.mobile-nav-toggle')?.setAttribute('aria-expanded','false')}})
</script>

</body>
</html>
