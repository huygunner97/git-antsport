@extends ('client.home.index')

@section ('menu')
    @include ('client.layout.menu')
@endsection

@section ('main_product')
<div class="main-category">
	<div class="container">
		<div class="owl-carousel owl-theme" id="main-category">
			@foreach ($menu['categories'] as $category)
			<div class="item">
				<a href="san-pham/{{$category->pk_category_id}}/{{$category->unsigned_name}}">
					<img src="public/upload/mainproduct/{{$category->c_img}}">
					<div class="main-category-description">{{$category->c_name}}</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection

@section ('new_product')
<div class="new-product">
	<div class="container">
		<div class="row">
			<div class="new-product-title text-center">
				<h3>Sản phẩm mới</h3>
				<h6>Thời trang - Giá rẻ - Deal sốc</h6>
			</div>
		</div>
		<div class="row" id="new-product">
			@foreach ($new_product as $np)
			<div class="col-lg-3 col-md-4 col-6 new-product-content">
				<a href="chi-tiet/{{$np->pk_product_id}}/{{$np->unsigned_name}}">
					<div class="content-product">
						<div class="img-product text-center">
							<img src="public/upload/product/{{$np->c_img}}">
						</div>
						<div class="title-product">
							<span title="{{$np->c_name}}">{{$np->c_name}}</span>
							<span>{{number_format($np->c_price)}}₫</span>
							<span>
								<span><i class="fas fa-share"></i>&nbsp;Chi tiết</span>
								<i class="far fa-heart" style="float: right;"></i>
							</span>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		<div class="row">
			<div class="show-more" >
				<p id="loadmore">Xem thêm</p>
				<div class="loader"></div>
			</div>
		</div>
	</div>
</div>
@endsection


@section ('hot_product')
<div class="hot-product">
	<div class="container">
		<div class="row">
			<div class="hot-product-title text-center">
				<h3>Sản phẩm nổi bật</h3>
				<h6>Thời trang - Giá rẻ - Deal sốc</h6>
			</div>
		</div>
		<div class="row">
			<div class="hot-product-select">
				<ul class="tabs tabs-title">
					<li class="tabs-link current" data-tab="tabs-1">
						<span>Xe thể thao</span>
					</li>
					<li class="tabs-link" data-tab="tabs-2">
						<span>Giày</span>
					</li>
					<li class="tabs-link" data-tab="tabs-3">
						<span>Trang phục thể thao</span>
					</li>
					<li class="tabs-link" data-tab="tabs-4">
						<span>Balo</span>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="hot-product-tab has-content" id="tabs-1">
					<div class="owl-carousel owl-theme owl-hot-product">
						@foreach ($hot_product[1] as $hp)
						<div class="item">
							<a href="chi-tiet/{{$hp->pk_product_id}}/{{$hp->unsigned_name}}">
								<div class="content-product">
									<div class="img-product text-center">
										<img src="public/upload/product/{{$hp->c_img}}">
									</div>
									<div class="title-product">
										<span title="{{$hp->c_name}}">{{$hp->c_name}}</span>
										<span>{{number_format($hp->c_price)}}₫</span>
										<span>
											<span><i class="fas fa-share"></i>&nbsp;Chi tiết</span>
											<i class="far fa-heart" style="float: right;"></i>
										</span>
									</div>
								</div>
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
            <div class="col-12">
                <div class="hot-product-tab" id="tabs-2">
                    <div class="owl-carousel owl-theme owl-hot-product">
                        @foreach ($hot_product[2] as $hp)
                            <div class="item">
                                <a href="chi-tiet/{{$hp->pk_product_id}}/{{$hp->unsigned_name}}">
                                    <div class="content-product">
                                        <div class="img-product text-center">
                                            <img src="public/upload/product/{{$hp->c_img}}">
                                        </div>
                                        <div class="title-product">
                                            <span title="{{$hp->c_name}}">{{$hp->c_name}}</span>
                                            <span>{{number_format($hp->c_price)}}₫</span>
                                            <span>
											<span><i class="fas fa-share"></i>&nbsp;Chi tiết</span>
											<i class="far fa-heart" style="float: right;"></i>
										</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="hot-product-tab" id="tabs-3">
                    <div class="owl-carousel owl-theme owl-hot-product">
                        @foreach ($hot_product[3] as $hp)
                            <div class="item">
                                <a href="chi-tiet/{{$hp->pk_product_id}}/{{$hp->unsigned_name}}">
                                    <div class="content-product">
                                        <div class="img-product text-center">
                                            <img src="public/upload/product/{{$hp->c_img}}">
                                        </div>
                                        <div class="title-product">
                                            <span title="{{$hp->c_name}}">{{$hp->c_name}}</span>
                                            <span>{{number_format($hp->c_price)}}₫</span>
                                            <span>
											<span><i class="fas fa-share"></i>&nbsp;Chi tiết</span>
											<i class="far fa-heart" style="float: right;"></i>
										</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="hot-product-tab" id="tabs-4">
                    <div class="owl-carousel owl-theme owl-hot-product">
                        @foreach ($hot_product[4] as $hp)
                            <div class="item">
                                <a href="chi-tiet/{{$hp->pk_product_id}}/{{$hp->unsigned_name}}">
                                    <div class="content-product">
                                        <div class="img-product text-center">
                                            <img src="public/upload/product/{{$hp->c_img}}">
                                        </div>
                                        <div class="title-product">
                                            <span title="{{$hp->c_name}}">{{$hp->c_name}}</span>
                                            <span>{{number_format($hp->c_price)}}₫</span>
                                            <span>
											<span><i class="fas fa-share"></i>&nbsp;Chi tiết</span>
											<i class="far fa-heart" style="float: right;"></i>
										</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection

@section ('news')
<div class="news">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="news-title text-center">
					<h3>Tin tức - Sự kiện</h3>
					<h6>Tin tức sự kiện hot nhất trong ngày</h6>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="owl-carousel owl-theme owl-news">
					@foreach ($news as $n)
					<div class="item">
						<a href="tin-tuc/{{$n->pk_news_id}}/{{$n->unsigned_title}}">
							<div class="content-news">
								<div class="img-news">
									<img src="public/upload/news/{{$n->c_img}}">
								</div>
								<div class="img-title">
									<div class="tt-background"></div>
									<div class="tt-title">
										<h3 title="{{$n->c_title}}">
											{{$n->c_title}}
										</h3>
									</div>
									<div class="tt-meta">
										<div class="tt-author">
											<i class="fas fa-calendar-week"></i> {{$n->c_date}}
										</div>
										<div class="tt-comments">
											<i class="fas fa-comments"></i> 10
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

