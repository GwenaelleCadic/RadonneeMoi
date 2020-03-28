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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','RandoController@index');
Route::resource('newRando','RandoController');
Route::resource('user','UserController');
Auth::routes();

Route::get('profile','UserController@profile');
Route::post('profile',['uses' => 'UserController@update_avatar', 'as' =>'profil.update']);
//Comments
Route::post('comments',['uses'=>'CommentsController@store', 'as'=>'comments.store']);