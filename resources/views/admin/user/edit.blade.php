@extends ('admin.layout.index')

@section ('content')
<div class="content">
    <div class="title">
        <span>Người dùng</span>&emsp;/&emsp;<span>Sửa</span>
    </div>
    <div class="container-extra">
        <p class="warning">Cấp quyền admin đồng nghĩa cho phép tài khoản được phép truy cập vào trang quản trị và chỉnh sửa dữ liệu</p>
        <form action="admin/user/edit/{{ $user->id }}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="authorization">
                <input type="submit" value="@if($user->level == 1){{'Hủy quyền'}}@else{{'Cấp quyền'}}@endif" onclick="return window.confirm('Xác nhận thay đổi')" />
            </div>
        </form>
    </div>
</div>

@endsection

