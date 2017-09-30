@extends('base')

@section('content')
  <h1>{{ $pet->name }} - GENDER</h1>
  <img src="/{{ $pet->photo_url }}" alt="{{ $pet->name }}" />
  <h2>SCIENTIFIC_SPECIES_NAME - COMMON_SPECIES_NAME</h2>
  <h3>Date of Birth: {{ \Carbon\Carbon::parse($pet->date_of_birth)->format('dS F Y') }}</h3>
  <p>
    <strong>Current Weight:</strong>
    @if($pet->weight > 1000)
      {{ sprintf("%0.2f",$pet->weight / 1000) }}kg
    @else
      {{ $pet->weight }}g
    @endif
  </p>
  <p>
    <strong>Current Length:</strong> LENGTH_IN_CM_OR_M
  </p>

  <strong>Previous Notes</strong>
  <ul>
    <li>
      LAST NOTE TEXT HERE
    </li>
  </ul>
@endsection
