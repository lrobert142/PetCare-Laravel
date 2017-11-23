<div class="remodal" data-remodal-id="add-length-record">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Add New Length Record</h1>

  @if ($errors->any())
    <div class="errors__container">
      <ul class="errors">
        @foreach ($errors->all() as $error)
          <li class="error">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="/lengthRecords" enctype="multipart/form-data">
    <label for="date">Date*</label>
    <input id="date" type="date" name="date" placeholder="Date Length Recorded" value={{ now() }} required />

    <label for="weight">Length(cm)*</label>
    <input id="weight" type="number" name="length" placeholder="Length(g)" required />

    <label for="notes">Notes</label>
    <textarea id="notes" name="notes" placeholder="Additional notes (optional)"></textarea>

    {{ csrf_field() }}

    <input type="hidden" name="pet_id" value="{{ $pet->id }}" />

    <input class="button--primary" type="submit" value="Submit" />
  </form>
</div>
