@extends($is_chat ? 'stisla.layouts.app-top-nav' : 'stisla.layouts.app-table')

@section('title')
  Dashboard
@endsection

@section('content')
  <div class="section-header">
    <h1>{{ __('Dashboard') }}</h1>
  </div>
  <div class="row">
    <div class="col-12">
      @include('stisla.includes.others.alert-password')
    </div>

    @if (!is_app_pocari())
      <div class="col-12">
        @if ($isLaravelOutdated && is_superadmin())
          @php
            $rawWa = config('app.developer_contact_whatsapp', '0853-2277-8935');
            $digits = preg_replace('/\D+/', '', $rawWa); // buang strip/spasi
            if (str_starts_with($digits, '0')) {
                $digits = '62' . substr($digits, 1); // 08xx -> 628xx
            }
            $defaultMessage = rawurlencode('Halo kak, saya ingin mengajukan permintaan update sistem aplikasi. Mohon informasinya lebih lanjut, terima kasih.');
          @endphp

          <div class="alert alert-warning text-sm mb-3">
            <strong>{{ __('Peringatan') }}</strong>
            <br>
            Aplikasi ini menggunakan Laravel versi
            <strong>{{ $laravelCurrentVersion }}</strong>, sedangkan versi terbaru adalah
            <strong>{{ $laravelLatestVersion }}</strong>.
            Silakan hubungi developer di
            <a href="https://wa.me/{{ $digits }}?text={{ $defaultMessage }}" target="_blank"><strong>{{ $rawWa }}</strong></a>
            atau klik
            <a href="https://wa.me/{{ $digits }}?text={{ $defaultMessage }}" target="_blank">
              WhatsApp
            </a>
            untuk melakukan update sistem.
          </div>
        @endif
      </div>
      <div class="col-12 mb-4">
        <div class="hero text-white hero-bg-image" data-background="{{ $_stisla_bg_home }}">
          <div class="hero-inner">
            <h2>{{ __('Selamat Datang') }}, {{ Auth::user()->name ?? 'Your Name' }} di {{ $_application_name }}</h2>
            <p class="lead">{{ $_app_description }}</p>

            @if (can('Profil') || is_user())
              <div class="mt-4">
                @if (can('Profil'))
                  <a href="{{ route('profile.index') }}" class="btn btn-outline-white btn-lg btn-icon icon-left mb-2">
                    <i class="far fa-user"></i> {{ __('Lihat Profil') }}
                  </a>
                @endif
                @if (is_user() && config('app.is_mobile'))
                  <a href="{{ route('chatting-yuk', ['curhat']) }}" class="btn btn-outline-white btn-lg btn-icon icon-left mb-2">
                    <i class="fa fa-message"></i> {{ __('Curhat') }}
                  </a>
                  <a href="{{ route('chatting-yuk', ['keluhan-penyakit']) }}" class="btn btn-outline-white btn-lg btn-icon icon-left mb-2">
                    <i class="fa fa-message"></i> {{ __('Keluhan Penyakit') }}
                  </a>
                  <a href="{{ route('chatting-yuk', ['pertanyaan-lainnya']) }}" class="btn btn-outline-white btn-lg btn-icon icon-left mb-2">
                    <i class="fa fa-message"></i> {{ __('Pertanyaan Lainnya') }}
                  </a>
                @endif
              </div>
            @endif

          </div>
        </div>
      </div>
    @endif

    <div class="col-12">
      <form action="">
        @csrf
        <div class="row">
          @if (!is_cabang())
            <div class="col-md-6 col-lg-3">
              @php
                $users = \App\Models\User::role(['pusat', 'cabang'])
                    ->select('id', 'name')
                    ->orderBy('name')
                    ->get();
              @endphp
              @include('stisla.includes.forms.selects.select', [
                  'id' => 'filter_assigned_to',
                  'name' => 'filter_assigned_to',
                  'options' => $users->pluck('name', 'id')->toArray(),
                  'label' => 'Assigned To',
                  'required' => false,
                  'with_all' => true,
                  'selected' => request('filter_assigned_to', null),
              ])
            </div>
          @endif
          <div class="col-md-3">
            @include('stisla.includes.forms.inputs.input-date', ['required' => false, 'value' => request('date', null), 'label' => 'Created Date'])
          </div>
          <div class="col-md-6 col-lg-3">
            @php
              $repo = new \App\Repositories\CategoryRepository();
            @endphp
            @include('stisla.includes.forms.selects.select', [
                'id' => 'filter_category',
                'name' => 'filter_category',
                'options' => $repo->getSelectOptions(),
                'label' => 'Category',
                'required' => false,
                'with_all' => true,
                'selected' => request('filter_category', null),
            ])
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary mb-4"><i class="fa fa-filter"></i> Apply Filter</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-12">
      <div class="row">
        @foreach ($statuses as $s)
          @php
            $hrefTo = route('picas.index');
            if ($s->name === 'On Progress') {
                $hrefTo = route('picas.on-progress');
            } elseif ($s->name === 'Need Approval' || $s->name === 'Need Revision') {
                $hrefTo = route('picas.action-needed');
            } elseif ($s->name === 'Done') {
                $hrefTo = route('picas.done');
            }
          @endphp
          <div class="col-lg-4 col-md-4 col-sm-6 col-12" onclick="window.location.href = '{{ $hrefTo }}'">
            {{-- <div class="card card-statistic-1" @if ($item->route ?? false) onclick="openTo('{{ $item->route }}')" style="cursor: pointer;" @endif>
              @if (isset($item->bg_color))
                <div class="card-icon" style="background-color: {{ $item->bg_color }};">
                  <i class="fas fa-{{ $item->icon ?? 'fire' }}"></i>
                </div>
              @else
                <div class="card-icon bg-{{ $item->bg }}">
                  <i class="fas fa-{{ $item->icon ?? 'fire' }}"></i>
                </div>
              @endif
              <div class="card-wrap">
                <div class="card-header">
                  <h4>{{ $s->name ?? 'Nama Modul' }}</h4>
                </div>
                <div class="card-body pb-4">
                  {{ $s->count ?? $loop->iteration . '00' }}
                </div>
              </div>
            </div> --}}
            <div
              style="
                    /* width: 420px; */
                    /* height: 190px; */
                    background: {{ $s->color }};
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    border-radius: 2px;
                    box-sizing: border-box;
                    cursor: pointer;
                    "
              class="mb-3 py-3">
              <div style="font-size: 20px; font-weight: 800; color: #000; line-height: 1;">
                {{ $s->name }}
              </div>
              <div style="margin-top: 18px; font-size: 32px; font-weight: 900; color: #000; line-height: 1;">
                {{ $s->count }} PICA
              </div>
            </div>
          </div>
        @endforeach
        @foreach ($statuses as $s)
          <div class="col-md-2 px-1">
            <div class="card card-{{ $s->type }}" style="border-color: {{ $s->color }};">
              <div class="card-header px-2">
                <h4 class="text-{{ $s->type }}" style="color: {{ $s->color }} !important;">{{ $s->name }}</h4>
                <div class="card-header-action">
                  <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseFilterData{{ $loop->iteration }}" role="button" aria-expanded="false"
                    aria-controls="collapseFilterData{{ $loop->iteration }}">
                    <i class="fa fa-angle-down"></i>
                  </a>
                </div>
              </div>
              <div class="card-body collapse show" style="padding: 0px;" id="collapseFilterData{{ $loop->iteration }}">
                @foreach ($s->picas as $item)
                  <div
                    style="
                        /* width: 520px; */
                        background: #ffffff;
                        border: 1px solid #e6e6e6;
                        border-radius: 8px;
                        padding: 18px 18px 14px 18px;
                        font-family: Arial, Helvetica, sans-serif;
                        position: relative;
                        box-sizing: border-box;
                        overflow: hidden;
                    "
                    class="mb-2">
                    <!-- left accent bar -->
                    <div
                      style="
                        position: absolute;
                        left: 0;
                        top: 0;
                        bottom: 0;
                        width: 10px;
                        background: {{ $s->color }};
                        ">
                    </div>

                    <div style="padding-left: 8px;">
                      <div style="font-size: 11px; line-height: 1.12; color: #000;">
                        <span style="font-weight: 800;">{{ $item->title }}</span>
                        <span style="font-weight: 400;"> - {{ $item->category->name }}</span>
                      </div>

                      <div style="margin-top: 10px; font-size: 10px; line-height: 1.2; color: #000; font-weight: 800;">
                        Assigned to : {{ $item->assignedto->name }}
                      </div>

                      <div style="margin-top: 10px; font-size: 10px; line-height: 1.2; color: #2e8b2e; font-weight: 800;">
                        Deadline : {{ $item->deadline }}
                      </div>

                      <div style="margin-top: 10px; text-align: right; font-size: 8px; color: #000; cursor: pointer;" onclick="window.open('{{ route('picas.show', [$item->id]) }}', '_blank')">
                        Tap for details...
                      </div>
                    </div>
                  </div>
                @endforeach

              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    @foreach ($widgets ?? range(1, 8) as $item)
      <div class="col-lg-3 col-md-3 col-sm-6 col-12">
        <div class="card card-statistic-1" @if ($item->route ?? false) onclick="openTo('{{ $item->route }}')" style="cursor: pointer;" @endif>
          @if (isset($item->bg_color))
            <div class="card-icon" style="background-color: {{ $item->bg_color }};">
              <i class="fas fa-{{ $item->icon ?? 'fire' }}"></i>
            </div>
          @else
            <div class="card-icon bg-{{ $item->bg }}">
              <i class="fas fa-{{ $item->icon ?? 'fire' }}"></i>
            </div>
          @endif
          <div class="card-wrap">
            <div class="card-header">
              <h4>{{ $item->title ?? 'Nama Modul' }}</h4>
            </div>
            <div class="card-body">
              {{ $item->count ?? $loop->iteration . '00' }}
            </div>
          </div>
        </div>
      </div>
    @endforeach

    @if ($user->can('Log Aktivitas'))
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4><i class="fa fa-clock-rotate-left"></i> {{ __('Log Aktivitas Terbaru') }}</h4>

          </div>
          <div class="card-body">
            <div class="table-responsive">

              <table class="table table-striped table-hovered" id="datatable">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">{{ __('Judul') }}</th>
                    <th class="text-center">{{ __('Jenis') }}</th>
                    <th class="text-center">{{ __('Request Data') }}</th>
                    <th class="text-center">{{ __('Before') }}</th>
                    <th class="text-center">{{ __('After') }}</th>
                    <th class="text-center">{{ __('IP') }}</th>
                    <th class="text-center">{{ __('User Agent') }}</th>
                    <th class="text-center">{{ __('Pengguna') }}</th>
                    <th class="text-center">{{ __('Role') }}</th>
                    <th class="text-center">{{ __('Created At') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($logs as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->title }}</td>
                      <td>{{ $item->activity_type }}</td>
                      <td>
                        <textarea style="display: none;" id="rd{{ $item->id }}">{{ json_encode(json_decode($item->request_data), JSON_PRETTY_PRINT) }}</textarea>
                        @include('stisla.includes.forms.buttons.btn-primary', [
                            'data_target' => '#logModal',
                            'data_toggle' => 'modal',
                            'label' => __('Lihat'),
                            'onclick' => "showLogData(this, '#rd" . $item->id . "');",
                            'size' => 'sm',
                        ])
                      </td>
                      <td>
                        <textarea style="display: none;" id="b{{ $item->id }}">{{ json_encode(json_decode($item->before), JSON_PRETTY_PRINT) }}</textarea>
                        @include('stisla.includes.forms.buttons.btn-primary', [
                            'data_target' => '#logModal',
                            'data_toggle' => 'modal',
                            'label' => __('Lihat'),
                            'onclick' => "showLogData(this, '#b" . $item->id . "');",
                            'size' => 'sm',
                        ])
                      </td>
                      <td>
                        <textarea style="display: none;" id="a{{ $item->id }}">{{ json_encode(json_decode($item->after), JSON_PRETTY_PRINT) }}</textarea>
                        @include('stisla.includes.forms.buttons.btn-primary', [
                            'data_target' => '#logModal',
                            'data_toggle' => 'modal',
                            'label' => __('Lihat'),
                            'onclick' => "showLogData(this, '#a" . $item->id . "');",
                            'size' => 'sm',
                        ])
                      </td>
                      <td>{{ $item->ip }}</td>
                      <td>{{ $item->user_agent }}</td>
                      <td>{{ $item->user->name }}</td>
                      <td>
                        @foreach ($item->roles as $role)
                          <span class="badge badge-primary mb-1">{{ $role }}</span>
                        @endforeach
                      </td>
                      @include('stisla.includes.others.td-created-at')
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    @endif


  </div>

  {{-- <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Line Chart</h4>
        </div>
        <div class="card-body">
          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Bar Chart</h4>
        </div>
        <div class="card-body">
          <canvas id="myChart2"></canvas>
        </div>
      </div>
    </div>
  </div> --}}
  <div class="row">
    {{-- <div class="col-12 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Doughnut Chart</h4>
        </div>
        <div class="card-body">
          <canvas id="myChart3"></canvas>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Pie Chart</h4>
        </div>
        <div class="card-body">
          <canvas id="myChart4"></canvas>
        </div>
      </div>
    </div> --}}

    <div class="@if (is_cabang()) col-md-6 @else col-md-12 @endif">
      <div class="card">
        <div class="card-header">
          <h4>PICA</h4>
        </div>
        <div class="card-body">
          <canvas id="barChart"></canvas>
        </div>
      </div>
    </div>
  </div>
@endsection

@include('stisla.activity-logs.components.script')

@push('styles')
  <style>
    .card .card-header h4+.card-header-action .btn,
    .card .card-header h4+.card-header-form .btn {
      font-size: 10px;
      padding-left: 6px !important;
      padding-right: 6px !important;
      padding: 2px 6px !important;
    }
  </style>
@endpush


@push('js')
  <script src="{{ asset('stisla/node_modules/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/page/modules-chartjs.js') }}"></script>
@endpush

@push('scripts')
  <script>
    var ctx = document.getElementById("barChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: @json($cabangLabels),
        datasets: [{
          label: 'Catatan Notulensi Meeting',
          data: @json($cabangs->map(fn($c) => $c->picas->where('category.name', 'Catatan Notulensi Meeting')->count())),
          borderWidth: 2,
          backgroundColor: '#1f8624',
          borderColor: '#1f8624',
          borderWidth: 2.5,
          pointBackgroundColor: '#ffffff',
          pointRadius: 4
        }, {
          label: 'Catatan Supervisi',
          data: @json($cabangs->map(fn($c) => $c->picas->where('category.name', 'Catatan Supervisi')->count())),
          borderWidth: 2,
          backgroundColor: '#aba328',
          borderColor: '#aba328',
          borderWidth: 2.5,
          pointBackgroundColor: '#ffffff',
          pointRadius: 4
        }, {
          label: 'KPI Not Achieve',
          data: @json($cabangs->map(fn($c) => $c->picas->where('category.name', 'KPI Not Achieve')->count())),
          borderWidth: 2,
          backgroundColor: '#6777ef',
          borderColor: '#6777ef',
          borderWidth: 2.5,
          pointBackgroundColor: '#ffffff',
          pointRadius: 4
        }]
      },
      options: {
        legend: {
          display: true
        },
        scales: {
          yAxes: [{
            gridLines: {
              drawBorder: true,
              color: '#f2f2f2',
            },
            ticks: {
              beginAtZero: true,
              stepSize: 150
            }
          }],
          xAxes: [{
            ticks: {
              display: true
            },
            gridLines: {
              display: true
            }
          }]
        },
      }
    });
  </script>
@endpush
