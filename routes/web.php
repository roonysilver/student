<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
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
   return view('welcome');
});
Route::get('/login', 'HomeController@home');
Route::post('login', 'UserController@postlogin')->name('login');

Route::middleware('auth')->group(function(){
    Route::get('logout', 'UserController@logout');
    Route::get('admin', 'UserController@admin');  
});


Route::middleware('auth')->group(function(){
Route::resource('student', 'StudentController');
});

//route to login form