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

Route::get("home", 'HomeController@index');
Route::POST("store",'HomeController@store');
Route::get('/sil/{id?}',array('as'=>'sil','uses'=>'HomeController@sil'));
Route::get('/duzenle/{id?}',array('as'=>'duzenle','uses'=>'HomeController@duzenle'));
Route::POST('/duzenle',array('as'=>'duzenle','uses'=>'HomeController@postduzenle'));


