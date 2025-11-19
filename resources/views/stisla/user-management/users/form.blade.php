@extends('stisla.layouts.app-form')

@section('left-header-action')
  @include('stisla.includes.forms.buttons.btn-danger', [
      'link' => route('user-management.users.single-pdf', [$d->id]),
      'blank' => true,
      'icon' => 'fa fa-file-pdf',
      'tooltipTitle' => 'Export PDF',
  ])
@endsection

@section('rowForm')
  @isset($d)
    @method('PUT')
  @endisset

  @csrf
  <div class="row">
    @include('stisla.user-management.users.avatar2')
    <div class="col-md-6">
      @include('stisla.includes.forms.inputs.input-name', ['required' => true])
    </div>
    <div class="col-md-6">
      @include('stisla.includes.forms.inputs.input-avatar', ['required' => false])
    </div>
    <div class="col-md-6">
      @include('stisla.includes.forms.inputs.input-avatar', ['required' => false, 'label' => __('Photo'), 'id' => 'photo'])
    </div>
    <div class="col-md-6">
      @include('stisla.includes.forms.inputs.input', [
          'id' => 'phone_number',
          'name' => 'phone_number',
          'label' => __('No HP'),
          'type' => 'text',
          'required' => false,
          'icon' => 'fas fa-phone',
      ])
    </div>
    <div class="col-md-6">
      @include('stisla.includes.forms.inputs.input', [
          'id' => 'birth_date',
          'name' => 'birth_date',
          'label' => __('Tanggal Lahir'),
          'type' => 'date',
          'required' => false,
          'icon' => 'fas fa-calendar',
      ])
    </div>
    <div class="col-md-6">
      @include('stisla.includes.forms.inputs.input', [
          'id' => 'address',
          'name' => 'address',
          'label' => __('Alamat'),
          'type' => 'text',
          'required' => false,
          'icon' => 'fas fa-map-marker-alt',
      ])
    </div>
    @if (is_app_dataku())
      <input type="hidden" name="role" value="{{ $roleId }}">
    @else
      @if (count($roleOptions) > 1)
        {{-- <div class="col-md-6">
                    @include('stisla.includes.forms.selects.select', ['id' => 'role', 'name' => 'role', 'options' => $roleOptions, 'label' => 'Role', 'required' => true])
                  </div> --}}
        <div class="col-md-6">
          @include('stisla.includes.forms.selects.select2', [
              'id' => 'role',
              'name' => 'role',
              'options' => $roleOptions,
              'label' => __('Pilih Role'),
              'required' => true,
              'multiple' => true,
              'selected' => old('role', [$roleId]),
          ])
        </div>
      @elseif(count($roleOptions) == 1)
        <input type="hidden" name="role" value="{{ collect($roleOptions)->first() }}">
      @endif
    @endif

    @if (is_app_dataku() && $isSiswa)
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'nis', 'label' => __('validation.attributes.nis')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'nisn', 'label' => __('validation.attributes.nisn')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.selects.select', [
            'id' => 'religion_id',
            'options' => $religionOptions,
            'label' => __('validation.attributes.religion_id'),
            'required' => true,
        ])
      </div>

      <div class="col-12" id="app-register">
        <div class="row">
          @verbatim
            <div class="col-md-6">
              <div class="form-group">
                <label for="province_code">
                  Provinsi
                  <span class="text-danger">*</span>
                </label>
                <select required="" name="province_code" id="province_code" class="form-control " v-model="province" v-on:change="onProvinceChange">
                  <option v-for="province in provinces" :key="province.code" :value="province.code">{{ province . name }}</option>
                </select>
              </div>
            </div>
            <div class="col-md-6" v-if="cities.length > 0 && province !== ''">
              <div class="form-group">
                <label for="city_code">
                  Kabupaten / Kota
                  <span class="text-danger">*</span>
                </label>
                <select required="" name="city_code" id="city_code" class="form-control " v-model="city" v-on:change="onCityChange">
                  <option value="">Pilih Kabupaten / Kota</option>
                  <option v-for="city in cities" :key="city.code" :value="city.code">{{ city . name }}</option>
                </select>
              </div>
            </div>
            <div class="col-md-6" v-if="districts.length > 0 && city !== ''">
              <div class="form-group">
                <label for="district_code">
                  Kabupaten / Kota
                  <span class="text-danger">*</span>
                </label>
                <select required="" name="district_code" id="district_code" class="form-control " v-model="district" v-on:change="onDistrictChange">
                  <option value="">Pilih Kecamatan</option>
                  <option v-for="district in districts" :key="district.code" :value="district.code">{{ district . name }}</option>
                </select>
              </div>
            </div>
            <div class="col-md-6" v-if="villages.length > 0 && district !== ''">
              <div class="form-group">
                <label for="village_code">
                  Desa / Kelurahan
                  <span class="text-danger">*</span>
                </label>
                <select required="" name="village_code" id="village_code" class="form-control " v-model="village">
                  <option value="">Pilih Desa / Kelurahan</option>
                  <option v-for="village in villages" :key="village.code" :value="village.code">{{ village . name }}</option>
                </select>
              </div>
            </div>
          @endverbatim
        </div>
      </div>

      <div class="col-md-3">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'rt', 'label' => __('validation.attributes.rt')])
      </div>
      <div class="col-md-3">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'rw', 'label' => __('validation.attributes.rw')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'postal_code', 'label' => __('validation.attributes.postal_code')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.selects.select', [
            'id' => 'school_class_id',
            'options' => $schoolClassOptions,
            'label' => __('validation.attributes.school_class_id'),
            'required' => true,
        ])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.selects.select', [
            'id' => 'class_level_id',
            'options' => $classLevelOptions,
            'label' => __('validation.attributes.class_level_id'),
            'required' => true,
        ])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.selects.select', [
            'id' => 'school_year_id',
            'options' => $schoolYearOptions,
            'label' => __('validation.attributes.school_year_id'),
            'required' => true,
        ])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.selects.select', [
            'id' => 'semester_id',
            'options' => $semesterOptions,
            'label' => __('validation.attributes.semester_id'),
            'required' => true,
        ])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'room', 'label' => __('validation.attributes.room')])
      </div>

      <div class="col-12">
        <hr>
        <h6>Data Ayah</h6>
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'father_nik', 'label' => __('validation.attributes.father_nik')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'father_name', 'label' => __('validation.attributes.father_name')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'father_birth_date', 'label' => __('validation.attributes.father_birth_date'), 'type' => 'date'])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.selects.select', [
            'id' => 'father_work_id',
            'options' => $workOptions,
            'label' => __('validation.attributes.father_work_id'),
            'required' => true,
        ])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input-currency-rupiah', [
            'required' => true,
            'id' => 'father_income',
            'label' => __('validation.attributes.father_income'),
        ])
      </div>

      <div class="col-12">
        <hr>
        <h6>Data Ibu</h6>
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'mother_nik', 'label' => __('validation.attributes.mother_nik')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'mother_name', 'label' => __('validation.attributes.mother_name')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'mother_birth_date', 'label' => __('validation.attributes.mother_birth_date'), 'type' => 'date'])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.selects.select', [
            'id' => 'mother_work_id',
            'options' => $workOptions,
            'label' => __('validation.attributes.mother_work_id'),
            'required' => true,
        ])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input-currency-rupiah', [
            'required' => true,
            'id' => 'mother_income',
            'label' => __('validation.attributes.mother_income'),
        ])
      </div>

      <div class="col-12">
        <hr>
        <h6>Data Wali</h6>
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => false, 'id' => 'guardian_nik', 'label' => __('validation.attributes.guardian_nik')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => false, 'id' => 'guardian_name', 'label' => __('validation.attributes.guardian_name')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => false, 'id' => 'guardian_birth_date', 'label' => __('validation.attributes.guardian_birth_date'), 'type' => 'date'])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.selects.select', [
            'id' => 'guardian_work_id',
            'options' => $workOptions,
            'label' => __('validation.attributes.guardian_work_id'),
            'required' => false,
        ])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input-currency-rupiah', [
            'required' => false,
            'id' => 'guardian_income',
            'label' => __('validation.attributes.guardian_income'),
        ])
      </div>
    @endif

    @if (is_app_dataku() && $roleName === 'guru')
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'teacher_nuptk', 'label' => __('validation.attributes.teacher_nuptk')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'teacher_mother_name', 'label' => __('validation.attributes.teacher_mother_name')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'teacher_employee_status', 'label' => __('validation.attributes.teacher_employee_status')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'teacher_gtk_type', 'label' => __('validation.attributes.teacher_gtk_type')])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'teacher_position', 'label' => __('validation.attributes.teacher_position')])
      </div>
    @endif

    @if (!$isSiswa)
      <div class="col-12">
        <hr>
        <h6>Data Akun Untuk Login</h6>
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input-email', ['required' => !is_app_dataku()])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input-password', [
            'hint' => isset($d) ? 'Password bisa dikosongi' : false,
            'required' => !isset($d),
            'value' => isset($d) ? '' : null,
        ])
      </div>
    @endif
  </div>
