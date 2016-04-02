@extends('admin.index')

@section('css')
	<link rel="stylesheet" href="{!!url('public/css/list.css')!!}">
@endsection

@section('content')
	<form action = "{!!route('admin.system.menu.postDelete')!!}" method = "POST" id = "listForm">
		<input type="hidden" name = "_token" value = "{!!csrf_token()!!}">
		<table>
			<thead>
				<tr>
					<th>Danh sách banner lớn</td>
				</tr>
			</thead>
		</table>
		{{-- Hiện thông báo thành công hoặc thất bại --}}
		@include('admin.alert')
		{{-- Hiện phân trang --}}
		{!!$data->render()!!}
		<table>
			<thead>
				<tr>
					<th>
						<input type="checkbox" name = "checkall" onclick = "toggle(this)">
					</th>
					<th>Id</th>
					<th></th>
					<th></th>
					<th>Name</th>
					<th>Thứ tự xuất hiện</th>
					<th>Parent Item</th>
					<th>Đặc tả</th>
					<th>Ngày tạo lập</th>
					<th>Lần chỉnh sửa trước</th>
				</tr>
			</thead>
			<tbody>
				<?php $id = 0?>
				@foreach($data as $item)
					<?php $id++ ?>
					<tr>
						<td class = "center_align">
							<input type="checkbox" name = "check[]" value = "{!!$item->id!!}">
						</td>
						<td class = "center_align">{!!$id!!}</td>
						<td class = "center_align"><a href="{!!url('admin/system/menu/update')!!}/{!!$item->id!!}">Sửa</a></td>
						<td class = "center_align"><a onclick = "return confirm('Bạn có muốn xoá item {!!$item->name!!} không?')" href="{!!url('admin/system/menu/delete')!!}/{!!$item->id!!}">Xóa</a></td>
						<td>{!!$item->name!!}</td>
						<td>{!!$item->ordinal!!}</td>
						<td>
							<?php
								$menu = DB::table('menu')->where('id',$item->parent_id)->first();
							if(!empty($menu->name))				
								echo $menu->name;
							else
								echo "Không có";
							
							?>			
						</td>
						<td>{!!$item->description!!}</td>
						<td>{!!$item->created_at!!}</td>
						<td>{!!$item->updated_at!!}</td>
					</tr>
				@endforeach		
			</tbody>
		</table>
		<br>
		<input type="submit" name = "delete_choose" value = "Xóa chọn" class = "btn btn-success" onclick = "return confirm('Bạn có muốn xóa các banner được chọn?')">
		<input type="button" name = "add_new" value = "Thêm mới" class = "btn btn-success" onclick = "window.location='./add'">
	</form>
@stop