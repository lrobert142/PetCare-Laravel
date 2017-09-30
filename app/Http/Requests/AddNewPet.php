<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewPet extends FormRequest
{
    protected $redirect = '/pets#add-pet';

    public function authorize()
    {
      return true;
    }

    public function rules()
    {
        return [
          'photo' => 'required|file',
          'name' => 'required|string',
          'date_of_birth' => 'required|date',
          'weight' => 'required|numeric',
          'gender' => 'required|string',
          'scientific_species_name' => 'required|string',
          'common_species_name' => 'required|string',
          'length' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'date_of_birth.required'  => 'A date of birth is required',
            'date_of_birth.date'  => 'Date of birth must be a date',
            'weight.required'  => 'A starting weight required',
            'weight.numeric'  => 'Weight must be a number only',
            'photo.required'  => 'A photo is required',
            'photo.file'  => 'A photo file must be uploaded',
            'gender.required'  => 'Gender is required. Enter "Unknown" if you do not know your pet\'s gender',
            'scientific_species_name.required'  => 'Scientific name of the species is required',
            'common_species_name.required'  => 'Common name of the species is required',
            'length.required'  => 'Length is required',
            'length.numeric'  => 'Length must be a number',
        ];
    }
}
