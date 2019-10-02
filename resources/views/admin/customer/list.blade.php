@extends ('admin.layout.index')

@section ('content')
<div class="content">
    <div class="title">
        <span>Đơn hàng</span>&emsp;/&emsp;<span>Danh sách</span>
    </div>
    <div class="container">
        <table cellpadding="5" style="width: 90%; margin-bottom: 20px;">
            <tr>
                <th style="width: 20%">Họ tên</th>
                <th style="width: 30%">Địa chỉ</th>
                <th style="width: 15%">Điện thoại</th>
                <th style="width: 15%">Ngày mua</th>
                <th style="width: 20%">Quản lý</th>
            </tr>
            @foreach ($customers as $customer)
            <tr>
                <td>{{$customer->hoten}}</td>
                <td>{{$customer->diachi}}</td>
                <td>+(84){{$customer->dienthoai}}</td>
                <td style="text-align:center">{{$customer->date}}</td>
                <td style="text-align:center">
                    <a href="admin/customer/order/{{$customer->pk_customer_id}}" style="font-size: 14px;" >Xem</a>&nbsp;&nbsp;
                    <a href="admin/customer/delete/{{$customer->pk_customer_id}}" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                    @if ($customer->order->status == 1)
                    &nbsp;&nbsp;<a><i class="fas fa-check"></i></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
        {{$customers->links('vendor.pagination')}}
    </div>
</div>

@endsection

