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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

/* Route::get('tests/{slug}', function (Request $request) {
    return Illuminate\Support\Str::ascii('éééééééééééé');
}); */

Route::post('login', 'Auth\UserController@login');

Route::post('register', 'Auth\UserController@register');

Route::apiResources([
    'gallery' => 'GalleryController'
]);

Route::post('upload', 'UploadController@store');