@if ($isExport)
  <td>
    @if (Str::contains($item->file, 'http://') || Str::contains($item->file, 'https://'))
      <a href="{{ $item->file }}">cek</a>
    @elseif($item->file)
      <a href="{{ $urlLink = Storage::url($prefix . '/' . $item->file) }}">cek</a>
    @else
      -
    @endif
  </td>
@else
  <td>
    @include('stisla.includes.others.item-file')
  </td>
@endif
