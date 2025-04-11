
@extends("user.layouts.app")
@section("userContent")
    <div class="bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-4">Korábbi rendeléseid</h2>

        <div class="space-y-4">
            <div class="border p-4 rounded-lg bg-gray-50">
                <p><strong>Rendelés azonosító:</strong> #ORD12345</p>
                <p><strong>Dátum:</strong> 2024-12-21</p>
                <p><strong>Állapot:</strong> Kiszállítva</p>
                <p><strong>Összeg:</strong> 32 990 Ft</p>
                <a href="{{ route('editOrder') }}"><button class="button bg-blue-500 text-white mt-4 px-4 py-2 rounded-md hover:bg-blue-600">Adatok szerkesztése</button></a>
            </div>
{{--
            <div class="border p-4 rounded-lg bg-gray-50">
                <p><strong>Rendelés azonosító:</strong> #ORD12312</p>
                <p><strong>Dátum:</strong> 2024-10-02</p>
                <p><strong>Állapot:</strong> Feldolgozás alatt</p>
                <p><strong>Összeg:</strong> 14 990 Ft</p>
                <button class="button bg-blue-500 text-white mt-4 px-4 py-2 rounded-md hover:bg-blue-600">Részletek megtekintése</button>
            </div> --}}
        </div>
    </div>
@endsection


