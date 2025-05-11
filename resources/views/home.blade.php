    @extends("layouts.app")
    @section('content')

    <!-- Kategóriák -->
    <section x-data="{ open: false }" class="category-bar bg-dark-navy text-light-beige py-4" id="category-bar-section">
        <div class="container mx-auto px-4">
            <div class="md:hidden text-center">
                <button @click="open = !open" class="w-full p-3 rounded-md bg-gray-700 hover:bg-gray-600 flex items-center justify-between gap-2">
                    <span>Kategóriák</span>
                    <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-lg"></i>
                </button>
            </div>

            <div class="md:flex md:justify-around md:items-center md:gap-4" :class="{ 'hidden': !open }">
                <div class="category-item text-center flex-1">
                    <div class="category-item text-center flex-1">
                        <a href="{{route('displayProducts.search',[$mainCategories[0]->id])}}" class="category-button button-with-icon w-full block text-center p-3 rounded-md bg-gray-700 hover:bg-gray-600">
                            <i class="bi bi-motherboard"></i> Alkatrész
                        </a>
                    </div>
                </div>
                <div class="category-item text-center flex-1">
                    <div class="category-item text-center flex-1">
                        <a href="{{route('displayProducts.search',[$mainCategories[1]->id])}}" class="category-button button-with-icon w-full block text-center p-3 rounded-md bg-gray-700 hover:bg-gray-600">
                            <i class="bi bi-controller"></i> Játékok
                        </a>
                    </div>
                </div>
                <div class="category-item text-center flex-1">
                    <div class="category-item text-center flex-1">
                        <a href="{{route('displayProducts.search',[$mainCategories[2]->id])}}" class="category-button button-with-icon w-full block text-center p-3 rounded-md bg-gray-700 hover:bg-gray-600">
                            <i class="bi bi-tv"></i> Televizió
                        </a>
                    </div>
                </div>
                <div class="category-item text-center flex-1">
                    <div class="category-item text-center flex-1">
                        <a href="{{route('displayProducts.search',[$mainCategories[3]->id])}}" class="category-button button-with-icon w-full block text-center p-3 rounded-md bg-gray-700 hover:bg-gray-600">
                            <i class="bi bi-router"></i> Elektronikai alkatrészek
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider bar -->
    <section class="w-full text-light-beige text-3xl font-bold flex flex-col items-center justify-center mt-8">
        <div class="swiper mySwiper w-full h-[640px]">
            <div class="swiper-wrapper h-full">
                <div class="swiper-slide">
                    <img src="{{ asset('storage/img/slider1.png') }}" alt="Akciós Termék 1" class="w-full h-full object-cover object-center rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('storage/img/slider2.png') }}" alt="Akciós Termék 2" class="w-full h-full object-cover object-center rounded-xl">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('storage/img/slider3.png') }}" alt="Akciós Termék 3" class="w-full h-full object-cover object-center rounded-xl">
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Product Grid -->
    <h2 class="text-3xl text-center text-sky-800 p-4 rounded-lg mt-8">Akciós ajánlatok!</h2>
    <section class="container mx-auto p-6 grid grid-cols-4 gap-6">
        @foreach ($discountedProducts as $product)
        <a href="{{ route('displayProduct', $product->slug) }}">
            <div class="card bg-light-blue-gray p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('img/istockphoto-1147544807-612x612.jpg') }}" alt="{{ $product->title }}" class="w-full h-40 object-cover">
                <h2 class="text-lg font-bold mt-2">{{ $product->title }}</h2>
                <p class="text-dark-blue">{{ $product->price }} Ft</p>
            </div>
        </a>
    @endforeach
    </section>
    @endsection

