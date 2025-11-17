@php
  $isExport = $isExport ?? false;
  $isAjax = $isAjax ?? false;
  $isYajra = $isYajra ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
@endphp

<table class="table table-striped @if ($isYajra || $isAjaxYajra) yajra-datatable @endif"
  @if ($isYajra || $isAjaxYajra) data-ajax-url="{{ $routeYajra }}?isAjaxYajra={{ $isAjaxYajra }}" @else  id="datatable" @endif
  @if ($isExport === false && $canExport) data-export="true" data-title="{{ $title }}" @endif>
  <thead>
    <tr>
      <th class="text-center">#</th>
      <th>{{ __('Nama') }}</th>
      <th>{{ __('NIK') }}</th>
      <th>{{ __('Jenis Kelamin') }}</th>
      <th>{{ __('No HP') }}</th>
      <th>{{ __('Tanggal Lahir') }}</th>
      <th>{{ __('Usia') }}</th>
      <th>{{ __('Alamat') }}</th>
      <th>{{ __('Email') }}</th>
      @if ($isRegionExists)
        <th>{{ __('Provinsi') }}</th>
        <th>{{ __('Kota/Kabupaten') }}</th>
        <th>{{ __('Kecamatan') }}</th>
        <th>{{ __('Desa/Kelurahan') }}</th>
      @endif
      @if ($roleCount > 1)
        <th>{{ __('Role') }}</th>
      @endif
      <th>{{ __('Status') }}</th>
      <th>{{ __('Alasan Diblokir') }}</th>
      <th>{{ __('Terakhir Masuk') }}</th>
      @if ($_is_login_must_verified)
        <th>{{ __('Waktu Verifikasi') }}</th>
      @endif

      @if (is_app_dataku())
        @if (request('filter_role') === '4')
          <th>{{ __('validation.attributes.nis') }}</th>
          <th>{{ __('validation.attributes.nisn') }}</th>
          <th>{{ __('validation.attributes.religion_id') }}</th>
          <th>{{ __('validation.attributes.religion_id') }}</th>
          <th>{{ __('validation.attributes.rt') }}</th>
          <th>{{ __('validation.attributes.rw') }}</th>
          <th>{{ __('validation.attributes.postal_code') }}</th>
          <th>{{ __('validation.attributes.school_class_id') }}</th>
          <th>{{ __('validation.attributes.room') }}</th>
          <th>{{ __('validation.attributes.father_nik') }}</th>
          <th>{{ __('validation.attributes.father_name') }}</th>
          <th>{{ __('validation.attributes.father_birth_date') }}</th>
          <th>{{ __('validation.attributes.father_education') }}</th>
          <th>{{ __('validation.attributes.father_work_id') }}</th>
          <th>{{ __('validation.attributes.father_income') }}</th>
          <th>{{ __('validation.attributes.mother_nik') }}</th>
          <th>{{ __('validation.attributes.mother_name') }}</th>
          <th>{{ __('validation.attributes.mother_birth_date') }}</th>
          <th>{{ __('validation.attributes.mother_education') }}</th>
          <th>{{ __('validation.attributes.mother_work_id') }}</th>
          <th>{{ __('validation.attributes.mother_income') }}</th>
          <th>{{ __('validation.attributes.guardian_nik') }}</th>
          <th>{{ __('validation.attributes.guardian_name') }}</th>
          <th>{{ __('validation.attributes.guardian_birth_date') }}</th>
          <th>{{ __('validation.attributes.guardian_education') }}</th>
          <th>{{ __('validation.attributes.guardian_work_id') }}</th>
          <th>{{ __('validation.attributes.guardian_income') }}</th>
        @endif

        @if (request('filter_role') === '3')
          {{-- // teacher --}}
          <th>{{ __('validation.attributes.teacher_nuptk') }}</th>
          <th>{{ __('validation.attributes.teacher_mother_name') }}</th>
          <th>{{ __('validation.attributes.teacher_employee_status') }}</th>
          <th>{{ __('validation.attributes.teacher_gtk_type') }}</th>
          <th>{{ __('validation.attributes.teacher_position') }}</th>
        @endif
      @endif

      {{-- wajib --}}
      <th>{{ __('Created At') }}</th>
      <th>{{ __('Updated At') }}</th>
      <th>{{ __('Deleted At') }}</th>
      <th>{{ __('Created By') }}</th>
      <th>{{ __('Last Updated By') }}</th>
      <th>{{ __('Deleted By') }}</th>
      @if (($canUpdate || $canDelete || ($canForceLogin && $item->id != auth_id())) && $isExport === false)
        <th>{{ __('Aksi') }}</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->nik }}</td>
        <td>{{ $item->gender }}</td>
        @include('stisla.includes.others.td-phone-number')
        @include('stisla.includes.others.td-dob', ['DateTime' => $item->birth_date])
        <td>{{ $item->age }}</td>
        @include('stisla.includes.others.td-address')
        @include('stisla.includes.others.td-email')
        @if ($isRegionExists)
          <td>{{ $item->province?->name }}</td>
          <td>{{ $item->city?->name }}</td>
          <td>{{ $item->district?->name }}</td>
          <td>{{ $item->village?->name }}</td>
        @endif
        @if ($roleCount > 1)
          <td>
            @foreach ($item->roles as $role)
              @if (auth_user()->can('Role Ubah'))
                <a class="badge badge-primary mb-1" href="{{ route('user-management.roles.edit', $role->id) }}">{{ $role->name }}</a>
              @else
                <span class="badge badge-primary mb-1">{{ $role->name }}</span>
              @endif
            @endforeach
          </td>
        @endif
        <td>
          <span class="badge badge-{{ $item->deleted_at !== null ? 'danger' : ($item->is_active == 1 ? 'success' : 'warning') }}">
            {{ $item->deleted_at !== null ? 'Dihapus' : ($item->is_active == 1 ? 'Aktif' : 'Tidak Aktif') }}
          </span>
        </td>
        <td>{{ $item->blocked_reason }}</td>
        @include('stisla.includes.others.td-datetime', ['DateTime' => $item->last_login])
        @if ($_is_login_must_verified)
          @include('stisla.includes.others.td-datetime', ['DateTime' => $item->email_verified_at])
        @endif

        @if (is_app_dataku())
          @if (request('filter_role') === '4')
            <td>{{ $item->nis }}</td>
            <td>{{ $item->nisn }}</td>
            <td>{{ $item->religion_id }}</td>
            <td>{{ $item->religion_id }}</td>
            <td>{{ $item->rt }}</td>
            <td>{{ $item->rw }}</td>
            <td>{{ $item->postal_code }}</td>
            <td>{{ $item->schoolclass?->class_name }}</td>
            <td>{{ $item->room }}</td>
            <td>{{ $item->father_nik }}</td>
            <td>{{ $item->father_name }}</td>
            <td>{{ $item->father_birth_date }}</td>
            <td>{{ $item->father_education }}</td>
            <td>{{ $item->fatherwork?->job_name }}</td>
            <td>{{ $item->father_income }}</td>
            <td>{{ $item->mother_nik }}</td>
            <td>{{ $item->mother_name }}</td>
            <td>{{ $item->mother_birth_date }}</td>
            <td>{{ $item->mother_education }}</td>
            <td>{{ $item->motherwork?->job_name }}</td>
            <td>{{ $item->mother_income }}</td>
            <td>{{ $item->guardian_nik }}</td>
            <td>{{ $item->guardian_name }}</td>
            <td>{{ $item->guardian_birth_date }}</td>
            <td>{{ $item->guardian_education }}</td>
            <td>{{ $item->guardianwork?->job_name }}</td>
            <td>{{ $item->guardian_income }}</td>
          @endif

          @if (request('filter_role') === '3')
            {{-- // teacher --}}
            <td>{{ $item->teacher_nuptk }}</td>
            <td>{{ $item->teacher_mother_name }}</td>
            <td>{{ $item->teacher_employee_status }}</td>
            <td>{{ $item->teacher_gtk_type }}</td>
            <td>{{ $item->teacher_position }}</td>
          @endif
        @endif

        {{-- wajib --}}
        @include('stisla.includes.others.td-created-updated-at')
        {{-- @include('stisla.includes.others.td-deleted-at') --}}
        @include('stisla.includes.others.td-created-updated-by')
        <td>{{ $item->deletedBy->name ?? '-' }}</td>
        @if (($canUpdate || $canDelete || ($canForceLogin && $item->id != auth_id())) && $isExport === false)
          <td style="width: 150px;">
            @if ($canUpdate && $item->deleted_at === null)
              @include('stisla.includes.forms.buttons.btn-edit', ['link' => route($routePrefix . '.edit', [$item->id])])
            @endif
            @if ($canDelete && $item->deleted_at === null)
              @include('stisla.includes.forms.buttons.btn-delete', ['link' => route($routePrefix . '.destroy', [$item->id])])
            @endif
            @if ($canBlock && $item->deleted_at === null)
              @if ($item->is_active == 1)
                @include('stisla.includes.forms.buttons.btn-warning', [
                    'link' => route($routePrefix . '.block', [$item->id]),
                    'icon' => 'fa fa-ban',
                    'title' => 'Blokir Pengguna',
                    'onclick' => 'blockUser(event, \'' . route('user-management.users.block', [$item->id]) . '\')',
                ])
              @else
                @include('stisla.includes.forms.buttons.btn-success', [
                    'link' => route($routePrefix . '.unblock', [$item->id]),
                    'icon' => 'fa fa-check',
                    'title' => 'Buka Blokir Pengguna',
                    'onclick' => 'unblockUser(event, \'' . route('user-management.users.unblock', [$item->id]) . '\')',
                    'size' => 'sm',
                ])
              @endif
            @endif
            @if ($canDetail)
              @include('stisla.includes.forms.buttons.btn-detail', ['link' => route($routePrefix . '.show', [$item->id])])
            @endif
            @if ($canForceLogin && $item->id != auth_id())
              @include('stisla.includes.forms.buttons.btn-success', [
                  'link' => route($routePrefix . '.force-login', [$item->id]),
                  'icon' => 'fa fa-door-open',
                  'title' => 'Force Login',
                  'size' => 'sm',
              ])
            @endif
          </td>
        @endif
      </tr>
    @endforeach
  </tbody>
</table>
