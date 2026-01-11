@extends('stisla.layouts.app-auth')

@section('title')
  {{ __('Masuk') }}
@endsection

@section('content')
  <div class="p-4 m-3">
    <div class="align-self-center">
      <img src="{{ $_logo_url }}" alt="{{ $_app_name }}" width="80" class="shadow-light rounded-circle mb-5 mt-2">
      <h4 class="text-dark font-weight-normal">Selamat datang di
        <span class="font-weight-bold">{{ $_app_name }}</span>
      </h4>
      <h5 class="text-dark font-weight-normal">{{ $_company_name }}</h5>

      <p class="text-muted">
        {{ __('Sebelum memulai, anda harus masuk terlebih dahulu dengan akun anda.') }}
      </p>
    </div>

    @if (config('app.is_demo'))
      @php
        $_superadmin_account = \App\Models\User::find(1);
      @endphp
      <div class="alert alert-info">
        Anda bisa menggunakan akun demo sebagai berikut
        <br>
        <strong>Email:</strong>
        {{ $_superadmin_account->email }}
        <br>
        <strong>Password:</strong>
        superadmin
      </div>
    @endif

    <form method="POST" action="" class="needs-validation" novalidate="" id="formLogin">
      @csrf
      <div class="form-group is-invalid">
        <label for="email" style="" class="">Email
          <span style="color: #dc3545;">*</span>
        </label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text ">
              <i class="fas fa-envelope"></i>
            </div>
          </div>
          <input id="email" name="email" value="" required="" type="email" class="form-control @error('email') is-invalid @enderror  " step="any" autocomplete="email"
            value="{{ old('email') }}">
        </div>
        @error('email')
          <div id="email-error-feedback" for="email" style="display: block" class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>


      <div class="form-group">
        <label for="password">Password
          <span style="color: #dc3545;">*</span>
        </label>

        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text ">
              <i class="fas fa-key"></i>
            </div>
          </div>
          <input id="password" name="password" value="" required="" type="password" class="form-control @error('password') is-invalid @enderror  " aria-autocomplete="list"
            autocomplete="current-password" minlength="4" value="{{ old('password') }}">
        </div>

        @error('password')
          <div id="password-error-feedback" for="password" style="display: block" class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
          <label class="custom-control-label" for="remember-me">Ingat Saya</label>
        </div>
      </div>

      <div class="form-group text-right">

        <button type="submit" class="btn btn-primary  btn-icon icon-left ">
          <i class="fas fa-sign-in-alt"></i>
          Masuk
        </button>
      </div>


    </form>
    <div class="text-center mt-5 text-small">
      Copyright &copy; {{ $_company_name }}. Dibuat dengan 💙 Template Stisla
    </div>


  </div>
@endsection
