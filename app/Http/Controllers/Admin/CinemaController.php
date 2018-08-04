<?php 
	namespace App\Http\Controllers\Admin;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use DB;
	class CinemaController extends Controller{
		public function cinemaList(){
			$c = DB::table('cinema')->paginate(5);
			$a = DB::table('area')->paginate(5);
			return view('cinema/cinema',['c'=>$c,'a'=>$a]);
		}

		public function addCinema(){
			//$res = DB::table('cinema')->insert();
			return view('cinema/addcinema');
		}
	}