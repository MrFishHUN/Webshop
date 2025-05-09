
@extends("user.layouts.app")
@section("userContent")
    <div class="bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-4">Felhasználói adatok</h2>
        <div class="space-y-4">
            <p><strong>Név:</strong> {{Auth::user()->name}}</p>
            <p><strong>Email:</strong> {{Auth::user()->email}}</p>
            <a href="{{ route('editData') }}"><button class="button bg-blue-500 text-white mt-4 px-4 py-2 rounded-md hover:bg-blue-600">Adatok szerkesztése</button></a>
        </div>
    </div>
@endsection


