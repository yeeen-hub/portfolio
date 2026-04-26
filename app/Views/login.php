<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/fonts.css') ?>">
    <title>Login</title>
</head>

<body id="vanta-bg" class=" h-screen">
    <div class="h-screen flex">

        <div class="w-1/4 ml-32 mt-60 flex flex-col space-y-8"
            style="font-family:'Audiowide', sans-serif; color: #fff;">

            <h1 class="text-4xl font-bold">Login</h1>
            <hr class="border-white">

            <div class="mt-4">
                <form action="<?= base_url('login/authenticate') ?>" method="post">

                    <!-- Username -->
                    <div class="flex items-center space-x-3">
                        <input type="text" name="username" placeholder="Username"
                            class="w-full px-4 py-2 rounded bg-gray-200 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500"
                            style="font-family:'Agrandir', sans-serif; color: black;" required>
                    </div>

                    <!-- Password -->
                    <div class="flex items-center space-x-3 mt-4">
                        <input type="password" name="password" placeholder="Password"
                            class="w-full px-4 py-2 rounded bg-gray-200 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500"
                            style="font-family:'Agrandir', sans-serif; color: black;" required>
                    </div>

                    <!-- Login Button -->
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                            style="font-family:'Agrandir', sans-serif;">
                            Login
                        </button>
                    </div>

                </form>
            </div>

        </div>

        <div class="flex-1 flex items-center justify-center relative">

            <div class="absolute top-20 right-10">
                <a href="<?= base_url('home') ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none"
                        stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-layout-panel-left-icon lucide-layout-panel-left">
                        <rect width="7" height="18" x="3" y="3" rx="1" />
                        <rect width="7" height="7" x="14" y="3" rx="1" />
                        <rect width="7" height="7" x="14" y="14" rx="1" />
                    </svg>
                </a>
            </div>

        </div>
    </div>

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