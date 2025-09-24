@php
  $file = $file ?? $item->file;
@endphp
@if (Str::contains($file, 'http://') || Str::contains($file, 'https://'))
  <a class="btn btn-primary btn-sm" href="{{ $file }}" target="_blank">Lihat</a>
@elseif($file)
  <a class="btn btn-primary btn-sm" href="{{ Storage::url($prefix . '/' . $file) }}" target="_blank">Lihat</a>
@else
  -
@endif
