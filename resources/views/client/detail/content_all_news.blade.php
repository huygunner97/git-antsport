@extends ('client.detail.index')

@section ('menu')
    @include ('client.layout.menu')
@endsection

@section ('content')
<div class="breadcrumb">
    <div class="container">
        <a href=""><i class="fas fa-home"></i>&nbsp;Trang chủ</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="tin-tuc" class="active-text">Tin tức</a>
    </div>
</div>
<!-- main -->
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="related_news">
                    <div class="type_news">
                        <span>Tin mới nhất</span>
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
            <div class="col-md-6">
                <div class="hot_news" style="margin-top: 20px;">
                    <div class="type_news">
                        <span><i class="far fa-newspaper"></i> Tin nổi bật</span>
                    </div>
                    <hr>
                    <div class="show_hot_news">
                        <div class="row">
                            @foreach ($hot_news as $n)
                                <div class="col-md-6" style="padding-bottom: 50px">
                                    <a href="tin-tuc/{{$n->pk_news_id}}/{{$n->unsigned_title}}" title="{{$n->c_title}}">
                                        <div class="images">
                                            <img src="public/upload/news/{{$n->c_img}}">
                                        </div>
                                        <div class="description">
                                            <div class="description-bg"></div>
                                            <p>{{$n->c_title}}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="knowledge">
                    <div class="type_news">
                        <span>Có thể bạn chưa biết ?</span>
                    </div>
                    <hr>
                    <div class="show_knowledge">
                        @foreach ($tips as $n)
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