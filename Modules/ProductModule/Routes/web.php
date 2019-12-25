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

//Route::prefix('productmodule')->group(function() {
//    Route::get('/', 'ProductModuleController@index');
//});



Route::prefix('productmodule')->group(function() {
    Route::resource('/product', 'ProductModuleController');
});



Route::prefix('productmodule')->group(function() {
    Route::resource('/category' , 'CategoryModuleController');
});

Route::prefix('productmodule')->group(function() {
    Route::resource('/offer' , 'OfferModuleController');
});


Route::prefix('productmodule')->group(function() {
    Route::get('/productApprovment/{id}' , [ 'as' => 'approve.product' , 'uses' => 'ProductModuleController@approvment'] );
});


