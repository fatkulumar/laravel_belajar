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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lok', 'LokasiController@lok')->name('lok');
Route::get('/save/{longitude}/{latitude}', 'LokasiController@store')->name('store');
Route::get('/data', 'LokasiController@data')->name('data');
Route::get('/lokasi', 'LokasiController@lokasi')->name('lokasi');
Route::get('/', 'LokasiController@index')->name('index');
