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
          'name' => 'required|string',
          'date_of_birth' => 'required|date',
          'weight' => 'required|numeric',
          'photo' => 'required|file'
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
        ];
    }
}
