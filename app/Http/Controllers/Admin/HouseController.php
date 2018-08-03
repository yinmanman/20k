<?php 
	namespace App\Http\Controllers\Admin;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use DB;
	class HouseController extends Controller{
		public function movie_house_list(){
			$data = DB::table('movie_house')->paginate(5);
			return view('xiao/index',['data'=>$data]);
		}
	}
 ?>