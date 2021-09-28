<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('front.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    route::get('/', 'Admin\DashboardController@index');
    route::resource('/kategori', 'Admin\KategoriController');
    route::resource('/tugas', 'Admin\TugasController');
    route::resource('/coba', 'Admin\CobaController');
    route::resource('/cobaa', 'Admin\CobaaController');
    route::resource('/pegawai', 'Admin\PegawaiController');
    route::resource('/menu', 'Admin\MenuController');
    route::resource('/roles', 'Admin\RoleController');
    route::resource('/users', 'Admin\UserController');
});
