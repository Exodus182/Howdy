<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class , 'index'])->name('home');

Route::get('order/{id}', 'App\Http\Controllers\OrderController@index');
Route::post('order/{id}', 'App\Http\Controllers\OrderController@order');

Route::get('checkout', 'App\Http\Controllers\OrderController@checkout');
Route::delete('checkout/{id}', 'App\Http\Controllers\OrderController@delete_cart');
Route::get('confirm-checkout', 'App\Http\Controllers\OrderController@confirm_checkout');

Route::get('history', 'App\Http\Controllers\HistoryController@index');
Route::get('history/{id}', 'App\Http\Controllers\HistoryController@history_detail');

Route::get('profile', 'App\Http\Controllers\ProfileController@index');
Route::get('/editprofile', 'App\Http\Controllers\ProfileController@editprofile');
Route::post('profile', 'App\Http\Controllers\ProfileController@update_profile');

Route::get('article', 'App\Http\Controllers\ArticleController@get_articles');

Route::get('dashboard', 'App\Http\Controllers\AdminController@index');
Route::get('/add-items', [App\Http\Controllers\AdminController::class , 'create']);
Route::post('/add-items', 'App\Http\Controllers\AdminController@store');
Route::get('/delete-items', 'App\Http\Controllers\AdminController@deleteItem');
Route::delete('/delete-items/{id}', 'App\Http\Controllers\AdminController@destroy');