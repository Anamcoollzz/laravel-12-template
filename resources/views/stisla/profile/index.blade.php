@php
  $_superadmin_account = \App\Models\User::find(1);
  $_is_superadmin = auth_id() == $_superadmin_account->id;
@endphp

@extends('stisla.layouts.app')

@section('title')
  {{ $title = 'Profil' }}
@endsection

@section('content')
  @include('stisla.includes.breadcrumbs.breadcrumb-table')

  <div class="section-body">
    <h2 class="section-title">{{ $title }}</h2>
    <p class="section-lead">{{ __('Perbarui kapan saja profil anda di halaman ini') }}.</p>
    <div class="row">
      <div class="col-12">
        <form action="" method="post" enctype="multipart/form-data" class="needs-validation">
          <div class="card">
            <div class="card-header">
              <h4> <i class="fa fa-user"></i> {{ $title }}</h4>
            </div>
            <div class="card-body">
              @method('PUT')
              @csrf
              <div class="row">
                @include('stisla.user-management.users.avatar', ['d' => $user])
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input-name', ['value' => $user->name])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input-avatar', ['required' => false])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', [
                      'id' => 'phone_number',
                      'name' => 'phone_number',
                      'label' => __('No HP'),
                      'type' => 'text',
                      'required' => false,
                      'icon' => 'fas fa-phone',
                  ])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', [
                      'id' => 'birth_date',
                      'name' => 'birth_date',
                      'label' => __('Tanggal Lahir'),
                      'type' => 'date',
                      'required' => false,
                      'icon' => 'fas fa-calendar',
                  ])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', [
                      'id' => 'address',
                      'name' => 'address',
                      'label' => __('Alamat'),
                      'type' => 'text',
                      'required' => false,
                      'icon' => 'fas fa-map-marker-alt',
                  ])
                </div>
                <div class="col-md-12">
                  @include('stisla.includes.forms.buttons.btn-save')
                  @include('stisla.includes.forms.buttons.btn-reset')
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>

      @include('stisla.profile.alert')
      @include('stisla.profile.update-email')
      @include('stisla.profile.update-password')
    </div>
  </div>
@endsection

@if ($errors->has('confirm_email'))
  @push('scripts')
    <script>
      window.location.href = '#delete-account-card'
    </script>
  @endpush
@endif

@if ($_is_superadmin && config('app.is_demo'))
  @push('scripts')
    <script>
      $(function() {
        $('#formEmail').find('input').attr('disabled', true)
        $('#formPassword').find('input').attr('disabled', true)
      })
    </script>
  @endpush
@endif
