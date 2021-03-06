<?php 
	namespace App\Http\Controllers\Home;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller; 
	use DB;
	class SeatController extends Controller{
		public function seat(){
			$film_id = $_GET['film_id'];//电影id
			$house_id = $_GET['house_id'];//影厅id
			$dq_id = $_GET['dq_id'];	// 场次id
			$data = DB::table('films')->where(['film_id'=>$film_id])->first();
			$info = DB::table('movie_house')->where(['house_id'=>$house_id])->first();
			$arr = DB::table('house_setting')->where(['id'=>$dq_id])->first();
			return view('home/seat')->with('data',$data)->with('info',$info)->with('arr',$arr);
		}

		public function time(){
			$id = $_GET['id'];
			$row = DB::table('films')->where(['film_id'=>$id])->get();
			return view('home/time',['row'=>$row]);
		}

		public function area(){
			$id = $_GET['id'];

			$row = DB::table('films')->where(['film_id'=>$id])->get();

			$area_id = isset($_GET['area_id'])?$_GET['area_id']:0;
			$cinema_id = isset($_GET['cinema_id'])?$_GET['cinema_id']:0;
			$time_id = isset($_GET['time_id'])?$_GET['time_id']:0;
			$area = DB::table('area')->where(['pid'=>2])->get();

			$data['area'] = $this->getStrArea($area,$area_id);//获取地区的名称
			$data['area_id'] = $area_id;
			$data['cinema'] = $this->getStrCinema($area_id,$cinema_id);//获取影院的名称
			$data['row'] = $row;//根据传的id获取电影信息
			$data['time'] = $this->getTime($time_id);//获取今天和明天的时间
			$data['list'] = $this->getSetting($area_id,$cinema_id,$id,$time_id);//获取影厅安排的信息
			return $data;
		}

		/*
		*获取影厅安排的列表
		*/
		public function getSetting($area_id,$cinema_id,$film_id,$time_id){
			if($area_id==0){//此状态获取到所有区域的影院
				$cinema = DB::table('cinema')->get();
			}else{//点击相应的区域获取所对应的影院信息
				$cinema = DB::table('cinema')->where(['area_id'=>$area_id])->get();
			}

			$house = DB::table('movie_house')->get();//获取影厅信息
			$film = DB::table('films')->where(['film_id'=>$film_id])->get();//获取电影信息
			if($cinema_id == 0){//获取显示的第一家影院的影厅安排信息
				$house_setting = DB::table('house_setting')->where(['cinema_id'=>$cinema[0]->cinema_id,'film_id'=>$film_id,'status'=>1])->get();
			}else{//点击相应的影院获取所对应的影厅安排信息
				$house_setting = DB::table('house_setting')->where(['cinema_id'=>$cinema_id,'film_id'=>$film_id,'status'=>1])->get();
			}

			$setting = json_decode(json_encode($house_setting), true);

			if($time_id == 0){//今天的日期
				$time = strtotime(date("Y-m-d"));//把日期转换为时间戳
			}else if($time_id == 1){//明天的日期
				$time = strtotime(date("Y-m-d",strtotime("+1 day")));
			}

			if($setting){//如果影厅有安排电影放映
				$start = strtotime($setting[0]['movie_dangqi_start']);//电影档期开始时间
				$stop = strtotime($setting[0]['movie_dangqi_stop']);//电影档期结束时间
				if($time>=$start && $time<=$stop){//如果今天或明天的日期在电影档期内
					$str = '';
					foreach($house_setting as $k=>$v){
						$str .= "<tr ";
						if($k%2 == 0){
							$str .= "class='even'";
						}
						$str .= ">";
					    $str .= "<td class='hall-time'><em class='bold'>".$v->movie_start."</em>预计".$v->movie_leave."散场</td>";
					    $str .= "<td class='hall-type'>";
				    	$str .= $film[0]->language;
				    	if($film[0]->type == 1){
				    		$str .= "2D";
				    	}else{
				    		$str .= "3D";
				    	}	
					    $str .="</td>";
					    $str .= "<td class='hall-name'>";
					    foreach($house as $k2=>$v2){
					    	if($v2->house_id == $v->house_id){
					    		$str .= $v2->house_name;
					    	}
					    }
					    $str .= "</td>";
					    $str .= "<td class='hall-flow'><div class='flowing-wrap flowing-loose'><label> 宽松  </label><span class='flowing-vol'><i style='width:0.0%'></i></span><span class='flowing-view J_flowingView rendered' data-scheduleid='552196054'><i class='icon-zoom'></i><div class='view-wrap' style='height: 84px; display: none;'></div></span></div></td>";
					    $str .= "<td class='hall-price' data-partcode='yueke'><em class='now'>";
					    $str .= $film[0]->cost_price;
					    $str .= ".00</em><del class='old'>";
					    $str .= $film[0]->present_price;
					    $str .= ".00</del></td>";
					    $str .= "<td class='hall-seat'><a class='seat-btn' href='http://www.20k.com/seat?house_id=".$v->house_id."&film_id=".$film_id."&dq_id=".$v->id."'>选座购票</a></td>";
					    $str .= "</tr>";
					}
					
				}else{

					$str = "<tr style='height:100px;font-size:20px;' align='center'><td colspan='6'>抱歉，没有安排场次~~~</td></tr>";
				}
			}else{
				$str = "<tr style='height:100px;font-size:20px;' align='center'><td colspan='6'>抱歉，没有安排场次~~~</td></tr>";
			}

			return $str;
		}

		public function filmList(){
			$data = DB::table('films')->where(['is_show'=>0])->paginate(20);
			$list = DB::table('films')->where(['is_show'=>1])->paginate(20);
			return view('home/list',['data'=>$data,'list'=>$list]);
		}

		/*
		*获取播放时间
		*/
		public function getTime($time_id){
			$today = date("m月d日");//今天的日期
			$tomorrow = date("m月d日",strtotime("+1 day"));//明天的日期
			if($time_id == 0){//0 表示是今天的日期
				$str = "&nbsp;&nbsp;<a myid='0' class='red'>".$today."（今天）</a>&nbsp;&nbsp;<a myid='1'>".$tomorrow."（明天）</a>";
			}else if($time_id == 1){//1 表示是明天的日期
				$str = "&nbsp;&nbsp;<a myid='0'>".$today."（今天）</a>&nbsp;&nbsp;<a myid='1' class='red'>".$tomorrow."（明天）</a>";
			}
			return $str;
		}

		/*
		*获取所有区域
		*/
		public function getStrArea($list,$area_id=0){
			if($area_id==0){
				$str = "&nbsp;&nbsp;<a class='red' myid='0'>全部区域</a>&nbsp;&nbsp;";
			}else{
				$str = "&nbsp;&nbsp;<a myid='0'>全部区域</a>&nbsp;&nbsp;";
			}

			$list = json_decode(json_encode($list), true);

			foreach($list as $val){
				if($val["area_id"]==$area_id ){
					$str.="&nbsp;&nbsp;<a class='red' myid='".$val["area_id"]."'>".$val["area_name"]."</a>&nbsp;&nbsp;";
				}else{

					$str.="&nbsp;&nbsp;<a myid='".$val["area_id"]."'>".$val["area_name"]."</a>&nbsp;&nbsp;";
				}
			}

			return $str;
		}

		/*
		*获取每个区域对应的影院信息
		*/
		public function getStrCinema($area_id = 0,$cinema_id = 0){
			$str = '';
			if($area_id==0){//0 表示获取到所有影院
				$cinema = DB::table('cinema')->get();
			}else{// 否则获取所点击地区对应的影院
				$cinema = DB::table('cinema')->where(['area_id'=>$area_id])->get();
			}
			$cinema = json_decode(json_encode($cinema), true);

			foreach ($cinema as $k=>$v){
				if($v["cinema_id"]==$cinema_id ){
					$str.="&nbsp;&nbsp;<a class='red' myid='".$v["cinema_id"]."'>".$v["cinema_name"]."</a>&nbsp;&nbsp;";
				}else if($cinema_id == 0){
					
					$str .= "&nbsp;&nbsp;<a myid='".$v["cinema_id"]."' class='";
					if($k==0){
						$str .='red';
					};
					$str .= "'>".$v["cinema_name"]."</a>&nbsp;&nbsp;";
				}else{
					$str.="&nbsp;&nbsp;<a myid='".$v["cinema_id"]."'>".$v["cinema_name"]."</a>&nbsp;&nbsp;";
				}
			}
			return $str;
		}
		public function add_cost(){
			$data = $_POST;
			$dq_id = $data['dq_id'];
			$data['seat'] = implode(',', $_POST['seat']);//座位  数组
			$sale_seat = DB::table('house_setting')->where(['id'=>$dq_id])->first();
			if(empty($sale_seat->sale_seat)){
				$data['seat'] = $data['seat'];
			}else{
				$data['seat'] = $sale_seat->sale_seat.",".$data['seat'];
			}
			DB::table('house_setting')->where(['id'=>$dq_id])->update(['sale_seat'=>$data['seat']]);
			unset($data['_token'],$data['dq_id']);
			$res = DB::table('user_cost')->insert($data);
			if($res){
				echo 1;
			}
		}	
	}