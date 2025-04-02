<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onetear Webshop</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="{{ asset('js/script.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-light-beige">
    <header class="bg-dark-blue shadow-md p-4 flex justify-between items-center text-white">
        <img src="{{ asset('img/onetear2_transparent_corrected.png') }}" alt="TechShop logo" class="h-20">
        <input type="text" placeholder="Keresés..." class="border p-2 rounded-md w-1/3">
        <div class="flex gap-6">
            <a href="{{ route('login') }}" class="icon-link">
                <i data-lucide="user" class="icon"></i>
            </a>
            <a href="#" class="icon-link relative">
                <i data-lucide="shopping-cart" class="icon"></i>
                <span class="cart-badge">0</span>
            </a>
        </div>
    </header>

    <main class="w-full">
        @yield('content')
    </main>

    <footer class="bg-dark-blue text-light-beige p-6 mt-12 text-center">
        <p>&copy; 2025 Onetear. Minden jog fenntartva.</p>
    </footer>
    </body>
</html>
