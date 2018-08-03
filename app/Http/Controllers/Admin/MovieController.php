<?php 
	namespace App\Http\Controllers\Admin;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use DB; 
	class MovieController extends Controller{
		public function movie_list(){
			$data = DB::table('films')->paginate(1);
			return view('ming/index',['data'=>$data]);
		}
	}

 ?>