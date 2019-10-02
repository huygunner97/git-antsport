{{--header --}}
<meta name="user-id" content="@if(Auth::user()){{ Auth::user()->id }}@endif">
<div class="opacity-responsive" id="opacity-responsive" onclick="closeNav()"></div>
<div class="header">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-12">
                    <ul class="ul-inform">
                        <li>
                            <i class="fas fa-phone"></i>Hotline:
                            <a href="#">037.406.8393</a>
                        </li>
                        <li class="hidden-xs">
                            <i class="fas fa-envelope"></i>Email:
                            <a href="#">vanhuy97bn@gmail.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-0">
                    <ul class="ul-social">
                        <li>
                            <a href="#" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="fab fa-google-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header-main">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-2">
                    <div class="logo">
                        <a href="">
                            <img src="public/images/logo.png">
                        </a>
                    </div>
                    <div class="button-responsive">
                        <i class="fas fa-bars" onclick="openNav()"></i>
                    </div>
                </div>
                <div class="col-lg-5  col-7">
                    <div class="search-header">
                        <form action="tim-kiem" method="GET" class="input-group">
                            <input type="text" class="input-group-field" placeholder="Tìm kiếm sản phẩm " name="search" id="search">
                            <button class="input-group-btn" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                        <div class="search-ajax" id="search-ajax"></div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-3">
                    <div class="index-cart">
                        <a href="gio-hang" class="header-cart">
                            <i class="fas fa-shopping-cart"></i><span class="cart-text">Giỏ hàng</span>
                            <span class="number-cart">
                                @if (session('number'))
                                    {{ session('number') }}
                                @else
                                    {{ 0 }}
                                @endif
                            </span>
                        </a>
                    </div>
                    <div class="account-header">
                        <div class="account-login">
                            @if (Auth::user())
                                @if (!Auth::user()->information || Auth::user()->information->img == "" || !Auth::user()->information->img)
                                    <img src="public/images/user.jpg" alt="">
                                @else
                                    <img src="public/upload/user/{{Auth::user()->information->img}}" alt="">
                                @endif
                                <span class="account-login-name">{{Auth::user()->name}}</span>
                                <i class="fas fa-caret-down down"></i>
                            @else
                                <i class="fas fa-user-circle user-icon"></i>
                                <div class="account-login-text">
                                    Đăng nhập<br/>
                                    <span>Tài khoản và đơn hàng</span>
                                </div>
                            @endif
                        </div>
                        <ul class="account-login-hidden">
                            @if (!Auth::user())
                                <a href="{{route('register')}}"><li>Đăng ký</li></a>
                                <a href="{{route('login')}}"><li>Đăng nhập</li></a>
                            @else
                                <a href="{{route('user-info')}}"><li>Thông tin người dùng</li></a>
                                <a href="{{route('logout')}}"><li>Đăng xuất</li></a>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
