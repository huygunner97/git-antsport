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
    <link rel="stylesheet" type="text/css" href="public/css/home.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/owl.theme.default.min.css">
</head>
<body>
    @include ('client.layout.header')
    @yield ('menu')
    <!-- banner -->
    <div id="banner" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#banner" data-slide-to="0" class="active"></li>
            <li data-target="#banner" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="public/images/slider_2.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="public/images/slider_1.jpg" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end banner -->
    <!-- main -->
    @yield ('main_product')
    @yield ('new_product')
    <div class="advertise">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hidden-iphone">
                    <img src="public/images/advertise-1.jpg">
                </div>
                <div class="col-md-6 col-12">
                    <img src="public/images/advertise-2.jpg">
                </div>
            </div>
        </div>
    </div>
    <!-- sp noi bat -->
    @yield ('hot_product')
    <!-- tin tuc  -->
    @yield ('news')
    <!-- end main -->
    @include ('client.layout.footer')
    @include ('client.layout.chat')

    <script type="text/javascript" src="public/js/jquery-3.4.1.min.js"></script>
    @yield('script')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/app.js"></script>
    <script type="text/javascript" src="public/js/style.js"></script>
    <script type="text/javascript" src="public/js/home.js"></script>
    <script type="text/javascript" src="public/js/owl.carousel.min.js"></script>
</body>
</html>