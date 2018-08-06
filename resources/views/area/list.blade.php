@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		地区管理
	</div>
	<input id="token" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<table class="table table-hover table-striped table-bordered table-condensed">
		<button class="btn btn-azure" id="more_del">批量删除</button> |
		<a class="btn btn-azure" id="add" href="area_add">添加</a>
		<thead>
			<tr>
				<td></td>
				<td>地区ID</td>
				<td>地区名</td>
				<td>操作</td>
			</tr>
		</thead>
		<tbody id="tbody">
			<?php
				foreach($row['data'] as $k=>$v){
			?>
            <tr>
            	<td><input type="checkbox" class="check" name="id[]" value="<?php echo $v['area_id'] ?>"></td>
                <td><?php echo $v['area_id'] ?></td>
				<td>
					<?php
						for($i=0;$i<$v['level'];$i++){
							echo "&nbsp;&nbsp;&nbsp;&nbsp;";
						}
					?>
					<?php echo $v['area_name'] ?>
				</td>
                <td>
                    <a href="area_update?id=<?php echo $v['area_id'] ?>">修改</a>
                </td>
            </tr>
            <?php } ?>
		</tbody>
		<tr>
			<td><input type="checkbox" id="checkbox"> 全选 </td>
		</tr>
	</table>
	<?php
	echo $a;
	?>
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
		// 批删
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
				url:"{{URL('area_delete')}}",
				data:{
					id : arr,
					_token : token
				},
				dataType:'json',
				type:"post",
				success:function(msg){
					$.each(msg.data, function(index,callback){
						str += "<tr><td><input type='checkbox' class='check' name='id[]'' value='"+msg.data[index].area_id+"'></td><td>'"+msg.data[index].area_id+"'</td><td></td><td><a href='area_update?id="+msg.data[index].area_id+">修改</a></td></tr>";
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
					}*/
               	}
			});
	    });
	});
</script>
