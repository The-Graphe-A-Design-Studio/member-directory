<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/{any}', 'AppController@index')->where('any', '.*');
Route::get('/app', 'AppController@index')->name('home');
Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
// Route::post('/user/register', 'Auth\RegisterController@register')->name('user.register');

Route::prefix('/admin')->group( function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    // Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('', 'AdminController@index')->name('admin.dashboard');
    // Route::post('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
    Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
});