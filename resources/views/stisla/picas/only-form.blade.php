{{-- ini adalah hasil dari make:module --}}
<div class="col-md-12" id="formPusat">
  <div class="row">
    @isset($d)
      <div class="col-md-12 mb-5">
        Status:
        <span class="badge badge-danger" style="background-color: {{ $d->status->color }}">
          {{ $d->status->name }}
        </span>
      </div>
    @endisset
    <div class="col-md-12" id="app-pocari">
      <div class="row">
        <div class="col-md-6">
          @include('stisla.includes.forms.selects.select', [
              'id' => 'category_id',
              'name' => 'category_id',
              'options' => $category_id_options,
              'label' => __('validation.attributes.category_id'),
              'required' => true,
              'vModel' => 'selectedCategory',
          ])
        </div>
        {{-- <div class="col-md-6">
          @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'title', 'label' => __('validation.attributes.title')])
        </div> --}}
        <div class="col-md-6" v-if="selectedCategory == 2">
          @include('stisla.includes.forms.selects.select', [
              'id' => 'notes',
              'name' => 'notes',
              'options' => \App\Models\SupervisiNote::all()->pluck('notes', 'notes')->toArray(),
              'label' => __('validation.attributes.notes'),
              'required' => true,
              'vModel' => 'selectedNotes',
          ])
        </div>
        <div class="col-md-6" v-else>
          @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'notes', 'label' => __('validation.attributes.notes')])
        </div>

      </div>
    </div>

    {{-- {{ dd(1) }} --}}
    <div class="col-md-6">
      @include('stisla.includes.forms.selects.select', [
          'id' => 'function_id',
          'name' => 'function_id',
          'options' => $function_id_options,
          'label' => __('validation.attributes.function_id'),
          'required' => true,
      ])
    </div>
    <div class="col-md-6">
      @include('stisla.includes.forms.selects.select', [
          'id' => 'work_field_id',
          'name' => 'work_field_id',
          'options' => $work_field_id_options,
          'label' => __('validation.attributes.work_field_id'),
          'required' => true,
      ])
    </div>
    <div class="col-md-6">
      @include('stisla.includes.forms.inputs.input-date', ['required' => true, 'name' => 'deadline', 'label' => __('validation.attributes.deadline')])
    </div>
    <div class="col-md-6">
      @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'kpi_related', 'label' => __('validation.attributes.kpi_related')])
    </div>
    <div class="col-md-6">
      @include('stisla.includes.forms.selects.select', [
          'id' => 'assigned_to',
          'name' => 'assigned_to',
          'options' => $assigned_to_options,
          'label' => __('validation.attributes.assigned_to'),
          'required' => true,
      ])
    </div>
    <div class="col-md-6">
      @include('stisla.includes.forms.inputs.input-date', ['required' => true, 'name' => 'created_date', 'label' => __('validation.attributes.created_date')])
    </div>
    <div class="col-md-6">
      {{-- @include('stisla.includes.forms.inputs.input-image', ['required' => !isset($d), 'name' => 'attachment', 'label' => __('validation.attributes.attachment')]) --}}
      @if (Route::is('picas.show') || Route::is('picas.on-progress-edit') || Route::is('picas.approval-edit'))
        <h6>Attachment</h6>
        @if ($d->attachment)
          <img src="{{ $d->attachment }}" alt="Attachment" class="img-fluid mb-3" style="max-height: 300px;">
        @else
          <p>No attachment available.</p>
        @endif
      @else
        @include('stisla.includes.forms.inputs.input-image', ['required' => false, 'name' => 'attachment', 'label' => __('validation.attributes.attachment')])
        @if (Route::is('picas.on-progress-edit') || Route::is('picas.form-approval'))
          @if ($d->attachment)
            <img src="{{ $d->attachment }}" alt="Attachment" class="img-fluid mb-3" style="max-height: 300px;">
          @else
            <p>No attachment available.</p>
          @endif
        @endif
      @endif
      @if (Route::is('picas.on-progress-edit'))
        <input type="hidden" name="next_status" value="{{ \App\Models\Status::STATUS_ON_PROGRESS }}">
      @endif
      @if (Route::is('picas.approval-edit'))
        <input type="hidden" name="next_status" value="{{ \App\Models\Status::STATUS_NEED_APPROVAL }}">
      @endif
      @if (Route::is('picas.form-approval'))
        <input id="next_status" type="hidden" name="next_status" value="{{ \App\Models\Status::STATUS_DONE }}">
      @endif
    </div>
    @if ((Route::is('picas.approval-edit') && $d->revision_notes) || Route::is('picas.show'))
      <div class="col-md-12">
        @include('stisla.includes.forms.inputs.input', ['required' => false, 'name' => 'revision_notes', 'label' => __('validation.attributes.revision_notes')])
      </div>
    @endif
  </div>
