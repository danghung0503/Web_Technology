@extends('admin.index')

@section('css')
	<link rel="stylesheet" href="{!!url('public/css/list.css')!!}">
@endsection

@section('content')
	<form action = "{!!route('admin.company.postDelete')!!}" method = "POST" id = "listForm">
		<input type="hidden" name = "_token" value = "{!!csrf_token()!!}">
		<table>
			<thead>
				<tr>
					<th>Danh sách các hãng sản xuất</td>
				</tr>
			</thead>
		</table>
		{{-- Hiện thông báo thành công hoặc thất bại --}}
		@if(Session::has('flash_message')) 
			<div class = "{!!Session::get('flash_level')!!} message ">
				{!!Session::get('flash_message')!!}
			</div>
		@endif
		{!!$companies->render()!!}
		<table>
			<thead>
				<tr>
					<th>
						<input type="checkbox" name = "checkall" onclick = "toggle(this)">
					</th>
					<th>Id</th>
					<th></th>
					<th></th>
					<th>Company name</th>
					<th>Logo</th>
					<th>Country</th>
					<th>Ngày tạo lập</th>
					<th>Lần chỉnh sửa trước</th>
				</tr>
			</thead>
			<tbody>
				<?php $id = 0?>
				@foreach($companies as $company)
					<?php $id++ ?>
					<tr>
						<td class = "center_align">
							<input type="checkbox" name = "check[]" value = "{!!$company->id!!}">
						</td>
						<td class = "center_align">{!!$id!!}</td>
						<td class = "center_align"><a href="{!!url('admin/company/update')!!}/{!!$company->id!!}">Sửa</a></td>
						<td class = "center_align"><a onclick = "return confirm('Bạn có muốn xoá hãng sản xuất {!!$company->company_name!!} không?\n Xóa hãng sẽ làm mất tất cả các sản phẩm của hãng, hãy cân nhắc!')" href="{!!url('admin/company/delete')!!}/{!!$company->id!!}">Xóa</a></td>
						<td>{!!$company->company_name!!}</td>
						<td class = "center_align"><img src="{!!url('resources/upload/company')!!}/{!!$company->logo!!}" alt="" height="45px" width="45px"></td>
						<td>{!!$company->country!!}</td>
						<td>{!!$company->created_at!!}</td>
						<td>{!!$company->updated_at!!}</td>
					</tr>
				@endforeach		
			</tbody>
		</table>
		<br>
		<input type="submit" name = "delete_choose" value = "Xóa chọn" class = "btn btn-success" onclick = "return confirm('Bạn có muốn xóa các hãng sản xuất được chọn?')">
		<input type="button" name = "add_new" value = "Thêm mới" class = "btn btn-success" onclick = "window.location='./add'">
	</form>
@stop