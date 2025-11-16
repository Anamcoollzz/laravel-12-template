@if ($isTrashed ?? false)
  @if ($item->deleted_at)
    @include('stisla.includes.others.td-datetime', ['DateTime' => $item->deleted_at])
  @else
    @include('stisla.includes.others.td-datetime', ['DateTime' => $item->deleted_at ?? null])
  @endif
@endif
