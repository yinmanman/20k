<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>时间场次安排</title>
	<link href="http://www.20k.com/css/time.css" rel="stylesheet" type="text/css">
	<!--可无视-->
	<link href="http://www.20k.com/css/main.css" rel="stylesheet" type="text/css" />

	<style>
		.red{
			background:red;
		}

		.title-wrap {
		    width: 100%;
		}
		.center-wrap {
		    width: 990px;
		    min-width: 990px;
		    margin: 0 auto;
		    *zoom: 1;
		}

		.title-wrap h3{
		    display: inline-block;
		    height: 40px;
		    width: 100%;
		    line-height: 40px;
		    font-size: 20px;
		    border-bottom: 1px solid #e5e5e5;
		}

		.area{
			width:970px;
			background: #FFDDDC;
		}

		.filter-select {
		    padding-left: 90px;
		    background: #FFDDDC;
		    overflow: hidden;
		}
		.filter-select li {
		    position: relative;
		    line-height: 25px;
		    padding: 12px 60px 12px 0;
		    clear: both;
		    background: #FFF6F5;
		    height: auto;
		    *zoom: 1;
		}

		.filter-select label {
		    position: absolute;
		    width: 90px;
		    left: -90px;
		    *top: 10px;
		    text-align: center;
		    color: #797979;
		}
		.filter-select label {
		    display: inline-block;
		    height: 25px;
		    line-height: 25px;
		    float: left;
		    white-space: nowrap;
		    text-align: center;
		}

		.filter-select li .sel .sel1 {
		    width: 100%;
		    max-height: 50px;
		    _height: 50px;
		    overflow: hidden;
		}
	</style>

	<!--必要样式-->
	<!-- <link href="http://www.20k.com/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="http://www.20k.com/css/city-picker.css" rel="stylesheet" type="text/css" /> -->
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
				<span class="sel1"  id="all_cinema">
				</span>	
			</li>
			<li>
				<label>选择时间</label>
				<span class="select-tags">
					<a>8月10号</a>&nbsp;&nbsp;&nbsp;&nbsp;	
					<a>8月11号</a>						
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
			<tbody>
				<tr>
					<td class="hall-time">
						<em class="bold">09:30</em>
							 预计11:28散场 	
					</td>
					<td class="hall-type">
						国语 2D
					</td>
					<td class="hall-name">
						1号厅
					</td>					
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView rendered" data-scheduleid="552196054">
								<i class="icon-zoom"></i>
		    					<div class="view-wrap" style="height: 84px; display: none;">
		    					
		    					</div>
							</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552196054&amp;n_s=new">选座购票</a>
					</td>
				</tr>
										
				<tr class="even">
					<td class="hall-time">
							<em class="bold">10:10</em>
							 预计12:08散场 					
					</td>
					<td class="hall-type">
							国语 2D
					</td>
					<td class="hall-name">
						5号厅
					</td>
											
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="552374430">
								    								<i class="icon-zoom"></i>
									<div class="view-wrap" style="display:none;">
										<div class="view-box">加载中...</div>
									</div>
															</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374430&amp;n_s=new">选座购票</a>
					</td>
				</tr>
										
				<tr>
					<td class="hall-time">
							<em class="bold">11:00</em>
							 预计12:58散场 					
					</td>
					<td class="hall-type">
						国语 2D
					</td>
					<td class="hall-name">
						2号厅
					</td>
										
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="552374431">
								    								<i class="icon-zoom"></i>
									<div class="view-wrap" style="display:none;">
										<div class="view-box">加载中...</div>
									</div>
															</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374431&amp;n_s=new">选座购票</a>
					</td>
				</tr>
										
				<tr class="even">
					<td class="hall-time">
							<em class="bold">11:45</em>
							 预计13:43散场 					
					</td>
					<td class="hall-type">
							国语 2D
					</td>
					<td class="hall-name">
						1号厅
					</td>									
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView rendered" data-scheduleid="552196053">
								    								<i class="icon-zoom"></i>
									<div class="view-wrap" style="height: 84px; display: none;">
										
									</div>
															</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552196053&amp;n_s=new">选座购票</a>
					</td>
				</tr>
										
				<tr>
					<td class="hall-time">
						<em class="bold">12:25</em>
						 预计14:23散场 					</td>
					<td class="hall-type">
						国语 2D
					</td>
					<td class="hall-name">
						5号厅
					</td>
										
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="552374432">
								    								<i class="icon-zoom"></i>
									<div class="view-wrap" style="display:none;">
										<div class="view-box">加载中...</div>
									</div>
															</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374432&amp;n_s=new">选座购票</a>
					</td>
				</tr>
										
				<tr class="even">
					<td class="hall-time">
							<em class="bold">13:15</em>
							 预计15:13散场 					
					</td>
					<td class="hall-type">
							国语 2D
					</td>
					<td class="hall-name">
						2号厅
					</td>
										
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="552374433">
								    								<i class="icon-zoom"></i>
									<div class="view-wrap" style="display:none;">
										<div class="view-box">加载中...</div>
									</div>
															</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374433&amp;n_s=new">选座购票</a>
					</td>
				</tr>
										
				<tr>
					<td class="hall-time">
						<em class="bold">14:00</em>
						 预计15:58散场 					</td>
					<td class="hall-type">
						国语 2D
					</td>
					<td class="hall-name">
						1号厅
					</td>
										
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="552196056">
								    								<i class="icon-zoom"></i>
									<div class="view-wrap" style="display:none;">
										<div class="view-box">加载中...</div>
									</div>
															</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
						<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552196056&amp;n_s=new">选座购票</a>
					</td>
				</tr>
										
				<tr class="even">
					<td class="hall-time">
						<em class="bold">14:40</em>
						 预计16:38散场 					</td>
					<td class="hall-type">
						国语 2D
					</td>
					<td class="hall-name">
						5号厅
					</td>
										
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="552374425">
								    								<i class="icon-zoom"></i>
									<div class="view-wrap" style="display:none;">
										<div class="view-box">加载中...</div>
									</div>
															</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374425&amp;n_s=new">选座购票</a>
					</td>
				</tr>
										
				<tr>
					<td class="hall-time">
						<em class="bold">15:30</em>
						 预计17:28散场 					</td>
					<td class="hall-type">
						国语 2D
					</td>
					<td class="hall-name">
						2号厅
					</td>
										
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="552374426">
								    								<i class="icon-zoom"></i>
									<div class="view-wrap" style="display:none;">
										<div class="view-box">加载中...</div>
									</div>
															</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374426&amp;n_s=new">选座购票</a>
					</td>
				</tr>
										
				<tr class="even">
					<td class="hall-time">
						<em class="bold">16:15</em>
						 预计18:13散场 					</td>
					<td class="hall-type">
						国语 2D
					</td>
					<td class="hall-name">
						1号厅
					</td>
										
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="552196055">
								    								<i class="icon-zoom"></i>
									<div class="view-wrap" style="display:none;">
										<div class="view-box">加载中...</div>
									</div>
															</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552196055&amp;n_s=new">选座购票</a>
					</td>
				</tr>
										
				<tr>
					<td class="hall-time">
						<em class="bold">16:55</em>
						 预计18:53散场 					</td>
					<td class="hall-type">
						国语 2D
					</td>
					<td class="hall-name">
						5号厅
					</td>
										
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="552374427">
								    								<i class="icon-zoom"></i>
									<div class="view-wrap" style="display:none;">
										<div class="view-box">加载中...</div>
									</div>
															</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374427&amp;n_s=new">选座购票</a>
					</td>
				</tr>
										
				<tr class="even">
					<td class="hall-time">
						<em class="bold">17:45</em>
						 预计19:43散场 					</td>
					<td class="hall-type">
						国语 2D
					</td>
					<td class="hall-name">
						2号厅
					</td>
										
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width:0.0%"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="552374428">
								    								<i class="icon-zoom"></i>
									<div class="view-wrap" style="display:none;">
										<div class="view-box">加载中...</div>
									</div>
															</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="yueke">
						<em class="now">43.00</em>
							<del class="old">80.00</del>
					</td>
					<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374428&amp;n_s=new">选座购票</a>
												</td>
					</tr>
										
					  <tr>
						<td class="hall-time">
							<em class="bold">18:30</em>
							 预计20:28散场 					</td>
						<td class="hall-type">
							国语 2D
						</td>
						<td class="hall-name">
							1号厅
						</td>
											
						<td class="hall-flow">
							<div class="flowing-wrap flowing-loose">
								<label> 宽松  </label>
								<span class="flowing-vol"><i style="width:0.0%"></i></span>
								<span class="flowing-view J_flowingView" data-scheduleid="552196059">
									    								<i class="icon-zoom"></i>
	    								<div class="view-wrap" style="display:none;">
	    									<div class="view-box">加载中...</div>
	    								</div>
																</span>
							</div>
						</td>
											<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
												</td>
						<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552196059&amp;n_s=new">选座购票</a>
												</td>
					</tr>
										
					  <tr class="even">
						<td class="hall-time">
							<em class="bold">19:10</em>
							 预计21:08散场 					</td>
						<td class="hall-type">
							国语 2D
						</td>
						<td class="hall-name">
							5号厅
						</td>
											
						<td class="hall-flow">
							<div class="flowing-wrap flowing-loose">
								<label> 宽松  </label>
								<span class="flowing-vol"><i style="width:0.0%"></i></span>
								<span class="flowing-view J_flowingView" data-scheduleid="552374421">
									    								<i class="icon-zoom"></i>
	    								<div class="view-wrap" style="display:none;">
	    									<div class="view-box">加载中...</div>
	    								</div>
																</span>
							</div>
						</td>
											<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
												</td>
						<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374421&amp;n_s=new">选座购票</a>
												</td>
					</tr>
										
					  <tr>
						<td class="hall-time">
							<em class="bold">20:00</em>
							 预计21:58散场 					</td>
						<td class="hall-type">
							国语 2D
						</td>
						<td class="hall-name">
							2号厅
						</td>
											
						<td class="hall-flow">
							<div class="flowing-wrap flowing-loose">
								<label> 宽松  </label>
								<span class="flowing-vol"><i style="width:0.0%"></i></span>
								<span class="flowing-view J_flowingView" data-scheduleid="552374422">
									    								<i class="icon-zoom"></i>
	    								<div class="view-wrap" style="display:none;">
	    									<div class="view-box">加载中...</div>
	    								</div>
																</span>
							</div>
						</td>
											<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
												</td>
						<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374422&amp;n_s=new">选座购票</a>
												</td>
					</tr>
										
					  <tr class="even">
						<td class="hall-time">
							<em class="bold">20:45</em>
							 预计22:43散场 					</td>
						<td class="hall-type">
							国语 2D
						</td>
						<td class="hall-name">
							1号厅
						</td>
											
						<td class="hall-flow">
							<div class="flowing-wrap flowing-loose">
								<label> 宽松  </label>
								<span class="flowing-vol"><i style="width:0.0%"></i></span>
								<span class="flowing-view J_flowingView" data-scheduleid="552196058">
									    								<i class="icon-zoom"></i>
	    								<div class="view-wrap" style="display:none;">
	    									<div class="view-box">加载中...</div>
	    								</div>
																</span>
							</div>
						</td>
											<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
												</td>
						<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552196058&amp;n_s=new">选座购票</a>
												</td>
					</tr>
										
					  <tr>
						<td class="hall-time">
							<em class="bold">21:25</em>
							 预计23:23散场 					</td>
						<td class="hall-type">
							国语 2D
						</td>
						<td class="hall-name">
							5号厅
						</td>
											
						<td class="hall-flow">
							<div class="flowing-wrap flowing-loose">
								<label> 宽松  </label>
								<span class="flowing-vol"><i style="width:0.0%"></i></span>
								<span class="flowing-view J_flowingView" data-scheduleid="552374423">
									    								<i class="icon-zoom"></i>
	    								<div class="view-wrap" style="display:none;">
	    									<div class="view-box">加载中...</div>
	    								</div>
																</span>
							</div>
						</td>
											<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
												</td>
						<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374423&amp;n_s=new">选座购票</a>
												</td>
					</tr>
										
					  <tr class="even">
						<td class="hall-time">
							<em class="bold">22:15</em>
							 预计次日00:13散场 					</td>
						<td class="hall-type">
							国语 2D
						</td>
						<td class="hall-name">
							2号厅
						</td>
											
						<td class="hall-flow">
							<div class="flowing-wrap flowing-loose">
								<label> 宽松  </label>
								<span class="flowing-vol"><i style="width:0.0%"></i></span>
								<span class="flowing-view J_flowingView" data-scheduleid="552374424">
									    								<i class="icon-zoom"></i>
	    								<div class="view-wrap" style="display:none;">
	    									<div class="view-box">加载中...</div>
	    								</div>
																</span>
							</div>
						</td>
											<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
												</td>
						<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552374424&amp;n_s=new">选座购票</a>
												</td>
					</tr>
										
					  <tr>
						<td class="hall-time">
							<em class="bold">23:00</em>
							 预计次日00:58散场 					</td>
						<td class="hall-type">
							国语 2D
						</td>
						<td class="hall-name">
							1号厅
						</td>
											
						<td class="hall-flow">
							<div class="flowing-wrap flowing-loose">
								<label> 宽松  </label>
								<span class="flowing-vol"><i style="width:0.0%"></i></span>
								<span class="flowing-view J_flowingView" data-scheduleid="552196057">
									    								<i class="icon-zoom"></i>
	    								<div class="view-wrap" style="display:none;">
	    									<div class="view-box">加载中...</div>
	    								</div>
																</span>
							</div>
						</td>
											<td class="hall-price" data-partcode="yueke">
							<em class="now">43.00</em>
							<del class="old">80.00</del>
												</td>
						<td class="hall-seat">
														<a class="seat-btn" href="https://dianying.taobao.com/seatOrder.htm?scheduleId=552196057&amp;n_s=new">选座购票</a>
												</td>
					</tr>
								</tbody>	
			</table>
	</div>		
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
		myajax(0);

		$("#all_area").data("myid",0);
		$("#all_cinema").data("myid",0);

		$(document).on("click",".sel1>a",function(){
			$(this).parent().find("a").removeClass("red");
			$(this).addClass("red");
		});

		$(document).on("click",".sel>a",function(){
			
			$(this).parent().find("a").removeClass("red");
			$(this).addClass("red");
				
			var myid = $(this).attr("myid");
			$(this).parent().data("myid",myid);

			var all_area  = $("#all_area").data("myid");
			//var all_cinema = $("#all_cinema").data("myid");

			myajax(all_area);
		});
	});

	function myajax(area_id){

		$.ajax({
			url:"http://www.20k.com/search?area_id="+area_id+"&_token="+token+"&id="+id,
			type:"get",
			data:'',
			success:function(obj){
				//console.log(obj.list);
				$('#all_area').html(obj.area);
				$('#all_cinema').html(obj.cinema);
			}
		});
	}

</script>