<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Điện Thoại Hot, Điện Thoại Mới, Điện Thoại Bán Chạy</title>
	<link rel="stylesheet" href="{!!url('public/css/bootstrap.min.css')!!}">
	<link href="{!!url('public/css/SpryTabbedPanels.css')!!}" rel="stylesheet" type="text/css" />
	<link href="{!!url('public/css/jquery.bxslider.css')!!}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{!!url('public/css/user.css')!!}">
	<script src="{!!url('public/js/SpryTabbedPanels.js')!!}" type="text/javascript"></script>
	<script type = "text/javascript" src = "{!!url('public/js/jquery.min.js')!!}"></script>
	<script type = "text/javascript" src = "{!!url('public/js/jquery.bxslider.min.js')!!}"></script>
	<script type="text/javascript" src = "{!!url('public/js/user.js')!!}"></script>
	<script type="text/javascript" src = "{!!url('public/js/my_script.js')!!}"></script>
</head>
<body>
	<div id="header">
		<div class="h_top">
			<div class="h_logo">
				<a href="#">
					<img src="{!!url('public/images/logo.png')!!}" alt="DienThoai321" title="DienThoai321">
				</a>
			</div>
			<div class="h_right">
				<form action = "" class="h_search">
					<input type="text" placeholder = "Nhập vào từ cần tìm kiếm...">
					<button type = "submit" class="h_img"><img src="{!!url('public/images/search.png')!!}" alt="Icon search" ></button>
				</form>
				<ul class = "cart">
					<li><a href="#">Giỏ Hàng</a></li>
					<li><a href="#">Thanh Toán</a></li>
				</ul>
				@include('users/header')
			</div>
		</div> <!-- End of H-Top -->
	</div> <!-- End of Header -->
	<div id="navbar">
		<ul class="main_menu">
			<li class="active"><a href="{!!url('/')!!}"><img src="{!!url('public/images/iHome.png')!!}" alt=""></a></li>
			<li><a href="#">Bán Chạy</a>
				<ul>
					<li><a href="#">Acer</a></li>
					<li><a href="#">Dell</a></li>
					<li><a href="#">Asus</a></li>
					<li><a href="#">Lenovo</a></li>
				</ul>
			</li>
			<li><a href="#">Sản Phẩm Mới</a></li>
			<li><a href="#">Phụ Kiện</a></li>
			<li><a href="">Hãng Sản Xuất</a>
				<ul>
					<?php
						$companies = DB::table('companies')->get();
					?>
					@foreach($companies as $company)
						<li><a href="#">{!!$company->company_name!!}</a></li>
					@endforeach
				</ul>
			</li>
			<li><a href="#">Khuyến Mãi</a></li>
			<li><a href="{!!url('/contact')!!}">Liên Hệ</a></li>
		</ul>
	</div> <!-- End of Navbar -->
	<div class="clear"></div>

	<div id="content">
		@yield('content')
	</div> <!-- End of Content -->
	<div id="footer">
		<div class="connect_us">
			<div class="session">
			  	<div id="TabbedPanels1" class="TabbedPanels">
				  	<ul class="TabbedPanelsTabGroup">
					    <li class="TabbedPanelsTab" tabindex="0">Công Ty</li>
					    <li class="TabbedPanelsTab" tabindex="0">Hướng Dẫn Mua Online</li>
			    	</ul>
				  	<div class="TabbedPanelsContentGroup">
					    <div class="TabbedPanelsContent">
					    	<img src="{!!url('public/images/about.png')!!}"/> 
	                        <ul class = "list">
	                            <li><a href = "#">Giới thiệu công ty</a></li>
	                            <li><a href = "#">Phương châm bán hàng</a></li>
	                            <li><a href = "#">Hệ thống chi nhánh</a></li>
	                        </ul>
					    </div>
				    	<div class="TabbedPanelsContent">
				    		<p class="title_hd">Hướng dẫn mua hàng</p>
                            <p class = "content_hd">1. Hãy liên hệ tới nhóm<br />
                                Địa chỉ: Đại học Bách Khoa Hà Nội<br /><br/>
                                2. Mua hàng Online
                            </p>
				    	</div>
			    	</div>
			  	</div>
          	</div>
			<div class="session">
				<img src="{!!url('public/images/ngoac_left.png')!!}" alt="" class="ngoac">
				<div class="content_share">
					<p class="title">Chia Sẻ</p>

					<form action="" class="facebook">
						<button type = "submit"><img src="{!!url('public/images/i_face.png')!!}" alt="">0 lượt chia sẻ</button>
					</form>
					<form action="" class="gmail">
						<button type = "submit"><img src="{!!url('public/images/i_gmail.png')!!}" alt="">0 lượt chia sẻ</button>
					</form>
					<form action="" class="youtube">
						<button type = "submit"><img src="{!!url('public/images/i_you.png')!!}" alt="">0 lượt chia sẻ</button>
					</form>
				</div>
				<img src="{!!url('public/images/ngoac_right.png')!!}" alt="" class="ngoac">
			</div>
			<div class="session">
				<p class="title">Giải Thưởng Đạt Được</p>
				<div class="cup">
					<img src="{!!url('public/images/cup_01.png')!!}" alt="" class="img_cup">
					<p class="content_cup">Top Thương Hiệu Vàng Được Bạn Đọc Bình Chọn 5 Năm</p>
				</div>
				<div class="cup">
					<img src="{!!url('public/images/cup_02.png')!!}" alt="" class="img_cup">
					<p class="content_cup">Thương Hiệu Việt Được Yêu Thích Nhất</p>
				</div>
			</div>
		</div> <!-- End of Connect Us-->
		<div class="main_footer">
			<a href="#">Hot</a>|
			<a href="#">Hãng Sản Xuất</a>|
			<a href="#">Sản Phẩm Mới</a>|
			<a href="#">Phụ Kiện</a>|
			<a href="#">Khuyến Mãi</a>|
			<a href="#">Bán Chạy</a>|
			<a href="#">Liên Hệ</a>
			<p>Bản quyền &copy 2016 thuộc về nhóm TTT </p>
		</div> <!-- End of Main Footer -->
	</div> <!-- End of Footer -->
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
    </script>
</body>
</html>