<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<link rel="stylesheet" href="http://127.0.0.1/ams/public/css/page.css">
<body>
	<div id="box">
		<h1>列表</h1>
		<p>
			<input type="text" name="keywords" >
			<button>搜索</button>
		</p>
		<table>
			<th>用户名</th>
			<th>邮箱</th>
			<th>昵称</th>
			<th>操作</th>

				@foreach($data as $key=>$val)

			<tr>
				<td>{{$val->username}}</td>
				<td>{{$val->mail}}</td>
				<td>{{$val->nickname}}</td>
				<td>
					<a href="delete?id=<?php echo $val->id?>">删除</a>
					<a href="update?id=<?php echo $val->id?>">修改</a>
				</td>
			</tr>

				@endforeach

		</table>
	
		{{$data->links()}}
	</div>
</body>
</html>
<script src="http://127.0.0.1/ams/public/js/jquery-1.11.2.min.js"></script>
<!-- <script>
	function page(page){
		$.ajax({
			type:'get',
			url:"page_pro",
			data:{
				page:page
			},
			success:function(msg){
				//alert(msg);
				if(msg){
					$("#box").html(msg);
				}
			}
		});
	}
</script> -->