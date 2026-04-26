<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/fonts.css') ?>">
    <title>Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap');

        :root {
            --accent: #22c55e;
            --accent-dim: #16a34a;
            --accent-bright: #4ade80;
            --accent-glow: rgba(34, 197, 94, 0.12);
            --accent-glow-strong: rgba(34, 197, 94, 0.22);
            --glass-bg: rgba(10, 28, 18, 0.55);
            --glass-bg-hover: rgba(10, 28, 18, 0.72);
            --glass-border: rgba(120, 200, 140, 0.18);
            --glass-border-hover: rgba(74, 222, 128, 0.4);
            --text-primary: #e8f5ee;
            --text-secondary: rgba(200, 235, 215, 0.72);
            --text-muted: rgba(160, 210, 185, 0.55);
            --inner-bg: rgba(8, 22, 14, 0.45);
            --tag-bg: rgba(30, 70, 45, 0.6);
            --tag-text: rgba(160, 220, 185, 0.85);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .bento-root {
            padding: 1.5rem;
            min-height: 100vh;
            color: var(--text-primary);
        }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 14px;
            max-width: 900px;
            margin: 0 auto;
        }

        .bento-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 1.5rem;
            overflow: hidden;
            position: relative;
            opacity: 0;
            transform: translateY(24px) scale(0.97);
            transition: box-shadow 0.25s, border-color 0.25s, background 0.25s;
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .bento-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 24px;
            background: linear-gradient(135deg, rgba(74, 222, 128, 0.04) 0%, transparent 60%);
            pointer-events: none;
        }

        .bento-card:hover {
            background: var(--glass-bg-hover);
            border-color: var(--glass-border-hover);
            box-shadow: 0 0 0 1px rgba(74, 222, 128, 0.15), 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .card-hero {
            grid-column: span 7;
            grid-row: span 2;
            min-height: 300px;
            display: flex;
            flex-direction: column;
        }

        .card-status {
            grid-column: span 5;
            min-height: 140px;
        }

        .card-contact {
            grid-column: span 5;
            min-height: 140px;
        }

        .card-projects {
            grid-column: span 12;
            min-height: 180px;
        }

        .card-tech {
            grid-column: span 6;
            min-height: 150px;
        }

        .card-cta {
            grid-column: span 6;
            min-height: 150px;
            background: rgba(22, 163, 74, 0.18);
            border-color: rgba(74, 222, 128, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-cta:hover {
            background: rgba(22, 163, 74, 0.28);
            border-color: rgba(74, 222, 128, 0.55);
        }

        /* HERO */
        .hero-eyebrow {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1.25rem;
        }

        .hero-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent-bright);
            box-shadow: 0 0 8px var(--accent-bright);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
                box-shadow: 0 0 6px var(--accent-bright)
            }

            50% {
                opacity: 0.6;
                transform: scale(1.5);
                box-shadow: 0 0 14px var(--accent-bright)
            }
        }

        .hero-eyebrow span {
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--text-muted);
            font-weight: 500;
        }

        .hero-avatar-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: auto;
        }

        .hero-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 1.5px solid rgba(74, 222, 128, 0.35);
            background: rgba(22, 163, 74, 0.2);
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 16px;
            color: var(--accent-bright);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: auto;
        }

        .hero-name {
            font-family: 'Audiowide', sans-serif;
            font-size: 2.6rem;
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.03em;
            color: var(--text-primary);
        }

        .hero-name .dim {
            color: var(--text-muted);
            font-weight: 400;
            font-style: italic;
            font-size: 1.8rem;
            font-family: Agrandir, sans-serif;
        }

        .hero-bio {
            font-size: 14px;
            line-height: 1.65;
            color: var(--text-secondary);
            margin-top: auto;
            padding-top: 1.25rem;
            max-width: 340px;
        }

        .hero-accent {
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(34, 197, 94, 0.15), transparent 70%);
            pointer-events: none;
        }

        /* LABELS */
        .section-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 0.75rem;
        }

        /* STATUS */
        .status-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.3rem;
        }

        .status-sub {
            font-size: 13px;
            color: var(--text-secondary);
        }

        .location-flag {
            font-size: 18px;
            margin-right: 6px;
        }

        .status-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: var(--accent-glow-strong);
            border: 1px solid rgba(74, 222, 128, 0.3);
            border-radius: 100px;
            padding: 4px 12px;
            font-size: 12px;
            color: var(--accent-bright);
            font-weight: 500;
            margin-top: 0.75rem;
        }

        /* CONTACT */
        .contact-links {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-top: 0.5rem;
        }

        .contact-link {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: var(--text-secondary);
            text-decoration: none;
            padding: 7px 10px;
            border-radius: 10px;
            border: 1px solid transparent;
            transition: all 0.15s;
        }

        .contact-link:hover {
            background: var(--accent-glow);
            border-color: rgba(74, 222, 128, 0.2);
            color: var(--accent-bright);
        }

        .contact-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: var(--inner-bg);
            border: 1px solid var(--glass-border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            color: var(--text-muted);
        }

        /* PROJECTS */
        .projects-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .project-card {
            background: var(--inner-bg);
            border: 1px solid var(--glass-border);
            border-radius: 14px;
            padding: 1rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .project-card:hover {
            border-color: rgba(74, 222, 128, 0.4);
            background: rgba(34, 197, 94, 0.1);
        }

        .project-num {
            font-size: 11px;
            color: var(--accent-bright);
            font-weight: 600;
            letter-spacing: 0.05em;
            margin-bottom: 0.3rem;
        }

        .project-name {
            font-family: 'Syne', sans-serif;
            font-size: 14px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .project-desc {
            font-size: 12px;
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .project-tags {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
            margin-top: 0.5rem;
        }

        .tag {
            font-size: 10px;
            background: var(--tag-bg);
            color: var(--tag-text);
            border-radius: 6px;
            padding: 2px 7px;
            font-weight: 500;
        }

        /* TECH */
        .tech-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-top: 0.75rem;
        }

        .tech-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            padding: 10px 6px;
            background: var(--inner-bg);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            font-size: 10px;
            color: var(--text-secondary);
            font-weight: 500;
            transition: all 0.15s;
            cursor: default;
        }

        .tech-item:hover {
            border-color: rgba(74, 222, 128, 0.4);
            background: var(--accent-glow);
            color: var(--accent-bright);
        }

        .tech-logo {
            font-size: 18px;
            line-height: 1;
        }

        /* CTA */
        .cta-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.02em;
            line-height: 1.15;
        }

        .cta-sub {
            font-size: 13px;
            color: var(--text-secondary);
            margin-top: 4px;
        }

        .cta-accent-bar {
            width: 40px;
            height: 3px;
            background: var(--accent-bright);
            border-radius: 2px;
            margin-bottom: 0.75rem;
            box-shadow: 0 0 8px var(--accent);
        }

        .cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 100px;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
            width: fit-content;
            box-shadow: 0 0 16px rgba(34, 197, 94, 0.35);
        }

        .cta-btn:hover {
            background: var(--accent-dim);
            transform: scale(1.03);
            box-shadow: 0 0 22px rgba(34, 197, 94, 0.5);
        }

        .project-desc {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.5;
            color: #6b7280;
        }

        @media (max-width: 1024px) {
            .bento-grid {
                grid-template-columns: repeat(6, 1fr);
            }

            .card-hero {
                grid-column: span 6;
            }

            .card-status,
            .card-contact {
                grid-column: span 3;
            }

            .card-tech,
            .card-cta {
                grid-column: span 3;
            }

            .projects-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-name {
                font-size: 2.2rem;
            }
        }

        /* MOBILE */
        @media (max-width: 640px) {
            .bento-root {
                padding: 1rem;
            }

            .bento-grid {
                grid-template-columns: 1fr;
            }

            .bento-card {
                grid-column: span 1 !important;
                text-align: center;
            }

            .hero-eyebrow {
                justify-content: center;
            }

            .projects-row {
                grid-template-columns: 1fr;
            }

            .tech-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-name {
                font-size: 1.8rem;
            }

            .cta-title {
                font-size: 1.3rem;
            }
        }
    </style>
