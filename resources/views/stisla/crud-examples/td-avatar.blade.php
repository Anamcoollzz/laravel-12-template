@if ($isExport)
  <td>
    @if (Str::contains($item->avatar, 'http://') || Str::contains($item->avatar, 'https://'))
      <a href="{{ $item->avatar }}">cek</a>
    @elseif($item->avatar)
      <a href="{{ $urlLink = Storage::url('' . $prefix . '/' . $item->avatar) }}">cek</a>
    @else
      -
    @endif
  </td>
@else
  <td>
    @include('stisla.crud-examples.image', ['file' => $item->avatar])
  </td>
@endif
