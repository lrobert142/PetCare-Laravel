@extends('base')

@section('content')

  <h1>Pets</h1>
  <a data-remodal-target="add-pet" href="#">Add New</a>
  @if(count($pets) > 0)
    @foreach($pets as $pet)
      <div class="pet__card">
        <img class="pet__card--image" src="{{ $pet->photo_url }}" alt="{{ $pet->name }}" />
        <div class="pet__card--details">
          <strong>{{ $pet->name }}</strong>
          <p>
            Date of Birth: {{ $pet->date_of_birth }}
          </p>
          <p>
            Weight: {{ $pet->weight }}g
          </p>
          <a href="/pets/{{ $pet->id }}">See all details</a>
        </div>
      </div>
    @endforeach
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

    <form class="add-pet-form" method="POST" action="/pets" enctype="multipart/form-data">
      <label for="name">Name:</label>
      <input id="name" type="text" name="name" placeholder="Name"  />

      <label for="date_of_birth">Date of Birth:</label>
      <input id="date_of_birth" type="date" name="date_of_birth" placeholder="YYYY-MM-DD"  />

      <label for="weight">Weight (g):</label>
      <input id="weight" type="number" name="weight" placeholder="Weight in grams"  />

      <label for="photo">Photo</label>
      <input id="photo" type="file" name="photo" placeholder="Photo"  />

      {{ csrf_field() }}

      <input class="button--primary" type="submit" value="Submit" />
    </form>
  </div>

@endsection
