<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <base href="http://localhost/sport-project/laravel-antsport-finnal/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/admin/layout.css')}}">
    <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <img src="{{asset('public/images/logo.png')}}">
            </div>
            <div class="logout">
                <span>
                    <i class="fas fa-user"></i>&emsp;<strong>{{ Auth::user()->name }}</strong>&emsp;
                    <a href="{{route('logout-admin')}}"><i class="fas fa-power-off"></i></a>
                </span>
                <i class="fas fa-bars" onclick="openNav()" id="bars"></i>
            </div>
        </div>

        @include('admin.layout.menu')

        @yield('content')
        
        </div>
    </div>
    <script type="text/javascript" src="{{asset('public/js/jquery-3.4.1.min.js')}}"></script>
    @yield('script')
    <script type="text/javascript" src="{{asset('public/js/admin/layout.js')}}"></script>
</body>
</html>
