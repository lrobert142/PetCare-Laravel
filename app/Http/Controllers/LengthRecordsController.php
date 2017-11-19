<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LengthRecord;
use App\Http\Requests\AddNewLengthRecord;

class LengthRecordsController extends Controller
{
  public function store(AddNewLengthRecord $request)
  {
    LengthRecord::create([
      'pet_id' => request('pet_id'),
      'date' => request('date'),
      'weight' => request('length'),
      'notes' => request('notes'),
    ]);

    return redirect('/pets/' . request('pet_id') . '#')->with('notifications', [
      'type' => 'success',
      'messages' => [
        'Successfully added length record.'
      ]
    ]);
  }
}
