<?php 
	namespace App\Http\Controllers\Admin;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use DB;
	use App\Http\Controllers\Admin\Page;
	class AreaController extends Controller{    
		/**
		列表展示
		**/
		public function area_list(){
			if(!isset($_GET['page'])){
				$p = 1;
			}else{
				$p = $_GET['page'];
			}
			// 每页显示条数
			$per_page = 5;
			$offset = ($p-1)*$per_page;
			$total = DB::table('area')->get()->count();
			$path = "area_list?page={page}";
			$data = DB::table('area')->get();
			$row = json_decode(json_encode($data), true);
			$arr = $this->tree($row);
			$info = array_slice($arr,$offset,$per_page);
			$page = new Page($total,$per_page,$p,$path);
			$a = $page->myde_write();
			return view('area/list')->with('info',$info)->with('a',$a);
		}
		/**
		递归排序
		**/
		public function tree($data,$pid=0){
			static $arr = [];
			foreach($data as $k=>$v){
				if($v['pid'] == $pid){
					$arr[] = $v;
					$this->tree($data,$v['area_id']);
				}
			}
			return $arr;
		}
		/**
		添加
		**/
		public function area_add(){
			if(!empty($_POST)){
				$data = $_POST;
				unset($data['_token']);
				if($data['pid'] == 0){
					$data['level'] = 0;
				}else{
					$info = DB::table('area')->where('area_id',$data['pid'])->first();
					$level = $info->level;
					$data['level'] = $level+1;
				}
				$res = DB::table('area')->insert($data);
				if($res){
		            echo '<script>alert("添加成功");location.href="'.'area_list'.'";</script>';
		        }
			}else{
				$data = DB::table('area')->get();
				$row = json_decode(json_encode($data), true);
				$arr = $this->tree($row);
				return view('area/add')->with('arr',$arr);
			}
		}
		/**
		删除
		**/
		public function area_delete(){
			$id = $_POST['id'];
			$res = DB::table('area')->whereIn('area_id',$id)->delete();
			if($res){
				$p = 1;
				$per_page = 5;
				$offset = ($p-1)*$per_page;
				$total = DB::table('area')->get()->count();
				$path = "area_list?page={page}";
				$data = DB::table('area')->get();
				$row = json_decode(json_encode($data), true);
				$arr = $this->tree($row);
				$new = array_slice($arr,$offset,$per_page);
				$page = new Page($total,$per_page,$p,$path);
				$a = $page->myde_write();
				$info['new'] = $new;
				$info['a'] = $a;
				return json_encode($info);
			}
		}
		/**
		修改
		**/
		public function area_update(){
			if(empty($_POST)){
				$info = DB::table('area')->get();
				$row = json_decode(json_encode($info), true);
				$arr = $this->tree($row);
				$id = $_GET['id'];
				$data = DB::table('area')->where(['area_id'=>$id])->get();
				$data = json_decode(json_encode($data), true);
				return view('area/update')->with('arr',$arr)->with('data',$data);
			}else{
				$id = $_POST['area_id'];
				$data['area_name'] = $_POST['area_name'];
				$pid = $_POST['pid'];
				$info = DB::table('area')->where('area_id',$pid)->first();
				$level = $info->level;
				$data['level'] = $level+1;
				$res = DB::table('area')->where(['area_id'=>$id])->update($data);
				if($res){
					echo '<script>alert("修改成功");location.href="'.'area_list'.'";</script>';
				}
			}
		}
	}