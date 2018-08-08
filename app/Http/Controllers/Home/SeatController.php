<?php 
	namespace App\Http\Controllers\Home;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller; 
	use DB;
	class SeatController extends Controller{
		public function seat(){
			return view('home/seat');
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
			//print_r($cinema_id);die;
			$area = DB::table('area')->where(['pid'=>2])->get();

			/*if($area_id == 0){
				$cinema = DB::table('cinema')->get();
			}else{
				$cinema = DB::table('cinema')->where(['area_id'=>$area_id])->get();
			}*/
			$data['area'] = $this->getStrArea($area,$area_id);
			$data['area_id'] = $area_id;
			$data['cinema'] = $this->getStrCinema($area_id,$cinema_id);
			$data['row'] = $row;
			return $data;
			//return view('home/time',['row'=>$row,'data'=>$data]);
		}

		public function filmList(){
			$data = DB::table('films')->where(['is_show'=>0])->paginate(20);
			$list = DB::table('films')->where(['is_show'=>1])->paginate(20);
			return view('home/list',['data'=>$data,'list'=>$list]);
		}

		public function getStrArea($list,$area_id=0){
			if($area_id==0){
				$str = "<a class='red' myid='0'>全部区域</a>&nbsp;&nbsp;";
			}else{
				$str = "<a myid='0'>全部区域</a>&nbsp;&nbsp;";
			}

			$list = json_decode(json_encode($list), true);

			foreach($list as $val){
				if($val["area_id"]==$area_id ){
					$str.="<a class='red' myid='".$val["area_id"]."'>".$val["area_name"]."</a>&nbsp;&nbsp;";
				}else{

					$str.="<a myid='".$val["area_id"]."'>".$val["area_name"]."</a>&nbsp;&nbsp;";
				}
			}

			return $str;
		}

		public function getStrCinema($area_id = 0,$cinema_id = 0){
			$str = '';
			if($area_id==0){
				//$str = "<a class='red' myid='0'>全部影院</a>&nbsp;&nbsp;";
				$cinema = DB::table('cinema')->get();
			}else{
				//$str = "<a myid='0'>全部影院</a>&nbsp;&nbsp;";
				$cinema = DB::table('cinema')->where(['area_id'=>$area_id])->get();
			}
			$cinema = json_decode(json_encode($cinema), true);

			foreach ($cinema as $k=>$v){
				if($v["cinema_id"]==$cinema_id ){
					$str.="<a class='red' myid='".$v["cinema_id"]."'>".$v["cinema_name"]."</a>&nbsp;&nbsp;";
				}else if($k==0){
					$str.="<a class='red' myid='".$v["cinema_id"]."'>".$v["cinema_name"]."</a>&nbsp;&nbsp;";
					/*$str .= "<a myid='".$v["cinema_id"]."' class='";
					if($k==0){
						$str .='red';
					};
					$str .= "'>".$v["cinema_name"]."</a>&nbsp;&nbsp;";*/
				}else{
					$str.="<a myid='".$v["cinema_id"]."'>".$v["cinema_name"]."</a>&nbsp;&nbsp;";
				}
			}
			return $str;
		}
	}