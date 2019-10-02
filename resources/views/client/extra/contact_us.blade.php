@extends ('client.detail.index')

@section ('menu')
    @include ('client.layout.menu')
@endsection

@section ('content')
<div class="breadcrumb">
    <div class="container">
		<a href=""><i class="fas fa-home"></i>&nbsp;Trang chủ</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="lien-he" class="active-text">Liên hệ</a>
    </div>
</div>

<div class="contact">
	<div class="container">
		<div class="title-contact" style="text-align: center;">LIÊN HỆ VỚI CHÚNG TÔI</div>
		<div class="content">
			<div class="row">
				<div class="col-md-4">
					<div class="content-into">
						<img src="public/images/hotline.jpg"><span>Hotline<br><br>037.406.8393</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="content-into">
						<a href="https://www.facebook.com/profile.php?id=100007359403843" target="_blank">
							<img src="public/images/fb.png">
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="content-into">
						<a><img src="public/images/zalo.jpg"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection