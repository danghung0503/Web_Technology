@extends('admin.index')

@section('content')
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading center_align">Thêm Sản Phẩm</div>
				<div class="panel-body">
					<!-- Hiển thị thông báo thành công hoặc thất bại, class message để cho thông báo ẩn hiện -->
					@include('admin.alert')
					@include('admin.error')

					<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.product.postAdd') }}"  enctype = "multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Hãng Sản Xuất</label>
							<div class="col-md-6">
								<select name=brand[]>
									@foreach($brands as $brand)
										<option value="{{ $brand->id }}">{{ $brand->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tên Sản Phẩm</label>
							<div class="col-md-6">
								<input type="text" class="form-control" rows="3" name="name" placeholder="Nhập Tên Sản Phẩm" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Số Lượng</label>
							<div class="col-md-6">
								<input type="text" class="form-control" rows="3" name="amount" placeholder="Nhập Số Lượng Sản Phẩm" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Giá</label>
							<div class="col-md-6">
								<input type="text" class="form-control" rows="3" name="price" placeholder="Nhập Giá Sản Phẩm" />
							</div>
						</div>



						<div class="form-group">
							<label class="col-md-4 control-label">Mô Tả</label>
							<div class="col-md-6">
								<textarea class="form-control" rows="3" name="description" >{!! old('description',isset($product)?$product['description']:null) !!}</textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Thêm
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