<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('admin/loaisanpham/','Home\HomeController@index');
Route::get('admin/loaisanpham/{id}','Home\HomeController@show');
Route::post('admin/loaisanpham','Home\HomeController@store');
Route::put('admin/loaisanpham/{id}','Home\HomeController@update');
Route::delete('admin/loaisanpham/{id}','Home\HomeController@destroy');


Route::get('dashboard/product/','AjaxController@index');
Route::get('dashboard/product/{id}','AjaxController@show');
Route::post('dashboard/product','AjaxController@store');
Route::put('dashboard/product/{id}','AjaxController@update');
Route::delete('dashboard/product/{id}','AjaxController@destroy');


Route::get('dashboard/post','PostController@index');
Route::get('dashboard/post/{id}','PostController@show');
Route::post('dashboard/post','PostController@store');
Route::put('dashboard/post/{id}','PostController@update');
Route::delete('dashboard/post/{id}','PostController@destroy');
