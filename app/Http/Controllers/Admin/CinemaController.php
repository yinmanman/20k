<?php 
	namespace App\Http\Controllers\Admin;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Http\Requests;
	use Illuminate\Support\Facades\Storage;
	use DB;
	class CinemaController extends Controller{
		public function cinemaList(){
			$c = DB::table('cinema')->paginate(3);
			$a = DB::table('area')->paginate(3);
			return view('cinema/cinema',['c'=>$c,'a'=>$a]);
		}

		public function addCinema(){

			$list = $this->getAll();
			return view('cinema/add',['list'=>$list]);
		}


		/*
		*无限极分类
		*/
		public function getAll($parentid = 0,$class = 0){
			$rows = DB::table('area')->where(['pid'=>$parentid])->get();
			$rows = json_decode(json_encode($rows), true);
			static $arr = [];
			if(sizeof($rows) != 0){
				foreach($rows as $k=>$v){
					$v['class'] = $class;
					$arr[] = $v;
					$this->getAll($v['area_id'],$class+1);	
				}
				return $arr;
			}
		}

		public function cinemaAdd(Request $request){
			// 文件上传方法
			//print_r($_POST);die;
	        if ($request->isMethod('post')) {

	            $file = $request->file('myfile');
	            //var_dump($file);die;
	            // 文件是否上传成功
	            if ($file->isValid()) {

	                // 获取文件相关信息
	                $originalName = $file->getClientOriginalName(); // 文件原名
	                $ext = $file->getClientOriginalExtension();     // 扩展名
	                $realPath = $file->getRealPath();   //临时文件的绝对路径
	                $type = $file->getClientMimeType();     // image/jpeg

	                // 上传文件
	                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
	                //echo 1111;die;
	                // 使用我们新建的uploads本地存储空间（目录）
	                //这里的uploads是配置文件的名称
	                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
	                //var_dump($bool);die;
	                if($bool == true){
	                	$_POST['cinema_img'] = "uploads/cinema/".$filename; 
	                }
	            }
	        }
	       	$data = $_POST;
	       	unset($data['_token']);
	        $res = DB::table('cinema')->insert($data);
	        if($res){
				return redirect('cinema');
			}
		}


		public function delCinema(){
			$id = $_GET['id'];
			$res = Db::table('cinema')->where('cinema_id',$id)->delete();
			if($res){
				return redirect('cinema');
			}
		}

		public function updCinema(){
			$id = $_GET['id'];
			$res = Db::table('cinema')->where('cinema_id',$id)->first();
			$list = $this->getAll();
			return view('cinema/upd',['res'=>$res,'list'=>$list]);
		}

		public function updateDo(Request $request){
			 if ($request->isMethod('post')) {

	            $file = $request->file('myfile');
	            // 文件是否上传成功
	            if ($file) {
	                // 获取文件相关信息
	                $originalName = $file->getClientOriginalName(); // 文件原名
	                $ext = $file->getClientOriginalExtension();     // 扩展名
	                $realPath = $file->getRealPath();   //临时文件的绝对路径
	                $type = $file->getClientMimeType();     // image/jpeg

	                // 上传文件
	                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
	                // 使用我们新建的uploads本地存储空间（目录）
	                //这里的uploads是配置文件的名称
	                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
	                //var_dump($bool);die;
	                if($bool == true){
	                	$data['cinema_img'] = "uploads/cinema/".$filename; 
	                }
	            }else{
	            	$data['cinema_img'] = $_POST['file'];
	            }
	        }
	        $id = $_POST['id'];
	        $data['cinema_name'] = $_POST['cinema_name'];
	        $data['cinema_site'] = $_POST['cinema_site'];
	        $data['cinema_tel'] = $_POST['cinema_tel'];
	        $data['area_id'] = $_POST['area_id'];
 			$res = Db::table('cinema')->where('cinema_id',$id)->update($data);
			if($res){
				return redirect('cinema');
			}
		}
	}