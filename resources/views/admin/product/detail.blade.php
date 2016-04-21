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
										@if($product->resolution1!=0&&$product->resolution2!=0)
											{{ $product->resolution1 }} x {{ $product->resolution2 }}px
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
								<label class="col-md-4 control-label">Mặt Kính Cảm Ứng</label>
								<div class="col-md-6">
									{{ !empty($product->touch_glass)?$product->touch_glass:"chưa cập nhật" }}
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
								<label class="col-md-4 control-label">Chụp Ảnh Nâng Cao</label>
								<div class="col-md-6">
									{{ !empty($product->photo_advance)?$product->photo_advance:"chưa cập nhật" }}
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
								<label class="col-md-4 control-label">Số Nhân</label>
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
								<label class="col-md-4 control-label">Chip Đồ Họa</label>
								<div class="col-md-6">
									{{ !empty($product->grapic_chip)?$product->grapic_chip:"chưa cập nhật" }}
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
								<label class="col-md-4 control-label">Bộ Nhớ Còn Lại</label>
								<div class="col-md-6">
									{{ !empty($product->remain_memory)?$product->remain_memory:"chưa cập nhật" }}
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
								<label class="col-md-4 control-label">GPS</label>
								<div class="col-md-6">
									{{ !empty($product->gps)?$product->gps:"chưa cập nhật" }}
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
								<label class="col-md-4 control-label">Cổng Kết Nối</label>
								<div class="col-md-6">
								 {{ !empty($product->connector)?$product->connector:"chưa cập nhật" }} 
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Jack Tai Nghe</label>
								<div class="col-md-6">
								{!! !empty($product->headphone)?$product->headphone:"chưa cập nhật" !!}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Kết Nối Khác</label>
								<div class="col-md-6">
									{{ !empty($product->other_connect)?$product->other_connect:"chưa cập nhật" }}
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
								<label class="col-md-4 control-label">Xem Phim</label>
								<div class="col-md-6">
									{{ !empty($product->watch_movie)?$product->watch_movie:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Nghe Nhạc</label>
								<div class="col-md-6">
									{{ !empty($product->listen_music)?$product->listen_music:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước</label>
								<div class="col-md-6">
									@if($product->dimension1!=0&&$product->dimension2!=0&&$product->dimension3!=0)
										{{ $product->dimension1 }} x {{ $product->dimension2 }} x {{ $product->dimension3 }}mm
									@else
										{{ 'chưa cập nhật' }}
									@endif
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Trọng Lượng</label>
								<div class="col-md-6">
									{{ ($product->weight!=0)?$product->weight:"chưa cập nhật" }} kg
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Thiết Kế</label>
								<div class="col-md-6">
									{{ $product->design }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Chất Liệu</label>
								<div class="col-md-6">
									{{ !empty($product->material)?$product->material:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Chức Năng Khác</label>
								<div class="col-md-6">
									{{ !empty($product->other_func)?$product->other_func:"chưa cập nhật" }}
								</div>
							</div><br /> 

						@elseif($product->type == "laptop")

							<div class="form-group">
								<label class="col-md-4 control-label">Hãng CPU</label>
								<div class="col-md-6">
									{{ !empty($product->CPU_brand)?$product->CPU_brand:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Công Nghệ CPU</label>
								<div class="col-md-6">
									{{ !empty($product->CPU_tech)?$product->CPU_tech:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Loại CPU</label>
								<div class="col-md-6">
									{{ !empty($product->CPU_type)?$product->CPU_type:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ CPU</label>
								<div class="col-md-6">
									{{ !empty($product->CPU_rate)?$product->CPU_rate:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Bộ Nhớ Đệm</label>
								<div class="col-md-6">
									{{ !empty($product->cache)?$product->cache:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ Tối Đa</label>
								<div class="col-md-6">
									{{ !empty($product->max_CPU_rate)?$product->max_CPU_rate:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Chipset</label>
								<div class="col-md-6">
									{{ !empty($product->chipset)?$product->chipset:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ Bus</label>
								<div class="col-md-6">
									{{ !empty($product->bus_rate_main)?$product->bus_rate_main:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ RAM Tối Đa</label>
								<div class="col-md-6">
									{{ !empty($product->max_ram_sup)?$product->max_ram_sup:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Loại RAM</label>
								<div class="col-md-6">
									{{ !empty($product->ram_type)?$product->ram_type:"chưa cập nhật" }}	
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Số Khe RAM</label>
								<div class="col-md-6">
									{{ !empty($product->ram_track)?$product->ram_track:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">RAM</label>
								<div class="col-md-6">
									{{ !empty($product->ram)?$product->ram:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ Bus Của RAM</label>
								<div class="col-md-6">
									{{ !empty($product->ram_bus_rate)?$product->ram_bus_rate:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Ổ Đĩa</label>
								<div class="col-md-6">
									{{ !empty($product->disk_type)?$product->disk_type:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Ổ Cứng</label>
								<div class="col-md-6">
									{{ !empty($product->hard_disk)?$product->hard_disk:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước Màn Hình</label>
								<div class="col-md-6">
									{{ !empty($product->screen_width)?$product->screen_width:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Độ Phân Giải</label>
								<div class="col-md-8">
									@if($product->resolution1!=0&&$product->resolution2!=0)
											{{ $product->resolution1 }} x {{ $product->resolution2 }}px
										@else
											{{ 'chưa cập nhật' }}
										@endif
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Công Nghệ Màn Hình</label>
								<div class="col-md-6">
									{{ !empty($product->screen_tech)?$product->screen_tech:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Cảm Ứng</label>
								<div class="col-md-6">
									{{ !empty($product->touch)?$product->touch:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Chip Đồ Họa</label>
								<div class="col-md-6">
									{{ !empty($product->grapic_chip)?$product->grapic_chip:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Bộ Nhớ Đồ Họa</label>
								<div class="col-md-6">
									{{ !empty($product->grapic_mem)?$product->grapic_mem:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Thiết Kế Card</label>
								<div class="col-md-6">
									{{ !empty($product->card_design)?$product->card_design:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Kênh Âm Thanh</label>
								<div class="col-md-6">
									{{ !empty($product->sound_mode)?$product->sound_mode:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Có Sẵn Đĩa Quang</label>
								<div class="col-md-6">
									{{ !empty($product->optical_avail)?$product->optical_avail:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Đĩa Quang</label>
								<div class="col-md-6">
									{{ !empty($product->optical_type)?$product->optical_type:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Cổng Giao Tiếp</label>
								<div class="col-md-6">
									{{ !empty($product->com_port)?$product->com_port:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">LAN</label>
								<div class="col-md-6">
									{{ !empty($product->lan)?$product->lan:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Wifi</label>
								<div class="col-md-6">
									{{ !empty($product->wifi)?$product->wifi:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Bluetooth</label>
								<div class="col-md-6">
									{{ !empty($product->bluetooth)?$product->bluetooth:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Đọc Thẻ Nhớ</label>
								<div class="col-md-6">
									{{ !empty($product->read_mem_card)?$product->read_mem_card:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Khe Đọc Thẻ Nhớ</label>
								<div class="col-md-6">
									{{ !empty($product->read_mem_track)?$product->read_mem_track:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Webcam</label>
								<div class="col-md-6">
									{{ !empty($product->wc)?$product->wc.'MP':"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Thông Tin Webcam</label>
								<div class="col-md-6">
									{{ !empty($product->wc_info)?$product->wc_info:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Thông Tin Pin</label>
								<div class="col-md-6">
									{{ !empty($product->battery_capacity)?$product->battery_capacity:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Hệ Điều Hành</label>
								<div class="col-md-6">
									{{ !empty($product->operating_system)?$product->operating_system:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Phần Mềm Sẵn Có</label>
								<div class="col-md-6">
									{{ !empty($product->software_avail)?$product->software_avail:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước</label>
								<div class="col-md-6">
									@if($product->dimension1!=0&&$product->dimension2!=0&&$product->dimension3!=0)
										{{ $product->dimension1 }} x {{ $product->dimension2 }} x {{ $product->dimension3 }}mm
									@else
										{{ 'chưa cập nhật' }}
									@endif
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Trọng Lượng</label>
								<div class="col-md-6">
									{{ !empty($product->weight)?$product->weight:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Chất Liệu</label>
								<div class="col-md-6">
									{{ !empty($product->material)?$product->material:"chưa cập nhật" }}
								</div>
							</div><br />

						@elseif($product->type=='tablet')

							<div class="form-group">
								<label class="col-md-4 control-label">Công Nghệ Màn Hình</label>
								<div class="col-md-6">
									{{ $product->screen_tech }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Độ Phân Giải</label>
								<div class="col-md-8">
									<div class="col-md-6">
										@if($product->resolution1!=0&&$product->resolution2!=0)
											{{$product->resolution1}} x {{$product->resolution2}}px
										@else
											{{'chưa cập nhật'}}
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
								<label class="col-md-4 control-label">Camera Sau</label>
								<div class="col-md-6">
									{{$product->back_cam}}MP
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Quay Phim</label>
								<div class="col-md-6">
									{{ !empty($product->film_shoot)?$product->film_shoot:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Tính Năng Camera</label>
								<div class="col-md-6">
									{{ !empty($product->cam_feat)?$product->cam_feat:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Camera Trước</label>
								<div class="col-md-6">
									{{ $product->front_cam }}MP
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Hệ Điều Hành</label>
								<div class="col-md-6">
									{{ !empty($product->operating_system)?$product->operating_system:"chưa cập nhật" }}
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
								<label class="col-md-4 control-label">Chip Đồ Họa</label>
								<div class="col-md-6">
									{{ !empty($product->grapic_chip)?$product->grapic_chip:"chưa cập nhật" }}
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
								<label class="col-md-4 control-label">Bộ Nhớ Còn Lại</label>
								<div class="col-md-6">
									{{ !empty($product->remain_memory)?$product->remain_memory:"chưa cập nhật" }}
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
								<label class="col-md-4 control-label">Cảm Biến</label>
								<div class="col-md-6">
									{{ !empty($product->sensor)?$product->sensor:"chưa cập nhật" }}
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
								<label class="col-md-4 control-label">Wifi</label>
								<div class="col-md-6">
									{{ !empty($product->wifi)?$product->wifi:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Bluetooth</label>
								<div class="col-md-6">
									{{ !empty($product->bluetooth)?$product->bluetooth:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">GPS</label>
								<div class="col-md-6">
									{{ !empty($product->gps)?$product->gps:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Cổng Kết Nối</label>
								<div class="col-md-6">
								 {{ !empty($product->connector)?$product->connector:"chưa cập nhật" }} 
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Jack Tai Nghe</label>
								<div class="col-md-6">
								{!! !empty($product->headphone)?$product->headphone:"chưa cập nhật" !!}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ OTG</label>
								<div class="col-md-6">
									{{ $product->otg }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Kết Nối Khác</label>
								<div class="col-md-6">
									{{ !empty($product->other_connect)?$product->other_connect:"chưa cập nhật" }}
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
								<label class="col-md-4 control-label">Chất Liệu</label>
								<div class="col-md-6">
									{{ !empty($product->material)?$product->material:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước</label>
								<div class="col-md-6">
									@if($product->dimension1!=0&&$product->dimension2!=0&&$product->dimension3!=0)
										{{ $product->dimension1 }} x {{ $product->dimension2 }} x {{ $product->dimension3 }}mm
									@else
										{{ 'chưa cập nhật' }}
									@endif
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Trọng Lượng</label>
								<div class="col-md-6">
									{{ ($product->weight!=0)?$product->weight:"chưa cập nhật" }} kg
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Pin</label>
								<div class="col-md-6">
									{{ !empty($product->battery_type)?$product->battery_type:"chưa cập nhật" }}
								</div>
							</div><br />

							<div class="form-group">
								<label class="col-md-4 control-label">Chức Năng Khác</label>
								<div class="col-md-6">
									{{ !empty($product->other_func)?$product->other_func:"chưa cập nhật" }}
								</div>
							</div><br /> 

						@endif
						<div class="form-group">
							<label class="col-md-4 control-label">Ảnh</label>
							<div class="col-md-6">
								<img src="{!! url('resources/upload/product/'.$product->id.'/'.$product->image) !!}" height="150"  />
							</div>
						</div><br /><br /><br /><br /><br /><br />
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