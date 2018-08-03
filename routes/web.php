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
Route::any('movie','Admin\AdminController@movie');
Route::any('movie_house','Admin\AdminController@movie_house');
Route::any('movie_plan','Admin\AdminController@movie_plan');
Route::any('vip_plan','Admin\AdminController@vip_plan');
/*
Route::get('index','HelloController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');*/
