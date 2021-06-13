<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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


Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::group(['prefix'=>'typeproduct'],function(){
        Route::get('list','TypeController@getList')->name('index');

        Route::get('edit/{id}','TypeController@getEdit')->name('getedit');
        Route::post('edit/{id}','TypeController@postEdit')->name('postedit');

        Route::get('delete/{id}','TypeController@getDelete')->name('getdelete');
        Route::get('add','TypeController@getAdd')->name('getAdd');
        Route::post('add','TypeController@postAdd')->name('postAdd');
        });

    Route::group(['prefix'=>'product'],function(){
        Route::get('list','ProductController@getList')->name('getList');
        Route::get('delete/{id}','ProductController@getDelete')->name('getdeleteproduct');

        Route::get('edit/{id}','ProductController@getEdit')->name('geteditproduct');
        Route::post('edit/{id}','ProductController@postEdit')->name('posteditproduct');

        Route::get('add','ProductController@getAdd')->name('getaddproduct');
        Route::post('add','ProductController@postAddproduct')->name('postaddproduct');


    });

    Route::group(['prefix'=>'user'],function(){

        Route::get('list','UserController@getList')->name('getlistuser');

        Route::get('delete/{id}','UserController@getDelete')->name('getdeleteuser');

        Route::get('edit/{id}','UserController@getEdit')->name('getedituser');
        Route::post('edit/{id}','UserController@postEdit')->name('postedituser');
    });

    Route::group(['prefix'=>'order'],function(){
        Route::get('list','OrderController@getList')->name('getlistorder');

        Route::get('delete/{id}','OrderController@getDelete')->name('getdeleteorder');

        Route::get('billdetails/{id}','OrderController@getBill')->name('getbilldetails');
    });
});

Route::get('bestseller','PageController@bestseller');

Route::get('/','PageController@trangchu')->name('trangchu');

Route::get('typeproduct/{id}','PageController@typeProduct')->name('typeproduct');
Route::get('/about','PageController@about')->name('about');
Route::get('contact','PageController@contact')->name('contact');
Route::get('product/{id}','PageController@product')->name('product');

Route::get('dangnhap','UserController@login')->name('login');
Route::post('dangnhap','UserController@postLogin')->name('postlogin');


Route::get('dangky','UserController@register')->name('register');
Route::get('check_email','UserController@checkEmail');
Route::post('dangky','UserController@postRegister')->name('postregister');



Route::get('logout','UserController@getLogout')->name('logout');

Route::get('emailsend',function(){
    return view('mail.mail_checkout');
});
// Auth::routes(['verify' => true]);

Route::get('error','PageController@error')->name('error');
Route::get('paginate','PageController@paginate');
Route::get('paginatelikeproduct/{idtype}','PageController@paginationlikeproduct');

Route::get('shopping-cart','CartController@shoppingCart')->name('shoppingcart');
Route::get('delete-item-listcart/{id}','CartController@deleteItemListCart');

Route::post('addcart','CartController@addCart')->name('addcart');
Route::get('addcart','CartController@getaddCart')->name('getaddcart');

Route::get('cartheader','CartController@cartHeader');
Route::get('delete-cart/{id}','CartController@deleteCart');

Route::get('edit-cart/{id}/{quantity}','CartController@editItemListCart')->name('editcart');
// Auth::routes();
Route::get('checkout','PageController@checkout')->name('checkout')->middleware('checkout');
Route::post('checkout','PageController@postCheckout')->name('postcheckout');

Route::get('timkiem','PageController@getsearch')->name('search');










