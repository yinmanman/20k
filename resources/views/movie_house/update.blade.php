@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		修改影院信息
	</div>
	<form action="{{url('movie_house_update')}}" method="post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<table class="table table-hover table-striped table-bordered table-condensed">
			@foreach($data as $k=>$v)
			<input type="hidden" name="house_id" value="{{ $v->house_id }}">
			<tr>
				<td>影厅名</td>
				<td><input type="text" name="house_name" value="{{ $v->house_name }}"></td>
			</tr>
			<tr>
				<td>座位数</td>
				<td><input type="text" name="house_set" value="{{ $v->house_set }}"></td>
			</tr>
			<tr>
				<td>损坏座位号</td>
				<td><input type="text" name="house_bad_set" value="{{ $v->house_bad_set }}"></td>
			</tr>
			<tr>
				<td>影厅类型</td>
				<td>
					<input type="radio" name="house_type" value="0" 
					<?php if($v->house_type == 0){echo 'checked';}?>
					>3D
					<input type="radio" name="house_type" value="1"
					<?php if($v->house_type == 1){echo 'checked';}?>
					>2D
				</td>
			</tr>
			<tr>
				<td>影院ID</td>
				<td><input type="text" name="cinema_id" value="{{ $v->cinema_id }}"></td>
			</tr>
			<tr>
				<td>影厅状态</td>
				<td>
					<input type="radio" name="house_status" value="0"
					<?php if($v->house_status == 0){echo 'checked';}?>
					>播放电影
					<input type="radio" name="house_status" value="1"
					<?php if($v->house_status == 1){echo 'checked';}?>
					>候场
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="提交">
				</td>
			</tr>
			@endforeach
		</table>
	</form>
	
</div>
@include('public_blade.footer')