<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weighing;
use App\Http\Requests\AddNewWeighing;

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
}
