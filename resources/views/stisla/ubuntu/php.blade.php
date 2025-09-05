@foreach ($phps as $php)
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4><i class="fa-brands fa-php"></i> {{ __($php['path']) }}</h4>
        <div class="card-header-action">
          @if (str_contains($php['status_fpm'], 'running'))
            @include('stisla.includes.forms.buttons.btn-primary', ['link' => route('ubuntu.php-fpm', ['version' => $php['version'], 'action' => 'stop']), 'label' => 'Stop FPM'])
            @include('stisla.includes.forms.buttons.btn-primary', [
                'link' => route('ubuntu.php-fpm', ['version' => $php['version'], 'action' => 'restart']),
                'label' => 'Restart FPM',
            ])
          @else
            @include('stisla.includes.forms.buttons.btn-primary', ['link' => route('ubuntu.php-fpm', ['version' => $php['version'], 'action' => 'start']), 'label' => 'Start FPM'])
          @endif
        </div>
      </div>
      <div class="card-body">
        <pre>{{ $php['status_fpm'] }}</pre>
        <div class="table-responsive">

          <table class="table table-striped table-hovered" id="datatable">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">{{ __('Path') }}</th>
                <th class="text-center">{{ __('Type') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($php['directories'] as $item)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>
                    <a href="?folder={{ encrypt($item) }}">
                      {{ $item }}
                    </a>
                  </td>
                  <td>Dir</td>
                  <td></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endforeach
