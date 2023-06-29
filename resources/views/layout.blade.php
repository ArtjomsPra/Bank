<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Banking</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body class="antialiased">
    <nav class="horizontal-nav">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/crypto">Crypto</a></li>
            <li><a href="/currencies">Currencies</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
        </ul>
    </nav>
    @yield('content')

    <footer>
        Copyright 2023 Online Banking System by Artjoms Rencis-Pralics
    </footer>
</body>

<style>
    body {
        font-family: 'Nunito', sans-serif;
    }

    nav.horizontal-nav {
        background: lightgray;
    }

    nav.horizontal-nav ul {
        list-style: none;
        display: flex;
        padding: 0;
    }

    nav.horizontal-nav ul li {
        margin: 0 10px;
    }

    nav.horizontal-nav ul li a {
        text-decoration: none;
        color: black;
    }

    footer {
        font-family: Arial, sans-serif;
        text-align: center;
        background: darkgray;
    }
</style>

</html>
