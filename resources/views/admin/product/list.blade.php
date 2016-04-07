@extends('admin.index')

@section('css')
	<link rel="stylesheet" href="{!!url('public/css/list.css')!!}">
@endsection

@section('content')
	<form action = "{!!route('admin.brand.postDelete')!!}" method = "POST" id = "listForm">
		<input type="hidden" name = "_token" value = "{!!csrf_token()!!}">
		<table>
			<thead>
				<tr>
					<th>Danh sách các hãng sản xuất</td>
				</tr>
			</thead>
		</table>
		{{-- Hiện thông báo thành công hoặc thất bại --}}
		@include('admin.alert')
		{{-- Hiện phân trang --}}
		{!!$brands->render()!!}
		<table>
			<thead>
				<tr>
					<th>
						<input type="checkbox" name = "checkall" onclick = "toggle(this)">
					</th>
					<th>STT</th>
					<th></th>
					<th></th>
					<th>Tên hãng</th>
					<th>Logo</th>
					<th>Quốc gia</th>
					<th>Mô tả</th>
					<th>Ngày tạo lập</th>
					<th>Lần chỉnh sửa trước</th>
				</tr>
			</thead>
			<tbody>
				<?php $id = 0?>
				@foreach($brands as $brand)
					<?php $id++ ?>
					<tr>
						<td class = "center_align">
							<input type="checkbox" name = "check[]" value = "{!!$brand->id!!}">
						</td>
						<td class = "center_align">{!!$id!!}</td>
						<td class = "center_align"><a href="{!!url('admin/brand/update')!!}/{!!$brand->id!!}">Sửa</a></td>
						<td class = "center_align"><a onclick = "return confirm('Bạn có muốn xoá hãng sản xuất {!!$brand->name!!} không?\n Xóa hãng sẽ làm mất tất cả các sản phẩm của hãng, hãy cân nhắc!')" href="{!!url('admin/brand/delete')!!}/{!!$brand->id!!}">Xóa</a></td>
						<td>{!!$brand->name!!}</td>
						<td class = "center_align"><img src="{!!url('resources/upload/brand')!!}/{!!$brand->logo!!}" alt="" height="45px" width="45px"></td>
						<td>{!!$brand->country!!}</td>
						<td>{!!strlen($brand->description)>35?substr($brand->description,0,30).'...':$brand->description!!}</td>
						<td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($brand->created_at))
                    ->diffforHumans() 
                !!}</td>
                		<td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($brand->updated_at))
                    ->diffforHumans()
                !!}</td>
					</tr>
				@endforeach		
			</tbody>
		</table>
		<br>
		<input type="submit" name = "delete_choose" value = "Xóa chọn" class = "btn btn-success" onclick = "return confirm('Bạn có muốn xóa các hãng sản xuất được chọn?')">
		<input type="button" name = "add_new" value = "Thêm mới" class = "btn btn-success" onclick = "window.location='./add'">
	</form>
@stop