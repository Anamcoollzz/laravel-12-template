<div class="card">
  <div class="card-header">
    <h4><i class="fa fa-filter"></i> {{ __('Filter Data') }}</h4>
    <div class="card-header-action">
      <a class="btn btn-primary" data-toggle="collapse" href="#collapseFilterData" role="button" aria-expanded="false" aria-controls="collapseFilterData">
        <i class="fa fa-angle-down"></i>
      </a>
    </div>
  </div>
  <div class="card-body">
    <div class="collapse {{ $is_show === false ? '' : 'show' }}" id="collapseFilterData">
      <form action="">
        @csrf
        <input type="hidden" name="show_deleted" value="{{ request()->get('show_deleted') }}">
        <div class="row">
          @if (is_app_dataku() && Route::is('user-management.users.index') && (request('filter_role') === '3' || request('filter_role') === '4'))
            <div class="col-md-6 col-lg-3">
              @php
                $levels = isset($levels) ? $levels : \App\Models\ClassLevel::select('id', 'level_name')->orderBy('level_name')->get();
              @endphp
              @include('stisla.includes.forms.selects.select', [
                  'id' => 'filter_level_id',
                  'name' => 'filter_level_id',
                  'options' => $levels->pluck('level_name', 'id')->toArray(),
                  'label' => __('validation.attributes.class_level_id'),
                  'required' => false,
                  'with_all' => true,
                  'selected' => request('filter_level_id', null),
              ])
            </div>
            <div class="col-md-6 col-lg-3">
              @php
                $schoolYears = isset($schoolYears) ? $schoolYears : \App\Models\SchoolYear::select('id', 'year_name')->orderBy('year_name')->get();
              @endphp
              @include('stisla.includes.forms.selects.select', [
                  'id' => 'filter_year_id',
                  'name' => 'filter_year_id',
                  'options' => $schoolYears->pluck('year_name', 'id')->toArray(),
                  'label' => __('validation.attributes.school_year_id'),
                  'required' => false,
                  'with_all' => true,
                  'selected' => request('filter_year_id', null),
              ])
            </div>
            <div class="col-md-6 col-lg-3">
              @php
                $semesters = isset($semesters) ? $semesters : \App\Models\Semester::select('id', 'semester')->orderBy('semester')->get();
              @endphp
              @include('stisla.includes.forms.selects.select', [
                  'id' => 'filter_semester_id',
                  'name' => 'filter_semester_id',
                  'options' => $semesters->pluck('semester', 'id')->toArray(),
                  'label' => __('validation.attributes.semester_id'),
                  'required' => false,
                  'with_all' => true,
                  'selected' => request('filter_semester_id', null),
              ])
            </div>
            <input type="hidden" name="filter_role" value="{{ request('filter_role') }}">
          @else
            <div class="col-md-6 col-lg-3">
              @include('stisla.includes.forms.inputs.input', [
                  'required' => false,
                  'name' => 'filter_start_created_at',
                  'type' => 'date',
                  'label' => 'Start Created At',
                  'value' => request('filter_start_created_at', null),
              ])
            </div>
            <div class="col-md-6 col-lg-3">
              @include('stisla.includes.forms.inputs.input', [
                  'required' => false,
                  'name' => 'filter_end_created_at',
                  'type' => 'date',
                  'label' => 'End Created At',
                  'value' => request('filter_end_created_at', null),
              ])
            </div>
            <div class="col-md-6 col-lg-3">
              @include('stisla.includes.forms.inputs.input', [
                  'required' => false,
                  'name' => 'filter_start_updated_at',
                  'type' => 'date',
                  'label' => 'Start Updated At',
                  'value' => request('filter_start_updated_at', null),
              ])
            </div>
            <div class="col-md-6 col-lg-3">
              @include('stisla.includes.forms.inputs.input', [
                  'required' => false,
                  'name' => 'filter_end_updated_at',
                  'type' => 'date',
                  'label' => 'End Updated At',
                  'value' => request('filter_end_updated_at', null),
              ])
            </div>
            <div class="col-md-6 col-lg-3">
              @php
                $users = isset($users) ? $users : \App\Models\User::select('id', 'name')->orderBy('name')->get();
              @endphp
              @include('stisla.includes.forms.selects.select', [
                  'id' => 'filter_created_by_id',
                  'name' => 'filter_created_by_id',
                  'options' => $users->pluck('name', 'id')->toArray(),
                  'label' => 'Created By',
                  'required' => false,
                  'with_all' => true,
                  'selected' => request('filter_created_by_id', null),
              ])
            </div>
            <div class="col-md-6 col-lg-3">
              @include('stisla.includes.forms.selects.select', [
                  'id' => 'filter_last_updated_by_id',
                  'name' => 'filter_last_updated_by_id',
                  'options' => $users->pluck('name', 'id')->toArray(),
                  'label' => 'Last Updated By',
                  'required' => false,
                  'with_all' => true,
                  'selected' => request('filter_last_updated_by_id', null),
              ])
            </div>
            <div class="col-md-6 col-lg-3">
              @include('stisla.includes.forms.selects.select', [
                  'id' => 'filter_sort_by_created_at',
                  'name' => 'filter_sort_by_created_at',
                  'options' => ['latest' => 'latest', 'oldest' => 'oldest'],
                  'label' => 'Sort By Created At',
                  'required' => false,
                  'with_all' => false,
                  'selected' => request('filter_sort_by_created_at', 'latest'),
              ])
            </div>
            <div class="col-md-6 col-lg-3">
              @include('stisla.includes.forms.inputs.input', [
                  'required' => true,
                  'name' => 'filter_limit',
                  'type' => 'number',
                  'label' => 'Limit',
                  'value' => request('filter_limit', 50),
                  'min' => 1,
              ])
            </div>
            @if (Route::is('user-management.users.index'))
              <div class="col-md-6 col-lg-3">
                @php
                  $userRepo = new \App\Repositories\UserRepository();
                @endphp
                @include('stisla.includes.forms.selects.select', [
                    'id' => 'filter_role',
                    'name' => 'filter_role',
                    'options' => $userRepo->getRoleOptions(),
                    'label' => 'Role',
                    'required' => false,
                    'with_all' => true,
                    'selected' => request('filter_role', null),
                ])
              </div>
            @endif
          @endif
          <div class="col-12">
            @include('stisla.includes.forms.buttons.btn-search')
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
