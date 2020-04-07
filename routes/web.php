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

Route::get('logins','Auth\LoginController@index')->name('login')->middleware('locale');
Route::get('registration','Auth\RegisterController@index')->name('registration')->middleware('locale');
Auth::routes();
Route::get('dashboard/post',function (){
    return view('dashboard.crudPOST');
});

Route::group(['prefix' => ''], function () {
    Route::get('/',function(){
        // dd(App::getLocale());
        if (App::getLocale() == "vi") {
            $sims = \App\Sim::where('locale','vi')->whereNull('deleted_at')->paginate(6);
            $user = \App\User::all();
            $posts = \App\Post_tran::where('locale','vi')->paginate(3);
            $category = \App\Category::all();
        } else{
            $sims = \App\Sim::where('locale','jp')->whereNull('deleted_at')->paginate(6);
            $user = \App\User::all();
            $posts = \App\Post_tran::where('locale','jp')->paginate(3);
            $category = \App\Category::all();
        }
        return view('BanSim.index',compact('sims','user','posts','category'));
    })->name('index')->middleware('locale');


    Route::get('/shop','ShopController@show')->name('shop')->middleware('locale');
    Route::get('/cart','ShopController@cart')->name('cart')->middleware('auth','locale');
    Route::get('/product','ShopController@product')->name('product');
    Route::get('/checkout','CheckoutController@show')->name('checkout')->middleware('auth','locale');
    Route::post('/shop/','CheckoutController@checkout_save')->name('checkout.save');
    Route::post('/contact','ShopController@contact')->name('contact');
    Route::get('/show/{id}', 'ShopController@show_sim')->name('show.sim')->middleware('auth');;



    Route::get('/contact','ShopController@contact')->name('contact')->middleware('auth');
    Route::resource('sim', 'SimController')->middleware('admin');
    Route::get('/login','HomeController@login')->name('login')->middleware('locale');;
    Route::get('/search','SearchController@search')->name('search.sim')->middleware('locale');;
    Route::get('/post/search','PostController@search')->name('post.search')->middleware('locale');;
    Route::get('/post','PostController@index')->name('post.index')->middleware('locale');;
    Route::get('/post/{id}','PostController@post_show')->name('post.show')->middleware('locale');;

});

//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------
Route::get('/cart/{id}','CartController@save')->name('save.cart')->middleware('auth');
Route::get('/cart/show','CartController@show')->middleware('locale');;
Route::get('/cart/update/{id}/{qty}/{rowId}','CartController@update')->name('cart.update');
Route::get('/destroy/{id}','CartController@destroy')->name('destroy.cart');
//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------
Route::get('/search/{id}','SearchController@search_name')->name('search.name');
Route::post('/search/sim-price','SearchController@search_price')->name('search.price');
//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------
Route::get('/dashboard','DashboardController@index')->name('dashboard')->middleware('admin');
Route::get('/dashboard/sim','SimController@index')->name('dashboard.table')->middleware('admin');
Route::get('/dashboard/sim/delete','SimController@show_deletad_at')->name('dashboard.sim.delete')->middleware('admin');
Route::get('/dashboard/sim/restore/{id}','SimController@restore')->name('dashboard.sim.restore')->middleware('admin');
Route::get('/dashboard/sim/forceDelete/{id}','SimController@forceDelete')->name('dashboard.sim.forceDelete')->middleware('admin');
//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------
Route::resource('user', 'UsersController')->middleware('admin');
Route::get('/dashboard/users','UsersController@index')->name('dashboard.users')->middleware('admin');
Route::get('/dashboard/users/show/{id}','UsersController@show')->name('dashboard.users.show')->middleware('admin');
Route::get('/dashboard/users/delete','UsersController@show_deletad_at')->name('dashboard.users.delete')->middleware('admin');
Route::get('/dashboard/users/restore/{id}','UsersController@restore')->name('dashboard.users.restore')->middleware('admin');
Route::get('/dashboard/users/forceDelete/{id}','UsersController@forceDelete')->name('dashboard.users.forceDelete')->middleware('admin');
//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------
Route::resource('posts', 'PostTranController')->middleware('admin');
Route::get('/dashboard/posts/show/{id}','PostTranController@show')->name('dashboard.posts.show')->middleware('admin');
Route::get('/dashboard/posts/delete','PostTranController@show_deletad_at')->name('dashboard.posts.delete')->middleware('admin');
Route::get('/dashboard/posts/restore/{id}','PostTranController@restore')->name('dashboard.posts.restore')->middleware('admin');
Route::get('/dashboard/posts/forceDelete/{id}','PostTranController@forceDelete')->name('dashboard.posts.forceDelete')->middleware('admin');

//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------
Route::get('/dashboard/order','DashboardController@table3')->name('dashboard.table3')->middleware('admin');
Route::get('/dashboard/table4','DashboardController@table4')->name('dashboard.table4')->middleware('admin');

Route::get('/dashboard/order/edit{id}','DashboardController@table3Edit')->name('dashboard.table3Edit')->middleware('admin');
Route::post('/dashboard/order/update','DashboardController@table3Update')->name('dashboard.table3Update')->middleware('admin');
Route::get('/dashboard/order/Confirm/{id}','DashboardController@confirm')->name('dashboard.table.confirm')->middleware('admin');
Route::get('/dashboard/order/delete','OrderController@show_deletad_at')->name('dashboard.order.delete')->middleware('admin');
Route::get('/dashboard/order/restore/{id}','OrderController@restore')->name('dashboard.order.restore')->middleware('admin');
Route::get('/dashboard/order/forceDelete/{id}','OrderController@forceDelete')->name('dashboard.order.forceDelete')->middleware('admin');
//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------

Route::get('/dashboard/table/destroy/{id}','OrderController@destroy')->name('dashboard.destroy.order')->middleware('admin');
Route::get('/dashboard/table/show/{id}','OrderController@all_show')->name('dashboard.order.all_show')->middleware('admin');
Route::get('/dashboard/table/{id}','HomeController@destroy')->name('dashboard.destroy.user')->middleware('admin');
//-----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------

Route::get('change-language/{language}', 'HomeController@changeLanguage')
->name('user.change-language')->middleware('locale');

Route::get('change-language-front/{language}', 'HomeController@changeLanguageFront')
->name('user.change-language-front')->middleware('locale');












