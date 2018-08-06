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
			$data = DB::table('area')->paginate(10);
			$row = json_decode(json_encode($data), true);
			$arr = $this->tree($row['data']);
			$row['data'] = $arr;
			$page = new Page($row['total'],$row['per_page'],$row['current_page'],$row['path']."?page={page} ",2);
			$a = $page->myde_write();
			return view('area/list')->with('row',$row)->with('a',$a);
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
				$info = DB::table('area')->where('area_id',$data['pid'])->first();
				$level = $info->level;
				$data['level'] = $level+1;
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
				$data = DB::table('area')->paginate(10);
				$row = json_decode(json_encode($data), true);
				$arr = $this->tree($row['data']);
				$row['data'] = $arr;
				$page = new Page($row['total'],$row['per_page'],$row['current_page'],$row['path']."?page={page} ",2);
				$a = $page->myde_write();
				$info['row'] = $row;
				$info['a'] = $a;
				return json_encode($info);
			}
		}
		/**
		修改
		**/
		public function area_update(){
			/*
			if(empty($_POST)){
				$id = $_GET['id'];
				$data = DB::table('movie_house')->where(['house_id'=>$id])->get();
				return view('xiao/update',['data'=>$data]);
			}else{
				$id = $_POST['house_id'];
				$data = $_POST;
				// 删除token
				unset($data['_token'],$data['house_id']);
				$res = DB::table('movie_house')->where(['house_id'=>$id])->update($data);
				if($res){
					echo '<script>alert("修改成功");location.href="'.'movie_house_list'.'";</script>';
				}
			}
			*/
		}
	}