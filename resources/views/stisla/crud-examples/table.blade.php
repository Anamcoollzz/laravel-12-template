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
      <th>{{ __('Is Active') }}</th>
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
          <td>{{ $item->name }}</td>
          @include('stisla.includes.others.td-phone-number')
          @include('stisla.includes.others.td-address')
          @include('stisla.includes.others.td-dob')
          @include('stisla.includes.others.td-avatar')
          <td>{{ $item->text }}</td>
          @include('stisla.includes.others.td-barcode')
          @include('stisla.includes.others.td-qrcode')
          @include('stisla.includes.others.td-email')
          <td>{{ $item->number }}</td>
          @include('stisla.includes.others.td-dollar')
          @include('stisla.includes.others.td-rp')
          <td>{{ $item->select }}</td>
          <td>{{ $item->select2 }}</td>
          @include('stisla.includes.others.td-array')
          <td>{{ $item->textarea }}</td>
          <td>{{ $item->radio }}</td>
          @include('stisla.includes.others.td-array', ['arr' => $item->checkbox])
          @include('stisla.includes.others.td-array', ['arr' => $item->checkbox2])
          @if ($item->is_active)
            <td><span class="badge badge-success">{{ __('Ya') }}</span></td>
          @else
            <td><span class="badge badge-danger">{{ __('Tidak') }}</span></td>
          @endif
          @include('stisla.includes.others.td-tags')
          @include('stisla.includes.others.td-file')
          @include('stisla.includes.others.td-image')
          @include('stisla.includes.others.td-datetime')
          <td>{{ $item->time }}</td>
          @include('stisla.includes.others.td-color')

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
