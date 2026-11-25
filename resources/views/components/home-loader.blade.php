<!-- MERAL MINIMALIST LUXURY WEBSITE PRELOADER (MONOGRAM-ONLY) -->
<style>
  #meralLuxuryLoader {
    position: fixed;
    inset: 0;
    z-index: 99999;
    background-color: #000000;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    pointer-events: auto;
    opacity: 1;
    /* Safe-area insets for modern mobile edge-to-edge screens */
    padding-top: max(16px, env(safe-area-inset-top));
    padding-bottom: max(16px, env(safe-area-inset-bottom));
    padding-left: max(16px, env(safe-area-inset-left));
    padding-right: max(16px, env(safe-area-inset-right));
    transition: opacity 550ms cubic-bezier(0.4, 0, 0.2, 1);
  }

  #meralLuxuryLoader.loader-dismissing {
    opacity: 0;
    pointer-events: none;
  }

  #meralLoaderContent {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    width: 100%;
    max-width: 100vw;
    box-sizing: border-box;
    will-change: opacity, transform;
    transition: opacity 450ms cubic-bezier(0.4, 0, 0.2, 1), transform 450ms cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* ── CURVED MASK REVEAL ANIMATION ──────────────────────────────────── */
  @keyframes meralMonogramCurvedReveal {
    0% {
      opacity: 0;
      clip-path: ellipse(15% 10% at 50% 100%);
      -webkit-clip-path: ellipse(15% 10% at 50% 100%);
      filter: brightness(0.85);
    }
    22% {
      opacity: 1;
      clip-path: ellipse(35% 30% at 50% 85%);
      -webkit-clip-path: ellipse(35% 30% at 50% 85%);
      filter: brightness(0.9);
    }
    52% {
      opacity: 1;
      clip-path: ellipse(65% 55% at 50% 65%);
      -webkit-clip-path: ellipse(65% 55% at 50% 65%);
      filter: brightness(0.96);
    }
    82% {
      opacity: 1;
      clip-path: ellipse(95% 85% at 50% 50%);
      -webkit-clip-path: ellipse(95% 85% at 50% 50%);
      filter: brightness(1);
    }
    100% {
      opacity: 1;
      clip-path: ellipse(140% 140% at 50% 50%);
      -webkit-clip-path: ellipse(140% 140% at 50% 50%);
      filter: brightness(1);
    }
  }

  /* ── PROGRESS INDICATOR ANIMATIONS ─────────────────────────────────── */
  @keyframes meralProgressTrackFadeIn {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }

  @keyframes meralProgressLineFill {
    0% {
      transform: scaleX(0);
    }
    60% {
      transform: scaleX(0.72);
    }
    100% {
      transform: scaleX(1);
    }
  }

  /* ── MONOGRAM & PROGRESS LINE LAYOUT (Mobile Default) ──────────────── */
  .loader-monogram-wrap {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .loader-monogram-img {
    display: block;
    width: 120px;
    max-width: 44vw;
    height: auto;
    object-fit: contain;
    opacity: 0;
    clip-path: ellipse(15% 10% at 50% 100%);
    -webkit-clip-path: ellipse(15% 10% at 50% 100%);
    animation: meralMonogramCurvedReveal 1100ms cubic-bezier(0.25, 1, 0.5, 1) 150ms forwards;
    will-change: clip-path, opacity;
  }

  .loader-progress-track {
    width: 82px;
    height: 2px;
    background: rgba(223, 190, 126, 0.15);
    margin-top: 28px;
    position: relative;
    overflow: hidden;
    opacity: 0;
    animation: meralProgressTrackFadeIn 400ms ease-out 900ms forwards;
    will-change: opacity;
  }

  .loader-progress-line {
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, #9C7428 0%, #DFBE7E 50%, #F0D28A 100%);
    transform: scaleX(0);
    transform-origin: left center;
    animation: meralProgressLineFill 1250ms cubic-bezier(0.25, 1, 0.5, 1) 950ms forwards;
    will-change: transform;
  }

  /* ── MOBILE LANDSCAPE SCREEN ADAPTATION ────────────────────────────── */
  @media (max-height: 500px) and (orientation: landscape) {
    .loader-monogram-img {
      width: 78px;
    }
    .loader-progress-track {
      width: 65px;
      margin-top: 16px;
    }
  }

  /* ── DESKTOP SCREEN ADAPTATION (1024px onwards) ─────────────────────── */
  @media (min-width: 1024px) {
    .loader-monogram-img {
      width: 180px;
      animation-duration: 1200ms;
      animation-delay: 180ms;
    }
    .loader-progress-track {
      width: 120px;
      height: 2px;
      margin-top: 38px;
      animation-delay: 1050ms;
    }
    .loader-progress-line {
      animation-duration: 1350ms;
      animation-delay: 1100ms;
    }
  }

  /* ── STRICT ACCESSIBILITY & REDUCED MOTION ─────────────────────────── */
  @media (prefers-reduced-motion: reduce) {
    #meralLuxuryLoader,
    #meralLoaderContent,
    .loader-monogram-img,
    .loader-progress-track,
    .loader-progress-line {
      animation: none !important;
      transition: none !important;
      opacity: 1 !important;
      clip-path: none !important;
      -webkit-clip-path: none !important;
      transform: none !important;
      filter: none !important;
    }
    .loader-progress-line {
      transform: scaleX(1) !important;
    }
  }
</style>

<div id="meralLuxuryLoader" role="status" aria-live="polite" aria-label="Meral Exports & Imports Loading">
  <div id="meralLoaderContent">
    
    <!-- Central Monogram: Emerald Green & Metallic Gold (Original Approved Brand Mark) -->
    <div class="loader-monogram-wrap">
      <img
        src="{{ asset('images/brand/meral-monogram-mob.png') }}"
        srcset="{{ asset('images/brand/meral-monogram-mob.png') }} 360w, {{ asset('images/brand/meral-monogram.png') }} 638w"
        sizes="(max-width: 1023px) 120px, 180px"
        alt="Meral Monogram"
        width="638"
        height="473"
        class="loader-monogram-img"
        loading="eager"
        decoding="sync"
      >
    </div>

    <!-- Thin Horizontal Gold Progress Line -->
    <div class="loader-progress-track" aria-hidden="true">
      <div class="loader-progress-line"></div>
    </div>

  </div>
</div>

<script>
(function () {
  const loader = document.getElementById("meralLuxuryLoader");
  if (!loader) return;
  const content = document.getElementById("meralLoaderContent");

  const startTime = Date.now();
  let dismissed = false;

  function dismiss() {
    if (dismissed) return;
    dismissed = true;

    // Respect reduced motion preference with immediate dismiss
    const reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if (reduced) {
      loader.setAttribute("aria-hidden", "true");
      loader.style.display = "none";
      window.dispatchEvent(new CustomEvent("meralLoaderReveal"));
      return;
    }

    // Exit Animation:
    // 1. Fade out the monogram and progress indicator together (450ms)
    if (content) {
      content.style.transition = "opacity 450ms cubic-bezier(0.4, 0, 0.2, 1), transform 450ms cubic-bezier(0.4, 0, 0.2, 1)";
      content.style.opacity = "0";
      content.style.transform = "translateY(-4px)";
    }

    // 2. Transition pure black background smoothly into homepage (550ms exit transition)
    setTimeout(function () {
      loader.style.transition = "opacity 550ms cubic-bezier(0.4, 0, 0.2, 1)";
      loader.classList.add("loader-dismissing");
      window.dispatchEvent(new CustomEvent("meralLoaderReveal"));

      setTimeout(function () {
        loader.setAttribute("aria-hidden", "true");
        loader.style.display = "none";
      }, 570);
    }, 120);
  }

  // Cinematic luxury timing: allow the mask reveal and gold sweep to be fully appreciated
  // Minimum display threshold: ~2000ms (mobile) / ~2200ms (desktop)
  function scheduleDismiss() {
    const elapsed = Date.now() - startTime;
    const isMobile = window.innerWidth < 1024;
    const minDisplay = isMobile ? 2000 : 2200;
    const remaining = Math.max(0, minDisplay - elapsed);

    setTimeout(dismiss, remaining);
  }

  if (document.readyState === "complete") {
    scheduleDismiss();
  } else {
    window.addEventListener("load", scheduleDismiss);
  }

  // Fail-safe timeout: never block the user longer than 2.8s under any circumstance
  setTimeout(dismiss, 2800);

  // Keyboard accessibility: Escape key dismisses immediately
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") dismiss();
  });
})();
</script>
