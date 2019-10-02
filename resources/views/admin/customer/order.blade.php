@extends ('admin.layout.index')

@section ('content')
<div class="content">
    <div class="title">
        <span>Đơn hàng</span>&emsp;/&emsp;<span>Chi tiết</span>
    </div>
    <div class="container">
        <table cellpadding="10" style="width: 90%">
            <thead>
                <tr>
                    <th style="width: 20%">Ảnh</th>
                    <th style="width: 34%">Sản phẩm</th>
                    <th style="width: 13%">Phân loại</th>
                    <th style="width: 10%" >Số lượng</th>
                    <th style="width: 10%">Giá</th>
                    <th style="width: 13%">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order_detail as $key => $od)
                <tr>
                    <td style="text-align: center;"><img src="public/upload/product/{{ $product[$key]->c_img }}" style="width: 100px;"/></td>
                    <td>{{$product[$key]->c_name}}</td>
                    <td>{{$od->classify}}</td>
                    <td style="text-align: center;">{{$od->number}}</td>
                    <td>{{number_format($od->price)}}</td>
                    <td style="text-align: center; ">
                        @if ($order->status == 0)
                            {{ "Chưa gửi" }}
                        @else
                            {{ "Đã gửi" }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="sum">
            <div>
                @if ($order->status == 0)
                    <a href="admin/customer/update/{{$order->order_id}}">Gửi đơn hàng</a>
                @endif
            </div>
            <div>
                <p><strong>Tổng sản phẩm :</strong>&emsp;{{$count}}&nbsp;Sản phẩm</p>
                <p><strong>Tổng giá :</strong>&emsp;{{number_format($order->price)}}</p>
            </div>
        </div>
    </div>
</div>

@endsection

