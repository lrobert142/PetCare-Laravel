<div class="remodal" data-remodal-id="view-length-{{ $lengthRecord->id }}">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1 id="view-weighing__title">Length Record: {{ $lengthRecord->formatted_date }}</h1>

  <p><strong>Length:</strong> {{ $lengthRecord->length }}cm</p>
  <p><strong>Diff:</strong> {{ sprintf("%0.2f", $lengthRecord->diff_cm) }}cm ({{ sprintf("%0.2f", $lengthRecord->diff_percent) }}%)</p>
  <p><strong>Notes:</strong> {{ $lengthRecord->notes }}</p>
</div>
