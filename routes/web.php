<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FooController;
use App\Http\Controllers\BarController;
use Illuminate\Support\Facades\Event;
use App\Events\FooEvent;
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
Route::get('/bar', BarController::class);


// route cache php artisan route:cache
Route::get('/cache', function () {
    return 'cache';
});

// component extensions php artisan make:component ParentButton
Route::get('/buttons', function () {
    return view('buttons-example');
});

// register events
Route::get('/foo/event', [FooController::class, 'event']);
