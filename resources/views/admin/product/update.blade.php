@extends('admin.index')

@section('content')
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading center_align">Cập Nhật Thông Tin Sản Phẩm</div>
				<div class="panel-body">
					<!-- Hiển thị thông báo thành công hoặc thất bại, class message để cho thông báo ẩn hiện -->
					@include('admin.alert')
					@include('admin.error')

					<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.product.postUpdate') }}"  enctype = "multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="{{ $product->id }}" />
						<input type="hidden" name="type" value="{{ $product->type }}" />
						<div class="form-group">
							<label class="col-md-4 control-label">Hãng Sản Xuất</label>
							<div class="col-md-6">
								<select name='id_brand'>
									@foreach($brands as $brand)
										<option value="{{ $brand->id }}" {!! $product->id_brand==$brand->id?'selected':'' !!}>{{ $brand->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tên Sản Phẩm</label>
							<div class="col-md-6">
								<input type="text" class="form-control" rows="3" name="name" placeholder="" value="{!! $product->name !!}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Số Lượng</label>
							<div class="col-md-6">
								<input type="text" class="form-control" rows="3" name="amount" placeholder="" value="{!! $product->amount !!}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Giá</label>
							<div class="col-md-6">
								<input type="text" class="form-control" rows="3" name="price" placeholder="" value="{!! $product->price !!}" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Giá Mới</label>
							<div class="col-md-6">
								<input type="text" class="form-control" rows="3" name="price_new" placeholder="Nhập Giá Mới Sản Phẩm" value="{!! old('price_new',$product->price_new!=0?$product->price_new:'') !!}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Ảnh</label>
							<div class="col-md-6">
								<img src="{!! url('resources/upload/product/'.$product->id.'/'.$product->image) !!}" height="150"  />
							</div>
						</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Ảnh Mới</label>
								<div class="col-md-6">
									<input type="file" name="image" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Ảnh Chi Tiết</label>
								<div id="image_detail" class = "col md-6">
									@foreach($imagedetails as $image)
										<img src="{!! url('resources/upload/product/'.$image->id_product.'/detail/'.$image->name) !!}" width="150px" height="100px" />
										<a href="" id="del_img_demo" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times" ></i></a>
									@endforeach
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
						@if($product->type == "mobile")
							<div class="form-group">
								<label class="col-md-4 control-label">Công Nghệ Màn Hình</label>
								<div class="col-md-6">
									<select name="screen_tech" class="form-control">
										<option value="LCD" {{ $product->screen_tech=='LCD'?'selected':'' }}>LCD</option>
										<option value="TFT-LCD" {{ $product->screen_tech=='TFT-LCD'?'selected':'' }}>TFT - LCD</option>
										<option value="Super LCD" {{ $product->screen_tech=='Super LCD'?'selected':'' }}>Super LCD</option>
										<option value="IPS LCD" {{ $product->screen_tech=='IPS LCD'?'selected':'' }}>IPS LCD</option>
										<option value="LED-backlit IPS" {{ $product->screen_tech=='LED-backlit IPS'?'selected':'' }}>LED-backlit IPS</option>
										<option value="IPS Quantum" {{ $product->screen_tech=='IPS Quantum'?'selected':'' }}>IPS Quantum</option>
										<option value="OLED" {{ $product->screen_tech=='OLED'?'selected':'' }}>OLED</option>
										<option value="AMOLED" {{ $product->screen_tech=='AMOLED'?'selected':'' }}>AMOLED</option>
										<option value="Super AMOLED" {{ $product->screen_tech=='Super AMOLED'?'selected':'' }}>Super AMOLED</option>
										<option value="Super AMOLED Plus" {{ $product->screen_tech=='Super AMOLED Plus'?'selected':'' }}>Super AMOLED Plus</option>
										<option value="Super AMOLED HD" {{ $product->screen_tech=='Super AMOLED HD'?'selected':'' }}>Super AMOLED HD</option>
										<option value="Retina" {{ $product->screen_tech=='Retina'?'selected':'' }}>Retina</option>
										<option value="Retina HD" {{ $product->screen_tech=='Retina HD'?'selected':'' }}>Retina HD</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Độ Phân Giải</label>
								<div class="col-md-8">
									<div class="col-md-6">
										<input type="text" name="resolution1" placeholder="Kích Thước 1" size="8" value="{{ old('resolution1',!empty($product->resolution1)?$product->resolution1:"") }}" /> px
									</div>
									<div class="col-md-6">
										<input type="text" name="resolution2" placeholder="Kích Thước 2" size="8" value="{{ old('resolution1',!empty($product->resolution2)?$product->resolution2:"") }}" /> px
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Màn Hình Rộng</label>
								<div class="col-md-6">
									<input type="text" name="screen_width" size="4" placeholder="Nhập Độ Rộng Của Màn Hình" value="{{ old('screen_width',!empty($product->screen_width)?$product->screen_width:"") }}" /> inch
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
										<option value="0.2" {{ $product->back_cam=='0.2'?'selected':'' }}>0.2</option>
										<option value="1" {{ $product->back_cam=='1'?'selected':'' }}>1</option>
										<option value="1.2" {{ $product->back_cam=='1.2'?'selected':'' }}>1.2</option>
										<option value="2" {{ $product->back_cam=='2'?'selected':'' }}>2</option>
										<option value="2.5" {{ $product->back_cam=='2.5'?'selected':'' }}>2.5</option>
										<option value="3" {{ $product->back_cam=='3'?'selected':'' }}>3</option>
										<option value="3.2" {{ $product->back_cam=='3.2'?'selected':'' }}>3.2</option>
										<option value="5" {{ $product->back_cam=='5'?'selected':'' }}>5</option>
										<option value="8" {{ $product->back_cam=='8'?'selected':'' }}>8</option>
										<option value="12" {{ $product->back_cam=='12'?'selected':'' }}>12</option>
										<option value="13" {{ $product->back_cam=='13'?'selected':'' }}>13</option>
										<option value="16" {{ $product->back_cam=='16'?'selected':'' }}>16</option>
										<option value="20" {{ $product->back_cam=='20'?'selected':'' }}>20</option>
										<option value="23" {{ $product->back_cam=='23'?'selected':'' }}>23</option>
									</select>
									<select name="back_cam_type">
										<option value="MP" {{ $product->back_cam_type=='MP'?'selected':'' }}>MP</option>
										<option value="Ultra Pixel" {{ $product->back_cam_type=='Ultra Pixel'?'selected':'' }}>Ultra Pixel</option>
										MP</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Đèn Flash</label>
								<div class="col-md-6">
									<select name="flash">
										<option value="có" {{ $product->flash=='có'?'selected':'' }}>có</option>
										<option value="không" {{ $product->flash=='không'?'selected':'' }}>không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Camera Trước</label>
								<div class="col-md-6">
									<select name="front_cam">
										<option value="0.2" {{ $product->front_cam=='0.2'?'selected':'' }}>0.2</option>
										<option value="1" {{ $product->front_cam=='1'?'selected':'' }}>1</option>
										<option value="1.2" {{ $product->front_cam=='1.2'?'selected':'' }}>1.2</option>
										<option value="2" {{ $product->front_cam=='2'?'selected':'' }}>2</option>
										<option value="2.5" {{ $product->front_cam=='2.5'?'selected':'' }}>2.5</option>
										<option value="3" {{ $product->front_cam=='3'?'selected':'' }}>3</option>
										<option value="3.2" {{ $product->front_cam=='3.2'?'selected':'' }}>3.2</option>
										<option value="5" {{ $product->front_cam=='5'?'selected':'' }}>5</option>
										<option value="8" {{ $product->front_cam=='8'?'selected':'' }}>8</option>
										<option value="12" {{ $product->front_cam=='12'?'selected':'' }}>12</option>
									</select>
									<select name="front_cam_type">
										<option value="MP" {{ $product->front_cam_type=='MP'?'selected':'' }}>MP</option>
										<option value="Ultra Pixel" {{ $product->front_cam_type=='Ultra Pixel'?'selected':'' }}>Ultra Pixel</option>
										MP</select>
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-4 control-label">Quay Phim</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="film_shoot" placeholder="Nhập Quay Phim"  value="{{ old('film_shoot',!empty($product->film_shoot)?$product->film_shoot:"") }}" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Gọi Video</label>
								<div class="col-md-6">
									<select name="video_call">
										<option value="có" {{ $product->video_call=='có'?'selected':'' }}>có</option>
										<option value="không" {{ $product->video_call=='không'?'selected':'' }}>không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hệ Điều Hành</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="operating_system" placeholder="Nhập Hệ Điều Hành" value="{{ old('operating_system',!empty($product->operating_system)?$product->operating_system:"") }}" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Số Lõi</label>
								<div class="col-md-6">
									<select name="core_amount">
										<option value="1" {{ $product->core_amount=='1'?'selected':'' }}>1</option>
										<option value="2" {{ $product->core_amount=='2'?'selected':'' }}>2</option>
										<option value="3" {{ $product->core_amount=='3'?'selected':'' }}>3</option>
										<option value="4" {{ $product->core_amount=='4'?'selected':'' }}>4</option>
										<option value="5" {{ $product->core_amount=='5'?'selected':'' }}>5</option>
										<option value="6" {{ $product->core_amount=='6'?'selected':'' }}>6</option>
										<option value="7" {{ $product->core_amount=='7'?'selected':'' }}>7</option>
										<option value="8" {{ $product->core_amount=='8'?'selected':'' }}>8</option>
									</select> Nhân
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Vi Xử Lý</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="proccesor" placeholder="Nhập Vi Xử Lý"  value="{{ old('proccesor',!empty($product->proccesor)?$product->proccesor:"") }}" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Tốc Độ CPU</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="CPU_rate" placeholder="Nhập Tốc Độ CPU"  value="{{ old('CPU_rate',!empty($product->CPU_rate)?$product->CPU_rate:"") }}" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">RAM</label>
								<div class="col-md-6">
									<select name="ram">
										<option value='128MB' {{ $product->ram=='128MB'?'selected':'' }}>128MB</option>
										<option value='256MB' {{ $product->ram=='256MB'?'selected':'' }}>256MB</option>
										<option value='512MB' {{ $product->ram=='512MB'?'selected':'' }}>512MB</option>
										<option value='1GB' {{ $product->ram=='1GB'?'selected':'' }}>1GB</option>
										<option value='1.5GB' {{ $product->ram=='1.5GB'?'selected':'' }}>1.5GB</option>
										<option value='2GB' {{ $product->ram=='2GB'?'selected':'' }}>2GB</option>
										<option value='3GB' {{ $product->ram=='3GB'?'selected':'' }}>3GB</option>
										<option value='4GB' {{ $product->ram=='4GB'?'selected':'' }}>4GB</option>
										<option value='6GB' {{ $product->ram=='6GB'?'selected':'' }}>6GB</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Bộ Nhớ Trong</label>
								<div class="col-md-6">
									<select name="internal_memory">
										<option value='không' {{ $product->internal_memory=='không'?'selected':'' }}>không</option>
										<option value='128MB' {{ $product->internal_memory=='128MB'?'selected':'' }}>128MB</option>
										<option value='256MB' {{ $product->internal_memory=='256MB'?'selected':'' }}>256MB</option>
										<option value='512MB' {{ $product->internal_memory=='512MB'?'selected':'' }}>512MB</option>
										<option value='1GB' {{ $product->internal_memory=='1GB'?'selected':'' }}>1GB</option>
										<option value='2GB' {{ $product->internal_memory=='2GB'?'selected':'' }}>2GB</option>
										<option value='4GB' {{ $product->internal_memory=='4GB'?'selected':'' }}>4GB</option>
										<option value='8GB' {{ $product->internal_memory=='6GB'?'selected':'' }}>8GB</option>
										<option value='16GB' {{ $product->internal_memory=='16GB'?'selected':'' }}>16GB</option>
										<option value='32GB' {{ $product->internal_memory=='32GB'?'selected':'' }}>32GB</option>
										<option value='64GB' {{ $product->internal_memory=='64GB'?'selected':'' }}>64GB</option>
										<option value='80GB' {{ $product->internal_memory=='80GB'?'selected':'' }}>80GB</option>
										<option value='128GB' {{ $product->internal_memory=='128GB'?'selected':'' }}>128GB</option>
										<option value='256GB' {{ $product->internal_memory=='256GB'?'selected':'' }}>256GB</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ Thẻ Nhớ</label>
								<div class="col-md-6">
									<select name="mem_support">
										<option value="có" {{ $product->mem_support=='có'?'selected':'' }}>có</option>
										<option value="không" {{ $product->mem_support=='không'?'selected':'' }}>không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ Thẻ Tối Đa</label>
								<div class="col-md-6">
									<input type="text" class = "form-control" name="mem_support_max" rows="3" placeholder="Nhập hỗ trợ thẻ tối đa"  value="{{ old('mem_support_max',!empty($product->mem_support_max)?$product->mem_support_max:"") }}" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Băng Tần 2G</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="sup_2g" placeholder="Nhập Băng Tần 2G"  value="{{ old('sup_2g',!empty($product->sup_2g)?$product->sup_2g:"") }}" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Băng Tần 3G</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="sup_3g" placeholder="Nhập Băng Tần 3G"  value="{{ old('sup_3g',!empty($product->sup_3g)?$product->sup_3g:"") }}" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Hỗ Trợ 4G</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="sup_4g" placeholder="Nhập Hỗ Trợ 4G"  value="{{ old('sup_4g',!empty($product->sup_4g)?$product->sup_4g:"") }}" />
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
										<option value="sim thường"  {{ $product->sim_type=='sim thường'?'selected':'' }}>sim thường</option>
										<option value="micro sim" {{ $product->sim_type=='micro sim'?'selected':'' }}>micro sim</option>
										<option value="nano sim" {{ $product->sim_type=='nano sim'?'selected':'' }}>nano sim</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Wifi</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="wifi" placeholder="Nhập Công Nghệ Wifi" value="{{ old('wifi',!empty($product->wifi)?$product->wifi:"") }}" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Dung Lượng Pin</label>
								<div class="col-md-6">
									<input type="text" name="battery_capacity" placeholder="Nhập Dung Lượng Pin" size="18"  value="{{ old('battery_capacity',!empty($product->battery_capacity)?$product->battery_capacity:"") }}" /> mAh
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Loại Pin</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="battery_type" placeholder="Nhập Loại Pin"  value="{{ old('battery_type',!empty($product->battery_type)?$product->battery_type:"") }}" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Kích Thước</label>
								<div class="col-md-6">
									<input type="text" rows="3" name="dimension1" placeholder="" size="5"  value="{{ old('dimension1',!empty($product->dimension1)?$product->dimension1:"") }}" />
									<input type="text" rows="3" name="dimension2" placeholder="" size="5"  value="{{ old('dimension2',!empty($product->dimension2)?$product->dimension2:"") }}" />
									<input type="text" rows="3" name="dimension3" placeholder="" size="5"  value="{{ old('dimension3',!empty($product->dimension3)?$product->dimension3:"") }}" /> mm
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Trọng Lượng</label>
								<div class="col-md-6">
									<input type="text" rows="3" name="weight" placeholder="Nhập Trọng Lượng Sản Phẩm" size="18" value="{{ old('weight',!empty($product->weight)?$product->weight:"") }}" /> gam
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Bluetooth</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="bluetooth" placeholder="Nhập Công Nghệ Bluetooth" value="{{ old('bluetooth',!empty($product->bluetooth)?$product->bluetooth:"") }}" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">NFC</label>
								<div class="col-md-6">
									<select name="nfc">
										<option value="có" {{ $product->nfc=='có'?'selected':'' }}>có</option>
										<option value="không" {{ $product->nfc=='không'?'selected':'' }}>không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Ghi Âm</label>
								<div class="col-md-6">
									<select name="record">
										<option value="có" {{ $product->record=='có'?'selected':'' }}>có</option>
										<option value="không" {{ $product->record=='không'?'selected':'' }}>không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Radio</label>
								<div class="col-md-6">
									<select name="radio">
										<option value="có" {{ $product->radio=='có'?'selected':'' }}>có</option>
										<option value="không" {{ $product->radio=='không'?'selected':'' }}>không</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Thiết Kế</label>
								<div class="col-md-6">
									<select name="design">
										<option value="pin rời" {{ $product->design=='pin rời'?'selected':'' }}>pin rời</option>
										<option value="nguyên khối" {{ $product->design=='nguyên khối'?'selected':'' }}>nguyên khối</option>
										<option value="mô-đun" {{ $product->design=='mô-đun'?'selected':'' }}>mô-đun</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Màu</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="color" placeholder="Nhập Màu Sản Phẩm" value="{{ old('color',!empty($product->color)?$product->color:"") }}" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Chất Liệu</label>
								<div class="col-md-6">
									<input type="text" class="form-control" rows="3" name="material" placeholder="Nhập Chất Liệu" value="{{ old('material',!empty($product->material)?$product->material:"") }}" />
								</div>
							</div>
						@endif
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Cập Nhật
								</button>
								@if(!isset($_GET['detail']))
									<button type = "button" class = "btn btn-primary" onclick = "window.location='/Web_Technology/admin/product/list/{!!$product->type!!}'">
								@else
									<button type = "button" class = "btn btn-primary" onclick = "window.location='/Web_Technology/admin/product/detail/{!!$product->type!!}/{!!$product->keywords!!}'">
								@endif
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