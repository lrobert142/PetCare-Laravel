<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLengthRecord extends FormRequest
{
    public function authorize()
    {
      return true;
    }

    public function rules()
    {
        return [
          'id' => 'required|numeric',
          'pet_id' => 'required|numeric',
          'length' => 'required|numeric',
          'date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Length Record ID is required',
            'id.required' => 'Length Record ID is must be numeric',
            'pet_id.required' => 'Pet id is required (leave blank to use default)',
            'pet_id.numeric' => 'Pet id must be a number (leave blank to use default)',
            'length.required' => 'Length is required',
            'length.numeric' => 'Length must use numbers only',
            'date.required' => 'Date for this length record is required',
            'date.date' => 'Invalid date',
        ];
    }
}
