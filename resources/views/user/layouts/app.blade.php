@extends("layouts.app")
@section("content")

<div class="flex">
    <aside class="w-1/4 bg-gray-100 p-4">
        <ul class="space-y-4">
            <li><a href="#" class="user-nav">Felhasználói adatok</a></li>
            <li><a href="#" class="user-nav">Rendelések</a></li>
            <li><a href="#" class="user-nav">Garancia</a></li>
            <li><a href="{{route("userReview")}}" class="user-nav">Értékelések</a></li>
            <li><a href="" class="user-nav">Számlázási cím</a></li>
        </ul>
    </aside>

    <section id="user-content" class="w-3/4 p-4">
        @yield('userContent')
    </section>
</div>
@endsection
