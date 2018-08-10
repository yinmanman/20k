<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>在线选座</title>
	<style>
		.front{width: 300px;margin: 5px 32px 45px 32px;background-color: #f0f0f0; color: #666;text-align: center;padding: 3px;border-radius: 5px;} 
		.booking-details {float: right;position: relative;width:200px;height: 450px; } 
		.booking-details h3 {margin: 5px 5px 0 0;font-size: 16px;} 
		.booking-details p{line-height:26px; font-size:16px; color:#999} 
		.booking-details p span{color:#666} 
		div.seatCharts-cell {color: #182C4E;height: 25px;width: 25px;line-height: 25px;margin: 3px;float: left;text-align: center;outline: none;font-size: 13px;} 
		div.seatCharts-seat {color: #fff;cursor: pointer;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius: 5px;} 
		div.seatCharts-row {height: 35px;} 
		div.seatCharts-seat.available {background-color: #B9DEA0;} 
		div.seatCharts-seat.focused {background-color: #76B474;border: none;} 
		div.seatCharts-seat.selected {background-color: #E6CAC4;} 
		div.seatCharts-seat.unavailable {background-color: #472B34;cursor: not-allowed;} 
		div.seatCharts-container {border-right: 1px dotted #adadad;width: 400px;padding: 20px;float: left;} 
		div.seatCharts-legend {padding-left: 0px;position: absolute;bottom: 16px;} 
		ul.seatCharts-legendList {padding-left: 0px;} 
		.seatCharts-legendItem{float:left; width:90px;margin-top: 10px;line-height: 2;} 
		span.seatCharts-legendDescription {margin-left: 5px;line-height: 30px;} 
		.checkout-button {display: block;width:80px; height:24px; line-height:20px;margin: 10px auto;border:1px solid #999;font-size: 14px; cursor:pointer} 
		#selected-seats {max-height: 150px;overflow-y: auto;overflow-x: none;width: 200px;} 
		#selected-seats li{float:left; width:72px; height:26px; line-height:26px; border:1px solid #d3d3d3; background:#f7f7f7; margin:6px; font-size:14px; font-weight:bold; text-align:center} 
		.zw{display: inline-block;width: 80px;background-color: green;height: 40px;margin: 10px;text-align: center;line-height: 40px;}
		
	</style>
</head>
<body>
	<div class="demo"> 
		<input type="hidden" name="film_id" id="film_id" value="{{$data->film_id}}">
		<input type="hidden" name="house_id" id="house_id" value="{{$info->house_id}}">
		<input type="hidden" name="dq_id" id="dq_id" value="{{$arr->id}}">
		<input type="hidden" name="" class="jg" value="{{$data->cost_price}}">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" class="_token">
       	<div id="seat-map"> 
        	<div class="front">屏幕</div>
        	<?php 
        		for ($i=1; $i<=5 ; $i++) { 
        			for ($j=1; $j<=5 ; $j++) { 
        	?>
        	<a id="<?php echo $i."_".$j?>" class="zw"
        	<?php
        		foreach(explode(",", $arr->sale_seat) as $k=>$v){
        			if(substr($v,5) == $i."_".$j){
        				echo "style='background-color:yellow' status='2'";
        			}
        		}
        	?>
        	><?php echo $j;?></a>
        	<?php
        			}
        			echo "<br>";
        		}
        	?>                  
    	</div> 
	    <div class="booking-details"> 
	        <p>影片：<span class="movie_name">{{$data->film_name}}</span></p> 
	        <p>时间：<span class="start_time"><?php echo date('m月d日') ?>{{$arr->movie_start}}</span></p> 
	        <p>座位：</p> 
	        <ul id="selected-seats" class="seat">
	        	
	        </ul> 
	        <p>票数：<span id="counter">0</span></p> 
	        <p>总计：<b>￥<span id="total">0</span></b></p> 
	                     
	        <button class="checkout-button">确定购买</button> 
	                     
	        <div id="legend"></div> 
	    </div> 
	</div> 
</body>
</html>
<script type="text/javascript" src="http://www.20k.com/js/jquery-1.11.2.min.js"></script> 
<script type="text/javascript" src="http://www.20k.com/js/jquery.seat-charts.min.js"></script>
<script>
	$(function(){
		$(".zw").on("click",function(){
			$(this).each(function(){
				var status = $(this).attr("status");
				if(status == 1){	// 已选
					$(this).removeAttr('status');
					$(this).css("background-color",'green');
					var id = $(this).attr('id');
					$("#cart-"+id).remove();
					$("#counter").html(parseInt($("#counter").html())-1);
					var jg = parseInt($(".jg").val());
					var a = $("#total").html(parseInt($("#total").html())-jg);
				}else if(status == 2){	// 已售出
					alert('已售出');
					$(this).removeAttr('click');
				}else{	// 可选
					$(this).attr("status",'1');
					$(this).css("background-color",'blue');
					var id = $(this).attr('id');
					var cc = id.split('_');
					$(".seat").append("<li id='cart-"+id+"'>"+cc[0]+"排"+cc[1]+"座"+"</li>");
					$("#counter").html(parseInt($("#counter").html())+1);
					var jg = parseInt($(".jg").val());
					var a = $("#total").html(parseInt($("#total").html())+jg);
				}
			});
		});
	});

	var seat = [];
	$(".checkout-button").on('click',function(){
		$(".seat li").each(function(){
			seat.push($(this).attr('id'));
		});
		if(seat.length < 1){
			alert("请先选座位");
		}else{
			var user_id = 1;
			var dq_id = $("#dq_id").val();
			var film_id = $("#film_id").val();
			var house_id = $("#film_id").val();
			var token = $("._token").val();
			var money_num = $("#total").html();
			var start_time = $(".start_time").html();
			$.ajax({
	            url:"add_cost",
	            data:{
	            	dq_id:dq_id,
	            	user_id:user_id,
	            	film_id:film_id,
	            	house_id:house_id,
	                seat:seat,
	                money_num:money_num,
	                start_time:start_time,
	                _token:token
	            },
	            type:"post",
	            success:function(msg){
	                if(msg == 1){
	                    alert("购买成功");
	                    location.href="list";
	                }
	            }
	        });
	    }
	});
</script>