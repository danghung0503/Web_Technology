@extends('admin.index')

@section('css')
	<link rel="stylesheet" href="{!!url('public/css/list.css')!!}">
@endsection

@section('content')
	<form action = "{!!route('admin.member.postDelete')!!}" method = "POST" id = "listForm">
		<input type="hidden" name = "_token" value = "{!!csrf_token()!!}">
		<table>
			<thead>
				<tr>
					<th>Danh sách các thành viên</td>
				</tr>
			</thead>
		</table>
		{{-- Hiện thông báo thành công hoặc thất bại --}}
		@if(Session::has('flash_message')) 
			<div class = "{!!Session::get('flash_level')!!} message ">
				{!!Session::get('flash_message')!!}
			</div>
		@endif
		{!!$users->render()!!}
		<table>
			<thead>
				<tr>
					<th>
						<input type="checkbox" name = "checkall" onclick = "toggle(this)">
					</th>
					<th>Id</th>
					<th></th>
					<th></th>
					<th>Username</th>
					<th>Email</th>
					<th>Fullname</th>
					<th>Gender</th>
					<th>Avatar</th>
					<th>Company</th>
					<th>Address</th>
					<th>Phone Number</th>
					<th>Ngày tạo lập</th>
					<th>Lần chỉnh sửa trước</th>
				</tr>
			</thead>
			<tbody>
				<?php $id = 0?>
				@foreach($users as $user)
					<?php $id++ ?>
					<tr>
						<td class = "center_align">
							<input type="checkbox" name = "check[]" value = "{!!$user->id!!}">
						</td>
						<td class = "center_align">{!!$id!!}</td>
						<td class = "center_align"><a href="{!!url('admin/member/update')!!}/{!!$user->id!!}">Sửa</a></td>
						<td class = "center_align"><a onclick = "return confirm('Bạn có muốn xoá thành viên {!!$user->username!!} không?')" href="{!!url('admin/member/delete')!!}/{!!$user->id!!}">Xóa</a></td>
						<td>{!!$user->username!!}</td>
						<td>{!!$user->email!!}</td>
						<td>{!!$user->fullname!!}</td>
						<td>{!!$user->gender==1?'Nam':'Nữ'!!}</td>
						<td class = "center_align"><img src="{!!url('resources/upload/avatar')!!}/{!!$user->avatar!!}" alt="" height="45px" width="45px"></td>
						<td>{!!$user->company!!}</td>
						<td>{!!$user->address!!}</td>
						<td>{!!$user->phone_number!!}</td>
						<td>{!!$user->created_at!!}</td>
						<td>{!!$user->updated_at!!}</td>
					</tr>
				@endforeach		
			</tbody>
		</table>
		<br>
		<input type="submit" name = "delete_choose" value = "Xóa chọn" class = "btn btn-success" onclick = "return confirm('Bạn có muốn xóa các thành viên được chọn?')">
		<input type="button" name = "add_new" value = "Thêm mới" class = "btn btn-success" onclick = "window.location='./add'">
	</form>
@stop