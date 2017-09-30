<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewWeighing extends FormRequest
{
    // protected $redirect = '/pets#add-pet';

    public function authorize()
    {
      return true;
    }

    public function rules()
    {
        return [
          'pet_id' => 'required|numeric',
          'weight' => 'required|numeric',
          'date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'pet_id.required' => 'Pet id is required (leave blank to use default)',
            'pet_id.numeric' => 'Pet id must be a number (leave blank to use default)',
            'weight.required' => 'Weight is required',
            'weight.numeric' => 'Weight must use numbers only',
            'date.required' => 'Date for this weighing is required',
            'date.date' => 'Invalid date',
        ];
    }
}
