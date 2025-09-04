@php
  $Avatar = isset($d) ? $d->avatar : null;
  $Avatar = $Avatar ?? ($d->photo ?? null);
@endphp
@if (isset($d) && $Avatar)
  <div class="col-12 text-center">
    <a href="{{ $Avatar }}" onclick="showImageModal(event, '{{ $Avatar }}')">
      <img src="{{ $Avatar }}" alt="{{ $d->name }}" class="img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: cover; object-position: center;">
    </a>
  </div>
@endif
