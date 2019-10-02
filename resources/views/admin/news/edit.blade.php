@extends ('admin.layout.index')

@section ('content')
<div class="content">
    <div class="title">
        <span>Tin tức</span>&emsp;/&emsp;<span>Thêm</span>
    </div>
    <div class="container-extra">
        <form action="admin/news/edit/{{ $news->pk_news_id }}" method="post" enctype= "multipart/form-data">
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
                    <td>Tiêu đề: </td>
                    <td><input type="text" name="c_title" placeholder="tiêu đề tin tức" value="{{$news->c_title}}" id="input"></td>
                </tr>
                <tr>
                    <td>Nội dung : </td>
                    <td style="width: 80%">
                        <textarea name="c_content" style="height:200px;">{{$news->c_content}}</textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("c_content");
                        </script>
                    </td>
                </tr>
                <tr>
                    <td>Ngày đăng: </td>
                    <td><input type="date" name="c_date" value="{{$news->c_date}}" placeholder="ngày đăng" id="input"></td>
                </tr>
                <tr>
                    <td>Loại :</td>
                    <td>
                        <select name="c_type">
                            <option value="0" 
                                @if ($news->c_type == 0)
                                    {{ "selected" }}
                                @endif>Tin tức
                            </option>
                            <option value="1"
                                @if ($news->c_type == 1)
                                    {{ "selected" }}
                                @endif>Mẹo hay
                            </option>            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Hot :</td>
                    <td><input type="checkbox" 
                        @if (isset($news->c_hotnews) && $news->c_hotnews==1)
                            {{ "checked" }}
                        @endif 
                        name="c_hotnews"> </td>
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

