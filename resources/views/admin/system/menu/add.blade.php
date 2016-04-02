@extends('admin.index')

@section('content')
	<script type = "text/javascript" src = "{!!asset('public/js/ckeditor/ckeditor.js')!!}"></script>
	<script type = "text/javascript" src = "{!!asset('public/js/ckfinder/ckefinder.js')!!}"></script>
	<script type = "text/javascript">
		var baseURL = "{!!url('/')!!}";
	</script>
	<script type = "text/javascript" src = "{!!asset('public/js/func_ckfinder.js')!!}"></script>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading center_align">Thêm Item menu</div>
				<div class="panel-body">
					<!-- Hiển thị thông báo thành công hoặc thất bại, class message để cho thông báo ẩn hiện -->
					@include('admin.alert')
					@include('admin.error')

					<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.system.menu.postAdd') }}"  enctype = "multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-3 control-label">Item Parent</label>
							<div class="col-md-8">
								<select name="item_parent" id="" class = "form-control">
									<option value="0">Hãy Chọn Item</option>
									<?php showItemMenu($data)?>
								</select> 
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Tên Item *</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Thứ tự *</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="ordinal" value="{{ old('ordinal') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Đặc tả</label>
							<div class="col-md-8">
								<textarea class = "form-control" name="description" value="">{!!old('description')!!}</textarea>
								<script type = "text/javascript">
									ckeditor('description');
								</script>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-3">
								<button type="submit" class="btn btn-primary">
									Thêm Banner
								</button>
								<button type = "button" class = "btn btn-primary" onclick = "window.location='./list'">
									Quay Lại
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

