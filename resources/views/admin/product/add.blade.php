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
						<input type="hidden" name="type" value="{{ $type }}" />
						<div class="form-group">
							<label class="col-md-4 control-label">Hãng Sản Xuất</label>
							<div class="col-md-6">
								<select name='id_brand'>
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
								<label class="col-md-4 control-label">Ảnh</label>
								<div class="col-md-6">
									<input type="file" name="image" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Ảnh Chi Tiết</label>
								<div id="image_detail">
								</div>
								<div class="col-md-6">
								<button name="btn_add" type="button" class="btn btn-primary" id="add_img">Thêm ảnh</button>
								<script type="text/javascript">
									$(document).ready(function(){
										$('#add_img').click(function(){
											$('#image_detail').append('<input type="file" name ="image_details[]">');
										});
									});
								</script>
								</div>
							</div>
						@if($type == "mobile")
							<div class="form-group">
								<label class="col-md-4 control-label">Công Nghệ Màn Hình</label>
								<div class="col-md-6">
									<select name="screen_tech" class="form-control">
										<option value="LCD">LCD</option>
										<option value="TFT-LCD">TFT - LCD</option>
										<option value="Super LCD">Super LCD</option>
										<option value="IPS LCD">IPS LCD</option>
										<option value="LED-backlit IPS">LED-backlit IPS</option>
										<option value="IPS Quantum">IPS Quantum</option>
										<option value="OLED">OLED</option>
										<option value="AMOLED">AMOLED</option>
										<option value="Super AMOLED">Super AMOLED</option>
										<option value="Super AMOLED Plus">Super AMOLED Plus</option>
										<option value="Super AMOLED HD">Super AMOLED HD</option>
										<option value="Retina">Retina</option>
										<option value="Retina HD">Retina HD</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Độ Phân Giải</label>
								<div class="col-md-8">
									<div class="col-md-6">
										<input type="text" name="resolution1" placeholder="Kích Thước 1" size="8" /> px
									</div>
									<div class="col-md-6">
										<input type="text" name="resolution2" placeholder="Kích Thước 2" size="8" /> px
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Màn Hình Rộng</label>
								<div class="col-md-6">
									<input type="text" name="screen_width" size="4" placeholder="Nhập Độ Rộng Của Màn Hình" /> inch
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Cảm Ứng</label>
								<div class="col-md-6">
									<select name="touch">
										<option value="không">không</option>
										<option value="cảm ứng điện dung đa điểm">cảm ứng điện dung đa điểm</option>
									</select>
								</div>
							</div>
								{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Mặt Kính Cảm Ứng</label>
								<div class="col-md-6">
									<input type="text" name="touch_glass" size="4" placeholder="Nhập Mặt Kính Cảm Ứng" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Camera Sau</label>
								<div class="col-md-6">
									<select name="back_cam">
										<option value="0.2">0.2</option>
										<option value="1">1</option>
										<option value="1.2">1.2</option>
										<option value="2">2</option>
										<option value="2.5">2.5</option>
										<option value="3">3</option>
										<option value="3.2">3.2</option>
										<option value="5">5</option>
										<option value="8">8</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="16">16</option>
										<option value="20">20</option>
										<option value="23">23</option>
									</select>
									<select name="back_cam_type">
										<option value="MP">MP</option>
										<option value="Ultra Pixel">Ultra Pixel</option>
										MP</select>
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-4 control-label">Quay Phim</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="film_shoot" placeholder="Nhập Quay Phim" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Đèn Flash</label>
								<div class="col-md-6">
									<select name="flash">
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>

							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Chụp Ảnh Nâng Cao</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="photo_advance" placeholder="Nhập Chụp Ảnh Nâng Cao" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Camera Trước</label>
								<div class="col-md-6">
									<select name="front_cam">
										<option value="0.2">0.2</option>
										<option value="1">1</option>
										<option value="1.2">1.2</option>
										<option value="2">2</option>
										<option value="2.5">2.5</option>
										<option value="3">3</option>
										<option value="3.2">3.2</option>
										<option value="5">5</option>
										<option value="8">8</option>
										<option value="12">12</option>
									</select>
									<select name="front_cam_type">
										<option value="MP">MP</option>
										<option value="Ultra Pixel">Ultra Pixel</option>
										MP</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Gọi Video</label>
								<div class="col-md-6">
									<select name="video_call">
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hệ Điều Hành</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="operating_system" placeholder="Nhập Hệ Điều Hành" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Số Nhân</label>
								<div class="col-md-6">
									<select name="core_amount">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
									</select> Nhân
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Vi Xử Lý</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="proccesor" placeholder="Nhập Vi Xử Lý" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ CPU</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="CPU_rate" placeholder="Nhập Tốc Độ CPU" />
								</div>
							</div>

							{{--Mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Chip Đồ Họa</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="grapic_chip" placeholder="Nhập Chip Đồ Họa" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">RAM</label>
								<div class="col-md-6">
									<select name="ram">
										<option value='128MB'>128MB</option>
										<option value='256MB'>256MB</option>
										<option value='512MB'>512MB</option>
										<option value='1GB'>1GB</option>
										<option value='1.5GB'>1.5GB</option>
										<option value='2GB'>2GB</option>
										<option value='3GB'>3GB</option>
										<option value='4GB'>4GB</option>
										<option value='6GB'>6GB</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Bộ Nhớ Trong</label>
								<div class="col-md-6">
									<select name="internal_memory">
										<option value='không'>không</option>
										<option value='128MB'>128MB</option>
										<option value='256MB'>256MB</option>
										<option value='512MB'>512MB</option>
										<option value='1GB'>1GB</option>
										<option value='2GB'>2GB</option>
										<option value='4GB'>4GB</option>
										<option value='8GB'>8GB</option>
										<option value='16GB'>16GB</option>
										<option value='32GB'>32GB</option>
										<option value='64GB'>64GB</option>
										<option value='80GB'>80GB</option>
										<option value='128GB'>128GB</option>
										<option value='256GB'>256GB</option>
									</select>
								</div>
							</div>
							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Bộ Nhớ Còn Lại</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="remain_memory" placeholder="Nhập Bộ Nhớ Còn Lại" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ Thẻ Nhớ</label>
								<div class="col-md-6">
									<select name="mem_support">
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ Thẻ Tối Đa</label>
								<div class="col-md-6">
									<select name="mem_support_max">
										<option value="không">không</option>
										<option value="1GB">1GB</option>
										<option value="2GB">2GB</option>
										<option value="4GB">4GB</option>
										<option value="8GB">8GB</option>
										<option value="16GB">16GB</option>
										<option value="32GB">32GB</option>
										<option value="64GB">64GB</option>
										<option value="128GB">128GB</option>
										<option value="256GB">256GB</option>
										<option value="512GB">512GB</option>
										<option value="1TB">1TB</option>
										<option value="2TB">2TB</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Băng Tần 2G</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="sup_2g" placeholder="Nhập Băng Tần 2G" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Băng Tần 3G</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="sup_3g" placeholder="Nhập Băng Tần 3G" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ 4G</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="sup_4g" placeholder="Nhập Hỗ Trợ 4G" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Số Khe Sim</label>
								<div class="col-md-6">
									<select name="sim_track">
										<option value="1">1</option>
										<option value="2">2</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Sim</label>
								<div class="col-md-6">
									<select name="sim_type">
										<option value="sim thường">sim thường</option>
										<option value="micro sim">micro sim</option>
										<option value="nano sim">nano sim</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Wifi</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="wifi" placeholder="Nhập Công Nghệ Wifi" />
								</div>
							</div>

							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">GPS</label>
								<div class="col-md-6">
									<select class="form-control" name='gps'>
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Bluetooth</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="bluetooth" placeholder="Nhập Công Nghệ Bluetooth" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">NFC</label>
								<div class="col-md-6">
									<select name="nfc">
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>
							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Cổng Kết Nối</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="connector" placeholder="Nhập Cổng Kết Nối" />
								</div>
							</div>
							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Jack Tai Nghe</label>
								<div class="col-md-6">
									<select class = 'form-control' name="headphone">
										<option value='2.0'>2.0</option>
										<option value='3.0'>3.0</option>
										<option value='3.5'>3.5</option>
									</select>
								</div>
							</div>
							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Kết Nối Khác</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="other_connect" placeholder="Nhập Kết Nối Khác" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Thiết Kế</label>
								<div class="col-md-6">
									<select name="design">
										<option value="pin rời">pin rời</option>
										<option value="nguyên khối">nguyên khối</option>
										<option value="mô-đun">mô-đun</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Chất Liệu</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="material" placeholder="Nhập Chất Liệu" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước</label>
								<div class="col-md-6">
									<input type="text" rows="3" name="dimension1" placeholder="Dài" size="5" />
									<input type="text" rows="3" name="dimension2" placeholder="Ngang" size="5" />
									<input type="text" rows="3" name="dimension3" placeholder="Dày" size="5" /> mm
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Trọng Lượng</label>
								<div class="col-md-6">
									<input type="text" rows="3" name="weight" placeholder="Nhập Trọng Lượng Sản Phẩm" size="18" /> gam
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Dung Lượng Pin</label>
								<div class="col-md-6">
									<input type="text" name="battery_capacity" placeholder="Nhập Dung Lượng Pin" size="18" /> mAh
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Pin</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="battery_type" placeholder="Nhập Loại Pin" />
								</div>
							</div>
							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Xem Phim</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="watch_movie" placeholder="Nhập Xem Phim" />
								</div>
							</div>
							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Nghe Nhạc</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="listen_music" placeholder="Nhập Nghe Nhạc" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Ghi Âm</label>
								<div class="col-md-6">
									<select name="record">
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Radio</label>
								<div class="col-md-6">
									<select name="radio">
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>
							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Chức Năng Khác</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="other_func" placeholder="Nhập Nghe Nhạc" />
								</div>
							</div>
						
						@elseif($type=='laptop')

							<div class="form-group">
								<label class="col-md-4 control-label">Hãng CPU</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="CPU_brand" placeholder="Nhập Hãng CPU" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Công Nghệ CPU</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="CPU_tech" placeholder="Nhập Công Nghệ CPU" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Loại CPU</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="CPU_type" placeholder="Nhập Loại CPU" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ CPU</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="CPU_rate" placeholder="Nhập Tốc Độ CPU" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Bộ Nhớ Đệm</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="cache" placeholder="Nhập Bộ Nhớ Đệm" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ Tối Đa</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="max_CPU_rate" placeholder="Nhập Tốc Độ Tối Đa" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Chipset</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="chipset" placeholder="Nhập Chipset" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ Bus</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="bus_rate_main" placeholder="Nhập Tốc Độ Bus" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ RAM Tối Đa</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="max_ram_sup" placeholder="Nhập Hỗ Trợ RAM Tối Đa" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Loại RAM</label>
								<div class="col-md-6">
									<select class = "form-control" name='ram_type'>
										<option value="DDR2L">DDR2L</option>
										<option value="DDR3L">DDR3L</option>
										<option value="DDR4L">DDR4L</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Số Khe RAM</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="ram_track" placeholder="Nhập Số Khe RAM" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">RAM</label>
								<div class="col-md-6">
									<select class="form-control" name="ram">
										<option value='1GB'>1GB</option>
										<option value='2GB'>2GB</option>
										<option value='4GB'>4GB</option>
										<option value='6GB'>6GB</option>
										<option value='8GB'>8GB</option>
										<option value='12GB'>12GB</option>
										<option value='16GB'>16GB</option>
										<option value='24GB'>24GB</option>
										<option value='32GB'>32GB</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ Bus Của RAM</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="ram_bus_rate" placeholder="Nhập Tốc Độ Bus RAM" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Ổ Đĩa</label>
								<div class="col-md-6">
									<select class="form-control" name="disk_type">
										<option value='HDD'>HDD</option>
										<option value='SSD'>SSD</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Ổ Cứng</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="hard_disk" placeholder="Nhập Ổ Cứng" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước Màn Hình</label>
								<div class="col-md-6">
									<input type="text" name="screen_width" size="4" placeholder="Nhập Kích Thước Màn Hình" /> inch
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Độ Phân Giải</label>
								<div class="col-md-8">
									<div class="col-md-6">
										<input type="text" name="resolution1" placeholder="Kích Thước 1" size="8" /> px
									</div>
									<div class="col-md-6">
										<input type="text" name="resolution2" placeholder="Kích Thước 2" size="8" /> px
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Công Nghệ Màn Hình</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="screen_tech" placeholder="Nhập Công Nghệ Màn Hình<" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Cảm Ứng</label>
								<div class="col-md-6">
									<select name="touch">
										<option value="không">không</option>
										<option value="cảm ứng điện dung đa điểm">Cảm ứng điện dung đa điểm</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Chip Đồ Họa</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="grapic_chip" placeholder="Nhập Chip Đồ Họa" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Bộ Nhớ Đồ Họa</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="grapic_mem" placeholder="Nhập Bộ Nhớ Đồ Họa" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Thiết Kế Card</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="card_design" placeholder="Nhập Thiết Kế Card" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Kênh Âm Thanh</label>
								<div class="col-md-6">
									<select class="form-control" name="sound_mode">
										<option value='1.0'>1.0</option>
										<option value='2.0'>2.0</option>
										<option value='3.0'>3.0</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Có Sẵn Đĩa Quang</label>
								<div class="col-md-6">
									<select class="form-control" name="optical_avail">
										<option value='có'>có</option>
										<option value='không'>không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Đĩa Quang</label>
								<div class="col-md-6">
									<select class="form-control" name="optical_type">
										<option value='không'>không</option>
										<option value='2.0'>DVD</option>
										<option value='3.0'>VCD</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Cổng Giao Tiếp</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="com_port" placeholder="Nhập Cổng Giao Tiếp" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">LAN</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="lan" placeholder="Nhập LAN" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Wifi</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="wifi" placeholder="Nhập Công Nghệ Wifi" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Bluetooth</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="bluetooth" placeholder="Nhập Công Nghệ Bluetooth" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Đọc Thẻ Nhớ</label>
								<div class="col-md-6">
									<select class="form-control" name="read_mem_card">
										<option value='có'>có</option>
										<option value='không'>không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Khe Đọc Thẻ Nhớ</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="read_mem_track" placeholder="Nhập Khe Đọc Thẻ Nhớ" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Webcam</label>
								<div class="col-md-6">
									<select name="wc">
										<option value='0.2'>0.2</option>
										<option value='0.3'>0.3</option>
										<option value='0.5'>0.5</option>
										<option value='0.8'>0.8</option>
										<option value='1.0'>1.0</option>
										<option value='1.5'>1.5</option>
										<option value='2.0'>2.0</option>
									</select>MP
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Thông Tin Webcam</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="wc_info" placeholder="Nhập Ưebcam" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Thông Tin Pin</label>
								<div class="col-md-6">
									<input type="text" name="battery_capacity" placeholder="Nhập Thông Tin Pin" class = "form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hệ Điều Hành</label>
								<div class="col-md-6">
									<input type="text" name="operating_system" placeholder="Nhập Hệ Điều Hành" class = "form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Phần Mềm Sẵn Có</label>
								<div class="col-md-6">
									<input type="text" name="software_avail" placeholder="Nhập Phần Mềm Sẵn Có" class = "form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước</label>
								<div class="col-md-6">
									<input type="text" rows="3" name="dimension1" placeholder="Dài" size="5" />
									<input type="text" rows="3" name="dimension2" placeholder="Ngang" size="5" />
									<input type="text" rows="3" name="dimension3" placeholder="Dày" size="5" /> mm
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Trọng Lượng</label>
								<div class="col-md-6">
									<input type="text" rows="3" name="weight" placeholder="Nhập Trọng Lượng Sản Phẩm" size="18" /> kg
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Chất Liệu</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="material" placeholder="Nhập Chất Liệu" />
								</div>
							</div>

							@elseif($type == "tablet")
							<div class="form-group">
								<label class="col-md-4 control-label">Công Nghệ Màn Hình</label>
								<div class="col-md-6">
									<select name="screen_tech" class="form-control">
										<option value="LCD">LCD</option>
										<option value="TFT-LCD">TFT - LCD</option>
										<option value="Super LCD">Super LCD</option>
										<option value="IPS LCD">IPS LCD</option>
										<option value="LED-backlit LCD">LED-backlit LCD</option>
										<option value="LED-backlit IPS">LED-backlit IPS</option>
										<option value="IPS Quantum">IPS Quantum</option>
										<option value="OLED">OLED</option>
										<option value="AMOLED">AMOLED</option>
										<option value="Super AMOLED">Super AMOLED</option>
										<option value="Super AMOLED Plus">Super AMOLED Plus</option>
										<option value="Super AMOLED HD">Super AMOLED HD</option>
										<option value="Retina">Retina</option>
										<option value="Retina HD">Retina HD</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Độ Phân Giải</label>
								<div class="col-md-8">
									<div class="col-md-6">
										<input type="text" name="resolution1" placeholder="Kích Thước 1" size="8" /> px
									</div>
									<div class="col-md-6">
										<input type="text" name="resolution2" placeholder="Kích Thước 2" size="8" /> px
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước Màn Hình</label>
								<div class="col-md-6">
									<input type="text" name="screen_width" size="4" placeholder="Nhập Kích Thước Màn Hình" /> inch
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Camera Sau</label>
								<div class="col-md-6">
									<select name="back_cam">
										<option value="0.2">0.2</option>
										<option value="1">1</option>
										<option value="1.2">1.2</option>
										<option value="2">2</option>
										<option value="2.5">2.5</option>
										<option value="3">3</option>
										<option value="3.2">3.2</option>
										<option value="5">5</option>
										<option value="8">8</option>
										<option value="12">12</option>
										<option value="13">13</option>
									</select> MP
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-4 control-label">Quay Phim</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="film_shoot" placeholder="Nhập Quay Phim" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Tính Năng Camera</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="cam_feat" placeholder="Nhập Tính Năng Camera" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Camera Trước</label>
								<div class="col-md-6">
									<select name="front_cam">
										<option value="0.2">0.2</option>
										<option value="1">1</option>
										<option value="1.2">1.2</option>
										<option value="2">2</option>
										<option value="2.5">2.5</option>
										<option value="3">3</option>
										<option value="3.2">3.2</option>
									</select>MP
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hệ Điều Hành</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="operating_system" placeholder="Nhập Hệ Điều Hành" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Vi Xử Lý</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="proccesor" placeholder="Nhập Vi Xử Lý" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ CPU</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="CPU_rate" placeholder="Nhập Tốc Độ CPU" />
								</div>
							</div>

							{{--Mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Chip Đồ Họa</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="grapic_chip" placeholder="Nhập Chip Đồ Họa" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">RAM</label>
								<div class="col-md-6">
									<select name="ram">
										<option value='128MB'>128MB</option>
										<option value='256MB'>256MB</option>
										<option value='512MB'>512MB</option>
										<option value='1GB'>1GB</option>
										<option value='1.5GB'>1.5GB</option>
										<option value='2GB'>2GB</option>
										<option value='3GB'>3GB</option>
										<option value='4GB'>4GB</option>
										<option value='6GB'>6GB</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Bộ Nhớ Trong</label>
								<div class="col-md-6">
									<select name="internal_memory">
										<option value='không'>không</option>
										<option value='128MB'>128MB</option>
										<option value='256MB'>256MB</option>
										<option value='512MB'>512MB</option>
										<option value='1GB'>1GB</option>
										<option value='2GB'>2GB</option>
										<option value='4GB'>4GB</option>
										<option value='8GB'>8GB</option>
										<option value='16GB'>16GB</option>
										<option value='32GB'>32GB</option>
										<option value='64GB'>64GB</option>
										<option value='80GB'>80GB</option>
										<option value='128GB'>128GB</option>
										<option value='256GB'>256GB</option>
									</select>
								</div>
							</div>
							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Bộ Nhớ Còn Lại</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="remain_memory" placeholder="Nhập Bộ Nhớ Còn Lại" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ Thẻ Nhớ</label>
								<div class="col-md-6">
									<select name="mem_support">
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ Thẻ Tối Đa</label>
								<div class="col-md-6">
									<select name="mem_support_max">
										<option value="không">không</option>
										<option value="1GB">1GB</option>
										<option value="2GB">2GB</option>
										<option value="4GB">4GB</option>
										<option value="8GB">8GB</option>
										<option value="16GB">16GB</option>
										<option value="32GB">32GB</option>
										<option value="64GB">64GB</option>
										<option value="128GB">128GB</option>
										<option value="256GB">256GB</option>
										<option value="512GB">512GB</option>
										<option value="1TB">1TB</option>
										<option value="2TB">2TB</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Cảm Biến</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="sensor" placeholder="Nhập Cảm Biến" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Số Khe Sim</label>
								<div class="col-md-6">
									<select name="sim_track">
										<option value="1">1</option>
										<option value="2">2</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Sim</label>
								<div class="col-md-6">
									<select name="sim_type">
										<option value="sim thường">sim thường</option>
										<option value="micro sim">micro sim</option>
										<option value="nano sim">nano sim</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ 3G</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="sup_3g" placeholder="Nhập Hỗ Trợ 3G" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ 4G</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="sup_4g" placeholder="Nhập Hỗ Trợ 4G" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Wifi</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="wifi" placeholder="Nhập Công Nghệ Wifi" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Bluetooth</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="bluetooth" placeholder="Nhập Công Nghệ Bluetooth" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">GPS</label>
								<div class="col-md-6">
									<select class="form-control" name='gps'>
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Cổng Kết Nối</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="connector" placeholder="Nhập Cổng Kết Nối" />
								</div>
							</div>
							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Jack Tai Nghe</label>
								<div class="col-md-6">
									<select class = 'form-control' name="headphone">
										<option value='2.0'>2.0</option>
										<option value='3.0'>3.0</option>
										<option value='3.5'>3.5</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ OTG</label>
								<div class="col-md-6">
									<select name="otg">
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>
							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Kết Nối Khác</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="other_connect" placeholder="Nhập Kết Nối Khác" />
								</div>
							</div>

							<div class="form-group">

							<div class="form-group">
								<label class="col-md-4 control-label">Ghi Âm</label>
								<div class="col-md-6">
									<select name="record">
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Radio</label>
								<div class="col-md-6">
									<select name="radio">
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Chất Liệu Vỏ</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="material" placeholder="Nhập Chất Liệu" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước</label>
								<div class="col-md-6">
									<input type="text" rows="3" name="dimension1" placeholder="Dài" size="5" />
									<input type="text" rows="3" name="dimension2" placeholder="Ngang" size="5" />
									<input type="text" rows="3" name="dimension3" placeholder="Dày" size="5" /> mm
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Trọng Lượng</label>
								<div class="col-md-6">
									<input type="text" rows="3" name="weight" placeholder="Nhập Trọng Lượng Sản Phẩm" size="18" /> gam
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Pin</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="battery_type" placeholder="Nhập Loại Pin" />
								</div>
							</div>
							{{--mới--}}
							<div class="form-group">
								<label class="col-md-4 control-label">Chức Năng Đặc Biệt</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="other_func" placeholder="Nhập Chức Năng Đặc Biệt" />
								</div>
							</div>
						
						@endif
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Thêm
								</button>
								<button type = "button" class = "btn btn-primary" onclick = "window.location='/Web_Technology/admin/product/list/{!!$type!!}'">
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