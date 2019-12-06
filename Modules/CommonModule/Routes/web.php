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

Route::prefix('dashboard')->group(function () {
    Route::get('/', 'CommonModuleController@index');
    Route::get('/contact', 'ContactController@index');
    Route::get('/slider', 'SliderController@index');
    Route::get('/admin', 'AdminController@index');
    Route::get('/user', 'UserController@index');
    Route::get('/settings', 'CommonModuleController@settings');
});
