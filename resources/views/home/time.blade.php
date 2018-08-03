<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>时间场次安排</title>
	<link href="http://www.20k.com/css/time.css" rel="stylesheet" type="text/css">
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
				<li class="J_NavItem ">
                	<a href="http://www.20k.com/list" target="_top" id="shouye">首页</a>
                </li>
                <li class="J_NavItem  current ">
                	<a href="http://www.20k.com/time" target="_top" id="yingpian">影片</a>
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
<script>
	$('#yingpian').click(function(){
		$('#yingpian').css('border-bottom','2px #eb002a solid');
		$('#shouye').css('border-bottom','1px solid white');
	});
	$('#shouye').click(function(){
		$('#shouye').css('border-bottom','2px #eb002a solid');
		$('#yingpian').css('border-bottom','1px solid white');
	});
</script>