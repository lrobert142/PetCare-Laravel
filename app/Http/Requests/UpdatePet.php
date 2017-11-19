<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePet extends FormRequest
{
    public function authorize()
    {
      return true;
    }

    public function rules()
    {
        return [
          'id' => 'required|numeric',
          'photo' => 'file',
          'name' => 'required|string',
          'date_of_birth' => 'required|date',
          'gender' => 'required|string',
          'scientific_species_name' => 'required|string',
          'common_species_name' => 'required|string',
          'length' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Pet ID id required (leave blank to use default)',
            'name.required' => 'A name is required',
            'date_of_birth.required'  => 'A date of birth is required',
            'date_of_birth.date'  => 'Date of birth must be a date',
            'photo.file'  => 'Photo must be a file',
            'gender.required'  => 'Gender is required. Enter "Unknown" if you do not know your pet\'s gender',
            'scientific_species_name.required'  => 'Scientific name of the species is required',
            'common_species_name.required'  => 'Common name of the species is required',
            'length.required'  => 'Length is required',
            'length.numeric'  => 'Length must be a number',
        ];
    }
}
