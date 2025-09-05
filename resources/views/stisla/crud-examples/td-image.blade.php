@if ($isExport)
  <td>
    @if (Str::contains($item->image, 'http'))
      <a href="{{ $item->image }}">cek</a>
    @elseif($item->image)
      <a href="{{ $urlLink = Storage::url('' . $prefix . '/' . $item->image) }}">cek</a>
    @else
      -
    @endif
  </td>
@else
  <td>
    @include('stisla.crud-examples.image', ['file' => $item->image])
  </td>
@endif
