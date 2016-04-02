<?php
	$banner_larges = DB::table('system_manage')->where('type','Large Banner')->where('display','1')->orderBy('ordinal','ASC')->get();
	$banner_smalls = DB::table('system_manage')->where('type','Small Banner')->where('display','1')->orderBy('ordinal','ASC')->skip(0)->take(2)->get();
?>
<div class="banner">
	<div class="large_banner">
		<ul class="slider">
			@foreach($banner_larges as $banner_large)
				<li><img src="{{url('resources/upload/banner/'.$banner_large->image)}}" alt="{!!$banner_large->content!!}" title="{!!$banner_large->content!!}"></li>
			@endforeach
		</ul>
	</div>

	<div class="small_banner">
		@if(count($banner_smalls)==0)
			<img src="" alt="">
		@else
			<img src="{{url('resources/upload/banner/'.$banner_smalls[0]->image)}}" alt="{!!$banner_smalls[0]->content!!}">
		@endif
	</div>
	<div class="small_banner">
		@if(count($banner_smalls)<2)
			<img src="" alt="">
		@else
			<img src="{{url('resources/upload/banner/'.$banner_smalls[1]->image)}}" alt="{!!$banner_smalls[1]->content!!}">
		@endif
	</div>
</div> <!-- End of Banner -->
<div class="main_content">
	<div class="left_content">
		<div class="update_info">
			<p class="title_info">Tin tức cập nhật</p>
			<img src="{{url('public/images/banner_menu_01.png')}}" alt="Smart Warch" class="img_info">
			<ul class="main_info">
				<li><a href="">Điện Thoại Giá Rẻ</a></li>
				<li><a href="">Điện Thoại Mới Nhất</a></li>
				<li><a href="">Điện Thoại IPhone</a></li>
				<li><a href="">Điện Thoại Nokia</a></li>
				<li><a href="">Điện Thoại SamSung</a></li>
			</ul>
		</div> <!-- End of Update Info-->
		<div class="promotion_info">
			<p class="title_info">Tin tức công nghệ</p>
			<img src="{{url('public/images/banner_menu_02.png')}}" alt="Smart Warch" class="img_info">
			<ul class="main_info">
				<li><a href=""><img src="{{url('public/images/ixuong.png')}}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
				<li><a href=""><img src="{{url('public/images/ixuong.png')}}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
				<li><a href=""><img src="{{url('public/images/ixuong.png')}}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
				<li><a href=""><img src="{{url('public/images/ixuong.png')}}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
			</ul>
		</div> <!-- End of Promotion Info-->
		<div class="trend">
			<p class="title_info">Tin tức công nghệ</p>
			<img src="{{url('public/images/banner_menu_03.png')}}" alt="Smart Warch" class="img_info">
			<ul class="main_info">
				<li><a href=""><img src="{{url('public/images/ixuong.png')}}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
				<li><a href=""><img src="{{url('public/images/ixuong.png')}}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
				<li><a href=""><img src="{{url('public/images/ixuong.png')}}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
				<li><a href=""><img src="{{url('public/images/ixuong.png')}}" alt="">Sự kiện hot trong tuần: I Watch chính thức xuất hiện.</a></li>
			</ul>
		</div> <!-- End of Trend -->
		<img src="{{url('public/images/quang_cao_01.png')}}" alt="" class="quang_cao">
	</div> <!-- End of Left Content -->
	<div class="right_content">
		<div class="new_product">
			<p class="title_product">Sản phẩm hot</p>
			<div class="main_product">
				<a class="image">
					<img src="{{url('public/images/sp_04.png')}}" alt="Sản Phẩm 04" title ="sản phẩm 1">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_01.png')}}" alt="Sản Phẩm 01">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_03.png')}}" alt="Sản Phẩm 03">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_02.png')}}" alt="Sản Phẩm 02">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_04.png')}}" alt="Sản Phẩm 04">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_03.png')}}" alt="Sản Phẩm 03">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_01.png')}}" alt="Sản Phẩm 01">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_02.png')}}" alt="Sản Phẩm 02">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
			</div>
		</div> <!-- End of Hot Product -->
		<div class="laptop">
			<p class="title_product">Sản phẩm mới</p>
			<div class="main_product">
				<a class="image">
					<img src="{{url('public/images/sp_04.png')}}" alt="Sản Phẩm 04">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_01.png')}}" alt="Sản Phẩm 01">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_03.png')}}" alt="Sản Phẩm 03">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_02.png')}}" alt="Sản Phẩm 02">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_04.png')}}" alt="Sản Phẩm 04">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_03.png')}}" alt="Sản Phẩm 03">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_01.png')}}" alt="Sản Phẩm 01">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_02.png')}}" alt="Sản Phẩm 02">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_04.png')}}" alt="Sản Phẩm 04">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_01.png')}}" alt="Sản Phẩm 01">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_03.png')}}" alt="Sản Phẩm 03">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_02.png')}}" alt="Sản Phẩm 02">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
			</div>
		</div> <!-- End of Hot Product -->
		<div class="accessories">
			<p class="title_product">Phụ Kiện</p>
			<div class="main_product">
				<a class="image">
					<img src="{{url('public/images/sp_04.png')}}" alt="Sản Phẩm 04">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_01.png')}}" alt="Sản Phẩm 01">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_03.png')}}" alt="Sản Phẩm 03">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_02.png')}}" alt="Sản Phẩm 02">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_04.png')}}" alt="Sản Phẩm 04">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_03.png')}}" alt="Sản Phẩm 03">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_01.png')}}" alt="Sản Phẩm 01">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
				<a class="image">
					<img src="{{url('public/images/sp_02.png')}}" alt="Sản Phẩm 02">
					<span>SamSung Galaxy S4</span>
					<span>10.000.000 đ</span>
				</a>
			</div>
		</div> <!-- End of Accessories -->
	</div> <!-- End of Right Content -->
</div> <!-- End of Main_Content-->