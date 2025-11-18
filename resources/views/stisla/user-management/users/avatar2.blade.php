@php
  $Avatar = isset($d) ? $d->avatar : null;
  $Avatar = $Avatar ?? ($d->photo ?? null);
@endphp
@if (isset($d) && $Avatar)
  <div class="col-12 text-center mb-5">
    <div class="row">
      <div class="col-md-6">
        <a href="{{ $Avatar }}" onclick="showImageModal(event, '{{ $Avatar }}')">
          <img src="{{ $Avatar }}" alt="{{ $d->name }}" class="img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: cover; object-position: center;">
        </a>
        <br>
        {{ __('Avatar') }}
      </div>
      <div class="col-md-6">
        <a href="{{ $d->photo }}" onclick="showImageModal(event, '{{ $d->photo }}')">
          <img src="{{ $d->photo }}" alt="{{ $d->name }}" class="img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: cover; object-position: center;">
        </a>
        <br>
        {{ __('Foto') }}
      </div>
    </div>
  </div>
@endif
