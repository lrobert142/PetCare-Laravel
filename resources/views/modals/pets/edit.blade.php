<div class="remodal" data-remodal-id="edit-details">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Edit Pet Details</h1>

  @if ($errors->any())
    <div class="errors__container">
      <ul class="errors">
        @foreach ($errors->all() as $error)
          <li class="error">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="/pets/{{ $pet->id }}#edit-details" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input type="hidden" name="pet_id" value="{{ $pet->id }}" />

    <label for="photo">Photo (optional)</label>
    <input id="photo" type="file" name="photo" placeholder="Photo" />

    <label for="name">Name*</label>
    <input id="name" type="text" name="name" placeholder="Name" value="{{ $pet->name }}" required />

    <label for="date_of_birth">Date of Birth*</label>
    <input id="date_of_birth" type="date" name="date_of_birth" placeholder="DD-MM-YYYY" value="{{ $pet->date_of_birth }}" required />

    <label for="gender">Gender*</label>
    <input id="gender" type="text" name="gender" placeholder="Gender" value="{{ $pet->gender }}" required />

    <label for="scientific_species_name">Scientific Species Name*</label>
    <input id="scientific_species_name" type="text" name="scientific_species_name" placeholder="Ex. Liasis Olivaceus" value="{{ $pet->scientific_species_name }}" required />

    <label for="common_species_name">Common Species Name*</label>
    <input id="common_species_name" type="text" name="common_species_name" placeholder="Ex. Olive Python" value="{{ $pet->common_species_name }}" required />

    <label for="length">Length(cm)*</label>
    <input id="length" type="text" name="length" placeholder="Length(cm)" value="{{ $pet->length() }}" required />

    <label for="notes">Notes</label>
    <textarea id="notes" name="notes" rows="5" placeholder="Notes (optional)">{{ $pet->notes }}</textarea>

    <input class="button--primary" type="submit" value="Submit" />
  </form>
</div>
