@extends ('admin.layout.index')

@section ('content')
<div class="content">
    <div class="title">
        <span>Danh mục</span>&emsp;/&emsp;<span>Sửa</span>
    </div>
    <div class="container-extra">
        <form action="admin/category/edit/{{$category->pk_category_id}}" method="post" enctype= "multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <table cellpadding="10" style="width: 70%;">
                <tr>
                    <td></td>
                    <td>
                        @include ('admin.error') 
                        
                        @if (session('announce'))
                            <div class="alert-succ">{{ session('announce') }}</div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tên danh mục: </td>
                    <td><input type="text" name="c_name" placeholder="Tên danh mục" id="input" value="{{$category->c_name}}"></td>
                </tr>
                <tr>
                    <td>Ảnh :</td>
                    <td><input type="file" name="c_img"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"  value="Sửa" id="submit"></td>
                </tr>
            </table>
        <form>
    </div>
</div>

@endsection