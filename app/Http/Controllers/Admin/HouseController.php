<?php 
	namespace App\Http\Controllers\Admin;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use DB;
	class HouseController extends Controller{
		/**
		查询影厅列表，分页每页展示10条
		**/
		public function movie_house_list(){
			$data = DB::table('movie_house')->paginate(10);
			return view('movie_house/list',['data'=>$data]);
		}
		/**
		添加影厅
		**/
		public function movie_house_add(){
			if(!empty($_POST)){
				$data = $_POST;
				// 删除token
				unset($data['_token']);
				$data['sale_num'] = 0;
				$data['remainder'] = null;
				$res = DB::table('movie_house')->insert($data);
				if($res){
		            echo '<script>alert("添加成功");location.href="'.'movie_house_list'.'";</script>';
		        }
			}else{
				return view('movie_house/add');
			}
		}
		/**
		删除
		**/
		public function movie_house_delete(){
			$id = $_POST['id'];
			$res = DB::table('movie_house')->whereIn('house_id',$id)->delete();
			if($res){
				$data = DB::table('movie_house')->paginate(10);
				return json_encode($data);
			}
		}
		/**
		修改
		**/
		public function movie_house_update(){
			if(empty($_POST)){
				$id = $_GET['id'];
				$data = DB::table('movie_house')->where(['house_id'=>$id])->get();
				return view('movie_house/update',['data'=>$data]);
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
		}
	}
 ?>