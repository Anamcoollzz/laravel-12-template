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
  @include('stisla.includes.others.td-image', ['file' => $item->avatar])
@endif
