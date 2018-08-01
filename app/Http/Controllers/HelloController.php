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
}