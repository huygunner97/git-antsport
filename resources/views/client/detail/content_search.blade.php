@extends ('client.detail.index')

@section ('menu')
    @include ('client.layout.menu')
@endsection

@section ('content')
<div class="breadcrumb">
    <div class="container">
        <a href=""><i class="fas fa-home"></i>&nbsp;Trang chủ</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a class="active-text">Tìm kiếm</a>
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
                <div class="show_product">
                    <div class="no-product">"{{ $num }}" kết quả trả về với từ khóa "{{ $search }}"</div>
                    <div class="products">
                        <div class="row">
                            @foreach ($product as $pd)
                                <div class="col-md-4 col-6">
                                    <div class="detail">
                                        <a href="chi-tiet/{{$pd->pk_product_id}}/{{$pd->unsigned_name}}">
                                            <div class="content-product">
                                                <div class="img-product text-center">
                                                    <img src="public/upload/product/{{$pd->c_img}}">
                                                </div>
                                                <div class="title-product">
                                                    <span title="{{$pd->c_name}}">{{$pd->c_name}}</span>
                                                    <span>{{number_format($pd->c_price)}}₫</span>
                                                    <span>
                                                        <span><i class="fas fa-share"></i>&nbsp;Chi tiết</span>
                                                        <i class="far fa-heart" style="float: right;"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{$product->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main -->

@endsection