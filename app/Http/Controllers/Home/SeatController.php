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

			$data['area'] = $this->getStrArea($area,$area_id);
			$data['area_id'] = $area_id;
			$data['cinema'] = $this->getStrCinema($area_id,$cinema_id);
			$data['row'] = $row;
			$data['time'] = $this->getTime($time_id);
			return $data;
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