<?php

Route::get('/pets', 'PetsController@index');

Route::get('/pets/{pet}', 'PetsController@show');

Route::post('/pets', 'PetsController@store');
