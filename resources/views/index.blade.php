<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- ── Basic SEO ──────────────────────────────────────── --}}
    @php
        $seoTitle    = $settings['seo_site_title']    ?? ($settings['company_name'] ?? 'Meral Exports') . ' – Premium Food Exports';
        $seoDesc     = $settings['seo_description']   ?? 'Premium quality food exports from Kerala, India.';
        $seoKw       = $settings['seo_keywords']      ?? '';
        $seoRobots   = $settings['seo_robots']        ?? 'index, follow';
        $seoCanon    = rtrim($settings['seo_canonical_url'] ?? url('/'), '/');
        $seoOgImage  = $settings['seo_og_image']      ?? asset('primary-logo.png');
        $seoOgType   = $settings['seo_og_type']       ?? 'website';
        $seoTwCard   = $settings['seo_twitter_card']  ?? 'summary_large_image';
        $seoTwSite   = $settings['seo_twitter_site']  ?? '';
        $seoGaId     = $settings['seo_google_analytics'] ?? '';
        $seoGtmId    = $settings['seo_gtm_id']        ?? '';
        $seoGVerify  = $settings['seo_google_verify'] ?? '';
        $seoBVerify  = $settings['seo_bing_verify']   ?? '';
        $companyName = $settings['company_name']      ?? 'Meral Exports & Imports Pvt Ltd';
        $phone1      = $settings['phone1']            ?? '';
        $phone2      = $settings['phone2']            ?? '';
        $email1      = $settings['email1']            ?? '';
        $address     = $settings['address']           ?? '';
        $locality    = $settings['seo_schema_locality']?? 'Cochin';
        $postal      = $settings['seo_schema_postal'] ?? '682001';
        $country     = $settings['seo_schema_country']?? 'IN';
        $founded     = $settings['seo_schema_founded']?? '2010';
    @endphp

    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDesc }}">
    @if($seoKw)<meta name="keywords" content="{{ $seoKw }}">@endif
    <meta name="robots" content="{{ $seoRobots }}">
    <link rel="canonical" href="{{ $seoCanon }}/">

    {{-- ── Google / Bing Verification ────────────────────── --}}
    @if($seoGVerify)<meta name="google-site-verification" content="{{ $seoGVerify }}">@endif
    @if($seoBVerify)<meta name="msvalidate.01" content="{{ $seoBVerify }}">@endif

    {{-- ── Open Graph ─────────────────────────────────────── --}}
    <meta property="og:type"        content="{{ $seoOgType }}">
    <meta property="og:url"         content="{{ $seoCanon }}/">
    <meta property="og:title"       content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDesc }}">
    <meta property="og:image"       content="{{ $seoOgImage }}">
    <meta property="og:image:width"  content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name"   content="{{ $companyName }}">
    <meta property="og:locale"      content="en_IN">

    {{-- ── Twitter / X Card ──────────────────────────────── --}}
    <meta name="twitter:card"        content="{{ $seoTwCard }}">
    <meta name="twitter:title"       content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDesc }}">
    <meta name="twitter:image"       content="{{ $seoOgImage }}">
    @if($seoTwSite)<meta name="twitter:site" content="{{ $seoTwSite }}">@endif

    {{-- ── Favicon ─────────────────────────────────────────── --}}
    <link rel="icon" type="image/png" href="{{ asset('primary-logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('primary-logo.png') }}">

    {{-- ── JSON-LD Structured Data ────────────────────────── --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Organization",
                "@id": "{{ $seoCanon }}/#organization",
                "name": "{{ addslashes($companyName) }}",
                "url": "{{ $seoCanon }}/",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('primary-logo.png') }}"
                },
                "foundingDate": "{{ $founded }}",
                "description": "{{ addslashes($seoDesc) }}",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "{{ addslashes($address) }}",
                    "addressLocality": "{{ $locality }}",
                    "postalCode": "{{ $postal }}",
                    "addressCountry": "{{ $country }}"
                },
                "contactPoint": [
                    @if($phone1){
                        "@type": "ContactPoint",
                        "telephone": "{{ $phone1 }}",
                        "contactType": "sales",
                        "availableLanguage": ["English", "Malayalam"]
                    }@if($phone2),@endif
                    @endif
                    @if($phone2){
                        "@type": "ContactPoint",
                        "telephone": "{{ $phone2 }}",
                        "contactType": "customer service"
                    }@endif
                ],
                "email": "{{ $email1 }}",
                "sameAs": [
                    "{{ $settings['facebook_url']  ?? '' }}",
                    "{{ $settings['instagram_url'] ?? '' }}"
                ]
            },
            {
                "@type": "WebSite",
                "@id": "{{ $seoCanon }}/#website",
                "url": "{{ $seoCanon }}/",
                "name": "{{ addslashes($companyName) }}",
                "publisher": {"@id": "{{ $seoCanon }}/#organization"},
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "{{ $seoCanon }}/#product-list",
                    "query-input": "required name=search_term_string"
                }
            },
            {
                "@type": "WebPage",
                "@id": "{{ $seoCanon }}/#webpage",
                "url": "{{ $seoCanon }}/",
                "name": "{{ addslashes($seoTitle) }}",
                "isPartOf": {"@id": "{{ $seoCanon }}/#website"},
                "about": {"@id": "{{ $seoCanon }}/#organization"},
                "description": "{{ addslashes($seoDesc) }}"
            },
            {
                "@type": "ItemList",
                "name": "Product Categories",
                "itemListElement": [
                    @foreach($categories as $i => $cat)
                    {
                        "@type": "ListItem",
                        "position": {{ $i + 1 }},
                        "name": "{{ addslashes($cat->name) }}"
                    }{{ !$loop->last ? ',' : '' }}
                    @endforeach
                ]
            }
        ]
    }
    </script>

    {{-- ── Google Tag Manager ──────────────────────────────── --}}
    @if($seoGtmId)
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ $seoGtmId }}');</script>
    @endif

    {{-- ── Google Analytics 4 ─────────────────────────────── --}}
    @if($seoGaId)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $seoGaId }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $seoGaId }}', { 'anonymize_ip': true });
    </script>
    @endif

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=oswald:300,400,500,600,700" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
    @endif

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            /* ── Meral logo colors ── */
            --navy:         #0E382B;   /* logo dark navy */
            --navy-dark:    #08241B;   /* deeper navy for hover/footer */
            --navy-light:   #E7EEE9;   /* very light navy tint */
            --cream:        #FAF8F5;   /* logo cream background */
            --cream-dark:   #EAE5DC;   /* slightly darker cream */
            --gold:         #9C7428;   /* warm gold accent */
            --gold-light:   #fdf6e3;   /* pale gold for badges */
            --text-dark:    #0E382B;
            --text-gray:    #5a6478;

            /* Keep legacy names pointed at new palette */
            --green-primary: var(--navy);
            --green-dark:    var(--navy-dark);
            --green-light:   var(--navy-light);
            --orange-primary: var(--gold);
            --orange-light:   var(--gold-light);
        }
        body { font-family: 'Oswald', sans-serif; color: var(--text-dark); background: #fff; overflow-x: hidden; }

        /* ===== NAVBAR GLASSMORPHISM ===== */
        .navbar {
            position: fixed; top: 0; width: 100%; z-index: 1000;
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(14, 56, 43, 0.08);
            box-shadow: 0 4px 20px rgba(14, 56, 43, 0.05);
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), background 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            will-change: transform;
        }
        .navbar.header-hidden {
            transform: translateY(-100%) !important;
        }
        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.78);
            box-shadow: 0 8px 32px rgba(14, 56, 43, 0.10);
            border-bottom-color: rgba(14, 56, 43, 0.12);
        }
        .navbar .logo-img {
            mix-blend-mode: multiply;
        }
        .navbar-inner {
            max-width: 1320px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0.6rem 2.5rem;
        }
        .logo { display: flex; align-items: center; gap: 0.4rem; text-decoration: none; }
        .logo-img { height: 72px; width: auto; object-fit: contain; display: block; }
        .nav-links { display: flex; align-items: center; gap: 0.5rem; list-style: none; }
        .nav-links a {
            padding: 0.5rem 1rem; border-radius: 6px;
            text-decoration: none; color: var(--navy); font-size: 0.875rem; font-weight: 500;
            letter-spacing: 0.2px; transition: all 0.2s;
        }
        .nav-links a:hover { background: var(--navy-light); color: var(--navy); }
        .nav-cta {
            background: var(--navy); color: #fff !important;
            padding: 0.55rem 1.4rem !important; border-radius: 6px !important;
            font-weight: 600 !important; letter-spacing: 0.3px !important;
        }
        .nav-cta:hover { background: var(--navy-dark) !important; color: #fff !important; }
        .hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; background: none; border: none; padding: 4px; }
        .hamburger span { width: 24px; height: 2px; background: var(--text-dark); border-radius: 2px; transition: all 0.3s; }
        .hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .hamburger.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
        .hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

        /* ===== HERO ===== */
        .hero {
            min-height: 100vh;
            background-color: #08241B;
            display: flex; align-items: center;
            position: relative; overflow: hidden; padding-top: 88px;
        }
        .hero-bg-picture {
            position: absolute; inset: 0; width: 100%; height: 100%;
            z-index: 0; pointer-events: none; overflow: hidden;
        }
        .hero-bg-img {
            width: 100%; height: 100%; object-fit: cover;
            object-position: center 65%;
            transform: scale(1.04);
            filter: brightness(0.98) contrast(1.05);
        }
        @media (min-width: 1024px) {
            .hero-bg-img {
                object-position: 40% 68%;
            }
        }
        .hero-bg-overlay {
            position: absolute; inset: 0; z-index: 0; pointer-events: none;
            background: linear-gradient(180deg, rgba(8,36,27,0.68) 0%, rgba(8,36,27,0.45) 50%, rgba(8,36,27,0.75) 100%);
        }
        @media (min-width: 1024px) {
            .hero-bg-overlay {
                background: linear-gradient(90deg, rgba(8,36,27,0.75) 0%, rgba(8,36,27,0.48) 50%, rgba(8,36,27,0.25) 100%);
            }
        }
        .hero::before {
            content: ''; position: absolute; inset: 0; z-index: 0; pointer-events: none;
            background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23C8A85A' fill-opacity='0.035'%3E%3Ccircle cx='40' cy='40' r='3'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .hero-orb-1, .hero-orb-2, .hero-orb-3 {
            position: absolute; border-radius: 50%; filter: blur(80px); opacity: 0.2;
        }
        .hero-orb-1 { width: 500px; height: 500px; background: #9C7428; top: -100px; right: -100px; }
        .hero-orb-2 { width: 300px; height: 300px; background: #FAF8F5; bottom: -50px; left: 20%; }
        .hero-orb-3 { width: 200px; height: 200px; background: #1C4E3D; top: 30%; left: -50px; }
        .hero-content {
            max-width: 1280px; margin: 0 auto; padding: 4rem 2rem;
            display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;
            position: relative; z-index: 1;
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 0.6rem;
            background: rgba(156,116,40,0.12); backdrop-filter: blur(10px);
            border: 1px solid rgba(156,116,40,0.35);
            padding: 0.45rem 1.1rem; border-radius: 4px;
            color: #9C7428; font-size: 0.75rem; font-weight: 600;
            letter-spacing: 1.5px; text-transform: uppercase;
            margin-bottom: 1.75rem;
        }
        .hero-badge span { width: 6px; height: 6px; background: #9C7428; border-radius: 50%; animation: pulse-dot 2s infinite; }
        @keyframes pulse-dot { 0%,100% { transform: scale(1); opacity: 1; } 50% { transform: scale(1.6); opacity: 0.6; } }
        .hero-title { font-size: clamp(2.4rem, 4.2vw, 3.8rem); font-weight: 800; color: #fff; line-height: 1.12; margin-bottom: 1.5rem; letter-spacing: -0.5px; }
        .hero-title .highlight { color: #9C7428; }
        .hero-subtitle { font-size: 1rem; color: rgba(255,255,255,0.70); line-height: 1.85; margin-bottom: 2.25rem; max-width: 520px; }
        .hero-actions { display: flex; gap: 1rem; flex-wrap: wrap; }
        .btn-primary {
            background: var(--gold); color: var(--navy);
            padding: 0.9rem 2.2rem; border-radius: 6px; text-decoration: none;
            font-weight: 700; font-size: 0.9rem; letter-spacing: 0.3px;
            box-shadow: 0 4px 24px rgba(156,116,40,0.35);
            transition: all 0.3s; display: inline-flex; align-items: center; gap: 0.6rem;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 32px rgba(156,116,40,0.50); background: #DFBE7E; }
        .btn-secondary {
            background: transparent; color: rgba(255,255,255,0.85);
            padding: 0.9rem 2.2rem; border-radius: 6px; text-decoration: none;
            font-weight: 600; font-size: 0.9rem; letter-spacing: 0.3px;
            border: 1.5px solid rgba(255,255,255,0.3);
            transition: all 0.3s; display: inline-flex; align-items: center; gap: 0.6rem;
        }
        .btn-secondary:hover { border-color: rgba(255,255,255,0.7); color: #fff; background: rgba(255,255,255,0.06); }
        .hero-stats {
            display: flex; gap: 1rem; margin-top: 2.5rem;
            padding: 1.1rem 1.5rem;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            backdrop-filter: blur(12px);
        }
        .hero-stat { text-align: left; padding-right: 1.8rem; margin-right: 0.5rem; border-right: 1px solid rgba(255,255,255,0.12); }
        .hero-stat:last-child { border-right: none; padding-right: 0; margin-right: 0; }
        .hero-stat .num { font-size: 1.85rem; font-weight: 800; color: var(--gold); line-height: 1; }
        .hero-stat .label { font-size: 0.72rem; color: rgba(255,255,255,0.7); text-transform: uppercase; letter-spacing: 1.2px; margin-top: 0.35rem; font-weight: 500; }
        .hero-visual { position: relative; }
        .hero-card-main {
            background: rgba(8, 36, 27, 0.75); backdrop-filter: blur(24px);
            border: 1px solid rgba(223, 190, 126, 0.3); border-radius: 20px;
            padding: 2rem; text-align: center; overflow: hidden;
            box-shadow: 0 25px 60px -15px rgba(0,0,0,0.8);
        }
        .hero-food-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 0.75rem; }
        .hero-food-item {
            background: rgba(255,255,255,0.08); border-radius: 16px; padding: 1rem 0.5rem;
            text-align: center; transition: all 0.3s; cursor: default;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .hero-food-item:hover { background: rgba(255,255,255,0.15); transform: translateY(-3px); }
        .hero-food-item .emoji { font-size: 2rem; display: block; margin-bottom: 0.4rem; }
        .hero-food-item .name { font-size: 0.7rem; color: rgba(255,255,255,0.9); font-weight: 500; }
        .floating-badge-1, .floating-badge-2 {
            position: absolute; background: #fff; border-radius: 12px; padding: 0.6rem 1rem;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            display: flex; align-items: center; gap: 0.5rem; font-size: 0.8rem; font-weight: 600;
            animation: float 3s ease-in-out infinite;
        }
        .floating-badge-1 { top: -20px; left: -30px; color: var(--green-primary); }
        .floating-badge-2 { bottom: -15px; right: -20px; color: var(--orange-primary); animation-delay: 1.5s; }
        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }

        /* ===== SECTION COMMON ===== */
        section { padding: 5.5rem 2rem; }
        .section-inner { max-width: 1320px; margin: 0 auto; }
        .section-header { text-align: center; margin-bottom: 4rem; }
        .section-label {
            display: inline-block;
            background: transparent; color: var(--gold);
            border: 1px solid rgba(156,116,40,0.4);
            padding: 0.3rem 1.1rem; border-radius: 4px;
            font-size: 0.72rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase;
            margin-bottom: 1.25rem;
        }
        .section-title {
            font-size: clamp(1.9rem, 3vw, 2.8rem); font-weight: 700;
            color: var(--navy); line-height: 1.2; margin-bottom: 0.75rem;
            letter-spacing: -0.3px;
        }
        .section-title-line {
            width: 48px; height: 3px; background: var(--gold);
            margin: 1rem auto 1.25rem; border-radius: 2px;
        }
        .section-subtitle { font-size: 0.975rem; color: var(--text-gray); max-width: 560px; margin: 0 auto; line-height: 1.8; }
        .orange-label { color: var(--gold) !important; border-color: rgba(156,116,40,0.4) !important; }

        /* ===== CATEGORIES ===== */
        #products { background: var(--cream); }
        body { background: #fff; }
        .categories-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.75rem; }
        .category-card {
            background: #fff; border-radius: 12px; overflow: hidden;
            box-shadow: 0 2px 16px rgba(14,56,43,0.07); transition: all 0.35s;
            cursor: pointer; text-decoration: none;
            border: 1px solid rgba(14,56,43,0.08);
        }
        .category-card:hover { transform: translateY(-6px); box-shadow: 0 20px 48px rgba(14,56,43,0.14); border-color: var(--gold); }
        .category-card:hover .category-arrow { transform: translateX(4px); }
        .category-img {
            width: 100%; height: 180px;
            background: linear-gradient(135deg, #e8f5ee, #D5CEC2);
            font-size: 4.5rem; display: flex; align-items: center; justify-content: center;
        }
        .category-body { padding: 1.6rem 1.5rem; }
        .category-body h3 { font-size: 1.05rem; font-weight: 700; color: var(--navy); margin-bottom: 0.5rem; letter-spacing: -0.1px; }
        .category-body p { font-size: 0.83rem; color: var(--text-gray); line-height: 1.65; }
        .category-footer { display: flex; align-items: center; justify-content: space-between; margin-top: 1rem; }
        .category-tag {
            display: inline-block;
            background: var(--navy-light); color: var(--navy);
            padding: 0.2rem 0.75rem; border-radius: 4px; font-size: 0.72rem; font-weight: 700; letter-spacing: 0.3px;
        }
        .category-arrow { color: var(--gold); font-size: 1.1rem; transition: transform 0.25s; }
        .cat-rice .category-img { background: linear-gradient(135deg, #fff8e1, #ffecb3); }
        .cat-frozen .category-img { background: linear-gradient(135deg, #E7EEE9, #D5CEC2); }
        .cat-pulses .category-img { background: linear-gradient(135deg, #fce4ec, #f8bbd0); }
        .cat-snacks .category-img { background: linear-gradient(135deg, #fff3e0, #ffe0b2); }
        .cat-grocery .category-img { background: linear-gradient(135deg, #E7EEE9, #D5CEC2); }
        .cat-fish .category-img { background: linear-gradient(135deg, #E7EEE9, #D5CEC2); }

        /* ===== PRODUCTS DETAIL ===== */
        #product-list { background: #F7F5F0; }
        .products-tabs {
            display: flex; gap: 0.5rem; flex-wrap: wrap; justify-content: center;
            margin-bottom: 2.5rem;
        }
        .tab-btn {
            padding: 0.5rem 1.3rem; border-radius: 4px; border: 1.5px solid #D5CEC2;
            background: #fff; font-size: 0.82rem; font-weight: 600; cursor: pointer;
            transition: all 0.2s; color: var(--text-gray); letter-spacing: 0.2px;
        }
        .tab-btn.active, .tab-btn:hover { background: var(--navy); border-color: var(--navy); color: #fff; }
        .products-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; }
        .product-card {
            background: #fff; border-radius: 10px; overflow: hidden;
            border: 1px solid rgba(14,56,43,0.08); transition: all 0.3s;
            box-shadow: 0 2px 10px rgba(14,56,43,0.05);
        }
        .product-card:hover { transform: translateY(-4px); box-shadow: 0 14px 36px rgba(14,56,43,0.12); border-color: rgba(156,116,40,0.4); }
        .product-img {
            height: 150px; width: 100%; display: flex; align-items: center; justify-content: center;
            font-size: 3.2rem;
        }
        .product-info { padding: 1.1rem; border-top: 1px solid rgba(14,56,43,0.05); }
        .product-info h4 { font-size: 0.875rem; font-weight: 700; color: var(--navy); margin-bottom: 0.3rem; }
        .product-info p { font-size: 0.775rem; color: var(--text-gray); line-height: 1.55; }
        .product-badge {
            display: inline-block; margin-top: 0.6rem;
            padding: 0.18rem 0.65rem; border-radius: 3px; font-size: 0.68rem; font-weight: 700; letter-spacing: 0.3px;
        }
        .badge-green { background: var(--navy-light); color: var(--navy); }
        .badge-blue { background: #E7EEE9; color: #0E382B; }
        .badge-orange { background: #fdf4e0; color: #7a5c18; }

        /* ===== FEATURES ===== */
        #why-us { background: linear-gradient(160deg, #08241B 0%, #0E382B 60%, #1C4E3D 100%); }
        .features-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; }
        .feature-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1); border-radius: 10px;
            padding: 2.25rem 1.75rem; text-align: center; transition: all 0.3s;
        }
        .feature-card:hover { background: rgba(156,116,40,0.08); border-color: rgba(156,116,40,0.3); transform: translateY(-4px); }
        .feature-icon {
            width: 60px; height: 60px; border-radius: 10px; margin: 0 auto 1.5rem;
            background: rgba(156,116,40,0.12); border: 1px solid rgba(156,116,40,0.25);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.6rem;
        }
        .feature-card h3 { font-size: 1rem; font-weight: 700; color: #fff; margin-bottom: 0.6rem; letter-spacing: -0.1px; }
        .feature-card p { font-size: 0.83rem; color: rgba(255,255,255,0.6); line-height: 1.7; }
        #why-us .section-label { background: rgba(255,255,255,0.15); color: #fff; }
        #why-us .section-title { color: #fff; }
        #why-us .section-subtitle { color: rgba(255,255,255,0.8); }

        /* ===== STATS ===== */
        #stats { background: var(--navy); padding: 4rem 2rem; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 0; text-align: center; }
        .stat-item {
            padding: 2rem 1rem;
            border-right: 1px solid rgba(255,255,255,0.1);
        }
        .stat-item:last-child { border-right: none; }
        .stat-number {
            font-size: 3.2rem; font-weight: 800; color: #9C7428; line-height: 1;
            margin-bottom: 0.4rem; letter-spacing: -1px;
        }
        .stat-label { font-size: 0.8rem; color: rgba(255,255,255,0.6); font-weight: 500; text-transform: uppercase; letter-spacing: 1px; }
        .stat-divider { width: 36px; height: 2px; background: var(--gold); margin: 0.7rem auto; border-radius: 2px; opacity: 0.6; }

        /* ===== CONTACT ===== */
        #contact { background: var(--cream); }
        .contact-grid { display: grid; grid-template-columns: 1fr 1.2fr; gap: 5rem; align-items: start; }
        .contact-info h2 { font-size: 2rem; font-weight: 700; color: var(--navy); margin-bottom: 1rem; letter-spacing: -0.3px; }
        .contact-info p { color: var(--text-gray); line-height: 1.7; margin-bottom: 2rem; }
        .contact-items { display: flex; flex-direction: column; gap: 1.25rem; }
        .contact-item {
            display: flex; align-items: flex-start; gap: 1rem;
        }
        .contact-item-icon {
            width: 44px; height: 44px; border-radius: 8px; flex-shrink: 0;
            background: #fff; border: 1px solid rgba(14,56,43,0.1);
            box-shadow: 0 2px 8px rgba(14,56,43,0.06);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.15rem;
        }
        .contact-item-text h4 { font-size: 0.9rem; font-weight: 600; color: var(--text-dark); margin-bottom: 0.2rem; }
        .contact-item-text p, .contact-item-text a {
            font-size: 0.875rem; color: var(--text-gray); text-decoration: none;
        }
        .contact-item-text a:hover { color: var(--navy); text-decoration: underline; }
        .contact-form-wrap {
            background: #fff; border-radius: 12px; padding: 2.5rem;
            border: 1px solid rgba(14,56,43,0.1);
            box-shadow: 0 4px 24px rgba(14,56,43,0.06);
        }
        .contact-form-wrap h3 { font-size: 1.3rem; font-weight: 700; color: var(--text-dark); margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1.25rem; }
        .form-group label { display: block; font-size: 0.85rem; font-weight: 600; color: var(--text-dark); margin-bottom: 0.4rem; }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%; padding: 0.75rem 1rem; border-radius: 10px;
            border: 1.5px solid #D5CEC2; background: #fff; font-size: 0.9rem;
            font-family: 'Oswald', sans-serif; transition: border-color 0.2s;
            outline: none; color: var(--text-dark);
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: var(--navy); }
        .form-group textarea { resize: vertical; min-height: 110px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .btn-submit {
            width: 100%; padding: 0.9rem; border-radius: 12px;
            background: var(--navy); color: var(--cream); border: none;
            font-size: 1rem; font-weight: 600; font-family: 'Oswald', sans-serif;
            cursor: pointer; transition: all 0.3s;
        }
        .btn-submit:hover { background: var(--navy-dark); transform: translateY(-1px); }

        /* ===== FOOTER ===== */
        footer {
            background: #0a1120; color: rgba(237,232,220,0.8);
            padding: 3.5rem 2rem 2rem;
        }
        .footer-inner { max-width: 1280px; margin: 0 auto; }
        .footer-grid { display: grid; grid-template-columns: 1.5fr 1fr 1fr 1fr; gap: 3rem; margin-bottom: 3rem; }
        .footer-brand .logo { margin-bottom: 1rem; }
        .footer-brand .logo-text .brand { color: #9C7428; }
        .footer-brand p { font-size: 0.875rem; line-height: 1.7; color: rgba(255,255,255,0.6); }
        .footer-col h4 { font-size: 0.9rem; font-weight: 700; color: #fff; margin-bottom: 1.25rem; letter-spacing: 0.5px; }
        .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 0.6rem; }
        .footer-col ul li a { color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.875rem; transition: color 0.2s; }
        .footer-col ul li a:hover { color: #9C7428; }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.75rem;
            display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;
        }
        .footer-bottom p { font-size: 0.8rem; color: rgba(255,255,255,0.5); }
        .footer-socials { display: flex; gap: 0.75rem; }
        .social-btn {
            width: 36px; height: 36px; border-radius: 8px; background: rgba(255,255,255,0.08);
            display: flex; align-items: center; justify-content: center; text-decoration: none;
            font-size: 0.9rem; color: rgba(255,255,255,0.7); transition: all 0.2s;
        }
        .social-btn:hover { background: var(--gold); color: var(--navy); }

        /* ===== MOBILE NAV ===== */
        .mobile-nav {
            display: none; position: fixed; inset: 0; z-index: 999;
            background: rgba(0,0,0,0.5); backdrop-filter: blur(4px);
        }
        .mobile-nav.open { display: flex; align-items: flex-start; justify-content: flex-end; }
        .mobile-nav-panel {
            background: rgba(250, 248, 245, 0.92);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-left: 1px solid rgba(14, 56, 43, 0.1);
            width: 280px; height: 100vh;
            padding: 5rem 1.5rem 2rem; display: flex; flex-direction: column; gap: 0.5rem;
            box-shadow: -10px 0 50px rgba(14,56,43,0.2);
        }
        .mobile-nav-panel a {
            display: block; padding: 0.75rem 1rem; border-radius: 10px;
            color: var(--navy); text-decoration: none; font-weight: 500; font-size: 1rem;
            transition: all 0.2s;
        }
        .mobile-nav-panel a:hover { background: var(--navy-light); color: var(--navy); }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .categories-grid { grid-template-columns: repeat(2, 1fr); }
            .products-grid { grid-template-columns: repeat(3, 1fr); }
            .features-grid { grid-template-columns: repeat(2, 1fr); }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 2rem; }
        }
        @media (max-width: 768px) {
            .hamburger { display: flex; }
            .nav-links { display: none; }
            .hero-content { grid-template-columns: 1fr; text-align: center; gap: 2.5rem; }
            .hero-actions { justify-content: center; }
            .hero-stats { justify-content: center; }
            .hero-visual { display: none; }
            .categories-grid { grid-template-columns: 1fr; }
            .products-grid { grid-template-columns: repeat(2, 1fr); }
            .features-grid { grid-template-columns: 1fr; }
            .contact-grid { grid-template-columns: 1fr; gap: 2rem; }
            .footer-grid { grid-template-columns: 1fr; gap: 2rem; }
            .form-row { grid-template-columns: 1fr; }
        }
        @media (max-width: 480px) {
            .products-grid { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }

        /* ===== SCROLL ANIMATIONS (Polished & Mobile-Calibrated) ===== */
        .fade-up, .fade-left, .fade-right, .fade-scale {
            opacity: 1; transform: none;
        }
        html.js-motion .fade-up {
            opacity: 0; transform: translateY(8px);
            transition: opacity 0.42s cubic-bezier(.16,1,.3,1), transform 0.42s cubic-bezier(.16,1,.3,1);
            will-change: opacity, transform;
        }
        /* On mobile, prevent horizontal slide that causes layout overflow */
        html.js-motion .fade-left,
        html.js-motion .fade-right {
            opacity: 0; transform: translateY(8px);
            transition: opacity 0.42s cubic-bezier(.16,1,.3,1), transform 0.42s cubic-bezier(.16,1,.3,1);
            will-change: opacity, transform;
        }
        html.js-motion .fade-scale {
            opacity: 0; transform: scale(0.96);
            transition: opacity 0.42s ease, transform 0.42s cubic-bezier(.16,1,.3,1);
        }

        @media(min-width: 1024px) {
            html.js-motion .fade-up {
                transform: translateY(16px);
                transition-duration: 0.54s;
            }
            html.js-motion .fade-left {
                transform: translateX(-16px);
                transition-duration: 0.54s;
            }
            html.js-motion .fade-right {
                transform: translateX(16px);
                transition-duration: 0.54s;
            }
        }

        html.js-motion .fade-up.visible,
        html.js-motion .fade-left.visible,
        html.js-motion .fade-right.visible,
        html.js-motion .fade-scale.visible {
            opacity: 1; transform: none;
        }

        /* Stagger children: fast 40ms on mobile, calibrated on desktop */
        html.js-motion .stagger-children > * {
            opacity: 0; transform: translateY(8px);
            transition: opacity 0.42s cubic-bezier(.16,1,.3,1), transform 0.42s cubic-bezier(.16,1,.3,1);
        }
        html.js-motion .stagger-children.visible > *:nth-child(1) { opacity:1; transform:none; transition-delay:0s; }
        html.js-motion .stagger-children.visible > *:nth-child(2) { opacity:1; transform:none; transition-delay:.04s; }
        html.js-motion .stagger-children.visible > *:nth-child(3) { opacity:1; transform:none; transition-delay:.08s; }
        html.js-motion .stagger-children.visible > *:nth-child(4) { opacity:1; transform:none; transition-delay:.12s; }
        html.js-motion .stagger-children.visible > *:nth-child(5) { opacity:1; transform:none; transition-delay:.16s; }
        html.js-motion .stagger-children.visible > *:nth-child(6) { opacity:1; transform:none; transition-delay:.20s; }

        @media(min-width: 1024px) {
            html.js-motion .stagger-children > * { transform: translateY(16px); transition-duration: 0.52s; }
            html.js-motion .stagger-children.visible > *:nth-child(2) { transition-delay:.08s; }
            html.js-motion .stagger-children.visible > *:nth-child(3) { transition-delay:.16s; }
            html.js-motion .stagger-children.visible > *:nth-child(4) { transition-delay:.24s; }
            html.js-motion .stagger-children.visible > *:nth-child(5) { transition-delay:.32s; }
            html.js-motion .stagger-children.visible > *:nth-child(6) { transition-delay:.40s; }
        }

        /* ===== HERO ENTRANCE ANIMATIONS ===== */
        .hero-badge    { animation: heroFadeDown 0.5s cubic-bezier(.16,1,.3,1) 0.1s both; }
        .hero-title    { animation: heroFadeUp   0.55s cubic-bezier(.16,1,.3,1) 0.22s both; }
        .hero-subtitle { animation: heroFadeUp   0.5s cubic-bezier(.16,1,.3,1) 0.35s both; }
        .hero-actions  { animation: heroFadeUp   0.5s cubic-bezier(.16,1,.3,1) 0.45s both; }
        .hero-stats    { animation: heroFadeUp   0.5s cubic-bezier(.16,1,.3,1) 0.55s both; }
        .hero-visual   { animation: heroFadeUp   0.6s cubic-bezier(.16,1,.3,1) 0.25s both; }

        @keyframes heroFadeDown  { from { opacity:0; transform:translateY(-10px); } to { opacity:1; transform:none; } }
        @keyframes heroFadeUp    { from { opacity:0; transform:translateY(12px);  } to { opacity:1; transform:none; } }
        @media(min-width: 1024px) {
            @keyframes heroFadeUp { from { opacity:0; transform:translateY(18px); } to { opacity:1; transform:none; } }
            .hero-visual { animation-name: heroFadeLeft; }
            @keyframes heroFadeLeft { from { opacity:0; transform:translateX(20px); } to { opacity:1; transform:none; } }
        }

        /* ===== SHIMMER on CTA button ===== */
        .btn-primary { position: relative; overflow: hidden; }
        .btn-primary::after {
            content: ''; position: absolute;
            top: 0; left: -100%; width: 60%; height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.35), transparent);
            transform: skewX(-20deg);
            animation: shimmerBtn 3s ease-in-out 1.5s infinite;
        }
        @keyframes shimmerBtn {
            0%,100% { left: -100%; }
            50%      { left: 160%; }
        }

        /* ===== HERO CARD FLOAT ===== */
        .hero-card-main { animation: floatCard 4s ease-in-out infinite; }
        @keyframes floatCard {
            0%,100% { transform: translateY(0px) rotate(0deg); }
            33%      { transform: translateY(-8px) rotate(0.4deg); }
            66%      { transform: translateY(-4px) rotate(-0.3deg); }
        }

        /* ===== ORB DRIFT ===== */
        .hero-orb-1 { animation: orbDrift1 12s ease-in-out infinite; }
        .hero-orb-2 { animation: orbDrift2 15s ease-in-out infinite; }
        .hero-orb-3 { animation: orbDrift3 10s ease-in-out infinite; }
        @keyframes orbDrift1 { 0%,100%{transform:translate(0,0) scale(1);}50%{transform:translate(-40px,30px) scale(1.1);} }
        @keyframes orbDrift2 { 0%,100%{transform:translate(0,0) scale(1);}50%{transform:translate(30px,-25px) scale(0.9);} }
        @keyframes orbDrift3 { 0%,100%{transform:translate(0,0) scale(1);}50%{transform:translate(20px,20px) scale(1.15);} }

        /* ===== HERO FOOD GRID STAGGER ===== */
        .hero-food-item:nth-child(1) { animation: foodPop 0.5s cubic-bezier(.34,1.56,.64,1) 1.0s both; }
        .hero-food-item:nth-child(2) { animation: foodPop 0.5s cubic-bezier(.34,1.56,.64,1) 1.1s both; }
        .hero-food-item:nth-child(3) { animation: foodPop 0.5s cubic-bezier(.34,1.56,.64,1) 1.2s both; }
        .hero-food-item:nth-child(4) { animation: foodPop 0.5s cubic-bezier(.34,1.56,.64,1) 1.3s both; }
        .hero-food-item:nth-child(5) { animation: foodPop 0.5s cubic-bezier(.34,1.56,.64,1) 1.4s both; }
        .hero-food-item:nth-child(6) { animation: foodPop 0.5s cubic-bezier(.34,1.56,.64,1) 1.5s both; }
        @keyframes foodPop { from{opacity:0;transform:scale(0.6) translateY(10px);} to{opacity:1;transform:none;} }

        /* ===== SECTION TITLE LINE REVEAL ===== */
        .section-title-line {
            width: 0; height: 3px; background: var(--gold);
            margin: 1rem auto 1.25rem; border-radius: 2px;
            transition: width 0.8s cubic-bezier(.22,1,.36,1) 0.3s;
        }
        .visible .section-title-line, .section-header.visible .section-title-line { width: 48px; }

        /* ===== GOLD GLOW PULSE on stat numbers ===== */
        .stat-number { animation: goldPulse 3s ease-in-out infinite; }
        @keyframes goldPulse {
            0%,100% { text-shadow: 0 0 0px transparent; }
            50%      { text-shadow: 0 0 20px rgba(156,116,40,0.5); }
        }

        /* ===== FEATURE CARD ICON SPIN-HOVER ===== */
        .feature-card:hover .feature-icon { animation: iconBounce 0.5s cubic-bezier(.34,1.56,.64,1); }
        @keyframes iconBounce { 0%{transform:scale(1);} 40%{transform:scale(1.25) rotate(-5deg);} 100%{transform:scale(1) rotate(0);} }

        /* ===== CATEGORY CARD EMOJI FLOAT HOVER ===== */
        .category-card:hover .category-img { animation: emojiFloat 0.6s ease-in-out; }
        @keyframes emojiFloat { 0%,100%{transform:translateY(0);} 40%{transform:translateY(-10px);} }

        /* ===== PRODUCT CARD HOVER GLOW ===== */
        .product-card { position: relative; }
        .product-card::before {
            content:''; position:absolute; inset:0; border-radius:10px; z-index:0;
            background: linear-gradient(135deg, rgba(156,116,40,0.0), rgba(156,116,40,0.0));
            transition: background 0.4s ease;
        }
        .product-card:hover::before { background: linear-gradient(135deg, rgba(156,116,40,0.05), rgba(14,56,43,0.03)); }

        /* ===== LOGO HOVER SCALE ===== */
        .logo-img { transition: transform 0.3s cubic-bezier(.34,1.56,.64,1); }
        .logo:hover .logo-img { transform: scale(1.06); }

        /* ===== NAV LINK UNDERLINE SLIDE ===== */
        .nav-links li:not(:last-child) a { position: relative; }
        .nav-links li:not(:last-child) a::after {
            content:''; position:absolute; bottom:2px; left:50%; right:50%;
            height:2px; background:var(--gold); border-radius:2px;
            transition: left 0.25s ease, right 0.25s ease;
        }
        .nav-links li:not(:last-child) a:hover::after { left:10%; right:10%; }

        /* ===== FLOATING BADGES ENTRANCE ===== */
        .floating-badge-1 { animation: float 3s ease-in-out infinite, badgeIn 0.7s cubic-bezier(.34,1.56,.64,1) 1.2s both; }
        .floating-badge-2 { animation: float 3s ease-in-out 1.5s infinite, badgeIn 0.7s cubic-bezier(.34,1.56,.64,1) 1.5s both; }
        @keyframes badgeIn { from{opacity:0;transform:scale(0.6);} to{opacity:1;transform:scale(1);} }
        @keyframes float   { 0%,100%{transform:translateY(0);} 50%{transform:translateY(-8px);} }

        /* ===== HERO BG GRADIENT SHIFT ===== */
        .hero { background-size: 200% 200%; animation: gradientShift 12s ease infinite; }
        @keyframes gradientShift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* ===== TAB BUTTON RIPPLE ===== */
        .tab-btn { position: relative; overflow: hidden; }
        .tab-btn .ripple {
            position:absolute; border-radius:50%;
            background:rgba(255,255,255,0.3); transform:scale(0);
            animation: rippleEffect 0.5s linear; pointer-events:none;
        }
        @keyframes rippleEffect { to { transform:scale(4); opacity:0; } }

        /* ===== SCROLL PROGRESS BAR ===== */
        #scroll-progress {
            position: fixed; top: 0; left: 0; height: 3px; width: 0%;
            background: linear-gradient(90deg, var(--gold), #DFBE7E);
            z-index: 9999; transition: width 0.1s linear;
            box-shadow: 0 0 8px rgba(156,116,40,0.6);
        }

        /* ===== SECTION PARTICLES ===== */
        .hero-particles { position:absolute; inset:0; overflow:hidden; pointer-events:none; z-index:0; }
        .particle {
            position:absolute; border-radius:50%;
            background: rgba(156,116,40,0.4);
            animation: particleRise linear infinite;
        }
        @keyframes particleRise {
            0%   { transform:translateY(100vh) scale(0); opacity:0; }
            10%  { opacity:1; }
            90%  { opacity:0.6; }
            100% { transform:translateY(-100px) scale(1); opacity:0; }
        }

        /* ===== CONTACT FORM INPUT ANIMATION ===== */
        .form-group input, .form-group select, .form-group textarea {
            transition: border-color 0.25s, box-shadow 0.25s, transform 0.2s;
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: var(--navy); box-shadow: 0 0 0 3px rgba(14,56,43,0.08);
            transform: translateY(-1px);
        }

        /* ===== FOOTER LINK HOVER ===== */
        .footer-col ul li a { display:inline-block; transition: color 0.2s, transform 0.2s; }
        .footer-col ul li a:hover { color: #9C7428; transform: translateX(4px); }

        /* ===== SECTION DIVIDER WAVE ===== */
        .wave-divider { line-height:0; overflow:hidden; }
        .wave-divider svg { display:block; width:100%; }

        /* =========================================
           NEW HIGH-IMPACT ANIMATIONS
        ========================================= */

        /* ── Preloader ── */
        #preloader {
            position:fixed; inset:0; z-index:99999;
            background:#0d1520;
            display:flex; flex-direction:column; align-items:center; justify-content:center;
            transition: opacity 0.6s ease, visibility 0.6s ease;
        }
        #preloader.hide { opacity:0; visibility:hidden; }
        .preloader-logo {
            height:80px; width:auto;
            filter: brightness(0) invert(1);
            animation: preloaderPulse 1.4s ease-in-out infinite;
        }
        .preloader-bar-wrap {
            width:200px; height:2px; background:rgba(255,255,255,0.1);
            border-radius:2px; margin-top:2rem; overflow:hidden;
        }
        .preloader-bar {
            height:100%; width:0%; background:linear-gradient(90deg,var(--gold),#DFBE7E);
            border-radius:2px; animation:preloaderFill 1.4s cubic-bezier(.4,0,.2,1) forwards;
        }
        @keyframes preloaderPulse { 0%,100%{opacity:.6;transform:scale(0.95);} 50%{opacity:1;transform:scale(1);} }
        @keyframes preloaderFill  { from{width:0%} to{width:100%} }

        /* ── Custom cursor ── */
        #cursor-dot  {
            width:8px; height:8px; background:var(--gold); border-radius:50%;
            position:fixed; pointer-events:none; z-index:99998;
            transform:translate(-50%,-50%); transition:transform 0.1s ease;
        }
        #cursor-ring {
            width:36px; height:36px; border:1.5px solid rgba(156,116,40,0.6);
            border-radius:50%; position:fixed; pointer-events:none; z-index:99997;
            transform:translate(-50%,-50%);
            transition:width .3s ease,height .3s ease,border-color .3s ease,transform .12s ease;
        }
        body:has(a:hover) #cursor-ring,
        body:has(button:hover) #cursor-ring {
            width:52px; height:52px; border-color:var(--gold);
        }
        @media(hover:none){ #cursor-dot,#cursor-ring{display:none;} }

        /* ── Hero spotlight ── */
        .hero-spotlight {
            position:absolute; inset:0; pointer-events:none; z-index:1;
            background: radial-gradient(circle 300px at 50% 50%, rgba(156,116,40,0.08) 0%, transparent 70%);
            transition: background 0.05s linear;
        }

        /* ── Word-split hero title (descender-safe & responsive) ── */
        .split-word {
            display:inline-block; overflow:hidden; vertical-align:bottom;
            padding-bottom: 0.14em; margin-bottom: -0.14em;
            line-height: inherit;
        }
        .split-word span {
            display:inline-block;
            transform:translateY(105%);
            opacity:0;
            transition: transform 0.48s cubic-bezier(.16,1,.3,1), opacity 0.48s cubic-bezier(.16,1,.3,1);
            will-change: transform, opacity;
        }
        .hero-title.is-active .split-word span {
            transform:translateY(0);
            opacity:1;
        }
        .hero-title.is-active .split-word:nth-child(1) span { transition-delay:.12s; }
        .hero-title.is-active .split-word:nth-child(2) span { transition-delay:.18s; }
        .hero-title.is-active .split-word:nth-child(3) span { transition-delay:.24s; }
        .hero-title.is-active .split-word:nth-child(4) span { transition-delay:.30s; }
        .hero-title.is-active .split-word:nth-child(5) span { transition-delay:.36s; }
        .hero-title.is-active .split-word:nth-child(6) span { transition-delay:.42s; }
        .hero-title.is-active .split-word:nth-child(7) span { transition-delay:.48s; }
        .hero-title.is-active .split-word:nth-child(8) span { transition-delay:.54s; }

        @media(min-width: 1024px) {
            .split-word span {
                transition-duration: 0.58s;
            }
            .hero-title.is-active .split-word:nth-child(1) span { transition-delay:.18s; }
            .hero-title.is-active .split-word:nth-child(2) span { transition-delay:.26s; }
            .hero-title.is-active .split-word:nth-child(3) span { transition-delay:.34s; }
            .hero-title.is-active .split-word:nth-child(4) span { transition-delay:.42s; }
            .hero-title.is-active .split-word:nth-child(5) span { transition-delay:.50s; }
            .hero-title.is-active .split-word:nth-child(6) span { transition-delay:.58s; }
            .hero-title.is-active .split-word:nth-child(7) span { transition-delay:.66s; }
            .hero-title.is-active .split-word:nth-child(8) span { transition-delay:.74s; }
        }
        @keyframes wordReveal {
            from { transform:translateY(105%); opacity:0; }
            to   { transform:translateY(0);    opacity:1; }
        }

        /* ── Typewriter cursor ── */
        .typewriter-cursor {
            display:inline-block; width:2px; height:1em;
            background:rgba(255,255,255,0.7); margin-left:2px;
            vertical-align:text-bottom;
            animation:blink 1s step-end infinite;
        }
        @keyframes blink { 0%,100%{opacity:1;} 50%{opacity:0;} }

        /* ── Section title reveal (Restrained upward fade, no awkward text clipping) ── */
        .reveal-title {
            opacity: 0;
            transform: translateY(8px);
            transition: opacity 0.42s cubic-bezier(.16,1,.3,1), transform 0.42s cubic-bezier(.16,1,.3,1);
            will-change: opacity, transform;
        }
        .section-header.visible .reveal-title {
            opacity: 1;
            transform: translateY(0);
        }
        @media(min-width: 1024px) {
            .reveal-title {
                transform: translateY(14px);
                transition-duration: 0.54s;
            }
        }

        /* Strict accessibility & reduced motion */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
            .fade-up, .fade-left, .fade-right, .fade-scale,
            .stagger-children > *,
            .hero-badge, .hero-title, .hero-subtitle, .hero-actions, .hero-stats, .hero-visual,
            .split-word span, .reveal-title {
                opacity: 1 !important;
                transform: none !important;
                animation: none !important;
                transition: none !important;
            }
            .typewriter-cursor { display: none !important; }
        }

        /* ── Marquee ticker ── */
        .marquee-strip {
            background: var(--navy); overflow:hidden; padding:.75rem 0;
            border-top:1px solid rgba(156,116,40,0.2);
            border-bottom:1px solid rgba(156,116,40,0.2);
        }
        .marquee-track {
            display:flex; gap:0; width:max-content;
            animation: marqueeScroll 28s linear infinite;
        }
        .marquee-track:hover { animation-play-state:paused; }
        .marquee-item {
            white-space:nowrap; padding:0 2rem;
            font-size:.78rem; font-weight:700; letter-spacing:2px; text-transform:uppercase;
            color:rgba(255,255,255,0.7);
            display:flex; align-items:center; gap:.75rem;
        }
        .marquee-item .dot { width:5px; height:5px; background:var(--gold); border-radius:50%; flex-shrink:0; }
        @keyframes marqueeScroll { from{transform:translateX(0);} to{transform:translateX(-50%);} }

        /* ── 3D card tilt ── */
        .tilt-card { transform-style:preserve-3d; transition:transform 0.08s linear, box-shadow 0.3s ease; }
        .tilt-card .tilt-shine {
            position:absolute; inset:0; border-radius:inherit; pointer-events:none;
            background:radial-gradient(circle at 50% 50%, rgba(255,255,255,0.08) 0%, transparent 60%);
            opacity:0; transition:opacity .3s;
        }
        .tilt-card:hover .tilt-shine { opacity:1; }

        /* ── Magnetic button ── */
        .mag-btn { transition:transform .3s cubic-bezier(.34,1.56,.64,1), box-shadow .3s ease; }

        /* ── Section parallax layers ── */
        .parallax-slow  { will-change:transform; }
        .parallax-medium{ will-change:transform; }

        /* ── Glowing card border on hover (keyframe) ── */
        .category-card:hover {
            box-shadow:0 20px 48px rgba(14,56,43,0.14), 0 0 0 1px rgba(156,116,40,0.5),
                       0 0 20px rgba(156,116,40,0.12) !important;
        }

        /* ── Scroll-reveal: slide up with blur ── */
        .blur-up {
            opacity:0; transform:translateY(24px); filter:blur(8px);
            transition:opacity .7s ease, transform .7s cubic-bezier(.22,1,.36,1), filter .7s ease;
        }
        .blur-up.visible { opacity:1; transform:none; filter:blur(0); }

        /* ── Number scramble flash ── */
        @keyframes scrambleFlash { 0%,100%{color:#9C7428;} 50%{color:#fff;} }
        .stat-number.counting { animation:scrambleFlash .08s linear infinite; }

        /* ── Gradient text on section title ── */
        .gradient-text {
            background: linear-gradient(135deg, var(--navy) 0%, #1C4E3D 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ── Animated underline on contact links ── */
        .contact-item-text a {
            position:relative; display:inline-block;
        }
        .contact-item-text a::after {
            content:''; position:absolute; bottom:-1px; left:0; width:0; height:1px;
            background:var(--navy); transition:width .3s ease;
        }
        .contact-item-text a:hover::after { width:100%; }

        /* ── Hero badge shimmer ── */
        .hero-badge { position:relative; overflow:hidden; }
        .hero-badge::before {
            content:''; position:absolute; top:0; left:-100%; width:50%; height:100%;
            background:linear-gradient(90deg,transparent,rgba(156,116,40,0.3),transparent);
            animation:badgeShimmer 3s ease-in-out 2s infinite;
        }
        @keyframes badgeShimmer { 0%{left:-100%;} 100%{left:200%;} }

        /* ── Scroll-triggered line draw (SVG underline) ── */
        .svg-underline { display:block; width:0; overflow:hidden; transition:width .8s cubic-bezier(.22,1,.36,1) .4s; }
        .section-header.visible .svg-underline { width:100%; }
    </style>
</head>
<body>
@if($seoGtmId)
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $seoGtmId }}"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
@endif

<!-- Preloader (Polished Brand Experience) -->
@include('components.home-loader')

<!-- Custom cursor -->
<div id="cursor-dot"></div>
<div id="cursor-ring"></div>

<!-- Scroll progress bar -->
<div id="scroll-progress"></div>

<!-- ========== NAVBAR ========== -->
<nav class="navbar" id="navbar">
    <div class="navbar-inner">
        <a href="#" class="logo">
            <img src="{{ asset('primary-logo.png') }}" alt="Meral Group" class="logo-img">
        </a>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#product-list">Our Range</a></li>
            <li><a href="#why-us">About</a></li>
            <li><a href="#contact" class="nav-cta">Contact Us</a></li>
        </ul>
        <button class="hamburger" id="hamburger" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- Mobile Nav -->
<div class="mobile-nav" id="mobileNav" onclick="closeMobileNav(event)">
    <div class="mobile-nav-panel">
        <a href="#home" onclick="closeMobileNav()">Home</a>
        <a href="#products" onclick="closeMobileNav()">Products</a>
        <a href="#product-list" onclick="closeMobileNav()">Our Range</a>
        <a href="#why-us" onclick="closeMobileNav()">About Us</a>
        <a href="#contact" onclick="closeMobileNav()">Contact Us</a>
    </div>
</div>

<!-- ========== HERO ========== -->
<section class="hero" id="home">
    <!-- Responsive Maritime Cargo Ship Background (Desktop: hero-desktop.jpeg, Mobile: hero-mobile.jpeg) -->
    <picture class="hero-bg-picture">
        <source media="(max-width: 1023px)" srcset="{{ asset('images/hero-mobile.jpeg') }}">
        <img
            src="{{ asset('images/hero-desktop.jpeg') }}"
            alt="Global maritime container cargo logistics"
            class="hero-bg-img"
            loading="eager"
            fetchpriority="high"
        >
    </picture>
    <div class="hero-bg-overlay" aria-hidden="true"></div>
    <div class="hero-particles" id="heroParticles"></div>
    <div class="hero-spotlight" id="heroSpotlight"></div>
    <div class="hero-orb-1"></div>
    <div class="hero-orb-2"></div>
    <div class="hero-orb-3"></div>
    <div class="hero-content">
        <div class="hero-text">
            <div class="hero-badge">
                <span></span>
                {{ $hero->badge_text ?? 'Trusted Worldwide Food Exporter' }}
            </div>
            <h1 class="hero-title" style="overflow:visible;">
                <span class="split-word"><span>{{ $hero->title_line1 ?? 'Delivering' }}</span></span>&nbsp;
                <span class="split-word"><span style="color:#9C7428;">{{ $hero->title_highlight ?? 'Premium' }}</span></span><br>
                @foreach(explode(' ', $hero->title_line2 ?? 'Quality Food') as $word)
                <span class="split-word"><span>{{ $word }}</span></span>&nbsp;
                @endforeach
                <br>
                @foreach(explode(' ', $hero->title_line3 ?? 'Across the Globe') as $word)
                <span class="split-word"><span>{{ $word }}</span></span>&nbsp;
                @endforeach
            </h1>
            <div class="hero-actions">
                <a href="#products" class="btn-primary mag-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
                    {{ $hero->btn_primary_text ?? 'Explore Products' }}
                </a>
                <a href="#contact" class="btn-secondary mag-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8 19.79 19.79 0 01.01 2.23 2 2 0 012 .04h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92v2z"/></svg>
                    {{ $hero->btn_secondary_text ?? 'Get in Touch' }}
                </a>
            </div>
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="num">{{ $hero->stat1_number ?? '500' }}+</div>
                    <div class="label">{{ $hero->stat1_label ?? 'Products' }}</div>
                </div>
                <div class="hero-stat">
                    <div class="num">{{ $hero->stat2_number ?? '30' }}+</div>
                    <div class="label">{{ $hero->stat2_label ?? 'Countries' }}</div>
                </div>
                <div class="hero-stat">
                    <div class="num">{{ $hero->stat3_number ?? '15' }}+</div>
                    <div class="label">{{ $hero->stat3_label ?? 'Years Exp.' }}</div>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div style="position: relative;">
                <div class="floating-badge-1">
                    <span style="font-size:1.2rem;">✅</span> ISO Certified
                </div>
                <div class="hero-card-main">
                    <div style="color:rgba(255,255,255,0.7); font-size:0.8rem; font-weight:600; letter-spacing:1px; text-transform:uppercase; margin-bottom:1rem;">Our Product Range</div>
                    <div class="hero-food-grid">
                        <div class="hero-food-item">
                            <span class="emoji">🌾</span>
                            <span class="name">Basmati Rice</span>
                        </div>
                        <div class="hero-food-item">
                            <span class="emoji">🍣</span>
                            <span class="name">Fresh Fish</span>
                        </div>
                        <div class="hero-food-item">
                            <span class="emoji">🧊</span>
                            <span class="name">Frozen Foods</span>
                        </div>
                        <div class="hero-food-item">
                            <span class="emoji">🫘</span>
                            <span class="name">Pulses</span>
                        </div>
                        <div class="hero-food-item">
                            <span class="emoji">🍟</span>
                            <span class="name">Snacks</span>
                        </div>
                        <div class="hero-food-item">
                            <span class="emoji">🛒</span>
                            <span class="name">Groceries</span>
                        </div>
                    </div>
                </div>
                <div class="floating-badge-2">
                    <span style="font-size:1.2rem;">🚢</span> Global Shipping
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Wave divider -->
<div class="wave-divider" style="background:#0E382B; margin-top:-2px;">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" height="60" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,0 C360,60 1080,0 1440,50 L1440,0 Z" fill="#FAF8F5"/>
    </svg>
</div>

<!-- ========== MARQUEE TICKER ========== -->
<div class="marquee-strip">
    <div class="marquee-track" id="marqueeTrack">
        @foreach($products as $p)
        <div class="marquee-item"><span class="dot"></span> {{ $p->emoji }} {{ $p->name }}</div>
        @endforeach
        {{-- Duplicate for seamless loop --}}
        @foreach($products as $p)
        <div class="marquee-item"><span class="dot"></span> {{ $p->emoji }} {{ $p->name }}</div>
        @endforeach
    </div>
</div>

<!-- ========== PRODUCT CATEGORIES ========== -->
<section id="products">
    <div class="section-inner">
        <div class="section-header fade-up">
            <span class="section-label">Our Categories</span>
            <h2 class="section-title">{{ $settings['categories_section_title'] ?? 'Explore Our Product Range' }}</h2>
            <div class="section-title-line"></div>
            <p class="section-subtitle">{{ $settings['categories_section_subtitle'] ?? 'We offer a wide range of premium food products, carefully sourced and quality-checked for global export standards.' }}</p>
        </div>
        <div class="categories-grid stagger-children">
            @foreach($categories as $cat)
            <a href="#product-list" class="category-card tilt-card" style="text-decoration:none; position:relative;" data-cat-slug="{{ $cat->slug }}">
                <div class="tilt-shine"></div>
                <div class="category-img">{{ $cat->emoji }}</div>
                <div class="category-body">
                    <h3>{{ $cat->name }}</h3>
                    <p>{{ $cat->description }}</p>
                    <div class="category-footer">
                        <span class="category-tag">{{ $cat->tag_label }}</span>
                        <span class="category-arrow">→</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Wave divider -->
<div class="wave-divider" style="background:#FAF8F5; margin-top:-2px;">
    <svg viewBox="0 0 1440 50" preserveAspectRatio="none" height="50" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,50 C480,0 960,50 1440,10 L1440,50 Z" fill="#F7F5F0"/>
    </svg>
</div>

<!-- ========== PRODUCT LIST ========== -->
<section id="product-list">
    <div class="section-inner">
        <div class="section-header fade-up">
            <span class="section-label orange-label">Featured Products</span>
            <h2 class="section-title">{{ $settings['products_section_title'] ?? 'Quality You Can Trust' }}</h2>
            <div class="section-title-line"></div>
            <p class="section-subtitle">{{ $settings['products_section_subtitle'] ?? 'Handpicked products that meet international food safety and quality standards — FSSAI certified, HACCP compliant.' }}</p>
        </div>

        <div class="products-tabs">
            <button class="tab-btn active" onclick="filterProducts('all', this)">All Products</button>
            @foreach($categories as $cat)
            <button class="tab-btn" onclick="filterProducts('{{ $cat->slug }}', this)">{{ $cat->emoji }} {{ $cat->name }}</button>
            @endforeach
        </div>

        <div class="products-grid" id="productsGrid">
            @foreach($products as $product)
            <div class="product-card" data-cat="{{ $product->category->slug ?? '' }}">
                <div class="product-img" style="background:linear-gradient(135deg,{{ $product->bg_from }},{{ $product->bg_to }});">{{ $product->emoji }}</div>
                <div class="product-info">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <span class="product-badge badge-{{ $product->badge_type }}">{{ $product->badge_text }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========== WHY CHOOSE US ========== -->
<section id="why-us">
    <div class="section-inner">
        <div class="section-header fade-up">
            <span class="section-label" style="border-color:rgba(156,116,40,0.5); color:#9C7428;">Why Choose Us</span>
            <h2 class="section-title" style="color:#fff;">{{ $settings['whyus_section_title'] ?? 'Our Promise to You' }}</h2>
            <div class="section-title-line"></div>
            <p class="section-subtitle" style="color:rgba(255,255,255,0.65);">{{ $settings['whyus_section_subtitle'] ?? 'We uphold the highest standards in sourcing, processing and delivering premium food products worldwide.' }}</p>
        </div>
        <div class="features-grid stagger-children">
            @foreach($features as $feature)
            <div class="feature-card fade-up">
                <div class="feature-icon">{{ $feature->icon }}</div>
                <h3>{{ $feature->title }}</h3>
                <p>{{ $feature->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========== STATS ========== -->
<section id="stats">
    <div class="section-inner">
        <div class="stats-grid stagger-children">
            @foreach($stats as $stat)
            <div class="stat-item">
                <div class="stat-number" data-value="{{ $stat->value }}" data-suffix="{{ $stat->suffix }}">0{{ $stat->suffix }}</div>
                <div class="stat-divider"></div>
                <div class="stat-label">{{ $stat->label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========== CONTACT ========== -->
<section id="contact">
    <div class="section-inner">
        <div class="contact-grid">
            <div class="contact-info fade-up">
                <span class="section-label" style="margin-bottom:1.25rem; display:inline-block;">Get in Touch</span>
                <h2>{{ $settings['contact_section_title'] ?? 'Ready to Start Exporting?' }}</h2>
                <p>{{ $settings['contact_section_subtitle'] ?? 'Contact our team for product inquiries, bulk orders, export documentation and shipping quotes.' }}</p>

                <div class="contact-items">
                    <div class="contact-item">
                        <div class="contact-item-icon">📍</div>
                        <div class="contact-item-text">
                            <h4>Office Address</h4>
                            <p>{{ $settings['address'] ?? 'Meral Exports Pvt. Ltd., Cochin, Kerala, India' }}</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">📞</div>
                        <div class="contact-item-text">
                            <h4>Phone / WhatsApp</h4>
                            <a href="tel:{{ preg_replace('/\s+/', '', $settings['phone1'] ?? '') }}">{{ $settings['phone1'] ?? '+91 98765 43210' }}</a><br>
                            <a href="tel:{{ preg_replace('/\s+/', '', $settings['phone2'] ?? '') }}">{{ $settings['phone2'] ?? '+91 98765 43211' }}</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">✉️</div>
                        <div class="contact-item-text">
                            <h4>Email Us</h4>
                            <a href="mailto:{{ $settings['email1'] ?? 'info@meralexports.com' }}">{{ $settings['email1'] ?? 'info@meralexports.com' }}</a><br>
                            <a href="mailto:{{ $settings['email2'] ?? 'sales@meralexports.com' }}">{{ $settings['email2'] ?? 'sales@meralexports.com' }}</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">🕐</div>
                        <div class="contact-item-text">
                            <h4>Working Hours</h4>
                            <p>{{ $settings['working_hours'] ?? 'Monday – Saturday: 9:00 AM – 6:00 PM' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrap fade-up">
                <h3>Send Us an Inquiry</h3>
                <form onsubmit="handleSubmit(event)">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" placeholder="Your full name" required>
                        </div>
                        <div class="form-group">
                            <label for="company">Company Name</label>
                            <input type="text" id="company" placeholder="Your company">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" placeholder="your@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" placeholder="+1 234 567 8900">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product">Product Category *</label>
                        <select id="product" required>
                            <option value="">Select a category...</option>
                            @foreach($categories as $cat)
                            <option>{{ $cat->name }}</option>
                            @endforeach
                            <option>Multiple Categories</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message / Inquiry *</label>
                        <textarea id="message" placeholder="Tell us about your requirements — product name, quantity, destination country, etc." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">
                        Send Inquiry →
                    </button>
                    <p id="form-success" style="display:none; color:var(--navy); text-align:center; margin-top:1rem; font-weight:600;">
                        ✅ Thank you! We'll get back to you within 24 hours.
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ========== FOOTER ========== -->
<footer>
    <div class="footer-inner">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="#" class="logo" style="margin-bottom:1.25rem; display:inline-flex;">
                    <img src="{{ asset('secondary-logo.png') }}" alt="{{ $companyName ?? 'Meral Exports & Imports Pvt Ltd' }}" class="logo-img" style="height:48px; width:auto; object-fit:contain;">
                </a>
                <p>{{ $settings['footer_tagline'] ?? 'Your trusted partner for premium quality food exports. From Kerala to the world — delivering freshness, quality and taste in every shipment.' }}</p>
            </div>
            <div class="footer-col">
                <h4>Products</h4>
                <ul>
                    @foreach($categories as $cat)
                    <li><a href="#product-list">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="#why-us">About Us</a></li>
                    <li><a href="#why-us">Why Choose Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#">Export Services</a></li>
                    <li><a href="#">Certifications</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact Info</h4>
                <ul>
                    <li><a href="tel:{{ preg_replace('/\s+/', '', $settings['phone1'] ?? '') }}">📞 {{ $settings['phone1'] ?? '+91 98765 43210' }}</a></li>
                    <li><a href="mailto:{{ $settings['email1'] ?? 'info@meralexports.com' }}">✉️ {{ $settings['email1'] ?? 'info@meralexports.com' }}</a></li>
                    <li><a href="#">📍 {{ Str::before($settings['address'] ?? 'Cochin, Kerala, India', ',') }}</a></li>
                    <li><a href="#">🕐 {{ $settings['working_hours'] ?? 'Mon–Sat: 9AM – 6PM' }}</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} {{ $settings['company_name'] ?? 'Meral Exports Pvt. Ltd.' }}. All rights reserved.</p>
            <div class="footer-socials">
                <a href="{{ $settings['whatsapp_url'] ?? '#' }}" class="social-btn" title="WhatsApp">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </a>
                <a href="{{ $settings['facebook_url'] ?? '#' }}" class="social-btn" title="Facebook">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="{{ $settings['instagram_url'] ?? '#' }}" class="social-btn" title="Instagram">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>

<script>
/* ============================================================
   MERAL EXPORTS — Full Animation Engine
============================================================ */

/* ── Preloader ── */
window.addEventListener('load', () => {
    setTimeout(() => {
        const pl = document.getElementById('preloader');
        if (pl) pl.classList.add('hide');
    }, 1500);
});

/* ── Custom cursor ── */
const dot  = document.getElementById('cursor-dot');
const ring = document.getElementById('cursor-ring');
let mx = window.innerWidth/2, my = window.innerHeight/2;
let rx = mx, ry = my;
document.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });
(function cursorLoop() {
    rx += (mx - rx) * 0.18;
    ry += (my - ry) * 0.18;
    if (dot)  { dot.style.left  = mx+'px'; dot.style.top  = my+'px'; }
    if (ring) { ring.style.left = rx+'px'; ring.style.top = ry+'px'; }
    requestAnimationFrame(cursorLoop);
})();

/* ── Mobile nav (Animates to cross on open) ── */
const hamburger = document.getElementById('hamburger');
const mobileNav = document.getElementById('mobileNav');
if (hamburger && mobileNav) {
    hamburger.addEventListener('click', () => {
        const isOpen = mobileNav.classList.toggle('open');
        hamburger.classList.toggle('open', isOpen);
    });
}
function closeMobileNav(e) {
    if (!e || e.target === mobileNav || e.target.tagName === 'A') {
        if (mobileNav) mobileNav.classList.remove('open');
        if (hamburger) hamburger.classList.remove('open');
    }
}

/* ── Smooth scroll ── */
document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', function(e) {
        const t = document.querySelector(this.getAttribute('href'));
        if (t) { e.preventDefault(); t.scrollIntoView({ behavior:'smooth', block:'start' }); }
    });
});

/* ── Scroll progress bar ── */
const progressBar = document.getElementById('scroll-progress');
window.addEventListener('scroll', () => {
    const pct = window.scrollY / (document.body.scrollHeight - window.innerHeight) * 100;
    if (progressBar) progressBar.style.width = pct + '%';
}, { passive: true });

/* ── Intersection Observer (Accessible & Mobile Optimized) ── */
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
if (!prefersReducedMotion && 'IntersectionObserver' in window) {
    document.documentElement.classList.add('js-motion');
}

const animObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            animObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -25px 0px' });
document.querySelectorAll('.fade-up,.fade-left,.fade-right,.fade-scale,.blur-up,.stagger-children,.section-header')
    .forEach(el => animObserver.observe(el));

// Fail-safe: guarantee all content is visible after 1.8s
setTimeout(() => {
    document.querySelectorAll('.fade-up,.fade-left,.fade-right,.fade-scale,.blur-up,.stagger-children,.section-header')
        .forEach(el => el.classList.add('visible'));
}, 1800);


/* ── Scramble counter ── */
function scrambleCount(el, target, duration = 2000) {
    const suffix = el.dataset.suffix || '';
    const chars  = '0123456789';
    let startTime = null;
    el.classList.add('counting');
    function step(ts) {
        if (!startTime) startTime = ts;
        const progress = Math.min((ts - startTime) / duration, 1);
        const ease = 1 - Math.pow(1 - progress, 3);
        const current = Math.floor(ease * target);
        if (progress < 0.85) {
            const scrambled = String(current).split('').map((d,i) =>
                i < String(current).length - 1 ? d : chars[Math.floor(Math.random()*10)]
            ).join('');
            el.textContent = scrambled + suffix;
        } else {
            el.textContent = current + suffix;
        }
        if (progress < 1) requestAnimationFrame(step);
        else { el.textContent = target.toLocaleString() + suffix; el.classList.remove('counting'); }
    }
    requestAnimationFrame(step);
}
const counterObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const el  = entry.target;
            const val = parseInt(el.dataset.value);
            scrambleCount(el, val);
            counterObserver.unobserve(el);
        }
    });
}, { threshold: 0.6 });
document.querySelectorAll('.stat-number[data-value]').forEach(el => counterObserver.observe(el));

/* ── Hero particles ── */
(function spawnParticles() {
    const c = document.getElementById('heroParticles');
    if (!c) return;
    for (let i = 0; i < 22; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        const size = Math.random() * 4 + 1.5;
        p.style.cssText = `width:${size}px;height:${size}px;left:${Math.random()*100}%;opacity:${Math.random()*.4+.05};animation-duration:${Math.random()*14+7}s;animation-delay:${Math.random()*12}s;`;
        c.appendChild(p);
    }
})();

/* ── Hero spotlight follows mouse ── */
const heroSection   = document.getElementById('home');
const spotlightEl   = document.getElementById('heroSpotlight');
if (heroSection && spotlightEl) {
    heroSection.addEventListener('mousemove', e => {
        const r  = heroSection.getBoundingClientRect();
        const px = ((e.clientX - r.left) / r.width  * 100).toFixed(2);
        const py = ((e.clientY - r.top)  / r.height * 100).toFixed(2);
        spotlightEl.style.background =
            `radial-gradient(circle 320px at ${px}% ${py}%, rgba(156,116,40,0.10) 0%, transparent 70%)`;
    });
    heroSection.addEventListener('mouseleave', () => {
        spotlightEl.style.background = '';
    });
}

/* ── Orb parallax on mouse move ── */
document.addEventListener('mousemove', e => {
    const fx = (e.clientX / window.innerWidth  - 0.5) * 30;
    const fy = (e.clientY / window.innerHeight - 0.5) * 20;
    const o1 = document.querySelector('.hero-orb-1');
    const o2 = document.querySelector('.hero-orb-2');
    const o3 = document.querySelector('.hero-orb-3');
    if (o1) o1.style.transform = `translate(${fx*1.6}px,${fy}px)`;
    if (o2) o2.style.transform = `translate(${-fx*.8}px,${-fy*.7}px)`;
    if (o3) o3.style.transform = `translate(${fx*.5}px,${fy*1.2}px)`;
}, { passive: true });

/* ── 3D tilt cards ── */
document.querySelectorAll('.tilt-card').forEach(card => {
    card.addEventListener('mousemove', e => {
        const r  = card.getBoundingClientRect();
        const cx = r.left + r.width  / 2;
        const cy = r.top  + r.height / 2;
        const dx = (e.clientX - cx) / (r.width  / 2);
        const dy = (e.clientY - cy) / (r.height / 2);
        const tiltX =  dy * 8;
        const tiltY = -dx * 8;
        card.style.transform = `perspective(800px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) scale3d(1.02,1.02,1.02)`;
        const shine = card.querySelector('.tilt-shine');
        if (shine) shine.style.background =
            `radial-gradient(circle at ${(dx+1)*50}% ${(dy+1)*50}%, rgba(255,255,255,0.12) 0%, transparent 60%)`;
    });
    card.addEventListener('mouseleave', () => {
        card.style.transform = '';
        const shine = card.querySelector('.tilt-shine');
        if (shine) shine.style.background = '';
    });
});

/* ── Magnetic buttons ── */
document.querySelectorAll('.mag-btn').forEach(btn => {
    btn.addEventListener('mousemove', e => {
        const r  = btn.getBoundingClientRect();
        const dx = e.clientX - (r.left + r.width  / 2);
        const dy = e.clientY - (r.top  + r.height / 2);
        btn.style.transform = `translate(${dx * 0.25}px, ${dy * 0.25}px)`;
    });
    btn.addEventListener('mouseleave', () => {
        btn.style.transform = '';
    });
});

/* ── Tab filter with stagger ── */
function filterProducts(cat, btn) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    // ripple
    const ripple = document.createElement('span');
    ripple.className = 'ripple';
    const r = btn.getBoundingClientRect();
    ripple.style.cssText = `width:${r.width*2}px;height:${r.width*2}px;left:${-r.width/2}px;top:${-r.width/2}px;`;
    btn.appendChild(ripple);
    setTimeout(() => ripple.remove(), 600);
    // filter
    let idx = 0;
    document.querySelectorAll('.product-card').forEach(card => {
        if (cat === 'all' || card.dataset.cat === cat) {
            card.style.display = '';
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px) scale(0.96)';
            setTimeout(() => {
                card.style.transition = 'opacity .45s ease, transform .45s cubic-bezier(.22,1,.36,1)';
                card.style.opacity = '1'; card.style.transform = '';
            }, idx++ * 55);
        } else {
            card.style.opacity = '0';
            card.style.transform = 'scale(0.9)';
            setTimeout(() => { card.style.display = 'none'; }, 260);
        }
    });
}

/* ── Contact form ── */
function handleSubmit(e) {
    e.preventDefault();
    const btn = e.target.querySelector('.btn-submit');
    btn.textContent = '⏳ Sending…'; btn.style.opacity = '.7';
    setTimeout(() => {
        btn.textContent = 'Send Inquiry →'; btn.style.opacity = '1';
        document.getElementById('form-success').style.display = 'block';
        e.target.reset();
        setTimeout(() => { document.getElementById('form-success').style.display = 'none'; }, 5000);
    }, 900);
}

/* ── Navbar smart auto-hide on scroll down & show on scroll up ── */
const navbar = document.getElementById('navbar');
let lastNavScrollY = window.scrollY;
let navTicking = false;

window.addEventListener('scroll', () => {
    if (!navTicking) {
        window.requestAnimationFrame(() => {
            const currentScrollY = window.scrollY;
            if (navbar) {
                if (currentScrollY > 40) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }

                if (currentScrollY > 70 && currentScrollY > lastNavScrollY + 4) {
                    navbar.classList.add('header-hidden');
                } else if (currentScrollY < lastNavScrollY - 4 || currentScrollY <= 20) {
                    navbar.classList.remove('header-hidden');
                }
            }
            lastNavScrollY = Math.max(0, currentScrollY);
            navTicking = false;
        });
        navTicking = true;
    }
}, { passive: true });

/* ── Hero title animation trigger synchronized with loader ── */
let heroRevealed = false;
function triggerHeroTitle() {
    if (heroRevealed) return;
    heroRevealed = true;
    const title = document.querySelector('.hero-title');
    if (title) title.classList.add('is-active');
}
window.addEventListener('meralLoaderReveal', triggerHeroTitle, { once: true });
setTimeout(triggerHeroTitle, 2400);

/* ── Scroll parallax on hero stats / categories ── */
window.addEventListener('scroll', () => {
    const sy = window.scrollY;
    document.querySelectorAll('.parallax-slow').forEach(el => {
        el.style.transform = `translateY(${sy * 0.08}px)`;
    });
    document.querySelectorAll('.parallax-medium').forEach(el => {
        el.style.transform = `translateY(${sy * -0.05}px)`;
    });
}, { passive: true });
</script>

</body>
</html>
