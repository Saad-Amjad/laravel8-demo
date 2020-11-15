<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FooController;
use App\Http\Controllers\BarController;
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

//earlier
//Route::get('/foo', 'FooController@index');

// now
Route::get('/foo', [FooController::class, 'index']);

// now
Route::get('/bar', BarController::class);



