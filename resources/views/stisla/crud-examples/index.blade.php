@php
  $isYajra = $isYajra ?? false;
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
@endphp

@extends('stisla.layouts.app-table')

@section('title')
  {{ $title }}
@endsection

@section('content')
  <input type="hidden" id="refreshPage" value="1">
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
          @if ($canExport)
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
                {{-- @if (isset($canShowDeleted) && $canShowDeleted)
                  @php
                    $show_deleted = request('show_deleted') === 'true';
                  @endphp
                  <a href="?show_deleted={{ $show_deleted ? '' : 'true' }}" class="btn btn-{{ $show_deleted ? 'danger' : 'primary' }}" data-toggle="tooltip"
                    title="{{ __($show_deleted ? 'Sembunyikan Data Yang Dihapus' : 'Tampilkan Data Yang Dihapus') }}"><i class="fa fa-{{ $show_deleted ? 'eye-slash' : 'eye' }}"></i></a>
                @endif --}}
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
              {{-- @include('stisla.includes.forms.buttons.btn-datatable') --}}
              <div class="table-responsive" id="datatable-view">
                <input type="hidden" id="isYajra" value="{{ $isYajra }}">
                <input type="hidden" id="isAjax" value="{{ $isAjax }}">
                <input type="hidden" id="isAjaxYajra" value="{{ $isAjaxYajra }}">
                @if ($isYajra || $isAjaxYajra)
                  <textarea name="yajraColumns" id="yajraColumns" cols="30" rows="10" style="display: none;">{!! $yajraColumns !!}</textarea>
                @endif
                @php
                  $isTrashed = $isTrashed ?? false;
                  $isExport = $isExport ?? false;
                  $isAjax = $isAjax ?? false;
                  $isYajra = $isYajra ?? false;
                  $isAjaxYajra = $isAjaxYajra ?? false;
                  $canExport = $canExport ?? false;
                  $canUpdate = $canUpdate ?? false;
                  $canDelete = $canDelete ?? false;
                  $canDetail = $canDetail ?? false;
                @endphp

                <table class="table table-striped @if ($isYajra || $isAjaxYajra) yajra-datatable @endif"
                  @if ($isYajra || $isAjaxYajra) data-ajax-url="{{ $routeYajra }}?isAjaxYajra={{ $isAjaxYajra }}" @else  @if ($isTrashed) id="datatable-trashed" @else id="datatable" @endif
                  @endif
                  @if ($isExport === false && $canExport) data-export="true" data-title="{{ $title }}" @endif>
                  <thead>
                    <tr>
                      {{-- @if ($isTrashed === false && $isExport === false)
                        <th class="td-checkbox no-sort">
                          <input type="checkbox" id="select_all_checkbox" />
                        </th>
                      @endif --}}
                      @if ($isExport)
                        <th class="text-center">#</th>
                      @else
                        <th>{{ __('No') }}</th>
                      @endif

                      {{-- ini adalah hasil dari make:module --}}
                      {{-- columns --}}

                      {{-- yang ini boleh dikomen --}}
                      @if ($is_has_name ?? false)
                        <th>{{ __('validation.attributes.name') }}</th>
                      @endif
                      @if ($is_has_phone_number ?? false)
                        <th>{{ __('validation.attributes.phone_number') }}</th>
                      @endif
                      @if ($is_has_address ?? false)
                        <th>{{ __('validation.attributes.address') }}</th>
                      @endif
                      @if ($is_has_birthdate ?? false)
                        <th>{{ __('validation.attributes.birthdate') }}</th>
                      @endif
                      @if ($is_has_avatar ?? false)
                        <th>{{ __('validation.attributes.avatar') }}</th>
                      @endif
                      @if ($is_has_text ?? false)
                        <th>{{ __('validation.attributes.text') }}</th>
                      @endif
                      @if ($is_has_barcode ?? false)
                        <th>{{ __('validation.attributes.barcode') }}</th>
                      @endif
                      @if ($is_has_qr_code ?? false)
                        <th>{{ __('validation.attributes.qr_code') }}</th>
                      @endif
                      @if ($is_has_email ?? false)
                        <th>{{ __('validation.attributes.email') }}</th>
                      @endif
                      @if ($is_has_number ?? false)
                        <th>{{ __('validation.attributes.number') }}</th>
                      @endif
                      @if ($is_has_currency ?? false)
                        <th>{{ __('validation.attributes.currency') }}</th>
                      @endif
                      @if ($is_has_currency_idr ?? false)
                        <th>{{ __('validation.attributes.currency_idr') }}</th>
                      @endif
                      @if ($is_has_select ?? false)
                        <th>{{ __('validation.attributes.select') }}</th>
                      @endif
                      @if ($is_has_select2 ?? false)
                        <th>{{ __('validation.attributes.select2') }}</th>
                      @endif
                      @if ($is_has_select2_multiple ?? false)
                        <th>{{ __('validation.attributes.select2_multiple') }}</th>
                      @endif
                      @if ($is_has_textarea ?? false)
                        <th>{{ __('validation.attributes.textarea') }}</th>
                      @endif
                      @if ($is_has_radio ?? false)
                        <th>{{ __('validation.attributes.radio') }}</th>
                      @endif
                      @if ($is_has_checkbox ?? false)
                        <th>{{ __('validation.attributes.checkbox') }}</th>
                      @endif
                      @if ($is_has_checkbox2 ?? false)
                        <th>{{ __('validation.attributes.checkbox2') }}</th>
                      @endif
                      @if ($is_has_is_active ?? false)
                        <th>{{ __('validation.attributes.is_active') }}</th>
                      @endif
                      @if ($is_has_tags ?? false)
                        <th>{{ __('validation.attributes.tags') }}</th>
                      @endif
                      @if ($is_has_file ?? false)
                        <th>{{ __('validation.attributes.file') }}</th>
                      @endif
                      @if ($is_has_image ?? false)
                        <th>{{ __('validation.attributes.image') }}</th>
                      @endif
                      @if ($is_has_date ?? false)
                        <th>{{ __('validation.attributes.date') }}</th>
                      @endif
                      @if ($is_has_time ?? false)
                        <th>{{ __('validation.attributes.time') }}</th>
                      @endif
                      @if ($is_has_color ?? false)
                        <th>{{ __('validation.attributes.color') }}</th>
                      @endif
                      @if (!$isExport)
                        @if ($is_has_summernote_simple ?? false)
                          <th>{{ __('validation.attributes.summernote_simple') }}</th>
                        @endif
                        @if ($is_has_summernote ?? false)
                          <th>{{ __('validation.attributes.summernote') }}</th>
                        @endif
                        {{-- @if ($is_has_tinymce ?? false)
                          <th>{{ __('validation.attributes.tinymce') }}</th>
                        @endif
                        @if ($is_has_ckeditor ?? false)
                          <th>{{ __('validation.attributes.ckeditor') }}</th>
                        @endif --}}
                      @endif

                      {{-- wajib --}}
                      <th>{{ __('validation.attributes.created_at') }}</th>
                      <th>{{ __('validation.attributes.updated_at') }}</th>
                      @if ($isTrashed)
                        <th>{{ __('validation.attributes.deleted_at') }}</th>
                      @endif
                      <th>{{ __('validation.attributes.created_by') }}</th>
                      <th>{{ __('validation.attributes.updated_by') }}</th>
                      @if ($isExport === false && ($canUpdate || $canDelete || $canDetail))
                        <th class="td-action no-sort">{{ __('validation.attributes.actions') }}</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @if ($isYajra === false)
                      @foreach ($data as $item)
                        <tr>
                          {{-- @if ($isTrashed === false && $isExport === false)
                            <td class="td-checkbox">
                              <input onclick="onCheck()" type="checkbox" class="record_checkbox" data-id="{{ $item->uuid ?? $item->id }}" />
                            </td>
                          @endif --}}
                          <td>{{ $loop->iteration }}</td>

                          {{-- ini adalah hasil dari make:module --}}
                          {{-- columnstd --}}

                          {{-- yang ini boleh dikomen --}}
                          @if ($is_has_name ?? false)
                            <td>{{ $item->name }}</td>
                          @endif
                          @if ($is_has_phone_number ?? false)
                            @include('stisla.includes.others.td-phone-number')
                          @endif
                          @if ($is_has_address ?? false)
                            @include('stisla.includes.others.td-address')
                          @endif
                          @if ($is_has_birthdate ?? false)
                            @include('stisla.includes.others.td-dob', ['DateTime' => $item->birthdate])
                          @endif
                          @if ($is_has_avatar ?? false)
                            @include('stisla.includes.others.td-avatar')
                          @endif
                          @if ($is_has_text ?? false)
                            <td>{{ $item->text }}</td>
                          @endif
                          @if ($is_has_barcode ?? false)
                            @include('stisla.includes.others.td-barcode')
                          @endif
                          @if ($is_has_qr_code ?? false)
                            @include('stisla.includes.others.td-qrcode')
                          @endif
                          @if ($is_has_email ?? false)
                            @include('stisla.includes.others.td-email')
                          @endif
                          @if ($is_has_number ?? false)
                            <td>{{ $item->number }}</td>
                          @endif
                          @if ($is_has_currency ?? false)
                            @include('stisla.includes.others.td-dollar')
                          @endif
                          @if ($is_has_currency_idr ?? false)
                            @include('stisla.includes.others.td-rp')
                          @endif
                          @if ($is_has_select ?? false)
                            <td>{{ $item->select }}</td>
                          @endif
                          @if ($is_has_select2 ?? false)
                            <td>{{ $item->select2 }}</td>
                          @endif
                          @if ($is_has_select2_multiple ?? false)
                            @include('stisla.includes.others.td-array')
                          @endif
                          @if ($is_has_textarea ?? false)
                            <td>{{ $item->textarea }}</td>
                          @endif
                          @if ($is_has_radio ?? false)
                            <td>{{ $item->radio }}</td>
                          @endif
                          @if ($is_has_checkbox ?? false)
                            @include('stisla.includes.others.td-array', ['arr' => $item->checkbox])
                          @endif
                          @if ($is_has_checkbox2 ?? false)
                            @include('stisla.includes.others.td-array', ['arr' => $item->checkbox2])
                          @endif
                          @if ($is_has_is_active ?? false)
                            @if ($item->is_active)
                              <td><span class="badge badge-success">{{ __('Ya') }}</span></td>
                            @else
                              <td><span class="badge badge-danger">{{ __('Tidak') }}</span></td>
                            @endif
                          @endif
                          @if ($is_has_tags ?? false)
                            @include('stisla.includes.others.td-tags')
                          @endif
                          @if ($is_has_file ?? false)
                            @include('stisla.includes.others.td-file')
                          @endif
                          @if ($is_has_image ?? false)
                            @include('stisla.includes.others.td-image')
                          @endif
                          @if ($is_has_date ?? false)
                            @include('stisla.includes.others.td-datetime', ['DateTime' => $item->date])
                          @endif
                          @if ($is_has_time ?? false)
                            <td>{{ $item->time }}</td>
                          @endif
                          @if ($is_has_color ?? false)
                            @include('stisla.includes.others.td-color')
                          @endif

                          @if (!$isExport)
                            @if ($is_has_summernote_simple ?? false)
                              @include('stisla.includes.others.td-html', ['htmlItem' => $item->summernote_simple, 'id' => 'summernoteSimple' . $item->id])
                            @endif
                            @if ($is_has_summernote ?? false)
                              @include('stisla.includes.others.td-html', ['htmlItem' => $item->summernote, 'id' => 'summernote' . $item->id])
                            @endif
                            {{-- @if ($is_has_tinymce ?? false)
                              @include('stisla.includes.others.td-html', ['htmlItem' => $item->tinymce, 'id' => 'tinymce' . $item->id])
                            @endif
                            @if ($is_has_ckeditor ?? false)
                              @include('stisla.includes.others.td-html', ['htmlItem' => $item->ckeditor, 'id' => 'ckeditor' . $item->id])
                            @endif --}}
                          @endif

                          {{-- wajib --}}
                          @include('stisla.includes.others.td-created-updated-at')
                          @include('stisla.includes.others.td-created-updated-by')
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
                            <td class="td-action">
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
                                      <a onclick="showModalForm(event, 'edit', '{{ route('contoh-crud.ubah', [$item->id]) }}')" class="dropdown-item has-icon"
                                        href="{{ route($routePrefix . '.ubah', [$item->id]) }}"><i class="far fa-edit"></i> Ubah</a>
                                    @endif
                                    @if ($canDuplicate)
                                      <a onclick="duplicateGlobal(event, '{{ route($routePrefix . '.duplicate', [$item->id]) }}', 'warning')" class="dropdown-item has-icon text-success" href="#">
                                        <i class="fas fa-copy"></i> Duplikat
                                      </a>
                                    @endif
                                    @if ($canDuplicate && $canShowDeleted === false)
                                      <a onclick="deleteGlobal(event, '{{ route($routePrefix . '.hapus', [$item->id]) }}', 'warning')" class="dropdown-item has-icon text-danger" href="#">
                                        <i class="fas fa-trash"></i> Hapus
                                      </a>
                                    @else
                                      <a onclick="deleteGlobal(event, '{{ route($routePrefix . '.hapus', [$item->id]) }}', 'warning')" class="dropdown-item has-icon text-warning" href="#">
                                        <i class="fas fa-trash">
                                        </i> Hapus
                                      </a>
                                    @endif
                                    {{-- @if ($canShowDeleted)
                                      <a onclick="forceDeleteGlobal(event, '{{ route($routePrefix . '.force-delete', [$item->id]) }}', 'danger')" class="dropdown-item has-icon text-danger"
                                        href="#">
                                        <i class="fas fa-trash">
                                        </i> Hapus Permanen
                                      </a>
                                    @endif --}}

                                    @if ($canExport && !is_app_pocari())
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item has-icon" style="color: purple;" href="{{ route($routePrefix . '.single-pdf', [$item->id]) . '?' . request()->getQueryString() }}">
                                        <i class="fas fa-file-pdf">
                                        </i> Ekspor PDF
                                      </a>
                                      {{-- @foreach ($htmlColumns as $hc)
                                        <a class="dropdown-item has-icon" style="color: purple;"
                                          href="{{ route($routePrefix . '.single-pdf', [$item->id]) . '?col=' . $hc . '&' . request()->getQueryString() }}">
                                          <i class="fas fa-file-pdf">
                                          </i> {{ __('validation.attributes.' . $hc) }}
                                        </a>
                                      @endforeach --}}
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
                                  @include('stisla.includes.forms.buttons.btn-pdf-download', [
                                      'link' => route($routePrefix . '.single-pdf', [$item->id]) . '?' . request()->getQueryString(),
                                      'size' => 'sm',
                                  ])
                                  {{-- @foreach ($htmlColumns as $hc)
                                    @include('stisla.includes.forms.buttons.btn-pdf-download', [
                                        'link' => route($routePrefix . '.single-pdf', [$item->id]) . '?col=' . $hc . '&' . request()->getQueryString(),
                                        'size' => 'sm',
                                        'tooltip' => 'Download PDF (only ' . ucwords(str_replace('_', ' ', $hc)) . ' column)',
                                    ])
                                  @endforeach --}}
                                @endif
                              @endif
                            </td>
                          @endif

                        </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>

              </div>
            </div>
          </div>

          {{-- @if (isset($canShowDeleted) && $canShowDeleted && request()->get('show_deleted') == 'true')
            <div class="card">
              <div class="card-header">
                <h4><i class="{{ $moduleIcon }}"></i> Data {{ $title }} Yang Sudah Dihapus</h4>

                <div class="card-header-action">
                  @if ($canImportExcel)
                    @include('stisla.includes.forms.buttons.btn-import-excel')
                  @endif
                  @if ($deletedData->count() > 0)
                    @include('stisla.includes.forms.buttons.btn-restore', ['link' => $route_restore_all, 'label' => 'Pulihkan Semua'])
                    @include('stisla.includes.forms.buttons.btn-force-delete', ['link' => $route_force_delete_all, 'label' => 'Hapus Permanen Semua'])
                  @endif
                  @yield('btn-action-header')
                </div>
              </div>
              <div class="card-body">
                @if ($deletedData->count() > 0)
                  @include('stisla.includes.forms.buttons.btn-datatable')
                  <div class="table-responsive" id="datatable-view-deleted">
                    <input type="hidden" id="isYajra" value="{{ $isYajra }}">
                    <input type="hidden" id="isAjax" value="{{ $isAjax }}">
                    <input type="hidden" id="isAjaxYajra" value="{{ $isAjaxYajra }}">
                    @if ($isYajra || $isAjaxYajra)
                      <textarea name="yajraColumns" id="yajraColumnsDeleted" cols="30" rows="10" style="display: none;">{!! $yajraColumns !!}</textarea>
                    @endif
                    @yield('table-deleted')
                  </div>
                @else
                  <div class="alert alert-info">
                    <strong>Info!</strong> Tidak ada data {{ $title }} yang sudah dihapus.
                  </div>
                @endif
              </div>
            </div>
          @endif --}}
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

@push('js')
  <script src="https://cdn.ckeditor.com/ckeditor5/47.2.0/ckeditor5.umd.js" crossorigin></script>
  <script src="https://cdn.ckeditor.com/ckeditor5-premium-features/47.2.0/ckeditor5-premium-features.umd.js" crossorigin></script>
  <script src="https://cdn.ckbox.io/ckbox/2.6.1/ckbox.js" crossorigin></script>
  <script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush

@push('css')
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/47.2.0/ckeditor5.css" crossorigin>
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/47.2.0/ckeditor5-premium-features.css" crossorigin>
  <link rel="stylesheet" href="{{ asset('css/ckeditor.css') }}" crossorigin>
@endpush

@push('js')
  <script script src="https://cdn.tiny.cloud/1/jxvffz1ahm5v7gvf683q2c4npxdy51qbvr2guyusd2wicvgw/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
  {{-- <script src="https://your_server/tinymce.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/8/plugins.min.js" referrerpolicy="origin" crossorigin="anonymous"></script> --}}
@endpush
