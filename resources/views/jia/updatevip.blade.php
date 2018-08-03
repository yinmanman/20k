@include('public_blade.top')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
	<form action="updatevip" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type="hidden" name="user_id" value="{{$info->user_id}}">
		用户名称:<input type="text" name="username" value="{{$info->username}}"><br />
		用户昵称:<input type="text" name="nick_name" value="{{$info->nick_name}}"><br />

		是否设置为vip用户:不是<input type="radio" name="is_vip" value="0" <?php
		if($info->is_vip==0){
			echo 'checked';
		}
		?>>是<input type="radio" name="is_vip" value="1" <?php
		if($info->is_vip==1){
			echo 'checked';
		}
		?>><br />
		会员等级:普通会员<input type="radio" name="vip_level" value="0" <?php
		if($info->vip_level==0){
			echo 'checked';
		}
		?>>vip会员<input type="radio" name="vip_level" value="1" <?php
		if($info->vip_level==1){
			echo 'checked';
		}
		?>><br />
		折扣率:<input type="text" name="discount rate" value="{{$info->discount_rate}}"><span style="font-size: 12px;color: red;">(如:打九折=0.9)</span><br />

		<input type="submit" name="submit" value="提交">
	</form>
	
</body>
</html>
@include('public_blade.footer')

