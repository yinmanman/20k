<?php 
	namespace App\Http\Controllers\Home;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller; 
	use DB;
	class SeatController extends Controller{
		public function seat(){
			$film_id = 1;//电影id
			$house_id = 1;//影厅id
			$data = DB::table('films')->where(['film_id'=>$film_id])->first();
			$info = DB::table('movie_house')->where(['house_id'=>$house_id])->first();
			return view('home/seat')->with('data',$data)->with('info',$info);
		}

		public function time(){
			$id = $_GET['id'];
			$row = DB::table('films')->where(['film_id'=>$id])->get();
			//print_r($row[0]->film_id);die;
			return view('home/time',['row'=>$row]);
		}

		public function area(){
			$id = $_GET['id'];

			$row = DB::table('films')->where(['film_id'=>$id])->get();

			$area_id = isset($_GET['area_id'])?$_GET['area_id']:0;
			$cinema_id = isset($_GET['cinema_id'])?$_GET['cinema_id']:0;
			$time_id = isset($_GET['time_id'])?$_GET['time_id']:0;
			//print_r($cinema_id);die;
			$area = DB::table('area')->where(['pid'=>2])->get();

			$data['area'] = $this->getStrArea($area,$area_id);//获取地区的名称
			$data['area_id'] = $area_id;
			$data['cinema'] = $this->getStrCinema($area_id,$cinema_id);//获取影院的名称
			$data['row'] = $row;//根据传的id获取电影信息
			$data['time'] = $this->getTime($time_id);//获取今天和明天的时间
			$data['list'] = $this->getSetting($area_id,$cinema_id,$id,$time_id);//获取影厅安排的信息
			return $data;
		}

		public function getSetting($area_id,$cinema_id,$film_id,$time_id){
			if($area_id==0){
				$cinema = DB::table('cinema')->get();
			}else{
				$cinema = DB::table('cinema')->where(['area_id'=>$area_id])->get();
			}

			$house = DB::table('movie_house')->get();//获取影厅信息
			$film = DB::table('films')->where(['film_id'=>$film_id])->get();
			if($cinema_id == 0){
				$house_setting = DB::table('house_setting')->where(['cinema_id'=>$cinema[0]->cinema_id,'film_id'=>$film_id,'status'=>1])->get();
			}else{
				$house_setting = DB::table('house_setting')->where(['cinema_id'=>$cinema_id,'film_id'=>$film_id,'status'=>1])->get();
			}	
			$setting = json_decode(json_encode($house_setting), true);

			if($time_id == 0){
				$time = strtotime(date("Y-m-d"));
			}else if($time_id == 1){
				$time = strtotime(date("Y-m-d",strtotime("+1 day")));
			}

			if($setting){
				$start = strtotime($setting[0]['movie_dangqi_start']);
				$stop = strtotime($setting[0]['movie_dangqi_stop']);
				if($time>=$start && $time<=$stop){
					//return $house_setting;
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
					    $str .= $film[0]->cost_price;//cost_price
					    $str .= ".00</em><del class='old'>";
					    $str .= $film[0]->present_price;//cost_price
					    $str .= ".00</del></td>";
					    $str .= "<td class='hall-seat'><a class='seat-btn' href='http://www.20k.com/seat?house_id=".$v->house_id."&film_id=".$film_id."'>选座购票</a></td>";
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


		public function getTime($time_id){
			$today = date("m月d日");
			$tomorrow = date("m月d日",strtotime("+1 day"));
			if($time_id == 0){
				$str = "&nbsp;&nbsp;<a myid='0' class='red'>".$today."（今天）</a>&nbsp;&nbsp;<a myid='1'>".$tomorrow."（明天）</a>";
			}else if($time_id == 1){
				$str = "&nbsp;&nbsp;<a myid='0'>".$today."（今天）</a>&nbsp;&nbsp;<a myid='1' class='red'>".$tomorrow."（明天）</a>";
			}
			return $str;
		}

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

		public function getStrCinema($area_id = 0,$cinema_id = 0){
			$str = '';
			if($area_id==0){
				$cinema = DB::table('cinema')->get();
			}else{
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
			$data['seat'] = implode(',', $_POST['seat']);//座位  数组
			$data['money_num'] = $_POST['money_num'];//总价
			$data['start_time'] = $_POST['start_time'];//电影开场时间
			$res = DB::table('user_cost')->insert($data);
			if($res){
				echo 1;
			}


		}	
	}