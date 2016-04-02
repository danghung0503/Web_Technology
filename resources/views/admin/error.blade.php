@if (count($errors) > 0)
	<div class="alert alert-danger message">
		<strong>Lỗi!</strong> Xảy ra một vài vấn đề với dữ liệu nhập vào<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif