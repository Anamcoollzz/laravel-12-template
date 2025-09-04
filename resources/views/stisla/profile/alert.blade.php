@if (user_can('Profil Perbarui Email') || user_can('Profil Perbarui Password'))
  <div class="col-12">
    @if (config('app.is_demo') && $_is_superadmin)
      <div class="alert alert-info alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
          <div class="alert-title">{{ __('Informasi') }}</div>
          Dalam versi demo email dan password tidak bisa diubah
        </div>
      </div>
    @endif
  </div>
@endif
