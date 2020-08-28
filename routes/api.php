<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/userapi', function (Request $request) {
    // return $request->user();
    return "Hello Apis";
});

Route::post('/reg', 'UserController@regapp');
Route::resource('users', 'UserController');
Route::post('/logout', 'UserController@logout')->name('logout');