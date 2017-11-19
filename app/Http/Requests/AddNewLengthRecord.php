<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewLengthRecord extends FormRequest
{
    public function authorize()
    {
      return true;
    }

    public function rules()
    {
        return [
          'pet_id' => 'required|numeric',
          'length' => 'required|numeric',
          'date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'pet_id.required' => 'Pet id is required (leave blank to use default)',
            'pet_id.numeric' => 'Pet id must be a number (leave blank to use default)',
            'length.required' => 'Length is required',
            'length.numeric' => 'Length must use numbers only',
            'date.required' => 'Date for this length recording is required',
            'date.date' => 'Invalid date',
        ];
    }
}
