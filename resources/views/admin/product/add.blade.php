@extends ('admin.layout.index')

@section ('content')
<div class="content">
    <div class="title">
        <span>Sản phẩm</span>&emsp;/&emsp;<span>Thêm</span>
    </div>
    <div class="container-extra">
        <form action="admin/product/add" method="post" enctype= "multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <table cellpadding="10" style="width: 80%; margin-bottom: 10px;">
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
                    <td>Tiêu đề: </td>
                    <td><input type="text" name="c_name" placeholder="Tên danh mục" id="input"></td>
                </tr>

                <tr>
                    <td>Danh mục :</td>
                    <td>
                        <select name="pk_category_id" id="pk_category_id">
                            @foreach ($categories as $category)
                            <option value="{{$category->pk_category_id}}">{{$category->c_name}}</option>
                            @endforeach              
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Danh mục chi tiết: </td>
                    <td>
                        <select name="pk_category_detail_id" id="pk_category_detail_id">
                            @foreach ($category_detail as $cd)
                            <option value="{{$cd->pk_category_detail_id}}">{{$cd->c_name}}</option>
                            @endforeach               
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Giới thiệu : </td>
                    <td style="width: 70%">
                        <textarea name="c_description" style="height:200px;"></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("c_description");
                        </script>
                    </td>
                </tr>

                <tr>
                    <td>Giá: </td>
                    <td><input type="text" name="c_price" placeholder="Giá" id="input"></td>
                </tr>

                <tr>
                    <td>Hot :</td>
                    <td><input type="checkbox" name="c_hotproduct" > </td>
                </tr>

                <tr>
                    <td>Ảnh :</td>
                    <td><input type="file" name="c_img"></td>
                </tr>

                <tr>
                    <td>Ảnh 1:</td>
                    <td><input type="file" name="c_img1"></td>
                </tr>

                <tr>
                    <td>Ảnh 2:</td>
                    <td><input type="file" name="c_img2"></td>
                </tr>

                <tr>
                    <td>Ảnh 3:</td>
                    <td><input type="file" name="c_img3"></td>
                </tr>

                <tr>
                    <td>Ảnh 4:</td>
                    <td><input type="file" name="c_img4"></td>
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

@section('script')
<script type="text/javascript" src="public/client/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#pk_category_id").change(function() {
            var category_detail_id = $(this).val();
            $.get("admin/ajax/category-detail/"+category_detail_id, function(data) {
                $("#pk_category_detail_id").html(data);
            });
        });
    });
</script>
@endsection