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
Route::get('admin','Admin\AdminController@admin');
Route::get('index','Admin\AdminController@index');
Route::get('seat','Home\SeatController@seat');
Route::get('time','Home\SeatController@time');
/*Route::get('index','HelloController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');*/
