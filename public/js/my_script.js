$(document).ready(function(){
	//Chú ý để hàm toggle ở dưới vì nó bắt sự kiện onclick 
	flash_message();
	reset_form();
	check_display();
	toggle();
});

//Hàm để cho các thông báo lỗi hoặc thành công hiện trong 10s rồi bị slideUP
function flash_message(){
	$('div.message').delay(5000).slideUp();
}
// Hàm để checkall tất cả các checkbox có name là check[]
function toggle(source) {
  checkboxes = document.getElementsByName('check[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
  }
}
//Vì kiểu reset trong input là chỉ xóa những dữ liệu mà người dùng nhập từ bàn phím nên những dữ liệu đã để mạc định sẽ không thể xóa do đó ta tạo ra hàm reset_form để xóa toàn bộ dữ liệu
function reset_form(){
	$('input#reset_form').click(function(){
		$("#updateForm input[type = 'text']").attr('value','');
		$("#updateForm input[type = 'email']").attr('value','');
		$("#updateForm select option").attr('selected',null);
		$('#updateForm select option').first().attr('selected','selected');
	});
}
//Hàm bắt sự kiện click vào ô checkbox chọn hiển thị hay không hiển thị trong banner
function check_display(){
	$('#check_display').click(function(){
		if($(this).attr('value')==0) {
			$(this).attr('value', '1');
		}else{
			$(this).attr('value','0');
		}
	});
}
