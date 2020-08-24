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
use Illuminate\Support\Facades\Cache; 
use App\Gestion;
 
Route::get('/', function () {
    return Cache::remember('gestiones.all', 60 * 60 * 24, function () { 
        return Gestion::all(); 
    }); 
});