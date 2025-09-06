@if (Str::contains($file, 'http'))
  <a href="{{ $file }}" target="_blank">
    <img src="{{ $file }}" alt="{{ $item->text }}" style="max-width: 200px;" class="img-thumbnail">
  </a>
@elseif($file)
  <a href="{{ Storage::url('students/' . $file) }}" target="_blank">
    <img src="{{ Storage::url('students/' . $file) }}" alt="{{ $item->text }}" style="max-width: 200px;" class="img-thumbnail">
  </a>
@else
  -
@endif
