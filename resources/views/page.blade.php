<h1>列表</h1>
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
<a href="javascript:void(0)" onclick="page(1)">首页</a>
<a href="javascript:void(0)" onclick="page(<?php echo $up?>)">上一页</a>
<a href="javascript:void(0)" onclick="page(<?php echo $down?>)">下一页</a>
<a href="javascript:void(0)" onclick="page(<?php echo $sum?>)">尾页</a>

<!-- @foreach($pp as $key=>$val)
@if($val == $page)
{{$val}}
@else
<a href="javascript:void(0)" onclick="page({{$val}})">{{$val}}</a>
@endif
@endforeach -->
