@extends ('admin.layout.index')

@section ('content')
<div class="content">
	<div class="title">
		<span>Danh mục</span>&emsp;/&emsp;<span>Danh sách</span>
	</div>
	<div class="container">
		<table cellpadding="5" style="width: 80%;">
			<tr>
				<th style="width: 30%">Tên danh mục</th>
				<th style="width: 30%">Ảnh</th>
				<th style="width: 10%">Quản lý</th>
			</tr>
			@foreach ($categories as $category)
			<tr>
				<td>{{ $category->c_name }}</td>
				<td style="text-align:center;">
					@if ($category->c_img != "" && file_exists("public/upload/mainproduct/".$category->c_img))
					<img src="public/upload/mainproduct/{{ $category->c_img }}" style="width: 150px; height: 90px;">
					@endif
				</td>
				<td style="text-align:center">
					<a href="admin/category/edit/{{ $category->pk_category_id }}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;
					<a href="admin/category/delete/{{ $category->pk_category_id }}" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</table>
		{{$categories->links('vendor.pagination')}}
	</div>
</div>

@endsection