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


Route::get('/dashboard/login','CommonModuleController@loginView')->name('adminLogin');
//Route::post('/dashboard/login','CommonModuleController@login');
Route::middleware('auth:admin')->prefix('dashboard')->group(function () {

    Route::get('/', 'CommonModuleController@index');
    Route::get('/contact', 'ContactController@index');
    Route::get('/slider', 'SliderController@index');
    Route::get('/settings', 'CommonModuleController@settings');
    Route::post('/settings', 'CommonModuleController@setSettings');
    Route::get('/', 'CommonModuleController@index');
    Route::resource('/contact', 'ContactController');
    Route::resource('/slider', 'SliderController');
});
