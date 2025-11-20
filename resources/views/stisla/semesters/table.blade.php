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
      @if ($isExport)
        <th class="text-center">#</th>
      @else
        <th>{{ __('No') }}</th>
      @endif

      {{-- ini adalah hasil dari make:module --}}
      <th>{{ __('Semester') }}</th>

      {{-- yang ini boleh dikomen --}}
      @if ($is_has_name ?? false)
        <th>{{ __('Nama') }}</th>
      @endif
      @if ($is_has_phone_number ?? false)
        <th>{{ __('No HP') }}</th>
      @endif
      @if ($is_has_address ?? false)
        <th>{{ __('Alamat') }}</th>
      @endif
      @if ($is_has_birthdate ?? false)
        <th>{{ __('Tanggal Lahir') }}</th>
      @endif
      @if ($is_has_avatar ?? false)
        <th>{{ __('Avatar') }}</th>
      @endif
      @if ($is_has_text ?? false)
        <th>{{ __('Text') }}</th>
      @endif
      @if ($is_has_barcode ?? false)
        <th>{{ __('Barcode') }}</th>
      @endif
      @if ($is_has_qrcode ?? false)
        <th>{{ __('QR Code') }}</th>
      @endif
      @if ($is_has_email ?? false)
        <th>{{ __('Email') }}</th>
      @endif
      @if ($is_has_number ?? false)
        <th>{{ __('Number') }}</th>
      @endif
      @if ($is_has_currency ?? false)
        <th>{{ __('Currency') }}</th>
      @endif
      @if ($is_has_currency_id ?? false)
        <th>{{ __('Currency IDR') }}</th>
      @endif
      @if ($is_has_select ?? false)
        <th>{{ __('Select') }}</th>
      @endif
      @if ($is_has_select2 ?? false)
        <th>{{ __('Select2') }}</th>
      @endif
      @if ($is_has_select2_multiple ?? false)
        <th>{{ __('Select2 Multiple') }}</th>
      @endif
      @if ($is_has_textarea ?? false)
        <th>{{ __('Textarea') }}</th>
      @endif
      @if ($is_has_radio ?? false)
        <th>{{ __('Radio') }}</th>
      @endif
      @if ($is_has_checkbox ?? false)
        <th>{{ __('Checkbox') }}</th>
      @endif
      @if ($is_has_checkbox2 ?? false)
        <th>{{ __('Checkbox 2') }}</th>
      @endif
      @if ($is_has_is_active ?? false)
        <th>{{ __('Is Active') }}</th>
      @endif
      @if ($is_has_tags ?? false)
        <th>{{ __('Tags') }}</th>
      @endif
      @if ($is_has_file ?? false)
        <th>{{ __('File') }}</th>
      @endif
      @if ($is_has_image ?? false)
        <th>{{ __('Image') }}</th>
      @endif
      @if ($is_has_date ?? false)
        <th>{{ __('Date') }}</th>
      @endif
      @if ($is_has_time ?? false)
        <th>{{ __('Time') }}</th>
      @endif
      @if ($is_has_color ?? false)
        <th>{{ __('Color') }}</th>
      @endif
      {{-- @if ($isExport)
        <th>{{ __('Summernote Simple') }}</th>
        <th>{{ __('Summernote') }}</th>
      @endif --}}

      {{-- wajib --}}
      <th>{{ __('Created At') }}</th>
      <th>{{ __('Updated At') }}</th>
      @if ($isTrashed)
        <th>{{ __('Deleted At') }}</th>
      @endif
      <th>{{ __('Created By') }}</th>
      <th>{{ __('Last Updated By') }}</th>
      @if ($isExport === false && ($canUpdate || $canDelete || $canDetail))
        <th>{{ __('Aksi') }}</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @if ($isYajra === false)
      @foreach ($data as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>

          {{-- ini adalah hasil dari make:module --}}
          <td>{{ $item->semester }}</td>

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
          @if ($is_has_qrcode ?? false)
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

          {{-- @if ($isExport)
            <td>{{ $item->summernote_simple }}</td>
            <td>{{ $item->summernote }}</td>
          @endif --}}

          {{-- wajib --}}
          @include('stisla.includes.others.td-created-updated-at')
          @include('stisla.includes.others.td-created-updated-by')
          @include('stisla.includes.others.td-action')
        </tr>
      @endforeach
    @endif
  </tbody>
</table>
