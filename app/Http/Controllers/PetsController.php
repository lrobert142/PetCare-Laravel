<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Pet;
use App\Weighing;
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
      $weighings = Pet::weighings($pet->id)->get();

      $lava = new LavaCharts;
      $weighingsTable = $lava->DataTable();
      $weighingsTable->addDateColumn('Date')
        ->addNumberColumn('Weight');
      // TODO Random Data For Example
      for ($a = 1; $a < 30; $a++) {
          $weighingsTable->addRow([
            '2015-10-' . $a, rand(800,1000)
          ]);
      }
      $chart = $lava->LineChart('Weighings', $weighingsTable);

      return view('pets.show', compact('pet', 'weighings', 'lava'));
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
