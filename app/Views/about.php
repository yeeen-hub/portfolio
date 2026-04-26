<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/fonts.css') ?>">
  <title>About</title>
  <style>
    :root {
      --accent: #22c55e;
      --accent-dim: white;
      --accent-bright: rgba(10, 28, 18, 0.55);
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
    }

    @keyframes scroll {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-50%);
      }
    }

    .animate-scroll {
      display: flex;
      animation: scroll 28s linear infinite;
      width: max-content;
    }

    /* Avatar */
    .hero-avatar-wrap {
      flex-shrink: 0;
      position: relative;
    }

    .hero-avatar-wrap::before {
      content: '';
      position: absolute;
      inset: -4px;
      border-radius: 50%;
      background: conic-gradient(var(--accent-bright), var(--accent-dim), transparent, var(--accent-bright));
      animation: spin 6s linear infinite;
      opacity: 0.6;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    .hero-avatar {
  width: 250px;
  height: 250px;
  border-radius: 50%;
  object-fit: cover;
  border: 4px solid white;
  position: relative;
  z-index: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #0e2318, #1a4028);
  font-family: 'Syne', sans-serif;
  font-size: 2.5rem;
  font-weight: 800;
  color: var(--accent-bright);
}
  </style>
</head>

<body id="vanta-bg" class="">
  <div class="position-relative min-vh-100 d-flex align-items-center justify-content-center pt-5">

    <div class="absolute top-20 right-10">
      <a href="<?= base_url('home') ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#ffffff"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-layout-panel-left-icon lucide-layout-panel-left">
          <rect width="7" height="18" x="3" y="3" rx="1" />
          <rect width="7" height="7" x="14" y="3" rx="1" />
          <rect width="7" height="7" x="14" y="14" rx="1" />
        </svg>
      </a>
    </div>

    <div class="container-sm text-white fade-in">

      <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-5 ">
        <div class="col-md-8">

          <h1 class="fw-bold text-white" style="
                    font-size: 4.5rem;
                    font-family: 'Audiowide', sans-serif;
                    text-shadow: 6px 6px 12px rgba(0,0,0,0.35),
                                -3px -3px 10px rgba(255,255,255,0.15);
                ">
            <?= esc($landing['heading']) ?>
          </h1>

          <p class="d-inline-block mt-8 px-4 py-2 rounded-pill fw-medium text-success bg-white"
            style="border-radius: 50px; box-shadow: 6px 6px 12px rgba(0, 0, 0, 0.34), -6px -6px 12px rgba(255, 255, 255, 0.37);color: #0b3e10; font-family:'Agrandir', sans-serif;">
            <?= esc($landing['subheading']) ?>
          </p>

          <p class="fs-5 mt-3" style="font-family:'Agrandir', sans-serif;">
            <?= esc($landing['about_text']) ?>
          </p>

        </div>

        <div class="hero-avatar-wrap">
          <img src="<?= base_url('uploads/' . $landing['profile_image']) ?>" class="hero-avatar" >
        </div>

      </div>

      <div class="mt-4">

        <div class="relative overflow-hidden">

          <!-- soft fade edges -->
          <div class="absolute left-0 top-0 h-full w-20 bg-gradient-to-r from-white to-transparent z-10"></div>
          <div class="absolute right-0 top-0 h-full w-20 bg-gradient-to-l from-white to-transparent z-10"></div>

          <div class="flex items-center w-max animate-scroll gap-4">

            <!-- LOOP 1 -->
            <?php if (!empty($expertise)): ?>
              <?php foreach ($expertise as $skill): ?>
                <div class="px-4 py-2 rounded-full bg-gray-100 border border-gray-200 
                             text-sm font-medium 
                            hover:bg-green-50 hover:border-green-300 
                            hover:text-green-600 transition whitespace-nowrap shadow-sm" style="color: #0b3e10">
                  <?= esc($skill) ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

            <!-- LOOP 2 (for infinite effect) -->
            <?php if (!empty($expertise)): ?>
              <?php foreach ($expertise as $skill): ?>
                <div class="px-4 py-2 rounded-full bg-gray-100 border border-gray-200 
                            text-gray-700 text-sm font-medium 
                            hover:bg-green-50 hover:border-green-300 
                            hover:text-green-600 transition whitespace-nowrap shadow-sm">
                  <?= esc($skill) ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

          </div>
        </div>

      </div>

      <!-- Contact Information -->
      <div style="margin-top: 3rem;">

        <div class="d-flex justify-content-between align-items-center p-3 border rounded"style="
        background: linear-gradient(135deg, rgba(255,255,255,0.12), rgba(255,255,255,0.04));
        backdrop-filter: blur(20px) saturate(160%);
        -webkit-backdrop-filter: blur(20px) saturate(160%);
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 16px;

        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.25);

        transform: translateY(20px) scale(0.97);
        transition: all 0.3s ease;
        ">


          <div class="d-flex align-items-center gap-3">

            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle"
              style="width:48px; height:48px;">
              <svg width="34px" height="34px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M3.75 5.25L3 6V18L3.75 18.75H20.25L21 18V6L20.25 5.25H3.75ZM4.5 7.6955V17.25H19.5V7.69525L11.9999 14.5136L4.5 7.6955ZM18.3099 6.75H5.68986L11.9999 12.4864L18.3099 6.75Z"
                    fill="#0A1C12"></path>
                </g>
              </svg>
            </div>
            <div>
              <h6 class="fw-bold mb-0 text-light">Email</h6>
              <a href="https://mail.google.com/mail/?view=cm&to=<?= esc($landing['email']) ?>" target="_blank"
                class="text-sm text-gray-100">
                <?= esc($landing['email']) ?>
              </a>
            </div>
          </div>

          <div class="d-flex align-items-center gap-3">

            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle"
              style="width:48px; height:48px;">
              <svg width="34px" height="34px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path
                    d="M3 5.5C3 14.0604 9.93959 21 18.5 21C18.8862 21 19.2691 20.9859 19.6483 20.9581C20.0834 20.9262 20.3009 20.9103 20.499 20.7963C20.663 20.7019 20.8185 20.5345 20.9007 20.364C21 20.1582 21 19.9181 21 19.438V16.6207C21 16.2169 21 16.015 20.9335 15.842C20.8749 15.6891 20.7795 15.553 20.6559 15.4456C20.516 15.324 20.3262 15.255 19.9468 15.117L16.74 13.9509C16.2985 13.7904 16.0777 13.7101 15.8683 13.7237C15.6836 13.7357 15.5059 13.7988 15.3549 13.9058C15.1837 14.0271 15.0629 14.2285 14.8212 14.6314L14 16C11.3501 14.7999 9.2019 12.6489 8 10L9.36863 9.17882C9.77145 8.93713 9.97286 8.81628 10.0942 8.64506C10.2012 8.49408 10.2643 8.31637 10.2763 8.1317C10.2899 7.92227 10.2096 7.70153 10.0491 7.26005L8.88299 4.05321C8.745 3.67376 8.67601 3.48403 8.55442 3.3441C8.44701 3.22049 8.31089 3.12515 8.15802 3.06645C7.98496 3 7.78308 3 7.37932 3H4.56201C4.08188 3 3.84181 3 3.63598 3.09925C3.4655 3.18146 3.29814 3.33701 3.2037 3.50103C3.08968 3.69907 3.07375 3.91662 3.04189 4.35173C3.01413 4.73086 3 5.11378 3 5.5Z"
                    stroke="#0A1C12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
              </svg>
            </div>
            <div>
              <h6 class="fw-bold mb-0 text-light">Phone Number</h6>
              <small> <?= esc($landing['phonenumber']) ?> </small>
            </div>
          </div>

          <div class="d-flex align-items-center gap-3">

            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle"
              style="width:48px; height:48px;">
              <svg fill="#0A1C12" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="34px"
                height="34px" viewBox="0 0 14.906 32">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path
                    d="M14.874,11.167 L14.262,14.207 C14.062,15.208 13.100,15.992 12.072,15.992 L10.000,15.992 L10.000,30.000 C10.000,31.104 9.159,32.000 8.049,32.000 L5.030,32.000 C3.920,32.000 3.017,31.102 3.017,29.999 L3.017,15.992 L2.011,15.992 C0.901,15.992 -0.002,15.095 -0.002,13.991 L-0.002,10.990 C-0.002,9.887 0.901,8.989 2.011,8.989 L3.017,8.989 L3.017,6.003 C3.017,2.716 5.693,0.041 8.994,0.013 C9.015,0.012 9.033,0.001 9.055,0.001 L13.081,0.001 C13.636,0.001 14.000,0.448 14.000,1.000 L14.000,6.000 C14.000,6.553 13.636,7.004 13.081,7.004 L10.061,7.004 L10.060,8.989 L13.079,8.989 C13.645,8.989 14.167,9.228 14.509,9.644 C14.852,10.059 14.985,10.615 14.874,11.167 ZM9.092,10.990 C9.078,10.991 9.067,10.998 9.053,10.998 L9.053,10.998 C8.497,10.997 8.046,10.549 8.047,9.997 L8.047,9.990 C8.047,9.990 8.047,9.990 8.047,9.990 C8.047,9.990 8.047,9.990 8.047,9.990 L8.049,6.003 C8.049,5.450 8.499,5.003 9.055,5.003 L12.074,5.003 L12.074,2.002 L9.094,2.002 C9.077,2.002 9.063,2.011 9.045,2.011 C6.831,2.011 5.030,3.802 5.030,6.003 L5.030,10.005 C5.030,10.558 4.579,11.006 4.023,11.006 C3.996,11.006 3.973,10.992 3.946,10.990 L2.011,10.990 L2.011,13.991 L4.023,13.991 C4.579,13.991 5.030,14.439 5.030,14.992 C5.030,15.044 5.008,15.088 5.000,15.138 L5.000,30.000 L8.049,29.999 L8.049,15.002 C8.049,14.998 8.047,14.995 8.047,14.992 C8.047,14.439 8.497,13.991 9.053,13.991 L12.072,13.991 C12.145,13.991 12.275,13.886 12.288,13.816 L12.857,10.990 L9.092,10.990 Z">
                  </path>
                </g>
              </svg>
            </div>
            <div>
              <h6 class="fw-bold mb-0 text-light">Facebook</h6>
              <a href="<?= esc($landing['fb_link']) ?>" target="_blank" class="text-sm text-gray-100">
                <?= esc($landing['facebook']) ?>
              </a>
            </div>
          </div>

          <div class="d-flex align-items-center gap-3">

            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle"
              style="width:48px; height:48px;">
              <svg width="34px" height="34px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path
                    d="M4.0744 2.9938C4.13263 1.96371 4.37869 1.51577 5.08432 1.15606C5.84357 0.768899 7.04106 0.949072 8.45014 1.66261C9.05706 1.97009 9.11886 1.97635 10.1825 1.83998C11.5963 1.65865 13.4164 1.65929 14.7213 1.84164C15.7081 1.97954 15.7729 1.97265 16.3813 1.66453C18.3814 0.651679 19.9605 0.71795 20.5323 1.8387C20.8177 2.39812 20.8707 3.84971 20.6494 5.04695C20.5267 5.71069 20.5397 5.79356 20.8353 6.22912C22.915 9.29385 21.4165 14.2616 17.8528 16.1155C17.5801 16.2574 17.3503 16.3452 17.163 16.4167C16.5879 16.6363 16.4133 16.703 16.6247 17.7138C16.7265 18.2 16.8491 19.4088 16.8973 20.4002C16.9844 22.1922 16.9831 22.2047 16.6688 22.5703C16.241 23.0676 15.6244 23.076 15.2066 22.5902C14.9341 22.2734 14.9075 22.1238 14.9075 20.9015C14.9075 19.0952 14.7095 17.8946 14.2417 16.8658C13.6854 15.6415 14.0978 15.185 15.37 14.9114C17.1383 14.531 18.5194 13.4397 19.2892 11.8146C20.0211 10.2698 20.1314 8.13501 18.8082 6.83668C18.4319 6.3895 18.4057 5.98446 18.6744 4.76309C18.7748 4.3066 18.859 3.71768 18.8615 3.45425C18.8653 3.03823 18.8274 2.97541 18.5719 2.97541C18.4102 2.97541 17.7924 3.21062 17.1992 3.49805L16.2524 3.95695C16.1663 3.99866 16.07 4.0147 15.975 4.0038C13.5675 3.72746 11.2799 3.72319 8.86062 4.00488C8.76526 4.01598 8.66853 3.99994 8.58215 3.95802L7.63585 3.49882C7.04259 3.21087 6.42482 2.97541 6.26317 2.97541C5.88941 2.97541 5.88379 3.25135 6.22447 4.89078C6.43258 5.89203 6.57262 6.11513 5.97101 6.91572C5.06925 8.11576 4.844 9.60592 5.32757 11.1716C5.93704 13.1446 7.4295 14.4775 9.52773 14.9222C10.7926 15.1903 11.1232 15.5401 10.6402 16.9905C10.26 18.1319 10.0196 18.4261 9.46707 18.4261C8.72365 18.4261 8.25796 17.7821 8.51424 17.1082C8.62712 16.8112 8.59354 16.7795 7.89711 16.5255C5.77117 15.7504 4.14514 14.0131 3.40172 11.7223C2.82711 9.95184 3.07994 7.64739 4.00175 6.25453C4.31561 5.78028 4.32047 5.74006 4.174 4.83217C4.09113 4.31822 4.04631 3.49103 4.0744 2.9938Z"
                    fill="#0A1C12"></path>
                  <path
                    d="M3.33203 15.9454C3.02568 15.4859 2.40481 15.3617 1.94528 15.6681C1.48576 15.9744 1.36158 16.5953 1.66793 17.0548C1.8941 17.3941 2.16467 17.6728 2.39444 17.9025C2.4368 17.9449 2.47796 17.9858 2.51815 18.0257C2.71062 18.2169 2.88056 18.3857 3.05124 18.5861C3.42875 19.0292 3.80536 19.626 4.0194 20.6962C4.11474 21.1729 4.45739 21.4297 4.64725 21.5419C4.85315 21.6635 5.07812 21.7352 5.26325 21.7819C5.64196 21.8774 6.10169 21.927 6.53799 21.9559C7.01695 21.9877 7.53592 21.998 7.99999 22.0008C8.00033 22.5527 8.44791 23.0001 8.99998 23.0001C9.55227 23.0001 9.99998 22.5524 9.99998 22.0001V21.0001C9.99998 20.4478 9.55227 20.0001 8.99998 20.0001C8.90571 20.0001 8.80372 20.0004 8.69569 20.0008C8.10883 20.0026 7.34388 20.0049 6.67018 19.9603C6.34531 19.9388 6.07825 19.9083 5.88241 19.871C5.58083 18.6871 5.09362 17.8994 4.57373 17.2891C4.34391 17.0194 4.10593 16.7834 3.91236 16.5914C3.87612 16.5555 3.84144 16.5211 3.80865 16.4883C3.5853 16.265 3.4392 16.1062 3.33203 15.9454Z"
                    fill="#0A1C12"></path>
                </g>
              </svg>
            </div>
            <div>
              <h6 class="fw-bold mb-0 text-light">GitHub</h6>
              <a href="<?= esc($landing['github_link']) ?>" target="_blank" class="text-sm text-gray-100">
                <?= esc($landing['github_username']) ?>
              </a>
            </div>
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