// $(function(){
// 	$('.slider img:gt(0)').hide();
// 	setInterval(function(){
// 		$('.slider :first-child').fadeOut().next('img').fadeIn().end().appendTo('.slider');
// 	}, 3000);
// })
$(document).ready(function(){
	slider();
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
