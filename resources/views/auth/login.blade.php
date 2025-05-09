<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés - Onetear Webshop</title>
    @vite ("resources/css/login.css")
</head>
<body>
    <div class="login-container">
        <h2>Bejelentkezés</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">E-mail cím:</label>
            <input  placeholder="pelda@pelda.pelda" type="email" id="email" name="email" required>

            <label for="password">Jelszó:</label>
            <input placeholder="Jelszó" type="password" id="password" name="password" required>

            <button type="submit" class="button login-button">Bejelentkezés</button>
        </form>
        <p>Még nincs fiókod? <a href="{{ route('register') }}">Regisztráció</a></p>
        <p><a href="{{ route('home') }}">Vissza</a></p>
    </div>
</body>
</html>
