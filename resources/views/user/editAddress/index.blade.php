@extends("layouts.app")
@section("content")
<main class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto user-content-edit">
        <h2 class="text-xl font-bold mb-4">Számlázási cím szerkesztése</h2>

        <form action="" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="address" class="block font-semibold mb-1">Cím:</label>
                <input type="text" id="address" name="address" class="w-full border rounded px-3 py-2" value="">
            </div>

            <div class="mb-4">
                <label for="postal_code" class="block font-semibold mb-1">Irányítószám:</label>
                <input type="text" id="postal_code" name="postal_code" class="w-full border rounded px-3 py-2" value="">
            </div>

            <div class="mb-4">
                <label for="city" class="block font-semibold mb-1">Város:</label>
                <input type="text" id="city" name="city" class="w-full border rounded px-3 py-2" value="">
            </div>

            <button type="submit" class="button bg-blue-600 text-white hover:bg-blue-700">
                Mentés
            </button>
        </form>
    </div>
</main>
@endsection
