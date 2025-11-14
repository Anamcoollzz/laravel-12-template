@if (auth_user()->can('Notifikasi'))
  <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg {{ $_my_notifications->count() ? 'beep' : '' }}"><i
        class="far fa-bell"></i></a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
      <div class="dropdown-header">
        Notifikasi
        @if ($_my_notifications->count())
          <div class="float-right">
            <a href="{{ route('notifications.read-all') }}">Tandai semua telah dibaca</a>
          </div>
        @endif
      </div>
      <div class="dropdown-list-content dropdown-list-icons">
        @if ($_my_notifications->count())
          @foreach ($_my_notifications as $_n)
            <a href="{{ route('notifications.read', [$_n->id]) }}" class="dropdown-item">
              <div class="dropdown-item-icon bg-{{ $_n->bg_color ?? 'primary' }} text-white">
                <i class="fas fa-{{ $_n->icon ?? 'bell' }}"></i>
              </div>
              <div class="dropdown-item-desc">
                {{ $_n->content }}
                <div class="time text-primary">{{ time_since($_n->created_at) }}</div>
              </div>
            </a>
          @endforeach
        @else
          <a href="#" class="dropdown-item">
            Tidak ada notifikasi
          </a>
        @endif
      </div>
      <div class="dropdown-footer text-center">
        <a href="{{ route('notifications.index') }}" class="text-grey">Lihat Semua <i class="fas fa-chevron-right"></i></a>
      </div>
    </div>
  </li>
@endif
