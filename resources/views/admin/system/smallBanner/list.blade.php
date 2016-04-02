@extends('admin.index')

@section('css')
	<link rel="stylesheet" href="{!!url('public/css/list.css')!!}">
@endsection

@section('content')
	<form action = "{!!route('admin.system.mBanner.postDelete')!!}" method = "POST" id = "listForm">
		<input type="hidden" name = "_token" value = "{!!csrf_token()!!}">
		<table>
			<thead>
				<tr>
					<th>Danh sách banner nhỏ</td>
				</tr>
			</thead>
		</table>
		{{-- Hiện thông báo thành công hoặc thất bại --}}
		@include('admin.alert')
		{{-- Hiện phân trang --}}
		{!!$mBanners->render()!!}
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
				@foreach($mBanners as $mBanner)
					<?php $id++ ?>
					<tr>
						<td class = "center_align">
							<input type="checkbox" name = "check[]" value = "{!!$mBanner->id!!}">
						</td>
						<td class = "center_align">{!!$id!!}</td>
						<td class = "center_align"><a href="{!!url('admin/system/mBanner/update')!!}/{!!$mBanner->id!!}">Sửa</a></td>
						<td class = "center_align"><a onclick = "return confirm('Bạn có muốn xoá banner {!!$mBanner->image!!} không?')" href="{!!url('admin/system/mBanner/delete')!!}/{!!$mBanner->id!!}">Xóa</a></td>
						<td class = "center_align"><img src="{!!url('resources/upload/banner')!!}/{!!$mBanner->image!!}" alt="" height="100px" width="200px"></td>
						<td>{!!$mBanner->ordinal!!}</td>
						<td class = "center_align">
							@if($mBanner->display==1)
								<input type="checkbox" name = "display" value = "display" checked = "checked" disabled = "disabled">
							@else
								<input type="checkbox" name = "display" value = "" disabled = "disabled">
							@endif
						</td>
						<td>{!!$mBanner->created_at!!}</td>
						<td>{!!$mBanner->updated_at!!}</td>
					</tr>
				@endforeach		
			</tbody>
		</table>
		<br>
		<input type="submit" name = "delete_choose" value = "Xóa chọn" class = "btn btn-success" onclick = "return confirm('Bạn có muốn xóa các banner được chọn?')">
		<input type="button" name = "add_new" value = "Thêm mới" class = "btn btn-success" onclick = "window.location='./add'">
	</form>
@stop