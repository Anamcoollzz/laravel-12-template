@extends('stisla.layouts.app-blank', \App\Repositories\SettingRepository::settings())

@section('content')
  @if (config('app.template') === 'stisla')
    @include('errors.default-stisla', ['code' => 403, 'description' => $exception->getMessage()])
  @endif
@endsection

@section('title')
  403 {{ $exception->getMessage() }}
@endsection
