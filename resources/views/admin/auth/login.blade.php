<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Portal Login — Meral Exports &amp; Imports Pvt Ltd</title>
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=oswald:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<script src="https://cdn.tailwindcss.com?plugins=forms"></script>
<script id="tailwind-config">
tailwind.config = {
  theme: {
    extend: {
      colors: {
        'accent': '#9C7428',
        'forest-deep': '#08241B',
        'gold-light': '#DFBE7E',
        'gold-muted': '#F5EEDA',
        'charcoal': '#19211E',
        'slate-muted': '#5A6863',
        'border-subtle': '#E3DDD2',
        'light-primary': '#0E382B',
        'light-secondary': '#1C4E3D',
        'light-surface': '#FAF8F5',
        'light-surface-container-low': '#F7F5F0',
      },
      fontFamily: {
        'headline': ['"Oswald"', 'sans-serif'],
        'body': ['"Oswald"', 'sans-serif'],
        'label': ['"Oswald"', 'sans-serif'],
      },
    },
  },
};
</script>
<style>
body { font-family: 'Oswald', sans-serif; }
.material-symbols-outlined { line-height: 1 !important; vertical-align: middle; }
</style>
</head>
<body class="bg-forest-deep text-slate-100 font-body antialiased min-h-screen flex items-center justify-center p-6 relative overflow-hidden">

  <!-- Atmospheric Background Image from Stitch Design (High Visibility) -->
  <div class="absolute inset-0 pointer-events-none select-none">
    <img src="{{ asset('images/stitch/hero_spices_grains.jpg') }}" alt="Agricultural Commodity Background" class="w-full h-full object-cover opacity-65 filter brightness-100 contrast-110" onerror="this.onerror=null;this.src='{{ asset('hero-desktop.jpeg') }}';">
    <div class="absolute inset-0 bg-gradient-to-t from-forest-deep/70 via-forest-deep/45 to-forest-deep/65"></div>
  </div>

  <div class="w-full max-w-md relative z-10 space-y-6">
    
    <!-- Wordmark on dark background -->
    <div class="text-center space-y-2">
      <div class="flex items-center justify-center py-1">
        <img src="{{ asset('secondary-logo.png') }}" alt="Meral Exports &amp; Imports" class="h-12 sm:h-14 w-auto object-contain brightness-110" onerror="this.onerror=null;this.src='{{ asset('primary-logo.png') }}';">
      </div>
      <p class="font-label text-xs text-gold-light uppercase tracking-widest font-semibold pt-1">
        Staff Administration &amp; Catalog Management
      </p>
    </div>

    <!-- Login Card -->
    <div class="bg-white text-charcoal rounded-xl border border-border-subtle p-8 shadow-2xl space-y-6">
      
      <div class="border-b border-border-subtle pb-4">
        <h1 class="font-headline text-2xl font-bold text-charcoal">Sign In to Admin Portal</h1>
        <p class="font-body text-xs text-slate-muted mt-1">
          Authorized staff access for commodity specifications, pricing status, and website catalog.
        </p>
      </div>

      @if($errors->any())
        <div class="p-3 rounded bg-red-50 border border-red-200 text-red-700 text-xs flex items-center gap-2">
          <span class="material-symbols-outlined text-base">error</span>
          <span>{{ $errors->first() }}</span>
        </div>
      @endif

      <form action="{{ route('admin.login') }}" method="POST" class="space-y-4">
        @csrf
        
        <div>
          <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1">Corporate Staff Email</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-muted">
              <span class="material-symbols-outlined text-lg">mail</span>
            </span>
            <input type="email" name="email" value="{{ old('email', 'admin@meralexports.com') }}" required class="w-full pl-10 pr-4 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
          </div>
        </div>

        <div>
          <label class="block font-label text-xs uppercase tracking-wide text-charcoal mb-1">Password</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-muted">
              <span class="material-symbols-outlined text-lg">lock</span>
            </span>
            <input type="password" id="adminPassword" name="password" required placeholder="••••••••" class="w-full pl-10 pr-10 py-2.5 rounded bg-light-surface-container-low border border-border-subtle text-charcoal font-body text-sm focus:border-light-primary focus:bg-white outline-none">
            <button type="button" onclick="const p=document.getElementById('adminPassword'),i=document.getElementById('pwdEyeIcon');if(p.type==='password'){p.type='text';i.textContent='visibility_off';}else{p.type='password';i.textContent='visibility';}" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-muted hover:text-charcoal transition">
              <span id="pwdEyeIcon" class="material-symbols-outlined text-lg">visibility</span>
            </button>
          </div>
        </div>

        <div class="flex items-center justify-between text-xs pt-1">
          <label class="flex items-center gap-2 cursor-pointer text-slate-muted">
            <input type="checkbox" name="remember" checked class="rounded border-border-subtle text-light-primary focus:ring-light-primary">
            <span>Remember session on this device</span>
          </label>
          <span class="text-emerald-700 font-semibold flex items-center gap-1">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> 2FA Enabled
          </span>
        </div>

        <div class="pt-2">
          <button type="submit" class="w-full inline-flex items-center justify-center py-3 rounded-md bg-light-primary text-white font-label text-xs uppercase tracking-wide hover:bg-forest-deep transition shadow-md font-semibold">
            <span>Sign In to Catalog Dashboard</span>
            <span class="material-symbols-outlined text-sm ml-1.5">arrow_forward</span>
          </button>
        </div>

      </form>

      <div class="pt-4 border-t border-border-subtle text-center text-xs text-slate-muted">
        <span>Protected by enterprise session tokens &amp; IP whitelisting.</span>
      </div>

    </div>

    <!-- Return Link -->
    <div class="text-center">
      <a href="{{ url('/') }}" class="text-xs text-gold-light hover:underline inline-flex items-center gap-1 font-label uppercase tracking-wide">
        <span class="material-symbols-outlined text-sm">arrow_back</span>
        <span>Return to Public Website</span>
      </a>
    </div>

  </div>

</body>
</html>
