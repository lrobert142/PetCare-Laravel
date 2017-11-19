<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Pet;
use App\Weighing;
use App\LengthRecord;
use App\Http\Requests\AddNewPet;
use App\Http\Requests\UpdatePet;

class PetsController extends Controller
{
    public function index()
    {
      $pets = Pet::all();

      return view('pets.index', compact('pets'));
    }

    public function show(Pet $pet)
    {
      // TODO Get Length data
      $lava = new LavaCharts;
      $weighings = Pet::weighings_with_diffs($pet->id);
      $weighingsTable = $lava->DataTable();

      $weighingsTable->addDateColumn('Date')
        ->addNumberColumn('Weight')
        ->addRoleColumn('string', 'tooltip', ['html' => true]);

      $previousWeighing = null;
      foreach($weighings as $weighing):
        $tooltip = '<div class="graph__tooltip">'
          . '<strong>' . $weighing->formatted_date . '</strong>'
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
      DB::transaction(function () {
        $path = request()->photo->store('images', 'public');

        $pet = Pet::create([
          'name' => request('name'),
          'date_of_birth' => request('date_of_birth'),
          'photo_url' => $path,
          'gender' => request('gender'),
          'scientific_species_name' => request('scientific_species_name'),
          'common_species_name' => request('common_species_name'),
          'notes' => request('notes'),
        ]);

        Weighing::create([
          'pet_id' => $pet->id,
          'weight' => request('weight'),
          'is_initial' => true,
          'notes' => 'Initial Weight',
        ]);

        LengthRecord::create([
          'pet_id' => $pet->id,
          'length' => request('length'),
          'is_initial' => true,
          'notes' => 'Initial Length',
        ]);
      });


      return redirect('/pets/#')->with('notifications', [
        'type' => 'success',
        'messages' => [
          'Successfully added new pet: ' . request('name')
        ]
      ]);
    }

    public function update(UpdatePet $request)
    {
      $pet_record = Pet::find( request('pet_id') );

      $pet_record->name = request('name');
      $pet_record->date_of_birth = request('date_of_birth');
      $pet_record->gender = request('gender');
      $pet_record->scientific_species_name = request('scientific_species_name');
      $pet_record->common_species_name = request('common_species_name');
      $pet_record->length = request('length');
      $pet_record->notes = request('notes');

      if( isset(request()->photo) ):
        $path = request()->photo->store('images', 'public');
        $pet_record->photo_url = $path;
      endif;

      $pet_record->save();

      return redirect('/pets/' . request('id') . '#')->with('notifications', [
        'type' => 'success',
        'messages' => [
          'Successfully updated pet!'
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
