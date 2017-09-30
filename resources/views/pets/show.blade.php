@extends('base')

@section('content')
  <h1>{{ $pet->name }} - {{ $pet->gender }}</h1>
  <img src="/{{ $pet->photo_url }}" alt="{{ $pet->name }}" />
  <h2>{{ $pet->scientific_species_name }} ({{ $pet->common_species_name }})</h2>
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
    <strong>Current Length:</strong>
    @if($pet->length > 100)
      {{ sprintf("%0.2f",$pet->length / 100) }}m
    @else
      {{ $pet->length }}cm
    @endif
  </p>

  <strong>Notes</strong>
  <p>
    {{ $pet->notes }}
  </p>
@endsection
