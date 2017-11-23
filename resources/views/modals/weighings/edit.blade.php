<div class="remodal" data-remodal-id="edit-weighing-{{ $weighing->id }}">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Edit Weight Record</h1>
  <form method="POST" action="/weighings/{{ $weighing->id }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input type="hidden" name="id" value="{{ $weighing->id }}" />
    <input type="hidden" name="pet_id" value="{{ $pet->id }}" />

    <label for="date">Date*</label>
    <input id="date" type="date" name="date" placeholder="Date of Weighing" value="{{ $weighing->date }}" required />

    <label for="weight">Weight(g)*</label>
    <input id="weight" type="number" name="weight" placeholder="Weight(g)" value="{{ $weighing->weight }}" required />

    <label for="notes">Notes</label>
    <textarea id="notes" name="notes" placeholder="Additional notes (optional)">{{ $weighing->notes }}</textarea>

    <input class="button--primary" type="submit" value="Update" />
  </form>
</div>
