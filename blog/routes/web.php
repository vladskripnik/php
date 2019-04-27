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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'UserController@index')->middleware('auth')->name('user.home');

Route::get('/allgroup', 'GroupController@show')->name('group.show');

Route::post('/group', 'GroupController@create')->name('group.create');

Route::post('/update/{userid}','UserController@updateUsers');

Route::get('/update/{userid}', 'UserController@showUsers')->name('user.update');

Route::delete('/user/{userid}', 'UserController@destroy');

Route::get('/profile', 'UserController@showProfile')->middleware('auth')->name('profile');

Route::post('/profile', 'UserController@updateProfile')->middleware('auth')->name('user.profile');
