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
								<label class="col-md-4 control-label">Đèn Flash</label>
								<div class="col-md-6">
									<select name="flash">
										<option value="có">có</option>
										<option value="không">không</option>
									</select>
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
								<label class="col-md-4 control-label">Quay Phim</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="film_shoot" placeholder="Nhập Quay Phim" />
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
								<label class="col-md-4 control-label">Số Lõi</label>
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
									<input type="text" class = "form-control" name="mem_support_max" rows="3" placeholder="Nhập hỗ trợ thẻ tối đa" />
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

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước</label>
								<div class="col-md-6">
									<input type="text" rows="3" name="dimension1" placeholder="" size="5" />
									<input type="text" rows="3" name="dimension2" placeholder="" size="5" />
									<input type="text" rows="3" name="dimension3" placeholder="" size="5" /> mm
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Trọng Lượng</label>
								<div class="col-md-6">
									<input type="text" rows="3" name="weight" placeholder="Nhập Trọng Lượng Sản Phẩm" size="18" /> gam
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
								<label class="col-md-4 control-label">Màu</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="color" placeholder="Nhập Màu Sản Phẩm" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Chất Liệu</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="material" placeholder="Nhập Chất Liệu" />
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