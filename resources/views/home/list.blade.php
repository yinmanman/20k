<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>影片列表</title>
	<link href="http://www.20k.com/css/time.css" rel="stylesheet" type="text/css">
	<link href="http://www.20k.com/css/list.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php
		if(!empty(Session::get('user_id'))){
			echo "<div align='right'>欢迎&nbsp;&nbsp;".Session::get('username')."</div>";
		}else{
			echo "<div align='right'><a href='login'>登录</a><a href='register'>注册</a></div>";
		}
	?>
	
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
					<div class="cityBox" data-spm="city">
						<div class="cityTitle">
							热门:
		                    <a href="/showDetail.htm?spm=a1z21.3046609.w2.5.32c0112aTpctUX&amp;showId=233674&amp;n_s=new&amp;city=110100" data-id="110100" class="ignore-city current">北京</a>
							<a href="/showDetail.htm?spm=a1z21.3046609.w2.5.32c0112aTpctUX&amp;showId=233674&amp;n_s=new&amp;city=310100" data-id="310100" class="ignore-city">上海</a>
		                    <a href="/showDetail.htm?spm=a1z21.3046609.w2.5.32c0112aTpctUX&amp;showId=233674&amp;n_s=new&amp;city=330100" data-id="330100" class="ignore-city">杭州</a>
		                    <a href="/showDetail.htm?spm=a1z21.3046609.w2.5.32c0112aTpctUX&amp;showId=233674&amp;n_s=new&amp;city=440100" data-id="440100" class="ignore-city">广州</a>
		                    <a href="/showDetail.htm?spm=a1z21.3046609.w2.5.32c0112aTpctUX&amp;showId=233674&amp;n_s=new&amp;city=440300" data-id="440300" class="ignore-city">深圳</a>
		                    <a href="/showDetail.htm?spm=a1z21.3046609.w2.5.32c0112aTpctUX&amp;showId=233674&amp;n_s=new&amp;city=500100" data-id="500100" class="ignore-city">重庆</a>
		                    <a href="/showDetail.htm?spm=a1z21.3046609.w2.5.32c0112aTpctUX&amp;showId=233674&amp;n_s=new&amp;city=510100" data-id="510100" class="ignore-city">成都</a>
							<a href="/showDetail.htm?spm=a1z21.3046609.w2.5.32c0112aTpctUX&amp;showId=233674&amp;n_s=new&amp;city=320100" data-id="320100" class="ignore-city">南京</a>
							<a href="/showDetail.htm?spm=a1z21.3046609.w2.5.32c0112aTpctUX&amp;showId=233674&amp;n_s=new&amp;city=320500" data-id="320500" class="ignore-city">苏州</a>
							<a href="/showDetail.htm?spm=a1z21.3046609.w2.5.32c0112aTpctUX&amp;showId=233674&amp;n_s=new&amp;city=420100" data-id="420100" class="ignore-city">武汉</a>
							<a href="/showDetail.htm?spm=a1z21.3046609.w2.5.32c0112aTpctUX&amp;showId=233674&amp;n_s=new&amp;city=610100" data-id="610100" class="ignore-city">西安</a>
						</div>
						<div class="citySearch">
							<label>搜索城市:</label><input type="text"><a href="javascript:" class="J_citySearch_btn">&nbsp;确定&nbsp;</a>
						</div>
					</div>
					<div class="cityShade"></div>
		        </div>
		    </div>
		    <div class="nav-wrap">
		    	<ul class="nav">
					<li class="J_NavItem  current ">
	                	<a href="http://www.20k.com/list" target="_top" id="shouye">首页</a>
	                </li>
	                <li class="J_NavItem">
	                	<a href="#" target="_top" id="yingpian">影片</a>
	                </li>
					 <li class="J_NavItem ">
	                	<a href="#" target="_top">影院</a>
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

	<div id="M-banner" class="banner-wrap">
        <ul class="banner-content">
        	<div >
        		<li class="banner-item">
        			<img src="http://www.20k.com/uploads/TB1GRxRfZLJ8KJjy0FnXXcFDpXa-1920-360.jpg" alt="" >
        		</li>
        	</div>
        </ul>
        <div class="banner-scrollable">
        	<li class="current">
        		<a href="javascript:void(0);">1</a>
        	</li>
        </div>
        <a class="M-BannerLeft bannerControl" href="javascript:;" style="display: none;"></a>
        <a class="M-BannerRight bannerControl" href="javascript:;" style="display: none;"></a>
    </div>


    <div class="center-wrap" data-spm="w2">
		<div class="tab-control tab-movie-tit">
			<a class="tab-control-item current" id="hot">正在热映(88)</a>
			<a class="tab-control-item" id="wait">即将上映(445)</a>
	        <a class="more" href="https://dianying.taobao.com/showList.htm?n_s=new">查看全部&nbsp;&gt;</a>
		</div>
		<div class="tab-content">
		<!-- 正在热映 -->
			<div class="tab-movie-list" style="display: block;" id="hotlist">
				@foreach ($data as $k => $v)
	    	    <div class="movie-card-wrap">
    			    <a href="https://dianying.taobao.com/showDetail.htm?showId=233674&amp;n_s=new&amp;source=current" class="movie-card">
	                    <div class="movie-card-tag">
	                    	<i class="t-203"></i>
	                    </div>
	                    <div class="movie-card-poster">
							<img data-src="http://www.20k.com/{{ $v->poster }}" src="http://www.20k.com/{{ $v->poster }}" width="160" height="224">
	                    </div>
	                    <div class="movie-card-name">
	                        <span class="bt-l">{{ $v->film_name }}</span>
	                        <span class="bt-r">{{ $v->score }}</span>
	                    </div>
	                </a>
                	<a href="http://www.20k.com/time?id={{ $v->film_id }}" class="movie-card-buy">选座购票</a>
    			</div>
    			@endforeach
			</div>

		<!-- 即将热映 -->
		<div class="tab-movie-list" id="waitlist" style="">
			@foreach ($list as $k => $v)
	    	<div class="movie-card-wrap">
                <a href="https://dianying.taobao.com/showDetail.htm?showId=1275870&amp;n_s=new&amp;source=soon" class="movie-card">
                    <div class="movie-card-tag"><i class="t-"></i></div>
                    <div class="movie-card-poster">
						                        <img src="http://www.20k.com/{{ $v->poster }}" width="160" height="224">
                    </div>
                    <div class="movie-card-name">
                        <span class="bt-l">{{ $v->film_name }}</span>
                        <span class="bt-r"></span>
                    </div>
                    
                </a>
    			<a href="https://dianying.taobao.com/showDetail.htm?showId=1275870&amp;n_s=new&amp;source=soon" class="movie-card-soon">上映时间2018-08-04</a> 
    	 	</div>
    	 	@endforeach
    	  
    	</div>

	</div>
</div>
</body>
</html>

<script src="http://www.20k.com/js/jquery-1.11.2.min.js"></script>
<script>
	$('#hot').click(function(){
		//$('#hotlist').slideToggle();
		$('#hotlist').css('display','block');
		$('#waitlist').css('display','none');
		$('#hot').css('border-bottom','2px #eb002a solid');
		$('#wait').css('border-bottom','1px solid white');
	});
	$('#wait').click(function(){
		$('#waitlist').css('display','block');
		$('#hotlist').css('display','none');
		$('#wait').css('color','#3e3e3e');
		$('#wait').css('border-bottom','2px #eb002a solid');
		$('#hot').css('color',' ');
		$('#hot').css('border-bottom','1px solid white');
	});
	$('#yingpian').click(function(){
		$('#yingpian').css('border-bottom','2px #eb002a solid');
		$('#shouye').css('border-bottom','1px solid white');
	});
	$('#shouye').click(function(){
		$('#shouye').css('border-bottom','2px #eb002a solid');
		$('#yingpian').css('border-bottom','1px solid white');
	});
</script>