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

    public function store(Request $request)
    {
      request()->validate([
        'name' => 'required|string',
        'date_of_birth' => 'required|date',
        'weight' => 'required|numeric',
        'photo' => 'required|file'
      ]);

      $path = request()->photo->store('images', 'public');

      Pet::create([
        'name' => request('name'),
        'date_of_birth' => request('date_of_birth'),
        'weight' => request('weight'),
        'photo_url' => $path,
      ]);

      return redirect('/pets')->with('notifications', [
        'type' => 'success',
        [
          'Successfully added new pet: ' . request('name')
        ]
      ]);
    }
}
