@php
  $isExport = $isExport ?? false;
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
  $isYajra = $isYajra ?? false;
@endphp

@if ($canShowDeleted && $isTrashed)
  <td>
    @include('stisla.includes.forms.buttons.btn-restore', ['link' => route($routePrefix . '.restore', [$item->id])])
    @include('stisla.includes.forms.buttons.btn-force-delete', ['link' => route($routePrefix . '.force-delete', [$item->id])])
  </td>
@elseif ($canUpdate || $canDelete || $canDetail || $canDuplicate)
  <td>
    @if ($canUpdate)
      @include('stisla.includes.forms.buttons.btn-edit', ['link' => route($routePrefix . '.edit', [$item->id])])
    @endif
    @if ($canDuplicate)
      @include('stisla.includes.forms.buttons.btn-duplicate', ['link' => route($routePrefix . '.duplicate', [$item->id])])
    @endif
    @if ($canDelete && $canShowDeleted === false)
      @include('stisla.includes.forms.buttons.btn-delete', ['link' => route($routePrefix . '.destroy', [$item->id])])
    @else
      @include('stisla.includes.forms.buttons.btn-delete', ['link' => route($routePrefix . '.destroy', [$item->id]), 'variant' => 'warning'])
    @endif
    @if ($canShowDeleted)
      @include('stisla.includes.forms.buttons.btn-force-delete', ['link' => route($routePrefix . '.force-delete', [$item->id])])
    @endif

    @if ($canDetail)
      @include('stisla.includes.forms.buttons.btn-detail', ['link' => route($routePrefix . '.show', [$item->id])])
    @endif
  </td>
@endif