@endsection

@section('notes')
  @if (is_app_dataku())
    <div class="row">
      <div class="col-12">
        <div class="alert alert-info">
          <strong>{{ __('Catatan') }}:</strong>
          {{ __('Data akan dimasukkan ke jenjang pendidikan ') }} <strong>{{ session('education_level') }}</strong>
        </div>
      </div>
    </div>
  @endif
@endsection

@section('vue')
  @if ($isSiswa)
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script> --}}
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
          province: '{{ $d->province_code ?? '' }}',
          cities: [],
          city: '{{ $d->city_code ?? '' }}',
          districts: [],
          district: '{{ $d->district_code ?? '' }}',
          villages: [],
          village: '{{ $d->village_code ?? '' }}',
          is_majalengka: '{{ old('is_majalengka') }}',
          majalengka_code: '32.10',
          is_edit: {{ isset($d) ? 'true' : 'false' }},
        },
        methods: {
          onProvinceChange: function() {
            console.log('Province changed to: ' + this.province);
            api.get('/api/cities/' + this.province)
              .then(response => {
                console.log(response.data.data);
                this.cities = response.data.data;
                if (this.is_edit) {
                  this.onCityChange()
                } else {
                  this.city = '';
                  this.districts = [];
                  this.district = '';
                  this.villages = [];
                  this.village = '';
                }
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
                if (this.is_edit) {
                  this.onDistrictChange()
                } else {
                  this.villages = [];
                  this.village = '';
                }
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
        },
        mounted: function() {
          if (this.province !== '') {
            this.onProvinceChange();
          }
        }
      })
    </script>
  @endif
@endsection
