<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<script type="text/javascript" charset="utf-8" src="./js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<form action="yzreg" method="post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		用户名：<input type="text" name="username"><br />
		密码：<input type="password" name="password"><br />
		手机号：<input type="text" name="tel" class="tel"><br />
		验证：<input type="text" name="yzm"><input type="button" value="发送验证码" name="button" class="button"><br />
		<input type="submit" name="submit" value="注册">
	</form>
	
</body>
</html>
<script type="text/javascript">
    $(function(){
    	$(".button").on("click",function(){
    		var tel = $(".tel").val();
    		$.ajax({
    			url:"./industrySMS.php",
    			data:{
    				tel:tel
    			},
    			type:"post",
    			success:function(msg){
    				if(msg){
    					alert("验证码发送成功,注意查收");
    				}else{
    					alert("验证码发送失败");
    				}
    			}

    		});
    	});
    });
    
</script>