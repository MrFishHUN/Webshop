<!DOCTYPE html>
<html lang="en">
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
</head>
<body class="bg-light-beige">
    @include('partials.header')

    <!-- Kategóriák -->
    <section class="category-bar bg-dark-navy text-light-beige py-4">
        <div class="container mx-auto flex justify-around items-center">
            <div class="category-item text-center">
                <img src="{{ asset('img/alkatresz.png') }}" alt="Álkatrész" class="h-25 mx-auto mb-2">
                <button class="category-button">Álkatrész</button>
            </div>
            <div class="category-item text-center">
                <img src="{{ asset('img/console.png') }}" alt="Játék" class="h-25 mx-auto mb-2">
                <button class="category-button">Játék</button>
            </div>
            <div class="category-item text-center">
                <img src="{{ asset('img/tv.png') }}" alt="TV" class="h-25 mx-auto mb-2">
                <button class="category-button">TV</button>
            </div>
            <div class="category-item text-center">
                <img src="{{ asset('img/pcb.png') }}" alt="Elektronikai eszközök" class="h-25 mx-auto mb-2">
                <button class="category-button">Elektronikai eszközök</button>
            </div>
        </div>
    </section>

    <!-- Slider bar -->
    <section class="w-full h-80 bg-dark-navy text-light-beige text-3xl font-bold flex flex-col items-center justify-center">
        <h2 class="mb-6">Akciós ajánlatok!</h2>
        <div class="swiper mySwiper w-3/4">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('img/istockphoto-1147544807-612x612.jpg') }}" alt="Akciós Termék 1" class="swiper-image">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('img/istockphoto-1147544807-612x612.jpg') }}" alt="Akciós Termék 2" class="swiper-image">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('img/istockphoto-1147544807-612x612.jpg') }}" alt="Akciós Termék 3" class="swiper-image">
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Product Grid -->
    <main class="container mx-auto p-6 grid grid-cols-4 gap-6">
        {{-- @foreach ($products as $product)
            <div class="card bg-light-blue-gray p-4 rounded-lg shadow-md">
                <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover">
                <h2 class="text-lg font-bold mt-2">{{ $product->name }}</h2>
                <p class="text-dark-blue">{{ $product->price }} Ft</p>
                <button class="button-add p-2 mt-2 w-full rounded-md">Kosárba</button>
            </div>
        @endforeach --}}
    </main>

    @include('partials.footer')
</body>
</html>
