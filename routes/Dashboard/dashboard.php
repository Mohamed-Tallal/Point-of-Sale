<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
         function(){
            Route::get('/','HomeController@index')->name('Admin.Dashboard')->middleware('auth');

    Route::prefix('Dashboard')->middleware('auth')->group(function () {
        Route::get('/','HomeController@index')->name('Admin.Dashboard');
        Route::get('/Home','HomeController@index')->name('Admin.Dashboard');
        Route::resource('admin','AdminController')->except('show');
        Route::resource('category','CategoryController')->except('show');
        Route::resource('product','ProductController')->except('show');
        Route::resource('client','ClientController')->except('show');
        Route::get('Client/Order/{id}','ClientOrController@show')->name('Client.Order');
        Route::resource('order','OrderController')->except('show');
        Route::get('Client/checkOut/{id}','ClientOrController@checkOut')->name('Client.Order.checkOut');
        Route::get('Prepare','ClientOrController@Prepare')->name('Client.Order.Prepare');

    });


});


