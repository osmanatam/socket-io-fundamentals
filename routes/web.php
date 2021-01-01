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

Route::group(['prefix'=>'/','as'=>'haberler.'],function (){
    Route::get('','HaberController@index')->name('');
    Route::get('ekle','HaberController@create')->name('create');
    Route::post('store','HaberController@store')->name('store');
});
