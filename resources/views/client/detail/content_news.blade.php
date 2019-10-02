@extends ('client.detail.index')

@section ('menu')
    @include ('client.layout.menu')
@endsection

@section ('content')
<div class="breadcrumb">
    <div class="container">
        <a href=""><i class="fas fa-home"></i>&nbsp;Trang chủ</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="tin-tuc">Tin tức</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="tin-tuc/{{$news->pk_news_id}}/{{$news->c_title}}" class="active-text">{{$news->c_title}}</a>
    </div>
</div>
<!-- main -->
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="show_news">
                    <h1>
                        {{ $news->c_title }}
                    </h1>
                    <p style="color: #646161;">Ngày đăng: {{$news->c_date}}</p>
                    <div class="news_img"><img src="public/upload/news/{{$news->c_img}}"></div>
                    <p>{!! $news->c_content !!}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="related_news">
                    <div class="type_news">
                        <span>Tin tức liên quan</span>
                    </div>
                    <hr>
                    <div class="show_related_news">
                        @foreach ($newses as $n)
                            <a href="tin-tuc/{{$n->pk_news_id}}/{{$n->unsigned_title}}">
                                <img src="public/upload/news/{{$n->c_img}}" >
                                <span>{{$n->c_title}}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main -->

@endsection