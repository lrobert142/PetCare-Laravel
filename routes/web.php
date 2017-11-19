<?php

Route::get('/pets', 'PetsController@index');

Route::post('/pets', 'PetsController@store');

Route::get('/pets/{pet}', 'PetsController@show');

Route::patch('/pets/{pet}', 'PetsController@update');

Route::delete('/pet/{pet}', 'PetsController@destroy');

Route::post('/weighings', 'WeighingsController@store');

Route::patch('/weighings/{weighing}', 'WeighingsController@update');

Route::delete('/weighing/{weighing}', 'WeighingsController@destroy');

Route::post('/lengthRecords', 'LengthRecordsController@store');
