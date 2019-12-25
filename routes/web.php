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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth:admin');

Route::get('/product/create' , 'UserProductController@create');
Route::post('/product' , 'UserProductController@store')->name('product.user');



Route::get('/email' , function (){


    $data = [
        'title' => 'this is email from etrade title',
        'body' => 'this is email from etrade body'
    ];

    Mail::send('emails.test' , $data , function ($message){
        $message->to('20130975@std.sci.cu.edu.eg')->subject('message from etrade');
    });

    });
