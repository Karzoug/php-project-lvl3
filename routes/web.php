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

// добавить новый
Route::get('/', 'App\Http\Controllers\UrlController@create')->name('urls.create');
Route::post('urls', 'App\Http\Controllers\UrlController@store')->name('urls.store');

// список всех
Route::get('urls', 'App\Http\Controllers\UrlController@index')->name('urls.index');

// добавить новую проверку
Route::post('urls/{id}/checks', 'App\Http\Controllers\UrlCheckController@store')->name('url_checks.store');

// просмотр одного
Route::get('urls/{id}', 'App\Http\Controllers\UrlController@show')->name('urls.show');

//Route::resource('urls', UrlController::class);
