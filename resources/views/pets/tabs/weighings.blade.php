<div id="weighings-tab">

  <div id="weighings-table"></div>
  {!! $lava->render('LineChart', 'Weighings') !!}

  <div>
      <table>
        <thead>
          <tr>
            <th>
              &nbsp;
            </th>
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
        @foreach( $weighings as $weighing )
          <tr class="weighing">
            <td>
              <a data-remodal-target="view-weighing-{{ $weighing->id }}">VIEW</a>
              <a data-remodal-target="edit-weighing-{{ $weighing->id }}">EDIT</a>
              <form class="weighing--delete" method="POST" action="/weighing/{{ $weighing->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="pet_id" value="{{ $pet->id }}" />
                <input type="hidden" name="id" value="{{ $weighing->id }}" />
                <input type="submit" value="Delete" />
              </form>
            </td>
            <td>
              {{ $weighing->formatted_date }}
            </td>
            <td>
              {{ $weighing->weight }}g
            </td>
            <td>
              {{ sprintf("%0.2f", $weighing->diff_grams) }}g
            </td>
            <td>
              {{ sprintf("%0.2f", $weighing->diff_percent) }}%
            </td>
            <td>
              {{ $weighing->notes }}
            </td>
          </tr>

          <tr>
            <td>
              @include('modals.weighings.view')

              @include('modals.weighings.edit')
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
  </div>

</div>
