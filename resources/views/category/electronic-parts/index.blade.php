@extends("layouts.app")
@section('content')

<section id="search-section">
    <div id="sidebar">
        <div class="filter-group">
            <h2>Kategóriák</h2>
            <form id="category-filter">
                <label><input type="checkbox" value="1" class="category-checkbox"> Kategória 1</label>
                <label><input type="checkbox" value="2" class="category-checkbox"> Kategória 2</label>
                <label><input type="checkbox" value="3" class="category-checkbox"> Kategória 3</label>
                <label><input type="checkbox" value="3" class="category-checkbox"> Kategória 4</label>
                <label><input type="checkbox" value="3" class="category-checkbox"> Kategória 5</label>
            </form>
        </div>
        <div class="filter-group">
            <h2>Ár</h2>
            <div class="price-range">
                <label for="min-price-range">Min. Ár: <span id="min-price-value">0</span> Ft</label>
                <input type="range" id="min-price-range" class="price-slider" min="0" max="10000" step="100" value="0"/>
            </div>
            <div class="price-range">
                <label for="max-price-range">Max. Ár: <span id="max-price-value">100000000</span> Ft</label>
                <input type="range" id="max-price-range" class="price-slider" min="0" max="10000" step="100" value="10000"/>
            </div>
        </div>
    </div>
    <div class="container mx-auto p-6 grid grid-cols-4 gap-6">
        @foreach ($product as $item)
        <a href="">
            <div class="card bg-light-blue-gray p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('img/istockphoto-1147544807-612x612.jpg') }}" alt="" class="w-full h-40 object-cover">
                <h2 class="text-lg font-bold mt-2">{{ $item->name }}</h2>
                <p class="text-dark-blue">{{ $item->description }} Ft</p>
                <button class="button-add p-2 mt-2 w-full rounded-md">Kosárba</button>
            </div>
        </a>
    @endforeach
    </div>
</section>
@endsection
