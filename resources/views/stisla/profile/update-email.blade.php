@if (user_can('Profil Perbarui Email'))
  <div class="col-12">
    <form action="{{ route('profile.update-email') }}" method="post" class="needs-validation" id="formEmail">
      <div class="card">
        <div class="card-header">
          <h4> <i class="fa fa-envelope"></i> {{ __('Perbarui Email') }}</h4>
        </div>
        <div class="card-body">
          @method('PUT')
          @csrf
          <div class="row">
            @if ($user->twitter_id)
              <div class="col-md-6">
                @include('stisla.includes.forms.inputs.input', ['value' => $user->twitter_id, 'label' => 'Twitter ID', 'disabled' => true])
              </div>
            @endif
            <div class="col-md-6">
              @include('stisla.includes.forms.inputs.input-email', [
                  'value' => $user->email,
                  'is_valid' => ($eva = Auth::user()->email_verified_at ? 'is-valid' : ''),
                  'valid_feedback' => $eva ? 'Email sudah diverifikasi' : '',
              ])
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
  </div>
@endif
