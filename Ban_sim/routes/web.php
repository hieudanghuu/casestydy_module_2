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
use Illuminate\Support\Facades\Route;



Auth::routes();
//Route::get('1', function (){
//    return view('home')->name('login');
//});




//

//    Route::get('/', 'SimController@index')->name('sim.index');
//    Route::get('/create', 'SimController@create')->name('sim.create')->middleware('admin');
//    Route::post('/create', 'SimController@store')->name('sim.store')->middleware('admin');;
//    Route::get('/edit/{id}', 'SimController@edit')->name('sim.edit')->middleware('admin');;
//    Route::post('/edit/{id}', 'SimController@update')->name('sim.update')->middleware('admin');;
//    Route::get('/destroy/{id}', 'SimController@destroy')->name('sim.destroy')->middleware('admin');;





Route::group(['prefix' => ''], function () {
    Route::get('/','ShopController@index')->name('index');
    Route::get('/shop','ShopController@show')->name('shop');
    Route::get('/cart','ShopController@cart')->name('cart')->middleware('auth');
    Route::get('/product','ShopController@product')->name('product');
    Route::get('/checkout','CheckoutController@show')->name('checkout')->middleware('auth');
    Route::post('/checkout/save','CheckoutController@checkout_save')->name('checkout.save');

    Route::get('/contact','ShopController@contact')->name('contact')->middleware('auth');
    Route::resource('sim', 'SimController')->middleware('admin');
    Route::get('/login','HomeController@login')->name('login');
    Route::get('/search','SearchController@search')->name('search.sim');



});
Route::get('/cart/{id}','CartController@save')->name('save.cart')->middleware('auth');
Route::get('/cart/show','CartController@show');
Route::post('/cart/update','CartController@update')->name('cart.update');
Route::get('/destroy/{id}','CartController@destroy')->name('destroy.cart');

Route::get('/search/{id}','SearchController@search_name')->name('search.name');
Route::post('/search/sim-price','SearchController@search_price')->name('search.price');

Route::get('/dashboard','DashboardController@index')->name('dashboard');














