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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RandomController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/{search}', [SearchController::class, 'searchResults'])->name('search.results');

Route::get('/random', [RandomController::class, 'index'])->name('random.index');