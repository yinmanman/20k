@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		修改影院信息
	</div>
	
	<form action="updatedo" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="<?php echo csrf_token();?>"><br><br>
		影院名称：<input type="text" name="cinema_name" value="{{ $res->cinema_name }}"><br><br>
		影院图片：<input type="file" name="myfile"><img src="http://www.20k.com/{{ $res->cinema_img }}" style="width:100px;"><br><br>
		<input type="hidden" name="file" value="{{ $res->cinema_img }}">
		影院地址：<input type="text" name="cinema_site" value="{{ $res->cinema_site }}"><br><br>
		影院电话：<input type="text" name="cinema_tel" value="{{ $res->cinema_tel }}"><br><br>
		影院开放时间：<input type="text" name="cinema_open_hours" value="{{ $res->cinema_open_hours }}"><br><br>
		影院所在区域：<select name="area_id">
			@foreach ($list as $k => $v)
			<option value="<?php echo $v['area_id']?>" <?php if($res->area_id == $v['area_id']){echo 'selected';}?>>
				<?php echo str_repeat('&nbsp',$v['class']*5);?>
				{{ $v['area_name'] }}	
			</option>
			@endforeach
		</select><br><br>
		<input type="hidden" name="id" value="{{ $res->cinema_id }}">
		<input type="submit" value="提交">

		<!-- echo str_repeat('&nbsp',$vo['class']*10); -->
	</form>
</div>
@include('public_blade.footer')
