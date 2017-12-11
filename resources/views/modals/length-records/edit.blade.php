<div class="remodal" data-remodal-id="edit-length-{{ $lengthRecord->id }}">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Edit Length Record</h1>
  <form method="POST" action="/lengthRecords/{{ $lengthRecord->id }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input type="hidden" name="id" value="{{ $lengthRecord->id }}" />
    <input type="hidden" name="pet_id" value="{{ $pet->id }}" />

    <label for="date">Date*</label>
    <input id="date" type="date" name="date" placeholder="Date of Length Record" value="{{ $lengthRecord->date }}" required />

    <label for="length">Length(cm)*</label>
    <input id="length" type="number" name="length" placeholder="Length(cm)" value="{{ $lengthRecord->length }}" required />

    <label for="notes">Notes</label>
    <textarea id="notes" name="notes" placeholder="Additional notes (optional)">{{ $lengthRecord->notes }}</textarea>

    <input class="button--primary" type="submit" value="Update" />
  </form>
</div>
