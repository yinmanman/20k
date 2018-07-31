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

Route::get('index','HelloController@index');
Route::any('show','HelloController@show');
Route::post('add','HelloController@add');
Route::any('delete','HelloController@delete');
Route::any('update','HelloController@update');
Route::any('updateDo','HelloController@updateDo');
Route::any('page_pro','HelloController@page_pro');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
