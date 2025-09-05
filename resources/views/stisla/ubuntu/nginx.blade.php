{{-- nginx --}}
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h4><i class="fa fa-server"></i> {{ __('Nginx Sites Available') }}</h4>
      <div class="card-header-action">
        @if (str_contains($nginxStatus, 'running'))
          @include('stisla.includes.forms.buttons.btn-primary', ['link' => route('ubuntu.nginx', ['nginx' => 'stop']), 'label' => 'Stop Nginx'])
          @include('stisla.includes.forms.buttons.btn-primary', ['link' => route('ubuntu.nginx', ['nginx' => 'restart']), 'label' => 'Restart Nginx'])
        @else
          @include('stisla.includes.forms.buttons.btn-primary', ['link' => route('ubuntu.nginx', ['nginx' => 'start']), 'label' => 'Start Nginx'])
        @endif
      </div>
    </div>
    <div class="card-body">
      <pre>{{ $nginxStatus }}</pre>
      <div class="table-responsive">

        <table class="table table-striped table-hovered" id="datatable">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">{{ __('Filename') }}</th>
              <th class="text-center">{{ __('Domain') }}</th>
              <th class="text-center">{{ __('Enabled') }}</th>
              <th class="text-center">{{ __('SSL') }}</th>
              <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($files as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->getFilename() }}</td>
                <td>
                  <a href="http://{{ $item->domain }}" target="_blank">
                    {{ $item->domain }}
                  </a>
                </td>
                <td>
                  @if ($item->enabled)
                    <a href="{{ route('ubuntu.toggle-enabled', [encrypt($item->getPathname()), 'false']) }}" class="btn btn-sm btn-success">true</a>
                  @else
                    <a href="{{ route('ubuntu.toggle-enabled', [encrypt($item->getPathname()), 'true']) }}" class="btn btn-sm btn-danger">false</a>
                  @endif
                </td>
                <td>
                  @if ($item->is_ssl)
                    <a href="{{ route('ubuntu.toggle-ssl', [encrypt($item->getPathname()), 'false']) }}" class="btn btn-sm btn-success">true</a>
                  @else
                    <a href="{{ route('ubuntu.toggle-ssl', [encrypt($item->getPathname()), 'true']) }}" class="btn btn-sm btn-danger">false</a>
                  @endif
                </td>
                <td>
                  @include('stisla.includes.forms.buttons.btn-edit', ['link' => route('ubuntu.edit', [encrypt($item->getPathname())])])
                  @include('stisla.includes.forms.buttons.btn-edit', [
                      'link' => route('ubuntu.duplicate', [encrypt($item->getPathname())]),
                      'icon' => 'fa fa-copy',
                      'tooltip' => 'Duplikasi',
                  ])
                  @include('stisla.includes.forms.buttons.btn-delete', ['link' => route('ubuntu.destroy', [encrypt($item->getPathname())])])
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
