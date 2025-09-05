@php
  $isDisabled = auth_user()->hasRole('mahasiswa');
@endphp
<div class="row">
  <div class="col-12">
    @isset($d)
      @method('PUT')
    @endisset

    @csrf
  </div>
  @include('stisla.user-management.users.avatar')
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'name', 'label' => 'Nama'])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'nim', 'label' => 'NIM', 'disabled' => $isDisabled])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'id' => 'birth_date', 'type' => 'date', 'label' => 'Tanggal Lahir', 'value' => $d->user->birth_date ?? ''])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.selects.select', [
        'id' => 'study_program_id',
        'name' => 'study_program_id',
        'options' => $prodi_options,
        'label' => 'Program Studi',
        'required' => true,
        'disabled' => $isDisabled,
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.selects.select', [
        'id' => 'class_year',
        'name' => 'class_year',
        'options' => array_year(now()->year, now()->year - 10),
        'label' => 'Tahun Angkatan',
        'required' => true,
        'value' => $d->class_year ?? null,
        'disabled' => $isDisabled,
    ])
  </div>
  <div class="col-md-6">
    @php
      $sp = new \App\Repositories\StudentRepository();
    @endphp
    @include('stisla.includes.forms.selects.select', [
        'id' => 'student_status',
        'name' => 'student_status',
        'options' => $sp->getStatus(),
        'label' => 'Status Mahasiswa',
        'required' => true,
        'value' => $d->student_status ?? null,
        'disabled' => $isDisabled,
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', [
        'required' => isset($d) ? false : true,
        'id' => 'photo',
        'type' => 'file',
        'label' => 'Foto Formal',
        'accept' => 'image/*',
        'link_file' => isset($d) ? $d->photo : null,
        'link_file_name' => isset($d) ? basename($d->photo) : null,
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-phonenumber', ['required' => true, 'value' => $d->user->phone_number ?? ''])
  </div>
  <div class="col-md-12">
    @include('stisla.includes.forms.editors.textarea-address', ['required' => true, 'id' => 'address', 'label' => 'Alamat', 'value' => $d->user->address ?? ''])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-email', ['required' => true, 'value' => $d->user->email ?? ''])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-password', ['required' => !isset($d)])
  </div>
  {{-- <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'barcode', 'label' => 'Barcode'])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'qr_code', 'label' => 'QR Code'])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-email', ['required' => true])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'number', 'type' => 'number', 'label' => 'Number'])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-currency', [
        'required' => true,
        'name' => 'currency',
        'label' => 'Currency',
        'id' => 'currency',
        'currency_type' => 'default',
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-currency', [
        'required' => true,
        'name' => 'currency_idr',
        'label' => 'Currency IDR',
        'id' => 'currency_idr',
        'currency_type' => 'rupiah',
        'iconText' => 'IDR',
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.selects.select', [
        'id' => 'select',
        'name' => 'select',
        'options' => $selectOptions,
        'label' => 'Select',
        'required' => true,
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.selects.select2', [
        'id' => 'select2',
        'name' => 'select2',
        'options' => $selectOptions,
        'label' => 'Select2',
        'required' => true,
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.selects.select2', [
        'id' => 'select2_multiple',
        'name' => 'select2_multiple',
        'options' => $select2Options,
        'label' => 'Select2 Multiple',
        'required' => true,
        'multiple' => true,
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-tags', ['required' => true, 'name' => 'tags', 'label' => 'Tags'])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-radio-toggle', [
        'required' => true,
        'id' => 'radio',
        'label' => 'Radio',
        'options' => $radioOptions,
    ])
  </div>

  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-checkbox-custom', [
        'required' => true,
        'id' => 'checkbox',
        'label' => 'Checkbox',
        'options' => $checkboxOptions,
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-checkbox', [
        'required' => true,
        'id' => 'checkbox2',
        'label' => 'Checkbox 2',
        'options' => $checkboxOptions,
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', [
        'required' => isset($d) ? false : true,
        'name' => 'file',
        'type' => 'file',
        'label' => 'File',
        'link_file' => isset($d) ? $d->file : null,
        'link_file_name' => isset($d) ? basename($d->file) : null,
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', [
        'required' => isset($d) ? false : true,
        'name' => 'image',
        'type' => 'file',
        'label' => 'Image',
        'accept' => 'image/*',
        'link_file' => isset($d) ? $d->image : null,
        'link_file_name' => isset($d) ? basename($d->image) : null,
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'date', 'type' => 'date', 'label' => 'Date'])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'time', 'type' => 'time', 'label' => 'Time'])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-colorpicker', ['required' => true, 'name' => 'color', 'label' => 'Color'])
  </div>

  <div class="col-md-12">
    @include('stisla.includes.forms.editors.textarea', ['required' => true, 'id' => 'textarea', 'label' => 'Textarea'])
  </div>
  <div class="col-md-12">
    @include('stisla.includes.forms.editors.summernote', [
        'required' => true,
        'name' => 'summernote_simple',
        'label' => 'Summernote Simple',
        'simple' => true,
        'id' => 'summernote_simple',
    ])
  </div>
  <div class="col-md-12">
    @include('stisla.includes.forms.editors.summernote', [
        'required' => true,
        'name' => 'summernote',
        'label' => 'Summernote',
        'id' => 'summernote',
    ])
  </div> --}}
</div>
