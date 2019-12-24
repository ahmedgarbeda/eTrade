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

// Route::middleware('auth:api')->get('/commonmodule', function (Request $request) {
//     return $request->user();
// });

Route::get('/governrates','GovernrateController@getAllGovernrates');
Route::post('/contact','ContactController@saveContactMessage');
Route::get('/shipping_methods/{governrate_id}','ShippingMethodsController@getShippingMethods');
Route::get('/payment_methods','PaymentMethodsController@getPaymentMethods');