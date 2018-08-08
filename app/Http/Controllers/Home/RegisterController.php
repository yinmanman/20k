<?php 
	namespace App\Http\Controllers\Home;
	use Illuminate\Support\Facades\Redis;
	use Gregwar\Captcha\CaptchaBuilder;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller; 
	use DB;
	use Session;
	class RegisterController extends Controller{
		public function register(){
			return view('jia/register');
		}
		public function captcha($tmp){
			$builder  = new CaptchaBuilder;$builder->build(150,32);
			$phrase = $builder->getPhrase();
			Session::put('milkcaptcha', $phrase);
			ob_clean();
			return response($builder->output())->header('Content-type','image/jpeg');
		}
		public function add_user(){
			if(!empty($_POST['ycyzm'])){
				$info = Session::all();
				$imgyzm = $info['milkcaptcha'];
				$imgsyzm = $_POST['imgyzm'];
				if($imgsyzm != $imgyzm && !empty($imgsyzm)){
					return 1;
				}
				$dxyzm = $_POST['yzm'];
				$ycyzm = $_POST['ycyzm'];
				if($dxyzm != $ycyzm){
					return 2;
				}
				$data['username'] = $_POST['username'];
				$data['password'] = $_POST['password'];
				$data['tel'] = $_POST['tel'];
				$res = DB::table('user')->insert($data);
				if($res){
					return 3;
				}
			}else{
				return 4;
			}
		}

	}