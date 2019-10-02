@extends ('admin.layout.index')

@section ('content')
<div class="content">
	<div class="title">
		<span>Danh mục chi tiết</span>&emsp;/&emsp;<span>Danh sách</span>
	</div>
	<div class="container">
		<table cellpadding="5" style="width: 80%;">
			<tr>
				<th style="width: 30%">Tên danh mục</th>
				<th style="width: 30%">Thuộc danh mục</th>
				<th style="width: 10%;">Quản lý</th>
			</tr>
			@foreach ($category_detail as $cd)
			<tr>
				<td>{{$cd->c_name}}</td>
				<td>{{$cd->category->c_name}}</td>
				<td style="text-align:center">
					<a href="admin/category-detail/edit/{{$cd->pk_category_detail_id}}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;
					<a href="admin/category-detail/delete/{{$cd->pk_category_detail_id}}" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</table>
		{{$category_detail->links('vendor.pagination')}}
	</div>
</div>

@endsection