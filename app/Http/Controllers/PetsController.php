<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;

class PetsController extends Controller
{
    public function index()
    {
      $pets = Pet::all();

      return view('pets.index', compact('pets'));
    }

    public function show(Pet $pet)
    {
      return view('pets.show', compact('pet'));
    }
}
