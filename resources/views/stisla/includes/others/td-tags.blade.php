@if ($isExport === false)
  @php
    $tags = $tags ?? $item->tags;
  @endphp
  <td>
    @include('stisla.includes.others.item-tags')
  </td>
@else
  <td>{{ implode(', ', explode(',', $item->tags)) }}</td>
@endif
