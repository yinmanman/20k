@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		修改地区信息
	</div>
	<form action="{{url('area_update')}}" method="post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<table class="table table-hover table-striped table-bordered table-condensed">
			<?php
				foreach($data as $k=>$v){
			?>
			<input type="hidden" name="area_id" value="<?php echo $v['area_id']?>">
			<tr>
				<td>地区名</td>
				<td><input type="text" name="area_name" value="<?php echo $v['area_name']?>"></td>
			</tr>
			<tr>
				<td>上一级</td>
				<td>
					<select name="pid">
						<option value="0">顶级分类</option>
						<?php
							foreach($arr as $key => $val){
						?>
							<option value="<?=$val['area_id']?>" 
								<?php
									if($v['pid'] == $val['area_id']){
										echo "selected";
									}
								?>
								>
								<?php
									for($i=0;$i<$val['level'];$i++){
										echo "&nbsp;&nbsp;&nbsp;&nbsp;";
									}
									echo $val['area_name']
								?>
							</option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="提交">
				</td>
			</tr>
		</table>
	</form>
	
</div>
@include('public_blade.footer')
