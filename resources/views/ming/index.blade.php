@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		影片列表
	</div>
	<table class="table table-hover table-striped table-bordered table-condensed">
		<button class="btn btn-azure" id="more_del">批量删除</button> |
		<a class="btn btn-azure" id="add" href="addNews">添加</a>
		<thead>
			<tr>
				<th><input type="checkbox" name="all_id" id="selectall"></th>
				<th>电影ID</th>
				<th>电影名称</th>
                <th>电影英文名称</th>
				<th>是否上映</th>
				<th>评分</th>
				<th>电影类型</th>
				<th>电影海报</th>
                <th>导演</th>
				<th>演员</th>
				<th>电影分类</th>
				<th>地区</th>
				<th>语言</th>
                <th>片长</th>
                <th>上映时间</th>
                <th>发行公司</th>
                <th>现价</th>
                <th>原价</th>
                <th>排序</th>
                <th>总场次</th>
                <th>是否排片</th>
			</tr>
		</thead>
		<tbody id="tbody">
			@foreach ($data as $value)
    <tr>
        <td><input type="checkbox" name="del_id[]" class="ace" value="<?=$value->film_id ?>"></td>
        <td>{{$value->film_id}}</td>
        <td>{{$value->film_name}}</td>
        <td>{{$value->enname}}</td>
        <td>{{$value->is_show}}</td>
        <td>{{$value->score}}</td>
        <td>{{$value->type}}</td>
        <td>{{$value->poster}}</td>
        <td>{{$value->director}}</td>
        <td>{{$value->actor}}</td>
        <td>{{$value->category}}</td>
        <td>{{$value->area}}</td>
        <td>{{$value->language}}</td>
        <td>{{$value->time}}</td>
        <td>{{$value->showtime}}</td>
        <td>{{$value->company}}</td>
        <td>{{$value->present_price}}</td>
        <td>{{$value->cost_price}}</td>
        <td>{{$value->sort}}</td>
        <td>{{$value->total_field}}</td>
        <td>{{$value->is_slice}}</td>
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