@extends('base')

@section('content')
  <a data-remodal-target="add-weighing" href="#add-weighing">Add Weighing</a>

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

  <div class="remodal" data-remodal-id="add-weighing">
    <button data-remodal-action="close" class="remodal-close"></button>
    <h1>Add New Weighing</h1>

    @if ($errors->any())
      <div class="errors__container">
        <ul class="errors">
          @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form class="add-weighing-form" method="POST" action="/weighings" enctype="multipart/form-data">
      <label for="TODO">TODO*</label>
      <input id="TODO" type="text" name="TODO" placeholder="TODO" required />

      {{ csrf_field() }}

      <input type="hidden" name="pet_id" value="{{ $pet->id }}" />

      <input class="button--primary" type="submit" value="Submit" />
    </form>
  </div>
@endsection
