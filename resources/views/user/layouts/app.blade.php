@extends("layouts.app")
@section("content")

<div class="flex" id="user-menu">
    <aside class="w-1/4 bg-gray-100 p-4">
        <ul class="space-y-4">
            <li><a href="{{route("userData")}}" class="user-nav">Felhasználói adatok</a></li>
            <li><a href="{{route("userOrder")}}" class="user-nav">Rendelések</a></li>
            <li><a href="{{route("userAddress")}}" class="user-nav">Lakhely</a></li>
        </ul>
    </aside>

    <section id="user-content" class="w-3/4 p-4">
        @yield('userContent')
    </section>
</div>
@endsection
