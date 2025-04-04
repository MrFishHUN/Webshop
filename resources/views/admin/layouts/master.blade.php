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
    <title>@yield('title') - Admin</title>
</head>
<body>
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
                <a href="#">Lorem</a>
                <a href="#">Lorem</a>
                <a href="#">Lorem</a>
            </ul>
        </div>
        <div class="nav-button">
            <button>Termékek <i class="bi bi-chevron-down"></i></button>
            <ul class="hide">
                <!-- Options -->
                <a href="#">Lorem</a>
                <a href="#">Lorem</a>
                <a href="#">Lorem</a>
            </ul>
        </div>
        <div class="nav-button">
            <button>Felhasználók <i class="bi bi-chevron-down"></i></button>
            <ul class="hide">
                <a href="#">Lorem</a>
                <a href="#">Lorem</a>
                <a href="#">Lorem</a>
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
