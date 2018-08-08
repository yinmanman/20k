@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		影片列表
	</div>
	<table class="table table-hover table-striped table-bordered table-condensed">
		<button class="btn btn-azure" id="All">全选/全不选</button> |
		<a class="btn btn-azure" id="add" href="movieAdd">添加</a>
		<thead>
			<tr>
				<th></th>
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
        <td><input type="checkbox" name="del" class="ace" value="<?=$value->film_id ?>"></td>
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
            <a href="delMovie?id=<?php echo $value->film_id ?>" class="btn btn-default btn-xs black" id="v  "><i class="fa fa-trash-o"></i>删除</a>
            <a href="movieUpdate?id=<?php echo $value->film_id ?>" class="btn btn-default btn-xs purple" ><i class="fa fa-edit"></i> 编辑</a>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    {{ $data->links() }}
    </div>
@include('public_blade.footer')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //全选不全选
        var  i=0;
        $(function(){
            $("#All").click(function (){
                $("input[name='del']").prop("checked","checked");
                //这个地方只能用prop实现多次点击切换全选和全不选的效果，用attr的话不会多次实现。
                // 因为attr不会记录当前checkbox的选中状态，所以这个地方只能使用prop
                if(i==1){
                    $("input[name='del']").prop("checked",false);
                }
                i++;
                if(i>1){
                    i=0;
                }
            });
        });
        var arr = [];
        var token = $("#token").val();
        var str = '';
        $("#more_del").on("click",function(){
            $(".check").each(function(){
                if(this.checked == true){
                    arr.push($(this).val());
                }
            });
            $.ajax({
                url:"{{URL('delMovie')}}",
                data:{id : arr, _token : token},
                dataType:'json',
                type:"post",
                success:function(){
                    
                }
            });
        });
    });
</script>