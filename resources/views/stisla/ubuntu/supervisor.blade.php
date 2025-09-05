{{-- supervisor --}}
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h4><i class="fa fa-folder"></i> {{ __('Supervisor') }}</h4>
      <div class="card-header-action">
        @if (str_contains($supervisorStatus, 'running'))
          @include('stisla.includes.forms.buttons.btn-primary', ['link' => route('ubuntu.supervisor', ['action' => 'stop']), 'label' => 'Stop Supervisor'])
          @include('stisla.includes.forms.buttons.btn-primary', [
              'link' => route('ubuntu.supervisor', ['action' => 'restart']),
              'label' => 'Restart Supervisor',
          ])
        @else
          @include('stisla.includes.forms.buttons.btn-primary', ['link' => route('ubuntu.supervisor', ['action' => 'start']), 'label' => 'Start Supervisor'])
        @endif
      </div>
    </div>
    <div class="card-body">
      <pre>{{ $supervisorStatus }}</pre>
      <div class="table-responsive">

        <table class="table table-striped table-hovered" id="datatable">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">{{ __('Path') }}</th>
              <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 1;
            @endphp
            @foreach ($supervisors as $item)
              <tr>
                <td>{{ $i++ }}</td>
                <td>
                  <a href="?folder={{ encrypt($item) }}">
                    {{ $item }}
                  </a>
                </td>
                <td>
                  @include('stisla.includes.forms.buttons.btn-edit', ['link' => route('ubuntu.edit', [encrypt($item)])])
                  @include('stisla.includes.forms.buttons.btn-edit', [
                      'link' => route('ubuntu.duplicate', [encrypt($item)]),
                      'icon' => 'fa fa-copy',
                      'tooltip' => 'Duplikasi',
                  ])
                  @include('stisla.includes.forms.buttons.btn-delete', ['link' => route('ubuntu.destroy', [encrypt($item)])])
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
