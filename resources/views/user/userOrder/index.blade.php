
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
            </div>
{{--
            <div class="border p-4 rounded-lg bg-gray-50">
                <p><strong>Rendelés azonosító:</strong> #ORD12312</p>
                <p><strong>Dátum:</strong> 2024-10-02</p>
                <p><strong>Állapot:</strong> Feldolgozás alatt</p>
                <p><strong>Összeg:</strong> 14 990 Ft</p>
            </div> --}}
        </div>
    </div>
@endsection


