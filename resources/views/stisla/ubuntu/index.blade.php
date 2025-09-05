@extends('stisla.layouts.app-table')

@section('title')
  {{ $title ?? 'Ubuntu' }}
@endsection

@section('content')
  <div class="section-header">
    <h1>{{ $title ?? __('Ubuntu') }}</h1>
  </div>
  <div class="row">
    @if (config('app.is_demo'))
      <div class="col-12">
        @include('stisla.ubuntu.alert-demo')
      </div>
    @else
      @include('stisla.ubuntu.files')
      @include('stisla.ubuntu.supervisor')
      @include('stisla.ubuntu.php')
      @include('stisla.ubuntu.nginx')
      @include('stisla.ubuntu.mysql')
    @endif
  </div>
@endsection
