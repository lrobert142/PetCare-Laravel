<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care App</title>
    <style>
      .pet__card {
        display: flex;
        border: thin solid grey;
        border-radius: 10px;
        padding: 20px;
      }

      .pet__card--image {
        display: inline-block;
        max-width: 100px;
        margin-right: 20px;
        flex: 1;
      }

      .pet__card--details {
        display: inline-block;
        flex: 1;
      }
    </style>
  </head>
  <body>

    <h1>Pets</h1>
    @foreach ($pets as $pet)
      <div class="pet__card">
        <img class="pet__card--image" src="{{ $pet['photo'] }}" alt="{{ $pet['name'] }}" />
        <div class="pet__card--details">
          <strong>{{ $pet['name'] }}</strong>
          <p>
            Age: {{ $pet['age'] }} years old
          </p>
          <p>
            Weight: {{ $pet['weight'] }}g
          </p>
        </div>
      </div>
    @endforeach

  </body>
</html>
