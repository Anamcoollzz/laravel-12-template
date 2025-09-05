<td title="{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->diffForHumans() : '' }}" @if ($item->created_at) data-toggle="tooltip" @endif>
  {{ $item->created_at ?? '-' }}
</td>
