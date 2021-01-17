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

Route::get('/', 'FrontController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('transactions/{type}', 'FrontController@transactions');
Route::post('transactions', 'FrontController@store_transactions');
Route::post('vehicles', 'VehicleController@store');
Route::post('reviews', 'ReviewController@store');
Route::resource('prices', 'PriceController');
Route::resource('employees', 'EmployeeController');
Route::resource('outlets', 'OutletController');

Route::get('getMemberFromPoliceNumber/{police_number}', 'FrontController@getMemberFromPoliceNumber');
Route::get('invoice/{transaction_id}', 'FrontController@invoice');

Route::get('reminder', 'SendEmailController@index');
