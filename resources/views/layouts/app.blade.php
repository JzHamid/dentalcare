<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('landing') }}">Home</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('signup') }}">Signup</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
