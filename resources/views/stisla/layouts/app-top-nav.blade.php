<!DOCTYPE html>
<html lang="en">

<head>
  @include('stisla.includes.others.meta-title')
  @include('stisla.includes.others.css')
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a class="navbar-brand sidebar-gone-hide" href="{{ url('') }}">{{ $_app_name }}</a>
        @if (!config('app.is_mobile') && is_user())
          <div class="navbar-nav">
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
          </div>
          <div class="nav-collapse">
            <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
              <i class="fas fa-ellipsis-v"></i>
            </a>
            <ul class="navbar-nav">
              <img class="logoku" src="{{ $_logo_url }}" alt="{{ $_company_name }}">
              <h5 class="nama_perusahaan">
                {{ $_company_name }}
              </h5>
              {{-- <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard.index') }}" class="nav-link">Dashboard</a></li> --}}
              {{-- <li class="nav-item"><a href="#" class="nav-link">Report Something</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Server Status</a></li> --}}
            </ul>
          </div>
        @endif
        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            {{-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
                  Stisla Admin Template
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
          </div> --}}
            {{-- <img class="logoku" src="{{ $_logo_url }}" alt="{{ $_company_name }}">
            <h5 class="nama_perusahaan">
              {{ $_company_name }}
            </h5> --}}
        </form>
        <ul class="navbar-nav navbar-right">
          {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> --}}
          @include('stisla.includes.navbar.notification')
          @include('stisla.includes.navbar.user-dropdown')
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            @foreach ($_sidebar_menus as $_group)
              {{-- <li class="menu-header">{{ __($_group->group_name) }}</li> --}}

              @php
                $_user = auth_user();
              @endphp
              @foreach ($_group->menus as $_menu)
                {{-- if single menu --}}
                @if ($_menu->childs->count() === 0)
                  @php
                    $_menu_condition = $_menu->permission === null || $_user->can($_menu->permission);
                  @endphp
                  @if ($_menu_condition)
                    @if (Str::contains('Keluar', $_menu->menu_name) || Str::contains('Profil', $_menu->menu_name) || Str::contains('Dashboard', $_menu->menu_name))
                      <li @if (Request::is($_menu->is_active_if_url_includes)) class="nav-item active " @else class="nav-item" @endif>
                        <a @if ($_menu->is_blank) target="_blank" @endif href="{{ $_menu->fix_url }}" class="nav-link @if ($_menu->menu_name === 'Keluar') text-danger @endif">
                          <i class="{{ $_menu->icon }}"></i><span>{{ __($_menu->menu_name) }}</span>
                        </a>
                      </li>
                    @endif
                  @endif

                  {{-- else with child dropdown menu --}}
                @else
                  @php
                    $_is_active = $_menu->childs
                        ->pluck('is_active_if_url_includes')
                        ->filter(function ($item) {
                            return Request::is($item);
                        })
                        ->count();
                    $_menu_condition = $_menu->childs
                        ->pluck('permission')
                        ->filter(function ($item) use ($_user) {
                            return $_user->can($item);
                        })
                        ->count();
                  @endphp
                  {{-- @if ($_menu_condition)
                    <li class="nav-item dropdown @if ($_is_active) active @endif">
                      <a href="#" data-toggle="dropdown" class="nav-link has-dropdown">
                        <i class="{{ $_menu->icon }}"></i>
                        <span>{{ __($_menu->menu_name) }}</span>
                      </a>
                      <ul class="dropdown-menu">
                        @foreach ($_menu->childs as $_child_menu)
                          @php
                            $_sub_menu_condition = $_child_menu->permission === null || $_user->can($_child_menu->permission);
                          @endphp
                          @if ($_sub_menu_condition)
                            <li class="nav-item @if (Request::is($_child_menu->is_active_if_url_includes)) active @endif">
                              <a href="{{ $_child_menu->fix_url }}" @if ($_child_menu->is_blank) target="_blank" @endif>
                                {{ __($_child_menu->menu_name) }}
                              </a>
                            </li>
                          @endif
                        @endforeach
                      </ul>
                    </li>
                  @endif --}}
                @endif
              @endforeach
            @endforeach
            {{-- <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
                <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
              </ul>
            </li>
            <li class="nav-item active">
              <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top Navigation</span></a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                      </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                  </ul>
                </li>
              </ul>
            </li> --}}
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>
      @include('stisla.includes.others.footer')
    </div>
  </div>

  @include('stisla.includes.others.js')
</body>

</html>
