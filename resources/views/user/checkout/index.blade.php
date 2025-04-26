@extends("layouts.app")
@section('content')
<div class="container mx-auto p-6 bg-white rounded-md shadow-md mt-8 space-y-8 checkout-container">

    <!-- Értesítési adatok -->
    <section>
        <h2 class="text-xl font-bold mb-2">Értesítési adatok</h2>
        <div class="space-y-2">
            <input type="email" placeholder="E-mail címed" class="border p-2 w-full rounded-md">
            <div class="flex items-center space-x-2">
                <input type="checkbox" id="promok">
                <label for="promok">Szeretnék értesítést kapni ajánlatokról</label>
            </div>
        </div>
    </section>

    <!-- Átvételi lehetőségek -->
    <section>
        <h2 class="text-xl font-bold mb-2">Átvételi lehetőségek</h2>
        <div class="space-y-3">
            <label class="flex items-center justify-between border p-3 rounded-md">
                <span>FoxPost – ápr. 30</span>
                <span>990 Ft</span>
                <input type="radio" name="delivery" class="ml-2">
            </label>
            <label class="flex items-center justify-between border p-3 rounded-md">
                <span>Házhoz szállítás– ápr. 30</span>
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
            <input type="text" placeholder="Irányítószám / Város" class="border p-2 w-full rounded-md">
            <input type="text" placeholder="Utca / Házszám / Ajtó" class="border p-2 w-full rounded-md">
        </div>
    </section>

    <!-- Számlázási adatok -->
    <section>
        <h2 class="text-xl font-bold mb-2">Számlázási adatok</h2>
        <div class="flex items-center space-x-4 mb-2">
            <label><input type="radio" name="billing_type" checked> Magánszemély</label>
            <label><input type="radio" name="billing_type"> Cég</label>
        </div>
        <div class="space-y-2">
            <input type="text" placeholder="Számlázási név" class="border p-2 w-full rounded-md">
            <input type="text" placeholder="Cím" class="border p-2 w-full rounded-md">
            <input type="text" placeholder="Adószám (csak cégnél)" class="border p-2 w-full rounded-md">
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

    <!-- Extra szolgáltatások -->
    <section>
        <h2 class="text-xl font-bold mb-2">Extra szolgáltatások</h2>
        <div class="space-y-2">
            <label><input type="checkbox"> Hosszabbított garancia +590 Ft</label><br>
            <label><input type="checkbox"> Dísz csomagolás +199 Ft</label>
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
