
@extends("user.layouts.app")
@section("userContent")
    <div class="bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-4">Felhasználói adatok</h2>
        <div class="space-y-4">
            <p><strong>Név:</strong> Kovács Péter</p>
            <p><strong>Email:</strong> kovacs.peter@example.com</p>
            <p><strong>Telefonszám:</strong> +36 30 123 4567</p>
            <a href="{{ route('editData') }}"><button class="button bg-blue-500 text-white mt-4 px-4 py-2 rounded-md hover:bg-blue-600">Adatok szerkesztése</button></a>
        </div>
    </div>
@endsection


