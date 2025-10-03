@php
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
  $isIndex = Route::is('bank-deposits.index');
@endphp

@extends('stisla.layouts.app-datatable')

@section('table')
  @include('stisla.bank-deposits.table')
@endsection

@section('filter_top')
  @if ($isIndex)
    @include('stisla.includes.others.filter-default', ['is_show' => false])
  @endif
@endsection

@section('btn-action-header')
  @if ($isIndex)
    <a class="btn btn-primary  btn-icon icon-left " href="{{ route('bank-deposits.save-to-history') }}" data-toggle="tooltip" title="Simpan Ke Riwayat" data-original-title="Tambah">
      <i class="fa fa-paper-plane"></i>
    </a>
  @endif
@endsection

@section('panel1')
  <div class="card">
    <div class="card-header">
      <h4><i class="fa fa-pencil"></i> Summary</h4>

      <div class="card-header-action">
        @include('stisla.includes.forms.buttons.btn-primary', ['link' => '?status=Aktif', 'label' => 'Aktif', 'icon' => 'fa fa-filter', 'title' => 'Filter Aktif'])
        @include('stisla.includes.forms.buttons.btn-danger', ['link' => '?status=Tidak+Aktif', 'label' => 'Tidak Aktif', 'icon' => 'fa fa-filter', 'title' => 'Filter Tidak Aktif'])
        @include('stisla.bank-deposits.btn-action-header')
      </div>
    </div>
    <div class="card-body">
      {{-- @include('stisla.includes.forms.buttons.btn-datatable') --}}
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive" id="datatable-view">
            <table class="table table-bordered table-striped">
              <tbody>
                <tr>
                  <td style="font-weight: bold;">Total Estimasi</td>
                  <td class="text-right">
                    {{ rp($tot = $data->sum('estimation')) }}
                  </td>
                  <td style="font-weight: bold;">Konvensional</td>
                  <td class="text-right">
                    {{ rp($kon = $data->where($isIndex ? 'bank.bank_type' : 'bankdeposit.bank.bank_type', 'Konvensional')->sum('estimation')) }}
                    ({{ rp($tot == 0 ? 0 : ($kon / $tot) * 100) }}%)
                  </td>
                  <td style="font-weight: bold;">Syariah</td>
                  <td class="text-right">
                    {{ rp($sya = $data->where($isIndex ? 'bank.bank_type' : 'bankdeposit.bank.bank_type', 'Syariah')->sum('estimation')) }}
                    ({{ rp($tot == 0 ? 0 : ($sya / $tot) * 100) }}%)
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: bold;">Total Realisasi</td>
                  <td class="text-right">
                    {{ rp($tot = $data->sum('realization')) }}
                  </td>
                  <td style="font-weight: bold;">Konvensional</td>
                  <td class="text-right">
                    {{ rp($kon = $data->where($isIndex ? 'bank.bank_type' : 'bankdeposit.bank.bank_type', 'Konvensional')->sum('realization')) }}
                    ({{ rp($tot == 0 ? 0 : ($kon / $tot) * 100) }}%)
                  </td>
                  <td style="font-weight: bold;">Syariah</td>
                  <td class="text-right">
                    {{ rp($sya = $data->where($isIndex ? 'bank.bank_type' : 'bankdeposit.bank.bank_type', 'Syariah')->sum('realization')) }}
                    ({{ rp($tot == 0 ? 0 : ($sya / $tot) * 100) }}%)
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: bold;">Total Amount</td>
                  <td class="text-right">
                    {{ rp($tot = $data->sum('amount')) }}
                  </td>
                  <td style="font-weight: bold;">Konvensional</td>
                  <td class="text-right">
                    {{ rp($kon = $data->where($isIndex ? 'bank.bank_type' : 'bankdeposit.bank.bank_type', 'Konvensional')->sum('amount')) }}
                    ({{ rp($tot == 0 ? 0 : ($kon / $tot) * 100) }}%)
                  </td>
                  <td style="font-weight: bold;">Syariah</td>
                  <td class="text-right">
                    {{ rp($sya = $data->where($isIndex ? 'bank.bank_type' : 'bankdeposit.bank.bank_type', 'Syariah')->sum('amount')) }}
                    ({{ rp($tot == 0 ? 0 : ($sya / $tot) * 100) }}%)
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: bold;">Max Amount</td>
                  <td class="text-right">
                    {{ rp($data->max('amount')) }}
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: bold;">Max Estimasi</td>
                  <td class="text-right">
                    {{ rp($data->max('estimation')) }}
                  </td>
                </tr>
                <tr>
                  <td style="font-weight: bold;">Max PA</td>
                  <td class="text-right">
                    {{ rp($data->max('per_anum')) }}%
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  @php
    $isHistory = Route::is('bank-deposit-histories.index');
  @endphp
  @if (!session('toggle_chart'))
    <div class="card">
      <div class="card-header">
        <h4><i class="fa fa-line-chart"></i> Statistik Amount</h4>
        <div class="card-header-action">
          @include('stisla.includes.forms.buttons.btn-primary', ['link' => '?status=Aktif', 'label' => 'Aktif', 'icon' => 'fa fa-filter'])
          @include('stisla.includes.forms.buttons.btn-danger', ['link' => '?status=Tidak+Aktif', 'label' => 'Tidak Aktif', 'icon' => 'fa fa-filter'])
          @include('stisla.bank-deposits.btn-action-header')
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <canvas id="myChart2"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4><i class="fa fa-line-chart"></i> Statistik Estimasi</h4>
        <div class="card-header-action">
          @include('stisla.bank-deposits.btn-action-header')
        </div>
      </div>
      <div class="card-body">
        <canvas id="myChart3"></canvas>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4><i class="fa fa-line-chart"></i> Statistik Per Anum</h4>
        <div class="card-header-action">
          @include('stisla.includes.forms.buttons.btn-primary', ['link' => '?status=Aktif', 'label' => 'Aktif', 'icon' => 'fa fa-filter'])
          @include('stisla.includes.forms.buttons.btn-danger', ['link' => '?status=Tidak+Aktif', 'label' => 'Tidak Aktif', 'icon' => 'fa fa-filter'])
          @include('stisla.bank-deposits.btn-action-header')
        </div>
      </div>
      <div class="card-body">
        <canvas id="myChart4"></canvas>
      </div>
    </div>

    @if ($isHistory)
      <div class="card">
        <div class="card-header">
          <h4><i class="fa fa-line-chart"></i> Statistik Realisasi</h4>
          <div class="card-header-action">
            @include('stisla.includes.forms.buttons.btn-primary', ['link' => '?status=Aktif', 'label' => 'Aktif', 'icon' => 'fa fa-filter'])
            @include('stisla.includes.forms.buttons.btn-danger', ['link' => '?status=Tidak+Aktif', 'label' => 'Tidak Aktif', 'icon' => 'fa fa-filter'])
            @include('stisla.bank-deposits.btn-action-header')
          </div>
        </div>
        <div class="card-body">
          <canvas id="myChart5"></canvas>
        </div>
      </div>
    @endif
  @endif
