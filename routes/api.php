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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'Api\Auth\AuthController@register');
Route::post('login', 'Api\Auth\AuthController@login');

Route::group(['prefix' => 'tugas'], function() {
    Route::group(['middlewar' => 'auth:api'], function() {
        Route::get('get_all', 'API\Tugas\TugasController@getAll');
        Route::post('tambah', 'API\Tugas\TugasController@store');
        Route::post('update', 'API\Tugas\TugasController@update');
        Route::post('hapus', 'API\Tugas\TugasController@destroy');
    });
});
