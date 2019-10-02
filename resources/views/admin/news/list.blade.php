@extends ('admin.layout.index')

@section ('content')
<div class="content">
    <div class="title">
        <span>Tin tức</span>&emsp;/&emsp;<span>Danh sách</span>
    </div>
    <div class="container">
        <table cellpadding="5" style="width: 90%;">
            <tr>
                <th style="width: 28%">Ảnh</th>
                <th style="width: 27%">Tiêu đề</th>
                <th style="width: 10%">Ngày đăng</th>
                <th style="width: 10%">Loại</th>
                <th style="width: 10%">Hot</th>
                <th style="width: 10%">Quản lý</th>
            </tr>
            @foreach ($newses as $news)
            <tr>
                <td style="text-align:center;">
                    @if ($news->c_img != "" && file_exists("public/upload/news/".$news->c_img))
                    <img src="public/upload/news/{{$news->c_img}}" style="width: 150px; height: 80px;">
                    @endif
                </td>
                <td>{{substr($news->c_title, 0, 250)}}</td>
                <td>{{$news->c_date}}</td>
                <td style="text-align: center;">
                    @if ($news->c_type == 0) 
                        {{'Tin tức'}}
                    @else 
                        {{'Mẹo hay'}}
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($news->c_hotnews == 1)
                        <i class="fas fa-check"></i>
                    @endif
                </td>
                <td style="text-align:center">
                    <a href="admin/news/edit/{{$news->pk_news_id}}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;
                    <a href="admin/news/delete/{{$news->pk_news_id}}" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        {{$newses->links('vendor.pagination')}}
    </div>
</div>

@endsection

