<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thế Giới Công Nghệ</title>
	<link href="{!! url('/public/css/SpryTabbedPanels.css') !!}" rel="stylesheet" type="text/css" />
	<link href="{!! url('/public/css/jquery.bxslider.css') !!}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{!! url('/public/css/user.css') !!}" type="text/css">
	<script src="{!! url('/public/js/SpryTabbedPanels.js') !!}" type="text/javascript"></script>
	<script type = "text/javascript" src = "{!! url('/public/js/jquery.min.js') !!}"></script>
	<script type = "text/javascript" src = "{!! url('/public/js/jquery.bxslider.min.js') !!}"></script>
	<script type="text/javascript" src = "{!! url('/public/js/user.js') !!}"></script>
</head>
<body>
	<div id="header">
		<div class="h_top">
			<div class="h_logo">
				<img src="{!! url('/public/images/logo.png') !!}" alt="Thế Giới Công Nghệ" title="Thế Giới Công Nghệ">
			</div>
			<div class="h_right">
				<div class="h_hotline">
					<p>Hot line: 012.3456.789</p>
				</div>
				<form action = "" class="h_search">
					<input type="text" placeholder = "Tìm kiếm">
					<button type = "submit" class="h_img"><img src="{{ url('/public/images/search.png') }}" alt="Icon search" ></button>
				</form>
			</div>
		</div> <!-- End of H-Top -->
	</div> <!-- End of Header -->
	<div id="navbar">
		<ul class="main_menu">
			<li class="active"><a href="#"><img src="{{ url('/public/images/iHome.png') }}" alt=""></a></li>
			<li><a href="#">Laptop</a>
				<ul>
					<li><a href="#">Acer</a></li>
					<li><a href="#">Dell</a></li>
					<li><a href="#">Asus</a></li>
					<li><a href="#">Lenovo</a></li>
				</ul>
			</li>
			<li><a href="#">Điện Thoại</a>
				<ul>
					<li><a href="#">Sam Sung</a></li>
					<li><a href="#">IPhone</a></li>
					<li><a href="#">BPhone</a></li>
				</ul>
			</li>
			<li><a href="#">Máy Tính Bảng</a></li>
			<li><a href="#">Phụ Kiện</a></li>
			<li><a href="#">Khuyến Mãi</a></li>
			<li><a href="#">Bán Chạy</a></li>
			<li><a href="#">Liên Hệ</a></li>
		</ul>
	</div> <!-- End of Navbar -->
	<div class="clear"></div>

	<div id="content">
		<div class="banner">
			<div class="large_banner">
				<!-- <div class="slider">
					<img src="images_slide/a1.jpg" alt="">
					<img src="images_slide/a2.jpg" alt="">
					<img src="images_slide/a3.jpg" alt="">
					<img src="images_slide/a4.jpg" alt="">
					<img src="images_slide/a5.jpg" alt="">
				</div> -->
				<ul class="slider">
					<li><img src="{{ url('resources/upload/banner/a1.jpg') }}" alt="" title = "Hình 01"></li>
					<li><img src="{{ url('resources/upload/banner/a2.jpg') }}" alt="" title = "Hình 02"></li>
					<li><img src="{{ url('resources/upload/banner/a3.jpg') }}" alt="" title = "Hình 03"></li>
					<li><img src="{{ url('resources/upload/banner/a4.jpg') }}" alt="" title = "Hình 04"></li>
					<li><img src="{{ url('resources/upload/banner/a5.jpg') }}" alt="" title = "Hình 05"></li>
				</ul>
			</div>
			<div class="small_banner">
				<img src="{{ url('resources/upload/banner/banner_small_1.png') }}" alt="Banner_1">
			</div>
			<div class="small_banner">
				<img src="{{ url('resources/upload/banner/banner_small_2.png') }}" alt="Banner_2">
			</div>
		</div> <!-- End of Banner -->
		<div class="main_content">
			<div class="left_content">
				<div class="new_product">
					<p class="title_product">Sản phẩm mới</p>
					<div class="main_product">
						<a class="image">
							<img src="{!! url('/public/images/sp_04.png') !!}" alt="Sản Phẩm 04" title ="sản phẩm 1">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_01.png') !!}" alt="Sản Phẩm 01">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_03.png') !!}" alt="Sản Phẩm 03">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_02.png') !!}" alt="Sản Phẩm 02">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_04.png') !!}" alt="Sản Phẩm 04">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_03.png') !!}" alt="Sản Phẩm 03">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_01.png') !!}" alt="Sản Phẩm 01">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_02.png') !!}" alt="Sản Phẩm 02">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
					</div>
				</div> <!-- End of New Product -->
				<div class="laptop">
					<p class="title_product">Laptop</p>
					<div class="main_product">
						<a class="image">
							<img src="{!! url('/public/images/sp_04.png') !!}" alt="Sản Phẩm 04">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_01.png') !!}" alt="Sản Phẩm 01">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_03.png') !!}" alt="Sản Phẩm 03">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_02.png') !!}" alt="Sản Phẩm 02">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_04.png') !!}" alt="Sản Phẩm 04">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_03.png') !!}" alt="Sản Phẩm 03">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_01.png') !!}" alt="Sản Phẩm 01">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_02.png') !!}" alt="Sản Phẩm 02">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_04.png') !!}" alt="Sản Phẩm 04">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_01.png') !!}" alt="Sản Phẩm 01">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_03.png') !!}" alt="Sản Phẩm 03">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_02.png') !!}" alt="Sản Phẩm 02">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
					</div>
				</div> <!-- End of Lap Top -->
				<div class="telephone">
					<p class="title_product">Điện Thoại</p>
					<div class="main_product">
						<a class="image">
							<img src="{!! url('/public/images/sp_04.png') !!}" alt="Sản Phẩm 04">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_01.png') !!}" alt="Sản Phẩm 01">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_03.png') !!}" alt="Sản Phẩm 03">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_02.png') !!}" alt="Sản Phẩm 02">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_04.png') !!}" alt="Sản Phẩm 04">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_03.png') !!}" alt="Sản Phẩm 03">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_01.png') !!}" alt="Sản Phẩm 01">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_02.png') !!}" alt="Sản Phẩm 02">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
					</div>
				</div> <!-- End of Telephone -->
				<div class="accessories">
					<p class="title_product">Phụ Kiện</p>
					<div class="main_product">
						<a class="image">
							<img src="{!! url('/public/images/sp_04.png') !!}" alt="Sản Phẩm 04">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_01.png') !!}" alt="Sản Phẩm 01">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_03.png') !!}" alt="Sản Phẩm 03">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_02.png') !!}" alt="Sản Phẩm 02">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_04.png') !!}" alt="Sản Phẩm 04">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_03.png') !!}" alt="Sản Phẩm 03">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_01.png') !!}" alt="Sản Phẩm 01">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
						<a class="image">
							<img src="{!! url('/public/images/sp_02.png') !!}" alt="Sản Phẩm 02">
							<span>SamSung Galaxy S4</span>
							<span>10.000.000 đ</span>
						</a>
					</div>
				</div> <!-- End of Accessories -->
			</div> <!-- End of Left Content -->
			<div class="right_content">
				<div class="technology_info">
					<p class="title_info">Tin tức công nghệ</p>
					<img src="{!! url('/public/images/banner_menu_01.png') !!}" alt="Smart Warch" class="img_info">
					<ul class="main_info">
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
					</ul>
				</div> <!-- End of Technology Info-->
				<div class="promotion_info">
					<p class="title_info">Tin tức công nghệ</p>
					<img src="{!! url('/public/images/banner_menu_01.png') !!}" alt="Smart Warch" class="img_info">
					<ul class="main_info">
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
					</ul>
				</div> <!-- End of Promotion Info-->
				<div class="trend">
					<p class="title_info">Tin tức công nghệ</p>
					<img src="{!! url('/public/images/banner_menu_01.png') !!}" alt="Smart Warch" class="img_info">
					<ul class="main_info">
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
						<li><a href=""><img src="{!! url('/public/images/ixuong.png') !!}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
					</ul>
				</div> <!-- End of Trend -->
				<img src="{!! url('/public/images/quang_cao_01.png') !!}" alt="" class="quang_cao">
				<img src="{!! url('/public/images/quang_cao_02.png') !!}" alt="">
			</div> <!-- End of Right Content -->
		</div> <!-- End of Main_Content-->
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
					    	<img src="{!! url('/public/images/about.png') !!}"/> 
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
				<img src="{!! url('/public/images/ngoac_left.png') !!}" alt="" class="ngoac">
				<div class="content_share">
					<p class="title">Chia Sẻ</p>
					<form action="" class="bt_facebook">
						<button type = "submit"><img src="{!! url('/public/images/facebook.png') !!}" alt="">0 lượt chia sẻ</button>
					</form>
					<form action="" class="bt_gmail">
						<button type = "submit"><img src="{!! url('/public/images/gmail.png') !!}" alt="">0 lượt chia sẻ</button>
					</form>
					<form action="" class="bt_youtube">
						<button type = "submit"><img src="{!! url('/public/images/youtube.png') !!}" alt="">0 lượt chia sẻ</button>
					</form>
				</div>
				<img src="{!! url('/public/images/ngoac_right.png') !!}" alt="" class="ngoac">
			</div>
			<div class="session">
				<p class="title">Giải Thưởng Đạt Được</p>
				<div class="cup">
					<img src="{!! url('/public/images/cup_01.png') !!}" alt="" class="img_cup">
					<p class="content_cup">Top Thương Hiệu Vàng Được Bạn Đọc Bình Chọn 5 Năm</p>
				</div>
				<div class="cup">
					<img src="{!! url('/public/images/cup_02.png') !!}" alt="" class="img_cup">
					<p class="content_cup">Thương Hiệu Việt Được Yêu Thích Nhất</p>
				</div>
			</div>
		</div> <!-- End of Connect Us-->
		<div class="main_footer">
			<a href="#">Laptop</a>|
			<a href="#">Điện Thoại</a>|
			<a href="#">Máy Tính Bảng</a>|
			<a href="#">Phụ Kiện</a>|
			<a href="#">Khuyến Mãi</a>|
			<a href="#">Bán Chạy</a>|
			<a href="#">Liên Hệ</a>
			<p>Bản quyền &copy 2016 thuộc về nhóm </p>
		</div> <!-- End of Main Footer -->
	</div> <!-- End of Footer -->
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
    </script>
</body>
</html>