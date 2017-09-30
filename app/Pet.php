<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable = [
    'name',
    'date_of_birth',
    'weight',
    'photo_url',
    'gender',
    'scientific_species_name',
    'common_species_name',
    'length',
    'notes',
  ];

  public function weighings() {
    //TODO
  }
}
