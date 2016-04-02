// $(function(){
// 	$('.slider img:gt(0)').hide();
// 	setInterval(function(){
// 		$('.slider :first-child').fadeOut().next('img').fadeIn().end().appendTo('.slider');
// 	}, 3000);
// })
$(document).ready(function(){
	slider();
	info_member();
});
function slider() {
	$('.slider').bxSlider({
		auto : true, // tự động chạy
  		// mode: 'fade', 
  		// autoControls: true;
  		autoControls: true,//cuộn theo chiều ngang
  		captions: true,//tiêu đềautoControlsCombine
	});
	
}
function info_member(){
	$('.info_member').click(function(){
		if($(this).hasClass('active_info_member')){
			$(this).children('ul').slideUp();
			$(this).removeClass('active_info_member');
		} else {
			$(this).children('ul').slideDown('slow');
			$(this).addClass('active_info_member');
		}
	});
}
