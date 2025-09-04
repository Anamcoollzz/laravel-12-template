@if (isset($d) && $d->avatar)
  <div class="col-12 text-center">
    <a href="{{ $d->avatar }}" onclick="showImageModal(event, '{{ $d->avatar }}')">
      <img src="{{ $d->avatar }}" alt="{{ $d->name }}" class="img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: cover; object-position: center;">
    </a>
  </div>
@endif
