@php
  $icon = $icon ?? 'fa fa-trash';
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
  $variant = $variant ?? 'danger';
@endphp
<a onclick="deleteGlobal(event, '{{ $link }}', '{{ $variant }}')" class="btn btn-sm btn-{{ $variant }} @if ($icon ?? false) btn-icon icon-left @endif" href="#"
  data-toggle="tooltip" title="{{ $label ?? __('Hapus') }}">
  @if ($icon ?? false)
    <i class="{{ $icon }}"></i>
  @endif
  {{ $label ?? false }}
</a>
