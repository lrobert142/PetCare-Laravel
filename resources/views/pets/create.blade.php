@extends('base')

@section('content')
  @if ($errors->any())
    <div class="errors__container">
      <ul class="errors">
        @foreach ($errors->all() as $error)
          <li class="error">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="/pets" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input id="name" type="text" name="name" placeholder="Name"  />
    <br />

    <label for="date_of_birth">Date of Birth:</label>
    <input id="date_of_birth" type="date" name="date_of_birth" placeholder="YYYY-MM-DD"  />
    <br />

    <label for="weight">Weight (g):</label>
    <input id="weight" type="number" name="weight" placeholder="Weight in grams"  />
    <br />

    <label for="photo">Photo</label>
    <input id="photo" type="file" name="photo" placeholder="Photo"  />
    <br />

    {{ csrf_field() }}

    <input class="button--primary" type="submit" value="Submit" />
  </form>
@endsection
