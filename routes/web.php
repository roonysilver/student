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


Route::get('/login', 'HomeController@home');
Route::post('login', 'UserController@postlogin')->name('login');

Route::middleware('auth')->group(function(){
    Route::get('logout', 'UserController@logout');
    Route::get('admin', 'UserController@admin');  
});


//route to login form