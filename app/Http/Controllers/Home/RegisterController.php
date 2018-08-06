<?php 
	namespace App\Http\Controllers\Home;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller; 
	use DB;
	class RegisterController extends Controller{
		public function register(){
			return view('jia/register');
		}
		public function fsyzm(){
			var_dump(1);

		}

	}