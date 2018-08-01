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
}