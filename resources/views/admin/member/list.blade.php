@extends('admin.index')

@section('css')
	<link rel="stylesheet" href="{!!url('public/css/list.css')!!}">
@endsection

@section('content')
		<table>
			<thead>
				<tr>
					<th>Danh sách các thành viên</td>
				</tr>
			</thead>
		</table>
		{{-- Hiện thông báo thành công hoặc thất bại --}}
		@include('admin.alert')
		{{-- Hiện phân trang --}}
		{{--{!!$users->render()!!}--}}
		<table>
			<thead>
				<tr>
					<th>
						<input type="checkbox" name = "checkall" onclick = "toggle(this)">
					</th>
					<th>STT</th>
					<th></th>
					<th></th>
					<th>Tên đăng nhập</th>
					<th>Email</th>
					<th>Họ Tên</th>
					<th>Giới Tính</th>
					<th>Ảnh Đại Diện</th>
					<th>Công Ty</th>
					<th>Địa Chỉ</th>
					<th>Số Điện Thoại</th>
					{{--<th>Quyền</th> --}}
					{{-- <th>Ngày tạo lập</th>
					<th>Lần chỉnh sửa trước</th> --}}
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
						<td class = "center_align"><img src="{!!url('resources/upload/avatar/'.(!empty($user->avatar)?$user->id.'/'.$user->avatar:'default/default.jpg'))!!}" alt="" height="45px" width="45px"></td>
						<td>{!!empty($user->company)?'Không có':$user->company!!}</td>
						<td>{!!$user->address!!}</td>
						<td>{!!$user->phonenumber!!}</td>
						{{--<td>{!!$user->level==2?"Admin":"Thành viên"!!}</td>--}}
						<!-- <td>{!!$user->created_at!!}</td>
						<td>{!!$user->updated_at!!}</td> -->
					</tr>
				@endforeach		
			</tbody>
		</table>
		<br>
		<input type="submit" name = "delete_choose" value = "Xóa chọn" class = "btn btn-success" onclick = "return confirm('Bạn có muốn xóa các thành viên được chọn?')">
@stop