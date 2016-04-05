@extends('app')
@section('title')
Cập Nhật Thông Tin Thành Viên
@stop
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Cập Nhật Thông Tin Thành Viên</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Ôi !!!</strong><br/> Đã có lỗi xảy ra<br><br>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ route('user.member.postUpdate') }}" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Tên Đăng Nhập</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
							</div>
							<div style="color:red">{!! $errors->first('username') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Địa Chỉ Email</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled>
							</div>
							<div style="color:red">{!! $errors->first('email') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Mật Khẩu Mới</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
							<div style="color:red">{!! $errors->first('password') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Xác Nhận Mật Khẩu Mới</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Giới Tính</label>
							<div class="col-md-6">
								Nam <input type="radio" name="gender" value="1" {{ Auth::user()->gender==1?'checked':"" }}>
								Nữ <input type="radio" name="gender" value="2" {{ Auth::user()->gender==2?'checked':"" }}>
							</div>
							<div style="color:red">{!! $errors->first('gender') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tên Đầy Đủ</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="fullname" value="{{ Auth::user()->fullname }}">
							</div>
							<div style="color:red">{!! $errors->first('fullname') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Số Điện Thoại</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="phonenumber" value="{{ Auth::user()->phonenumber }}">						
							</div>
							<div style="color:red">{!! $errors->first('phonenumber') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Địa Chỉ</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">						
							</div>
							<div style="color:red">{!! $errors->first('address') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Công Ty</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="company" value="{{ Auth::user()->company }}">						
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Ảnh Đại Diện</label>
							<div class="col-md-6">
								<img src="{!!url('resources/upload/avatar/'.(!empty(Auth::user()->avatar)?Auth::user()->id.'/'.Auth::user()->avatar:'default/default.jpg'))!!}" alt="" height="90px">						
							</div>
							<div style="color:red">{!! $errors->first('avatar') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Chọn Ảnh Mới</label>
							<div class="col-md-6">
								<input type="file" name="avatar" value="{!! old('avatar') !!}">						
							</div>
							<div style="color:red">{!! $errors->first('avatar') !!}</div>
						</div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Cập Nhật
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
