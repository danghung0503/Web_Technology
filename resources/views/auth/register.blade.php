@extends('app')
@section('title')
Đăng Ký Thành Viên
@stop
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Đăng Ký Thành Viên</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Ôi !!!</strong><br/> Đã có lỗi xảy ra<br><br>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Tên Đăng Nhập</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ old('username') }}">
							</div>
							<div style="color:red">{!! $errors->first('username') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Địa Chỉ Email</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
							<div style="color:red">{!! $errors->first('email') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Mật Khẩu</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
							<div style="color:red">{!! $errors->first('password') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Xác Nhận Mật Khẩu</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Giới Tính</label>
							<div class="col-md-6">
								Nam <input type="radio" name="gender" value="1">
								Nữ <input type="radio" name="gender" value="2">
								Khác <input type="radio" name="gender" value="3">
							</div>
							<div style="color:red">{!! $errors->first('gender') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tên Đầy Đủ</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="fullname" value="{!! old('fullname') !!}">
							</div>
							<div style="color:red">{!! $errors->first('fullname') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Số Điện Thoại</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="phonenumber" value="{!! old('phonenumber') !!}">						
							</div>
							<div style="color:red">{!! $errors->first('phonenumber') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Địa Chỉ</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" value="{!! old('address') !!}">						
							</div>
							<div style="color:red">{!! $errors->first('address') !!}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Công Ty</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="company" value="{!! old('company') !!}">						
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Ảnh Đại Diện</label>
							<div class="col-md-6">
								<input type="file" name="avatar" value="{!! old('avatar') !!}">						
							</div>
							<div style="color:red">{!! $errors->first('avatar') !!}</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Đăng Ký
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
