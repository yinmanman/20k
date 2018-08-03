<?php 
	namespace App\Http\Controllers\Admin;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use DB; 
	class PlanController extends Controller{
		public function movie_plan_list(){
			$data = DB::table('movie_house')->paginate(5);
			return view('qiao/index',['data'=>$data]);
		}
	}

 ?>