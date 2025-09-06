@php
  $DateTime = $DateTime ?? ($item->datetime ?? ($item->date_time ?? ($item->date ?? ($item->user->birth_date ?? null))));
@endphp
<td title="{{ $DateTime ? \Carbon\Carbon::parse($DateTime)->diffForHumans() : '' }}" @if ($DateTime) data-toggle="tooltip" @endif>
  {{ $DateTime ?? '-' }}
</td>
