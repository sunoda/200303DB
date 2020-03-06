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
use Illuminate\Routing\RouteGroup;

Route::get('/', 'FrontController@index');
Route::get('/product', 'FrontController@product');
Route::get('/news', 'FrontController@news');
Route::get('/news/{id}', 'FrontController@news_content');

Auth::routes();  //認證
Route::group(['middleware' => ['auth'], 'prefix' => '/home'], function () { //登出後安全保護與加上前綴/home
// 後台頁面連結
Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'news'], function () {
// 最新消息列表新增
Route::get('/', 'NewsController@index');
Route::get('/create', 'NewsController@create');
// 最新消息編輯
Route::post('/store', 'NewsController@store');
Route::get('/edit/{id}', 'NewsController@edit');
Route::post('/update/{id}', 'NewsController@update');
Route::post('/delete/{id}', 'NewsController@destroy');
// ajax
Route::post('/ajax_delete_img','NewsController@ajax_delete_img');
Route::post('/ajax_sort','NewsController@ajax_sort');
});

Route::group(['prefix' => 'product'], function () {
// 商品列表新增
Route::get('/', 'ProductController@index');
Route::get('/create', 'ProductController@create');
// 商品編輯
Route::post('/store', 'ProductController@store');
Route::get('/edit/{id}', 'ProductController@edit');
Route::post('/update/{id}', 'ProductController@update');
Route::post('/delete/{id}', 'ProductController@destroy');
});

});
