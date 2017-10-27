<?php

Route::get('/pets', 'PetsController@index');

Route::get('/pets/{pet}', 'PetsController@show');

Route::post('/pets', 'PetsController@store');

Route::delete('/pet/{pet}', 'PetsController@destroy');

Route::post('/weighings', 'WeighingsController@store');

Route::patch('/weighings/{weighing}', 'WeighingsController@update');

Route::delete('/weighing/{weighing}', 'WeighingsController@destroy');
