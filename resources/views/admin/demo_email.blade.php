<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Demo Email</title>
</head>
<body>
	<form action="{!!route('postLienhe')!!}" method = "POST" >
		<input type="hidden" name="_token" value = "{!!csrf_token()!!}">
		Name: <input type="text" name = "username" value = "">
		Email:<input type = "email" name = "email" value = "">
		Nội dung: <input type="text" name = "content" value = "">
		<input type="submit" value = "Gửi">
	</form>
</body>
</html>