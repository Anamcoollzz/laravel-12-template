@if ($isExport)
  <td>
    @if (Str::contains($item->image, 'http') || Str::contains($item->image, 'https://'))
      <a href="{{ $item->image }}">cek</a>
    @elseif($item->image)
      <a href="{{ $urlLink = Storage::url($prefix . '/' . $item->image) }}">cek</a>
    @else
      -
    @endif
  </td>
@else
  <td>
    @include('stisla.includes.others.item-image')
  </td>
@endif
