<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/ordermodule', function (Request $request) {
//     return $request->user();
// });

Route::middleware('jwt.verify')->post('/addToCart','OrderModuleController@addToCart');
Route::middleware('jwt.verify')->post('/checkout','OrderModuleController@checkout');
Route::middleware('jwt.verify')->get('/deleteCart/{id}','OrderModuleController@deleteCart');
Route::middleware('jwt.verify')->get('/getCart','OrderModuleController@getCart');