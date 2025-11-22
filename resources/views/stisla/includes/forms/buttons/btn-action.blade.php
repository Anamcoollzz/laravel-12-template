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
    @if ($isAppCrud)
      <div class="dropdown d-inline">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ __('Pilih Aksi') }}
        </button>
        <div class="dropdown-menu">
          @if ($canDetail)
            <a class="dropdown-item has-icon text-primary" href="{{ route($routePrefix . '.show', [$item->id]) }}"><i class="far fa-eye"></i> Detail</a>
          @endif
          @if ($canUpdate)
            <a class="dropdown-item has-icon" href="{{ route($routePrefix . '.edit', [$item->id]) }}"><i class="far fa-edit"></i> Ubah</a>
          @endif
          @if ($canDuplicate)
            <a onclick="duplicateGlobal(event, '{{ route($routePrefix . '.duplicate', [$item->id]) }}', 'warning')" class="dropdown-item has-icon text-success" href="#">
              <i class="fas fa-copy"></i> Duplikat
            </a>
          @endif
          @if ($canDuplicate && $canShowDeleted === false)
            <a onclick="deleteGlobal(event, '{{ route($routePrefix . '.destroy', [$item->id]) }}', 'warning')" class="dropdown-item has-icon text-danger" href="#">
              <i class="fas fa-trash"></i> Hapus
            </a>
          @else
            <a onclick="deleteGlobal(event, '{{ route($routePrefix . '.destroy', [$item->id]) }}', 'warning')" class="dropdown-item has-icon text-warning" href="#">
              <i class="fas fa-trash">
              </i> Hapus
            </a>
          @endif
          @if ($canShowDeleted)
            <a onclick="forceDeleteGlobal(event, '{{ route($routePrefix . '.force-delete', [$item->id]) }}', 'danger')" class="dropdown-item has-icon text-danger" href="#">
              <i class="fas fa-trash">
              </i> Hapus Permanen
            </a>
          @endif

          @if ($canExport)
            <div class="dropdown-divider"></div>
            <a class="dropdown-item has-icon" style="color: purple;" href="{{ route($routePrefix . '.single-pdf', [$item->id]) . '?' . request()->getQueryString() }}">
              <i class="fas fa-file-pdf">
              </i> Ekspor PDF
            </a>
            @foreach ($htmlColumns as $hc)
              <a class="dropdown-item has-icon" style="color: purple;" href="{{ route($routePrefix . '.single-pdf', [$item->id]) . '?col=' . $hc . '&' . request()->getQueryString() }}">
                <i class="fas fa-file-pdf">
                </i> {{ __('validation.attributes.' . $hc) }}
              </a>
            @endforeach
          @endif
        </div>
      </div>
    @else
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

      @if ($canExport)
        @include('stisla.includes.forms.buttons.btn-pdf-download', ['link' => route($routePrefix . '.single-pdf', [$item->id]) . '?' . request()->getQueryString(), 'size' => 'sm'])
        @foreach ($htmlColumns as $hc)
          @include('stisla.includes.forms.buttons.btn-pdf-download', [
              'link' => route($routePrefix . '.single-pdf', [$item->id]) . '?col=' . $hc . '&' . request()->getQueryString(),
              'size' => 'sm',
              'tooltip' => 'Download PDF (only ' . ucwords(str_replace('_', ' ', $hc)) . ' column)',
          ])
        @endforeach
      @endif
    @endif
  </td>
@endif
