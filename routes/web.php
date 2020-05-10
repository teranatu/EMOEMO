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

Route::get('/', function () {
    return redirect()->route('lp');
});

Route::get('/', function () {
    return view('welcome');
})->name('lp');

Auth::routes();

Route::resource('memos', 'MemosController');


/* twitter login root */
// ログインURL
Route::prefix('auth')->group(function () {
    Route::get('twitter', 'AuthController@login');
    Route::get('twitter/callback', 'AuthController@callback');
});

Route::get('/memos/{memo}/tweet', 'MemosController@tweet')->name('tweet');
Route::get('/tweeted', 'MemosController@sortmemotweeted')->name('tweeted');
Route::get('/nonetweet', 'MemosController@sortmemononetweet')->name('nonetweet');

