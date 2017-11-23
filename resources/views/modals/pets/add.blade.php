<div class="remodal" data-remodal-id="add-pet">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Add New Pet</h1>

  @if ($errors->any())
    <div class="errors__container">
      <ul class="errors">
        @foreach ($errors->all() as $error)
          <li class="error">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="/pets#add-pet" enctype="multipart/form-data">
    <label for="photo">Photo*</label>
    <input id="photo" type="file" name="photo" placeholder="Photo" required />

    <label for="name">Name*</label>
    <input id="name" type="text" name="name" placeholder="Name" required />

    <label for="date_of_birth">Date of Birth*</label>
    <input id="date_of_birth" type="date" name="date_of_birth" placeholder="DD-MM-YYYY" required />

    <label for="weight">Weight(g)*</label>
    <input id="weight" type="number" name="weight" placeholder="Weight(g)" required />

    <label for="gender">Gender*</label>
    <input id="gender" type="text" name="gender" placeholder="Gender" required />

    <label for="scientific_species_name">Scientific Species Name*</label>
    <input id="scientific_species_name" type="text" name="scientific_species_name" placeholder="Ex. Liasis Olivaceus" required />

    <label for="common_species_name">Common Species Name*</label>
    <input id="common_species_name" type="text" name="common_species_name" placeholder="Ex. Olive Python" required />

    <label for="length">Length(cm)*</label>
    <input id="length" type="text" name="length" placeholder="Length(cm)" required />

    <label for="notes">Notes</label>
    <textarea id="notes" name="notes" rows="5" placeholder="Notes (optional)"></textarea>

    {{ csrf_field() }}

    <input class="button--primary" type="submit" value="Submit" />
  </form>
</div>
