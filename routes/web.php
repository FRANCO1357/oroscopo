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

Route::get('/', function () {
    return view('guest/welcome');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->middleware('auth')->name('admin.home');

Route::get('/admin/horoscopes/import', 'HoroscopesImportController@show')->name('admin.horoscopes.import');
Route::post('/admin/horoscopes/import', 'HoroscopesImportController@store');

