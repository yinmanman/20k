<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>时间场次安排</title>
	<link href="http://www.20k.com/css/time.css" rel="stylesheet" type="text/css">
	<!--可无视-->
	<link href="http://www.20k.com/css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div align="right">
		<a href="">登录</a>
		<a href="">注册</a>
	</div>
	<div class="head-wrap" data-spm="header">
		<div class="head-content center-wrap">
			<h1 class="logo">
		        <a target="_top" href="https://dianying.taobao.com/?n_s=new"></a>
		    </h1>
			<div class="cityWrap M-cityWrap">
			    	<a id="cityName" class="cityName" href="javascript:"><span class="name" data-id="110100">北京</span><s class="tri"></s></a>
				<input id="H_CityId" value="310100" type="hidden">
				<input id="H_CityName" value="上海" type="hidden">
			    <div class="cityList ">
				
				<div class="cityShade"></div>
			        </div>
			    </div>
	    <div class="nav-wrap">
	    	<ul class="nav">
				<li class="J_NavItem ">
                	<a href="http://www.20k.com/list" target="_top" id="shouye">首页</a>
                </li>
                <li class="J_NavItem  current ">
                	<a href="#" target="_top" id="yingpian">影片</a>
                </li>
				 <li class="J_NavItem ">
                	<a href="https://dianying.taobao.com/cinemaList.htm?n_s=new" target="_top">影院</a>
                </li>
            </ul>
	    </div>
	    <div class="entrance-wrap">
	    	<ul class="entrance">
	    		<li class="entrance-item">
	    			<a class="phone  " href="https://www.taobao.com/market/dianying/xsdxs.php?n_s=new" target="_blank">手机购买</a>
	    		</li>
	    		<li class="entrance-item">
					<a class="service" href="javascript:" onclick="window.open('//service.taobao.com/support/minerva/beta_robot_main.htm?sourceId=1305094727','newwindow','height=500,width=800,top=100px,left=100px,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no')" title="服咨询" data-spm-anchor-id="a1z21.3046609.rn.6">客服咨询</a>
	    		</li>
	    	</ul>
	    </div>
	</div>
