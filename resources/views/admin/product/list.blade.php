@extends('admin.index')

@section('css')
	<link rel="stylesheet" href="{!!url('public/css/list.css')!!}">
@endsection

@section('content')
	<form action = "{!!route('admin.product.postDelete')!!}" method = "POST" id = "listForm">
		<input type="hidden" name = "_token" value = "{!!csrf_token()!!}">
		<input type="hidden" name = "type" value = "{!! $type !!}">
		<table>
			<thead>
				<tr>
					@if($type=='mobile')
						<th>Danh sách điện thoại</td>
					@elseif($type=='laptop')
						<th>Danh sách laptop</td>
					@elseif($type=='tablet')
						<th>Danh sách máy tính bảng</td>
					@elseif($type=='accessory')
						<th>Danh sách phụ kiện</td>
					@endif
				</tr>
			</thead>
		</table>
		{{-- Hiện thông báo thành công hoặc thất bại --}}
		@include('admin.alert')
		{{-- Hiện phân trang --}}
		{!!$products->render()!!}
		<table>
			<thead>
				<tr>
					<th>
						<input type="checkbox" name = "checkall" onclick = "toggle(this)">
					</th>
					<th>STT</th>
					<th></th>
					<th></th>
					<th>Tên</th>
					<th>Mô Tả</th>
					<th>Số Lượng</th>
					<th>Giá</th>
					<th>Ảnh</th>
					<th>Ngày tạo lập</th>
					<th>Lần chỉnh sửa trước</th>
				</tr>
			</thead>
			<tbody>
				<?php $id = 0?>
				@foreach($products as $product)
					<?php $id++ ?>
					<tr>
						<td class = "center_align">
							<input type="checkbox" name = "check[]" value = "{!!$product->id!!}">
						</td>
						<td class = "center_align">{!!$id!!}</td>
						<td class = "center_align"><a href="{!!url('admin/product/update')!!}/{!!$product->id!!}">Sửa</a></td>
						<td class = "center_align"><a onclick = "return confirm('Bạn có muốn xoá các sản phẩm {!!$product->name!!} không?\nhãy cân nhắc!')" href="{!!url('admin/product/delete')!!}/{!!$product->id!!}">Xóa</a></td>
						<td>{!!$product->name!!}</td>
						<td>
							@if($type=='mobile')
								{!!'Màn hình:'.(!empty($product->screen_tech)?$product->screen_tech:'chưa cập nhật').', '.(!empty($product->screen_width)?$product->screen_width.' inches':'chưa cập nhật')!!}<br/> 
								{!!'Hệ Điều Hành: '.(!empty($product->operating_system)?$product->operating_system:'chưa cập nhật').'<br />CPU: '.(!empty($product->CPU_rate)?$product->CPU_rate:'chưa cập nhật').'<br />'!!}
								{!!'Camera: '.($product->back_cam!=0?$product->back_cam.$product->back_cam_type:'chưa cập nhật').', '.$product->sim_track.' SIM<br />'!!} 
								{!!'Dung Lượng Pin: '.($product->battery_capacity!=0?$product->battery_capacity.'mAh':'chưa cập nhật')!!}
								<a href="{!! url('admin/product/detail/mobile/')!!}/{!! $product->keywords !!}">chi tiết</a>
							@elseif($type=='laptop')
								{!!'Màn hình:'.(!empty($product->screen_width)?$product->screen_width.'"':'chưa cập nhật')!!}<br/> 
								{!!'Hệ Điều Hành: '.(!empty($product->operating_system)?$product->operating_system:'chưa cập nhật').'<br />CPU: '.(!empty($product->CPU_rate)?$product->CPU_rate:'chưa cập nhật').'<br />'!!}
								{!!'Ổ Cứng: '.(!empty($product->hard_disk)?$product->hardisk:'chưa cập nhật')!!} 
								{!!'Dung Lượng Pin: '.($product->battery_capacity!=0?$product->battery_capacity.'mAh':'chưa cập nhật')!!}
								<a href="{!! url('admin/product/detail/laptop/')!!}/{!! $product->keywords !!}">chi tiết</a>
							@elseif($type=='tablet')
								{!!'Màn hình:'.(!empty($product->screen_width)?$product->screen_width.'"':'chưa cập nhật')!!}<br/>
								{!!'Hệ Điều Hành: '.(!empty($product->operating_system)?$product->operating_system:'chưa cập nhật').'<br />CPU: '.(!empty($product->CPU_rate)?$product->CPU_rate:'chưa cập nhật').'<br />'!!}
								<a href="{!! url('admin/product/detail/tablet/')!!}/{!! $product->keywords !!}">chi tiết</a>
							@endif
						</td>
						<td>{!!$product->amount!!}</td>
						<td>{!! number_format($product->price,0,',','.') !!}đ</td>
						<td class = "center_align"><img src="{!!url('resources/upload/product')!!}/{!! $product->id !!}/{!!$product->image!!}" alt="" height="45px" width="45px"></td>
						<td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))
                    ->diffforHumans() 
                !!}</td>
                		<td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($product->updated_at))
                    ->diffforHumans()
                !!}</td>
					</tr>
				@endforeach		
			</tbody>
		</table>
		<br>
		<input type="submit" name = "delete_choose" value = "Xóa chọn" class = "btn btn-success" onclick = "return confirm('Bạn có chắc muốn xóa các sản phẩm được chọn không?')">
		<input type="button" name = "add_new" value = "Thêm mới" class = "btn btn-success" onclick = "window.location='/Web_Technology/admin/product/add/{!!$type!!}'">
	</form>
@stop