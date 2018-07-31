<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>修改</h1>
	<form action="updateDo" method="post">
		<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
		<input type="hidden" name="id" value="<?php echo $res->id;?>">
		用户名：<input type="text" name="username" value="<?php echo $res->username;?>"><br><br>
		邮箱：<input type="text" name="mail" value="<?php echo $res->mail;?>"><br><br>
		昵称：<input type="text" name="nickname" value="<?php echo $res->nickname;?>"><br><br>
		<input type="submit" value="修改">
	</form>
</body>
</html>