@php
  $icon = $icon ?? 'fa fa-copy';
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
  $variant = $variant ?? 'success';
@endphp
<a onclick="duplicateGlobal(event, '{{ $link }}', '{{ $variant }}')" class="btn btn-sm btn-{{ $variant }} @if ($icon ?? false) btn-icon icon-left @endif" href="#"
  data-toggle="tooltip" title="{{ $label ?? __('Duplikat') }}">
  @if ($icon ?? false)
    <i class="{{ $icon }}"></i>
  @endif
  {{ $label ?? false }}
</a>
