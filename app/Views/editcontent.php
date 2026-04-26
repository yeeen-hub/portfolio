<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('content') ?>

<style>
    :root {
        /* BASE BACKGROUND (white UI) */
        --bg-base: #f8faf9;
        /* soft white, not pure #fff (less eye strain) */
        --bg-card: #ffffff;
        /* main cards */
        --bg-surface: #f3f6f4;
        /* subtle section background */
        --bg-input: #ffffff;
        /* inputs stay clean white */

        /* BORDERS */
        --border: #e5e7eb;
        /* soft gray border */
        --border-focus: #4ade80;
        /* green focus (keep accent) */

        /* ACCENT (KEEP GREEN — unchanged but tuned) */
        --accent: #22c55e;
        /* main green (slightly stronger than before) */
        --accent-dim: #16a34a;
        /* hover green */
        --accent-glow: rgba(34, 197, 94, 0.10);
        --accent-glow-strong: rgba(34, 197, 94, 0.18);

        /* TEXT */
        --text-primary: #111827;
        /* near-black for readability */
        --text-secondary: #6b7280;
        /* gray text */
        --text-muted: #9ca3af;
        /* light gray */

        /* STATUS */
        --danger: #ef4444;
        --danger-bg: rgba(239, 68, 68, 0.08);

        /* STYLE */
        --radius: 14px;
        --radius-sm: 10px;
        --transition: all 0.2s ease;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .edit-wrapper {
        background: var(--bg-base);
        min-height: 100vh;
        font-family: 'DM Sans', sans-serif;
        color: var(--text-primary);
        padding: 40px 24px 80px;
        position: relative;
        overflow: hidden;
    }

    /* Subtle background texture */
    .edit-wrapper::before {
        content: '';
        position: fixed;
        inset: 0;
        background:
            radial-gradient(ellipse 60% 40% at 80% 10%, rgba(74, 222, 128, 0.05) 0%, transparent 60%),
            radial-gradient(ellipse 40% 60% at 10% 80%, rgba(74, 222, 128, 0.03) 0%, transparent 60%);
        pointer-events: none;
        z-index: 0;
    }

    .edit-container {
        max-width: 760px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    /* ── Page Header ── */
    .page-header {
        margin-bottom: 40px;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        padding-bottom: 24px;
        border-bottom: 1px solid var(--border);
        animation: fadeDown 0.5s ease both;
    }

    .page-header-left {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .page-eyebrow {
        font-family: 'Syne', sans-serif;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--accent);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .page-eyebrow::before {
        content: '';
        display: inline-block;
        width: 20px;
        height: 2px;
        background: var(--accent);
        border-radius: 2px;
    }

    .page-title {
        font-family: 'Syne', sans-serif;
        font-size: 28px;
        font-weight: 800;
        color: var(--text-primary);
        letter-spacing: -0.02em;
        line-height: 1.1;
    }

    .page-subtitle {
        font-size: 13px;
        color: var(--text-secondary);
        margin-top: 2px;
    }

    .page-badge {
        font-size: 11px;
        font-weight: 500;
        color: var(--accent);
        background: var(--accent-glow);
        border: 1px solid rgba(74, 222, 128, 0.2);
        padding: 5px 12px;
        border-radius: 20px;
        letter-spacing: 0.04em;
    }

    /* ── Flash Message ── */
    .flash-message {
        position: fixed;
        bottom: 28px;
        right: 28px;
        background: var(--bg-surface);
        border: 1px solid var(--accent);
        color: var(--text-primary);
        padding: 14px 20px;
        border-radius: var(--radius);
        font-size: 13.5px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
        z-index: 9999;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(74, 222, 128, 0.15);
        animation: slideUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    .flash-message::before {
        content: '✓';
        width: 22px;
        height: 22px;
        background: var(--accent);
        color: #0d0f0e;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 800;
        flex-shrink: 0;
    }

    /* ── Section Cards ── */
    .section-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 28px;
        margin-bottom: 20px;
        transition: var(--transition);
        animation: fadeUp 0.5s ease both;
    }

    .section-card:hover {
        border-color: #323a35;
    }

    .section-card:nth-child(1) {
        animation-delay: 0.05s;
    }

    .section-card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .section-card:nth-child(3) {
        animation-delay: 0.15s;
    }

    .section-card:nth-child(4) {
        animation-delay: 0.2s;
    }

    .section-card:nth-child(5) {
        animation-delay: 0.25s;
    }

    .section-card:nth-child(6) {
        animation-delay: 0.3s;
    }

    .section-label {
        font-family: 'Syne', sans-serif;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-label::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--border);
    }

    /* ── Profile Upload ── */
    .profile-upload-area {
        display: flex;
        align-items: center;
        gap: 24px;
    }

    .profile-avatar-wrap {
        position: relative;
        flex-shrink: 0;
    }

    .profile-avatar {
        width: 88px;
        height: 88px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--border);
        display: block;
        transition: var(--transition);
    }

    .profile-avatar:hover {
        border-color: var(--accent);
    }

    .avatar-placeholder {
        width: 88px;
        height: 88px;
        border-radius: 50%;
        background: var(--bg-input);
        border: 2px dashed var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-muted);
        font-size: 28px;
        transition: var(--transition);
    }

    .profile-upload-info {
        flex: 1;
    }

    .profile-upload-info h4 {
        font-family: 'Syne', sans-serif;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .profile-upload-info p {
        font-size: 12px;
        color: var(--text-secondary);
        margin-bottom: 14px;
        line-height: 1.5;
    }

    .upload-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--accent);
        background: var(--accent-glow);
        border: 1px solid rgba(74, 222, 128, 0.25);
        padding: 8px 16px;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        letter-spacing: 0.01em;
    }

    .upload-btn:hover {
        background: var(--accent-glow-strong);
        border-color: var(--accent);
        transform: translateY(-1px);
    }

    .upload-btn svg {
        width: 14px;
        height: 14px;
    }

    /* ── Form Grid ── */
    .form-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    @media (max-width: 600px) {
        .form-grid-2 {
            grid-template-columns: 1fr;
        }

        .profile-upload-area {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-secondary);
        letter-spacing: 0.03em;
        text-transform: uppercase;
    }

    .form-input,
    .form-textarea {
        background: var(--bg-input);
        border: 1px solid var(--border);
        color: var(--text-primary);
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        padding: 10px 14px;
        border-radius: var(--radius-sm);
        transition: var(--transition);
        width: 100%;
        outline: none;
        -webkit-appearance: none;
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
        min-height: 100px;
        line-height: 1.6;
    }

    /* ── Input with Icon ── */
    .input-icon-wrap {
        position: relative;
    }

    .input-icon-wrap .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        pointer-events: none;
        display: flex;
        align-items: center;
    }

    .input-icon-wrap .form-input {
        padding-left: 38px;
    }

    /* ── Expertise Section ── */
    .expertise-input-row {
        display: flex;
        gap: 10px;
        margin-bottom: 14px;
    }

    .expertise-input-row .form-input {
        flex: 1;
    }

    .btn-add-skill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--accent);
        color: #0a0c0b;
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        font-weight: 700;
        padding: 10px 18px;
        border: none;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        white-space: nowrap;
        flex-shrink: 0;
    }

    .btn-add-skill:hover {
        background: #6ee7a0;
        transform: translateY(-1px);
        box-shadow: 0 4px 16px rgba(74, 222, 128, 0.3);
    }

    .btn-add-skill:active {
        transform: translateY(0);
    }

    .skills-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        min-height: 36px;
    }

    .skill-chip {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: var(--bg-surface);
        border: 1px solid var(--border);
        color: var(--text-primary);
        font-size: 12.5px;
        font-weight: 500;
        padding: 6px 12px;
        border-radius: 20px;
        transition: var(--transition);
        animation: popIn 0.2s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    .skill-chip:hover {
        border-color: var(--accent);
        background: var(--accent-glow);
        color: var(--accent);
    }

    .skill-chip-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--accent);
        flex-shrink: 0;
    }

    .skill-chip-remove {
        background: none;
        border: none;
        color: var(--text-muted);
        cursor: pointer;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        transition: var(--transition);
        font-size: 14px;
        line-height: 1;
    }

    .skill-chip:hover .skill-chip-remove {
        color: var(--danger);
        background: var(--danger-bg);
    }

    /* ── Skills Rows ── */
    .skills-row-item {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 12px;
        align-items: start;
        padding: 14px;
        background: var(--bg-surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        position: relative;
    }

    .skills-row-item+.skills-row-item {
        margin-top: 10px;
    }

    .skills-row-number {
        position: absolute;
        top: -9px;
        left: 14px;
        font-family: 'Syne', sans-serif;
        font-size: 10px;
        font-weight: 700;
        color: var(--accent);
        background: var(--bg-surface);
        padding: 0 6px;
        letter-spacing: 0.06em;
    }

    /* ── Social Links ── */
    .social-icon {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
    }

    /* ── Submit ── */
    .form-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 12px;
        padding-top: 24px;
        margin-top: 8px;
        border-top: 1px solid var(--border);
        animation: fadeUp 0.5s 0.35s ease both;
    }

    .btn-cancel {
        font-size: 13.5px;
        font-weight: 500;
        color: var(--text-secondary);
        background: transparent;
        border: 1px solid var(--border);
        padding: 11px 22px;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        font-family: 'DM Sans', sans-serif;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-cancel:hover {
        color: var(--text-primary);
        border-color: #3d4540;
        background: var(--bg-surface);
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--accent);
        color: #0a0c0b;
        font-family: 'Syne', sans-serif;
        font-size: 13.5px;
        font-weight: 800;
        letter-spacing: 0.04em;
        padding: 11px 28px;
        border: none;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        text-transform: uppercase;
    }

    .btn-save:hover {
        background: #6ee7a0;
        transform: translateY(-2px);
        box-shadow: 0 6px 24px rgba(74, 222, 128, 0.35);
    }

    .btn-save:active {
        transform: translateY(0);
        box-shadow: none;
    }

    .btn-save svg {
        width: 15px;
        height: 15px;
    }

    /* ── Animations ── */
    @keyframes fadeDown {
        from {
            opacity: 0;
            transform: translateY(-12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(16px);
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

    @keyframes popIn {
        from {
            opacity: 0;
            transform: scale(0.7);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* ── Divider ── */
    .skills-divider {
        height: 1px;
        background: var(--border);
        margin: 20px 0;
    }
</style>

<div class="edit-wrapper">
    <div class="edit-container">

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left">
                <span class="page-eyebrow">Admin Panel</span>
                <h1 class="page-title">Edit Portfolio</h1>
                <p class="page-subtitle">Manage your public-facing profile and content</p>
            </div>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div id="flashMessage" class="flash-message">
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

        <form action="<?= base_url('admin/landing/update') ?>" method="post" enctype="multipart/form-data"
            onsubmit="prepareExpertise()">

            <input type="hidden" name="id" value="<?= $landing['id'] ?>">
            <input type="hidden" name="existing_profile_image" value="<?= $landing['profile_image'] ?>">
            <input type="hidden" name="expertise" id="expertiseData">

            <!-- ── Profile ── -->
            <div class="section-card">
                <div class="section-label">Profile</div>
                <div class="profile-upload-area">
                    <div class="profile-avatar-wrap">
                        <?php if ($landing['profile_image']): ?>
                            <img src="<?= base_url('uploads/' . $landing['profile_image']) ?>" class="profile-avatar"
                                id="avatarPreview" alt="Profile">
                        <?php else: ?>
                            <div class="avatar-placeholder" id="avatarPlaceholder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="profile-upload-info">
                        <h4>Profile Photo</h4>
                        <p>Recommended: 400×400px JPG or PNG.<br>This appears as your avatar across the portfolio.</p>
                        <input type="file" name="profile_image" id="profile_image" class="hidden" accept="image/*"
                            onchange="previewImage(event)">
                        <label for="profile_image" class="upload-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="17 8 12 3 7 8" />
                                <line x1="12" y1="3" x2="12" y2="15" />
                            </svg>
                            Upload Photo
                        </label>
                    </div>
                </div>
            </div>

            <!-- ── Hero ── -->
            <div class="section-card">
                <div class="section-label">Hero Section</div>
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" value="<?= $landing['heading'] ?>" class="form-input"
                            placeholder="e.g. Full-Stack Developer">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Subheading</label>
                        <input type="text" name="subheading" value="<?= $landing['subheading'] ?>" class="form-input"
                            placeholder="e.g. Building digital experiences">
                    </div>
                    <div class="form-group full">
                        <label class="form-label">About Text</label>
                        <textarea name="about_text" class="form-textarea" rows="5"
                            placeholder="Write a short bio about yourself..."><?= $landing['about_text'] ?></textarea>
                    </div>
                    <div class="form-group full">
                        <label class="form-label">Address / Location</label>
                        <textarea name="address" class="form-textarea" rows="2"
                            placeholder="City, Country"><?= $landing['address'] ?></textarea>
                    </div>
                </div>
            </div>

            <!-- ── Expertise Tags ── -->
            <div class="section-card">
                <div class="section-label">My Expertise</div>
                <div class="expertise-input-row">
                    <input type="text" id="expertiseInput" class="form-input"
                        placeholder="Add a skill (e.g. PHP, React, Figma)"
                        onkeydown="if(event.key==='Enter'){event.preventDefault();addSkill();}">
                    <button type="button" class="btn-add-skill" onclick="addSkill()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Add
                    </button>
                </div>
                <div id="expertiseList" class="skills-chips"></div>
            </div>

            <!-- ── Skills ── -->
            <div class="section-card">
                <div class="section-label">Featured Skills</div>

                <div class="skills-row-item">
                    <span class="skills-row-number">SKILL 01</span>
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" name="sktitle" value="<?= $landing['sktitle'] ?>" class="form-input"
                            placeholder="e.g. Web Development">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <input type="text" name="skdesc" value="<?= $landing['skdesc'] ?>" class="form-input"
                            placeholder="Short description">
                    </div>
                </div>

                <div class="skills-row-item">
                    <span class="skills-row-number">SKILL 02</span>
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" name="sktitletwo" value="<?= $landing['sktitletwo'] ?>" class="form-input"
                            placeholder="e.g. UI/UX Design">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <input type="text" name="skdesctwo" value="<?= $landing['skdesctwo'] ?>" class="form-input"
                            placeholder="Short description">
                    </div>
                </div>

                <div class="skills-row-item">
                    <span class="skills-row-number">SKILL 03</span>
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" name="sktitlethree" value="<?= $landing['sktitlethree'] ?>"
                            class="form-input" placeholder="e.g. Backend Systems">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <input type="text" name="skdescthree" value="<?= $landing['skdescthree'] ?>" class="form-input"
                            placeholder="Short description">
                    </div>
                </div>
            </div>

            <!-- ── Contact & Socials ── -->
            <div class="section-card">
                <div class="section-label">Contact & Socials</div>
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="input-icon-wrap">
                            <span class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="2" y="4" width="20" height="16" rx="2" />
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                </svg>
                            </span>
                            <input type="text" name="email" value="<?= $landing['email'] ?>" class="form-input"
                                placeholder="you@email.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Link</label>
                        <input type="text" name="email_link" value="<?= $landing['email_link'] ?? '' ?>"
                            class="form-input" placeholder="mailto:you@email.com">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">GitHub Username</label>
                        <div class="input-icon-wrap">
                            <span class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M15 22v-4a4.8 4.8 0 0 0-1-3.2c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.4 5.4 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65S9.1 17.44 9 18v4" />
                                    <path d="M9 18c-4.51 2-5-2-7-2" />
                                </svg>
                            </span>
                            <input type="text" name="github_username" value="<?= $landing['github_username'] ?>"
                                class="form-input" placeholder="yourusername">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">GitHub Link</label>
                        <input type="text" name="github_link" value="<?= $landing['github_link'] ?? '' ?>"
                            class="form-input" placeholder="https://github.com/yourusername">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Facebook</label>
                        <div class="input-icon-wrap">
                            <span class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                </svg>
                            </span>
                            <input type="text" name="facebook" value="<?= $landing['facebook'] ?>" class="form-input"
                                placeholder="facebook.com/yourprofile">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Facebook Link</label>
                        <input type="text" name="facebook_link" value="<?= $landing['fb_link'] ?? '' ?>"
                            class="form-input" placeholder="https://facebook.com/yourprofile">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <div class="input-icon-wrap">
                            <span class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.5a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2.69h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 10a16 16 0 0 0 6.06 6.06l1.04-.87a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            </span>
                            <input type="text" name="phone_number" value="<?= $landing['phone_number'] ?>"
                                class="form-input" placeholder="+63 912 345 6789">
                        </div>
                    </div>
                </div>
            </div>

            <!-- ── Footer ── -->
            <div class="form-footer">
                <a href="<?= base_url('admin') ?>" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-save">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                        <polyline points="17 21 17 13 7 13 7 21" />
                        <polyline points="7 3 7 8 15 8" />
                    </svg>
                    Save Changes
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    let skills = <?= isset($landing['expertise']) ? $landing['expertise'] : '[]' ?>;

    function prepareExpertise() {
        document.getElementById('expertiseData').value = JSON.stringify(skills);
    }

    function renderSkills() {
        const container = document.getElementById('expertiseList');
        container.innerHTML = '';

        if (skills.length === 0) {
            container.innerHTML = '<span style="font-size:12px;color:var(--text-muted);padding:4px 0;">No skills added yet — type one above and hit Add.</span>';
            document.getElementById('expertiseData').value = '[]';
            return;
        }

        skills.forEach((skill, index) => {
            const chip = document.createElement('div');
            chip.className = 'skill-chip';
            chip.innerHTML = `
                <span class="skill-chip-dot"></span>
                <span>${skill}</span>
                <button type="button" class="skill-chip-remove" onclick="removeSkill(${index})" title="Remove">×</button>
            `;
            container.appendChild(chip);
        });

        document.getElementById('expertiseData').value = JSON.stringify(skills);
    }

    function addSkill() {
        const input = document.getElementById('expertiseInput');
        const value = input.value.trim();
        if (value !== '' && !skills.includes(value)) {
            skills.push(value);
            input.value = '';
            input.focus();
            renderSkills();
        } else if (skills.includes(value)) {
            input.style.borderColor = 'var(--danger)';
            setTimeout(() => input.style.borderColor = '', 1200);
        }
    }

    function removeSkill(index) {
        skills.splice(index, 1);
        renderSkills();
    }

    function previewImage(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (e) {
            let img = document.getElementById('avatarPreview');
            const placeholder = document.getElementById('avatarPlaceholder');
            if (!img) {
                img = document.createElement('img');
                img.id = 'avatarPreview';
                img.className = 'profile-avatar';
                img.alt = 'Profile';
                if (placeholder) placeholder.replaceWith(img);
            }
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    // Init
    renderSkills();
</script>

<?= $this->endSection() ?>