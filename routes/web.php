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

// Route::get('', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::resource('', 'DashboardController')->only(['index']);
Route::resource('dashboard', 'DashboardController')->only(['index']);
Route::resource('pemudik', 'PemudikController')->except(['show']);
Route::resource('transit', 'TransitController')->except(['show']);
Route::resource('user', 'UserController')->except(['show']);
Route::get('about', 'ProfileController@about')->name('about');
Route::get('screening/{kd_pemudik}', 'PemudikController@screening')->name('screening');
Route::get('laporkan', 'PemudikController@laporkan')->name('laporkan');
Route::get('api/pemudik', 'PemudikController@getPemudik')->name('apiPemudik');
Route::get('daftarpemudik', 'PemudikController@daftar')->name('pemudik.daftar');
Route::post('storeperjalanan', 'PemudikController@storePerjalanan')->name('pemudik.storeperjalanan');
Route::match(['put', 'patch'],'storeScreening/{kd_pemudik}', 'PemudikController@storeScreening')->name('storeScreening');
Route::get('dashboard/kabupaten/{kd_provinsi}', 'DashboardController@kabupaten')->name('dashboard.kabupaten');
Route::get('dashboard/kecamatan/{kd_kabupaten}', 'DashboardController@kecamatan')->name('dashboard.kecamatan');
Route::get('dashboard/desa/{kd_kecamatan}', 'DashboardController@desa')->name('dashboard.desa');


Route::resource('profile', 'ProfileController')->only(['index'])->middleware('auth:pemudik');

Route::get('daftar', 'Auth\LoginController@daftar')->name('daftar');
Route::get('login', 'Auth\LoginController@getLogin')->middleware('guest');
Route::post('login', 'Auth\LoginController@postLogin');
Route::post('login_admin', 'Auth\LoginController@postAdmin');
Route::post('storeDaftar', 'Auth\LoginController@storeDaftar')->name('storeDaftar');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
