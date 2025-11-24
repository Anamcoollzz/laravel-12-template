@php
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
@endphp

@extends('stisla.layouts.app-datatable')

@section('table')
  @include('stisla.' . $prefix . '.only-table', ['data' => $data, 'isTrashed' => false])
@endsection

@section('table-deleted')
  @include('stisla.' . $prefix . '.only-table', ['data' => $deletedData, 'isTrashed' => true])
@endsection

@if ($canFilterData)
  @section('filter_top')
    @if (Route::is($prefix . '.index'))
      @include('stisla.includes.others.filter-default', ['is_show' => false])
    @endif
  @endsection
@endif

{{-- ini bisa diuncoment kalau dibutuhkan --}}
@section('panel11')
  <div class="card">
    <div class="card-header">
      <h4><i class="{{ $moduleIcon }}"></i> Tarik Data Dari Mesin</h4>
    </div>
    <div class="card-body">

      <form action="{{ route('finger-print-x105-ids.get-log') }}" method="post">
        @csrf
        <div class="row">
          {{-- <div class="col-md-6 col-lg-3">
            @include('stisla.includes.forms.inputs.input', ['id' => 'ip', 'label' => 'IP Address', 'value' => request('ip', '192.168.1.201')])
          </div>
          <div class="col-md-6 col-lg-3">
            @include('stisla.includes.forms.inputs.input', ['id' => 'key', 'label' => 'Comm Key', 'value' => request('key', '0')])
          </div>
          <div class="col-md-6 col-lg-3">
            @include('stisla.includes.forms.inputs.input', ['id' => 'id', 'label' => 'User ID', 'value' => request('id', '1')])
          </div>
          <div class="col-md-6 col-lg-3">
            @include('stisla.includes.forms.inputs.input', ['id' => 'fn', 'label' => 'Finger No', 'value' => request('fn', '0')])
          </div> --}}
          <div class="col-md-6 col-lg-4">
            @include('stisla.includes.forms.selects.select', [
                'id' => 'filter_machine_id',
                'name' => 'filter_machine_id',
                'options' => $machines,
                'label' => __('validation.attributes.machine_name'),
                'required' => false,
                'with_all' => false,
                'selected' => request('filter_machine_id', null),
            ])
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit">Tarik Data</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
