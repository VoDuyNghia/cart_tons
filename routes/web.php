<?php

use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;

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

Route::namespace('Admin\Auth')->prefix('admin/account')->group(function () {
    Route::get('login', 'LoginController@login')->name('admin.auth.login');
    Route::post('login', 'LoginController@postlogin')->name('admin.auth.login');
    Route::get('logout', 'LoginController@logout')->name('admin.auth.logout');
    Route::get('forgot', 'ForgotPasswordController@forgot')->name('admin.auth.forgot');
    Route::post('forgot', 'ForgotPasswordController@postForgot')->name('admin.auth.forgot');
});

Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('', 'IndexController@dashboad')->name('admin.dashboard.index');
    Route::get('change/password', 'Auth\LoginController@indexAccount')->name('admin.dashboard.account');
    Route::post('change/password', 'Auth\LoginController@updateAccount')->name('admin.dashboard.account');

    Route::get('cities/data', 'CityController@anyData')->name('cities.data');
    Route::get('news/data', 'NewController@anyData')->name('news.data');
    Route::get('products/data', 'ProductController@anyData')->name('products.data');
    
    Route::resources([
        'cities' => 'CityController',
        'news' => 'NewController',
        'products' => 'ProductController',
    ]);
    Route::post('cities/{id}/update', 'CityController@update')->name('cities.update');
    Route::post('news/{id}/update', 'NewController@update')->name('news.update');
    Route::post('products/{id}/update', 'ProductController@update')->name('products.update');

    Route::delete('products/image/{id}', 'ProductController@deleteImage')->name('delete.image');

    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::get('orders/data', 'OrderController@anyData')->name('orders.data');
    Route::get('orders/show/{id}', 'OrderController@show')->name('orders.show');
    Route::post('orders/{id}/update', 'OrderController@update')->name('orders.update');

    Route::get('orders/day', 'IndexController@dataByDay')->name('orders.day');
    Route::get('orders/month', 'IndexController@dataByMonth')->name('orders.month');
});


Route::namespace('UI')->group(function () {
    Route::get('cities', 'CartController@getCity')->name('ajax.city');
    Route::get('districts', 'CartController@getDistrict')->name('ajax.district');
    Route::get('checkout', 'CartController@checkOut')->name('ui.cart.checkout');
});