</head>

<body id="vanta-bg" class="min-vh-100">

    <div class="bento-root">
        <div class="bento-grid">

            <div class="bento-card card-hero" id="c1">

                <div class="hero-eyebrow">
                    <a href="<?= base_url('login') ?>">
                        <div class="hero-dot"></div>
                    </a>
                    <span>Online</span>
                    <a href="<?= base_url('about') ?>" class="hero-avatar-container">
                        <div class="hero-avatar">
                            Y
                        </div>
                    </a>
                </div>
                <div class="hero-name">
                    <?= esc($landing['heading']) ?><br>
                    <span class="dim"><?= esc($landing['subheading']) ?></span>
                </div>
                <p class="hero-bio">
                    <?= esc($landing['about_text']) ?>
                </p>
                <div class="hero-accent"></div>
            </div>

            <div class="bento-card card-status" id="c2">
                <div class="status-label">Based in</div>
                <div class="status-title"><span class="location-flag">🇵🇭</span>Philippines</div>
                <div class="status-sub"><?= esc($landing['address']) ?></div>
                <div class="status-chip">
                    <div class="hero-dot" style="width:6px;height:6px;"></div>
                    Open to remote work
                </div>
            </div>

            <div class="bento-card card-contact" id="c3">
                <div class="status-label">Get in touch</div>
                <div class="contact-links">
                    <a href="https://mail.google.com/mail/?view=cm&to=<?= esc($landing['email']) ?>" target="_blank"
                        class="contact-link">
                        <div class="contact-icon">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.75 5.25L3 6V18L3.75 18.75H20.25L21 18V6L20.25 5.25H3.75ZM4.5 7.6955V17.25H19.5V7.69525L11.9999 14.5136L4.5 7.6955ZM18.3099 6.75H5.68986L11.9999 12.4864L18.3099 6.75Z"
                                        fill="currentColor"></path>
                                </g>
                            </svg>
                        </div>
                        <?= esc($landing['email']) ?>
                    </a>
                    <a href="<?= esc($landing['github_link']) ?>" target="_blank" class="contact-link">
                        <div class="contact-icon"><svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M4.0744 2.9938C4.13263 1.96371 4.37869 1.51577 5.08432 1.15606C5.84357 0.768899 7.04106 0.949072 8.45014 1.66261C9.05706 1.97009 9.11886 1.97635 10.1825 1.83998C11.5963 1.65865 13.4164 1.65929 14.7213 1.84164C15.7081 1.97954 15.7729 1.97265 16.3813 1.66453C18.3814 0.651679 19.9605 0.71795 20.5323 1.8387C20.8177 2.39812 20.8707 3.84971 20.6494 5.04695C20.5267 5.71069 20.5397 5.79356 20.8353 6.22912C22.915 9.29385 21.4165 14.2616 17.8528 16.1155C17.5801 16.2574 17.3503 16.3452 17.163 16.4167C16.5879 16.6363 16.4133 16.703 16.6247 17.7138C16.7265 18.2 16.8491 19.4088 16.8973 20.4002C16.9844 22.1922 16.9831 22.2047 16.6688 22.5703C16.241 23.0676 15.6244 23.076 15.2066 22.5902C14.9341 22.2734 14.9075 22.1238 14.9075 20.9015C14.9075 19.0952 14.7095 17.8946 14.2417 16.8658C13.6854 15.6415 14.0978 15.185 15.37 14.9114C17.1383 14.531 18.5194 13.4397 19.2892 11.8146C20.0211 10.2698 20.1314 8.13501 18.8082 6.83668C18.4319 6.3895 18.4057 5.98446 18.6744 4.76309C18.7748 4.3066 18.859 3.71768 18.8615 3.45425C18.8653 3.03823 18.8274 2.97541 18.5719 2.97541C18.4102 2.97541 17.7924 3.21062 17.1992 3.49805L16.2524 3.95695C16.1663 3.99866 16.07 4.0147 15.975 4.0038C13.5675 3.72746 11.2799 3.72319 8.86062 4.00488C8.76526 4.01598 8.66853 3.99994 8.58215 3.95802L7.63585 3.49882C7.04259 3.21087 6.42482 2.97541 6.26317 2.97541C5.88941 2.97541 5.88379 3.25135 6.22447 4.89078C6.43258 5.89203 6.57262 6.11513 5.97101 6.91572C5.06925 8.11576 4.844 9.60592 5.32757 11.1716C5.93704 13.1446 7.4295 14.4775 9.52773 14.9222C10.7926 15.1903 11.1232 15.5401 10.6402 16.9905C10.26 18.1319 10.0196 18.4261 9.46707 18.4261C8.72365 18.4261 8.25796 17.7821 8.51424 17.1082C8.62712 16.8112 8.59354 16.7795 7.89711 16.5255C5.77117 15.7504 4.14514 14.0131 3.40172 11.7223C2.82711 9.95184 3.07994 7.64739 4.00175 6.25453C4.31561 5.78028 4.32047 5.74006 4.174 4.83217C4.09113 4.31822 4.04631 3.49103 4.0744 2.9938Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M3.33203 15.9454C3.02568 15.4859 2.40481 15.3617 1.94528 15.6681C1.48576 15.9744 1.36158 16.5953 1.66793 17.0548C1.8941 17.3941 2.16467 17.6728 2.39444 17.9025C2.4368 17.9449 2.47796 17.9858 2.51815 18.0257C2.71062 18.2169 2.88056 18.3857 3.05124 18.5861C3.42875 19.0292 3.80536 19.626 4.0194 20.6962C4.11474 21.1729 4.45739 21.4297 4.64725 21.5419C4.85315 21.6635 5.07812 21.7352 5.26325 21.7819C5.64196 21.8774 6.10169 21.927 6.53799 21.9559C7.01695 21.9877 7.53592 21.998 7.99999 22.0008C8.00033 22.5527 8.44791 23.0001 8.99998 23.0001C9.55227 23.0001 9.99998 22.5524 9.99998 22.0001V21.0001C9.99998 20.4478 9.55227 20.0001 8.99998 20.0001C8.90571 20.0001 8.80372 20.0004 8.69569 20.0008C8.10883 20.0026 7.34388 20.0049 6.67018 19.9603C6.34531 19.9388 6.07825 19.9083 5.88241 19.871C5.58083 18.6871 5.09362 17.8994 4.57373 17.2891C4.34391 17.0194 4.10593 16.7834 3.91236 16.5914C3.87612 16.5555 3.84144 16.5211 3.80865 16.4883C3.5853 16.265 3.4392 16.1062 3.33203 15.9454Z"
                                        fill="currentColor"></path>
                                </g>
                            </svg></div>
                        <?= esc($landing['github_username']) ?>
                    </a>
                    <a href="<?= esc($landing['fb_link']) ?>" target="_blank" class="contact-link">
                        <div class="contact-icon"><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                preserveAspectRatio="xMidYMid" width="24px" height="24px" viewBox="0 0 14.906 32">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M14.874,11.167 L14.262,14.207 C14.062,15.208 13.100,15.992 12.072,15.992 L10.000,15.992 L10.000,30.000 C10.000,31.104 9.159,32.000 8.049,32.000 L5.030,32.000 C3.920,32.000 3.017,31.102 3.017,29.999 L3.017,15.992 L2.011,15.992 C0.901,15.992 -0.002,15.095 -0.002,13.991 L-0.002,10.990 C-0.002,9.887 0.901,8.989 2.011,8.989 L3.017,8.989 L3.017,6.003 C3.017,2.716 5.693,0.041 8.994,0.013 C9.015,0.012 9.033,0.001 9.055,0.001 L13.081,0.001 C13.636,0.001 14.000,0.448 14.000,1.000 L14.000,6.000 C14.000,6.553 13.636,7.004 13.081,7.004 L10.061,7.004 L10.060,8.989 L13.079,8.989 C13.645,8.989 14.167,9.228 14.509,9.644 C14.852,10.059 14.985,10.615 14.874,11.167 ZM9.092,10.990 C9.078,10.991 9.067,10.998 9.053,10.998 L9.053,10.998 C8.497,10.997 8.046,10.549 8.047,9.997 L8.047,9.990 C8.047,9.990 8.047,9.990 8.047,9.990 C8.047,9.990 8.047,9.990 8.047,9.990 L8.049,6.003 C8.049,5.450 8.499,5.003 9.055,5.003 L12.074,5.003 L12.074,2.002 L9.094,2.002 C9.077,2.002 9.063,2.011 9.045,2.011 C6.831,2.011 5.030,3.802 5.030,6.003 L5.030,10.005 C5.030,10.558 4.579,11.006 4.023,11.006 C3.996,11.006 3.973,10.992 3.946,10.990 L2.011,10.990 L2.011,13.991 L4.023,13.991 C4.579,13.991 5.030,14.439 5.030,14.992 C5.030,15.044 5.008,15.088 5.000,15.138 L5.000,30.000 L8.049,29.999 L8.049,15.002 C8.049,14.998 8.047,14.995 8.047,14.992 C8.047,14.439 8.497,13.991 9.053,13.991 L12.072,13.991 C12.145,13.991 12.275,13.886 12.288,13.816 L12.857,10.990 L9.092,10.990 Z">
                                    </path>
                                </g>
                            </svg></div>
                        <?php echo esc($landing['facebook']); ?>
                    </a>
                </div>
            </div>

            <div class="bento-card card-projects" id="c4">
                <div class="flex items-center justify-between mb-3">
                    <div class="section-label">Projects</div>

                    <!-- clickable arrow -->
                    <a href="<?= base_url('projects') ?>" class="p-2 rounded-full hover:bg-white/10 transition group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="text-white group-hover:translate-x-1 group-hover:-translate-y-1 transition">
                            <path d="M7 17 17 7" />
                            <path d="M7 7h10v10" />
                        </svg>
                    </a>
                </div>
                <div class="projects-row">

                    <?php if (!empty($projects)): ?>
                        <?php $i = 1; ?>
                        <?php foreach ($projects as $project): ?>

                            <a href="<?= base_url('projects/' . $project['id']) ?>" class="project-card block">

                                <!-- number -->
                                <div class="project-num">
                                    <?= str_pad($i++, 2, '0', STR_PAD_LEFT) ?>
                                </div>

                                <!-- title -->
                                <div class="project-name">
                                    <?= esc($project['project_title']) ?>
                                </div>

                                <!-- description -->
                                <div class="project-desc">
                                    <?= esc($project['project_desc']) ?>
                                </div>

                                <!-- tags -->
                                <div class="project-tags">
                                    <?php $tags = explode(',', $project['project_cat']); ?>
                                    <?php foreach ($tags as $tag): ?>
                                        <span class="tag"><?= esc(trim($tag)) ?></span>
                                    <?php endforeach; ?>
                                </div>

                            </a>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">No projects found</p>
                    <?php endif; ?>

                </div>


            </div>

            <div class="bento-card card-tech" id="c5">
                <div class="section-label">Tech stack</div>
                <div class="tech-grid">

                    <?php if (!empty($expertise)): ?>
                        <?php foreach ($expertise as $skill): ?>
                            <div class="tech-item">
                                <?= esc($skill) ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-muted">No tech stack added</div>
                    <?php endif; ?>

                </div>
            </div>

            <div class="bento-card card-cta" id="c6">
                <div>
                    <div class="cta-accent-bar"></div>
                    <div class="cta-title">Let's build<br>something.</div>
                    <div class="cta-sub">Open for new adventures.</div>
                </div>
                <button class="cta-btn" onclick="window.location='<?= base_url('uploads/' . $resume['filename']) ?>'">
                    Download My Resume ↓
                </button>
            </div>

        </div>
    </div>

    <script>
        const cards = document.querySelectorAll('.bento-card');
        const delays = [0, 100, 180, 260, 360, 440];
        cards.forEach((card, i) => {
            setTimeout(() => {
                card.style.transition = 'opacity 0.6s cubic-bezier(0.16,1,0.3,1), transform 0.6s cubic-bezier(0.16,1,0.3,1), box-shadow 0.2s, border-color 0.2s';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) scale(1)';
            }, delays[i] || i * 80);
        });
    </script>

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

    <script src="js/gsap.min.js"> </script>
</body>

</html>