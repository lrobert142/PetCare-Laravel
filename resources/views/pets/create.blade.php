@extends('base')

@section('content')
  <form method="POST" action="/pets" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input id="name" type="text" name="name" placeholder="Name" required />
    <br />

    <label for="date_of_birth">Date of Birth:</label>
    <input id="date_of_birth" type="date" name="date_of_birth" placeholder="YYYY-MM-DD" required />
    <br />

    <label for="weight">Weight (g):</label>
    <input id="weight" type="number" name="weight" placeholder="Weight in grams" required />
    <br />

    <label for="photo">Photo</label>
    <input id="photo" type="file" name="photo" placeholder="Photo" required />
    <br />

    {{ csrf_field() }}

    <input type="submit" value="Submit" />
  </form>
@endsection
