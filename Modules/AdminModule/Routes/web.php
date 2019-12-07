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
//Auth::routes();
Route::middleware('web','auth')->prefix('dashboard/admin')->group(function() {
    //Route::resource('/admin','AdminModuleController');
    Route::get('/', 'AdminModuleController@index');
    Route::post('/','AdminModuleController@store');
    Route::get('/create','AdminModuleController@create');
    Route::put('/{id}','AdminModuleController@update');
    Route::get('/{id}/edit','AdminModuleController@edit');
    Route::delete('/{id}','AdminModuleController@destroy');
});


Route::middleware('web','auth')->prefix('dashboard/roles')->group(function() {
    //Route::resource('/admin','AdminModuleController');
    Route::get('/', 'RoleController@index');
    Route::post('/','RoleController@store');
    Route::get('/create','RoleController@create');
    Route::put('/{id}','RoleController@update');
    Route::get('/{id}/edit','RoleController@edit');
    Route::delete('/{id}','RoleController@destroy');
});
