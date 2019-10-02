        <!-- menu responsive -->
        <div class="opacity-responsive" id="opacity-responsive" onclick="closeNav()"></div>
        <div id="mySidenav" class="sidenav">
            <div class="closebtn">
                <span>
                    <i class="fas fa-user"></i>&emsp;<strong>{{ Auth::user()->name }}</strong>&emsp;
                    <a href="{{route('logout')}}"><i class="fas fa-power-off"></i></a>
                </span>
                <i onclick="closeNav()" class="fas fa-arrow-left" id="close"></i>
            </div>

            <div class="dropdown-btn">Danh Mục
                <i class="fas fa-angle-down" id="down"></i>
                <i class="fas fa-angle-up" id="up"></i>
            </div>
            <div class="dropdown-container">
                <a href="admin/category/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
                <a href="admin/category/add"><i class="fas fa-caret-right"></i>&emsp;Thêm</a>
            </div>

            <div class="dropdown-btn">Danh Mục Chi Tiết
                <i class="fas fa-angle-down" id="down"></i>
                <i class="fas fa-angle-up" id="up"></i>
            </div>
            <div class="dropdown-container">
                <a href="admin/category-detail/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
                <a href="admin/category-detail/add"><i class="fas fa-caret-right"></i>&emsp;Thêm</a>
            </div>

            <div class="dropdown-btn">Sản Phẩm
                <i class="fas fa-angle-down" id="down"></i>
                <i class="fas fa-angle-up" id="up"></i>
            </div>
            <div class="dropdown-container">
                <a href="admin/product/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
                <a href="admin/product/add"><i class="fas fa-caret-right"></i>&emsp;Thêm</a>
            </div>

            <div class="dropdown-btn">Đơn hàng
                <i class="fas fa-angle-down" id="down"></i>
                <i class="fas fa-angle-up" id="up"></i>
            </div>
            <div class="dropdown-container">
                <a href="admin/customer/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
            </div>

            <div class="dropdown-btn">Tin Tức
                <i class="fas fa-angle-down" id="down"></i>
                <i class="fas fa-angle-up" id="up"></i>
            </div>
            <div class="dropdown-container">
                <a href="admin/news/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
                <a href="admin/news/add"><i class="fas fa-caret-right"></i>&emsp;Thêm</a>
            </div>

            @if (Auth::user()->level == 1)
            <div class="dropdown-btn">User
                <i class="fas fa-angle-down" id="down"></i>
                <i class="fas fa-angle-up" id="up"></i>
            </div>
            <div class="dropdown-container">
                <a href="admin/user/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
            </div>
            @endif
        </div>
        <!-- end menu responsive -->
        <div class="main">
            <div class="menu">
                <div class="search">
                    <form action="" method="get">
                        <input type="text" placeholder="Tìm kiếm.. " name="">
                    </form>
                </div>
                <div class="list">
                    <div class="dropdown-btn"><i class="far fa-list-alt"></i>&emsp;Danh Mục
                        <i class="fas fa-angle-down" id="down"></i>
                        <i class="fas fa-angle-up" id="up"></i>
                    </div>
                    <div class="dropdown-container">
                        <a href="admin/category/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
                        <a href="admin/category/add"><i class="fas fa-caret-right"></i>&emsp;Thêm</a>
                    </div>

                    <div class="dropdown-btn"><i class="far fa-list-alt"></i>&emsp;Danh Mục Chi Tiết
                        <i class="fas fa-angle-down" id="down"></i>
                        <i class="fas fa-angle-up" id="up"></i>
                    </div>
                    <div class="dropdown-container">
                        <a href="admin/category-detail/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
                        <a href="admin/category-detail/add"><i class="fas fa-caret-right"></i>&emsp;Thêm</a>
                    </div>

                    <div class="dropdown-btn"><i class="fab fa-android"></i>&emsp;Sản Phẩm
                        <i class="fas fa-angle-down" id="down"></i>
                        <i class="fas fa-angle-up" id="up"></i>
                    </div>
                    <div class="dropdown-container">
                        <a href="admin/product/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
                        <a href="admin/product/add"><i class="fas fa-caret-right"></i>&emsp;Thêm</a>
                    </div>

                    <div class="dropdown-btn"><i class="fas fa-money-bill-wave"></i>&emsp;Đơn hàng
                        <i class="fas fa-angle-down" id="down"></i>
                        <i class="fas fa-angle-up" id="up"></i>
                    </div>
                    <div class="dropdown-container">
                        <a href="admin/customer/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
                    </div>

                    <div class="dropdown-btn"><i class="far fa-newspaper"></i>&emsp;Tin Tức
                        <i class="fas fa-angle-down" id="down"></i>
                        <i class="fas fa-angle-up" id="up"></i>
                    </div>
                    <div class="dropdown-container">
                        <a href="admin/news/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
                        <a href="admin/news/add"><i class="fas fa-caret-right"></i>&emsp;Thêm</a>
                    </div>

                    @if (Auth::user()->level == 1)
                    <div class="dropdown-btn"><i class="fas fa-users"></i>&emsp;User
                        <i class="fas fa-angle-down" id="down"></i>
                        <i class="fas fa-angle-up" id="up"></i>
                    </div>
                    <div class="dropdown-container">
                        <a href="admin/user/list"><i class="fas fa-caret-right"></i>&emsp;Danh sách</a>
                    </div>
                    @endif
                </div>
            </div>
