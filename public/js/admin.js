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
	var img_direct='http://localhost/Project_2/public/';
	$('.main_nav>ul>li').click(function(){
		$('.i_last').attr('src', img_direct+'images/i_open_item.png');
		if($(this).hasClass('active')){
			$(this).children('ul').slideUp();
			$(this).removeClass('active');
		} else{
			$('.main_nav>ul>li').children('ul').slideUp();
			// $('.i_last').attr('src', 'images/i_open_item.png');
			$(this).children('ul').slideDown();
			$('.main_nav>ul>li').removeClass('active');
			$(this).addClass('active');
			$('.active .i_last').attr('src', img_direct+'images/i_close_item.png');
		}
	});
}

//Hàm để khi nhấn vào Admin sẽ slideDown các chức năng để Admin chỉnh sửa thông tin hay đăng xuất
function info_manage(){
	$('.info_manage').click(function(){
		if($(this).hasClass('active_info_manage')){
			$(this).children('ul').slideUp();
			$(this).removeClass('active_info_manage');
		} else {
			$(this).children('ul').slideDown('slow');
			$(this).addClass('active_info_manage');
		}
	});
}

//Hàm để xét chiều cao cho phần nav và phần main cho bằng nhau
function set_height(){
	$('#nav').css('height', '720px');
	var h_nav = $('#nav').css('height');
	var h_main = $('#main').css('height');
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
	if(h_nav<h_main) {
		$('#content').css('height',h_main);
		$('#nav').css('height', h_main);
	} else {
		$('#content').css('height',h_nav);
	}
}