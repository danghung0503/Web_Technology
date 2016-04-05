<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>Trang quản trị</title>

	<link rel="stylesheet" href="{!!url('public/css/bootstrap.min.css')!!}">
	<link rel="stylesheet" href="{!!url('public/css/admin.css')!!}">
	{{-- Thêm vào các css --}}
	@yield('css')
	
	<script type = "text/javascript" src = "{!!url('public/js/jquery.min.js')!!}"></script>
	<script type = "text/javascript" src = "{!!url('public/js/bootstrap.min.js')!!}"></script>
	 

	 {{-- Sử dụng jquery và bootstrap có sẵn trong laravel --}}
	 <!-- 
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
 -->
	<script type = "text/jdẽ.bladeavascript" src = "{!!url('public/js/admin.js')!!}"></script>
	{{-- Script cho việc flash message --}}
	<script type = "text/javascript" src = "{!!url('public/js/my_script.js')!!}"></script>
</head>
<body>
	<div id="header">
		<div class="logo">
			<a href="#"><img src="{!!url('public/images/logo.png')!!}" alt="Thế Giới Công Nghệ" title = "Thế Giới Công Nghệ"></a>
		</div>
		<div class="info_manage">
			<a><span>Admin</span>
				<img width='30px' height='30px' src="{!!url('resources/upload/avatar/'.(!empty(Auth::user()->avatar)?Auth::user()->id.'/'.Auth::user()->avatar:'default/default.jpg'))!!}" alt="">
			</a>
			<ul>
				<li><a href="{!!url('admin/member/update')!!}/{!!Auth::user()->id!!}">Cập nhật</a></li>
				<li><a href="{!!url('/auth/logout')!!}">Đăng xuất</a></li>
			</ul>
		</div>
	</div> <!-- End of Header -->

	<div id="content">
		<div id="nav">
			<div class="info_admin">
				<img src="{!!url('resources/upload/avatar/'.(!empty(Auth::user()->avatar)?Auth::user()->id.'/'.Auth::user()->avatar:'default/default.jpg'))!!}" alt="" height="45px" width="45px">
				<span>Admin<br/>{{Auth::user()->username}}</span>
			</div>
			<div class="search_box">
				<form action="" method ="POST" >
					<input type="text" value = "" placeholder="Tìm kiếm...">
				</form>
			</div>
			<div class="main_nav">
				<ul>
					<li>
						<a>
							{{-- <span class="glyphicon glyphicon-home"></span> --}}
							<span class="glyphicon glyphicon-wrench"></span>
							Quản lý hệ thống
							<img src="{!!url('public/images/i_open_item.png')!!}" alt="" class="i_last">
						</a>
						<ul>
							<li>
								<a href="#">
									<span class="glyphicon glyphicon-resize-full"></span>
									Banner lớn
								</a>
							</li>
							<li>
								<a href="">
									<span class="glyphicon glyphicon-resize-small"></span>
									Banner nhỏ
								</a>
							</li>
							<li>
								<a href="">
									<span class="glyphicon glyphicon-folder-open"></span>
									Menu
								</a>
							</li>
							
						</ul>
					</li>
					<li>
						<a>
							<span class="glyphicon glyphicon-globe"></span>
							Quản lý tin tức
							<img src="{!!url('public/images/i_open_item.png')!!}" alt="" class="i_last">
						</a>
						<ul>
							<li>
								<a href="#">
									<span class="glyphicon glyphicon-inbox"></span>
									Công nghệ
								</a>
							</li>
							<li>
								<a href="">
									<span class="glyphicon glyphicon-ok"></span>
									Khuyến mãi
								</a>
							</li>
							<li>
								<a href="">
									<span class="glyphicon glyphicon-earphone"></span>
									Liên hệ
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{!!route('admin.member.getList')!!}">
							<span class="glyphicon glyphicon-user"></span>
							Thành viên
						</a>
					</li>
					<li>
						<a href="{!!route('admin.brand.getList')!!}">
							<span class="glyphicon glyphicon-list-alt"></span>
							Hãng sản xuất
						</a>
					</li>
					<li>
						<a>
							<span class="glyphicon glyphicon-qrcode"></span>
							Quản lý sản phẩm
							<img src="{!!url('public/images/i_open_item.png')!!}" alt="" class="i_last">
						</a>
						<ul>
							<li>
								<a href="">
									<span class="glyphicon glyphicon-earphone"></span>
									Điện thoại
								</a>
							</li>
							<li>
								<a href="">
									<span class="glyphicon glyphicon-thumbs-up"></span>
									Điện thoại mới
								</a>
							</li>
							<li>
								<a href="">
									<span class="glyphicon glyphicon-usd"></span>
									Điện thoại bán chạy
								</a>
							</li>
							<li>
								<a href="#">
									<span class="glyphicon glyphicon-hdd"></span>
									Phụ kiện
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">
							<span class="glyphicon glyphicon-file"></span>
							Quản lý đơn hàng
						</a>
					</li>
					<li>
						<a href="#">
							<span class="glyphicon glyphicon-picture"></span>
							Quản lý quảng cáo
						</a>
					</li>
					<li>
						<a>
							<span class="glyphicon glyphicon-stats"></span>
							Thống kê
							<img src="{!!url('public/images/i_open_item.png')!!}" alt="" class="i_last">
						</a>
						<ul>
							<li>
								<a href="#">
									<span class="glyphicon glyphicon-dashboard"></span>
									Theo tuần
								</a>
							</li>
							<li>
								<a href="">
									<span class="glyphicon glyphicon-dashboard"></span>
									Theo tháng
								</a>
							</li>
							<li>
								<a href="">
									<span class="glyphicon glyphicon-dashboard"></span>
									Theo năm
								</a>
							</li>
							
						</ul>
					</li>
				</ul>
			</div>
		</div> <!-- End of Navbar -->
		<div id="main">
			{{-- Thêm nội dung vào --}}

			@yield('content')
		</div> <!-- End of Main -->
	</div> <!-- End of Contend -->
	<div id="footer">
		<p>Bản quyền &copy 2016 thuộc về nhóm TTT </p>
	</div> <!-- End of Footer -->
</body>
</html>