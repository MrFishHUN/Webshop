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
<style>
    .btn {
        @apply bg-light-beige text-dark-blue px-4 py-2 rounded-md hover:bg-beige transition flex items-center;
    }
</style>
<body>
    <header class="bg-dark-blue shadow-md p-4 flex justify-between items-center text-white relative">
        <a href="{{route('home')}}"><img src="{{ asset('storage/img/onetear2_transparent_corrected.png') }}" alt="TechShop logo" class="h-20"></a>
        <div x-data="{ open: false }" class="block md:hidden bg-dark-blue">
            <button @click="open = !open" class="focus:outline-none">
                <i data-lucide="menu" class="icon"></i>
            </button>

            <div x-show="open" @click.away="open = false" class="mobile-menu absolute top-full left-0 w-full bg-dark-blue p-4 shadow-md z-50 rounded-md">
                <ul class="flex flex-col items-start space-y-4 bg-dark-blue p-4 rounded-md">
                    <li class="w-full">
                        <input type="text" placeholder="Keresés..." class="border p-2 rounded-md w-full">
                    </li>
                    <li>
                        @if (Auth::check())
                        <form action="{{ route('logout') }}" method="POST" class="icon-link flex items-center">
                             @csrf
                            <button type="submit" class="bg-light-beige text-dark-blue px-4 py-2 rounded-md hover:bg-beige transition" class="icon-link flex items-center">
                                <i data-lucide="user" class="icon mr-2"></i> Kijelentkezés
                            </button>
                        </form>
                         @else
                         <a href="{{ route('login') }}" class="btn flex items-center">
                            <i data-lucide="user" class="icon mr-2"></i> Bejelentkezés
                        </a>
                         @endif
                    </li>
                    <li>
                        <a href="{{ route('cart') }}" class="btn flex items-center">
                            <i data-lucide="shopping-cart" class="icon mr-2"></i> Kosár
                            <span class="cart-badge">0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <form class="hidden md:flex items-center w-1/3" action="{{route("displayProducts.search")}}" method="GET">
            <input name="search" type="text" placeholder="Keresés..." class="border p-2 rounded-md w-full">
        </form>

        <div class="hidden md:flex gap-6">
            @if (Auth::check())
            <form action="{{ route('logout') }}" method="POST" class="icon-link flex items-center" class="icon-link flex items-center">
                 @csrf
                 <button type="submit" class="btn flex items-center">
                    <i data-lucide="user" class="icon mr-2"></i> Kijelentkezés
                 </button>
            </form>
             @else
             <a href="{{ route('login') }}" class="btn flex items-center">
                <i data-lucide="user" class="icon mr-2"></i> Bejelentkezés
            </a>
             @endif
            <a href="{{ route('cart') }}" class="btn flex items-center">
                <i data-lucide="shopping-cart" class="icon mr-2"></i>Kosár
                <span class="cart-badge">0</span>
            </a>
        </div>
    </header>


    <main class="w-full">
        @yield('content')
    </main>

    <footer class="bg-dark-blue text-light-beige p-6 mt-12">
        <div class="flex items-start text-left gap-6">
            <div>
                <p class="mb-4">&copy; 2025 Onetear. Minden jog fenntartva.</p>
                <div class="payment-options">
                    <p class="text-lg font-semibold mb-2">Fizetés PayPal-lal és Barionnal</p>
                    <div class="payment-logos flex gap-4 mt-2 flex-wrap">
                        <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg" alt="PayPal" class="payment-logo">
                        <img src="{{ asset('storage/img/barion-card-strip-intl__large.png') }}" alt="Barion" class="payment-logo">
                    </div>
                </div>
            </div>
            <div class="faq-links">
                <h3 class="text-lg font-semibold mb-4">Egyebek</h3>
                <ul class="space-y-2">
                    <li><a href="" class="hover:underline">Gyakran ismételt kérdések</a></li>
                    <li><a href="" class="hover:underline">Szállítási információk</a></li>
                    <li><a href="" class="hover:underline">Visszaküldés és csere</a></li>
                    <li><a href="" class="hover:underline">Kapcsolat</a></li>
                </ul>
            </div>
        </div>
    </footer>
    </body>
</html>
