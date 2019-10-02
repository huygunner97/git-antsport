@extends ('admin.layout.index')

@section ('content')
<div class="content">
    <div class="title">
        <span>Người dùng</span>&emsp;/&emsp;<span>Danh sách</span>
    </div>
    <div class="container">
        <table cellpadding="5" style="width: 80%;">
            <tr>
                <th style="width: 30%">Email</th>
                <th style="width: 30%">Tên người dùng</th>
                <th style="width: 20%">Cấp độ</th>
                <th style="width: 10%">Quản lý</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td>
                    @if ($user->level == 1)
                        {{ 'admin' }}
                    @else
                        {{ 'thành viên' }}
                    @endif
                </td>
                <td style="text-align:center">
                    <a href="admin/user/edit/{{$user->id}}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;
                    <a href="admin/user/delete/{{$user->id}}" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        {{$users->links('vendor.pagination')}}
    </div>
</div>

@endsection

