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
    return view('newRando');
});

Route::get('newRando', 'RandoController@getMarche');
Route::post('newRando',['uses' => 'RandoController@postMarche','as'=> 'storeMarche']);

