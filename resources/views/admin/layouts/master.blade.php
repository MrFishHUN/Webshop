<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/admin/main.css')
    @vite('resources/js/icon.js')
    @vite('resources/js/admin/menu.js')
    @vite('resources/css/paginate.css')
    @yield('head')
    <title>@yield('title') - Admin</title>
</head>
<body>
@if(null != session('success'))
    <div class="alert alert-success">
        <i class="bi bi-x-lg exit"></i>
        <span style="text-align: center">
            <strong>Sikeres művelet!</strong><br>{{session('success')}}!
        </span>
    </div>
@endif
    <nav>
        <h1>Adminisztráció</h1>
        <div class="nav-button">
            <button>Statisztika <i class="bi bi-chevron-down rot"></i></button>
            <ul class="hide">
                <!-- Options -->
                <a href="#">Lorem</a>
                <a href="#">Lorem</a>
                <a href="#">Lorem</a>
            </ul>
        </div>
        <div class="nav-button">
            <button>Rendelések <i class="bi bi-chevron-down"></i></button>
            <ul class="hide">
                <!-- Options -->
                <a href="{{route('carts.index')}}">Kosarak</a>
                <a href="#">Lorem</a>
            </ul>
        </div>
        <div class="nav-button">
            <button>Termékek <i class="bi bi-chevron-down"></i></button>
            <ul class="hide">
                <!-- Options -->
                <a href="{{route('products.index')}}">Terméklista</a>
                <a href="{{route('categories.index')}}">Kategóriák</a>
                <a href="{{route('discounts.index')}}">Kedvezmények</a>
            </ul>
        </div>
        <div class="nav-button">
            <button>Felhasználók <i class="bi bi-chevron-down"></i></button>
            <ul class="hide">
                <a href="{{route('users.index')}}">Felhasználók</a>
                <a href="{{route('users.trashed')}}">Törölt felhasználók</a>
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
