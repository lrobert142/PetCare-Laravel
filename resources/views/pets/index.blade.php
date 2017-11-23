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
            @if($pet->weight() > 1000)
              {{ sprintf("%0.2f",$pet->weight() / 1000) }}kg
            @else
              {{ $pet->weight() }}g
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

  @include('modals.pets.add')

@endsection
