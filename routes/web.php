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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/maches', 'UserController@Matches')->name('Matches');
Route::post('user-register', 'UserController@register')->name('UserRegister');
Route::get('view-profile/{id}', 'UserController@viewProfile')->name('viewProfile');
Route::get('search', 'UserController@search')->name('search');
Route::get('addFriend/{id}', 'UserController@addFriend')->name('addFriend');
Route::get('calcelFriend/{id}', 'UserController@calcelFriend')->name('calcelFriend');

