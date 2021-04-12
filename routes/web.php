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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user', 'userController')->middleware('role:admin');
Route::get('/user', 'userController@index')->name('user')->middleware('role:admin');
Route::POST('/user', 'userController@store')->name('user');

Route::resource('/barang', 'BarangController')->middleware('role:admin||user');
Route::get('/barang/hapus/{id}', 'BarangController@destroy');
Route::get('/barang/edit/{id}', 'BarangController@edit');
