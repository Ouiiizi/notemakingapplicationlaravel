<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Laravel App</title>

    <link rel="stylesheet" href="{{ asset('build/css/dash.css') }}">
</head>

<body>
<header>
    <div class="container">
        <h2>Dashboard</h2>
        <nav>
            <ul>
                <li><a href="/notes">View Notes</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>

<div class="main-content">
    <div class="container">
        <div class="card">
            <b> <p>YOU HAVE LOGGED IN!</p></b>
         <b>   <p>Welcome back, <span class="note-author">{{ auth()->user()->name }}</span>!</p></b>
        </div>
    </div>
</div>

</body>
</html>
