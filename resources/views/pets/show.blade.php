@extends('base')

@section('content')
  <ul>
    <li>
      <a data-remodal-target="edit-details" href="#edit-details">Edit Details</a>
    </li>
    <li>
      <a data-remodal-target="add-weighing" href="#add-weighing">Add Weighing</a>
    </li>
    <li>
      <a data-remodal-target="add-length-record" href="#add-length-record">Add Length Record</a>
    </li>
  </ul>

  <h1>{{ $pet->name }} - {{ $pet->gender }}</h1>
  <img src="/{{ $pet->photo_url }}" alt="{{ $pet->name }}" />
  <h2>{{ $pet->scientific_species_name }} ({{ $pet->common_species_name }})</h2>
  <h3>Date of Birth: {{ \Carbon\Carbon::parse($pet->date_of_birth)->format('dS F Y') }}</h3>
  <p>
    <strong>Current Weight:</strong>
    @if($pet->weight() > 1000)
      {{ sprintf("%0.2f",$pet->weight() / 1000) }}kg
    @else
      {{ $pet->weight() }}g
    @endif
  </p>
  <p>
    <strong>Current Length:</strong>
    @if($pet->length() > 100)
      {{ sprintf("%0.2f",$pet->length() / 100) }}m
    @else
      {{ $pet->length() }}cm
    @endif
  </p>

  <strong>Notes</strong>
  <p>
    {{ $pet->notes }}
  </p>

  <div class="tabs">
    @include('pets.tabs.weighings')
    @include('pets.tabs.length-records')
  </div>

  @include('modals.weighings.add')

  @include('modals.pets.edit')

  @include('modals.length-records.add')

@endsection
