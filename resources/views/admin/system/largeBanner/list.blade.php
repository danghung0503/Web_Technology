@extends('admin.index')

@section('css')
	<link rel="stylesheet" href="{!!url('public/css/list.css')!!}">
@endsection

@section('content')
	<form action = "{!!route('admin.system.lBanner.postDelete')!!}" method = "POST" id = "listForm">
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
		{!!$lBanners->render()!!}
		<table>
			<thead>
				<tr>
					<th>
						<input type="checkbox" name = "checkall" onclick = "toggle(this)">
					</th>
					<th>Id</th>
					<th></th>
					<th></th>
					<th>Image</th>
					<th>Thứ tự xuất hiện</th>
					<th>Hiển thị</th>
					<th>Ngày tạo lập</th>
					<th>Lần chỉnh sửa trước</th>
				</tr>
			</thead>
			<tbody>
				<?php $id = 0?>
				@foreach($lBanners as $lBanner)
					<?php $id++ ?>
					<tr>
						<td class = "center_align">
							<input type="checkbox" name = "check[]" value = "{!!$lBanner->id!!}">
						</td>
						<td class = "center_align">{!!$id!!}</td>
						<td class = "center_align"><a href="{!!url('admin/system/lBanner/update')!!}/{!!$lBanner->id!!}">Sửa</a></td>
						<td class = "center_align"><a onclick = "return confirm('Bạn có muốn xoá banner {!!$lBanner->image!!} không?')" href="{!!url('admin/system/lBanner/delete')!!}/{!!$lBanner->id!!}">Xóa</a></td>
						<td class = "center_align"><img src="{!!url('resources/upload/banner')!!}/{!!$lBanner->image!!}" alt="" height="100px" width="200px"></td>
						<td>{!!$lBanner->ordinal!!}</td>
						<td class = "center_align">
							@if($lBanner->display==1)
								<input type="checkbox" name = "display" value = "display" checked = "checked" disabled = "disabled">
							@else
								<input type="checkbox" name = "display" value = "" disabled = "disabled">
							@endif
						</td>
						<td>{!!$lBanner->created_at!!}</td>
						<td>{!!$lBanner->updated_at!!}</td>
					</tr>
				@endforeach		
			</tbody>
		</table>
		<br>
		<input type="submit" name = "delete_choose" value = "Xóa chọn" class = "btn btn-success" onclick = "return confirm('Bạn có muốn xóa các banner được chọn?')">
		<input type="button" name = "add_new" value = "Thêm mới" class = "btn btn-success" onclick = "window.location='./add'">
	</form>
@stop