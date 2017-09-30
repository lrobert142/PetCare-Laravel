<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Http\Requests\AddNewPet;

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

    public function store(AddNewPet $request)
    {
      $path = request()->photo->store('images', 'public');

      Pet::create([
        'name' => request('name'),
        'date_of_birth' => request('date_of_birth'),
        'weight' => request('weight'),
        'photo_url' => $path,
        'gender' => request('gender'),
        'scientific_species_name' => request('scientific_species_name'),
        'common_species_name' => request('common_species_name'),
        'length' => request('length'),
        'notes' => request('notes'),
      ]);

      return redirect('/pets')->with('notifications', [
        'type' => 'success',
        'messages' => [
          'Successfully added new pet: ' . request('name')
        ]
      ]);
    }

    public function destroy(Pet $pet)
    {
      $pet->delete();
      return redirect('/pets')->with('notifications', [
        'type' => 'success',
        'messages' => [
          'Successfully removed pet'
        ]
      ]);
    }
}
