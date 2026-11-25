<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Under Maintenance – Meral Exports</title>
<link rel="preconnect" href="https://fonts.bunny.net">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.bunny.net/css?family=oswald:300,400,500,600,700" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
    --navy:#0E382B;
    --navy-deep:#08241B;
    --gold:#9C7428;
    --gold-light:#e8d5a0;
    --cream:#FAF8F5;
    --text:#64748b;
    --card:#ffffff;
}
html,body{height:100%}
body{
    font-family:'Oswald',sans-serif;
    background:var(--navy-deep);
    color:var(--navy);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:1.5rem;
    overflow-x:hidden;
}

/* Background */
.bg{
    position:fixed;inset:0;z-index:0;
    background:
        radial-gradient(ellipse 80% 60% at 20% 20%, rgba(156,116,40,.18) 0%, transparent 55%),
        radial-gradient(ellipse 70% 50% at 85% 75%, rgba(59,130,246,.12) 0%, transparent 50%),
        linear-gradient(160deg, #08241B 0%, #0E382B 45%, #1C4E3D 100%);
}
.bg-grid{
    position:fixed;inset:0;z-index:0;opacity:.04;
    background-image:
        linear-gradient(rgba(255,255,255,.8) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,.8) 1px, transparent 1px);
    background-size:48px 48px;
}
.orb{
    position:fixed;border-radius:50%;filter:blur(80px);z-index:0;pointer-events:none;
    animation:float 8s ease-in-out infinite;
}
.orb-1{width:420px;height:420px;background:rgba(156,116,40,.25);top:-120px;right:-80px}
.orb-2{width:300px;height:300px;background:rgba(99,102,241,.2);bottom:-60px;left:-60px;animation-delay:-4s}

@keyframes float{
    0%,100%{transform:translate(0,0) scale(1)}
    50%{transform:translate(-12px,16px) scale(1.05)}
}

/* Card */
.wrap{position:relative;z-index:1;width:100%;max-width:520px}
.card{
    background:rgba(255,255,255,.97);
    border-radius:24px;
    padding:2.75rem 2.5rem;
    box-shadow:
        0 0 0 1px rgba(255,255,255,.1),
        0 25px 80px rgba(0,0,0,.35),
        0 8px 32px rgba(14,56,43,.15);
    backdrop-filter:blur(20px);
    animation:slideUp .7s cubic-bezier(.22,1,.36,1) both;
}
@keyframes slideUp{
    from{opacity:0;transform:translateY(24px)}
    to{opacity:1;transform:translateY(0)}
}

.logo-row{
    display:flex;align-items:center;gap:.75rem;margin-bottom:2rem;
}
.logo-row img{height:44px;width:auto}
.logo-row span{font-weight:700;font-size:.95rem;color:var(--navy);line-height:1.3}
.logo-row small{display:block;font-size:.7rem;color:var(--text);font-weight:500}

.badge{
    display:inline-flex;align-items:center;gap:.5rem;
    background:linear-gradient(135deg,rgba(156,116,40,.15),rgba(156,116,40,.08));
    border:1px solid rgba(156,116,40,.35);
    color:#8b6914;
    font-size:.72rem;font-weight:700;
    letter-spacing:.06em;text-transform:uppercase;
    padding:.45rem .9rem;border-radius:99px;margin-bottom:1.25rem;
}
.badge-dot{
    width:7px;height:7px;border-radius:50%;background:var(--gold);
    animation:pulse 2s ease-in-out infinite;
}
@keyframes pulse{
    0%,100%{opacity:1;transform:scale(1)}
    50%{opacity:.5;transform:scale(.85)}
}

h1{
    font-size:clamp(1.65rem,4vw,2rem);
    font-weight:800;
    color:var(--navy);
    line-height:1.25;
    letter-spacing:-.03em;
    margin-bottom:.75rem;
}
.subtitle{
    font-size:.95rem;color:var(--text);line-height:1.7;margin-bottom:2rem;
}

/* Progress bar animation */
.progress-wrap{
    background:#f1f5f9;border-radius:99px;height:6px;margin-bottom:2rem;overflow:hidden;
}
.progress-bar{
    height:100%;width:35%;
    background:linear-gradient(90deg,var(--gold),var(--gold-light),var(--gold));
    border-radius:99px;
    animation:progress 2.5s ease-in-out infinite;
}
@keyframes progress{
    0%{width:20%;opacity:.7}
    50%{width:70%;opacity:1}
    100%{width:20%;opacity:.7}
}

