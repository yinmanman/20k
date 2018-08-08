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
		#selected-seats li {float:left; width:72px; height:26px; line-height:26px; border:1px solid #d3d3d3; background:#f7f7f7; margin:6px; font-size:14px; font-weight:bold; text-align:center} 
		.seat{
			display: inline-block; width:72px; height:26px;
		}
	</style>
</head>
<body>
	<div class="demo"> 
       	<div id="seat-map"> 
        	<div class="front">屏幕</div>
        	<?php
        		for($i=1;$i<7;$i++){
        			for($j=1;$j<=10;$j++){
        	?>
        	<span id="<?php echo $i."_".$j ?>" class="seat" status="1"><?php echo $j;?></span>
        	<?php
        			}
        			echo "<br>";
        		}
        	?>
    	</div> 
	    <div class="booking-details"> 
	        <p>影片：<span>星际穿越3D</span></p> 
	        <p>时间：<span>11月14日 21:00</span></p> 
	        <p>座位：</p> 
	        <ul id="selected-seats"></ul> 
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
		var $cart = $('#selected-seats'), //座位区 
	    	$counter = $('#counter'), //票数 
	    	$total = $('#total'); //总计金额 
		$(".seat").on("click",function(){
			var id = $(this).attr('id');
			var id_arr = id.split('_');
			var str = id_arr[0]+"排"+id_arr[1]+"座";
			$('<li>'+str+'</li>') 
	                    .attr('id', 'cart-item-'+id) 
	                    .data('seatId', id) 
	                    .appendTo($cart); 
		});
	});
</script>