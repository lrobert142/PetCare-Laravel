<div id="length-records-tab"></div>

  <div id="length-records-table"></div>
  {{-- {!! $lava->render('LineChart', 'Weighings') !!} --}}

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
              Length (cm)
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
        @foreach( $lengthRecords as $lengthRecord )
          <tr class="length">
            <td>
              <a data-remodal-target="view-length-{{ $lengthRecord->id }}">VIEW</a>
              <a data-remodal-target="edit-length-{{ $lengthRecord->id }}">EDIT</a>
              <form class="length--delete" method="POST" action="/lengthRecords/{{ $lengthRecord->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="pet_id" value="{{ $pet->id }}" />
                <input type="hidden" name="id" value="{{ $lengthRecord->id }}" />
                <input type="submit" value="Delete" />
              </form>
            </td>
            <td>
              {{ $lengthRecord->formatted_date }}
            </td>
            <td>
              {{ $lengthRecord->length }}cm
            </td>
            <td>
              {{ sprintf("%0.2f", $lengthRecord->diff_cm) }}cm
            </td>
            <td>
              {{ sprintf("%0.2f", $lengthRecord->diff_percent) }}%
            </td>
            <td>
              {{ $lengthRecord->notes }}
            </td>
          </tr>

          <tr>
            <td>
              @include('modals.length-records.view')

              @include('modals.length-records.edit')
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
  </div>
</div>
