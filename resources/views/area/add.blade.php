@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		添加地区信息
	</div>
	<form action="{{url('area_add')}}" method="post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<table class="table table-hover table-striped table-bordered table-condensed">
			<tr>
				<td>地区名</td>
				<td><input type="text" name="area_name"></td>
			</tr>
			<tr>
				<td>上一级</td>
				<td>
					<select name="pid">
						<option value="0">顶级分类</option>
						<?php
							foreach($arr as $k => $v){
						?>
							<option value="<?=$v['area_id']?>">
								<?php
									for($i=0;$i<$v['level'];$i++){
										echo "&nbsp;&nbsp;&nbsp;&nbsp;";
									}
									echo $v['area_name']
								?>
							</option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="提交">
				</td>
			</tr>
		</table>
	</form>
	
</div>
@include('public_blade.footer')
