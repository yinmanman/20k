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

		public function filmList(){
			$data = DB::table('films')->where(['is_show'=>0])->paginate(20);
			$list = DB::table('films')->where(['is_show'=>1])->paginate(20);
			return view('home/list',['data'=>$data,'list'=>$list]);
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