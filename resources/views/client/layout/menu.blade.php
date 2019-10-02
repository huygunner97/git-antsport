<div class="main-navigation">
    <nav class="hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav">
                        <li class="nav-item active" >
                            <a href="" class="nav-item-link">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a href="gioi-thieu" class="nav-item-link">GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item">
                            <a href="san-pham" class="nav-item-link">SẢN PHẨM</a>
                            <div class="nav-item-hidden">
                                <ul class="level0">
                                    @foreach ($menu['categories'] as $key => $category)
                                    <li>
                                        <h5><a href="san-pham/{{$category->pk_category_id}}/{{$category->unsigned_name}}">{{$category->c_name}}</a></h5>
                                        <ul class="level1">
                                            @foreach ($menu['category_detail'][$key] as $cp)
                                            <li>
                                                <a href="{{url('san-pham/'.$cp->pk_category_detail_id.'/'.$category->unsigned_name.'/'.$cp->unsigned_name.'')}}">{{$cp->c_name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="thuong-hieu" class="nav-item-link">THƯƠNG HIỆU</a>
                        </li>
                        <li class="nav-item">
                            <a href="khuyen-mai" class="nav-item-link">KHUYẾN MÃI</a>
                        </li>
                        <li class="nav-item">
                            <a href="tin-tuc" class="nav-item-link">TIN TỨC</a>
                        </li>
                        <li class="nav-item">
                            <a href="lien-he" class="nav-item-link">LIÊN HỆ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="opacity" id="opacity"></div>
<!-- menu responsive -->
<div id="mySidenav" class="sidenav">
    <div class="closebtn">
        <div class="logo_responsive">
            <img src="public/images/logo.png">
        </div>
        <div class="user_responsive">
            @if (session('name'))
                <a>{{session('name')}}</a>
                <a href="dang-xuat">Đăng xuất</a>
            @else
                <a href="dang-nhap">Đăng nhập</a>
                <a href="dang-ky">Đăng ký</a>
            @endif
        </div>
        <i onclick="closeNav()" class="fas fa-arrow-left"></i>
    </div>
    <div class="dropdown-btn"><a href="">Trang chủ</a></div>
    <div class="dropdown-btn"><a href="gioi-thieu">Giới thiệu</a></div>
    <div class="dropdown-btn">
        <a>Sản phẩm<i class="fas fa-angle-down" id="down"></i></a>
        <div class="dropdown-container">
            @foreach ($menu['categories'] as $category)
                <a href="san-pham/{{$category->pk_category_id}}/{{$category->unsigned_name}}"><i class="fas fa-caret-right"></i>&emsp;{{$category->c_name}}</a>
            @endforeach
        </div>
    </div>
    <div class="dropdown-btn">
        <a>Thương hiệu<i class="fas fa-angle-down" id="down"></i></a>
        <div class="dropdown-container">
            <a href="thuong-hieu"><i class="fas fa-caret-right"></i>&emsp;Nike</a>
            <a href="thuong-hieu"><i class="fas fa-caret-right"></i>&emsp;Adidas</a>
        </div>
    </div>
    <div class="dropdown-btn"><a href="khuyen-mai">Khuyến mãi</a></div>
    <div class="dropdown-btn"><a href="tin-tuc">Tin tức</a></div>
    <div class="dropdown-btn"><a href="lien-he">Liên hệ</a></div>
</div>
<!--end menu responsive -->
</div>

