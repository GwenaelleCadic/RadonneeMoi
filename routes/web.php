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

//Liens vers les marches
Route::get('/','RandoController@index');
Route::resource('newRando','RandoController');

//page personnalisé de l'utilisateur
Route::get('/home', 'HomeController@index')->name('home');

//Gestion de l'utilisateur
//Route::resource('user','UserController');
Auth::routes();

//Comments
Route::post('comments',['uses'=>'CommentsController@store', 'as'=>'comments.store']);

//upload d'une photo de profil
Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');
Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');