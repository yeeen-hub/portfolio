<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/fonts.css') ?>">
    <title>View Projects</title>
</head>

<body id="vanta-bg" class="min-vh-100">
 
<style>
  @import url('https://fonts.googleapis.com/css2?family=Audiowide&family=Space+Mono:ital,wght@0,400;0,700;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap');
 
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
 
  :root {
    --glass-bg: rgba(255,255,255,0.04);
    --glass-border: rgba(255,255,255,0.10);
    --glass-shine: rgba(255,255,255,0.07);
    --text-primary: #f0f4f8;
    --text-muted: rgba(255,255,255,0.45);
    --accent: rgba(180,255,210,0.85);
    --accent-glow: rgba(120,210,160,0.25);
  }
 
  body { font-family: 'DM Sans', sans-serif; }
 
  /* ── MENU BUTTON ── */
  .menu-btn {
    position: fixed;
    top: 74px;
    right: 34px;
    z-index: 100;
    width: 44px; height: 44px;
    display: flex; align-items: center; justify-content: center;
    transition: background 0.2s, border-color 0.2s, transform 0.2s;
  }
  .menu-btn:hover {
    background: rgba(255,255,255,0.13);
    border-color: rgba(255,255,255,0.25);
    transform: scale(1.07);
  }
 
  /* ── OUTER WRAPPER ── */
  .scene {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 36px 20px;
  }
 
  /* ── CARD ── */
  .card-shell {
    width: 100%;
    max-width: 960px;
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    backdrop-filter: blur(22px) saturate(1.4);
    box-shadow:
      0 2px 0 rgba(255,255,255,0.06) inset,
      0 32px 80px rgba(0,0,0,0.55),
      0 0 60px var(--accent-glow);
    overflow: hidden;
    position: relative;
  }
 
  /* subtle top-edge shine */
  .card-shell::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.06) 0%, transparent 50%);
    pointer-events: none;
    border-radius: inherit;
  }
 
  /* ── INNER GRID ── */
  .card-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 520px;
  }
  @media (max-width: 720px) {
    .card-grid { grid-template-columns: 1fr; }
  }
 
  /* ── IMAGE PANE ── */
  .img-pane {
    position: relative;
    overflow: hidden;
  }
  .img-pane img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.6s ease;
  }
  .card-shell:hover .img-pane img { transform: scale(1.03); }
 
  /* gradient overlay on image */
  .img-pane::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(
      to right,
      transparent 55%,
      rgba(67, 136, 109, 0.72) 100%
    );
    pointer-events: none;
  }
  @media (max-width: 720px) {
    .img-pane { max-height: 280px; }
    .img-pane::after {
      background: linear-gradient(to bottom, transparent 55%, rgba(8,18,14,0.75) 100%);
    }
  }
 
  /* ── CONTENT PANE ── */
  .content-pane {
    padding: 44px 40px 44px 36px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 0;
    position: relative;
  }
 
  /* vertical accent line */
  .content-pane::before {
    content: '';
    position: absolute;
    top: 15%;
    bottom: 15%;
    left: 0;
    width: 2px;
    background: linear-gradient(to bottom, transparent, var(--accent), transparent);
    opacity: 0.5;
  }
 
  /* ── LABEL (eyebrow) ── */
  .label-row {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
  }
  .label-dot {
    width: 6px; height: 6px;
    border-radius: 50%;
    background: var(--accent);
    box-shadow: 0 0 8px var(--accent);
  }
  .label-text {
    font-family: 'Space Mono', monospace;
    font-size: 0.68rem;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--accent);
  }
 
  /* ── TITLE ── */
  .proj-title {
    font-family: 'Audiowide', sans-serif;
    font-size: clamp(1.6rem, 3.5vw, 2.5rem);
    color: var(--text-primary);
    line-height: 1.15;
    margin-bottom: 20px;
    letter-spacing: -0.01em;
  }
 
  /* ── DIVIDER ── */
  .divider {
    width: 40px; height: 1px;
    background: linear-gradient(to right, var(--accent), transparent);
    margin-bottom: 20px;
    opacity: 0.7;
  }
 
  /* ── CATEGORY BADGE ── */
  .cat-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 14px;
    border: 1px solid rgba(255,255,255,0.14);
    border-radius: 999px;
    background: rgba(255,255,255,0.05);
    font-family: 'Space Mono', monospace;
    font-size: 0.68rem;
    letter-spacing: 0.10em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.65);
    margin-bottom: 22px;
    width: fit-content;
  }
  .cat-badge span.dot {
    width: 5px; height: 5px;
    border-radius: 50%;
    background: var(--accent);
    opacity: 0.8;
  }
 
  /* ── DESCRIPTION ── */
  .proj-desc {
    font-size: 0.915rem;
    line-height: 1.75;
    color: rgba(255,255,255,0.62);
    text-align: justify;
    font-weight: 300;
  }
 
  /* ── BOTTOM META ROW ── */
  .meta-row {
    margin-top: 32px;
    padding-top: 20px;
    border-top: 1px solid rgba(255,255,255,0.07);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
  }
  .meta-tag {
    font-family: 'Space Mono', monospace;
    font-size: 0.63rem;
    letter-spacing: 0.12em;
    color: var(--text-muted);
    text-transform: uppercase;
  }
  .view-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 18px;
    border: 1px solid rgba(255,255,255,0.18);
    border-radius: 8px;
    background: rgba(255,255,255,0.05);
    color: var(--text-primary);
    font-family: 'Space Mono', monospace;
    font-size: 0.7rem;
    letter-spacing: 0.08em;
    text-decoration: none;
    cursor: pointer;
    transition: background 0.2s, border-color 0.2s, transform 0.15s;
  }
  .view-btn:hover {
    background: rgba(180,255,210,0.12);
    border-color: rgba(180,255,210,0.35);
    transform: translateY(-1px);
  }
  .view-btn svg { opacity: 0.75; }
 
  /* ── FADE IN ANIMATION ── */
  .fade-in { opacity: 0; transform: translateY(18px); transition: opacity 0.7s ease, transform 0.7s ease; }
  .fade-in.show { opacity: 1; transform: translateY(0); }
 
  /* scrollbar hide utility */
  .hide-scrollbar::-webkit-scrollbar { display: none; }
  .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
 
 
