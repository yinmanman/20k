@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		文章管理
	</div>
	<table class="table table-hover table-striped table-bordered table-condensed">
		<button class="btn btn-azure" id="more_del">批量删除</button> |
		<a class="btn btn-azure" id="add" href="addNews">添加</a>
		<thead>
			<tr>
			<td>house_id</td>
			<td>house_name</td>
			<td>house_set</td>
			<td>house_bad_set</td>
			<td>house_type</td>
			<td>cinema_id</td>
			<td>house_status</td>
			<td>sale_num</td>
			<td>remainder</td>
			<td>操作</td>
		</tr>
		</thead>
		<tbody id="tbody">
			@foreach ($data as $k => $v)
            <tr>
                <td>{{ $v->house_id }}</td>
				<td>{{ $v->house_name }}</td>
				<td>{{ $v->house_set }}</td>
				<td>{{ $v->house_bad_set }}</td>
				<td>{{ $v->house_type }}</td>
				<td>{{ $v->cinema_id }}</td>
				<td>{{ $v->house_status }}</td>
				<td>{{ $v->sale_num }}</td>
				<td>{{ $v->remainder }}</td>
                <td>
                    <a href="deletes?id=<?= $v->house_id ?>">删除</a>
                    <a href="updates?id=<?= $v->house_id ?>">修改</a>
                </td>
            </tr>
        @endforeach
		</tbody>
	</table>
	{{ $data->links() }}
</div>
@include('public_blade.footer')
