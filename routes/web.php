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

Route::get('/pets', function () {
  $pets = DB::table('pets')->get();

  return view('pets.index', compact('pets'));
});

Route::get('/pets/{pet}', function ($id) {
  $pet = DB::table('pets')->find($id);

  return view('pets.show', compact('pet'));
});
