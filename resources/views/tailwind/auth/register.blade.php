@extends('tailwind.layouts.app-auth', ['title' => 'Pendaftaran'])

@section('title', 'Pendaftaran')

@section('content')
  <div class="w-full md:w-1/2 p-10 md:p-20 flex flex-col justify-center">

    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 text-center mb-6">
      Daftar ke {{ $_application_name }}
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
      <span class="mx-3 text-gray-400 text-sm font-medium">Daftar</span>
      <hr class="flex-grow border-gray-300">
    </div>

    <!-- Notifikasi Kesalahan Login -->

    <!-- Form -->
    <form method="POST" action="{{ route('register') }}" novalidate="" id="app-register">

      @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @csrf
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Apakah Anonim?</label>
        <input type="radio" name="is_anonymous" id="is_anonymous" value="1" class="px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required=""
          @if (old('is_anonymous') == '1') checked @endif>
        <label for="is_anonymous" class="ml-2">Ya</label>
        <input type="radio" name="is_anonymous" id="is_anonymous_no" value="0" class="px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          required="" @if (old('is_anonymous') == '0') checked @endif>
        <label for="is_anonymous_no" class="ml-2">Tidak</label>
      </div>
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" name="name" id="name" placeholder="Nama Lengkap" value="{{ old('name') }}"
          class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="">
      </div>
      <div class="mb-4">
        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
        <input type="text" name="nik" id="nik" placeholder="NIK" value="{{ old('nik') }}"
          class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="">
      </div>
      <div class="mb-4">
        <label for="birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
        <input type="date" name="birth_date" id="birth_date" placeholder="Tanggal Lahir" value="{{ old('birth_date') }}"
          class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="">
      </div>
      <div class="mb-4">
        <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
        <select name="gender" id="gender" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="">
          <option value="">Pilih Jenis Kelamin</option>
          <option @if (old('gender') == 'Laki-laki') selected @endif value="Laki-laki">Laki-laki</option>
          <option @if (old('gender') == 'Perempuan') selected @endif value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Apakah Orang Majalengka?</label>
        <input @if (old('is_majalengka') == 1) checked @endif type="radio" v-model="is_majalengka" name="is_majalengka" id="is_majalengka" value="1"
          class="px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="" v-on:click="majalengkaBro(1)">
        <label for="is_majalengka" class="ml-2">Ya</label>
        <input @if (old('is_majalengka') == 0) checked @endif type="radio" v-model="is_majalengka" name="is_majalengka" id="is_majalengka_no" value="0"
          class="px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="" v-on:click="majalengkaBro(0)">
        <label for="is_majalengka_no" class="ml-2">Tidak</label>
      </div>
      @verbatim
        <div class="mb-4" v-if="is_majalengka == '0'">
          <label for="province" class="block text-sm font-medium text-gray-700">Provinsi</label>
          <select name="province" id="province" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="" v-model="province"
            v-on:change="onProvinceChange">
            <option value="">Pilih Provinsi</option>
            <option v-for="province in provinces" :key="province.code" :value="province.code">{{ province . name }}</option>
          </select>
        </div>
        <div class="mb-4" v-if="cities.length > 0 && province !== ''">
          <label for="city" class="block text-sm font-medium text-gray-700">Kabupaten / Kota</label>
          <select name="city" id="city" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="" v-model="city"
            v-on:change="onCityChange">
            <option value="">Pilih Kabupaten / Kota</option>
            <option v-for="city in cities" :key="city.code" :value="city.code">{{ city . name }}</option>
          </select>
        </div>
        <div class="mb-4" v-if="districts.length > 0 && city !== ''">
          <label for="district" class="block text-sm font-medium text-gray-700">Kecamatan</label>
          <select name="district" id="district" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="" v-model="district"
            v-on:change="onDistrictChange">
            <option value="">Pilih Kecamatan</option>
            <option v-for="district in districts" :key="district.code" :value="district.code">{{ district . name }}</option>
          </select>
        </div>
        <div class="mb-4" v-if="villages.length > 0 && district !== ''">
          <label for="village" class="block text-sm font-medium text-gray-700">Desa / Kelurahan</label>
          <select name="village" id="village" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="" v-model="village">
            <option value="">Pilih Desa / Kelurahan</option>
            <option v-for="village in villages" :key="village.code" :value="village.code">{{ village . name }}</option>
          </select>
        </div>

      @endverbatim
      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
        <input type="email" name="email" id="email" placeholder="nama@contoh.com" value="{{ old('email') }}"
          class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="">
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
        <input type="password" name="password" id="password" placeholder="Masukkan kata sandi" value="{{ old('password') }}"
          class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required="" minlength="4">
      </div>
      <div class="mb-4">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Masukkan konfirmasi kata sandi" value="{{ old('password_confirmation') }}"
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
        Daftar
      </button>
      <button onclick="event.preventDefault();location.href='{{ route('login') }}'" class="w-full bg-red-600 text-white font-semibold py-3 rounded-md hover:bg-red-700 transition mt-2">
        Masuk
      </button>
    </form>

    <!-- Footer -->
    <p class="text-center text-sm text-gray-500 mt-6">
      © <span id="year">{{ date('Y') }}</span> {{ $_application_name }}
    </p>
  </div>
@endsection

@section('vue')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16"></script>
  <script>
    const api = axios.create({
      baseURL: '{{ url('/') }}',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'App-Key': '{{ config('app.header_key') }}'
      }
    });
    var vm = new Vue({
      el: '#app-register',
      data: {
        provinces: @json($provinces),
        province: '',
        cities: [],
        city: '',
        districts: [],
        district: '',
        villages: [],
        village: '',
        is_majalengka: '{{ old('is_majalengka') }}',
        majalengka_code: '32.10',
      },
      methods: {
        onProvinceChange: function() {
          console.log('Province changed to: ' + this.province);
          api.get('/api/cities/' + this.province)
            .then(response => {
              console.log(response.data.data);
              this.cities = response.data.data;
              this.city = '';
              this.districts = [];
              this.district = '';
              this.villages = [];
              this.village = '';
            })
            .catch(error => {
              console.error('There was an error fetching the cities!', error);
            });
        },
        onCityChange: function() {
          console.log('City changed to: ' + this.city);
          api.get('/api/districts/' + this.city)
            .then(response => {
              console.log(response.data.data);
              this.districts = response.data.data;
              this.villages = [];
              this.village = '';
            })
            .catch(error => {
              console.error('There was an error fetching the districts!', error);
            });
        },
        onDistrictChange: function() {
          console.log('District changed to: ' + this.district);
          api.get('/api/villages/' + this.district)
            .then(response => {
              console.log(response.data.data);
              this.villages = response.data.data;
            })
            .catch(error => {
              console.error('There was an error fetching the villages!', error);
            });
        },
        majalengkaBro: function(value) {
          console.log('Is Majalengka: ' + value);
          if (value == 1) {
            this.province = '';
            this.city = this.majalengka_code;
            this.onCityChange()
          } else {
            this.province = '';
            this.cities = [];
            this.city = '';
            this.districts = [];
            this.district = '';
            this.villages = [];
            this.village = '';
          }
        }
      }
    })
  </script>
@endsection
