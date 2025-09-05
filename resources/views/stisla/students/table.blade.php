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
      <th>{{ __('Nama') }}</th>
      <th>{{ __('NIM') }}</th>
      <th>{{ __('Tanggal Lahir') }}</th>
      <th>{{ __('Prodi') }}</th>
      <th>{{ __('Fakultas') }}</th>
      <th>{{ __('Angkatan') }}</th>
      <th>{{ __('Status') }}</th>
      <th>{{ __('Email') }}</th>
      <th>{{ __('No HP') }}</th>
      <th>{{ __('Alamat') }}</th>
      @if ($isAlumniPage = Route::is('alumnis.index') || Route::is('alumnis.pdf') || Route::is('alumnis.excel') || Route::is('alumnis.csv'))
        <th>{{ __('Tahun Lulus') }}</th>
        <th>{{ __('Pekerjaan') }}</th>
      @endif
      {{-- <th>{{ __('Email') }}</th>
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
      <th>{{ __('Color') }}</th> --}}
      {{-- @if ($isExport)
        <th>{{ __('Summernote Simple') }}</th>
        <th>{{ __('Summernote') }}</th>
      @endif --}}
      <th>{{ __('Created At') }}</th>
      <th>{{ __('Updated At') }}</th>
      @if (is_mahasiswa() === false)
        <th>{{ __('Created By') }}</th>
        <th>{{ __('Last Updated By') }}</th>
      @endif
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
          {{-- @if ($isExport)
            <td>{{ $item->barcode }}</td>
            <td>{{ $item->qr_code }}</td>
          @else
            <td>{!! \Milon\Barcode\Facades\DNS1DFacade::getBarcodeHTML($item->barcode, 'C39', 1, 10) !!}</td>
            <td>{!! \Milon\Barcode\Facades\DNS2DFacade::getBarcodeHTML($item->qr_code, 'QRCODE', 3, 3) !!}</td>
          @endif --}}
          <td>{{ $item->nim }}</td>
          <td>{{ $item->user?->birth_date }}</td>
          <td>{{ $item->studyProgram->name ?? '-' }}</td>
          <td>{{ $item->studyProgram->faculty->name ?? '-' }}</td>
          <td>{{ $item->class_year }}</td>
          <td>
            @if ($item->student_status == 'aktif')
              <span class="badge badge-success">{{ $item->student_status }}</span>
            @elseif($item->student_status == 'lulus')
              <span class="badge badge-primary">{{ $item->student_status }}</span>
            @elseif($item->student_status == 'cuti')
              <span class="badge badge-warning">{{ $item->student_status }}</span>
            @elseif($item->student_status == 'dikeluarkan')
              <span class="badge badge-danger">{{ $item->student_status }}</span>
            @else
              <span class="badge badge-secondary">{{ $item->student_status }}</span>
            @endif
          </td>
          @include('stisla.includes.others.td-email')
          @include('stisla.includes.others.td-phone-number')
          @include('stisla.includes.others.td-address')
          @if ($isAlumniPage)
            <td>{{ $item->graduation_year }}</td>
            <td>{{ $item->work->job_name ?? '-' }}</td>
          @endif
          {{-- <td>{{ dollar($item->currency) }}</td>
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
              @include('stisla.crud-examples.tags', ['tags' => $item->tags])
            </td>
          @else
            <td>{{ implode(', ', explode(',', $item->tags)) }}</td>
          @endif

          @if ($isExport)
            <td>
              @if (Str::contains($item->file, 'http'))
                <a href="{{ $item->file }}">cek</a>
              @elseif($item->file)
                <a href="{{ $urlLink = Storage::url('crud-examples/' . $item->file) }}">cek</a>
              @else
                -
              @endif
            </td>
            <td>
              @if (Str::contains($item->image, 'http'))
                <a href="{{ $item->image }}">cek</a>
              @elseif($item->image)
                <a href="{{ $urlLink = Storage::url('crud-examples/' . $item->image) }}">cek</a>
              @else
                -
              @endif
            </td>
          @else
            <td>
              @include('stisla.crud-examples.file', ['file' => $item->file])
            </td>
            <td>
              @include('stisla.crud-examples.image', ['file' => $item->image])
            </td>
          @endif

          <td>{{ $item->date }}</td>
          <td>{{ $item->time }}</td>
          <td>
            @include('stisla.crud-examples.color', ['color' => $item->color])
          </td> --}}

          {{-- @if ($isExport)
            <td>{{ $item->summernote_simple }}</td>
            <td>{{ $item->summernote }}</td>
          @endif --}}

          {{-- wajib --}}
          @include('stisla.includes.others.td-created-updated-at')
          @if (is_mahasiswa() === false)
            @include('stisla.includes.others.td-created-updated-by')
          @endif

          @if ($isExport === false)
            @include('stisla.includes.forms.buttons.btn-action')
          @endif
        </tr>
      @endforeach
    @endif
  </tbody>
</table>
