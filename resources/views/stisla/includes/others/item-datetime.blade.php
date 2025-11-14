@php
  $DateTime = $DateTime ?? ($item->datetime ?? ($item->date_time ?? ($item->date ?? ($item->user->birth_date ?? ($item->birth_date ?? ($item->due_date ?? ($item->birthdate ?? null)))))));
@endphp
<span title="{{ $DateTime ? \Carbon\Carbon::parse($DateTime)->diffForHumans() : '' }}" @if ($DateTime) data-toggle="tooltip" @endif>{{ $DateTime ?? '-' }}</span>
