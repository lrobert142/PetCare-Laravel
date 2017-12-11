<?php

// Pet Overview Routes
Route::get('/pets', 'PetsController@index');

Route::post('/pets', 'PetsController@store');

// Individual Pet Routes
Route::get('/pets/{pet}', 'PetsController@show');

Route::patch('/pets/{pet}', 'PetsController@update');

Route::delete('/pet/{pet}', 'PetsController@destroy');

// Weighings Routes
Route::post('/weighings', 'WeighingsController@store');

Route::patch('/weighings/{weighing}', 'WeighingsController@update');

Route::delete('/weighing/{weighing}', 'WeighingsController@destroy');

// Length Records Routes
Route::post('/lengthRecords', 'LengthRecordsController@store');

Route::patch('/lengthRecords/{lengthRecord}', 'LengthRecordsController@update');

Route::delete('/lengthRecords/{lengthRecord}', 'LengthRecordsController@destroy');
