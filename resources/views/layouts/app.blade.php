<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onetear Webshop</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')
    @vite('resources/js/script.js')
</head>
<body>
    <header class="bg-dark-blue shadow-md p-4 flex justify-between items-center text-white relative">
        <img src="{{ asset('img/onetear2_transparent_corrected.png') }}" alt="TechShop logo" class="h-20">
        <div x-data="{ open: false }" class="block md:hidden bg-dark-blue">
            <button @click="open = !open" class="focus:outline-none">
                <i data-lucide="menu" class="icon"></i>
                <span class="cart-badge">0</span>
            </button>

            <div x-show="open" @click.away="open = false" class="mobile-menu absolute top-full left-0 w-full bg-dark-blue p-4 shadow-md z-50 rounded-md">
                <ul class="flex flex-col items-start space-y-4 bg-dark-blue p-4 rounded-md">
                    <li class="w-full">
                        <input type="text" placeholder="Keresés..." class="border p-2 rounded-md w-full">
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="icon-link flex items-center text-white">
                            <div id="home-icon-container"></div> Bejelentkezés
                        </a>
                    </li>
                    <li>
                        <a href="#" class="icon-link flex items-center relative text-white">
                            <div id="cart-icon-container"></div> Kosár
                            <span class="cart-badge">0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="hidden md:flex items-center w-1/3">
            <input type="text" placeholder="Keresés..." class="border p-2 rounded-md w-full">
        </div>

        <div class="hidden md:flex gap-6">
            <a href="{{ route('login') }}" class="icon-link flex items-center">
                <i data-lucide="user" class="icon mr-2"></i> Bejelentkezés
            </a>
            <a href="#" class="icon-link flex items-center relative">
                <i data-lucide="shopping-cart" class="icon mr-2"></i> Kosár
                <span class="cart-badge">0</span>
            </a>
        </div>
    </header>


    <main class="w-full">
        @yield('content')
    </main>

    <footer class="bg-dark-blue text-light-beige p-6 mt-12 text-center">
        <p>&copy; 2025 Onetear. Minden jog fenntartva.</p>

        <div class="payment-options mt-4">
            <p class="text-lg font-semibold">Fizetés PayPal-lal és Barionnal</p>
            <div class="payment-logos flex justify-center gap-8 mt-2">
                <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg" alt="PayPal" class="payment-logo">
                <img src="{{ asset('img/barion-card-strip-intl__large.png') }}" alt="Barion" class="payment-logo">
            </div>
        </div>
    </footer>
    </body>
</html>
