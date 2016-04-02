@extends('users/master')

@section('content')
	<div class="urlCurrent">
		<ul>
			<li><a href="">Home</a>
				<span class = "divider">>></span>
			</li>
			<li>Liên Hệ</li>
		</ul>
	</div>
	<div class = "main_content">
		<h1 class = "heading1">
			Liên Hệ
		</h1>
		<br><br>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-horizontal" role="form" action="{!!url('contact')!!}" method = "POST">
					<input type="hidden" name="_token" value ="{!!csrf_token()!!}">
					@include('admin/alert')
					@include('admin/error')
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="form-group">
								<label class="col-md-4 control-label">Họ Tên*</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name ="fullname" value="{!!old('fullname')!!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Email*</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name ="email" value="{!!old('email')!!}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Nội dung*</label>
								<div class="col-md-6">
									<textarea class="form-control" name="mess" cols="30" rows="7" placeholder="Nhập nội dung tin nhắn vào đây!">{!!old('mess')!!}</textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" name="send" value ="" class="btn btn-success">Gửi</button>
									<button type="reset" value="" class="btn btn-default">Đặt Lại</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<br><br>
			</div>
		</div>
		<br><br>
	</div>
@endsection