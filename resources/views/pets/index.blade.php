@extends('base')

@section('content')

  <h1>Pets</h1>
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
      You do not yet have any pets added. Why not <a href="#">add one now!</a>
    </p>
  @endif

@endsection
