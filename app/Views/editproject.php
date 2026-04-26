<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('content') ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap');

    :root {
        --bg-base: #f8faf9;
        --bg-card: #ffffff;
        --bg-surface: #f3f6f4;
        --bg-input: #ffffff;
        --border: #e5e7eb;
        --border-focus: #4ade80;
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

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .projects-wrapper {
        background: var(--bg-base);
        min-height: 100vh;
        font-family: 'DM Sans', sans-serif;
        color: var(--text-primary);
        padding: 40px 24px 80px;
        position: relative;
    }

    /* Subtle top-right decorative glow */
    .projects-wrapper::before {
        content: '';
        position: fixed;
        top: -80px;
        right: -80px;
        width: 360px;
        height: 360px;
        background: radial-gradient(circle, rgba(34, 197, 94, 0.08) 0%, transparent 70%);
        pointer-events: none;
        z-index: 0;
    }

    .projects-container {
        max-width: 820px;
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
        width: 18px;
        height: 2px;
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

    /* ── Add New Button ── */
    .btn-add-new {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--accent);
        color: #fff;
        font-family: 'Syne', sans-serif;
        font-size: 12.5px;
        font-weight: 800;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 10px 20px;
        border: none;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        box-shadow: 0 2px 12px rgba(34, 197, 94, 0.18);
    }

    .btn-add-new:hover {
        background: var(--accent-dim);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(34, 197, 94, 0.28);
    }

    .btn-add-new:active {
        transform: translateY(0);
    }

    .btn-add-new svg {
        width: 15px;
        height: 15px;
    }

    /* ── Flash ── */
    .flash-message {
        position: fixed;
        bottom: 28px;
        right: 28px;
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
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(34, 197, 94, 0.1);
        animation: slideUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    .flash-check {
        width: 22px;
        height: 22px;
        background: var(--accent);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 800;
        flex-shrink: 0;
    }

    /* ── Project Count Badge ── */
    .count-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 600;
        color: var(--text-secondary);
        background: var(--bg-surface);
        border: 1px solid var(--border);
        padding: 5px 12px;
        border-radius: 20px;
        margin-bottom: 20px;
        animation: fadeUp 0.4s 0.1s ease both;
    }

    .count-dot {
        width: 7px;
        height: 7px;
        background: var(--accent);
        border-radius: 50%;
    }

    /* ── Project Card ── */
    .project-card {
        background: var(--bg-card);
        border: 1.5px solid var(--border);
        border-radius: var(--radius);
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 14px;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        animation: fadeUp 0.4s ease both;
    }

    .project-card::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: transparent;
        transition: var(--transition);
        border-radius: 3px 0 0 3px;
    }

    .project-card:hover {
        border-color: #d1fae5;
        box-shadow: 0 4px 24px rgba(34, 197, 94, 0.08);
        transform: translateY(-2px);
    }

    .project-card:hover::before {
        background: var(--accent);
    }

    .project-card:nth-child(1) {
        animation-delay: 0.08s;
    }

    .project-card:nth-child(2) {
        animation-delay: 0.14s;
    }

    .project-card:nth-child(3) {
        animation-delay: 0.20s;
    }

    .project-card:nth-child(4) {
        animation-delay: 0.26s;
    }

    .project-card:nth-child(5) {
        animation-delay: 0.32s;
    }

    /* ── Project Image ── */
    .project-thumb {
        width: 96px;
        height: 96px;
        border-radius: 10px;
        object-fit: cover;
        flex-shrink: 0;
        border: 1.5px solid var(--border);
        display: block;
    }

    .project-thumb-placeholder {
        width: 96px;
        height: 96px;
        border-radius: 10px;
        background: var(--bg-surface);
        border: 1.5px dashed var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-muted);
        flex-shrink: 0;
    }

    /* ── Project Info ── */
    .project-info {
        flex: 1;
        min-width: 0;
    }

    .project-cat-tag {
        display: inline-block;
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--accent-dim);
        background: var(--accent-glow);
        padding: 3px 9px;
        border-radius: 20px;
        margin-bottom: 7px;
    }

    .project-title {
        font-family: 'Syne', sans-serif;
        font-size: 15.5px;
        font-weight: 700;
        color: var(--text-primary);
        letter-spacing: -0.01em;
        margin-bottom: 5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .project-desc {
        font-size: 12.5px;
        color: var(--text-secondary);
        line-height: 1.55;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ── Edit Button ── */
    .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-family: 'Syne', sans-serif;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.04em;
        color: var(--accent-dim);
        background: var(--accent-glow);
        border: 1.5px solid rgba(34, 197, 94, 0.2);
        padding: 8px 16px;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        flex-shrink: 0;
        white-space: nowrap;
    }

    .btn-edit:hover {
        background: var(--accent-glow-strong);
        border-color: var(--accent);
        transform: translateY(-1px);
    }

    .btn-edit svg {
        width: 13px;
        height: 13px;
    }

    /* ── Empty State ── */
    .empty-state {
        text-align: center;
        padding: 64px 24px;
        animation: fadeUp 0.4s ease both;
    }

    .empty-state-icon {
        width: 64px;
        height: 64px;
        background: var(--bg-surface);
        border: 1.5px dashed var(--border);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-muted);
        margin: 0 auto 16px;
    }

    .empty-state h3 {
        font-family: 'Syne', sans-serif;
        font-size: 16px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 6px;
    }

    .empty-state p {
        font-size: 13px;
        color: var(--text-secondary);
    }

    /* ════════════════════════════════════
       MODAL (shared styles for Add & Edit)
    ════════════════════════════════════ */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(17, 24, 39, 0.45);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
        z-index: 1000;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.2s ease;
    }

    .modal-overlay.active {
        opacity: 1;
        pointer-events: all;
    }

    .modal-box {
        background: var(--bg-card);
        border: 1.5px solid var(--border);
        border-radius: 20px;
        width: 100%;
        max-width: 680px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 24px 80px rgba(0, 0, 0, 0.15);
        transform: translateY(16px) scale(0.98);
        transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.2s ease;
        opacity: 0;
    }

    .modal-overlay.active .modal-box {
        transform: translateY(0) scale(1);
        opacity: 1;
    }

    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 22px 26px 18px;
        border-bottom: 1px solid var(--border);
    }

    .modal-title {
        font-family: 'Syne', sans-serif;
        font-size: 17px;
        font-weight: 800;
        color: var(--text-primary);
        letter-spacing: -0.02em;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .modal-title-dot {
        width: 8px;
        height: 8px;
        background: var(--accent);
        border-radius: 50%;
    }

    .modal-close {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--border);
        border-radius: 8px;
        background: var(--bg-surface);
        cursor: pointer;
        color: var(--text-secondary);
        transition: var(--transition);
        font-size: 18px;
        line-height: 1;
    }

    .modal-close:hover {
        background: var(--danger-bg);
        border-color: var(--danger);
        color: var(--danger);
    }

    .modal-body {
        padding: 26px;
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 28px;
    }

    @media (max-width: 560px) {
        .modal-body {
            grid-template-columns: 1fr;
        }
    }

    /* Image Upload Zone */
    .img-upload-zone {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }

    .img-preview-frame {
        width: 160px;
        height: 160px;
        border-radius: var(--radius);
        border: 1.5px dashed var(--border);
        background: var(--bg-surface);
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-muted);
        transition: var(--transition);
        position: relative;
    }

    .img-preview-frame:hover {
        border-color: var(--accent);
        background: var(--accent-glow);
    }

    .img-preview-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .img-upload-hint {
        font-size: 11px;
        color: var(--text-muted);
        text-align: center;
        line-height: 1.5;
    }

    .btn-upload-img {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 600;
        color: var(--accent-dim);
        background: var(--accent-glow);
        border: 1.5px solid rgba(34, 197, 94, 0.25);
        padding: 7px 14px;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        width: 100%;
        justify-content: center;
    }

    .btn-upload-img:hover {
        background: var(--accent-glow-strong);
        border-color: var(--accent);
    }

    /* Modal Form Fields */
    .modal-fields {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .form-label {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--text-secondary);
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .form-input,
    .form-textarea {
        background: var(--bg-input);
        border: 1.5px solid var(--border);
        color: var(--text-primary);
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        padding: 10px 13px;
        border-radius: var(--radius-sm);
        transition: var(--transition);
        width: 100%;
        outline: none;
        resize: vertical;
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: var(--text-muted);
    }

    .form-input:focus,
    .form-textarea:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px var(--accent-glow);
    }

    .form-textarea {
        min-height: 110px;
        line-height: 1.6;
    }

    /* Modal Footer */
    .modal-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 26px 22px;
        border-top: 1px solid var(--border);
        gap: 10px;
    }

    .modal-footer-right {
        display: flex;
        gap: 10px;
    }

    .btn-delete {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--danger);
        background: var(--danger-bg);
        border: 1.5px solid rgba(239, 68, 68, 0.15);
        padding: 9px 16px;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        font-family: 'DM Sans', sans-serif;
    }

    .btn-delete:hover {
        background: rgba(239, 68, 68, 0.14);
        border-color: var(--danger);
    }

    .btn-cancel {
        font-size: 13px;
        font-weight: 500;
        color: var(--text-secondary);
        background: var(--bg-surface);
        border: 1.5px solid var(--border);
        padding: 9px 18px;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        font-family: 'DM Sans', sans-serif;
    }

    .btn-cancel:hover {
        color: var(--text-primary);
        border-color: #9ca3af;
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #fff;
        background: var(--accent);
        border: none;
        padding: 9px 22px;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        box-shadow: 0 2px 12px rgba(34, 197, 94, 0.2);
    }

    .btn-save:hover {
        background: var(--accent-dim);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(34, 197, 94, 0.3);
    }

    .btn-save:active {
        transform: translateY(0);
    }

    /* ── Animations ── */
    @keyframes fadeDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(14px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="projects-wrapper">
    <div class="projects-container">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <div class="page-eyebrow">Admin Panel</div>
                <h1 class="page-title">Edit Projects</h1>
                <p class="page-subtitle">Manage your portfolio projects</p>
            </div>
            <button class="btn-add-new" id="toggleForm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                New Project
            </button>
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

        <!-- Project Count -->
        <div class="count-badge">
            <span class="count-dot"></span>
            <?= count($projects) ?> project<?= count($projects) !== 1 ? 's' : '' ?> in portfolio
        </div>

        <!-- Project List -->
        <?php if (empty($projects)): ?>
            <div class="empty-state">
                <div class="empty-state-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                        <path d="M3 9h18M9 21V9" />
                    </svg>
                </div>
                <h3>No projects yet</h3>
                <p>Click "New Project" to add your first one.</p>
            </div>
        <?php else: ?>
            <?php foreach ($projects as $project): ?>
                <div class="project-card">
                    <!-- Thumbnail -->
                    <?php if ($project['project_image']): ?>
                        <img src="<?= base_url('uploads/' . $project['project_image']) ?>" class="project-thumb"
                            alt="<?= esc($project['project_title']) ?>">
                    <?php else: ?>
                        <div class="project-thumb-placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                <circle cx="8.5" cy="8.5" r="1.5" />
                                <path d="M21 15l-5-5L5 21" />
                            </svg>
                        </div>
                    <?php endif; ?>

                    <!-- Info -->
                    <div class="project-info">
                        <?php if ($project['project_cat']): ?>
                            <span class="project-cat-tag"><?= esc($project['project_cat']) ?></span>
                        <?php endif; ?>
                        <div class="project-title"><?= esc($project['project_title']) ?></div>
                        <p class="project-desc"><?= esc($project['project_desc']) ?></p>
                    </div>

                    <!-- Edit -->
                    <button class="btn-edit" onclick="openEditModal(
                        '<?= $project['id'] ?>',
                        '<?= esc($project['project_title'], 'js') ?>',
                        '<?= esc($project['project_cat'], 'js') ?>',
                        '<?= esc($project['project_desc'], 'js') ?>',
                        '<?= $project['project_image'] ?>'
                    )">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                        </svg>
                        Edit
                    </button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</div>

