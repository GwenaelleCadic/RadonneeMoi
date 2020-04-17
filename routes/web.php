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
Route::get('country','CountryController@index');
Route::get('country/getStates/{id}','CountryController@getStates');
Route::resource('rando','RandoController');
Route::resource('user','UserController');
Auth::routes();
Route::get('search','RandoController@search');
Route::post('search',['uses'=>'RandoController@searchRando','as'=>'rando.search']);



Route::post('home',['uses' => 'UserController@update_avatar', 'as' =>'profil.update']);
Route::get('events','EventsController@index');
//Comments
Route::post('comments',['uses'=>'CommentsController@store', 'as'=>'comments.store']);
//Création d'une marche flash
Route::post('events',['uses' => 'EventsController@store', 'as' => 'events.store']);
//enregistrement d'une marche dans l'historique
Route::post('historique',['uses'=>'HistoriqueController@store', 'as'=>'historique.store']);
