<?php 
	namespace App\Http\Controllers\Home;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller; 
	use DB;
	class SeatController extends Controller{
		public function search(){
			$area_id = isset($_GET['area_id'])?$_GET['area_id']:0;
			$list = DB::table('area')->get();
			$data['list'] = $list;
			$data['area_id'] = $area_id;
			//print_r($data);die;
			return view('home/time',['data'=>$data]);
		}
	}