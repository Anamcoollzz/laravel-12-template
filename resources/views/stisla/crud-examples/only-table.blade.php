@php
  $isTrashed = $isTrashed ?? false;
  $isExport = $isExport ?? false;
  $isAjax = $isAjax ?? false;
  $isYajra = $isYajra ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
  $canExport = $canExport ?? false;
  $canUpdate = $canUpdate ?? false;
  $canDelete = $canDelete ?? false;
  $canDetail = $canDetail ?? false;
@endphp

<table class="table table-striped @if ($isYajra || $isAjaxYajra) yajra-datatable @endif"
  @if ($isYajra || $isAjaxYajra) data-ajax-url="{{ $routeYajra }}?isAjaxYajra={{ $isAjaxYajra }}" @else  @if ($isTrashed) id="datatable-trashed" @else id="datatable" @endif
  @endif
  @if ($isExport === false && $canExport) data-export="true" data-title="{{ $title }}" @endif>
  <thead>
    <tr>
      @if ($isTrashed === false && $isExport === false)
        <th class="td-checkbox no-sort">
          {{-- <input type="checkbox" id="select_all_checkbox" /> --}}
        </th>
      @endif
      @if ($isExport)
        <th class="text-center">#</th>
      @else
        <th>{{ __('No') }}</th>
      @endif

      {{-- ini adalah hasil dari make:module --}}
      {{-- columns --}}

      {{-- yang ini boleh dikomen --}}
      @if ($is_has_name ?? false)
        <th>{{ __('validation.attributes.name') }}</th>
      @endif
      @if ($is_has_phone_number ?? false)
        <th>{{ __('validation.attributes.phone_number') }}</th>
      @endif
      @if ($is_has_address ?? false)
        <th>{{ __('validation.attributes.address') }}</th>
      @endif
      @if ($is_has_birthdate ?? false)
        <th>{{ __('validation.attributes.birthdate') }}</th>
      @endif
      @if ($is_has_avatar ?? false)
        <th>{{ __('validation.attributes.avatar') }}</th>
      @endif
      @if ($is_has_text ?? false)
        <th>{{ __('validation.attributes.text') }}</th>
      @endif
      @if ($is_has_barcode ?? false)
        <th>{{ __('validation.attributes.barcode') }}</th>
      @endif
      @if ($is_has_qr_code ?? false)
        <th>{{ __('validation.attributes.qr_code') }}</th>
      @endif
      @if ($is_has_email ?? false)
        <th>{{ __('validation.attributes.email') }}</th>
      @endif
      @if ($is_has_number ?? false)
        <th>{{ __('validation.attributes.number') }}</th>
      @endif
      @if ($is_has_currency ?? false)
        <th>{{ __('validation.attributes.currency') }}</th>
      @endif
      @if ($is_has_currency_idr ?? false)
        <th>{{ __('validation.attributes.currency_idr') }}</th>
      @endif
      @if ($is_has_select ?? false)
        <th>{{ __('validation.attributes.select') }}</th>
      @endif
      @if ($is_has_select2 ?? false)
        <th>{{ __('validation.attributes.select2') }}</th>
      @endif
      @if ($is_has_select2_multiple ?? false)
        <th>{{ __('validation.attributes.select2_multiple') }}</th>
      @endif
      @if ($is_has_textarea ?? false)
        <th>{{ __('validation.attributes.textarea') }}</th>
      @endif
      @if ($is_has_radio ?? false)
        <th>{{ __('validation.attributes.radio') }}</th>
      @endif
      @if ($is_has_checkbox ?? false)
        <th>{{ __('validation.attributes.checkbox') }}</th>
      @endif
      @if ($is_has_checkbox2 ?? false)
        <th>{{ __('validation.attributes.checkbox2') }}</th>
      @endif
      @if ($is_has_is_active ?? false)
        <th>{{ __('validation.attributes.is_active') }}</th>
      @endif
      @if ($is_has_tags ?? false)
        <th>{{ __('validation.attributes.tags') }}</th>
      @endif
      @if ($is_has_file ?? false)
        <th>{{ __('validation.attributes.file') }}</th>
      @endif
      @if ($is_has_image ?? false)
        <th>{{ __('validation.attributes.image') }}</th>
      @endif
      @if ($is_has_date ?? false)
        <th>{{ __('validation.attributes.date') }}</th>
      @endif
      @if ($is_has_time ?? false)
        <th>{{ __('validation.attributes.time') }}</th>
      @endif
      @if ($is_has_color ?? false)
        <th>{{ __('validation.attributes.color') }}</th>
      @endif
      @if (!$isExport)
        @if ($is_has_summernote_simple ?? false)
          <th>{{ __('validation.attributes.summernote_simple') }}</th>
        @endif
        @if ($is_has_summernote ?? false)
          <th>{{ __('validation.attributes.summernote') }}</th>
        @endif
        @if ($is_has_tinymce ?? false)
          <th>{{ __('validation.attributes.tinymce') }}</th>
        @endif
        @if ($is_has_ckeditor ?? false)
          <th>{{ __('validation.attributes.ckeditor') }}</th>
        @endif
      @endif

      {{-- wajib --}}
      <th>{{ __('validation.attributes.created_at') }}</th>
      <th>{{ __('validation.attributes.updated_at') }}</th>
      @if ($isTrashed)
        <th>{{ __('validation.attributes.deleted_at') }}</th>
      @endif
      <th>{{ __('validation.attributes.created_by') }}</th>
      <th>{{ __('validation.attributes.updated_by') }}</th>
      @if ($isExport === false && ($canUpdate || $canDelete || $canDetail))
        <th class="td-action no-sort">{{ __('validation.attributes.actions') }}</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @if ($isYajra === false)
      @foreach ($data as $item)
        <tr>
          @if ($isTrashed === false && $isExport === false)
            <td class="td-checkbox">
              <input onclick="onCheck()" type="checkbox" class="record_checkbox" data-id="{{ $item->uuid ?? $item->id }}" />
            </td>
          @endif
          <td>{{ $loop->iteration }}</td>

          {{-- ini adalah hasil dari make:module --}}
          {{-- columnstd --}}

          {{-- yang ini boleh dikomen --}}
          @if ($is_has_name ?? false)
            <td>{{ $item->name }}</td>
          @endif
          @if ($is_has_phone_number ?? false)
            @include('stisla.includes.others.td-phone-number')
          @endif
          @if ($is_has_address ?? false)
            @include('stisla.includes.others.td-address')
          @endif
          @if ($is_has_birthdate ?? false)
            @include('stisla.includes.others.td-dob', ['DateTime' => $item->birthdate])
          @endif
          @if ($is_has_avatar ?? false)
            @include('stisla.includes.others.td-avatar')
          @endif
          @if ($is_has_text ?? false)
            <td>{{ $item->text }}</td>
          @endif
          @if ($is_has_barcode ?? false)
            @include('stisla.includes.others.td-barcode')
          @endif
          @if ($is_has_qr_code ?? false)
            @include('stisla.includes.others.td-qrcode')
          @endif
          @if ($is_has_email ?? false)
            @include('stisla.includes.others.td-email')
          @endif
          @if ($is_has_number ?? false)
            <td>{{ $item->number }}</td>
          @endif
          @if ($is_has_currency ?? false)
            @include('stisla.includes.others.td-dollar')
          @endif
          @if ($is_has_currency_idr ?? false)
            @include('stisla.includes.others.td-rp')
          @endif
          @if ($is_has_select ?? false)
            <td>{{ $item->select }}</td>
          @endif
          @if ($is_has_select2 ?? false)
            <td>{{ $item->select2 }}</td>
          @endif
          @if ($is_has_select2_multiple ?? false)
            @include('stisla.includes.others.td-array')
          @endif
          @if ($is_has_textarea ?? false)
            <td>{{ $item->textarea }}</td>
          @endif
          @if ($is_has_radio ?? false)
            <td>{{ $item->radio }}</td>
          @endif
          @if ($is_has_checkbox ?? false)
            @include('stisla.includes.others.td-array', ['arr' => $item->checkbox])
          @endif
          @if ($is_has_checkbox2 ?? false)
            @include('stisla.includes.others.td-array', ['arr' => $item->checkbox2])
          @endif
          @if ($is_has_is_active ?? false)
            @if ($item->is_active)
              <td><span class="badge badge-success">{{ __('Ya') }}</span></td>
            @else
              <td><span class="badge badge-danger">{{ __('Tidak') }}</span></td>
            @endif
          @endif
          @if ($is_has_tags ?? false)
            @include('stisla.includes.others.td-tags')
          @endif
          @if ($is_has_file ?? false)
            @include('stisla.includes.others.td-file')
          @endif
          @if ($is_has_image ?? false)
            @include('stisla.includes.others.td-image')
          @endif
          @if ($is_has_date ?? false)
            @include('stisla.includes.others.td-datetime', ['DateTime' => $item->date])
          @endif
          @if ($is_has_time ?? false)
            <td>{{ $item->time }}</td>
          @endif
          @if ($is_has_color ?? false)
            @include('stisla.includes.others.td-color')
          @endif

          @if (!$isExport)
            @if ($is_has_summernote_simple ?? false)
              @include('stisla.includes.others.td-html', ['htmlItem' => $item->summernote_simple, 'id' => 'summernoteSimple' . $item->id])
            @endif
            @if ($is_has_summernote ?? false)
              @include('stisla.includes.others.td-html', ['htmlItem' => $item->summernote, 'id' => 'summernote' . $item->id])
            @endif
            @if ($is_has_tinymce ?? false)
              @include('stisla.includes.others.td-html', ['htmlItem' => $item->tinymce, 'id' => 'tinymce' . $item->id])
            @endif
            @if ($is_has_ckeditor ?? false)
              @include('stisla.includes.others.td-html', ['htmlItem' => $item->ckeditor, 'id' => 'ckeditor' . $item->id])
            @endif
          @endif

          {{-- wajib --}}
          @include('stisla.includes.others.td-created-updated-at')
          @include('stisla.includes.others.td-created-updated-by')
          @include('stisla.includes.others.td-action')

        </tr>
      @endforeach
    @endif
  </tbody>
</table>