<!-- ═══════════════════════════════════
     ADD NEW PROJECT MODAL
═══════════════════════════════════ -->
<div id="projectForm" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-header">
       
            <button class="modal-close" id="closeAddModal">×</button>
        </div>

        <form action="<?= base_url('admin/project/store') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <!-- Image -->
                <div class="img-upload-zone">
                    <div class="img-preview-frame" id="addPreviewFrame">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <path d="M21 15l-5-5L5 21" />
                        </svg>
                        <img id="addImgPreview"
                            style="display:none;position:absolute;inset:0;width:100%;height:100%;object-fit:cover;">
                    </div>
                    <p class="img-upload-hint">JPG, PNG or WebP<br>Recommended 800×600px</p>
                    <input type="file" name="project_image" id="add_project_image" class="hidden" accept="image/*"
                        onchange="previewNewImage(event, 'addImgPreview', 'addPreviewFrame')">
                    <label for="add_project_image" class="btn-upload-img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="17 8 12 3 7 8" />
                            <line x1="12" y1="3" x2="12" y2="15" />
                        </svg>
                        Choose Image
                    </label>
                </div>

                <!-- Fields -->
                <div class="modal-fields">
                    <div class="form-group">
                        <label class="form-label">Project Title</label>
                        <input type="text" name="project_title" class="form-input"
                            placeholder="e.g. E-commerce Platform">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <input type="text" name="project_cat" class="form-input" placeholder="e.g. Web Development">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea name="project_desc" class="form-textarea"
                            placeholder="Describe the project, tech stack, your role..."></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div></div>
                <div class="modal-footer-right">
                    <button type="button" class="btn-cancel" id="cancelAddModal">Cancel</button>
                    <button type="submit" class="btn-save">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                            <polyline points="17 21 17 13 7 13 7 21" />
                            <polyline points="7 3 7 8 15 8" />
                        </svg>
                        Save Project
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ═══════════════════════════════════
     EDIT PROJECT MODAL
