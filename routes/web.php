<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 后台开始
Route::any('index','Admin\AdminController@index');





//世明影片管理列表
Route::any('movie_list','Admin\MovieController@movie_list');
//黄笑放映厅管理列表
// 放映厅列表
Route::any('movie_house_list','Admin\HouseController@movie_house_list');
// 放映厅添加
Route::any('movie_house_add','Admin\HouseController@movie_house_add');
// 放映厅删除
Route::any('movie_house_delete','Admin\HouseController@movie_house_delete');
// 放映厅修改
Route::any('movie_house_update','Admin\HouseController@movie_house_update');
//世超放映厅安排列表
Route::any('movie_plan_list','Admin\PlanController@movie_plan_list');
//赵佳会员列表操作start
Route::any('vip_list','Admin\VipController@vip_list');
Route::any('all', 'Admin\VipController@all');
Route::any('updatevip','Admin\VipController@updatevip');
//影院管理
Route::any('cinema','Admin\CinemaController@cinemaList');
Route::any('addcinema','Admin\CinemaController@addCinema');


Route::any('cinemaadd','Admin\CinemaController@cinemaAdd');
Route::any('cinemadel','Admin\CinemaController@delCinema');
Route::any('cinemaupd','Admin\CinemaController@updCinema');
Route::any('updatedo','Admin\CinemaController@updateDo');

Route::any('register','Home\RegisterController@register');
Route::any('fsyzm','Home\RegisterController@fsyzm');
//end


//地区管理
// 地区列表
Route::any('area_list','Admin\AreaController@area_list');
// 地区添加
Route::any('area_add','Admin\AreaController@area_add');
// 地区添加
Route::any('area_delete','Admin\AreaController@area_delete');
// 地区添加
Route::any('area_update','Admin\AreaController@area_update');
//后台结束




//注册验证码及短信验证
Route::any('register','Home\RegisterController@register');
Route::any('add_user','Home\RegisterController@add_user');
Route::any('captcha/{tmp}','Home\RegisterController@captcha');

//前台
Route::any('seat','Home\SeatController@seat');
Route::any('time','Home\SeatController@time');
Route::any('list','Home\SeatController@filmList');

