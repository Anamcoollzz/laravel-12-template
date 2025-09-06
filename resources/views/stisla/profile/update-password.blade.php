<div class="col-12">
  @if (user_can('Profil Perbarui Password'))
    @if ($user->last_password_change)
      <div class="alert alert-{{ $totalDay > 30 ? 'danger' : 'info' }} alert-has-icon">
        <div class="alert-icon"><i class="{{ $totalDay > 30 ? 'fa fa-warning' : 'far fa-lightbulb' }}"></i></div>
        <div class="alert-body">
          <div class="alert-title">{{ $totalDay > 30 ? __('Peringatan') : __('Informasi') }}</div>
          {{ __('Password terakhir kali diperbarui pada ') . $user->last_password_change }}
          @if ($totalDay > 30)
            <br>
            {{ __('Kami merekomendasikan password diganti per 30 hari') }}
          @endif
        </div>
      </div>
    @endif
    <form action="{{ route('profile.update-password') }}" method="post" class="needs-validation" id="formPassword">
      <div class="card" id="update-password">
        <div class="card-header">
          <h4> <i class="fa fa-key"></i> {{ __('Perbarui Password') }}</h4>
        </div>
        <div class="card-body">
          @method('PUT')
          @csrf
          <div class="row">
            <div class="col-md-6">
              @include('stisla.includes.forms.inputs.input-password', ['value' => '', 'id' => 'old_password', 'label' => __('Password Lama')])
            </div>
            <div class="col-md-6">
              @include('stisla.includes.forms.inputs.input-password', ['value' => '', 'id' => 'new_password', 'label' => __('Password Baru')])
            </div>
            <div class="col-md-6">
              @include('stisla.includes.forms.inputs.input-password', ['value' => '', 'id' => 'new_password_confirmation', 'label' => __('Konfirmasi Password Baru')])
            </div>

            @if (!($_is_superadmin && config('app.is_demo')))
              <div class="col-md-12">
                @include('stisla.includes.forms.buttons.btn-save')
                @include('stisla.includes.forms.buttons.btn-reset')
              </div>
            @endif

          </div>
        </div>
      </div>

    </form>
  @endif

  @if (user_can('Profil Hapus Akun'))
    <form action="{{ route('profile.delete-account') }}" method="post" class="needs-validation" id="formDeleteAccount">

      <div class="alert alert-warning alert-has-icon">
        <div class="alert-icon"><i class="fa fa-warning"></i></div>
        <div class="alert-body">
          <div class="alert-title">{{ __('Peringatan') }}</div>
          {{ __('Sekali hapus, akun anda tidak bisa digunakan kembali') }}
        </div>
      </div>

      <div class="card" id="delete-account-card">
        <div class="card-header">
          <h4> <i class="fa fa-trash"></i> {{ __('Hapus Akun') }}</h4>
        </div>
        <div class="card-body">
          @method('PUT')
          @csrf
          <div class="row">
            <div class="col-md-6">
              @include('stisla.includes.forms.inputs.input-email', ['value' => '', 'name' => 'confirm_email'])
            </div>

            @if (!($_is_superadmin && config('app.is_demo')))
              <div class="col-md-12">
                @include('stisla.includes.forms.buttons.btn-save', ['label' => __('Hapus Akun'), 'icon' => 'trash', 'type' => 'danger'])
                {{-- @include('stisla.includes.forms.buttons.btn-reset') --}}
              </div>
            @endif

          </div>
        </div>
      </div>

    </form>
  @endif

</div>
