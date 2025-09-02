@if (Str::contains($file, 'http'))
  <a href="{{ $file }}" onclick="showImageModal(event, '{{ $file }}')">
    <img src="{{ $file }}" alt="{{ $item->text }}" style="max-width: 200px;" class="img-thumbnail">
  </a>
@elseif($file)
  <a href="{{ Storage::url($prefix . '/' . $file) }}" target="_blank">
    <img src="{{ Storage::url($prefix . '/' . $file) }}" alt="{{ $item->text }}" style="max-width: 200px;" class="img-thumbnail">
  </a>
@else
  -
@endif
