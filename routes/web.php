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

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Auth')->group(function() {
    Route::middleware('verified')->get('verify', 'VerificationController@index');
});

// ADMIN
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function() 
{   
    //beranda
    Route::get('/beranda', 'BerandaController@index')->name('beranda.index');
    //edit profile admin
    Route::get('/profile', 'AuthController@profile')->name('profile');
    Route::patch('/profile/update', 'AuthController@profile_update')->name('profile.update');
    //data aduan
    Route::get('/aduan', 'AuthController@data_aduan')->name('data.pengaduan');
    Route::get('/detail/aduan/{id}', 'AuthController@detail_aduan')->name('detail.aduan');
    //search pengaduan
    Route::post('/search', 'AuthController@search')->name('aduan.search');
    //register petugas
    Route::get('/petugas', 'AuthController@petugas')->name('petugas');
    Route::post('/petugas/kirim', 'AuthController@petugas_tambah')->name('petugas.kirim');
    //edit petugas
    Route::get('/edit/petugas{id}', 'AuthController@edit_petugas')->name('edit');
    Route::patch('/edit/petugas/{id}/update', 'AuthController@update')->name('update');
    //detail petugas
    Route::get('/detail/{id}', 'AuthController@detail_petugas')->name('detail.petugas');
    //nonaktif petugas
    Route::delete('/nonaktif/{id}', 'AuthController@petugas_nonaktif')->name('nonaktif.petugas');
    //masyarakat
    Route::get('/masyarakat', 'AuthController@masyarakat')->name('masyarakat');
    Route::get('/detail/masyarakat/{id}', 'AuthController@detail_masyarakat')->name('detail.masyarakat');
    //report 
    Route::get('/pengaduan', 'AuthController@pengaduan')->name('pengaduan');
    Route::get('/pengaduan/report/tanggal/{tglAwal}/{tglAkhir}', 'AuthController@cetak_aduan_pertanggal')->
    name('pengaduan/report/tanggal');
    Route::get('/pengaduan/report/lokasi/{lokasi}', 'AuthController@cetak_aduan_lokasi')->name('pengaduan/report/lokasi');
});

// PETUGAS
Route::namespace('Petugas')->prefix('petugas')->middleware(['auth', 'petugas'])->name('petugas.')->group(function() 
{   
    //beranda
    Route::get('/beranda', 'BerandaController@index')->name('beranda.index');
    //edit profile petugas
    Route::get('/profile', 'AuthController@profile')->name('profile');
    Route::patch('/profile/update', 'AuthController@profile_update')->name('profile.update');
    //pengaduan
    Route::get('/aduan', 'AduanController@index')->name('aduan.index');
    Route::get('/aduan/detail/{id}', 'AduanController@detail')->name('aduan.detail');
    //tanggapan
    Route::get('/tanggapan/{id}', 'AduanController@tanggapan')->name('tanggapan');
    Route::post('/tanggapan/kirim', 'AduanController@tanggapan_kirim')->name('tanggapan.kirim');
});

// MASYARAKAT
Route::namespace('Masyarakat')->prefix('masyarakat')->middleware(['auth', 'masyarakat'])->name('masyarakat.')->group(function() 
{   
    //beranda
    Route::get('/beranda', 'BerandaController@index')->name('beranda.index');
    //edit profile saya
    Route::get('/profile', 'AuthController@profile')->name('profile');
    Route::patch('/profile/update', 'AuthController@profile_update')->name('profile.update');
    //pengaduan
    Route::get('/tulis/aduan', 'AduanController@index')->name('aduan');
    Route::post('/tulis/aduan/kirim', 'AduanController@create')->name('aduan.kirim');
    //tanggapan
    Route::get('/tanggapan/{id}', 'AduanController@tanggapan')->name('tanggapan');
    //pengaduan saya
    Route::get('/detail/pengaduan/{id}', 'AduanController@detail_aduan')->name('pengaduan');
    //edit pengaduan
    Route::get('/edit/pengaduan/{id}', 'AduanController@edit')->name('edit');
    Route::patch('/edit/pengaduan/{id}/kirim', 'AduanController@edit_kirim')->name('edit.kirim');
    //hapus pengaduan
    Route::delete('/hapus/{id}', 'AduanController@hapus_pengaduan')->name('hapus.pengaduan');
});