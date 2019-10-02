<!DOCTYPE html>
<html>
<head>
    <title>Ant Sport</title>
    <base href="http://localhost/sport-project/laravel-antsport-finnal/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="public/css/app.css">
    <link rel="stylesheet" type="text/css" href="public/css/detail.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/owl.theme.default.min.css">
</head>
<body>
    @include ('client.layout.header')
    @yield ('menu')

    @yield ('content')
    @include ('client.layout.footer')
    @include ('client.layout.chat')

    <script type="text/javascript" src="public/js/jquery-3.4.1.min.js"></script>
    @yield('script')
    <script type="text/javascript" src="public/js/app.js"></script>
    <script type="text/javascript" src="public/js/style.js"></script>
    <script type="text/javascript" src="public/js/detail.js"></script>
    <script type="text/javascript" src="public/js/owl.carousel.min.js"></script>
</body>
</html>