@endsection

@if (!session('toggle_chart'))
  @push('scripts')
    @php

      $data2 = $data->sortByDesc('amount');
      $chartAmounts = $data2
          ->groupBy($isHistory ? 'bankdeposit.bank_id' : 'bank.id')
          ->map(function ($item) use ($isHistory) {
              return [
                  'bank' => $isHistory ? $item->first()->bankdeposit->bank->name : $item->first()->bank->name,
                  'total_amount' => $item->sum('amount'),
              ];
          })
          ->values();
      $data3 = $data->sortByDesc('estimation');
      $chartEstimations = $data3
          ->groupBy($isHistory ? 'bankdeposit.bank_id' : 'bank.id')
          ->map(function ($item) use ($isHistory) {
              return [
                  'bank' => $isHistory ? $item->first()->bankdeposit->bank->name : $item->first()->bank->name,
                  'total_estimation' => $item->sum('estimation'),
              ];
          })
          ->values();
      $data4 = $data->sortByDesc('per_anum');
      $data5 = $data->sortByDesc('realization');
      $chartRealizations = $data5
          ->groupBy($isHistory ? 'bankdeposit.bank_id' : 'bank.id')
          ->map(function ($item) use ($isHistory) {
              return [
                  'bank' => $isHistory ? $item->first()->bankdeposit->bank->name : $item->first()->bank->name,
                  'total_realization' => $item->sum('realization'),
              ];
          })
          ->values();
    @endphp
    <script>
      var options = {
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
              //   stepSize: 150,
              callback: function(value, index, ticks) {
                return rp(value)
              }
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
        }
      };
      var myChart = new Chart(document.getElementById("myChart2").getContext('2d'), {
        type: 'bar',
        data: {
          labels: {{ Js::from($chartAmounts->pluck('bank')) }},
          datasets: [{
            label: 'Amount',
            data: {{ Js::from($chartAmounts->pluck('total_amount')) }},
            borderWidth: 2,
            backgroundColor: '#6777ef',
            borderColor: '#6777ef',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
          }]
        },
        options: options
      });
      var myChart = new Chart(document.getElementById("myChart3").getContext('2d'), {
        type: 'bar',
        data: {
          labels: {{ Js::from($chartEstimations->pluck('bank')) }},
          datasets: [{
            label: 'Estimasi',
            data: {{ Js::from($chartEstimations->pluck('total_estimation')) }},
            borderWidth: 2,
            backgroundColor: '#6777ef',
            borderColor: '#6777ef',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
          }]
        },
        options: options
      });
      var myChart = new Chart(document.getElementById("myChart4").getContext('2d'), {
        type: 'bar',
        data: {
          labels: {{ Js::from($data2->pluck($isHistory ? 'bankdeposit.bank.name' : 'bank.name')) }},
          datasets: [{
            label: 'Per Anum',
            data: {{ Js::from($data4->pluck('per_anum')) }},
            borderWidth: 2,
            backgroundColor: '#6777ef',
            borderColor: '#6777ef',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
          }]
        },
        options: options
      });
    </script>

    @if ($isHistory)
      <script>
        var myChart = new Chart(document.getElementById("myChart5").getContext('2d'), {
          type: 'bar',
          data: {
            labels: {{ Js::from($chartRealizations->pluck('bank')) }},
            datasets: [{
              label: 'Realisasi',
              data: {{ Js::from($chartRealizations->pluck('total_realization')) }},
              borderWidth: 2,
              backgroundColor: '#6777ef',
              borderColor: '#6777ef',
              borderWidth: 2.5,
              pointBackgroundColor: '#ffffff',
              pointRadius: 4
            }]
          },
          options: options
        });
      </script>
    @endif
  @endpush

  @push('js')
    {{-- <script src="{{ asset('stisla/node_modules/chart.js/dist/Chart.min.js') }}"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.5.0/chart.umd.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    {{-- <script src="{{ asset('stisla/assets/js/page/modules-chartjs.js') }}"></script> --}}
  @endpush

@endif
