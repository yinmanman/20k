@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		添加影院信息
	</div>
	<form action="{{url('movie_house_add')}}" method="post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<table class="table table-hover table-striped table-bordered table-condensed">
			<tr>
				<td>影厅名</td>
				<td><input type="text" name="house_name"></td>
			</tr>
			<tr>
				<td>座位数</td>
				<td><input type="text" name="house_set"></td>
			</tr>
			<tr>
				<td>损坏座位号</td>
				<td><input type="text" name="house_bad_set"></td>
			</tr>
			<tr>
				<td>影厅类型</td>
				<td>
					<input type="radio" name="house_type" value="0">3D
					<input type="radio" name="house_type" value="1">2D
				</td>
			</tr>
			<tr>
				<td>影院ID</td>
				<td><input type="text" name="cinema_id"></td>
			</tr>
			<tr>
				<td>影厅状态</td>
				<td>
					<input type="radio" name="house_status" value="0">播放电影
					<input type="radio" name="house_status" value="1">候场
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