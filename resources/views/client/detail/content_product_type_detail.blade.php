@extends ('client.detail.index')

@section ('menu')
    @include ('client.layout.menu')
@endsection

@section ('content')
<div class="breadcrumb">
    <div class="container">
        <a href=""><i class="fas fa-home"></i>&nbsp;Trang chủ</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="san-pham/{{$category_detail->category->pk_category_id}}/{{$type}}">{{$category_detail->category->c_name}}</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="san-pham/{{$type_detail_id}}/{{$type}}/{{$type_detail}}" class="active-text">{{$category_detail->c_name}}</a>
    </div>
</div>
<!-- main -->
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="category">
                    {{-- @include ('client.layout.menu_detail') --}}
                    <div class="filter">
                        <div class="title">
                            <span>Bộ Lọc</span>
                        </div>
                        <form method="get" action="san-pham/{{$type_detail_id}}/{{$type}}/{{$type_detail}}" id="submit">
                            <h3>Giá :</h3>
                            <input type="checkbox" name="filter" value="1" id="1" ><label for="1">Tất cả</label><br>
                            <input type="checkbox" name="filter" value="2" id="2" ><label for="2">Trên 2 triệu</label><br>
                            <input type="checkbox" name="filter" value="3" id="3" ><label for="3">Từ 1 đến < 2 triệu</label><br>
                            <input type="checkbox" name="filter" value="4" id="4" ><label for="4">Từ 500k đến < 1 triệu</label><br>
                            <input type="checkbox" name="filter" value="5" id="5" ><label for="5">Dưới 500k</label><br>
                        </form>
                    </div>
                </div>
                <div class="category_responsive">
                    <div class="filter">
                        <form method="get" action="san-pham/{{$type_detail_id}}/{{$type}}/{{$type_detail}}" id="submit">
                            <span style="color: #99c95c; font-size: 15px;">Lọc giá :</span>
                            <input type="checkbox" name="filter" value="1"  checked id="1" ><label for="1">Tất cả</label><br>
                            <input type="checkbox" name="filter" value="2" id="2" ><label for="2">Trên 2 triệu</label><br>
                            <input type="checkbox" name="filter" value="3" id="3" ><label for="3">Từ 1 đến < 2 triệu</label><br>
                            <input type="checkbox" name="filter" value="4" id="4" ><label for="4">Từ 500k đến < 1 triệu</label><br>
                            <input type="checkbox" name="filter" value="5" id="5" ><label for="5">Dưới 500k</label><br>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="show_product">
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

@section ('script')
@if (isset($filter))
<script type="text/javascript">
    $(document).ready(function(){
        $('.filter > form > input').each(function(){
            if ($(this).val() ==  {{$filter}}) {
                $(this).prop('checked', true);    
            }
        });
    });
</script>
@endif
@endsection