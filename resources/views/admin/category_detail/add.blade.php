@extends ('admin.layout.index')

@section ('content')
<div class="content">
    <div class="title">
        <span>Danh mục chi tiết</span>&emsp;/&emsp;<span>Thêm</span>
    </div>
    <div class="container-extra">
        <form action="admin/category-detail/add" method="post" enctype= "multipart/form-data">
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
                    <td>Tên danh mục : </td>
                    <td><input type="text" name="c_name" placeholder="Tên danh mục" id="input"></td>
                </tr>
                <tr>
                    <td>Thuộc danh mục :</td>
                    <td>
                        <select name="fk_category_detail_id">
                            @foreach ($categories as $category)
                            <option value="{{$category->pk_category_id}}">{{$category->c_name}}</option>
                            @endforeach               
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"  value="Thêm" id="submit"></td>
                </tr>
            </table>
        <form>
    </div>
</div>

@endsection