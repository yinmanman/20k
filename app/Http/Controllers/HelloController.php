<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller{
	public function __construct(){
		$this->middleware('auth');
	}
	public function index(){
		return view('hello');
	}

	/*public function show(){
		$count = count(Db::table('admin')->get());
		$pagesize = 2;
		$sum = ceil($count/$pagesize);
		$page = Input::get('page');
		if(empty($page)){
			$page = 1;
		}
		$up = ($page-1)>0?$page-1:1;
		$down = ($page+1)<$sum?$page+1:$sum;
		$offset = ($page-1)*$pagesize;
		$data = Db::select("select * from admin limit $offset,$pagesize");
		//数字分页
		//echo $up;die;
		$pp = array();
		for($i=1;$i<=$sum;$i++){
			$pp[$i] = $i;
		}
		return view('show',['data'=>$data,'up'=>$up,'down'=>$down,'sum'=>$sum,'pp'=>$pp,'page'=>$page]);
	}

	public function page_pro(){
		$count = count(Db::table('admin')->get());
		$pagesize = 2;
		$sum = ceil($count/$pagesize);
		$page = Input::get('page');
		if(empty($page)){
			$page = 1;
		}
		$up = ($page-1)>0?$page-1:1;
		$down = ($page+1)<$sum?$page+1:$sum;
		$offset = ($page-1)*$pagesize;
		$data = Db::select("select * from admin limit $offset,$pagesize");
		//数字分页
		$pp = array();
		for($i=1;$i<=$sum;$i++){
			$pp[$i] = $i;
		}
		return view('page',['data'=>$data,'up'=>$up,'down'=>$down,'sum'=>$sum,'pp'=>$pp,'page'=>$page]);
	}*/

	public function show(){
		$data = Db::table('admin')->paginate(2);
		return view('show',['data'=>$data]);
	}

	public function add(Request $request){
		//print_r($_POST);die;
		$wenjian = $request->file("file");
		//print_r($wenjian);
		if($wenjian){
			//获取文件的扩展名
	        $kuoname=$wenjian->getClientOriginalExtension();

	        //获取文件的类型
	        $type=$wenjian->getClientMimeType();

	        //获取文件的绝对路径，但是获取到的在本地不能打开
	        $path=$wenjian->getRealPath();
	        //echo $path;die;
	        //要保存的文件名 时间+扩展名
	        $filename=date('Y-m-d') . '/' . uniqid() .'.'.$kuoname;
	        //echo $filename;die;
	        //保存文件          配置文件存放文件的名字  ，文件名，路径
	        $bool= Storage::disk('uploadimg')->put($filename,file_get_contents($path));

	        var_dump($bool);die;
		}
		/*$request->file('file')->store('meinv');
		$data['username'] = $_POST['username'];
		$data['password'] = md5($_POST['password']);
		$data['mail'] = $_POST['mail'];
		$data['nickname'] = $_POST['nickname'];
		//print_r($data);die;
		$res = Db::table('admin')->insert($data);
		//var_dump($res);die;
		if($res){
			return redirect('show');
		}*/
	}

	public function delete(){
		$id = $_GET['id'];
		$res = Db::table('admin')->where('id',$id)->delete();
		if($res){
			return redirect('show');
		}
	}

	public function update(){
		$id = $_GET['id'];
		$res = Db::table('admin')->where('id',$id)->first();
		return view('update',['res'=>$res]);
	}

	public function updateDo(){
		$id = $_POST['id'];
		$data['username'] = $_POST['username'];
		$data['mail'] = $_POST['mail'];
		$data['nickname'] = $_POST['nickname'];
		$res = Db::table('admin')->where("id",$id)->update($data);
		if($res){
			return redirect('show');
		}
	}
}