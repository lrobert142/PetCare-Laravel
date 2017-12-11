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
    'photo_url',
    'gender',
    'scientific_species_name',
    'common_species_name',
    'notes',
  ];

  public function weight() {
    // Use 'desc' order to get the latest weight record first
    return Weighing::where('pet_id', $this->id)->orderBy('date', 'desc')->first()->weight;
  }

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

  public function length() {
    // Use 'desc' order to get the latest length record first
    return LengthRecord::where('pet_id', $this->id)->orderBy('date', 'desc')->first()->length;
  }

  public static function length_records_scope($pet_id) {
    return LengthRecord::where('pet_id', $pet_id)->orderBy('date', 'asc');
  }

  public static function lengths_with_diffs($pet_id) {
    $lengthRecords = LengthRecord::where('pet_id', $pet_id)->orderBy('date', 'asc')->get();
    $previousLengthRecord = null;
    $newLengthRecords = [];

    foreach($lengthRecords as $lengthRecord):
      if( $previousLengthRecord != null ):
        $lengthDiffCm = $lengthRecord->length - $previousLengthRecord->length;
        $lengthDiffPercentage = ($lengthRecord->length - $previousLengthRecord->length)/$previousLengthRecord->length * 100;
      else:
        $lengthDiffCm = 0;
        $lengthDiffPercentage = 0;
      endif;

      $lengthRecord->formatted_date = \Carbon\Carbon::parse($lengthRecord->date)->format('dS F Y');
      $lengthRecord->diff_cm = $lengthDiffCm;
      $lengthRecord->diff_percent = $lengthDiffPercentage;
      array_push($newLengthRecords, $lengthRecord);

      $previousLengthRecord = $lengthRecord;
    endforeach;

    return $newLengthRecords;
  }
}
