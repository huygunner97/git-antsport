@extends ('client.detail.index')

@section ('menu')
    @include ('client.layout.menu')
@endsection

@section ('content')
<div class="breadcrumb">
    <div class="container">
		<a href=""><i class="fas fa-home"></i>&nbsp;Trang chủ</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="gioi-thieu" class="active-text">Giới thiệu về chúng tôi</a>
    </div>
</div>
<div class="introduct">
	<div class="container">
		<div class="title-introduct" style="text-align: center;">TRANG WEB BÁN ĐỒ THỂ THAO HÀNG ĐẦU VIỆT NAM</div>
		<div class="content">
			<div class="row">
				<div class="col-md-4">
					<div class="content-into">
						<p>Chúng tôi cung cấp cho bạn</p><br>
						<img src="public/images/chatluong.jpg">
					</div>
				</div>
				<div class="col-md-4">
					<div class="content-into">
						<p>Chúng tôi cung cấp cho bạn</p><br>
						<img src="public/images/chatluong.jpg">
					</div>
				</div>
				<div class="col-md-4">
					<div class="content-into">
						<p>Chúng tôi cung cấp cho bạn</p><br>
						<img src="public/images/chatluong.jpg">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection