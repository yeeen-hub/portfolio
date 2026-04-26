<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/fonts.css') ?>">
    <title>Projects</title>
</head>

<body id="vanta-bg" class="min-vh-100">

    <div class="container-fluid h-100 text-white" style="font-family:'Audiowide', sans-serif;">

        <div class="position-absolute" style="top: 80px; right: 40px;">
            <a href="<?= base_url('home') ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-panel-left-icon lucide-layout-panel-left"><rect width="7" height="18" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/></svg>
            </a>
        </div>


        <div class="row min-vh-100 align-items-center">

            <div class="col-md-6 mb-4 mb-md-0 fade-in">

                <div class="d-flex flex-column justify-content-center" style="padding-left: 80px;">

                    <h1 class="fw-bold mb-2" style="font-size:2.5rem;
                text-shadow:3px 3px 8px rgba(0,0,0,0.4),
                -2px -2px 6px rgba(255,255,255,0.12);">
                        Projects
                    </h1>

                    <hr class="border border-white opacity-50 mb-4">

                    <!-- LIST -->
                    <div class="d-flex flex-column gap-3 overflow-auto" style="max-height: 55vh;">

                        <?php foreach ($projects as $project): ?>
                            <div class="d-flex justify-content-between align-items-center py-2 px-3 rounded project-item"
                                style="cursor:pointer; transition:0.3s;
                               font-size:1.5rem;
                               font-family:'Audiowide', sans-serif;
                               background: rgba(255,255,255,0.05);" data-img="<?= $project['project_image'] ?>"
                                data-url="<?= base_url('projects/' . $project['id']) ?>">

                                <span class="fw-bold text-white">
                                    <?= esc($project['project_title']) ?>
                                </span>

                                <span class="text-white-50" style="font-family:'Agrandir', sans-serif; font-size:1.1rem;">
                                    <?= esc($project['project_cat']) ?>
                                </span>

                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

            <!-- RIGHT SIDE (PREVIEW) -->
            <div class="col-md-4 d-flex justify-content-center align-items-center fade-in">

                <div id="project-preview" class="d-flex justify-content-center align-items-center"
                    style="width: 80%; max-width: 500px; height: 550px; ">
                </div>

            </div>

        </div>


    </div>

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
        const projects = document.querySelectorAll('.project-item');
        const preview = document.getElementById('project-preview');

        projects.forEach(item => {
            // Hover: show image
            item.addEventListener('mouseenter', () => {
                const imgSrc = item.getAttribute('data-img');
                preview.classList.remove('hidden');
                preview.innerHTML = `<img src="<?= base_url('uploads/') ?>/${imgSrc}" style="max-width:100%; max-height:100%; object-fit:contain; margin-left:5rem" class="transition-transform duration-300 scale-105">`;
            });

            // Leave: hide preview
            item.addEventListener('mouseleave', () => {
                preview.classList.add('hidden');
                preview.innerHTML = '';
            });

            // Click: navigate to project page
            item.addEventListener('click', () => {
                const url = item.getAttribute('data-url');
                window.location.href = url;
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>

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