.features{
    display:grid;grid-template-columns:1fr 1fr;gap:.75rem;margin-bottom:2rem;
}
.feature{
    display:flex;align-items:flex-start;gap:.6rem;
    padding:.85rem 1rem;
    background:#f8fafc;
    border:1px solid #E3DDD2;
    border-radius:12px;
    font-size:.78rem;color:var(--text);line-height:1.45;
}
.feature-icon{
    width:28px;height:28px;border-radius:8px;
    background:var(--navy);color:var(--gold);
    display:flex;align-items:center;justify-content:center;
    font-size:.85rem;flex-shrink:0;
}
.feature strong{display:block;color:var(--navy);font-size:.8rem;margin-bottom:.15rem}

.contact-box{
    border-top:1px solid #E3DDD2;
    padding-top:1.5rem;
    text-align:center;
}
.contact-box p{font-size:.82rem;color:var(--text);margin-bottom:.75rem}
.contact-box a{
    display:inline-flex;align-items:center;gap:.4rem;
    color:var(--navy);font-weight:600;font-size:.875rem;
    text-decoration:none;padding:.5rem 1rem;
    border-radius:10px;border:1px solid #E3DDD2;
    transition:all .2s;
}
.contact-box a:hover{
    border-color:var(--gold);
    background:rgba(156,116,40,.08);
    transform:translateY(-1px);
}

.footer-note{
    text-align:center;margin-top:1.5rem;
    font-size:.72rem;color:rgba(255,255,255,.4);
}

/* Gear icon animation */
.icon-main{
    width:72px;height:72px;margin-bottom:1.5rem;
    background:linear-gradient(135deg,var(--navy),#1C4E3D);
    border-radius:20px;
    display:flex;align-items:center;justify-content:center;
    box-shadow:0 12px 32px rgba(14,56,43,.25);
}
.icon-main svg{
    width:36px;height:36px;color:var(--gold);
    animation:spin 4s linear infinite;
}
@keyframes spin{
    from{transform:rotate(0deg)}
    to{transform:rotate(360deg)}
}

@media(max-width:480px){
    .card{padding:2rem 1.5rem}
    .features{grid-template-columns:1fr}
}
</style>
</head>
<body>
<div class="bg"></div>
<div class="bg-grid"></div>
<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<div class="wrap">
    <div class="card">
        <div class="logo-row">
            <img src="{{ asset('primary-logo.png') }}" alt="Meral Group">
            <span>Meral Exports<br><small>Premium Food Exports</small></span>
        </div>

        <div class="icon-main">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                <circle cx="12" cy="12" r="4"/>
            </svg>
        </div>

        <div class="badge">
            <span class="badge-dot"></span>
            Under Maintenance
        </div>

        <h1>We're upgrading<br>your experience</h1>
        <p class="subtitle">
            Our website is temporarily down for scheduled maintenance.
            We're making improvements to serve you better. Please check back soon.
        </p>

        <div class="progress-wrap">
            <div class="progress-bar"></div>
        </div>

        <div class="features">
            <div class="feature">
                <div class="feature-icon">⚡</div>
                <div><strong>Faster Platform</strong>Performance & speed upgrades</div>
            </div>
            <div class="feature">
                <div class="feature-icon">🔒</div>
                <div><strong>Enhanced Security</strong>Keeping your data safe</div>
            </div>
            <div class="feature">
                <div class="feature-icon">🚢</div>
                <div><strong>Export Services</strong>Still operating normally</div>
            </div>
            <div class="feature">
                <div class="feature-icon">📦</div>
                <div><strong>Orders Active</strong>Business continues as usual</div>
            </div>
        </div>

        <div class="contact-box">
            <p>Need urgent assistance? Reach out to our team directly.</p>
            <a href="mailto:info@meralexports.com">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                info@meralexports.com
            </a>
        </div>
    </div>

    <p class="footer-note">© {{ date('Y') }} Meral Exports & Imports Pvt Ltd. All rights reserved.</p>
</div>
</body>
</html>
