@include('public_blade.top')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div class="header bg-darkorange">
		<h5>影厅放映表</h5><h3>(一天七场)</h3>
	</div>
	<table class="table table-hover table-striped table-bordered table-condensed">
    	<a class="btn btn-azure" id="add" href="house_setting?house_id={{$house_id}}&cinema_id={{$cinema_id}}">添加电影场次</a>
		<thead>
			<tr>
				<th>电影名称</th>
				<th>影厅ID</th>
				<th>电影开始时间</th>
				<th>电影散场时间</th>
				<th>下一场开始时间</th>
				<th>放映开始时间</th>
				<th>放映结束时间</th>
				<th>电影状态</th>

				<th></th>
			</tr>
		</thead>
		<tbody id="tbody">
			<?php 
				if ($movie_data->first()) {
					foreach ($movie_data as $value){
			 ?>
				<tr <?php if($value->status == 0){echo "style='color:red'";}?>>
					<td>{{$value->film_name}}</td>
					<td>{{$value->house_id}}</td>
					<td>{{$value->movie_start}}</td>
					<td>{{$value->movie_leave}}</td>
					<td>{{$value->next_movie_start}}</td>
					<td>{{$value->movie_dangqi_start}}</td>
					<td>{{$value->movie_dangqi_stop}}</td>
					<input type="hidden" value="{{$house_id}}">
					<input type="hidden" value="{{$value->id}}" id="hidden_id">
					<td><?php if($value->status == 1){echo "正常播放";}else{echo "取消播放";}?></td>
					<td>
						<p class="btn" ><i class="fa fa-edit"></i>编辑</p>
					</td>
				</tr>
			<?php 
					}
				}else{
					echo "<div class='alert alert-warning fade in'><button class='close' data-dismiss='alert'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>×</font></font></button><i class='fa-fw fa fa-warning'></i><strong><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>警告</font></font></strong><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'>囧 ~还没有排期，你可以通过添加电影场次 安排电影放映</font></font></div>";
				}
			 ?>
		</tbody>
	</table>
<script src="/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
	
	　　$("#tbody").on('click','.btn',function(){
	　　　var id = $(this).parent().prev().prev().val();
	　　　var house_id = $(this).parent().prev().prev().prev().val();
	　　　var status = $(this).parent().prev().html();
		  $.ajax({
		    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		    data: {"id":id,"status":status,"house_id":house_id},
		    url: 'edit_setting',
		    type: 'POST',
		    // dataType: 'json',
		    async : 'false',
		    success: function(data){
		    	console.log(data);
		      $('#tbody').html(data);
		    },
		    error:function(data){
		      console.log(data);
		    }
		  });
		
	　　});




	</script>
@include('public_blade.footer')