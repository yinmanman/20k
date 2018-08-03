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
Route::any('movie_list','Admin\AdminController@movie_list');
//黄笑放映厅管理列表
Route::any('movie_house_list','Admin\AdminController@movie_house_list');
//世超放映厅安排列表
Route::any('movie_plan_list','Admin\AdminController@movie_plan_list');
//赵佳会员列表
Route::any('vip_list','Admin\VipController@vip_list');
/*
Route::get('index','HelloController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');*/