═══════════════════════════════════ -->
<div id="editModal" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-header">
            <div class="modal-title">
                <span class="modal-title-dot"></span>
                Edit Project
            </div>
            <button class="modal-close" onclick="closeModal()">×</button>
        </div>

        <form id="editForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="project_id">

            <div class="modal-body">
                <!-- Image -->
                <div class="img-upload-zone">
                    <div class="img-preview-frame" id="editPreviewFrame">
                        <img id="preview_image" src="" alt="Preview"
                            style="display:none;position:absolute;inset:0;width:100%;height:100%;object-fit:cover;">
                        <svg id="editPlaceholderIcon" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <path d="M21 15l-5-5L5 21" />
                        </svg>
                    </div>
                    <p class="img-upload-hint">JPG, PNG or WebP<br>Leave blank to keep current</p>
                    <input type="file" name="project_image" id="project_image" class="hidden" accept="image/*"
                        onchange="previewNewImage(event, 'preview_image', 'editPreviewFrame')">
                    <label for="project_image" class="btn-upload-img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="17 8 12 3 7 8" />
                            <line x1="12" y1="3" x2="12" y2="15" />
                        </svg>
                        Change Image
                    </label>
                </div>

                <!-- Fields -->
                <div class="modal-fields">
                    <div class="form-group">
                        <label class="form-label">Project Title</label>
                        <input type="text" name="project_title" id="project_title" class="form-input"
                            placeholder="Project title">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <input type="text" name="project_cat" id="project_cat" class="form-input"
                            placeholder="Project category">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea name="project_desc" id="project_desc" class="form-textarea"
                            placeholder="Project description"></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-delete" onclick="deleteProject()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                        <path d="M10 11v6M14 11v6" />
                        <path d="M9 6V4h6v2" />
                    </svg>
                    Delete
                </button>
                <div class="modal-footer-right">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn-save">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                            <polyline points="17 21 17 13 7 13 7 21" />
                            <polyline points="7 3 7 8 15 8" />
                        </svg>
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // ── Add Modal ──
    const addOverlay = document.getElementById('projectForm');
    const toggleBtn = document.getElementById('toggleForm');
    const closeAddBtn = document.getElementById('closeAddModal');
    const cancelAddBtn = document.getElementById('cancelAddModal');

    function openAddModal() {
        addOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeAddModal() {
        addOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    toggleBtn.addEventListener('click', openAddModal);
    closeAddBtn.addEventListener('click', closeAddModal);
    cancelAddBtn.addEventListener('click', closeAddModal);
    addOverlay.addEventListener('click', (e) => {
        if (e.target === addOverlay) closeAddModal();
    });

    // ── Edit Modal ──
    const editOverlay = document.getElementById('editModal');

    function openEditModal(id, title, cat, desc, image) {
        document.getElementById('project_id').value = id;
        document.getElementById('project_title').value = title;
        document.getElementById('project_cat').value = cat;
        document.getElementById('project_desc').value = desc;

        const imgEl = document.getElementById('preview_image');
        const iconEl = document.getElementById('editPlaceholderIcon');

        if (image) {
            imgEl.src = "<?= base_url('uploads/') ?>" + image;
            imgEl.style.display = 'block';
            iconEl.style.display = 'none';
        } else {
            imgEl.src = '';
            imgEl.style.display = 'none';
            iconEl.style.display = 'block';
        }

        document.getElementById('editForm').action =
            "<?= base_url('admin/project/update/') ?>" + id;

        editOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        editOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    editOverlay.addEventListener('click', (e) => {
        if (e.target === editOverlay) closeModal();
    });

    function deleteProject() {
        const id = document.getElementById('project_id').value;
        if (confirm("Delete this project? This cannot be undone.")) {
            window.location.href = "<?= base_url('admin/project/delete/') ?>" + id;
        }
    }

    // ── Image Preview ──
    function previewNewImage(event, imgId, frameId) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.getElementById(imgId);
            const frame = document.getElementById(frameId);
            // Hide placeholder icons
            frame.querySelectorAll('svg').forEach(s => s.style.display = 'none');
            img.src = e.target.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }

    // ── ESC to close ──
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeAddModal();
            closeModal();
        }
    });
</script>

<?= $this->endSection() ?>