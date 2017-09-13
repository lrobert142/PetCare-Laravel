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

Route::get('/', function () {
  $pets = [
    [
      'photo' => 'http://placehold.it/100x100',
      'name' => 'Grumpy',
      'age' => 1,
      'weight' => 270
    ],
    [
      'photo' => 'http://placehold.it/100x100',
      'name' => 'Hiccup',
      'age' => 1,
      'weight' => 170
    ],
    [
      'photo' => 'http://placehold.it/100x100',
      'name' => 'Scramasax',
      'age' => 'Unknown',
      'weight' => 3000
    ]
  ];

  return view('welcome', compact('pets'));
});
