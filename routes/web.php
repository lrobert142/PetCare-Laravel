<?php

Route::get('/pets', 'PetsController@index');

Route::get('/pets/create', 'PetsController@create');

Route::get('/pets/{pet}', 'PetsController@show');

Route::post('/pets', 'PetsController@store');
