<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LengthRecord;
use App\Http\Requests\AddNewLengthRecord;
use App\Http\Requests\UpdateLengthRecord;

class LengthRecordsController extends Controller
{
  public function store(AddNewLengthRecord $request)
  {
    LengthRecord::create([
      'pet_id' => request('pet_id'),
      'date' => request('date'),
      'length' => request('length'),
      'notes' => request('notes'),
    ]);

    return redirect('/pets/' . request('pet_id') . '#')->with('notifications', [
      'type' => 'success',
      'messages' => [
        'Successfully added length record.'
      ]
    ]);
  }

  public function update(UpdateLengthRecord $lengthRecord)
  {
    $lengthRecord_instance = LengthRecord::find( request('id') );

    $lengthRecord_instance->date = request('date');
    $lengthRecord_instance->length = request('length');
    $lengthRecord_instance->notes = request('notes');

    $lengthRecord_instance->save();

    return redirect('/pets/' . request('pet_id') . '#')->with('notifications', [
      'type' => 'success',
      'messages' => [
        'Successfully updated length record.'
      ]
    ]);
  }

  public function destroy(LengthRecord $lengthRecord)
  {
    if( !$lengthRecord->is_initial ):
      $lengthRecord->delete();
      $notifications = array(
        'type' => 'success',
        'messages' => array(
          'Successfully removed length record.'
        )
      );
    else:
      $notifications = array(
        'type' => 'error',
        'messages' => array(
          'Error: Cannot remove initial length record!'
        )
      );
    endif;

    return redirect('/pets/' . request('pet_id'))->with('notifications', $notifications);
  }
}
