<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CMS</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
        --radius: 14px;
        --radius-sm: 10px;
        --transition: all 0.2s ease;
    }
 
    * { box-sizing: border-box; margin: 0; padding: 0; }
 
    .sidebar {
        width: 240px;
        min-height: 100vh;
        background: var(--bg-card);
        border-right: 1.5px solid var(--border);
        display: flex;
        flex-direction: column;
        padding: 0;
        font-family: 'DM Sans', sans-serif;
        position: relative;
        overflow: hidden;
    }
 
    /* Subtle green top edge */
    .sidebar::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--accent), #86efac);
    }
 
    /* ── Brand ── */
    .sidebar-brand {
        padding: 28px 20px 22px;
        display: flex;
        align-items: center;
        gap: 11px;
        border-bottom: 1.5px solid var(--border);
    }
 
    .brand-icon {
        width: 36px;
        height: 36px;
        background: var(--accent);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 2px 10px rgba(34,197,94,0.25);
    }
 
    .brand-icon svg {
        width: 18px;
        height: 18px;
        color: #fff;
    }
 
    .brand-text {
        display: flex;
        flex-direction: column;
    }
 
    .brand-name {
        font-family: 'Syne', sans-serif;
        font-size: 15px;
        font-weight: 800;
        color: var(--text-primary);
        letter-spacing: -0.02em;
        line-height: 1;
    }
 
    .brand-sub {
        font-size: 11px;
        color: var(--text-muted);
        margin-top: 2px;
        letter-spacing: 0.01em;
    }
 
    /* ── Nav ── */
    .sidebar-nav {
        flex: 1;
        padding: 16px 12px;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
 
    .nav-section-label {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--text-muted);
        padding: 10px 10px 6px;
        margin-top: 4px;
    }
 
    .nav-link {
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 10px 12px;
        border-radius: var(--radius-sm);
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 13.5px;
        font-weight: 500;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }
 
    .nav-link::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--accent-glow);
        opacity: 0;
        transition: var(--transition);
        border-radius: var(--radius-sm);
    }
 
    .nav-link:hover {
        color: var(--accent-dim);
        background: var(--accent-glow);
    }
 
    .nav-link:hover .nav-icon {
        color: var(--accent);
    }
 
    /* Active state */
    .nav-link.active {
        background: var(--accent-glow);
        color: var(--accent-dim);
        font-weight: 600;
    }
 
    .nav-link.active .nav-icon {
        color: var(--accent);
    }
 
    .nav-link.active::after {
        content: '';
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 6px;
        height: 6px;
        background: var(--accent);
        border-radius: 50%;
    }
 
    .nav-icon {
        width: 18px;
        height: 18px;
        color: var(--text-muted);
        flex-shrink: 0;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }
 
    .nav-icon svg {
        width: 18px;
        height: 18px;
    }
 
    .nav-label {
        flex: 1;
        position: relative;
        z-index: 1;
    }
 
    /* ── Sidebar Footer ── */
    .sidebar-footer {
        padding: 16px 12px 20px;
        border-top: 1.5px solid var(--border);
    }
 
    /* User info block */
    .sidebar-user {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 10px 14px;
    }
 
    .user-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: linear-gradient(135deg, #bbf7d0, #4ade80);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        font-weight: 800;
        color: #15803d;
        flex-shrink: 0;
    }
 
    .user-info { flex: 1; min-width: 0; }
 
    .user-name {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-primary);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
 
    .user-role {
        font-size: 11px;
        color: var(--text-muted);
    }
 
    .btn-logout {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 10px 16px;
        background: var(--bg-surface);
        border: 1.5px solid var(--border);
        border-radius: var(--radius-sm);
        color: var(--text-secondary);
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: var(--transition);
    }
 
    .btn-logout:hover {
        background: rgba(239,68,68,0.06);
        border-color: rgba(239,68,68,0.25);
        color: var(--danger);
    }
 
    .btn-logout:hover .logout-icon {
        color: var(--danger);
    }
 
    .logout-icon {
        width: 15px;
        height: 15px;
        color: var(--text-muted);
        transition: var(--transition);
        flex-shrink: 0;
    }
 
    /* ── Animations ── */
    .sidebar-brand,
    .nav-link,
    .sidebar-footer {
        animation: fadeIn 0.35s ease both;
    }
 
    .nav-link:nth-child(1) { animation-delay: 0.05s; }
    .nav-link:nth-child(2) { animation-delay: 0.10s; }
    .nav-link:nth-child(3) { animation-delay: 0.15s; }
 
    @keyframes fadeIn {
        from { opacity: 0; transform: translateX(-8px); }
        to   { opacity: 1; transform: translateX(0); }
    }
</style>
</head>

<body class="flex h-screen">

<!-- SIDEBAR -->
<aside class="sidebar">
 
    <!-- Brand -->
    <div class="sidebar-brand">
        <div class="brand-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
        </div>
        <div class="brand-text">
            <span class="brand-name">Portfolio CMS</span>
            <span class="brand-sub">Admin Panel</span>
        </div>
    </div>
 
    <!-- Nav -->
    <nav class="sidebar-nav">
        <span class="nav-section-label">Manage</span>
 
        <a href="<?= base_url('editcontent') ?>" class="nav-link">
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
            </span>
            <span class="nav-label">Edit Content</span>
        </a>
 
        <a href="<?= base_url('editproject') ?>" class="nav-link">
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/><line x1="12" y1="12" x2="12" y2="16"/><line x1="10" y1="14" x2="14" y2="14"/></svg>
            </span>
            <span class="nav-label">Projects</span>
        </a>

        <a href="<?= base_url('admin') ?>" class="nav-link">
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><circle cx="10" cy="13" r="2"/><path d="M7 18c0-2.2 1.3-4 3-4h1"/></svg>
            </span>
            <span class="nav-label">Resume</span>
        </a>
 
    </nav>
 
    <!-- Footer -->
    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="user-avatar">A</div>
            <div class="user-info">
                <div class="user-name">Admin</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>
        <a href="<?= base_url('logout') ?>" class="btn-logout">
            <svg class="logout-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            Sign Out
        </a>
    </div>
 
</aside>

<main class="flex-1 p-10 bg-gray-100 overflow-y-auto">

<?= $this->renderSection('content') ?>

</main>

</body>
</html>