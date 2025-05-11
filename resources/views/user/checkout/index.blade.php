@extends("layouts.app")
@section('content')
<form action="{{ route('orders.store') }}" method="post" class="container mx-auto p-6 bg-white rounded-md shadow-md mt-8 space-y-8 checkout-container">

    @csrf
    <!-- Átvételi lehetőségek -->
    <section>
        <h2 class="text-xl font-bold mb-2">Átvételi lehetőségek</h2>
        <div class="space-y-3">
            <label>
                <input type="radio" name="delivery" value="hazhoz" @checked(old('delivery') === 'hazhoz')>
                Házhozszállítás
            </label>
            <label>
                <input type="radio" name="delivery" value="szemelyes" @checked(old('delivery') === 'szemelyes')>
                Személyes átvétel
            </label>
            @error('delivery')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </section>

    <!-- Szállítási adatok -->
    <section>
        <h2 class="text-xl font-bold mb-2">Szállítási adatok</h2>
        <div class="space-y-2">
            <input type="text" placeholder="Név" class="border p-2 w-full rounded-md" name="name" value="{{ old('name') }}">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input type="text" placeholder="Város" class="border p-2 w-full rounded-md"
            name="city" value="{{ old('city') }}">
            @error('city')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input type="text" placeholder="Irányítószám" class="border p-2 w-full rounded-md" name="postcode" value="{{ old('postcode') }}">
            @error('postcode')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input type="text" placeholder="Utca / Házszám / Ajtó" class="border p-2 w-full rounded-md" name="street" value="{{ old('street') }}">
            @error('street')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input type="text" placeholder="Telefonszám" class="border p-2 w-full rounded-md" name="phone" value="{{ old('phone') }}">
            @error('phone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </section>

    <!-- Fizetés -->
    <section>
        <h2 class="text-xl font-bold mb-2">Fizetés</h2>
        <div class="space-y-2">
            <label><input type="radio" name="payment" value="online" @checked(old('payment', 'online') === 'online')> Online bankkártya</label><br>
            <label><input type="radio" name="payment" value="utanvet" @checked(old('payment') === 'utanvet')> Utánvét</label><br>
            @error('payment')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </section>

    <input type="hidden" name="cart_id" value="{{ Auth::user()->carts->first()->id }}">

    <!-- Megrendelés -->
    <section class="text-right">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md text-lg">
            Megrendelem
        </button>
    </section>
</form>
@endsection
