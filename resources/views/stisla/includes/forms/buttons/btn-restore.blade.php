@php
  $icon = $icon ?? 'fa fa-undo';
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
@endphp
<a onclick="restoreGlobal(event, '{{ $link }}')" class="btn btn-sm btn-success @if ($icon ?? false) btn-icon icon-left @endif" href="{{ $link }}" data-toggle="tooltip"
  title="{{ $label ?? __('Restore') }}">
  @if ($icon ?? false)
    <i class="{{ $icon }}"></i>
  @endif
  {{ $label ?? false }}
</a>