</div>

<div class="col-12">
  <hr>
  <h6>Diisi oleh cabang</h6>
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input', ['required' => false, 'name' => 'problem_identification', 'label' => __('validation.attributes.problem_identification')])
</div>
<div class="col-md-6">
  @include('stisla.includes.forms.inputs.input', [
      'required' => false,
      'name' => 'corrective_action',
      'label' => __('validation.attributes.corrective_action'),
      'readonly' => Route::is('picas.create'),
      'disabled' => Route::is('picas.create') || Route::is('picas.edit'),
  ])
</div>
{{-- <div class="col-md-6">
  @include('stisla.includes.forms.inputs.input', ['required' => false, 'name' => 'attachment', 'label' => __('validation.attributes.attachment')])
</div> --}}
{{-- <div class="col-md-6">
  @include('stisla.includes.forms.inputs.input', ['required' => false, 'name' => 'evidence', 'label' => __('validation.attributes.evidence')])
</div> --}}
<div class="col-md-6">
  {{-- @include('stisla.includes.forms.inputs.input-image', ['required' => !isset($d), 'name' => 'evidence', 'label' => __('validation.attributes.evidence')]) --}}
  @if (Route::is('picas.show') || Route::is('picas.form-approval'))
    <h6>Foto Perbaikan Yang Dilakukan</h6>
    <img src="{{ $d->evidence }}" alt="Foto Perbaikan Yang Dilakukan" class="img-fluid mb-3" style="max-height: 300px;">
  @else
    @include('stisla.includes.forms.inputs.input-image', [
        'required' => false,
        'name' => 'evidence',
        'label' => __('validation.attributes.evidence'),
        'disabled' => Route::is('picas.create') || Route::is('picas.edit'),
    ])
  @endif
</div>
{{-- <div class="col-md-6">
  @include('stisla.includes.forms.selects.select', [
      'id' => 'status_id',
      'name' => 'status_id',
      'options' => $status_id_options,
      'label' => __('validation.attributes.status_id'),
      'required' => true,
  ])
</div> --}}

@if (Route::is('picas.form-approval'))
  <div class="col-md-12">
    <div class="row">
      <div class="col-12">
        <hr>
        <h6>Diisi oleh pusat</h6>
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.selects.select', [
            'id' => 'status_id',
            'name' => 'status_id',
            'options' => $status_id_options,
            'label' => __('validation.attributes.status_id'),
            'required' => true,
        ])
      </div>
      <div class="col-md-6">
        @include('stisla.includes.forms.inputs.input', ['required' => false, 'name' => 'revision_notes', 'label' => __('validation.attributes.revision_notes')])
      </div>
    </div>
  </div>
@endif


