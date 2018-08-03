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
				<th><input type="checkbox" name="all_id" id="selectall"></th>
				<th>影厅号</th>
				<th>影厅名称</th>
				<th>影厅座位数</th>
				<th>影厅损坏数</th>
				<th>影厅的类型</th>
				<th>影院名称</th>
				<th>影厅的的状态</th>
				<th>影厅的类型</th>
				<th>影厅售卖数</th>
				<th>影厅剩余数</th>
			</tr>
		</thead>
		<tbody id="tbody">
			@foreach ($data as $value)
			<tr>
				<td><input type="checkbox" name="del_id[]" class="ace" value="<?=$value->house_id ?>"></td>
				<td>{{$value->house_id}}</td>
				<td>{{$value->house_name}}</td> 
				<td>{{$value->house_set}}</td>
				<td>{{$value->house_bad_set}}</td>
				<td>{{$value->house_type}}</td>
				<td>{{$value->cinema_id}}</td>
				<td>{{$value->house_status}}</td>
				<td>{{$value->sale_num}}</td>
				<td>{{$value->remainder}}</td>
				<td>
					<a href=""class="btn btn-default btn-xs black" ><i class="fa fa-trash-o"></i>删除</a>
					<a href="" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> 编辑</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $data->links() }}
</div>
@include('public_blade.footer')