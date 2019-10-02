<div class="sidenav_detail">
	<div class="closebtn_detail">
		<span>Danh Mục</span>
	</div>
	@foreach ($menu['categories'] as $key => $category)
	<div class="dropdown-btn_detail">{{$category->c_name}}
		<i class="fas fa-angle-down" id="down"></i>
		<i class="fas fa-angle-up" id="up"></i>
	</div>
	<div class="dropdown-container_detail">
		@foreach ($menu['category_detail'][$key]  as $cp)
		<a href="san-pham/{{$cp->pk_category_detail_id}}/{{$category->unsigned_name}}/{{$cp->unsigned_name}}"><i class="fas fa-caret-right"></i>&emsp;{{$cp->c_name}}</a>
		@endforeach
	</div>
	@endforeach
</div>