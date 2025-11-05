<!DOCTYPE html>
<!-- saved from url=(0040)https://disdik.majalengkakab.go.id/login -->
<html lang="id">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="origin-trial"
    content="A7vZI3v+Gz7JfuRolKNM4Aff6zaGuT7X0mf3wtoZTnKv6497cVMnhy03KDqX7kBz/q/iidW7srW31oQbBt4VhgoAAACUeyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGUuY29tOjQ0MyIsImZlYXR1cmUiOiJEaXNhYmxlVGhpcmRQYXJ0eVN0b3JhZ2VQYXJ0aXRpb25pbmczIiwiZXhwaXJ5IjoxNzU3OTgwODAwLCJpc1N1YmRvbWFpbiI6dHJ1ZSwiaXNUaGlyZFBhcnR5Ijp0cnVlfQ==">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ $_favicon ?? asset('favicon.ico') }}" type="image/x-icon">
  <title>Login - {{ $_application_name }}</title>

  <link rel="stylesheet" href="{{ url('assets/disdik') }}/all.min.css">

  <!-- Tailwind CSS -->
  {{-- <script type="text/javascript" async="" charset="utf-8" src="{{ url('assets/disdik') }}/recaptcha__en_gb.js" crossorigin="anonymous"
    integrity="sha384-mD789qV+E1XE5XpBe1e2UAm6aEfQRs53kui3QeB2QZUVBJpYHdXHU2OXjvGPx85a"></script> --}}
  <script src="{{ url('assets/disdik') }}/saved_resource"></script>

  <!-- Alpine.js -->
  <script defer="" src="{{ url('assets/disdik') }}/cdn.min.js"></script>

  <!-- Google Font -->
  <link href="{{ url('assets/disdik') }}/css2" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .float-animation {
      animation: float 2s ease-in-out infinite;
    }

    @keyframes float {
      0% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-10px);
      }

      100% {
        transform: translateY(0);
      }
    }

    .animate-fade-in {
      animation: fadeIn 0.5s ease-out forwards;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(-10px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
  <script src="{{ url('assets/disdik') }}/api.js" async="" defer=""></script>
  <style>
    *,
    ::before,
    ::after {
      --tw-border-spacing-x: 0;
      --tw-border-spacing-y: 0;
      --tw-translate-x: 0;
      --tw-translate-y: 0;
      --tw-rotate: 0;
      --tw-skew-x: 0;
      --tw-skew-y: 0;
      --tw-scale-x: 1;
      --tw-scale-y: 1;
      --tw-pan-x: ;
      --tw-pan-y: ;
      --tw-pinch-zoom: ;
      --tw-scroll-snap-strictness: proximity;
      --tw-gradient-from-position: ;
      --tw-gradient-via-position: ;
      --tw-gradient-to-position: ;
      --tw-ordinal: ;
      --tw-slashed-zero: ;
      --tw-numeric-figure: ;
      --tw-numeric-spacing: ;
      --tw-numeric-fraction: ;
      --tw-ring-inset: ;
      --tw-ring-offset-width: 0px;
      --tw-ring-offset-color: #fff;
      --tw-ring-color: rgb(59 130 246 / 0.5);
      --tw-ring-offset-shadow: 0 0 #0000;
      --tw-ring-shadow: 0 0 #0000;
      --tw-shadow: 0 0 #0000;
      --tw-shadow-colored: 0 0 #0000;
      --tw-blur: ;
      --tw-brightness: ;
      --tw-contrast: ;
      --tw-grayscale: ;
      --tw-hue-rotate: ;
      --tw-invert: ;
      --tw-saturate: ;
      --tw-sepia: ;
      --tw-drop-shadow: ;
      --tw-backdrop-blur: ;
      --tw-backdrop-brightness: ;
      --tw-backdrop-contrast: ;
      --tw-backdrop-grayscale: ;
      --tw-backdrop-hue-rotate: ;
      --tw-backdrop-invert: ;
      --tw-backdrop-opacity: ;
      --tw-backdrop-saturate: ;
      --tw-backdrop-sepia: ;
      --tw-contain-size: ;
      --tw-contain-layout: ;
      --tw-contain-paint: ;
      --tw-contain-style:
    }

    ::backdrop {
      --tw-border-spacing-x: 0;
      --tw-border-spacing-y: 0;
      --tw-translate-x: 0;
      --tw-translate-y: 0;
      --tw-rotate: 0;
      --tw-skew-x: 0;
      --tw-skew-y: 0;
      --tw-scale-x: 1;
      --tw-scale-y: 1;
      --tw-pan-x: ;
      --tw-pan-y: ;
      --tw-pinch-zoom: ;
      --tw-scroll-snap-strictness: proximity;
      --tw-gradient-from-position: ;
      --tw-gradient-via-position: ;
      --tw-gradient-to-position: ;
      --tw-ordinal: ;
      --tw-slashed-zero: ;
      --tw-numeric-figure: ;
      --tw-numeric-spacing: ;
      --tw-numeric-fraction: ;
      --tw-ring-inset: ;
      --tw-ring-offset-width: 0px;
      --tw-ring-offset-color: #fff;
      --tw-ring-color: rgb(59 130 246 / 0.5);
      --tw-ring-offset-shadow: 0 0 #0000;
      --tw-ring-shadow: 0 0 #0000;
      --tw-shadow: 0 0 #0000;
      --tw-shadow-colored: 0 0 #0000;
      --tw-blur: ;
      --tw-brightness: ;
      --tw-contrast: ;
      --tw-grayscale: ;
      --tw-hue-rotate: ;
      --tw-invert: ;
      --tw-saturate: ;
      --tw-sepia: ;
      --tw-drop-shadow: ;
      --tw-backdrop-blur: ;
      --tw-backdrop-brightness: ;
      --tw-backdrop-contrast: ;
      --tw-backdrop-grayscale: ;
      --tw-backdrop-hue-rotate: ;
      --tw-backdrop-invert: ;
      --tw-backdrop-opacity: ;
      --tw-backdrop-saturate: ;
      --tw-backdrop-sepia: ;
      --tw-contain-size: ;
      --tw-contain-layout: ;
      --tw-contain-paint: ;
      --tw-contain-style:
    }

    /* ! tailwindcss v3.4.17 | MIT License | https://tailwindcss.com */
    *,
    ::after,
    ::before {
      box-sizing: border-box;
      border-width: 0;
      border-style: solid;
      border-color: #e5e7eb
    }

    ::after,
    ::before {
      --tw-content: ''
    }

    :host,
    html {
      line-height: 1.5;
      -webkit-text-size-adjust: 100%;
      -moz-tab-size: 4;
      tab-size: 4;
      font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-feature-settings: normal;
      font-variation-settings: normal;
      -webkit-tap-highlight-color: transparent
    }

    body {
      margin: 0;
      line-height: inherit
    }

    hr {
      height: 0;
      color: inherit;
      border-top-width: 1px
    }

    abbr:where([title]) {
      -webkit-text-decoration: underline dotted;
      text-decoration: underline dotted
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-size: inherit;
      font-weight: inherit
    }

    a {
      color: inherit;
      text-decoration: inherit
    }

    b,
    strong {
      font-weight: bolder
    }

    code,
    kbd,
    pre,
    samp {
      font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
      font-feature-settings: normal;
      font-variation-settings: normal;
      font-size: 1em
    }

    small {
      font-size: 80%
    }

    sub,
    sup {
      font-size: 75%;
      line-height: 0;
      position: relative;
      vertical-align: baseline
    }

    sub {
      bottom: -.25em
    }

    sup {
      top: -.5em
    }

    table {
      text-indent: 0;
      border-color: inherit;
      border-collapse: collapse
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      font-feature-settings: inherit;
      font-variation-settings: inherit;
      font-size: 100%;
      font-weight: inherit;
      line-height: inherit;
      letter-spacing: inherit;
      color: inherit;
      margin: 0;
      padding: 0
    }

    button,
    select {
      text-transform: none
    }

    button,
    input:where([type=button]),
    input:where([type=reset]),
    input:where([type=submit]) {
      -webkit-appearance: button;
      background-color: transparent;
      background-image: none
    }

    :-moz-focusring {
      outline: auto
    }

    :-moz-ui-invalid {
      box-shadow: none
    }

    progress {
      vertical-align: baseline
    }

    ::-webkit-inner-spin-button,
    ::-webkit-outer-spin-button {
      height: auto
    }

    [type=search] {
      -webkit-appearance: textfield;
      outline-offset: -2px
    }

    ::-webkit-search-decoration {
      -webkit-appearance: none
    }

    ::-webkit-file-upload-button {
      -webkit-appearance: button;
      font: inherit
    }

    summary {
      display: list-item
    }

    blockquote,
    dd,
    dl,
    figure,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    hr,
    p,
    pre {
      margin: 0
    }

    fieldset {
      margin: 0;
      padding: 0
    }

    legend {
      padding: 0
    }

    menu,
    ol,
    ul {
      list-style: none;
      margin: 0;
      padding: 0
    }

    dialog {
      padding: 0
    }

    textarea {
      resize: vertical
    }

    input::placeholder,
    textarea::placeholder {
      opacity: 1;
      color: #9ca3af
    }

    [role=button],
    button {
      cursor: pointer
    }

    :disabled {
      cursor: default
    }

    audio,
    canvas,
    embed,
    iframe,
    img,
    object,
    svg,
    video {
      display: block;
      vertical-align: middle
    }

    img,
    video {
      max-width: 100%;
      height: auto
    }

    [hidden]:where(:not([hidden=until-found])) {
      display: none
    }

    .mx-3 {
      margin-left: 0.75rem;
      margin-right: 0.75rem
    }

    .mb-4 {
      margin-bottom: 1rem
    }

    .mb-6 {
      margin-bottom: 1.5rem
    }

    .mt-1 {
      margin-top: 0.25rem
    }

    .mt-6 {
      margin-top: 1.5rem
    }

    .block {
      display: block
    }

    .flex {
      display: flex
    }

    .h-10 {
      height: 2.5rem
    }

    .h-20 {
      height: 5rem
    }

    .min-h-\[680px\] {
      min-height: 680px
    }

    .min-h-screen {
      min-height: 100vh
    }

    .w-10 {
      width: 2.5rem
    }

    .w-20 {
      width: 5rem
    }

    .w-full {
      width: 100%
    }

    .max-w-\[1280px\] {
      max-width: 1280px
    }

    .max-w-sm {
      max-width: 24rem
    }

    .flex-grow {
      flex-grow: 1
    }

    .flex-col {
      flex-direction: column
    }

    .items-center {
      align-items: center
    }

    .justify-center {
      justify-content: center
    }

    .gap-4 {
      gap: 1rem
    }

    .overflow-hidden {
      overflow: hidden
    }

    .rounded-3xl {
      border-radius: 1.5rem
    }

    .rounded-full {
      border-radius: 9999px
    }

    .rounded-md {
      border-radius: 0.375rem
    }

    .border {
      border-width: 1px
    }

    .border-gray-300 {
      --tw-border-opacity: 1;
      border-color: rgb(209 213 219 / var(--tw-border-opacity, 1))
    }

    .bg-blue-600 {
      --tw-bg-opacity: 1;
      background-color: rgb(37 99 235 / var(--tw-bg-opacity, 1))
    }

    .bg-blue-800 {
      --tw-bg-opacity: 1;
      background-color: rgb(30 64 175 / var(--tw-bg-opacity, 1))
    }

    .bg-gray-100 {
      --tw-bg-opacity: 1;
      background-color: rgb(243 244 246 / var(--tw-bg-opacity, 1))
    }

    .bg-sky-400 {
      --tw-bg-opacity: 1;
      background-color: rgb(56 189 248 / var(--tw-bg-opacity, 1))
    }

    .bg-white {
      --tw-bg-opacity: 1;
      background-color: rgb(255 255 255 / var(--tw-bg-opacity, 1))
    }

    .bg-gradient-to-br {
      background-image: linear-gradient(to bottom right, var(--tw-gradient-stops))
    }

    .from-blue-600 {
      --tw-gradient-from: #2563eb var(--tw-gradient-from-position);
      --tw-gradient-to: rgb(37 99 235 / 0) var(--tw-gradient-to-position);
      --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
    }

    .to-blue-400 {
      --tw-gradient-to: #60a5fa var(--tw-gradient-to-position)
    }

    .p-10 {
      padding: 2.5rem
    }

    .p-4 {
      padding: 1rem
    }

    .p-8 {
      padding: 2rem
    }

    .px-4 {
      padding-left: 1rem;
      padding-right: 1rem
    }

    .py-3 {
      padding-top: 0.75rem;
      padding-bottom: 0.75rem
    }

    .text-center {
      text-align: center
    }

    .text-2xl {
      font-size: 1.5rem;
      line-height: 2rem
    }

    .text-3xl {
      font-size: 1.875rem;
      line-height: 2.25rem
    }

    .text-lg {
      font-size: 1.125rem;
      line-height: 1.75rem
    }

    .text-sm {
      font-size: 0.875rem;
      line-height: 1.25rem
    }

    .font-bold {
      font-weight: 700
    }

    .font-medium {
      font-weight: 500
    }

    .font-semibold {
      font-weight: 600
    }

    .leading-tight {
      line-height: 1.25
    }

    .text-gray-400 {
      --tw-text-opacity: 1;
      color: rgb(156 163 175 / var(--tw-text-opacity, 1))
    }

    .text-gray-500 {
      --tw-text-opacity: 1;
      color: rgb(107 114 128 / var(--tw-text-opacity, 1))
    }

    .text-gray-700 {
      --tw-text-opacity: 1;
      color: rgb(55 65 81 / var(--tw-text-opacity, 1))
    }

    .text-gray-800 {
      --tw-text-opacity: 1;
      color: rgb(31 41 55 / var(--tw-text-opacity, 1))
    }

    .text-white {
      --tw-text-opacity: 1;
      color: rgb(255 255 255 / var(--tw-text-opacity, 1))
    }

    .shadow-2xl {
      --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
      --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
      box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
    }

    .drop-shadow-xl {
      --tw-drop-shadow: drop-shadow(0 20px 13px rgb(0 0 0 / 0.03)) drop-shadow(0 8px 5px rgb(0 0 0 / 0.08));
      filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
    }

    .transition {
      transition-property: color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
      transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
      transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
      transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
      transition-duration: 150ms
    }

    .hover\:bg-blue-700:hover {
      --tw-bg-opacity: 1;
      background-color: rgb(29 78 216 / var(--tw-bg-opacity, 1))
    }

    .hover\:bg-blue-900:hover {
      --tw-bg-opacity: 1;
      background-color: rgb(30 58 138 / var(--tw-bg-opacity, 1))
    }

    .hover\:bg-sky-500:hover {
      --tw-bg-opacity: 1;
      background-color: rgb(14 165 233 / var(--tw-bg-opacity, 1))
    }

    .focus\:outline-none:focus {
      outline: 2px solid transparent;
      outline-offset: 2px
    }

    .focus\:ring-2:focus {
      --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
      --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
      box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
    }

    .focus\:ring-blue-500:focus {
      --tw-ring-opacity: 1;
      --tw-ring-color: rgb(59 130 246 / var(--tw-ring-opacity, 1))
    }

    @media (min-width: 768px) {
      .md\:w-1\/2 {
        width: 50%
      }

      .md\:flex-row {
        flex-direction: row
      }

      .md\:p-20 {
        padding: 5rem
      }

      .md\:text-3xl {
        font-size: 1.875rem;
        line-height: 2.25rem
      }

      .md\:text-4xl {
        font-size: 2.25rem;
        line-height: 2.5rem
      }

      .md\:text-xl {
        font-size: 1.25rem;
        line-height: 1.75rem
      }
    }
  </style>
</head>




<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

  <!-- Kontainer Utama -->
  <div class="bg-white rounded-3xl shadow-2xl overflow-hidden w-full max-w-[1280px] min-h-[680px] flex flex-col md:flex-row">

    <!-- Kiri: Judul dan Ilustrasi -->
    <div class="md:w-1/2 p-8 md:p-20 bg-gradient-to-br from-blue-600 to-blue-400 flex flex-col items-center justify-center">
      <div class="mb-6 text-center">
        <h1 class="text-white text-3xl md:text-4xl font-bold leading-tight">{{ $_application_name }}</h1>
        <p class="text-white text-lg md:text-xl mt-1">Kabupaten {{ $_city }}</p>
      </div>
      {{-- <img src="{{ url('assets/disdik') }}/draw2.webp" alt="{{ $_application_name }}" class="w-full max-w-sm float-animation drop-shadow-xl"> --}}
      <img src="{{ asset('assets/images/homeleft.png') }}" alt="{{ $_application_name }}" class="w-full max-w-sm float-animation drop-shadow-xl">

    </div>

    <!-- Kanan: Form Login -->
    @yield('content')
  </div>

  @if (session('successMessage'))
    <input type="hidden" id="sessionSuccessMessage" value="{{ session('successMessage') }}">
  @endif

  @if (session('errorMessage') || $errors->has('email'))
    <input type="hidden" id="sessionErrorMessage" value="{{ session('errorMessage') ?? $errors->first('email') }}">
  @endif

  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="{{ asset('stisla/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/my-script.min.js?id=2') }}"></script>

  @yield('vue')

  {{-- <div
    style="background-color: rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 3px; position: absolute; transition: visibility linear 0.3s, opacity 0.3s linear; opacity: 0; visibility: hidden; z-index: 2000000000; left: 0px; top: -10000px;">
    <div style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: rgb(255, 255, 255); opacity: 0.05;"></div>
    <div class="g-recaptcha-bubble-arrow" style="border: 11px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -11px; z-index: 2000000000;"></div>
    <div class="g-recaptcha-bubble-arrow" style="border: 10px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -10px; z-index: 2000000000;"></div>
    <div style="z-index: 2000000000; position: relative;"><iframe title="recaptcha challenge expires in two minutes" name="c-6lki8ab7q4y3" frameborder="0" scrolling="no"
        sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
        src="{{ url('assets/disdik') }}/bframe.html" style="width: 100%; height: 100%;"></iframe></div> --}}
  </div>
</body>

</html>
