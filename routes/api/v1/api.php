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
<<<<<<< HEAD
    Route::post('/register', 'api\v1\LoginController@reg');
    Route::middleware('auth:api')->post('/update', 'api\v1\user\UserController@update');
    Route::middleware('auth:api')->get('/all', 'api\v1\user\UserController@index');
    Route::middleware('auth:api')->get('/current', 'api\v1\user\UserController@currentUser');
    Route::middleware('auth:api')->get('/search', 'api\v1\user\UserController@search');
    Route::middleware('auth:api')->get('/leo', 'api\v1\user\UserController@getleos');
=======
    Route::post('/register', 'api\v1\LoginController@register');
    Route::middleware('auth:api')->get('/all', 'api\v1\user\UserController@index');
    Route::middleware('auth:api')->get('/current', 'api\v1\user\UserController@currentUser');
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
});
Route::prefix('/admin')->group(function() {
    Route::post('/login', 'api\v1\AdminLoginController@login');
    Route::middleware('auth:admin-api')->get('/all', 'api\v1\admin\AdminController@index');
    Route::middleware('auth:admin-api')->get('/current', 'api\v1\admin\AdminController@currentAdmin');
});