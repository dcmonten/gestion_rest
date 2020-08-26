<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('gestion','GestionController@index')->name('gestiones.db');
Route::get('gestion/cache','GestionController@index_with_cache')->name('gestiones.cache');
Route::get('cache','GestionController@redis_test')->name('cache.test');
Route::get('ping','GestionController@ping')->name('ping');
