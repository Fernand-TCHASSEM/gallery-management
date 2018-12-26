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

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\LoginController@get');
    Route::post('/', 'Admin\LoginController@post');

    Route::get('logout', 'Admin\LogoutController@get');

    Route::get('dashboard', 'Admin\DashboardController@get');

    Route::get('gallery/create', 'Admin\DashboardController@create');

    Route::get('gallery/{id}/update', 'Admin\DashboardController@update');

});

Route::get('/', 'Front\HomeController@get');

Route::get('/{id}', 'Front\HomeController@show')->where('id', '[0-9]+');