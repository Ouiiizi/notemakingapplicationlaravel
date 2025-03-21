<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Note App</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('build/css/dsb.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h1>Welcome to the Laravel Note App</h1>
        <p>This is a simple note-taking application built with Laravel.</p>
    </div>
</body>
</html>