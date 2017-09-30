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
      $lava = new LavaCharts;
      $weighings = Pet::weighings_with_diffs($pet->id);
      $weighingsTable = $lava->DataTable();

      $weighingsTable->addDateColumn('Date')
        ->addNumberColumn('Weight')
        ->addRoleColumn('string', 'tooltip', ['html' => true]);

      $previousWeighing = null;
      foreach($weighings as $weighing):
        $tooltip = '<div class="graph__tooltip">'
          . '<strong>' . $weighing->date . '</strong>'
          . '<br />' . '<strong>Weight:</strong> ' . $weighing->weight . 'g'
          . '<br />' . '<strong>' . sprintf('%0.2f', $weighing->diff_grams) . 'g (' . sprintf('%0.2f', $weighing->diff_percent) . '%)' . '</strong>'
          . '</div>';

        $weighingsTable->addRow([$weighing->date, $weighing->weight, $tooltip]);
        $previousWeighing = $weighing;
      endforeach;

      $chartOptions = [
        'title' => 'Weight History',
        'elementId' => 'weighings-table',
        'tooltip' => ['isHtml' => true],
      ];
      $chart = $lava->LineChart('Weighings', $weighingsTable, $chartOptions);

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
