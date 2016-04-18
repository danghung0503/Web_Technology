@extends('admin.index')

@section('content')
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading center_align">Thông Tin Chi Tiết Sản Phẩm</div>
				<div class="panel-body">
					<!-- Hiển thị thông báo thành công hoặc thất bại, class message để cho thông báo ẩn hiện -->
					@include('admin.alert')
					@include('admin.error')
						<div class="form-group">
							<label class="col-md-4 control-label">Hãng Sản Xuất</label>
							<div class="col-md-6">
								{{ $brand->name }}
							</div>
						</div><br />

						<div class="form-group">
							<label class="col-md-4 control-label">Tên Sản Phẩm</label>
							<div class="col-md-6">
								{!! $product->name !!}
							</div>
						</div><br />

						<div class="form-group">
							<label class="col-md-4 control-label">Số Lượng</label>
							<div class="col-md-6">
								{!! $product->amount !!}
							</div>
						</div><br />

						<div class="form-group">
							<label class="col-md-4 control-label">Giá</label>
							<div class="col-md-6">
								{!! $product->price !!}
							</div>
						</div><br />
						
						<div class="form-group">
							<label class="col-md-4 control-label">Giá Mới</label>
							<div class="col-md-6">
							{!! $product->price_new!=0?$product->price_new:'chưa cập nhật' !!}
							</div>
						</div><br />

						<div class="form-group">
							<label class="col-md-4 control-label">Ảnh</label>
							<div class="col-md-6">
								<img src="{!! url('resources/upload/product/'.$product->id.'/'.$product->image) !!}" height="150"  />
							</div>
						</div>
						<br /><br /><br /><br /><br /><br /><br />
						@if($product->type == "mobile")
							<div class="form-group">
								<label class="col-md-4 control-label">Công Nghệ Màn Hình</label>
								<div class="col-md-6">
									{{ $product->screen_tech }}
								</div>
							</div><br /><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Độ Phân Giải</label>
								<div class="col-md-8">
									<div class="col-md-6">
										@if($product->resolution1!=0||$product->resolution2!=0)
											{{ $product->resolution1 }}x{{ $product->resolution2 }}px
										@else
											{{ 'chưa cập nhật' }}
										@endif
									</div>
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Màn Hình Rộng</label>
								<div class="col-md-6">
									{{ !empty($product->screen_width)?$product->screen_width.' inch':"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Cảm Ứng</label>
								<div class="col-md-6">
									{{ $product->touch }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Camera Sau</label>
								<div class="col-md-6">
									{{$product->back_cam}}{{ $product->back_cam_type }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Đèn Flash</label>
								<div class="col-md-6">
									{{$product->flash}}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Camera Trước</label>
								<div class="col-md-6">
									{{ $product->front_cam }}{{ $product->front_cam_type }}
								</div>
							</div><br />


							<div class="form-group">
								<label class="col-md-4 control-label">Quay Phim</label>
								<div class="col-md-6">
									{{ !empty($product->film_shoot)?$product->film_shoot:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Gọi Video</label>
								<div class="col-md-6">
									{{ $product->video_call }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Hệ Điều Hành</label>
								<div class="col-md-6">
									{{ !empty($product->operating_system)?$product->operating_system:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Số Lõi</label>
								<div class="col-md-6">
									{{ $product->core_amount }} Nhân
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Vi Xử Lý</label>
								<div class="col-md-6">
									{{!empty($product->proccesor)?$product->proccesor:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ CPU</label>
								<div class="col-md-6">
									{{ !empty($product->CPU_rate)?$product->CPU_rate:"chưa cập nhật" }}
								</div>
							</div><br />
							<div class="form-group">
								<label class="col-md-4 control-label">RAM</label>
								<div class="col-md-6">
									{{ $product->ram }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Bộ Nhớ Trong</label>
								<div class="col-md-6">
										{{ $product->internal_memory }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ Thẻ Nhớ</label>
								<div class="col-md-6">
									{{ $product->mem_support }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ Thẻ Tối Đa</label>
								<div class="col-md-6">
									{{ !empty($product->mem_support_max)?$product->mem_support_max:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Băng Tần 2G</label>
								<div class="col-md-6">
									{{ !empty($product->sup_2g)?$product->sup_2g:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Băng Tần 3G</label>
								<div class="col-md-6">
									{{ !empty($product->sup_3g)?$product->sup_3g:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ 4G</label>
								<div class="col-md-6">
									{{ !empty($product->sup_4g)?$product->sup_4g:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Số Khe Sim</label>
								<div class="col-md-6">
									{{ $product->sim_track }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Sim</label>
								<div class="col-md-6">
									{{ $product->sim_type }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Wifi</label>
								<div class="col-md-6">
									{{ !empty($product->wifi)?$product->wifi:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Dung Lượng Pin</label>
								<div class="col-md-6">
									{{ !empty($product->battery_capacity)?$product->battery_capacity:"chưa cập nhật" }} mAh
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Pin</label>
								<div class="col-md-6">
									{{ !empty($product->battery_type)?$product->battery_type:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước</label>
								<div class="col-md-6">
									@if($product->dimension1!=0||$product->dimension2!=0||$product->dimension3!=0)
										{{ $product->dimension1 }} x {{ $product->dimension2 }} x {{ $product->dimension3 }}mm
									@else
										{{ 'chưa cập nhật' }}
									@endif
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Trọng Lượng</label>
								<div class="col-md-6">
									{{($product->weight!=0)?$product->weight:"chưa cập nhật" }} gam
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Bluetooth</label>
								<div class="col-md-6">
									{{ !empty($product->bluetooth)?$product->bluetooth:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">NFC</label>
								<div class="col-md-6">
									{{ $product->nfc }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Ghi Âm</label>
								<div class="col-md-6">
									{{ $product->record }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Radio</label>
								<div class="col-md-6">
									{{ $product->radio }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Thiết Kế</label>
								<div class="col-md-6">
									{{ $product->design }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Màu</label>
								<div class="col-md-6">
									{{!empty($product->color)?$product->color:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Chất Liệu</label>
								<div class="col-md-6">
									{{ !empty($product->material)?$product->material:"chưa cập nhật" }}
								</div>
							</div><br />
						@endif
						<div class="form-group">
							<label class="col-md-4 control-label">Ảnh Chi Tiết</label>
							<div id="image_detail" class = "col md-6">
								@foreach($imagedetails as $image)
									<img src="{!! url('resources/upload/product/'.$image->id_product.'/detail/'.$image->name) !!}" width="150px" height="100px" />
								@endforeach
							</div>
						</div><br />
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="button" class="btn btn-primary" onclick = "window.location='/Web_Technology/admin/product/update/{!!$product->id!!}?detail'">
									Sửa Thông Tin
								</button>
								<button type = "button" class = "btn btn-primary" onclick = "window.location='/Web_Technology/admin/product/list/{!!$product->type!!}'">
									Quay Lại
								</button>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop