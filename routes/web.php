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
    return view('welcome');
});

Route::get('/login', 'AuthController@index')->name('login');
Route::post('/postLogin', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');

Route::resource('/dashboard', 'HomeController')->middleware('auth');
Route::resource('/pelanggan', 'PelangganController')->middleware('auth');
Route::resource('/barang', 'BarangController')->middleware('auth');
Route::resource('/pemasok', 'PemasokController')->middleware('auth');
Route::resource('/pembelian', 'PembelianController')->middleware('auth');
Route::resource('/penjualan', 'PenjualanController')->middleware('auth');
Route::resource('/setting', 'SettingController')->middleware('auth');
Route::resource('/laporan', 'LaporanController')->middleware('auth');