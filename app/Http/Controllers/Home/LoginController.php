<?php 
	namespace App\Http\Controllers\Home;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller; 
	use DB;
	use Session;
	class LoginController extends Controller{
		public function login(){
			return view('login/login');
		}

		public function loginDo(){
			$nick_name = $_POST['nick_name'];
			$pwd = $_POST['pwd'];
			$data = DB::table('user')->where(['nick_name'=>$nick_name])->get();
			if(!empty($data)){
				if($data[0]->password == $pwd){
					echo '<script>alert("登录成功");location.href="'.'list'.'";</script>';
					Session::put("user_id",$data[0]->user_id);
					Session::put("username",$nick_name);
				}else{
					echo '<script>alert("密码错误");location.href="'.'login'.'";</script>';
				}
			}else{
				echo '<script>alert("该昵称不存在");location.href="'.'login'.'";</script>';
			}
		}
	}