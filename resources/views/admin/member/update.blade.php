@extends('admin.index')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading center_align">Cập nhật thông tin</div>
				<div class="panel-body">
					<!-- Hiển thị thông báo thành công hoặc thất bại -->
					@include('admin.alert')
					@include('admin.error')
					
					<form class="form-horizontal" method="POST" action="{{ route('admin.member.postUpdate') }}" id = "updateForm">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value = "{!!$user->id!!}">
						<div class="form-group">
							<label class="col-md-4 control-label">Tên Đăng Nhập *</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{$user->username}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Địa Chỉ Email *</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-4 control-label">Họ Tên *</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="fullname" value="{{$user->fullname}}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Giới Tính *</label>
							<div class="col-md-4" style = "">
								@if($user->gender==1) 
									<label class="col-md-4 control-label">Nam</label>
								@else
									<label class="col-md-4 control-label">Nữ</label>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Ảnh Đại Diện</label>
							<div class="col-md-6">
								<img src="{!!url('resources/upload/avatar/'.(!empty($user->avatar)?$user->id.'/'.$user->avatar:'default/default.jpg'))!!}" alt="" height="90px" width="90px" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Công Ty</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="company" value="{{ $user->company }}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Địa Chỉ</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" value="{{ $user->address }}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Số Điện Thoại</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="phonenumber" value="{{ $user->phonenumber }}" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Thay đổi cấp độ</label>
							<div class="col-md-6">
								<select name="level">
									<option value="1" {{ $user->level==1?'selected':"" }}>Thành Viên</option>
									<option value="2" {{ $user->level==2?'selected':"" }}>Admin</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-7 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Cập nhật
								</button>
								<input type="reset" value = "Nhập lại" class="btn btn-primary" id="reset_form">
								<button type="button" class="btn btn-primary" onclick = "window.location = '../list'">
									Quay lại
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
