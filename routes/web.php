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

// Route::get('/', function () {
//     return view('welcome');
// });

// login
Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@loginPost');

// daftar
Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@registerPost');

// lupa password
Route::get('/forgot', 'UserController@forgot');
Route::post('/forgot', 'UserController@forgotPost');

// reset password
Route::get('/reset/{token}/{email}', 'UserController@reset');
Route::post('/reset', 'UserController@resetPost');

// logout
Route::get('/logout', 'UserController@logout');

// verifikasi akun
Route::get('/verify/{token}/{email}', 'UserController@verify'); //verifikasi register

// hanya bisa di akses admin
Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', 'DashboardController@admin');
});

// hanya bisa di akses user
Route::group(['middleware' => 'user'], function(){
    Route::get('/', 'DashboardController@user');
});
