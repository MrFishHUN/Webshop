@extends("layouts.app")
@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-md mt-8 cart-item">
    <div class="flex flex-col md:flex-row gap-6 border-b pb-6">

        <img src="{{ asset('img/istockphoto-1147544807-612x612.jpg') }}" alt="Xiaomi Redmi Buds" class="w-40 h-40 object-cover rounded-md">

        <div class="flex-1">
            <h2 class="text-xl font-semibold">Xiaomi Redmi Buds 6 Play Bluetooth Headset White</h2>
            <p class="text-sm text-gray-600 mt-1">Cikkszám: <span class="font-semibold">719718</span></p>
            <p class="mt-2"><strong>Garancia:</strong> 12 hónap</p>
            <p><strong>Megbízhatóság:</strong> <span class="text-green-600 font-bold">100%</span></p>
        </div>
    <!-- Kupon -->

        <div class="flex flex-col justify-between items-end">
            <p class="text-red-600 text-xl font-bold">4 299 Ft</p>
            <div class="flex items-center gap-2 mt-2">
                <button class="border px-2 py-1">−</button>
                <span class="px-2">1</span>
                <button class="border px-2 py-1">+</button>
            </div>
        </div>
    </div>

    <div class="flex justify-between items-center mt-6 border-b pb-6">
        <input type="text" placeholder="Kupon kód" class="border rounded-md px-4 py-2 w-1/2">
        <button class="bg-gray-800 text-white px-4 py-2 rounded-md">Érvényesítés</button>
    </div>
    <!-- Kupon End -->

    <div class="flex justify-between items-center mt-6">
        <p class="text-lg font-semibold">Termék: <span class="text-green-600">4 299 Ft</span></p>
        <a href="{{ route('checkout') }}" class="bg-blue-500 text-white px-6 py-3 rounded-md font-semibold">
            Tovább az adatok megadásához →
        </a>
    </div>
</div>
@endsection
