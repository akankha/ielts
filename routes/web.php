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

Route::get('/', 'listeningController@index')->name('index');
Auth::routes();
Route::get('/add', 'HomeController@index')->name('home');
Route::post('/addlistening', 'listening_questionController@store')->name('listeing.questionans');

//Route::get('/listening',function(){listening.blade.php
//    return view ('listening');
//});
route::get('/listening','listeningController@index')->name('listening');
Route::get('/listeningans/{id}', 'listeningController@show')->name('listening.ans');
Route::post('/listeningans', 'listeningController@store')->name('listening.ans.save');
Route::post('/result', 'listeningController@result')->name('listening.ans.result');
//    Route::get('user/{id}','listeningController@show');
