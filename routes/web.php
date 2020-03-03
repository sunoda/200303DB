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

use App\Http\Controllers\NewsController;

Route::get('/', 'FrontController@index');
Route::get('/product', 'FrontController@product');
Route::get('/news', 'FrontController@news');

Auth::routes();
// 後台頁面連結
Route::get('home', 'HomeController@index');

// 最新消息列表新增
Route::get('home/news', 'NewsController@index');
Route::get('home/news/create', 'NewsController@create');
// 最新消息編輯
Route::post('home/news/store', 'NewsController@store');
Route::get('home/news/edit/{id}', 'NewsController@edit');
Route::post('home/news/update/{id}', 'NewsController@update');
Route::post('home/news/delete/{id}', 'NewsController@destroy');


// 最新消息列表新增
Route::get('home/product', 'ProductController@index');
Route::get('home/product/create', 'ProductController@create');
// 最新消息編輯
Route::post('home/product/store', 'ProductController@store');
Route::get('home/product/edit/{id}', 'ProductController@edit');
Route::post('home/product/update/{id}', 'ProductController@update');
Route::post('home/product/delete/{id}', 'ProductController@destroy');
