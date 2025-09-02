@extends('stisla.layouts.app-table')

@section('title')
  MySql
@endsection

@section('content')
  <div class="section-header">
    <h1>{{ __('MySql') }}</h1>
  </div>
  <div class="row">

    @include('stisla.ubuntu.mysql')

  </div>
@endsection
