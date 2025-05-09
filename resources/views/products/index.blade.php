@extends("layouts.app")
@section('content')

<section id="search-section">
    <div id="sidebar" class="bg-dark-blue text-white p-4 min-h-screen overflow-y-auto">
        <form id="filter-form" action="{{ route('displayProducts.search') }}" method="GET">
            <input type="hidden" name="search" value="{{request('search')}}">
            <div class="filter-group">
                <h2>Kategóriák</h2>
                @foreach ($main_categories as $main_category)
                    <label class="block mb-1">
                        <input
                            type="checkbox"
                            name="categories[]"
                            value="{{ $main_category->id }}"
                            {{ in_array($main_category->id, request()->input('categories', [])) ? 'checked' : '' }}
                        >
                        {{ $main_category->name }}
                    </label>
                @endforeach
            </div>

            <div class="filter-group mt-4">
                <h2>Ár</h2>
                <div class="mb-2">
                    <label for="min-price">Min. ár (Ft)</label>
                    <input
                        type="number"
                        name="min_price"
                        id="min-price"
                        class="w-full border rounded p-2"
                        placeholder="pl. 1000"
                        value="{{ request('min_price') }}"
                    >
                </div>
                <div class="mb-2">
                    <label for="max-price">Max. ár (Ft)</label>
                    <input
                        type="number"
                        name="max_price"
                        id="max-price"
                        class="w-full border rounded p-2"
                        placeholder="pl. 10000"
                        value="{{ request('max_price') }}"
                    >
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">
                    Szűrés alkalmazása
                </button>
            </div>
        </form>
    </div>
    <div class="container mx-auto p-6 grid grid-cols-4 gap-6">
        @foreach ($products as $item)
        <a href="">
            <div class="card bg-light-blue-gray p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset($item->picture)}}" alt="" class="w-full h-40 object-cover">
                <h2 class="text-lg font-bold mt-2">{{ $item->title }}</h2>
                <p class="text-dark-blue">{{ $item->description }}</p>
                <p class="text-dark-blue">{{ $item->price}}</p>
                <button class="button-add p-2 mt-2 w-full rounded-md">Kosárba</button>
            </div>
        </a>
    @endforeach
    <div class="col-span-4 flex justify-center mt-6">
        {{ $products->links("pagination::default") }}
    </div>
    </div>

</section>
@endsection
