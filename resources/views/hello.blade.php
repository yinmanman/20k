<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>添加</h1>
	<form action="add" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
		用户名：<input type="text" name="username"><br><br>
		密码：<input type="text" name="password"> <br><br>
		头像：<input type="file" name="file"><br><br>
		邮箱：<input type="text" name="mail"><br><br>
		昵称：<input type="text" name="nickname"><br><br>
		<input type="submit" value="提交">
	</form>
</body>
</html>