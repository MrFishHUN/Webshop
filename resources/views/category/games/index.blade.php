@extends("layouts.app")
@section('content')

@if(isset($products))
    <section class="container mx-auto p-6 grid grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="card bg-light-blue-gray p-4 rounded-lg shadow-md">
                <img src="{{ asset('img/istockphoto-1147544807-612x612.jpg') }}" alt="{{ $product->title }}" class="w-full h-40 object-cover">
                <h2 class="text-lg font-bold mt-2">{{ $product->title }}</h2>
                <p class="text-dark-blue">{{ $product->price }} Ft</p>
                <button class="button-add p-2 mt-2 w-full rounded-md">Kosárba</button>
            </div>
        @endforeach
    </section>
@else
    <p class="text-center text-gray-500">Nincs termék a megjelenítéshez.</p>
@endif

@endsection
