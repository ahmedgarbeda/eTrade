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

Route::middleware('auth:admin')->prefix('dashboard/users')->group(function() {
    Route::get('/', 'UserModuleController@index');
    Route::get('/{id}/edit','UserModuleController@edit');
    Route::put('/{id}','UserModuleController@update');
    Route::get('/{id}/approve','UserModuleController@approve');
    Route::delete('/{id}','UserModuleController@destroy');
});


