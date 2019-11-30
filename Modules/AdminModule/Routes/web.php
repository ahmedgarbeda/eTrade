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
Auth::routes();
Route::middleware('auth')->prefix('dashboard/admin')->group(function() {
    //Route::resource('/new','AdminModuleController');
    Route::get('/', 'AdminModuleController@index');
    Route::post('/', 'AdminModuleController@store');
    Route::get('/new', 'AdminModuleController@create');
});
