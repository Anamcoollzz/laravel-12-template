@extends('stisla.layouts.app-table')

@section('title')
  MySql
@endsection

@section('content')
  <div class="section-header">
    <h1>{{ __('MySql') }}</h1>
  </div>

  @if (config('app.is_demo'))
    @include('stisla.ubuntu.alert-demo')
  @else
    <div class="row">

      @include('stisla.ubuntu.mysql')

    </div>
  @endif
@endsection
