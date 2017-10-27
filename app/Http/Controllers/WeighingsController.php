<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weighing;
use App\Http\Requests\AddNewWeighing;
use App\Http\Requests\UpdateWeighing;

class WeighingsController extends Controller
{
  public function store(AddNewWeighing $request)
  {
    Weighing::create([
      'pet_id' => request('pet_id'),
      'date' => request('date'),
      'weight' => request('weight'),
      'notes' => request('notes'),
    ]);

    return redirect('/pets/' . request('pet_id'))->with('notifications', [
      'type' => 'success',
      'messages' => [
        'Successfully added weighing.'
      ]
    ]);
  }

  public function update(UpdateWeighing $weighing)
  {
    $weighing_record = Weighing::find( request('id') );

    $weighing_record->date = request('date');
    $weighing_record->weight = request('weight');
    $weighing_record->notes = request('notes');

    $weighing_record->save();


    return redirect('/pets/' . request('pet_id'))->with('notifications', [
      'type' => 'success',
      'messages' => [
        'Successfully updated weighing.'
      ]
    ]);
  }

  public function destroy(Weighing $weighing)
  {
    if( !$weighing->is_initial ):
      $weighing->delete();
      $notifications = array(
        'type' => 'error',
        'messages' => array(
          'Successfully removed weighing.'
        )
      );
    else:
      $notifications = array(
        'type' => 'error',
        'messages' => array(
          'Error: Cannot Remove Initial Weight Record!'
        )
      );
    endif;

    return redirect('/pets/' . request('pet_id'))->with('notifications', $notifications);
  }
}
