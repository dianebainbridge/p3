<?php

/*
 * Misc "static" pages
 */
Route::view('/about','about');
Route::view('/contact','contact');
Route::get('/', 'FuelConsumptionController@index');
/*
 * Fuel Consumption Calculator
 */
#Show the form and log
Route::view('/viewLog','fuelConsumptionCalculator.viewLog');
Route::view('/form','fuelConsumptionCalculator.form');

#Process the form
Route::get('/fuelConsumptionCalculator/form-process', 'FuelConsumptionController@formProcess');
# Show the  form
Route::get('/fuelConsumptionCalculator/show-form', 'FuelConsumptionController@showForm');
#get the fuel Log
Route::get('/fuelConsumptionCalculator/get-fuel-log', 'FuelConsumptionController@getFuelLog');





