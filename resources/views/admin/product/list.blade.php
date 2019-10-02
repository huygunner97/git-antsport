@extends ('admin.layout.index')

@section ('content')
<div class="content">
	<div class="title">
		<span>Sản phẩm</span>&emsp;/&emsp;<span>Danh sách</span>
	</div>
	<div class="container">
		<table cellpadding="5" style="width: 90%;">
			<tr>
				<th style="width: 25%">Ảnh</th>
				<th style="width: 25%">Tiêu đề</th>
				<th style="width: 20%">Thuộc danh mục</th>
				<th style="width: 10%">Giá</th>
				<th style="width: 10%">Hot</th>
				<th style="width: 10%">Quản lý</th>
			</tr>
			@foreach ($products as  $product)
			<tr>
				<td style="text-align:center;">
					@if ($product->c_img != "" && file_exists("public/upload/product/".$product->c_img))
					<img src="public/upload/product/{{$product->c_img}}" style="width: 120px; height: 80px;">
					@endif
				</td>
				<td>{{$product->c_name}}</td>
				<td>{{ $product->categoryDetail->c_name }}</td>
				<td>{{number_format($product->c_price)}}</td>
				<td style="text-align: center;">
					@if ($product->c_hotproduct == 1)
						<i class="fas fa-check"></i>
					@endif
				</td>
				<td style="text-align:center">
					<a href="admin/product/edit/{{$product->pk_product_id}}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;
					<a href="admin/product/delete/{{$product->pk_product_id}}" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</table>
		{{$products->links('vendor.pagination')}}
	</div>
</div>

@endsection