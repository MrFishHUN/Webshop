@extends("layouts.app")
@section("content")
<main class="p-6">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto user-content-edit">
        <h2 class="text-xl font-bold mb-4">Felhasználói adatok szerkesztése</h2>

        <form action="" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">Név:</label>
                <input type="text" id="name" name="name" class="w-full border rounded px-3 py-2" value="">
            </div>

            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">Email:</label>
                <input type="email" id="email" name="email" class="w-full border rounded px-3 py-2" value="">
            </div>

            <div class="mb-4">
                <label for="phone" class="block font-semibold mb-1">Telefonszám:</label>
                <input type="text" id="phone" name="phone" class="w-full border rounded px-3 py-2" value="">
            </div>

            <button type="submit" class="button bg-blue-600 text-white hover:bg-blue-700">
                Mentés
            </button>
        </form>
    </div>
</main>
@endsection
