@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		影院管理
	</div>
	<table class="table table-hover table-striped table-bordered table-condensed">
		<button class="btn btn-azure" id="more_del">批量删除</button> |
		<a class="btn btn-azure" id="add" href="addCinema">添加</a>
		<thead>
		<tr>
			<td>影院ID</td>
			<td>影院名称</td>
			<td>所在地区</td>
			<td>影院图片</td>
			<td>影院地址</td>
			<td>影院电话</td>
			<td>营业时间</td>
			<td>操作</td>
		</tr>
		</thead>
		<tbody id="tbody">
			@foreach ($c as $k => $v)
				
            <tr>
                <td>{{ $v->cinema_id }}</td>
				<td>{{ $v->cinema_name }}</td>
				
				<td>
					@foreach ($a as $k1 => $v1)
					<?php if($v->area_id == $v1->area_id){echo $v1->area_name;}?>
					@endforeach	
				</td>
				
				<td>{{ $v->cinema_img }}</td>
				<td>{{ $v->cinema_site }}</td>
				<td>{{ $v->cinema_tel }}</td>
				<td>{{ $v->cinema_open_hours }}</td>
                <td>
                    <a href="deletes?id=<?= $v->cinema_id ?>">删除</a>
                    <a href="updates?id=<?= $v->cinema_id ?>">修改</a>
                </td>
            </tr>
            
        @endforeach
		</tbody>
	</table>
	{{ $c->links() }}
</div>
@include('public_blade.footer')
