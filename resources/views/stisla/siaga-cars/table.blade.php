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

@if ($canFilterData && $data->count() > 100)
  @section('filter_top')
    @if (Route::is($prefix . '.index'))
      @include('stisla.includes.others.filter-default', ['is_show' => false])
    @endif
  @endsection
@endif

{{-- ini bisa diuncoment kalau dibutuhkan --}}
{{-- @section('panel11')
  <div class="card">
    <div class="card-header">
      <h4><i class="fa fa-atom"></i> {{ __('Judul') }}</h4>
      <div class="card-header-action">
        <a class="btn btn-primary" data-toggle="collapse" href="#collapsePanel11" role="button" aria-expanded="false" aria-controls="collapsePanel11">
          <i class="fa fa-angle-down"></i>
        </a>
      </div>
    </div>
    <div class="card-body">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia earum assumenda saepe et dignissimos ut error possimus perferendis ipsa, consequatur obcaecati harum numquam tenetur blanditiis
      dolore. Dolores sunt tempora repellat.
      <br>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero eligendi porro sunt temporibus explicabo, provident incidunt labore est at recusandae ab distinctio atque totam nihil aspernatur
      facere commodi exercitationem iste.
    </div>
  </div>
@endsection --}}