{{-- yang ini boleh dicopy yang dibutuhin --}}
@if ($is_has_name ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-name')
  </div>
@endif
@if ($is_has_phone_number ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-phonenumber')
  </div>
@endif
@if ($is_has_birthdate ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-date', ['id' => 'birthdate', 'label' => 'Tanggal Lahir'])
  </div>
@endif
@if ($is_has_avatar ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-avatar')
  </div>
@endif
@if ($is_has_address ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.editors.textarea-address')
  </div>
@endif
@if ($is_has_text ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'text', 'label' => 'Text'])
  </div>
@endif
@if ($is_has_barcode ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'barcode', 'label' => 'Barcode', 'icon' => 'fa fa-barcode'])
  </div>
@endif
@if ($is_has_qr_code ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'qr_code', 'label' => 'QR Code', 'icon' => 'fa fa-qrcode'])
  </div>
@endif
@if ($is_has_email ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-email')
  </div>
@endif
@if ($is_has_password ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-password')
  </div>
@endif
@if ($is_has_number ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'number', 'type' => 'number', 'label' => 'Number'])
  </div>
@endif
@if ($is_has_currency ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-currency-dollar')
  </div>
@endif
@if ($is_has_currency_idr ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-currency-rupiah')
  </div>
@endif
@if ($is_has_select ?? false)
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
@endif
@if ($is_has_select2 ?? false)
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
@endif
@if ($is_has_select2_multiple ?? false)
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
@endif
@if ($is_has_tags ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-tags', ['required' => true, 'name' => 'tags', 'label' => 'Tags'])
  </div>
@endif
@if ($is_has_radio ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-radio-toggle', [
        'required' => true,
        'id' => 'radio',
        'label' => 'Radio',
        'options' => $radioOptions,
    ])
  </div>
@endif
@if ($is_has_checkbox ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-checkbox-custom', [
        'required' => true,
        'id' => 'checkbox',
        'label' => 'Checkbox',
        'options' => $checkboxOptions,
    ])
  </div>
@endif
@if ($is_has_checkbox2 ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-checkbox', [
        'required' => true,
        'id' => 'checkbox2',
        'label' => 'Checkbox 2',
        'options' => $checkboxOptions,
    ])
  </div>
@endif
@if ($is_has_is_active ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-checkbox', [
        'required' => false,
        'id' => 'is_active',
        'label' => 'Is Active',
        'options' => ['1' => 'Ya'],
        'is_boolean' => true,
    ])
  </div>
@endif
@if ($is_has_file ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-file')
  </div>
@endif
@if ($is_has_image ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-image')
  </div>
@endif
@if ($is_has_date ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-date')
  </div>
@endif
@if ($is_has_time ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-time')
  </div>
@endif
@if ($is_has_color ?? false)
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-colorpicker', ['required' => true, 'name' => 'color', 'label' => 'Color'])
  </div>
@endif
@if ($is_has_textarea ?? false)
  <div class="col-md-12">
    @include('stisla.includes.forms.editors.textarea', ['required' => true, 'id' => 'textarea', 'label' => 'Textarea'])
  </div>
@endif
@if ($is_has_summernote_simple ?? false)
  <div class="col-md-12">
    @include('stisla.includes.forms.editors.summernote', [
        'required' => true,
        'name' => 'summernote_simple',
        'label' => 'Summernote Simple',
        'simple' => true,
        'id' => 'summernote_simple',
    ])
  </div>
@endif
@if ($is_has_summernote ?? false)
  <div class="col-md-12">
    @include('stisla.includes.forms.editors.summernote', [
        'required' => true,
        'name' => 'summernote',
        'label' => 'Summernote',
        'id' => 'summernote',
    ])
  </div>
@endif
@if ($is_has_tinymce ?? false)
  <div class="col-md-12">
    @include('stisla.includes.forms.editors.tinymce', [
        'required' => true,
        'name' => 'tinymce',
        'label' => 'TinyMCE',
        'id' => 'tinymce',
    ])
  </div>
@endif
@if ($is_has_ckeditor ?? false)
  <div class="col-md-12">
    @include('stisla.includes.forms.editors.ckeditor', [
        'required' => true,
        'name' => 'ckeditor',
        'label' => 'CKEditor 5',
        'id' => 'ckeditor',
    ])
  </div>
@endif

@push('scripts')
  @if (Route::is('picas.on-progress-edit') || Route::is('picas.approval-edit'))
    <script>
      $(function() {
        $('#formPusat').find('.form-control').prop('disabled', true);
      })
    </script>
  @endif
@endpush

@push('scripts')
  <script>
    // $('#status_id').
  </script>
@endpush

@push('js')
  <!-- Page Specific JS File -->
  {{-- <script src="{{ config('stisla.chat_base_url') }}/socket.io/socket.io.js"></script> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/js-md5@0.8.3/src/md5.min.js"></script> --}}
  {{-- <script src="{{ url('stisla') }}/assets/js/page/components-chat-box.js?id=1"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16"></script>
@endpush

@push('scripts')
  <script>
    var vm = new Vue({
      el: '#app-pocari',
      data: {
        selectedCategory: '{{ $d->category_id ?? '' }}',
        selectedNotes: '{{ $d->notes ?? '' }}',
      },
      methods: {},
      watch: {
        selectedCategory: function(newVal, oldVal) {
          console.log('Category changed from ' + oldVal + ' to ' + newVal);
          if (newVal) {
            // alert('Kategori diubah menjadi: ' + newVal);
          }
        },
      },
      mounted: function() {}
    });
  </script>
@endpush
