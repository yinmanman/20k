@include('public_blade.top')

	<div class="header bg-darkorange">
		<h5>影院影厅放映管理表</h5>
	</div>
	<table class="table table-hover table-striped table-bordered table-condensed">
		<thead>
			<tr>
				<th>影院ID</th>
				<th>影院名称</th>
				<th>影院照片</th>
				<th>影院地址</th>
				<th>影厅电话</th>
				<th>营业时间</th>
				<th>影院的热度</th>
			</tr>
		</thead>
		<tbody id="tbody">
			@foreach ($data as $value)
			<tr>
				<td>{{$value->cinema_id}}</td>
				<td><a href="cinema_num?cinema_id=<?=$value->cinema_id?>">{{$value->cinema_name}}</a></td>
				<td><img src="{{$value->cinema_img}}" style="width:50px;height: 30px;"></td>
				<td>{{$value->cinema_site}}</td>
				<td>{{$value->cinema_tel}}</td>
				<td>{{$value->cinema_open_hours}}</td>
				<td>{{$value->cinema_hot}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $data->links() }}
@include('public_blade.footer')