<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100 dark:bg-gray-900">
<head>
    <meta charset="UTF-8">
    <title>Site Under Maintenance1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Refresh fallback -->
    <meta http-equiv="refresh" content="60">

    <!-- Countdown Timer Script -->
    <script>
        let seconds = 60;
        const countdown = () => {
            if (seconds > 0) {
                seconds--;
                document.getElementById('counter').innerText = seconds + ' sec';
            } else {
                location.reload();
            }
        };
        setInterval(countdown, 1000);
    </script>
</head>
<body class="h-full flex items-center justify-center text-gray-800 dark:text-gray-200 transition-colors">
    <div class="text-center space-y-6 px-4 max-w-xl">
        <!-- Logo -->
        <img src="maintenece.jpg" alt="Logo" class="mx-auto mb-4 rounded-full shadow-lg">

        <!-- Title -->
        <h1 class="text-4xl font-bold">🚧 Maintenance Mode</h1>

        <!-- Message -->
        <p class="text-lg">
            Our site is currently under maintenance.<br>Please check back shortly.
        </p>

        <p class="text-lg text-yellow-500 font-medium">
            ہم اپنی ویب سائٹ کو بہتر بنا رہے ہیں۔ براہ کرم کچھ دیر بعد دوبارہ چیک کریں۔
        </p>

        <!-- Retry Timer -->
        <p class="text-sm">Auto refresh in <span id="counter">60 sec</span>...</p>

        <!-- Retry Button -->
        <button onclick="location.reload()" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow-md transition">
            🔁 Retry Now
        </button>
    </div>

</body>
</html>
