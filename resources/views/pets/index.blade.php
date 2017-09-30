@extends('base')

@section('content')

  <a data-remodal-target="add-pet" href="#">Add New</a>
  <h1>Pets</h1>
  @if(count($pets) > 0)
    <div class="pet__cards">
      @foreach($pets as $pet)
        <a class="pet__card" href="/pets/{{ $pet->id }}" data-mh="pet-card">
          <form class="pet__card--delete" method="POST" action="/pet/{{ $pet->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="hidden" name="id" value="{{ $pet->id }}" />
            <input type="submit" value="Delete" />
          </form>
          <p class="smalltext">
            Tap / Click for additional details
          </p>
          <h3 class="pet__card--heading">{{ $pet->name }}</h3>
          <img class="pet__card--image" src="/{{ $pet->photo_url }}" alt="{{ $pet->name }}" />

          <strong>Date of Birth:</strong>
          <p>
            {{ \Carbon\Carbon::parse($pet->date_of_birth)->format('dS F Y') }}
          </p>

          <strong>Weight:</strong>
          <p>
            @if($pet->weight > 1000)
              {{ sprintf("%0.2f",$pet->weight / 1000) }}kg
            @else
              {{ $pet->weight }}g
            @endif
          </p>
        </a>
      @endforeach
    </div>
  @else
    <p>
      You do not yet have any pets added. Why not <a data-remodal-target="add-pet" href="#">add one now!</a>
    </p>
  @endif

  <div class="remodal" data-remodal-id="add-pet">
    <button data-remodal-action="close" class="remodal-close"></button>
    <h1>Add New Pet</h1>

    @if ($errors->any())
      <div class="errors__container">
        <ul class="errors">
          @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="/pets#add-pet" enctype="multipart/form-data">
      <label for="photo">Photo*</label>
      <input id="photo" type="file" name="photo" placeholder="Photo" required />

      <label for="name">Name*</label>
      <input id="name" type="text" name="name" placeholder="Name" required />

      <label for="date_of_birth">Date of Birth*</label>
      <input id="date_of_birth" type="date" name="date_of_birth" placeholder="DD-MM-YYYY" required />

      <label for="weight">Weight(g)*</label>
      <input id="weight" type="number" name="weight" placeholder="Weight(g)" required />

      <label for="gender">Gender*</label>
      <input id="gender" type="text" name="gender" placeholder="Gender" required />

      <label for="scientific_species_name">Scientific Species Name*</label>
      <input id="scientific_species_name" type="text" name="scientific_species_name" placeholder="Ex. Liasis Olivaceus" required />

      <label for="common_species_name">Common Species Name*</label>
      <input id="common_species_name" type="text" name="common_species_name" placeholder="Ex. Olive Python" required />

      <label for="length">Length(cm)*</label>
      <input id="length" type="text" name="length" placeholder="Length(cm)" required />

      <label for="notes">Notes</label>
      <textarea id="notes" name="notes" rows="5" placeholder="Notes (optional)"></textarea>

      {{ csrf_field() }}

      <input class="button--primary" type="submit" value="Submit" />
    </form>
  </div>

@endsection
