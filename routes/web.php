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
Route::get('/user/hapus/{id}', 'userController@destroy')->name('hapus-user')->middleware('role:admin');
Route::get('/user/edit/{id}', 'userController@edit')->name('edit-user')->middleware('role:admin');


Route::resource('/barang', 'BarangController')->middleware('role:admin||user');
Route::get('/barang/hapus/{id}', 'BarangController@destroy');
Route::get('/barang/{id}/edit', 'BarangController@edit');
Route::POST('/barang/{id}', 'BarangController@update');

Route::resource('/suplayer', 'supplierController')->middleware('role:admin||user');
Route::POST('/suplayer', 'supplierController@store')->middleware('role:admin||user');
Route::get('/suplayer/hapus/{id}', 'supplierController@destroy');
Route::get('/suplayer/edit/{id}', 'supplierController@edit');
Route::PUT('/suplayer/{id}', 'supplierController@update');

Route::resource('/akun', 'akunController')->middleware('role:admin||user');
Route::get('/akun/hapus/{kd_akun}', 'akunController@destroy')->middleware('role:admin||user');
Route::get('/akun/edit/{kd_akun}', 'akunController@edit')->middleware('role:admin||user');
Route::PUT('/akun/edit/{kd_akun}', 'akunController@update')->middleware('role:admin||user');

Route::get('/setting', 'SettingController@index')->name('seting.transaksi')->middleware('role:admin||user');

//Pemesanan
Route::get('/transaksi', 'PemesananController@index')->name('pemesanan.transaksi');
Route::post('/sem/store', 'PemesananController@store');
Route::get('/transaksi/hapus/{kd_brg}', 'PemesananController@destroy');
//Detail Pesan
Route::post('/detail/store', 'DetailPesanController@store');
Route::post('/detail/simpan', 'DetailPesanController@simpan');
