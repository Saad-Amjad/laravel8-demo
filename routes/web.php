<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FooController;
use App\Http\Controllers\BarController;
use App\Exceptions\FooException;

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
Route::get('/foo/events', [FooController::class, 'event']);

// catch queue and backoff job showcase
Route::get('/foo/queue', [FooController::class, 'queue']);

// job batching
Route::get('/foo/batch', [FooController::class, 'batch']);

// find batch id
Route::get('/foo/batch/{id}', [FooController::class, 'showBatch']);

// showcase rate limiting
Route::middleware(['throttle:foo'])->get('/foo/limit', function (Request $request) {
    return 'Foo Limit';
});
Route::middleware(['throttle:bar'])->get('/bar/limit', function (Request $request) {
    return 'Bar Limit';
});

Route::get('/foo/custom', function () {
    throw new FooException();
});
