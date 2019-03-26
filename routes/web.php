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

Route::get('/', 'FuelConsumptionController@index');
Route::get('/validateForm', 'FuelConsumptionController@validateForm()');
Route::get('/calculateFuelConsumption', 'FuelConsumption@calculateFuelConsumption()');


