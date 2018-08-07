<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<script type="text/javascript" charset="utf-8" src="./js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<form action="" method="post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" class="_token">
        <input type="hidden" name="ycyzm" class="ycyzm" value="">
		用户名：<input type="text" name="username" class="username"><br />
		密码：<input type="password" name="password" class="password"><br />
		手机号：<input type="text" name="tel" class="tel"><input type="button" value="免费获取验证码" name="button" class="button"><br />
		验证：<input type="text" name="yzm" class="yzm"><br />
        请输入验证码：<img src="{{ URL('captcha/1') }}" id="imgyzm"><br />
        <input type="text" name="imgyzm" value="" class="imgyzm"><br />
		<input type="button" name="but" value="注册" class="but">
	</form>
</body>
</html>
<script type="text/javascript">
    $(function(){
        $("#imgyzm").on("click",function(){
            var timestamp = new Date().getTime();
            $(this).attr('src',$(this).attr('src') + '?' +timestamp );
        });
    	$(".button").on("click",function(){
    		var tel = $(".tel").val();
            var countdown=60;
    		$.ajax({
    			url:"./industrySMS.php",
    			data:{
    				tel:tel
    			},
    			type:"post",
    			success:function(msg){
    				if(msg){
                        alert("验证码发送成功");
                        var obj = $('.button');
                        settime(obj);
                        function settime(obj){
                            if(countdown == 0){
                                obj.attr('disabled',false);
                                obj.val("免费获取验证码");
                                countdown = 60;
                                return;
                            }else{
                                obj.attr('disabled',true);
                                obj.val("重新发送(" + countdown + ")");
                                countdown--;
                            }
                            setTimeout(function(){
                                settime(obj)
                            },1000)
                        }
    				}else{
    					alert("验证码发送失败");
    				}
    			}
    		});
    	});
        $(".but").on("click",function(){
            var tel = $(".tel").val();
            var username = $(".username").val();
            var password = $(".password").val();
            var yzm = $(".yzm").val();
            var ycyzm = $(".ycyzm").val();
            var token = $("._token").val();
            var imgyzm = $(".imgyzm").val();
            $.ajax({
                url:"/add_user",
                data:{
                    tel:tel,
                    username:username,
                    password:password,
                    yzm:yzm,
                    ycyzm:ycyzm,
                    imgyzm:imgyzm,
                    _token:token
                },
                type:"post",
                success:function(msg){
                    if(msg == 1){
                        alert("请输入正确的文字验证码");
                    }else if(msg == 2){
                        alert("请输入正确的短信验证码");
                    }else if(msg == 3){
                        alert("注册成功");location.href="list";
                    }else if(msg == 4){
                        alert("请输入正确的内容");
                    }
                }
            });
        });
    }); 
</script>