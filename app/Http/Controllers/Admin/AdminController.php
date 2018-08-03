<?php 
	namespace App\Http\Controllers\Admin;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller; 
	class AdminController extends Controller{
		public function index(){
			return view('admin/index');
		}
		public function movie(){
			return view('qiao/index');
		}
		public function movie_house(){
			return view('xiao/index');
		}
		public function movie_plan(){
			return view('ming/index');
		}
		public function vip_plan(){
			return view('jia/index');
		}
	}

 ?>