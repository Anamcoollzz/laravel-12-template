@php
  $DateTime = $DateTime ?? null;
@endphp
<span title="{{ $DateTime ? \Carbon\Carbon::parse($DateTime)->diffForHumans() : '' }}" @if ($DateTime) data-toggle="tooltip" @endif>{{ $DateTime ?? '-' }}</span>
