<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/fonts.css') ?>">
    <title>Menu</title>
</head>

<body id="vanta-bg" class=" h-screen">
    <div class="h-screen flex">
        <nav class="w-1/4 ml-32 flex flex-col justify-center pl-16">
            <div class="col-md-8 mb-4 mb-md-0 fade-in">
                <div class="col-md-4 text-md-startfade-in">
                    <ul class="space-y-6 text-6xl text-gray-300" style="font-family:'Audiowide', sans-serif;">
                        <li>
                            <a href="<?= base_url('home') ?>" class="text-decoration-none transition-all" style="
                            color: rgba(255,255,255,0.6);
                            text-shadow: 3px 3px 8px rgba(0,0,0,0.4),
                                        -2px -2px 6px rgba(255,255,255,0.12);
                            transition: color 0.3s ease, transform 0.3s ease;
                            " onmouseover="this.style.color='white'; this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.color='rgba(255,255,255,0.6)'; this.style.transform='translateY(0)'">
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('about') ?>" class="text-decoration-none" style="
                        color: rgba(255,255,255,0.6);
                        text-shadow: 3px 3px 8px rgba(0,0,0,0.4),
                                    -2px -2px 6px rgba(255,255,255,0.12);
                        transition: color 0.3s ease, transform 0.3s ease;
                        " onmouseover="this.style.color='white'; this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.color='rgba(255,255,255,0.6)'; this.style.transform='translateY(0)'">
                                About
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('projects') ?>" class="text-decoration-none" style="
                        color: rgba(255,255,255,0.6);
                        text-shadow: 3px 3px 8px rgba(0,0,0,0.4),
                                    -2px -2px 6px rgba(255,255,255,0.12);
                        transition: color 0.3s ease, transform 0.3s ease;
                        " onmouseover="this.style.color='white'; this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.color='rgba(255,255,255,0.6)'; this.style.transform='translateY(0)'">
                                Projects
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="flex-1 flex items-center justify-center relative">

            <div class="absolute top-20 right-10">
                <a href="<?= base_url('menu') ?>">
                    <svg width="34px" height="34px" viewBox="0 0 24 24" fill="none">
                        <path d="M4 4H8V8H4V4Z" fill="#fff"></path>
                        <path d="M4 10H8V14H4V10Z" fill="#fff"></path>
                        <path d="M8 16H4V20H8V16Z" fill="#fff"></path>
                        <path d="M10 4H14V8H10V4Z" fill="#fff"></path>
                        <path d="M14 10H10V14H14V10Z" fill="#fff"></path>
                        <path d="M10 16H14V20H10V16Z" fill="#fff"></path>
                        <path d="M20 4H16V8H20V4Z" fill="#fff"></path>
                        <path d="M16 10H20V14H16V10Z" fill="#fff"></path>
                        <path d="M20 16H16V20H20V16Z" fill="#fff"></path>
                    </svg>
                </a>
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