<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onetear Webshop</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css\style.css') }}">
</head>
<body class="bg-light-beige">
    @include('partials.header')

    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
