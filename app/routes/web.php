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

Route::get('/', function () {
    return view('/features');
});


Route::get('/signup', 'App\Http\Controllers\web\SignupController@index');
Route::post('/signup/save', 'App\Http\Controllers\web\SignupController@save_signup');
Route::get('/signup/confirm/{code}', 'App\Http\Controllers\web\SignupController@confirm_signup');
Route::post('/signup/confirm/save', 'App\Http\Controllers\web\SignupController@confirm_signup_save');


Route::get('/', 'App\Http\Controllers\web\LoginController@index');
Route::get('/login', 'App\Http\Controllers\web\LoginController@index');
Route::post('/login/validate', 'App\Http\Controllers\web\LoginController@validate_login');
Route::get('/logout', 'App\Http\Controllers\web\LoginController@logout');


Route::get('/home', 'App\Http\Controllers\web\HomeController@index');

Route::get('/dashboard', 'App\Http\Controllers\web\DashboardController@index');

