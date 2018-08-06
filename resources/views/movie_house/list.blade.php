@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		影院信息
	</div>
	<input id="token" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<table class="table table-hover table-striped table-bordered table-condensed">
		<button class="btn btn-azure" id="more_del">批量删除</button> |
		<a class="btn btn-azure" id="add" href="{{URL('movie_house_add')}}">添加</a>
		<thead>
			<tr>
			<td></td>
			<td>影厅ID</td>
			<td>影厅名</td>
			<td>座位数</td>
			<td>损坏座位号</td>
			<td>影厅类型</td>
			<td>影院ID</td>
			<td>影厅状态</td>
			<td>售出票数</td>
			<td>剩余票数</td>
			<td>操作</td>
		</tr>
		</thead>
		<tbody id="tbody">
			@foreach ($data as $k => $v)
            <tr>
            	<td><input class="check" type="checkbox" name=id[] value="{{ $v->house_id }}"></td>
                <td>{{ $v->house_id }}</td>
				<td>{{ $v->house_name }}</td>
				<td>{{ $v->house_set }}</td>
				<td>{{ $v->house_bad_set }}</td>
				<td id="house_type">
					<?= $v->house_type ? '2D' : '3D'?>
				</td>
				<td>{{ $v->cinema_id }}</td>
				<td id="house_status">
					<?= $v->house_status ? '候场' : '播放电影'?>
				</td>
				<td>{{ $v->sale_num }}</td>
				<td>{{ $v->remainder }}</td>
                <td>
                    <a href="movie_house_update?id=<?= $v->house_id ?>">修改</a>
                </td>
            </tr>
        @endforeach
		</tbody>
		<tr>
        	<td><input type="checkbox" id="checkbox">全选</td>
        </tr>
	</table>
	{{ $data->links() }}
</div>
@include('public_blade.footer')
<script type="text/javascript">
	$(function(){
	    // 全选或者全不选
		$("#checkbox").click(function(){
			if(this.checked == true){
				$(".check").each(function(){
					this.checked = true;
				});
			}else{
				$(".check").each(function(){
					this.checked = false;
				});
			}
		});
		var arr = [];
		var token = $("#token").val();
		var str = '';
	    $("#more_del").on("click",function(){
	    	$(".check").each(function() {   
				if(this.checked == true){
					arr.push($(this).val());
				}
			});
			$.ajax({
				url:"{{URL('movie_house_delete')}}",
				data:{
					id : arr,
					_token : token
				},
				dataType:'json',
				type:"post",
				success:function(msg){
					$.each(msg.data, function(index,callback){
						str += "<tr><td><input class='check' type='checkbox' name=id[] value='"+msg.data[index].house_id+"'></td><td>"+msg.data[index].house_id+"</td><td>"+msg.data[index].house_name+"</td><td>"+msg.data[index].house_set+"</td><td>"+msg.data[index].house_bad_set+"</td><td>"+msg.data[index].house_type+"</td><td>"+msg.data[index].cinema_id+"</td><td>"+msg.data[index].house_status+"</td><td>"+msg.data[index].sale_num+"</td><td>"+msg.data[index].remainder+"</td><td><a href='movie_house_update?id="+msg.data[index].house_id+"'>修改</a></td></tr>";
					});
					$("#tbody").html(str);
					if($('#house_type').html() == 0){
						$('#house_type').html('3D');
					}else{
						$('#house_type').html('2D');
					}
					if($('#house_status').html() == 0){
						$('#house_status').html('播放电影');
					}else{
						$('#house_status').html('候场');
					}
               	}
			});
	    });
	});
</script>
