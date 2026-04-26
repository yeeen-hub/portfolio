<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('content') ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500&display=swap');

    :root {
        --bg-base: #f8faf9;
        --bg-card: #ffffff;
        --bg-surface: #f3f6f4;
        --bg-input: #ffffff;
        --border: #e5e7eb;
        --accent: #22c55e;
        --accent-dim: #16a34a;
        --accent-glow: rgba(34, 197, 94, 0.10);
        --accent-glow-strong: rgba(34, 197, 94, 0.18);
        --text-primary: #111827;
        --text-secondary: #6b7280;
        --text-muted: #9ca3af;
        --danger: #ef4444;
        --danger-bg: rgba(239, 68, 68, 0.08);
        --radius: 14px;
        --radius-sm: 10px;
        --transition: all 0.2s ease;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    .dashboard-wrapper {
        background: var(--bg-base);
        min-height: 100vh;
        font-family: 'DM Sans', sans-serif;
        color: var(--text-primary);
        padding: 40px 32px 80px;
        position: relative;
    }

    .dashboard-wrapper::before {
        content: '';
        position: fixed;
        top: -80px; right: -80px;
        width: 360px; height: 360px;
        background: radial-gradient(circle, rgba(34,197,94,0.07) 0%, transparent 70%);
        pointer-events: none;
        z-index: 0;
    }

    .dashboard-container {
        max-width: 860px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    /* ── Page Header ── */
    .page-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        padding-bottom: 24px;
        border-bottom: 1.5px solid var(--border);
        margin-bottom: 32px;
        animation: fadeDown 0.45s ease both;
    }

    .page-eyebrow {
        font-family: 'Syne', sans-serif;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--accent);
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 5px;
    }

    .page-eyebrow::before {
        content: '';
        display: inline-block;
        width: 18px; height: 2px;
        background: var(--accent);
        border-radius: 2px;
    }

    .page-title {
        font-family: 'Syne', sans-serif;
        font-size: 26px;
        font-weight: 800;
        color: var(--text-primary);
        letter-spacing: -0.02em;
        line-height: 1.1;
    }

    .page-subtitle {
        font-size: 13px;
        color: var(--text-secondary);
        margin-top: 3px;
    }

    .page-date {
        font-size: 12px;
        color: var(--text-muted);
        background: var(--bg-surface);
        border: 1px solid var(--border);
        padding: 6px 14px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .page-date svg { width: 13px; height: 13px; }

    /* ── Stats Row ── */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin-bottom: 24px;
        animation: fadeUp 0.4s 0.05s ease both;
    }

    @media (max-width: 600px) {
        .stats-row { grid-template-columns: 1fr; }
    }

    .stat-card {
        background: var(--bg-card);
        border: 1.5px solid var(--border);
        border-radius: var(--radius);
        padding: 18px 20px;
        display: flex;
        align-items: center;
        gap: 14px;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .stat-card::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 2px;
        background: var(--accent);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .stat-card:hover { box-shadow: 0 4px 20px rgba(34,197,94,0.08); border-color: #d1fae5; }
    .stat-card:hover::after { transform: scaleX(1); }

    .stat-icon {
        width: 40px; height: 40px;
        border-radius: 10px;
        background: var(--accent-glow);
        border: 1px solid rgba(34,197,94,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent-dim);
        flex-shrink: 0;
    }

    .stat-icon svg { width: 18px; height: 18px; }

    .stat-info { flex: 1; min-width: 0; }

    .stat-value {
        font-family: 'Syne', sans-serif;
        font-size: 20px;
        font-weight: 800;
        color: var(--text-primary);
        line-height: 1;
        margin-bottom: 3px;
    }

    .stat-label {
        font-size: 11.5px;
        color: var(--text-secondary);
        font-weight: 500;
    }

    /* ── Resume Section ── */
    .section-card {
        background: var(--bg-card);
        border: 1.5px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        animation: fadeUp 0.4s 0.12s ease both;
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 24px;
        border-bottom: 1.5px solid var(--border);
    }

    .section-title {
        font-family: 'Syne', sans-serif;
        font-size: 14px;
        font-weight: 800;
        color: var(--text-primary);
        letter-spacing: -0.01em;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .section-dot {
        width: 7px; height: 7px;
        background: var(--accent);
        border-radius: 50%;
        flex-shrink: 0;
    }

    .btn-upload-resume {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: var(--accent);
        color: #fff;
        font-family: 'Syne', sans-serif;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 9px 18px;
        border: none;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        box-shadow: 0 2px 12px rgba(34,197,94,0.2);
    }

    .btn-upload-resume:hover {
        background: var(--accent-dim);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(34,197,94,0.28);
    }

    .btn-upload-resume:active { transform: translateY(0); }
    .btn-upload-resume svg { width: 14px; height: 14px; }

    /* Resume Preview Body */
    .resume-body {
        padding: 28px 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        min-height: 420px;
    }

    /* When resume exists */
    .resume-preview-wrap {
        width: 100%;
        max-width: 560px;
        position: relative;
    }

    .resume-preview-frame {
        width: 100%;
        border-radius: var(--radius);
        border: 1.5px solid var(--border);
        overflow: hidden;
        background: var(--bg-surface);
        box-shadow: 0 4px 24px rgba(0,0,0,0.06);
        aspect-ratio: 8.5 / 11;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
        position: relative;
    }

    .resume-preview-frame:hover {
        border-color: #d1fae5;
        box-shadow: 0 8px 32px rgba(34,197,94,0.1);
    }

    .resume-preview-frame img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    .resume-preview-frame iframe {
        width: 100%;
        height: 100%;
        border: none;
        display: block;
    }

    /* Overlay on hover */
    .resume-overlay {
        position: absolute;
        inset: 0;
        background: rgba(17, 24, 39, 0.45);
        backdrop-filter: blur(2px);
        border-radius: calc(var(--radius) - 1px);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.2s ease;
        gap: 12px;
    }

    .resume-preview-frame:hover .resume-overlay { opacity: 1; }

    .overlay-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-family: 'DM Sans', sans-serif;
        font-size: 12.5px;
        font-weight: 600;
        color: #fff;
        background: rgba(255,255,255,0.15);
        border: 1.5px solid rgba(255,255,255,0.3);
        padding: 8px 16px;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        text-decoration: none;
        backdrop-filter: blur(4px);
    }

    .overlay-btn:hover { background: rgba(255,255,255,0.25); }
    .overlay-btn svg { width: 13px; height: 13px; }

    .resume-meta {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: var(--text-secondary);
        padding: 10px 16px;
        background: var(--bg-surface);
        border: 1px solid var(--border);
        border-radius: 20px;
    }

    .resume-meta svg { width: 13px; height: 13px; color: var(--accent); }
    .resume-meta strong { color: var(--text-primary); font-weight: 600; }

    /* Empty state */
    .resume-empty {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 14px;
        flex: 1;
        width: 100%;
        padding: 60px 0;
        text-align: center;
    }

    .resume-empty-icon {
        width: 72px; height: 72px;
        background: var(--bg-surface);
        border: 1.5px dashed var(--border);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-muted);
    }

    .resume-empty-icon svg { width: 30px; height: 30px; }

    .resume-empty h3 {
        font-family: 'Syne', sans-serif;
        font-size: 15px;
        font-weight: 700;
        color: var(--text-primary);
    }

    .resume-empty p {
        font-size: 13px;
        color: var(--text-secondary);
        max-width: 280px;
        line-height: 1.55;
    }

    .btn-upload-empty {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: var(--accent-glow);
        color: var(--accent-dim);
        border: 1.5px solid rgba(34,197,94,0.25);
        font-size: 13px;
        font-weight: 600;
        padding: 10px 22px;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        margin-top: 4px;
    }

    .btn-upload-empty:hover {
        background: var(--accent-glow-strong);
        border-color: var(--accent);
        transform: translateY(-1px);
    }

    .btn-upload-empty svg { width: 14px; height: 14px; }

    /* Flash */
    .flash-message {
        position: fixed;
        bottom: 28px; right: 28px;
        background: #fff;
        border: 1.5px solid var(--accent);
        color: var(--text-primary);
        padding: 13px 18px;
        border-radius: var(--radius);
        font-size: 13.5px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
        z-index: 9999;
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        animation: slideUp 0.4s cubic-bezier(0.34,1.56,0.64,1) both;
    }

    .flash-check {
        width: 22px; height: 22px;
        background: var(--accent);
        color: #fff;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 800; flex-shrink: 0;
    }

    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="dashboard-wrapper">
    <div class="dashboard-container">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <div class="page-eyebrow">Admin Panel</div>
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Welcome back — your portfolio is live.</p>
            </div>
            <div class="page-date">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <?= date('F j, Y') ?>
            </div>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div id="flashMessage" class="flash-message">
                <div class="flash-check">✓</div>
                <?= session()->getFlashdata('success') ?>
            </div>
            <script>
                setTimeout(function () {
                    const flash = document.getElementById('flashMessage');
                    if (flash) {
                        flash.style.transition = "opacity 0.4s ease, transform 0.4s ease";
                        flash.style.opacity = "0";
                        flash.style.transform = "translateY(16px)";
                        setTimeout(() => flash.remove(), 400);
                    }
                }, 3000);
            </script>
        <?php endif; ?>

        <!-- Stats -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value"><?= count($projects ?? []) ?></div>
                    <div class="stat-label">Projects</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value"><?= isset($resume) && $resume ? '1' : '0' ?></div>
                    <div class="stat-label">Resume</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-value">Live</div>
                    <div class="stat-label">Portfolio Status</div>
                </div>
            </div>
        </div>

        <!-- Resume Section -->
        <div class="section-card">
            <div class="section-header">
                <div class="section-title">
                    <span class="section-dot"></span>
                    My Resume
                </div>
                <form action="<?= base_url('admin/resume/upload') ?>" method="post" enctype="multipart/form-data" id="resumeUploadForm">
                    <input type="file" name="resume_file" id="resumeFileInput" class="hidden"
                           accept=".pdf,image/*"
                           onchange="document.getElementById('resumeUploadForm').submit()">
                    <button type="button" class="btn-upload-resume" onclick="document.getElementById('resumeFileInput').click()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                        Upload Resume
                    </button>
                </form>
            </div>

            <div class="resume-body">
                <?php if (isset($resume) && $resume): ?>
                    <!-- Resume exists: show preview -->
                    <div class="resume-preview-wrap">
                        <div class="resume-preview-frame">
                            <?php
                                $ext = strtolower(pathinfo($resume['filename'], PATHINFO_EXTENSION));
                                if ($ext === 'pdf'):
                            ?>
                                <iframe src="<?= base_url('uploads/' . $resume['filename']) ?>#toolbar=0&navpanes=0"
                                        title="Resume Preview"></iframe>
                            <?php else: ?>
                                <img src="<?= base_url('uploads/' . $resume['filename']) ?>" alt="Resume">
                            <?php endif; ?>

                            <!-- Hover overlay -->
                            <div class="resume-overlay">
                                <a href="<?= base_url('uploads/' . $resume['filename']) ?>" target="_blank" class="overlay-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                    Open
                                </a>
                                <a href="<?= base_url('uploads/' . $resume['filename']) ?>" download class="overlay-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- File meta -->
                    <div class="resume-meta">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        <strong><?= esc($resume['original']) ?></strong>
                        <span>·</span>
                        <span>Hover to open or download</span>
                    </div>

                <?php else: ?>
                    <!-- Empty state -->
                    <div class="resume-empty">
                        <div class="resume-empty-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9" y1="13" x2="15" y2="13"/><line x1="9" y1="17" x2="15" y2="17"/></svg>
                        </div>
                        <h3>No resume uploaded yet</h3>
                        <p>Upload your resume as a PDF or image so visitors can view and download it from your portfolio.</p>
                        <button type="button" class="btn-upload-empty" onclick="document.getElementById('resumeFileInput').click()">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                            Upload Resume
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>