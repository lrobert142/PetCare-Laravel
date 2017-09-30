<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
  protected $fillable = [ 'name', 'date_of_birth', 'weight', 'photo_url' ];
}
