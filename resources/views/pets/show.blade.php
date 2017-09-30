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

  <ul>
      <table>
        <thead>
          <tr>
            <th>
              Date
            </th>
            <th>
              Weight (g)
            </th>
            <th>
              Diff
            </th>
            <th>
              %
            </th>
            <th>
              Notes
            </th>
          </tr>
        </thead>
        <tbody>
        @php( $previousWeighing = null )
        @foreach( $weighings as $weighing )
          @if( $previousWeighing != null )
            @php( $weightDiffGrams = ($weighing->weight - $previousWeighing->weight) . 'g' )
            @php( $weightDiffPercentage = sprintf("%0.2f", ($weighing->weight - $previousWeighing->weight)/$previousWeighing->weight * 100) . '%' )
          @else
            @php( $weightDiffGrams = '-' )
            @php( $weightDiffPercentage = '-' )
          @endif
          @php( $date = \Carbon\Carbon::parse($weighing->date)->format('dS F Y') )

          <tr class="weighing" data-remodal-target="view-weighing-{{ $weighing->id }}">
            <td>
              {{ $date }}
            </td>
            <td>
              {{ $weighing->weight }}g
            </td>
            <td>
              {{ $weightDiffGrams }}
            </td>
            <td>
              {{ $weightDiffPercentage }}
            </td>
            <td>
              {{ $weighing->notes }}
            </td>
          </tr>

          <div class="remodal" data-remodal-id="view-weighing-{{ $weighing->id }}">
            <button data-remodal-action="close" class="remodal-close"></button>
            <h1 id="view-weighing__title">Weight Record: {{ $date }}</h1>

            <p><strong>Weight:</strong> {{ $weighing->weight }}g</p>
            <p><strong>Diff:</strong> {{ $weightDiffGrams }} ({{ $weightDiffPercentage }})</p>
            <p><strong>Notes:</strong> {{ $weighing->notes }}</p>
          </div>

          @php ($previousWeighing = $weighing)
        @endforeach
        </tbody>
      </table>
  </ul>

  <div id="weighings-table"></div>
  {!! $lava->render('LineChart', 'Weighings') !!}

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

    <form method="POST" action="/weighings#add-weighing" enctype="multipart/form-data">
      <label for="date">Date*</label>
      <input id="date" type="date" name="date" placeholder="Date of Weighing" value={{ now() }} required />

      <label for="weight">Weight(g)*</label>
      <input id="weight" type="number" name="weight" placeholder="Weight(g)" required />

      <label for="notes">Notes</label>
      <textarea id="notes" name="notes" placeholder="Additional notes (optional)"></textarea>

      {{ csrf_field() }}

      <input type="hidden" name="pet_id" value="{{ $pet->id }}" />

      <input class="button--primary" type="submit" value="Submit" />
    </form>
  </div>
@endsection
