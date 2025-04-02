<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onetear Webshop</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')
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
                            <i data-lucide="user" class="icon mr-2"></i> Bejelentkezés
                        </a>
                    </li>
                    <li>
                        <a href="#" class="icon-link flex items-center relative text-white">
                            <i data-lucide="shopping-cart" class="icon mr-2"></i> Kosár
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
           <table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="#" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700');"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark"></a></td></tr></table>
    </footer>
    </body>
</html>
