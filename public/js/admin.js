$(document).ready(function(){
	choose_item();
	info_manage();
	set_height();
});
// Thuật toán:
// Khi click vào 1 item có dropdown
// Nếu đã active 
//1.Xóa active và slideUp các item con
// Ngược lại 
//1. Cho tất cả các li khác slideUp
//2. Xóa active của tất cả các item
//3. Cho li hiện tại active (slideDown các item) 
function choose_item(){
	$('.main_nav>ul>li').click(function(){
		$('.i_last').removeClass('fa-chevron-down');
		$('.i_last').addClass('fa-chevron-right');
		if($(this).hasClass('active')){
			$(this).children('ul').slideUp();
			$(this).removeClass('active');
		} else{
			$('.main_nav>ul>li').children('ul').slideUp();
			$(this).children('ul').slideDown();
			$('.main_nav>ul>li').removeClass('active');
			$(this).addClass('active');
			$('.active .i_last').removeClass('fa-chevron-right');
			$('.active .i_last').addClass('fa-chevron-down');
		}
	});
}

//Hàm để khi nhấn vào Admin sẽ slideDown các chức năng để Admin chỉnh sửa thông tin hay đăng xuất
function info_manage(){
	$('.info_manage').click(function(){
		// if($(this).hasClass('active_info_manage')){
		// 	$(this).children('ul').slideUp();
		// 	$(this).removeClass('active_info_manage');
		// } else {
		// 	$(this).children('ul').slideDown('slow');
		// 	$(this).addClass('active_info_manage');
		// }
		$(this).children('ul').slideDown();
		$(this).children('ul').delay(2000).slideUp();
	});
}

//Hàm để xét chiều cao cho phần nav và phần main cho bằng nhau
function set_height(){
	$('#nav').css('height', '720px');
	var h_nav = $('#nav').css('height');
	h_nav = h_nav.substring(0,h_nav.length-2);
	var h_main = $('#main').css('height');
	h_main=h_main.substring(0,h_main.length-2);
	// if(h_nav<h_main){
	// 	$('#nav').css('height', h_main);
	// } else {
	// 	$('#main').css('height', h_nav);
	// }
	// var h_max = h_nav > h_main?h_nav:h_main;
	// $('#content').css('height', h_max);
	// $('#nav').css('height', h_max);
	// $('#main').css('height', h_max);	
	// alert('Mắc là '+h_max);
	if(h_main-h_nav>0) {
		$('#content').css('height',h_main);
		$('#nav').css('height', h_main);
	} else {
		$('#content').css('height',h_nav);
	}
}