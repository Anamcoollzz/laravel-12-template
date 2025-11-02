<!DOCTYPE html>
<html lang="en">

<head>

  @include('stisla.includes.others.meta-title')
  @include('stisla.includes.others.css')

</head>
{{-- {{ dd($_stisla_sidebar_mini) }} --}}

<body class="{{ $_stisla_sidebar_mini == 1 ? 'sidebar-mini' : '' }}">
  <input type="hidden" id="stisla_asset" value="{{ asset('stisla') }}">
  <div id="app">
    <div class="main-wrapper">
      @include('stisla.includes.others.navbar')
      @include('stisla.includes.others.sidebar')

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