<!-- MAIN SCENE -->
<div class="scene">
  <div class="card-shell fade-in">
    <div class="card-grid">
 
      <!-- IMAGE PANE -->
      <div class="img-pane">
        <?php if ($project['project_image']): ?>
          <img src="<?= base_url('uploads/' . $project['project_image']) ?>"
               alt="<?= esc($project['project_title']) ?>">
        <?php endif; ?>
      </div>
 
      <!-- CONTENT PANE -->
      <div class="content-pane">
 
        <!-- eyebrow label -->
        <div class="label-row">
          <span class="label-dot"></span>
          <span class="label-text">Project Overview</span>
        </div>
 
        <!-- title -->
        <h1 class="proj-title"><?= esc($project['project_title']) ?></h1>
 
        <!-- divider -->
        <div class="divider"></div>
 
        <!-- category badge -->
        <div class="cat-badge">
          <span class="dot"></span>
          <?= esc($project['project_cat']) ?>
        </div>
 
        <!-- description -->
        <p class="proj-desc"><?= esc($project['project_desc']) ?></p>
 
        <!-- bottom meta row -->
        <div class="meta-row">
          <span class="meta-tag">/ Portfolio</span>
          <a href="<?= base_url('projects') ?>" class="view-btn">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
            Back to Projetcs
          </a>
        </div>
 
      </div>
    </div>
  </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>

    <script>
        const faders = document.querySelectorAll('.fade-in');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, {
            threshold: 0.2
        });

        faders.forEach(el => observer.observe(el));
    </script>

    <script>
        VANTA.FOG({
            el: "#vanta-bg",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200,
            minWidth: 200,
            highlightColor: 0xffec,
            midtoneColor: 0x4f2d,
            lowlightColor: 0x18d62b,
            baseColor: 0x789f8b,
            zoom: 0.20
        })
    </script>
</body>

</html>