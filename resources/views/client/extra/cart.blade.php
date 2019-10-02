@extends ('client.detail.index')

@section ('menu')
    @include ('client.layout.menu')
@endsection

@section ('content')
<div class="breadcrumb">
    <div class="container">
        <a href=""><i class="fas fa-home"></i>&nbsp;Trang chủ</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="gio-hang" class="active-text">Giỏ hàng</a>
    </div>
</div>
<!-- main -->
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="category">
                    @include ('client.layout.menu_detail')
                </div>
            </div>
            <div class="col-md-9">
                <div class="show_cart">
                    @if (!session('number') || (session('number') && session('number') == 0))
                        <div class="no-product">Hãy chọn sản phẩm cho hôm nay !</div>
                    @else
                        <div id="cart">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-color">
                                        <th>Ảnh</th>
                                        <th style="width: 40%">Sản phẩm</th>
                                        <th>Phân loại</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('cart') as $product)
                                    <tr class="cart_table">
                                        <td><img src="public/upload/product/{{$product['c_img']}}" style="width: 100px; height: 70px;"/></td>
                                        <td>{{$product['c_name']}}</td>
                                        <td>{{$product['classify']}}</td>
                                        <td><input type="number" min="1" style="width: 40px;" value="{{$product['number']}}"  class="cart_number" id="{{$product['pk_product_id']}}{{$product['classify']}}" /></td>
                                        <td name="{{$product['c_price']}}" class="cart_price">{{number_format($product['c_price'])}}đ</td>
                                        <td><a href="gio-hang/delete/{{$product['pk_product_id']}}{{$product['classify']}}" onclick="return window.confirm('Chắc chắn xóa ?')"><i class="fa fa-trash"></i> </a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="function-cart">
                            <div style="margin-top: 20px;">
                                <a href="" class="function-btn" >Tiếp tục mua hàng</a>
                                <a href="gio-hang/destroy" class="function-btn" >Xóa giỏ hàng</a>
                                <a href="thanh-toan" @if(!Auth::user())onclick="return window.confirm('Bạn cần đăng nhập để thực hiện chức năng này')"@endif class="function-btn">Thanh toán</a>
                            </div>
                            <div id="cart_total">
                                <p>Tổng sản phẩm :&emsp;<span style="color: red">{{ $number_cart }}&nbsp;Sản phẩm</span></p>
                                <p>Tổng giá :&emsp;<span style="color: red">{{number_format($total_cart)}}đ</span></p>
                            </div>
                        </div>
                    @endif

                    @if (Auth::user() && $purchased != [])
                        <hr style="margin: 20px 0;">
                        @foreach ($customer as $c_key => $c)
                            <div class="purchased">
                                <span>Đơn hàng ngày : <i style="color: #646161">{{$c->date}}</i></span><span><a href="gio-hang/delete-purchased/{{$c->pk_customer_id}}" onclick="
                                    @if ($c->order->status == 0)
                                            return window.confirm('Hủy đơn hàng ?')
                                    @elseif ($c->order->status == 1)
                                            return window.confirm('Xóa đơn hàng ?')
                                    @endif
                                            "><i class="fa fa-trash"></i></a></span>
                            </div>
                            <div id="purchased">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-color">
                                            <th style="width: 20%">Ảnh</th>
                                            <th style="width: 35%">Sản phẩm</th>
                                            <th>Phân loại</th>
                                            <th>Số lượng</th>
                                            <th>Giá/1SP</th>
                                            <th>Tình trạng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchased[$c_key] as $p_key => $p)
                                        <tr>
                                            <td><img src="public/upload/product/{{$product_purchased[$c_key][$p_key]->c_img}}" style="width: 100px; height: 70px;"/></td>
                                            <td>{{$product_purchased[$c_key][$p_key]->c_name}}</td>
                                            <td>{{$p->classify}}</td>
                                            <td>{{$p->number}}</td>
                                            <td>{{number_format($p->price)}}đ</td>
                                            <td>
                                                @if ($c->order->status == 0)
                                                    <span style="color: red">{{'Đang gửi'}}</span>
                                                @elseif ($c->order->status == 1)
                                                    <span style="color: red">{{'Hoàn thành'}}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main -->

@endsection

@section('script')
    <script type="text/javascript">
        $('.cart_number').change(function(){
            var cart_id = $(this).attr('id');
            var number = $(this).val();
            var total_number=0; var total_price =0;
            $('.cart_table').each(function(){
                total_number = total_number + parseInt($(this).find('.cart_number').val());
                total_price = total_price + $(this).find('.cart_number').val() * $(this).find('.cart_price').attr('name');
            });
            $.get("cart/"+total_number+"/"+total_price+"/"+cart_id+"/"+number+"", function(data) {
                $("#cart_total").html(data);
            });
        });

        $('.payment').click(function () {
            $.ajax({
                url : "http://localhost/sport-project/laravel-antsport/checkout",
                type : "get",
                dataType: 'json',
                success : function (data){
                    var result = [];
                    $.each(data, function (key, item) {
                        result[key] = item;
                    });
                    if (result['notlogin']) {
                        alert(result['notlogin']);
                        openLogin();
                    } else {
                        openCheckout();
                        $('.checkout').find("input[name=name]").attr('value', result['name']);
                        $('.checkout').find("input[name=address]").attr('value', result['diachi']);
                        $('.checkout').find("input[name=phone]").attr('value', '+(84)'+result['dienthoai']);
                    }
                }
            });
        });
    </script>
@endsection