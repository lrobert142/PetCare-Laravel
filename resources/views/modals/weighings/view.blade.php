<div class="remodal" data-remodal-id="view-weighing-{{ $weighing->id }}">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1 id="view-weighing__title">Weight Record: {{ $weighing->formatted_date }}</h1>

  <p><strong>Weight:</strong> {{ $weighing->weight }}g</p>
  <p><strong>Diff:</strong> {{ sprintf("%0.2f", $weighing->diff_grams) }}g ({{ sprintf("%0.2f", $weighing->diff_percent) }}%)</p>
  <p><strong>Notes:</strong> {{ $weighing->notes }}</p>
</div>
