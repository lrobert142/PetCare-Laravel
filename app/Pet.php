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

  public static function weighings_scope($pet_id) {
    return Weighing::where('pet_id', $pet_id)->orderBy('date', 'asc');
  }

  public static function weighings_with_diffs($pet_id) {
    $weighings = Weighing::where('pet_id', $pet_id)->orderBy('date', 'asc')->get();
    $previousWeighing = null;
    $newWeighings = [];

    foreach($weighings as $weighing):
      if( $previousWeighing != null ):
        $weightDiffGrams = $weighing->weight - $previousWeighing->weight;
        $weightDiffPercentage = ($weighing->weight - $previousWeighing->weight)/$previousWeighing->weight * 100;
      else:
        $weightDiffGrams = 0;
        $weightDiffPercentage = 0;
      endif;

      $weighing->formatted_date = \Carbon\Carbon::parse($weighing->date)->format('dS F Y');
      $weighing->diff_grams = $weightDiffGrams;
      $weighing->diff_percent = $weightDiffPercentage;
      array_push($newWeighings, $weighing);

      $previousWeighing = $weighing;
    endforeach;

    return $newWeighings;
  }
}
