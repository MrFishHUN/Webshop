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
                        <a href="{{ route('parts') }}" class="category-button button-with-icon w-full block text-center p-3 rounded-md bg-gray-700 hover:bg-gray-600">
                            <i class="bi bi-motherboard"></i> Alkatrész
                        </a>
                    </div>
                </div>
                <div class="category-item text-center flex-1">
                    <div class="category-item text-center flex-1">
                        <a href="{{ route('games') }}" class="category-button button-with-icon w-full block text-center p-3 rounded-md bg-gray-700 hover:bg-gray-600">
                            <i class="bi bi-controller"></i> Játékok
                        </a>
                    </div>
                </div>
                <div class="category-item text-center flex-1">
                    <div class="category-item text-center flex-1">
                        <a href="{{ route('televison') }}" class="category-button button-with-icon w-full block text-center p-3 rounded-md bg-gray-700 hover:bg-gray-600">
                            <i class="bi bi-tv"></i> Televizió
                        </a>
                    </div>
                </div>
                <div class="category-item text-center flex-1">
                    <div class="category-item text-center flex-1">
                        <a href="{{ route('electronic-parts') }}" class="category-button button-with-icon w-full block text-center p-3 rounded-md bg-gray-700 hover:bg-gray-600">
                            <i class="bi bi-router"></i> Elektronikai alkatrészek
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider bar -->
    <section class="w-full h-80 text-light-beige text-3xl font-bold flex flex-col items-center justify-center mt-8">
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
    <h2 class="text-3xl text-center text-sky-800 p-4 rounded-lg mt-8">Akciós ajánlatok!</h2>
    <section class="container mx-auto p-6 grid grid-cols-4 gap-6">
        @foreach ($discountedProducts as $proudcts)
            <div class="card bg-light-blue-gray p-4 rounded-lg shadow-md">
                <img src="{{ asset('img/istockphoto-1147544807-612x612.jpg') }}" alt="{{ $proudcts->title }}" class="w-full h-40 object-cover">
                <h2 class="text-lg font-bold mt-2">{{ $proudcts->title }}</h2>
                <p class="text-dark-blue">{{ $proudcts->price }} Ft</p>
                <button class="button-add p-2 mt-2 w-full rounded-md">Kosárba</button>
            </div>
        @endforeach
    </section>
    @endsection

