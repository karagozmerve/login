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

Route::get("home", array('as'=>'index','uses'=>'HomeController@index'));
Route::POST("store",'HomeController@store');
Route::get('/store','HomeController@showstore');
Route::get('/sil/{id?}',array('as'=>'sil','uses'=>'HomeController@sil'));
Route::get('/duzenle/{id?}',array('as'=>'duzenle','uses'=>'HomeController@duzenle'));
Route::POST('/duzenle',array('as'=>'duzenle','uses'=>'HomeController@postduzenle'));
Route::get("tags",'HomeController@tags');
Route::post("tags",'TagsController@tags');

/*Route::get('sorular/tags',function(){
    return \App\sorular::find(2)->tags;
});
*/



