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

Route::prefix('/dashboard/order')->group(function() {
    Route::get('/', 'OrderModuleController@index');
    Route::get('/{order_id}/status/{status_id}','OrderModuleController@updateStatus');
    Route::delete('/{id}','OrderModuleController@destroy');
});
