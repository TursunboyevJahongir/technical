<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
// Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('login', 'loginController@showLogin')->name('login');
Route::post('logout', 'loginController@logout');
Route::post('checklogin', 'loginController@checklogin');
Route::get('register', 'RegisterController@showForm');
Route::post('register', 'RegisterController@register');

Route::group(['middleware' => 'is-logined'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    //2. Работа с формами и запросами
    Route::get('/article/create','ArticleController@create');
    Route::post('/article','ArticleController@store');
    Route::get('/article/{article}','ArticleController@show');
    Route::delete('/article/{article}','ArticleController@destroy');

});
