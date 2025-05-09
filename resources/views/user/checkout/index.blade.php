@extends("layouts.app")
@section('content')
<div class="container mx-auto p-6 bg-white rounded-md shadow-md mt-8 space-y-8 checkout-container">
    <!-- Átvételi lehetőségek -->
    <section>
        <h2 class="text-xl font-bold mb-2">Átvételi lehetőségek</h2>
        <div class="space-y-3">
            <label class="flex items-center justify-between border p-3 rounded-md">
                <span>Házhoz szállítás</span>
                <span>1 290 Ft</span>
                <input type="radio" name="delivery" class="ml-2">
            </label>
        </div>
    </section>

    <!-- Szállítási adatok -->
    <section>
        <h2 class="text-xl font-bold mb-2">Szállítási adatok</h2>
        <div class="space-y-2">
            <input type="text" placeholder="Név" class="border p-2 w-full rounded-md">
            <input type="text" placeholder="Város" class="border p-2 w-full rounded-md">
            <input type="text" placeholder="Irányítószám" class="border p-2 w-full rounded-md">
            <input type="text" placeholder="Utca / Házszám / Ajtó" class="border p-2 w-full rounded-md">
        </div>
    </section>

    <!-- Fizetés -->
    <section>
        <h2 class="text-xl font-bold mb-2">Fizetés</h2>
        <div class="space-y-2">
            <label><input type="radio" name="payment" checked> Online bankkártya</label><br>
            <label><input type="radio" name="payment"> Utánvét</label><br>
            <label><input type="radio" name="payment"> Paypal</label>
        </div>
    </section>

    <!-- Megrendelés -->
    <section class="text-right">
        <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md text-lg">
            Megrendelem
        </button>
    </section>
</div>
@endsection
