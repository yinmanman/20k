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

		public function filmList(){
			$data = DB::table('films')->where(['is_show'=>0])->paginate(20);
			$list = DB::table('films')->where(['is_show'=>1])->paginate(20);
			return view('home/list',['data'=>$data,'list'=>$list]);
		}
	}