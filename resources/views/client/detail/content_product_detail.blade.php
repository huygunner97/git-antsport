@extends ('client.detail.index')

@section ('menu')
    @include ('client.layout.menu')
@endsection

@section ('content')
<div class="breadcrumb">
    <div class="container">
        <a href=""><i class="fas fa-home"></i>&nbsp;Trang chủ</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="san-pham/{{$product_detail->categoryDetail->category->pk_category_id}}/{{$product_detail->categoryDetail->category->unsigned_name}}">{{$product_detail->categoryDetail->category->c_name}}</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="san-pham/{{$product_detail->categoryDetail->pk_category_detail_id}}/{{$product_detail->categoryDetail->category->unsigned_name}}/{{$product_detail->categoryDetail->unsigned_name}}">{{$product_detail->categoryDetail->c_name}}</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="chi-tiet/{{$product_detail->pk_product_id}}/{{$product_detail->unsigned_name}}" class="active-text">{{$product_detail->c_name}}</a>
    </div>
</div>
<!-- main -->
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="category">
                    @include ('client.layout.menu_detail')
                    <div class="related_product">
                        <div class="related_title" style="margin-top: 20px;">
                            <span>Sản phẩm liên quan</span>
                        </div>
                        <hr>
                        <div class="show_related_product">
                            @foreach ($product_related as $pr)
                                <a href="chi-tiet/{{$pr->pk_product_id}}/{{$pr->unsigned_name}}">
                                    <img src="public/upload/product/{{$pr->c_img}}" >
                                    <span>{{$pr->c_name}}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="show_product">
                    <div class="product_detail">
                        <div class="product_top">
                            <h2 style="text-align: center; display: none;">{{$product_detail->c_name}}</h2>
                            <div class="product_img">
                                <img src="public/upload/product/{{$product_detail->c_img}}" id="img">
                                <div class="small_img">
                                    <img src="public/upload/product/{{$product_detail->c_img1}}" id="img1">
                                    <img src="public/upload/product/{{$product_detail->c_img2}}" id="img2">
                                    <img src="public/upload/product/{{$product_detail->c_img3}}" id="img3">
                                    <img src="public/upload/product/{{$product_detail->c_img4}}" id="img4">
                                </div>
                                <div class="img-zoom">
                                    <img src="" id="img-zoom" alt="">
                                </div>
                            </div>
                            <div class="product_title">
                                <form method="post" action="gio-hang/add/{{$product_detail->pk_product_id}}">
                                    @csrf
                                    <h1>{{$product_detail->c_name}}</h1>
                                    <h2>{{number_format($product_detail->c_price)}}đ</h2>
                                    <div class="classify">
                                        @if ($product_detail->categoryDetail->fk_category_detail_id == 2)
                                            <p>Size :</p>
                                            <input type="checkbox" name="classify" value="Size : 39" checked id="39"><label for="39">39</label>&emsp;
                                            <input type="checkbox" name="classify" value="Size : 40" id="40"><label for="40">40</label>&emsp;
                                            <input type="checkbox" name="classify" value="Size : 41" id="41"><label for="41">41</label>&emsp;
                                            <input type="checkbox" name="classify" value="Size : 42" id="42"><label for="42">42</label>&emsp;
                                            <input type="checkbox" name="classify" value="Size : 43" id="43"><label for="43">43</label>
                                        @elseif ($product_detail->categoryDetail->fk_category_detail_id == 1)
                                            <p>Màu :</p>
                                            <input type="checkbox" name="classify" value="Màu : xanh" checked id="xanh"><label for="xanh">Xanh</label>&emsp;
                                            <input type="checkbox" name="classify" value="Màu : đỏ" id="do"><label for="do">Đỏ</label>&emsp;
                                            <input type="checkbox" name="classify" value="Màu : vàng" id="vang"><label for="vang">Vàng</label>&emsp;
                                            <input type="checkbox" name="classify" value="Màu : trắng" id="trang"><label for="trang">Trắng</label>&emsp;
                                            <input type="checkbox" name="classify" value="Màu : đen" id="den"><label for="den">Đen</label>
                                        @endif
                                        <p>Số lượng :&emsp;<input type="number" name="number" value="1" min="1"></p>
                                    </div>
                                    <input type="submit" value="Mua Ngay">
                                </form>
                            </div>
                        </div>
                        <div class="product_bottom">
                            <div class="title">
                                <span>Thông tin sản phẩm</span>
                            </div>
                            <div class="description">
                                <span>{!! $product_detail->c_description !!}</span>
                            </div>
                        </div>
                        @include('client.comment.show')
                    </div>
                </div>
            </div>
        </div>
        <div class="category_responsive">
            <div class="related_title" style="margin-top: 20px;">
                <span>Sản phẩm liên quan</span>
            </div>
            <hr>
            <div class="show_related_product">
                @foreach ($product_related as $pr)
                <a href="chi-tiet/{{$pr->pk_product_id}}/{{$pr->unsigned_name}}">
                    <img src="public/upload/product/{{$pr->c_img}}" >
                    <span>{{$pr->c_name}}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- end main -->

@endsection

