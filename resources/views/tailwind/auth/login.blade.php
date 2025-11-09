@extends('tailwind.layouts.app-auth', ['title' => 'Masuk'])

@section('content')
  <div class="w-full md:w-1/2 p-10 md:p-20 flex flex-col justify-center">

    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 text-center mb-6">
      Masuk ke {{ $_application_name }}
    </h2>

    <!-- Social Login -->
    <div class="flex justify-center gap-4 mb-6">
      <button type="button" class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-700">
      </button>
      <a href="{{ route('home') }}" class="bg-sky-400 text-white w-20 h-20 rounded-full flex items-center justify-center hover:bg-sky-500">
        <i class="fa-solid fa-house text-3xl"></i>
      </a>
      <button type="button" class="bg-blue-800 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-900">
      </button>
    </div>

    <!-- Divider -->
    <div class="flex items-center mb-6">
      <hr class="flex-grow border-gray-300">
      <span class="mx-3 text-gray-400 text-sm font-medium">Masuk</span>
      <hr class="flex-grow border-gray-300">
    </div>

    <!-- Notifikasi Kesalahan Login -->

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" novalidate="">
      @csrf
      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
        <input type="email" name="email" id="email" placeholder="nama@contoh.com" value=""
          class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="">
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
        <input type="password" name="password" id="password" placeholder="Masukkan kata sandi"
          class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="" minlength="4">
      </div>

      @if ($isGoogleCaptcha)
        <div class="mb-4">
          @include('stisla.auth.gcaptcha')
        </div>
      @endif


      {{-- <div class="mb-4 flex justify-center">
          <div>
            <div data-sitekey="6LcCSWYrAAAAAEsozY3M9C9W0T0maVayhyhoG2sp" class="g-recaptcha">
              <div style="width: 304px; height: 78px;">
                <div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-6lki8ab7q4y3" frameborder="0" scrolling="no"
                    sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                    src="{{ url('assets/disdik') }}/anchor.html"></iframe></div>
                <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response"
                  style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
              </div><iframe style="display: none;" src="{{ url('assets/disdik') }}/saved_resource.html"></iframe>
            </div>
          </div>
        </div> --}}


      <!-- Tombol -->
      <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-md hover:bg-blue-700 transition">
        Masuk
      </button>
      <button onclick="event.preventDefault();location.href='{{ route('register') }}'" class="w-full bg-red-600 text-white font-semibold py-3 rounded-md hover:bg-red-700 transition mt-2">
        Daftar
      </button>
    </form>

    <!-- Footer -->
    <p class="text-center text-sm text-gray-500 mt-6">
      © <span id="year">{{ date('Y') }}</span> {{ $_application_name }}
    </p>
  </div>
@endsection
