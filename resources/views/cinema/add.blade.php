@include('public_blade.top')
<div class="well with-header  with-footer">
	<div class="header bg-darkorange">
		添加影院
	</div>
	
	<form action="">
		<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
		<input type="text" name="name">
		<input type="file" name="myfile">
		<input type="text" name="site">
		<input type="text" name="tel">
		<input type="text" name="open">
		<select>
			<option value=""></option>
		</select>
	</form>
</div>
@include('public_blade.footer')
