@php
  $isYajra = $isYajra ?? false;
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
@endphp

@extends($data->count() > 0 || $isYajra || $isAjaxYajra ? 'stisla.layouts.app-table' : 'stisla.layouts.app')

@section('title')
  {{ $title }}
@endsection

@section('content')
  @include('stisla.includes.breadcrumbs.breadcrumb-table')
  @include('stisla.includes.others.alert-password')
  <div class="section-body">
    <h2 class="section-title">{{ $title }}</h2>
    <p class="section-lead">{{ __('Menampilkan halaman ' . $title) }}.</p>
    <div class="row">
      <div class="col-12">

        @yield('filter_top')
        @yield('panel11')
        @yield('panel12')

        @if ($data->count() > 0 || $isYajra || $isAjaxYajra)
          @if ($canExport && $data->count() > 100)
            <div class="card">
              <div class="card-header">
                <h4><i class="fa fa-print"></i> {!! __('Aksi Ekspor <small>(Server Side)</small>') !!}</h4>
                <div class="card-header-action">
                  @include('stisla.includes.forms.buttons.btn-pdf-download', ['link' => $routePdf . '?' . request()->getQueryString()])
                  @include('stisla.includes.forms.buttons.btn-excel-download', ['link' => $routeExcel . '?' . request()->getQueryString()])
                  @include('stisla.includes.forms.buttons.btn-csv-download', ['link' => $routeCsv . '?' . request()->getQueryString()])
                  @if (!is_app_dataku())
                    @include('stisla.includes.forms.buttons.btn-json-download', ['link' => $routeJson . '?' . request()->getQueryString()])
                  @endif
                </div>
              </div>
            </div>
          @endif

          @yield('panel1')
          @yield('panel2')

          <div class="card">
            <div class="card-header">
              <h4><i class="{{ $moduleIcon }}"></i> Data {{ $title }}</h4>

              <div class="card-header-action">
                @if (isset($canShowDeleted) && $canShowDeleted)
                  @php
                    $show_deleted = request('show_deleted') === 'true';
                  @endphp
                  <a href="?show_deleted={{ $show_deleted ? '' : 'true' }}" class="btn btn-{{ $show_deleted ? 'danger' : 'primary' }}" data-toggle="tooltip"
                    title="{{ __($show_deleted ? 'Sembunyikan Data Yang Dihapus' : 'Tampilkan Data Yang Dihapus') }}"><i class="fa fa-{{ $show_deleted ? 'eye-slash' : 'eye' }}"></i></a>
                @endif
                @if ($canImportExcel)
                  @include('stisla.includes.forms.buttons.btn-import-excel')
                @endif
                @if ($canCreate)
                  @include('stisla.includes.forms.buttons.btn-add', ['link' => $route_create])
                @endif
                @if ($canDelete && is_superadmin() === true && Route::has($prefix . '.truncate'))
                  <a onclick="deleteGlobal(event, '{{ route($prefix . '.truncate') }}')" href="{{ route($prefix . '.truncate') }}" class="btn btn-danger btn-icon" data-toggle="tooltip"
                    title="Kosongkan Data"><i class="fa fa-trash"></i></a>
                @endif
                @yield('btn-action-header')
              </div>
            </div>
            <div class="card-body">
              @if ($canDelete && Route::has($prefix . '.destroy-using-checkbox'))
                <a onclick="deleteGlobal(event, '{{ route($prefix . '.destroy-using-checkbox') }}', 'danger', true)" id="deleteCheckBtn" href="#" class="btn btn-danger btn-icon mb-3">
                  <i class="fa fa-trash"></i> Hapus Yang Dipilih
                </a>
              @endif
              @if ($canExport && Route::has($prefix . '.export-pdf-using-checkbox'))
                <a onclick="executePostGlobal(event, '{{ route($prefix . '.export-pdf-using-checkbox') }}', 'danger', true)" id="exportPdfCheckBtn" href="#" class="btn btn-danger btn-icon mb-3">
                  <i class="fa fa-file-pdf"></i> Export PDF Yang Dipilih
                </a>
                <a onclick="executePostGlobal(event, '{{ route($prefix . '.export-excel-using-checkbox') }}', 'danger', true)" id="exportExcelCheckBtn" href="#"
                  class="btn btn-success btn-icon mb-3">
                  <i class="fa fa-file-excel"></i> Export Excel Yang Dipilih
                </a>
                <a onclick="executePostGlobal(event, '{{ route($prefix . '.export-csv-using-checkbox') }}', 'danger', true)" id="exportCsvCheckBtn" href="#" class="btn btn-success btn-icon mb-3">
                  <i class="fa fa-file-csv"></i> Export CSV Yang Dipilih
                </a>
                <a onclick="executePostGlobal(event, '{{ route($prefix . '.export-json-using-checkbox') }}', 'danger', true)" id="exportJsonCheckBtn" href="#"
                  class="btn btn-warning btn-icon mb-3">
                  <i class="fa fa-file-code"></i> Export JSON Yang Dipilih
                </a>
              @endif
              @include('stisla.includes.forms.buttons.btn-datatable')
              <div class="table-responsive" id="datatable-view">
                <input type="hidden" id="isYajra" value="{{ $isYajra }}">
                <input type="hidden" id="isAjax" value="{{ $isAjax }}">
                <input type="hidden" id="isAjaxYajra" value="{{ $isAjaxYajra }}">
                @if ($isYajra || $isAjaxYajra)
                  <textarea name="yajraColumns" id="yajraColumns" cols="30" rows="10" style="display: none;">{!! $yajraColumns !!}</textarea>
                @endif
                @yield('table')
              </div>
            </div>
          </div>

          @if (isset($canShowDeleted) && $canShowDeleted && request()->get('show_deleted') == 'true')
            <div class="card">
              <div class="card-header">
                <h4><i class="{{ $moduleIcon }}"></i> Data {{ $title }} Yang Sudah Dihapus</h4>

                <div class="card-header-action">
                  {{-- @if ($canImportExcel)
                    @include('stisla.includes.forms.buttons.btn-import-excel')
                  @endif --}}
                  @if ($deletedData->count() > 0)
                    @include('stisla.includes.forms.buttons.btn-restore', ['link' => $route_restore_all, 'label' => 'Pulihkan Semua'])
                    @include('stisla.includes.forms.buttons.btn-force-delete', ['link' => $route_force_delete_all, 'label' => 'Hapus Permanen Semua'])
                  @endif
                  {{-- @yield('btn-action-header') --}}
                </div>
              </div>
              <div class="card-body">
                @if ($deletedData->count() > 0)
                  @include('stisla.includes.forms.buttons.btn-datatable')
                  <div class="table-responsive" id="datatable-view-deleted">
                    {{-- <input type="hidden" id="isYajra" value="{{ $isYajra }}">
                  <input type="hidden" id="isAjax" value="{{ $isAjax }}">
                  <input type="hidden" id="isAjaxYajra" value="{{ $isAjaxYajra }}"> --}}
                    {{-- @if ($isYajra || $isAjaxYajra)
                    <textarea name="yajraColumns" id="yajraColumnsDeleted" cols="30" rows="10" style="display: none;">{!! $yajraColumns !!}</textarea>
                  @endif --}}
                    @yield('table-deleted')
                  </div>
                @else
                  <div class="alert alert-info">
                    <strong>Info!</strong> Tidak ada data {{ $title }} yang sudah dihapus.
                  </div>
                @endif
              </div>
            </div>
          @endif
        @else
          @include('stisla.includes.others.empty-state', ['title' => 'Data ' . $title, 'icon' => $moduleIcon, 'link' => $route_create])
        @endif
      </div>

    </div>
  </div>

@endsection

@push('css')
@endpush

@push('js')
@endpush

@push('scripts')
@endpush

@push('modals')
  @if ($canImportExcel)
    @include('stisla.includes.modals.modal-import-excel', [
        'formAction' => $routeImportExcel,
        'downloadLink' => $routeExampleExcel,
    ])
  @endif

  @if ($canCreate)
    @include('stisla.includes.modals.modal-form', [
        'formAction' => $routeImportExcel,
        'downloadLink' => $routeExampleExcel,
    ])
  @endif
@endpush
