@php
  $isYajra = $isYajra ?? false;
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
@endphp

@extends('stisla.layouts.app')

@section('title')
  {{ $title }}
@endsection

@section('content')
  @include('stisla.includes.breadcrumbs.breadcrumb-table')
  @include('stisla.includes.others.alert-password')
  {{-- <div class="section-body">
    <h2 class="section-title">{{ $title }}</h2>
    <p class="section-lead">{{ __('Menampilkan halaman ' . $title) }}.</p>
    <div class="row">
      <div class="col-12">

        @yield('filter_top')

        @if ($data->count() > 0 || $isYajra || $isAjaxYajra)
          @if ($canExport)
            <div class="card">
              <div class="card-header">
                <h4><i class="fa fa-print"></i> {!! __('Aksi Ekspor <small>(Server Side)</small>') !!}</h4>
                <div class="card-header-action">
                  @include('stisla.includes.forms.buttons.btn-pdf-download', ['link' => $routePdf . '?' . request()->getQueryString()])
                  @include('stisla.includes.forms.buttons.btn-excel-download', ['link' => $routeExcel . '?' . request()->getQueryString()])
                  @include('stisla.includes.forms.buttons.btn-csv-download', ['link' => $routeCsv . '?' . request()->getQueryString()])
                  @include('stisla.includes.forms.buttons.btn-json-download', ['link' => $routeJson . '?' . request()->getQueryString()])
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
                @if ($canImportExcel)
                  @include('stisla.includes.forms.buttons.btn-import-excel')
                @endif
                @if ($canCreate)
                  @include('stisla.includes.forms.buttons.btn-add', ['link' => $route_create])
                @endif
                @yield('btn-action-header')
              </div>
            </div>
            <div class="card-body">
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
        @else
          @include('stisla.includes.others.empty-state', ['title' => 'Data ' . $title, 'icon' => $moduleIcon, 'link' => $route_create])
        @endif
      </div>

    </div>
  </div> --}}


  <div class="section-body">
    <h2 class="section-title">Chat Boxes</h2>
    <p class="section-lead">The chat component and is equipped with a JavaScript API, making it easy for you to integrate with Back-end.</p>

    <div class="row align-items-center justify-content-center">
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Who's Online?</h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
              <li class="media">
                <img alt="image" class="mr-3 rounded-circle" width="50" src="{{ url('stisla') }}/assets/img/avatar/avatar-1.png">
                <div class="media-body">
                  <div class="mt-0 mb-1 font-weight-bold">Hasan Basri</div>
                  <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                </div>
              </li>
              <li class="media">
                <img alt="image" class="mr-3 rounded-circle" width="50" src="{{ url('stisla') }}/assets/img/avatar/avatar-2.png">
                <div class="media-body">
                  <div class="mt-0 mb-1 font-weight-bold">Bagus Dwi Cahya</div>
                  <div class="text-small font-weight-600 text-muted"><i class="fas fa-circle"></i> Offline</div>
                </div>
              </li>
              <li class="media">
                <img alt="image" class="mr-3 rounded-circle" width="50" src="{{ url('stisla') }}/assets/img/avatar/avatar-3.png">
                <div class="media-body">
                  <div class="mt-0 mb-1 font-weight-bold">Wildan Ahdian</div>
                  <div class="text-small font-weight-600 text-success"><i class="fas fa-circle"></i> Online</div>
                </div>
              </li>
              <li class="media">
                <img alt="image" class="mr-3 rounded-circle" width="50" src="{{ url('stisla') }}/assets/img/avatar/avatar-4.png">
                <div class="media-body">
                  <div class="mt-0 mb-1 font-weight-bold">Rizal Fakhri</div>
                  <div class="text-small font-weight-600 text-success"><i class="fas fa-circle"></i> Online</div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card chat-box" id="mychatbox">
          <div class="card-header">
            <h4>Chat with Rizal</h4>
          </div>
          <div class="card-body chat-content">
          </div>
          <div class="card-footer chat-form">
            <form id="chat-form">
              <input type="text" class="form-control" placeholder="Type a message">
              <button class="btn btn-primary">
                <i class="far fa-paper-plane"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card chat-box card-success" id="mychatbox2">
          <div class="card-header">
            <h4><i class="fas fa-circle text-success mr-2" title="Online" data-toggle="tooltip"></i> Chat with Ryan</h4>
          </div>
          <div class="card-body chat-content">
          </div>
          <div class="card-footer chat-form">
            <form id="chat-form2">
              <input type="text" class="form-control" placeholder="Type a message">
              <button class="btn btn-primary">
                <i class="far fa-paper-plane"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('css')
@endpush

@push('js')
  <!-- Page Specific JS File -->
  <script src="{{ url('stisla') }}/assets/js/page/components-chat-box.js?id=1"></script>
@endpush

@push('scripts')
@endpush

@push('modals')
  {{-- @if ($canImportExcel)
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
  @endif --}}
@endpush
