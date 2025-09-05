@php
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
@endphp

@extends('stisla.layouts.app-datatable')

@section('table')
  @include('stisla.alumnis.table')
@endsection

@section('filter_top')
  @if (Route::is('alumnis.index' && !is_mahasiswa()))
    @include('stisla.includes.others.filter-default', ['is_show' => false])
  @endif
@endsection
