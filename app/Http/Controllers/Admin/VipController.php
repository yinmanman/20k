<?php 
	namespace App\Http\Controllers\Admin;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use DB; 
	class VipController extends Controller{
		public function vip_list(){
			$data = DB::table('user')->paginate(1);
			return view('jia/index',['data'=>$data]);
		}
	}

 ?>