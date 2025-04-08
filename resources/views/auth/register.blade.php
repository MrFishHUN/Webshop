<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció - Onetear Webshop</title>
    @vite ("resources/css/registration.css")

</head>
<body>
    <div class="register-container">
        <h2>Regisztráció</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="name">Teljes név:</label>
            <input placeholder="Kovács Kázmér" type="text" id="name" name="name" required>

            <label for="email">E-mail cím:</label>
            <input placeholder="pelda@pelda.pelda" type="email" id="email" name="email" required>

            <label for="password">Jelszó:</label>
            <input placeholder="Jelszó" type="password" id="password" name="password" required>

            <label for="confirm-password">Jelszó megerősítése:</label>
            <input placeholder="Jelszó újra" type="password" id="confirm-password" name="confirm-password" required>

            <button type="submit" class="button register-button">Regisztráció</button>
        </form>
        <p>Van már fiókod? <a href="{{ route('login') }}">Jelentkezz be</a></p>
    </div>
</body>
</html>
