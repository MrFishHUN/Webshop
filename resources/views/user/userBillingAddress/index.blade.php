
@extends("user.layouts.app")
@section("userContent")
    <div class="bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-4">Számlázási cím</h2>

        <div class="space-y-2">
            <p><strong>Név:</strong> Kovács Péter</p>
            <p><strong>Cím:</strong> 1024 Budapest, Margit körút 15.</p>
            <p><strong>Adószám:</strong> 12345678-1-41</p>
        </div>

        <a href="{{ route('editBilling') }}"><button class="button bg-blue-500 text-white mt-4 px-4 py-2 rounded-md hover:bg-blue-600">Cím szerkesztése</button></a>
    </div>
@endsection


