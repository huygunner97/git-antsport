<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Authenticate</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/auth.css') }}" rel="stylesheet">
</head>
<body>
    <div class="opacity"></div>
    <div class="auth">
        @yield('content')
    </div>
</body>
</html>
