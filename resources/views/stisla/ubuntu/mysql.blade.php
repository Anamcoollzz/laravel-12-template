@if (request('database') && request('table'))
  <div class="col-12">

    <div class="section-header">
      <h1>MySQL Database</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="{{ route('ubuntu.index') }}">{{ __('MySQL') }}</a>
        </div>
        <div class="breadcrumb-item active">
          <a href="{{ route('ubuntu.index', ['database' => request('database')]) }}">{{ request('database') }}</a>
        </div>
        <div class="breadcrumb-item">{{ request('table') }}</div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4><i class="fa fa-database"></i> {{ __('MySql Database') }} > {{ request('database') }} > {{ request('table') }}</h4>
        @include('stisla.ubuntu.mysql-action')
      </div>
      <div class="card-body">
        <pre>{{ $mysqlStatus }}</pre>
        <div class="table-responsive">

          <table class="table table-striped table-hovered datatable">
            <thead>
              <tr>
                <th class="text-center">#</th>
                @foreach ($structure as $item)
                  <th class="text-center">{{ $item->column }}</th>
                @endforeach

                <th class="text-center">{{ __('Aksi') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rows as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  @foreach ($structure as $column)
                    <td>{{ $item->{$column->column} }}</td>
                  @endforeach
                  <td>
                    @include('stisla.includes.forms.buttons.btn-edit', [
                        'link' => route('ubuntu.edit-row', ['database' => request('database'), 'table' => request('table'), 'id' => $item->{$primary}, 'primary' => $primary]),
                    ])
                    @include('stisla.includes.forms.buttons.btn-edit', [
                        'link' => route('ubuntu.edit-row', [
                            'database' => request('database'),
                            'table' => request('table'),
                            'id' => $item->{$primary},
                            'primary' => $primary,
                            'json' => 'true',
                        ]),
                        'icon' => 'fa fa-code',
                        'tooltip' => 'Lihat Json',
                    ])
                    @include('stisla.includes.forms.buttons.btn-delete', [
                        'link' => route('ubuntu.delete-row', ['database' => request('database'), 'table' => request('table'), 'id' => $item->{$primary}]),
                        'primary' => $primary,
                    ])
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@elseif (request('database'))
  <div class="col-12">
    <div class="section-header">
      <h1>MySQL Database</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="{{ route('ubuntu.index') }}">{{ __('MySQL') }}</a>
        </div>
        <div class="breadcrumb-item">{{ request('database') }}</div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4><i class="fa fa-database"></i> {{ __('MySql Database') }} > {{ request('database') }}</h4>
        @include('stisla.ubuntu.mysql-action')
      </div>
      <div class="card-body">
        <pre>{{ $mysqlStatus }}</pre>
        <div class="table-responsive">

          <table class="table table-striped table-hovered datatable">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">{{ __('Tabel') }}</th>
                <th class="text-center">{{ __('Size') }}</th>
                <th class="text-center">{{ __('Rows') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tables as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->table }}</td>
                  <td>{{ $item->size_mb }} Mb</td>
                  <td>{{ $item->total_row }}</td>
                  <td>
                    @include('stisla.includes.forms.buttons.btn-edit', [
                        'link' => route('ubuntu.index', ['database' => request('database'), 'table' => $item->table]),
                        'icon' => 'fa fa-table',
                        'tooltip' => 'Lihat Data',
                    ])
                    @include('stisla.includes.forms.buttons.btn-edit', [
                        'link' => route('ubuntu.index', ['database' => request('database'), 'table' => $item->table, 'action' => 'json']),
                        'icon' => 'fa fa-code',
                        'tooltip' => 'Lihat JSON',
                    ])
                    @include('stisla.includes.forms.buttons.btn-success', [
                        'link' => route('ubuntu.index', ['database' => request('database'), 'table' => $item->table, 'action' => 'json-download']),
                        'icon' => 'fa fa-code',
                        'tooltip' => 'Download JSON',
                        'size' => 'sm',
                    ])
                    @include('stisla.includes.forms.buttons.btn-danger', [
                        'link' => route('ubuntu.mysql-paginate', ['database' => request('database'), 'table' => $item->table, 'action' => 'json-paginate']),
                        'icon' => 'fa fa-code',
                        'tooltip' => 'Paginate JSON',
                        'size' => 'sm',
                    ])
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@else
  <div class="col-12">
    <div class="section-header">
      <h1>MySQL Database</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="{{ route('ubuntu.index') }}">{{ __('MySQL') }}</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4><i class="fa fa-database"></i> {{ __('MySql Database') }}</h4>
        @include('stisla.ubuntu.mysql-action')
      </div>
      <div class="card-body">
        <pre>{{ $mysqlStatus }}</pre>
        <form action="{{ route('ubuntu.create-db') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'database_name', 'label' => 'Nama Database'])
            </div>
            <div class="col-md-12">
              @include('stisla.includes.forms.buttons.btn-save', ['label' => 'Buat Database Baru'])
              <br>
              <br>
              <br>
            </div>
          </div>
        </form>

        <div class="table-responsive">

          <table class="table table-striped table-hovered datatable">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">{{ __('Database') }}</th>
                <th class="text-center">{{ __('Tabel') }}</th>
                <th class="text-center">{{ __('Size') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($databases as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->database }}</td>
                  <td>{{ $item->total_table }}</td>
                  <td>{{ $item->size_mb }} Mb</td>
                  <td>
                    @include('stisla.includes.forms.buttons.btn-edit', [
                        'link' => route('ubuntu.index', ['database' => $item->database]),
                        'icon' => 'fa fa-table',
                        'tooltip' => 'Lihat Tabel',
                    ])
                    @include('stisla.includes.forms.buttons.btn-danger', [
                        'link' => route('ubuntu.index', ['database' => $item->database, 'action' => 'delete_db']),
                        'icon' => 'fa fa-trash',
                        'tooltip' => 'Hapus',
                    ])
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endif
