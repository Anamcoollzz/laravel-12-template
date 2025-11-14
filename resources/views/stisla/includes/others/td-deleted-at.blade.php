@if ($isTrashed ?? false)
  @include('stisla.includes.others.td-datetime', ['DateTime' => $item->deleted_at])
@endif
