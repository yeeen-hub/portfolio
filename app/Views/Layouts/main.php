<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<header class="bg-blue-600 text-white p-4">
    <h1 class="text-3xl font-bold">My Portfolio</h1>
</header>

<main class="p-6">
    <?= $this->renderSection('content') ?>
</main>

<footer class="bg-gray-800 text-white p-4 text-center">
    &copy; 2026 My Portfolio
</footer>

</body>
</html>