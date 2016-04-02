@extends('admin.index')

@section('content')
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading center_align">Cập Nhật Banner lớn</div>
				<div class="panel-body">
					<!-- Hiển thị thông báo thành công hoặc thất bại, class message để cho thông báo ẩn hiện -->
					@include('admin.alert')
					@include('admin.error')

					<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.system.mBanner.postUpdate') }}"  enctype = "multipart/form-data" id = "updateForm">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name = "id" value ="{!!$banner->id!!}">
						<div class="form-group">
							<label class="col-md-4 control-label">Image *</label>
							<div class="col-md-6">
								<input type="file" name="image"  style="margin-top: 5px; border: 1px solid #CCCCCC; width: 100%; border-radius: 5px;" value = "{{$banner->image}}"> 
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tiêu đề *</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="content" value="{{ $banner->content }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Thứ tự *</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ordinal" value="{{$banner->ordinal }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Hiển thị *</label>
							<div class="col-md-1" style = "margin-top:10px;">
								@if($banner->display==1)
									<input type="checkbox" id="check_display" name="display" value="1" checked = "checked">
								@else
									<input type="checkbox" id="check_display" name="display" value="0">
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Cập Nhật
								</button>
								<input type="reset" value = "Nhập lại" class="btn btn-primary" id="reset_form">
								<button type = "button" class = "btn btn-primary" onclick = "window.location='../list'">
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

