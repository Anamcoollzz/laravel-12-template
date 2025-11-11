<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-name')
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-phonenumber')
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-date', ['id' => 'birthdate', 'label' => 'Tanggal Lahir'])
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-avatar')
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.editors.textarea-address')
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'text', 'label' => 'Text'])
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'barcode', 'label' => 'Barcode', 'icon' => 'fa fa-barcode'])
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'qr_code', 'label' => 'QR Code', 'icon' => 'fa fa-qrcode'])
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-email')
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-password')
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'number', 'type' => 'number', 'label' => 'Number'])
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-currency-dollar')
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-currency-rupiah')
</div>
<div class="col-md-6">
  {{-- @php
      $repository = new \App\Repositories\TpaClassRepository();
    @endphp --}}
  @include('stisla.includes.forms.selects.select', [
      'id' => 'select',
      'name' => 'select',
      'options' => $selectOptions,
      'label' => 'Select',
      'required' => true,
  ])
</div>
<div class="col-md-6">
  {{-- @php
      $repository = new \App\Repositories\TpaClassRepository();
    @endphp --}}
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
  @include('stisla.includes.forms.inputs.input-checkbox', [
      'required' => false,
      'id' => 'is_active',
      'label' => 'Is Active',
      'options' => ['1' => 'Ya'],
      'is_boolean' => true,
  ])
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-file')
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-image')
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-date')
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input-time')
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
</div>
<div class="col-md-12">
  @include('stisla.includes.forms.editors.tinymce', [
      'required' => true,
      'name' => 'tinymce',
      'label' => 'TinyMCE',
      'id' => 'tinymce',
  ])
</div>
<div class="col-md-12">
  @include('stisla.includes.forms.editors.ckeditor', [
      'required' => true,
      'name' => 'ckeditor',
      'label' => 'CKEditor 5',
      'id' => 'ckeditor',
  ])
</div>
