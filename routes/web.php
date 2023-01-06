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
// user
Route::get('/user', 'Api\UserController@index');
Route::get('/create-user', 'Api\UserController@create');
Route::post('/simpan-user', 'Api\UserController@store');
Route::post('/user', 'Api\UserController@store');
Route::get('/edit-user/{id}', 'Api\UserController@edit');
Route::post('/edit-user/{id}', 'Api\UserController@update');
Route::get('/delete-user/{id}', 'Api\UserController@destroy');
// guru
Route::get('/guru', 'Api\GuruController@index');
Route::get('/create-guru', 'Api\GuruController@create');
Route::post('/simpan-guru', 'Api\GuruController@store');
Route::post('/guru', 'Api\GuruController@store');
Route::get('/edit-guru/{id}', 'Api\GuruController@edit');
Route::post('/edit-guru/{id}', 'Api\GuruController@update');
Route::get('/delete-guru/{id}', 'Api\GuruController@destroy');
// jadwal
Route::get('/jadwal', 'Api\JadwalController@index');
Route::get('/create-jadwal', 'Api\JadwalController@create');
Route::post('/simpan-jadwal', 'Api\JadwalController@store');
Route::post('/jadwal', 'Api\JadwalController@store');
Route::get('/edit-jadwal/{id}', 'Api\JadwalController@edit');
Route::post('/edit-jadwal/{id}', 'Api\JadwalController@update');
Route::get('/delete-jadwal/{id}', 'Api\JadwalController@destroy');
// kelas
Route::get('/kelas', 'Api\KelasController@index');
Route::get('/create-kelas', 'Api\KelasController@create');
Route::post('/simpan-kelas', 'Api\KelasController@store');
Route::post('/kelas', 'Api\KelasController@store');
Route::get('/edit-kelas/{id}', 'Api\KelasController@edit');
Route::post('/edit-kelas/{id}', 'Api\KelasController@update');
Route::get('/delete-kelas/{id}', 'Api\kelasController@destroy');
// mapel
Route::get('/mapel', 'Api\MapelController@index');
Route::get('/create-mapel', 'Api\MapelController@create');
Route::post('/simpan-mapel', 'Api\MapelController@store');
Route::post('/mapel', 'Api\MapelController@store');
Route::get('/edit-mapel/{id}', 'Api\MapelController@edit');
Route::post('/edit-mapel/{id}', 'Api\MapelController@update');
Route::get('/delete-mapel/{id}', 'Api\MapelController@destroy');
// siswa
Route::get('/siswa', 'Api\SiswaController@index');
Route::get('/create-siswa', 'Api\SiswaController@create');
Route::post('/simpan-siswa', 'Api\SiswaController@store');
Route::post('/siswa', 'Api\SiswaController@store');
Route::get('/edit-siswa/{id}', 'Api\SiswaController@edit');
Route::post('/edit-siswa/{id}', 'Api\SiswaController@update');
Route::get('/delete-siswa/{id}', 'Api\SiswaController@destroy');


