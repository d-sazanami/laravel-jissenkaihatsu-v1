<?php

use App\Http\Controllers\Sample;
use App\Http\Controllers\Sample\SampleController;
use App\Http\Middleware\HelloMiddleware;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{person}', 'App\Http\Controllers\HelloController@index');

Route::namespace('Sample')->group(function() {
    Route::get('/sample', [SampleController::class, 'index']);
    Route::get('/sample/other', [SampleController::class, 'other']);
});
