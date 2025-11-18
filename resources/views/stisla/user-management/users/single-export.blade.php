@if ($photo)
  <div style="text-align: center; margin-bottom: 10px;">
    <img src="{{ $photo ?? $d->photo }}" alt="{{ $d->name }}" style="max-width: 150px;">
  </div>
@endif

<table>
  <tbody>
    {{-- <tr>
      <td colspan="2" style="text-align: center">

      </td>
    </tr> --}}
    <tr>
      <td>{{ __('validation.attributes.name') }}</td>
      <td>{{ $d->name }}</td>
    </tr>
    @if (!$isSiswa)
      <tr>
        <td>{{ __('validation.attributes.email') }}</td>
        <td>{{ $d->email }}</td>
      </tr>
    @endif
    {{-- <tr>
      <td>{{ __('validation.attributes.avatar') }}</td>
      <td>{{ $d->avatar }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.email_verified_at') }}</td>
      <td>{{ $d->email_verified_at }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.password') }}</td>
      <td>{{ $d->password }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.last_login') }}</td>
      <td>{{ $d->last_login }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.email_token') }}</td>
      <td>{{ $d->email_token }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.verification_code') }}</td>
      <td>{{ $d->verification_code }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.is_locked') }}</td>
      <td>{{ $d->is_locked }}</td>
    </tr> --}}
    <tr>
      <td>{{ __('validation.attributes.phone_number') }}</td>
      <td>{{ $d->phone_number }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.birth_date') }}</td>
      <td>{{ $d->birth_date }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.address') }}</td>
      <td>{{ $d->address }}</td>
    </tr>
    {{-- <tr>
      <td>{{ __('validation.attributes.last_password_change') }}</td>
      <td>{{ $d->last_password_change }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.twitter_id') }}</td>
      <td>{{ $d->twitter_id }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.file_upload') }}</td>
      <td>{{ $d->file_upload }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.wrong_login') }}</td>
      <td>{{ $d->wrong_login }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.is_active') }}</td>
      <td>{{ $d->is_active }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.created_by_id') }}</td>
      <td>{{ $d->created_by_id }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.last_updated_by_id') }}</td>
      <td>{{ $d->last_updated_by_id }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.blocked_reason') }}</td>
      <td>{{ $d->blocked_reason }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.deleted_at') }}</td>
      <td>{{ $d->deleted_at }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.deleted_by_id') }}</td>
      <td>{{ $d->deleted_by_id }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.last_seen_at') }}</td>
      <td>{{ $d->last_seen_at }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.is_anonymous') }}</td>
      <td>{{ $d->is_anonymous }}</td>
    </tr> --}}
    <tr>
      <td>{{ __('validation.attributes.gender') }}</td>
      <td>{{ $d->gender }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.nik') }}</td>
      <td>{{ $d->nik }}</td>
    </tr>
    {{-- <tr>
      <td>{{ __('validation.attributes.uuid') }}</td>
      <td>{{ $d->uuid }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.is_majalengka') }}</td>
      <td>{{ $d->is_majalengka }}</td>
    </tr> --}}
    <tr>
      <td>{{ __('validation.attributes.province_code') }}</td>
      <td>{{ $d->province->name }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.city_code') }}</td>
      <td>{{ $d->city->name }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.district_code') }}</td>
      <td>{{ $d->district->name }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.village_code') }}</td>
      <td>{{ $d->village->name }}</td>
    </tr>
    {{-- <tr>
      <td>{{ __('validation.attributes.photo') }}</td>
      <td>{{ $d->photo }}</td>
    </tr> --}}

    @if ($isSiswa)
      {{-- // student --}}
      <tr>
        <td>{{ __('validation.attributes.nis') }}</td>
        <td>{{ $d->nis }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.nisn') }}</td>
        <td>{{ $d->nisn }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.religion_id') }}</td>
        <td>{{ $d->religion->religion_name }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.rt') }}</td>
        <td>{{ $d->rt }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.rw') }}</td>
        <td>{{ $d->rw }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.postal_code') }}</td>
        <td>{{ $d->postal_code }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.school_class_id') }}</td>
        <td>{{ $d->schoolclass->class_name }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.room') }}</td>
        <td>{{ $d->room }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.father_nik') }}</td>
        <td>{{ $d->father_nik }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.father_name') }}</td>
        <td>{{ $d->father_name }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.father_birth_date') }}</td>
        <td>{{ $d->father_birth_date }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.father_education') }}</td>
        <td>{{ $d->father_education }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.father_work_id') }}</td>
        <td>{{ $d->fatherwork->job_name }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.father_income') }}</td>
        <td>{{ $d->father_income }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.mother_nik') }}</td>
        <td>{{ $d->mother_nik }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.mother_name') }}</td>
        <td>{{ $d->mother_name }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.mother_birth_date') }}</td>
        <td>{{ $d->mother_birth_date }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.mother_education') }}</td>
        <td>{{ $d->mother_education }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.mother_work_id') }}</td>
        <td>{{ $d->motherwork->job_name }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.mother_income') }}</td>
        <td>{{ $d->mother_income }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.guardian_nik') }}</td>
        <td>{{ $d->guardian_nik }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.guardian_name') }}</td>
        <td>{{ $d->guardian_name }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.guardian_birth_date') }}</td>
        <td>{{ $d->guardian_birth_date }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.guardian_education') }}</td>
        <td>{{ $d->guardian_education }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.guardian_work_id') }}</td>
        <td>{{ $d->guardianwork->job_name }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.guardian_income') }}</td>
        <td>{{ $d->guardian_income }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.class_level_id') }}</td>
        <td>{{ $d->classlevel->level_name }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.semester_id') }}</td>
        <td>{{ $d->semester->semester }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.school_year_id') }}</td>
        <td>{{ $d->schoolyear->year_name }}</td>
      </tr>
    @endif

    @if ($isGuru)
      {{-- // teacher --}}
      <tr>
        <td>{{ __('validation.attributes.teacher_nuptk') }}</td>
        <td>{{ $d->teacher_nuptk }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.teacher_mother_name') }}</td>
        <td>{{ $d->teacher_mother_name }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.teacher_employee_status') }}</td>
        <td>{{ $d->teacher_employee_status }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.teacher_gtk_type') }}</td>
        <td>{{ $d->teacher_gtk_type }}</td>
      </tr>
      <tr>
        <td>{{ __('validation.attributes.teacher_position') }}</td>
        <td>{{ $d->teacher_position }}</td>
      </tr>
    @endif

    <tr>
      <td>{{ __('validation.attributes.education_level_id') }}</td>
      <td>{{ $d->educationlevel->education_level }}</td>
    </tr>
  </tbody>
</table>
