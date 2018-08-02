<?php 
	namespace App\Http\Controllers\Admin;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller; 
	class AdminController extends Controller{
		public function admin(){
			return view('login/login');
		}

		public function index(){
			return view('qiao/index');
		}
	}

 ?>