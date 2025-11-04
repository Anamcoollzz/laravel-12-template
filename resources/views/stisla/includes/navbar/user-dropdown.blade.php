<li class="dropdown">
  <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    @if (Auth::user()->avatar_url)
      <img alt="{{ Auth::user()->name }}" src="{{ Auth::user()->avatar_url }}" class="rounded-circle mr-1">
    @else
      <figure class="avatar mr-2 bg-success text-white" data-initial="{{ \App\Helpers\StringHelper::acronym(Auth::user()->name, 2) }}"></figure>
    @endif
    <div class="d-sm-none d-lg-inline-block">{{ __('Hai') }}, {{ Auth::user()->name }}</div>
  </a>
  <div class="dropdown-menu dropdown-menu-right">
    <div class="dropdown-title">{{ __('Waktu masuk') }}
      <br>{{ Auth::user()->last_login }}
    </div>

    @if (auth_user()->can('Profil'))
      <a href="{{ route('profile.index') }}" class="dropdown-item has-icon">
        <i class="far fa-user"></i> {{ __('Profil') }}
      </a>
    @endif

    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
      <i class="fas fa-sign-out-alt"></i> Keluar
    </a>
  </div>
</li>
