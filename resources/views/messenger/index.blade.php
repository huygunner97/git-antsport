<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/sport-project/laravel-antsport-finnal/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Messenger</title>
    <link rel="stylesheet" type="text/css" href="public/css/app.css">
    <link rel="stylesheet" type="text/css" href="public/css/messenger.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    @yield('content')

    <script type="text/javascript" src="public/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="public/js/chat.js"></script>
    @yield('script')
</body>
</html>