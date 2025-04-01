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
