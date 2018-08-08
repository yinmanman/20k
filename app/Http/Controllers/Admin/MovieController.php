<?php 
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use DB;
class MovieController extends Controller{

    //电影列表展示页面
	public function movie_list(){
		$data = DB::table('films')->paginate(5);
		return view('ming/index',['data'=>$data]);
	}

	//电影添加页面
	public function movieAdd(){
        return view('ming/add');
    }

    //数据库电影表添加操作
    public function addMovie(Request $request){
	    $data = Input::all();
	    $pic=$request->file('poster');
	    $name=$pic->getClientOriginalName();//得到图片名；
        $ext=$pic->getClientOriginalExtension();//得到图片后缀；
        $fileName=md5(uniqid($name));
        $fileName=$fileName.'.'.$ext;//生成新的的文件名
        $realPath = $pic->getRealPath();//临时文件的绝对路径
        $bool=Storage::disk('poster')->put($fileName,file_get_contents($realPath));
        if($bool){
            unset($data['_token']);
            $data['poster']='../../../storage/public/assets/img/poster/'.$fileName;//返回文件路径存贮在数据库
            //var_dump($data);die;
            $result = DB::table('films')->insert($data);
            if($result)
            {
                echo '<script>alert("添加成功");location.href="'.'movie_list'.'";</script>';
            }
            else{
                echo '<script>alert("添加失败");location.href="'.'movieAdd'.'";</script>';
            }
        }
    }

    //数据库电影表删除操作
    public function delMovie(){
	    $id = $_GET['id'];
        $result = DB::table('films')->where('id',$id)->delete();
        if($result)
        {
            return redirect('ming/index')->with('success','删除成功:)');
        }
        else{
            return redirect('ming/index')->with('error','删除失败');
        }
    }

    //电影修改页面
    public function movieUpdate(){
        $id = $_GET['id'];
        $result = DB::table('films')->where('id',$id)->first();
        return view('ming/update',['data'=>$result]);
    }

    //数据库电影修改操作
    public function updateMovie(Request $request){
        $data = Input::all();
        $pic = $request->file('poster');
        $name = $pic->getClientOriginalName();//得到图片名；
        $ext = $pic->getClientOriginalExtension();//得到图片后缀；
        $fileName = md5(uniqid($name));
        $fileName = $fileName . '.' . $ext;//生成新的的文件名
        $bool = Storage::disk('article')->put($fileName, file_get_contents($pic->getRealPath()));//
        $data['poster'] = 'storage/public/assets/img/poster/' . $fileName;//返回文件路径存贮在数据库
        if (!$bool) {
            return false;
        } else {
            $result = DB::table('films')->where('id', $data['film_id'])->update($data);
            if ($result) {
                return redirect('ming/index')->with('success', '添加成功:)');
            } else {
                return redirect('ming/index')->with('error', '添加失败');
            }
        }
    }
}
