<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halcon Materials</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/aguila.png') }}">
</head>
<body>
    <header>Halcon Construction Materials</header>
    <div class="container">
        <nav class="nav-links">
            <a href="#">Home</a>
            <a href="{{ route('orders.index') }}">Orders</a>
            <a href="#">Services</a>
            <a href="{{ route('users.unregistered') }}">Unregistered Users</a>
            <a href="{{ route('dashboard.index') }}">Users</a>
            <a href="#">Contact</a>
        </nav>
        <main>
            <h1>Welcome to Halcon</h1>
            <p>Your trusted partner in construction supplies.</p>
        </main>
        <footer>
            &copy; {{ date('Y') }} Halcon Materials. All rights reserved.
        </footer>
    </div>
</body>
</html>