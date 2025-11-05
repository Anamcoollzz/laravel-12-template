<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="language" content="id">
  <meta name="geo.country" content="ID">
  <meta name="geo.placename" content="Indonesia">
  <meta name="author" content="{{ $_company_name }}">
  <meta name="description" content="{{ $_app_desc }}">
  <meta name="keywords" content="Manajemen Data, Manajemen Informasi, Sekolah Dasar, Kabupaten Majalengka, Metafora">

  <title>{{ $_application_name }}</title>

  {{-- <link rel="icon" type="image/png" href="{{ url('') }}/images/metafora-m.webp"> --}}
  <link rel="shortcut icon" href="{{ $_favicon ?? asset('favicon.ico') }}" type="image/x-icon">

  <meta property="og:locale" content="id_ID">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url('') }}">
  <meta property="og:title" content="{{ $_app_name }} {{ $_company_name }}">
  <meta property="og:description" content="{{ $_app_desc }}">
  <meta property="og:image" content="{{ $homeleft = asset('assets/images/homeleft.png') }}">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:domain" content="{{ domain() }}">
  <meta name="twitter:url" content="{{ url('') }}">
  <meta name="twitter:title" content="{{ $_app_name }} {{ $_company_name }}">
  <meta name="twitter:description" content="{{ $_app_desc }}">
  <meta name="twitter:image" content="{{ $homeleft }}">

  <meta itemprop="url" content="{{ url('') }}">
  <meta itemprop="headline" content="{{ $_app_name }} {{ $_company_name }}">
  <meta itemprop="description" content="{{ $_app_desc }}">
  <meta itemprop="thumbnailUrl" content="{{ $homeleft }}">

  <meta name="alternate" hreflang="id" href="{{ url('') }}">

  <link href="{{ asset('assets/disdik2') }}/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('assets/disdik2') }}/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('assets/disdik2') }}/metafora.css" rel="stylesheet">
  <link href="{{ asset('assets/disdik2') }}/custom.css" rel="stylesheet">

  {{-- <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "Organization",
                "name": "{{ $_app_name }} {{ $_company_name }}",
                "description": {{ $_app_desc }}",
                "url": "{{ url('') }}",
                "logo": "{{ url('') }}/images/metafora.webp",
                "image": "{{ url('') }}/images/metafora.webp",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "Jl. Raya K H Abdul Halim No.233, Majalengka Kulon, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat",
                    "addressLocality": "Majalengka",
                    "postalCode": "45418",
                    "addressCountry": "ID"
                },
                "telephone": "120-240-9600",
                "email": "{{ $_email }},
                "sameAs": [
                    "https://www.instagram.com/bidangsd_disdikmjlk/"
                ]
            }
        </script> --}}

</head>

<body id="section_1">
  <header class="site-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-12 d-flex flex-wrap mt-2">
          <p class="d-flex me-4 mb-0">
            <i class="bi-geo-alt me-2"></i>
            {{ $_city }}, Jawa Barat, Indonesia
          </p>

          <p class="d-flex mb-0">
            <i class="bi-envelope me-2"></i>

            <a href="mailto:{{ $_email }}">
              {{ $_email }}
            </a>
          </p>
        </div>

        <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
          <ul class="social-icon">

            <li class="social-icon-item">
              <a href="https://www.facebook.com/" class="social-icon-link bi-facebook"></a>
            </li>

            <li class="social-icon-item">
              <a href="https://www.instagram.com/" class="social-icon-link bi-instagram"></a>
            </li>

            <li class="social-icon-item">
              <a href="{{ url('') }}/#" class="social-icon-link bi-whatsapp"></a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </header>

  <nav class="navbar navbar-expand-lg shadow-lg">
    <div class="container">
      <a class="navbar-brand py-2" href="{{ url('') }}/">
        <img src="{{ $_logo }}" class="img-fluid" alt="Disdik" width="50px" height="auto">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link click-scroll" href="{{ url('') }}/#">Beranda</a>
          </li>

          <li class="nav-item">
            <a class="nav-link click-scroll" href="{{ url('') }}/#site-footer">Kontak</a>
          </li>

          <li class="nav-item ms-3">
            <a class="nav-link custom-btn custom-border-btn btn" href="{{ route('login') }}">Masuk</a>
            <a class="nav-link custom-btn custom-border-btn btn btn-primary" style="background-color: rgb(230, 163, 96); border-color:rgb(230, 163, 96); color: white;"
              href="{{ route('register') }}">Daftar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <section class="section-padding section-bg" id="section_2">
      <div class="container">
        <div class="row justify-content-around">

          <div class="col-lg-6 col-12 mb-5 mb-lg-0 px-0 d-flex justify-content-center">
            {{-- <img src="{{ asset('assets/disdik2') }}/anak-sd.webp" class="img-fluid" width="70%" alt=""> --}}
            <img src="{{ $homeleft }}" class="img-fluid" width="70%" alt="">
          </div>

          <div class="col-lg-6 col-12">
            <div class="custom-text-box">
              <h2 class="mb-2">Selamat Datang di {{ $_application_name }}</h2>

              <h5 class="mb-3">Tempat curhat yang pas</h5>

              <p class="mb-0">
                {{ $_app_description }}
              </p>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

  <footer id="site-footer" class="site-footer" style="text-align: center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-1 col-md-6 col-12 mb-4 mb-lg-0">
          <img src="{{ asset('assets/images/logo2.png') }}" class="logo img-fluid mb-2" alt="">
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
          <h5 class="mb-3">
            {{ $_company_name }}
            {{-- <br>Kabupaten {{ $_city }} --}}
          </h5>
          <img src="{{ asset('assets/images/logo3.png') }}" class="logo img-fluid mb-2" alt="">
          <img src="{{ asset('assets/images/logo4.png') }}" class="logo img-fluid mb-2" alt="">
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
          <h5 class="site-footer-title mb-3">Tentang {{ $_app_name }}</h5>
          <ul class="footer-menu-item px-0">
            <li class="text-white mb-2" style="text-align: center"><a href="#" class="footer-menu-link mx-auto">Visi dan Misi</a></li>
            <li class="text-white mb-2" style="text-align: center"><a href="#" class="footer-menu-link mx-auto">Struktur dan Organisasi</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
          <h5 class="site-footer-title mb-3">Informasi Kontak</h5>

          {{-- <p class="text-white mb-2">
            <i class="bi-telephone me-2"></i>

            <a href="tel: 120-240-9600" class="site-footer-link">
              120-240-9600
            </a>
          </p> --}}

          <p class="text-white">
            <i class="bi-envelope me-2"></i>

            <a href="mailto:{{ $_email }}" class="site-footer-link">
              {{ $_email }}
            </a>
          </p>

          <p class="text-white mt-3">
            <i class="bi-geo-alt me-2"></i>
            {{-- Jl. Raya K H Abdul Halim No.233, Majalengka Kulon, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45418 --}}
            {{ config('stisla.address') }}
          </p>
        </div>
      </div>
    </div>

    <div class="site-footer-bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-7 col-12">
            <p class="copyright-text mb-0">{{ $_application_name }}</p>
          </div>

          <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
            <ul class="social-icon">
              <li class="social-icon-item">
                <a href="https://www.facebook.com/" class="social-icon-link bi-facebook"></a>
              </li>

              <li class="social-icon-item">
                <a href="https://www.instagram.com" class="social-icon-link bi-instagram"></a>
              </li>

              <li class="social-icon-item">
                <a href="{{ url('') }}/#" class="social-icon-link bi-youtube"></a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer>

  <script src="{{ asset('assets/disdik2') }}/jquery.min.js"></script>
</body>

</html>
