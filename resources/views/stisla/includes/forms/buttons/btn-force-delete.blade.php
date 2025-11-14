@php
  $icon = $icon ?? 'fa fa-trash-alt';
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
@endphp
<a onclick="forceDeleteGlobal(event, '{{ $link }}')" class="btn btn-sm btn-danger @if ($icon ?? false) btn-icon icon-left @endif" href="#" data-toggle="tooltip"
  title="{{ $label ?? __('Hapus Permanen') }}">
  @if ($icon ?? false)
    <i class="{{ $icon }}"></i>
  @endif
  {{ $label ?? false }}
</a>
