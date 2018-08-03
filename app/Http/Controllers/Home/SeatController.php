<?php 
	namespace App\Http\Controllers\Home;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller; 
	class SeatController extends Controller{
		public function seat(){
			return view('home/seat');
		}

		public function time(){
			return view('home/time');
		}

		public function filmList(){
			return view('home/list');
		}
	}