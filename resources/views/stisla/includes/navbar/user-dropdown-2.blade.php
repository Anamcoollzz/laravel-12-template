<li class="dropdown">
  <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    {{-- <img alt="{{ $_sc = 'SD' }}" src="{{ generate_avatar($_sc = 'SD') }}" class="rounded-circle mr-1"> --}}
    <div class="d-sm-none d-lg-inline-block">
      {{ session('education_level') }}
    </div>
  </a>
  <div class="dropdown-menu dropdown-menu-right">

    @foreach ($_education_levels as $lvl)
      <a href="{{ route('set-education-level', [$lvl->id]) }}" class="dropdown-item has-icon">
        <i class="fas fa-graduation-cap"></i> {{ $lvl->education_level }}
      </a>
    @endforeach

  </div>
</li>
