@extends("layouts.app")
@section("content")
<main class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto user-content-edit">
        <h2 class="text-xl font-bold mb-4">Rendelés szerkesztése</h2>

        <form action="" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold mb-1">Rendelés állapota:</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="függőben" >Függőben</option>
                    <option value="feldolgozás alatt" >Feldolgozás alatt</option>
                    <option value="kiszállítva">Kiszállítva</option>
                </select>
            </div>

            <button type="submit" class="button bg-blue-600 text-white hover:bg-blue-700">
                Mentés
            </button>
        </form>
    </div>
</main>
@endsection
