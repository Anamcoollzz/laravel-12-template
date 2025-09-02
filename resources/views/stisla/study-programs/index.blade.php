@php
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
@endphp

@extends('stisla.layouts.app-datatable')

@section('table')
  @include('stisla.study-programs.table')
@endsection

@section('filter_top')
  @if (Route::is('study-programs.index'))
    @include('stisla.includes.others.filter-default', ['is_show' => false])
  @endif
@endsection
