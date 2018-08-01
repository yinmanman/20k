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
<<<<<<< HEAD
=======
	public function index(){
		$this->view('index');
	}
}
>>>>>>> huangxiao