</div>
	<div class="detail-wrap">
		@foreach ($row as $k => $v)
		<input type="hidden" name="id" value="{{$v->film_id}}" id="id">
		<div class="center-wrap">
			<h3 class="cont-title">{{ $v->film_name }} 
				<i>（{{ $v->enname }}）</i>  <em class="score">{{ $v->score }}</em>
			</h3>
			<div class="cont-pic">
				<img with="230" heigh="300" src="http://www.20k.com/{{ $v->poster }}" alt="">
			</div>
			<ul class="cont-info">
								<li>导演：{{ $v->director }}</li>				
								<li>主演：{{ $v->actor }}</li>				
								<li>类型：{{ $v->category }}</li>				
								<li>制片国家/地区：{{ $v->area }}</li>				
								<li>片长：{{ $v->time }}</li>				
								<li class="J_shrink shrink">剧情介绍：<a class="shrink-btn" href="javascript:;">展开&gt;&gt;</a></li>
			</ul>
			<div class="cont-time">上映时间：{{ $v->showtime }}</div>
			<div class="cont-view">
				<a href="javascript:;" data-showid="233674" data-type="image" class="float-layer-hook"><img src="https://img.alicdn.com/bao/uploaded/i3/TB1IU3gnLuSBuNkHFqDXXXfhVXa_.jpg_160x160.jpg" alt=""><span>20</span></a>
				<a href="javascript:;" data-showid="233674" data-type="video" class="float-layer-hook"><img src="https://img.alicdn.com/bao/uploaded/TB2Dz2XG1GSBuNjSspbXXciipXa_!!6000000002516-0-tbvideo.jpg_100x100.jpg" alt="" width="160" height="110"><s></s><span>10</span></a>
			</div>
		</div>
		@endforeach
	</div>

	<div class="title-wrap">
		<div class="center-wrap">
			<h3>选座购票</h3>
		</div>
	</div>

	<div class="schedule-wrap J_scheduleWrap schedule-loaded" data-spm="w2" data-ajax="/showDetailSchedule.htm" data-param="showId=233674&amp;ts=1533642904644&amp;n_s=new" data-spm-anchor-id="a1z21.6646385.0.w2.2b2449f2ZzDnX0">
	
	<div class="area">
		<input type="hidden" name="_token" value="<?php echo csrf_token();?>" id="token">
		<ul class="filter-select">
			<li>
				<label>选择区域</label>
				<span class="sel" id="all_area">
					<a class="red" href="javascript:;" data-param="showId=233674&amp;n_s=new">全部区域</a>
				</span>								
			</li>
			<li>
				<label>选择影城</label>
				<span class="sel"  id="all_cinema">
				</span>	
			</li>
			<li>
				<label>选择时间</label>
				<span class="sel" id="all_time">					
                </span>
			</li>
		</ul>
		<!-- <p>
			<strong>选择区域：</strong>&nbsp;&nbsp;
			<span id="all_area" class="sel">
				<a class="red">全部区域</a>
				<a></a>
			</span>	
		</p>
		
		<p>
			<strong>选择影院：</strong>&nbsp;&nbsp;
			<span id="all_cinema" class="sel1">
			
			</span>	
		</p> -->
	</div>

	<div class="center-wrap">
		<table class="hall-table">
			<thead>
				<tr>
					<th class="hall-time">放映时间</th>
				    <th class="hall-type">语言版本</th>
				    <th class="hall-name">放映厅</th>
				    <th class="hall-flow">座位情况</th>
				    <th class="hall-price">现价/影院价（元）</th>
				    <th class="hall-buy">选座购票</th>
				</tr>
			</thead>
			<tbody id="all_list">
				
			</tbody>	
		</table>
	</div>
	@include('home.footer')		
</body>
</html>
<script src="http://www.20k.com/js/jquery-1.11.2.min.js"></script>
<script src="http://www.20k.com/js/jquery.js"></script>
<script src="http://www.20k.com/js/city-picker.data.js"></script>
<script src="http://www.20k.com/js/city-picker.js"></script>
<script src="http://www.20k.com/js/main.js"></script>
<script>
	$('#yingpian').click(function(){
		$('#yingpian').css('border-bottom','2px #eb002a solid');
		$('#shouye').css('border-bottom','1px solid white');
	});
	$('#shouye').click(function(){
		$('#shouye').css('border-bottom','2px #eb002a solid');
		$('#yingpian').css('border-bottom','1px solid white');
	});


	$(function(){
		//init
		token = $('#token').val();
		id = $('#id').val();
		//alert(token);
		myajax(0,0,0);

		$("#all_area").data("myid",0);
		$("#all_cinema").data("myid",0);

		$(document).on("click",".sel>a",function(){
			
			$(this).parent().find("a").removeClass("red");
			$(this).addClass("red");
				
			var myid = $(this).attr("myid");
			$(this).parent().data("myid",myid);

			var all_area  = $("#all_area").data("myid");
			var all_cinema = $("#all_cinema").data("myid");
			var all_time = $("#all_time").data("myid");

			myajax(all_area,all_cinema,all_time);
		});
	});

	function myajax(area_id,cinema_id,time_id){

		$.ajax({
			url:"http://www.20k.com/search?area_id="+area_id+"&_token="+token+"&id="+id+"&cinema_id="+cinema_id+"&time_id="+time_id,
			type:"get",
			data:'',
			success:function(obj){
				//console.log(obj.list);
				$('#all_area').html(obj.area);
				$('#all_cinema').html(obj.cinema);
				$('#all_time').html(obj.time);
				$('#all_list').html(obj.list);
			}
		});
	}

</script>