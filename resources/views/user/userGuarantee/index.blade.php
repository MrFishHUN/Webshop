
@extends("user.layouts.app")
@section("userContent")
    <div class="bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-4">Garanciális termékek</h2>
        <p class="mb-4">Itt láthatod azokat a termékeket, melyekre még él a garancia:</p>

        <ul class="space-y-4">
            <li class="border p-4 bg-gray-50 rounded-md">
                <p><strong>Termék:</strong> Logitech G Pro egér</p>
                <p><strong>Vásárlás dátuma:</strong> 2023-11-10</p>
                <p><strong>Garancia lejárata:</strong> 2025-11-10</p>
            </li>
            <li class="border p-4 bg-gray-50 rounded-md">
                <p><strong>Termék:</strong> Kingston SSD 1TB</p>
                <p><strong>Vásárlás dátuma:</strong> 2024-01-02</p>
                <p><strong>Garancia lejárata:</strong> 2026-01-02</p>
            </li>
        </ul>
    </div>
@endsection


