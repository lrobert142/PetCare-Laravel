<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weighing;
use App\Http\Requests\AddNewWeighing;

class WeighingsController extends Controller
{
  public function store(AddNewWeighing $request)
  {
    dd($weighing);
  }
}
