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
