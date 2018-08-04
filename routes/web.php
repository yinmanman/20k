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


//赵佳会员列表
Route::any('vip_list','Admin\VipController@vip_list');

//前台
Route::get('seat','Home\SeatController@seat');
Route::get('time','Home\SeatController@time');

