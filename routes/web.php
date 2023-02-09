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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','JsonController@index');
Route::get('add/','JsonController@add');
Route::post('/save','JsonController@save');
Route::get('/delete/{id}','JsonController@remove');
Route::get('/edit/{id}','JsonController@edit');
Route::post('update/{id}','JsonController@update');
