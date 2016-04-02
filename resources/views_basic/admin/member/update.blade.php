@extends('admin.index')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading center_align">Cập nhật thông tin</div>
				<div class="panel-body">
					<!-- Hiển thị thông báo thành công hoặc thất bại -->
					@if(Session::has('flash_message'))
						<div class = "alert alert-{!!Session::get('flash_level')!!} message">
							{!!Session::get('flash_message')!!}
						</div>
					@endif
					<!-- Hiện thông báo khi gặp lỗi về việc nhập dữ liệu đầu vào -->
					@if (count($errors) > 0)
						<div class="alert alert-danger message">
							<strong>Lỗi!</strong> Xảy ra một vài vấn đề với dữ liệu nhập vào<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.member.postUpdate') }}" id = "updateForm" enctype = "multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value = "{!!$user->id!!}">
						<div class="form-group">
							<label class="col-md-4 control-label">Username *</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{$user->username}}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address *</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{$user->email}}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">New Password </label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password </label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Fullname *</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="fullname" value="{{$user->fullname}}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Gender *</label>
							<div class="col-md-4" style = "">
								@if($user->gender==1) 
									<input type="radio" name="gender" value = "Male" style = "margin-top:10px" checked="checked"> Male
									<input type="radio" name ="gender" value = "Female"> Female
								@else
									<input type="radio" name="gender" value = "Male" style = "margin-top:10px"> Male
									<input type="radio" name ="gender" value = "Female"  checked="checked"> Female
								@endif
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Avatar</label>
							<div class="col-md-4">
								<input type="file" name="avatar"  style="margin-top: 5px; border: 1px solid #CCCCCC; width: 232px; border-radius: 5px;" value = "{{old('avatar')}}"> 
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Company</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="company" value="{{ $user->company }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Address *</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" value="{{ $user->address }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Phone Number *</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}">
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
