@php
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
  @if ($isYajra || $isAjaxYajra) data-ajax-url="{{ $routeYajra }}?isAjaxYajra={{ $isAjaxYajra }}" @else  id="datatable" @endif
  @if ($isExport === false && $canExport) data-export="true" data-title="{{ $title }}" @endif>
  <thead>
    <tr>
      @if ($isExport)
        <th class="text-center">#</th>
      @else
        <th>{{ __('No') }}</th>
      @endif
      {{-- columns --}}

      <th>{{ __('Nama') }}</th>
      <th>{{ __('No HP') }}</th>
      <th>{{ __('Alamat') }}</th>
      <th>{{ __('Tanggal Lahir') }}</th>
      <th>{{ __('Avatar') }}</th>
      <th>{{ __('Text') }}</th>
      <th>{{ __('Barcode') }}</th>
      <th>{{ __('QR Code') }}</th>
      <th>{{ __('Email') }}</th>
      <th>{{ __('Number') }}</th>
      <th>{{ __('Currency') }}</th>
      <th>{{ __('Currency IDR') }}</th>
      <th>{{ __('Select') }}</th>
      <th>{{ __('Select2') }}</th>
      <th>{{ __('Select2 Multiple') }}</th>
      <th>{{ __('Textarea') }}</th>
      <th>{{ __('Radio') }}</th>
      <th>{{ __('Checkbox') }}</th>
      <th>{{ __('Checkbox 2') }}</th>
      <th>{{ __('Tags') }}</th>
      <th>{{ __('File') }}</th>
      <th>{{ __('Image') }}</th>
      <th>{{ __('Date') }}</th>
      <th>{{ __('Time') }}</th>
      <th>{{ __('Color') }}</th>
      {{-- @if ($isExport)
        <th>{{ __('Summernote Simple') }}</th>
        <th>{{ __('Summernote') }}</th>
      @endif --}}
      <th>{{ __('Created At') }}</th>
      <th>{{ __('Updated At') }}</th>
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
          {{-- columnstd --}}

          <td>{{ $item->name }}</td>
          @include('stisla.includes.others.td-phone-number')
          @include('stisla.includes.others.td-address')
          @include('stisla.includes.others.td-dob')
          @include('stisla.crud-examples.td-avatar')
          <td>{{ $item->text }}</td>
          @include('stisla.includes.others.td-barcode')
          @include('stisla.includes.others.td-qrcode')
          <td>{{ $item->email }}</td>
          <td>{{ $item->number }}</td>
          <td>{{ dollar($item->currency) }}</td>
          <td>{{ rp($item->currency_idr) }}</td>
          <td>{{ $item->select }}</td>
          <td>{{ $item->select2 }}</td>
          <td>
            {{ is_array($item->select2_multiple) ? implode(', ', $item->select2_multiple) : $item->select2_multiple }}
          </td>
          <td>{{ $item->textarea }}</td>
          <td>{{ $item->radio }}</td>
          <td>{{ is_array($item->checkbox) ? implode(', ', $item->checkbox) : $item->checkbox }}</td>
          <td>{{ is_array($item->checkbox2) ? implode(', ', $item->checkbox2) : $item->checkbox2 }}</td>

          @if ($isExport === false)
            <td>
              @include('stisla.' . $prefix . '.tags', ['tags' => $item->tags])
            </td>
          @else
            <td>{{ implode(', ', explode(',', $item->tags)) }}</td>
          @endif

          @include('stisla.crud-examples.td-file')
          @include('stisla.crud-examples.td-image')
          @include('stisla.includes.others.td-datetime')
          <td>{{ $item->time }}</td>
          <td>
            @include('stisla.crud-examples.color', ['color' => $item->color])
          </td>

          {{-- @if ($isExport)
            <td>{{ $item->summernote_simple }}</td>
            <td>{{ $item->summernote }}</td>
          @endif --}}

          {{-- wajib --}}
          @include('stisla.includes.others.td-created-updated-at')
          @include('stisla.includes.others.td-created-updated-by')

          @if ($isExport === false)
            @include('stisla.includes.forms.buttons.btn-action')
          @endif
        </tr>
      @endforeach
    @endif
  </tbody>
</table>
