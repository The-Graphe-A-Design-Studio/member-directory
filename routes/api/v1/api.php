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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/user')->group(function() {
    Route::post('/login', 'api\v1\LoginController@login');
    Route::post('/register', 'api\v1\LoginController@register');
    Route::middleware('auth:api')->get('/all', 'api\v1\user\UserController@index');
    Route::middleware('auth:api')->get('/current', 'api\v1\user\UserController@currentUser');
});
Route::prefix('/admin')->group(function() {
    Route::post('/login', 'api\v1\AdminLoginController@login');
    Route::middleware('auth:admin-api')->get('/all', 'api\v1\admin\AdminController@index');
    Route::middleware('auth:admin-api')->get('/current', 'api\v1\admin\AdminController@currentAdmin');
});