<div class="col-12">
  <div class="alert alert-info">
    Untuk menggunakan fitur ini pastikan sudah meng-setup supervisor, karena command2 yang dijalankan menggunakan supervisor.
  </div>
  <div class="card">
    <div class="card-header">
      <h4><i class="fa fa-folder"></i> {{ __($path) }}</h4>

      @if ($isGit)
        <div class="card-header-action">
          {{-- @include('stisla.includes.forms.buttons.btn-edit', ['link' => route('ubuntu.git-pull', [encrypt($path)]), 'icon' => 'fab fa-github', 'tooltip' => 'git pull origin']) --}}
          @include('stisla.includes.forms.buttons.btn-edit', [
              'link' => route('ubuntu.set-laravel-permission', [encrypt($path)]),
              'icon' => 'fab fa-laravel',
              'tooltip' => 'set laravel permission',
          ])
        </div>
      @endif
    </div>
    <div class="card-body">

      <form action="{{ route('ubuntu.index') }}" method="GET">
        @csrf
        <div class="row">
          <div class="col-md-6">
            @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'redirect_folder', 'label' => 'Path', 'value' => $path])
          </div>
          <div class="col-md-12">
            @include('stisla.includes.forms.buttons.btn-save', ['label' => 'Let\'s Go'])
            <br>
            <br>
            <br>
            {{-- @if ($isLaravel)
                  <h5>Laravel Projek</h5>
                  <br>
                  <h6>Seeders</h6>
                  <a href="{{ route('ubuntu.laravelSeeder', ['seeder' => 'all', 'folder' => encrypt($path)]) }}" class="btn btn-primary mb-3 btn-sm">Seed All</a>
                  @foreach ($seeders as $seed)
                    <a href="{{ route('ubuntu.laravelSeeder', ['seeder' => $seed, 'folder' => encrypt($path)]) }}" class="btn btn-primary mb-3 btn-sm">{{ $seed }}</a>
                  @endforeach
                  <br>
                  <br>
                  <h6>Migrations</h6>
                  <a href="{{ route('ubuntu.laravelMigrate', ['folder' => encrypt($path)]) }}" class="btn btn-primary btn-sm">Migrate</a>
                  <a href="{{ route('ubuntu.laravelMigrateRefresh', ['folder' => encrypt($path)]) }}" class="btn btn-primary btn-sm">Migrate Refresh</a>
                  <br>
                  <br>
                @endif --}}
          </div>
        </div>
      </form>

      <div class="table-responsive">

        <table class="table table-striped table-hovered" id="datatable">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">{{ __('Name') }}</th>
              <th class="text-center">{{ __('Path') }}</th>
              <th class="text-center">{{ __('Type') }}</th>
              <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 1;
            @endphp
            @if ($parentPath)
              <tr>
                <td>{{ $i++ }}</td>
                <td>
                  <a href="?folder={{ encrypt($parentPath) }}">
                    ..
                  </a>
                </td>
                <td>
                  <a href="?folder={{ encrypt($parentPath) }}">
                    ..
                  </a>
                </td>
                <td>Dir</td>
                <td></td>
              </tr>
            @endif
            @foreach ($foldersWww as $item)
              <tr>
                <td>{{ $i++ }}</td>
                <td>
                  <a href="?folder={{ encrypt($item) }}">
                    {{ basename($item) }}
                  </a>
                </td>
                <td>
                  <a href="?folder={{ encrypt($item) }}">
                    {{ $item }}
                  </a>
                </td>
                <td>Dir</td>
                <td></td>
              </tr>
            @endforeach
            @foreach ($filesWww as $item)
              <tr>
                <td>{{ $i++ }}</td>
                <td>
                  <a target="_blank" href="?download={{ encrypt($item->getPathname()) }}">
                    {{ basename($item->getPathname()) }}
                  </a>
                </td>
                <td>
                  <a target="_blank" href="?download={{ encrypt($item->getPathname()) }}">
                    {{ $item->getPathname() }}
                  </a>
                </td>
                <td>File</td>
                <td>
                  @include('stisla.includes.forms.buttons.btn-edit', ['link' => route('ubuntu.edit', [encrypt($item->getPathname())])])
                  @include('stisla.includes.forms.buttons.btn-edit', [
                      'link' => route('ubuntu.duplicate', [encrypt($item->getPathname())]),
                      'icon' => 'fa fa-copy',
                      'tooltip' => 'Duplikasi',
                  ])
                  @if (basename($item->getPathname()) === '.env.example' && $isEnvExists === false)
                    @include('stisla.includes.forms.buttons.btn-success', [
                        'link' => route('ubuntu.duplicate', [encrypt($item->getPathname()), 'as' => '.env']),
                        'icon' => 'fa fa-copy',
                        'tooltip' => 'Duplikasi sebagi .env',
                        'size' => 'sm',
                    ])
                  @endif
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
