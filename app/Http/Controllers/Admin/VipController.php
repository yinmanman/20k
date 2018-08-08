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

		public function updatevip(){
			if(empty($_POST)){
				$id = $_GET['user_id'];
				$info = DB::table('user')->where('user_id',$id)->first();
	       		return view('jia/updatevip',['info'=>$info]);
			}else{
				$id=$_POST['user_id'];
	            $username = $_POST['username'];
	            $nick_name=$_POST['nick_name'];
	            $is_vip=$_POST['is_vip'];
	            $vip_level=$_POST['vip_level'];
	            $discount_rate=$_POST['discount_rate'];
	            $arr=array('user_id'=>$id,'username'=>$username,'nick_name'=>$nick_name,'is_vip'=>$is_vip,'vip_level'=>$vip_level,'discount_rate'=>$discount_rate);
           		$res=DB::table('user')->where('user_id','=',$id )->update($arr);
           		if($res) {
	                 return redirect('vip_list');
	             }
			}	
		}
		public function all(){
			$id = $_POST['id'];
	        if($id){
	            $res= DB::table('user')->whereIn('id',$id)->delete();
	            if($res) {
	                 return view('jia/index');
	             }
	        }
		}
	}

 ?>