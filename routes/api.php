<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('pemudikkecamatan', 'Api\ApiPemudikController@pemudikKecamatan');
Route::get('pemudikDesa', 'Api\ApiPemudikController@pemudikDesa');

Route::get('getDesa/{kd_kecamatan}','Api\ApiPemudikController@getDesa');
Route::get('getKecamatan/{kd_kabupaten}','Api\ApiPemudikController@getKecamatan');
Route::get('getKabupaten/{kd_provinsi}','Api\ApiPemudikController@getKabupaten');
Route::get('getPemudik','Api\ApiPemudikController@getPemudik');

