@php
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
@endphp

@extends('stisla.layouts.app-table')

@section('title')
  {{ $title = 'Sidik Jari X105-ID' }}
@endsection

@section('content')
  @include('stisla.includes.breadcrumbs.breadcrumb-table')
  <div class="section-body">
    <h2 class="section-title">{{ $title }}</h2>
    <p class="section-lead">{{ __('Menampilkan halaman ' . $title) }}.</p>
    <div class="row">
      <div class="col-12">
        @php
          $IP = request('ip');
          $Key = request('key');
          $id = request('id');
          $fn = request('fn');

          if ($IP == '') {
              $IP = '192.168.1.201';
          }
          if ($Key == '') {
              $Key = '0';
          }
          if ($id == '') {
              $id = '1';
          }
          if ($fn == '') {
              $fn = '0';
          }
        @endphp

        <div class="card">
          <div class="card-header">
            <h4><i class="{{ $moduleIcon }}"></i> Data {{ $title }}</h4>
          </div>
          <div class="card-body">

            <form action="" method="get">
              <div class="row">
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', ['id' => 'ip', 'label' => 'IP Address', 'value' => $IP])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', ['id' => 'key', 'label' => 'Comm Key', 'value' => $Key])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', ['id' => 'id', 'label' => 'User ID', 'value' => $id])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', ['id' => 'fn', 'label' => 'Finger No', 'value' => $fn])
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>


        @if (request('ip') && !session('errorMessage'))
          <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
              <table cellspacing="2" cellpadding="2" border="1" class="table table-striped table-hover">
                <tr align="center">
                  <td><B>UserID</B></td>
                  <td width="200"><B>FingerID</B></td>
                  <td><B>Size</B></td>
                  <td><B>Valid</B></td>
                  <td align="left"><B>Template</B></td>
                </tr>

                <?php

                       for($a=0;$a<count($buffer);$a++){
                        $data=Parse_Data($buffer[$a],"<Row>","</Row>");
                        $PIN=Parse_Data($data,"<PIN>","</PIN>");
                        $FingerID=Parse_Data($data,"<FingerID>","</FingerID>");
                        $Size=Parse_Data($data,"<Size>","</Size>");
                        $Valid=Parse_Data($data,"<Valid>","</Valid>");
                        $Template=Parse_Data($data,"<Template>","</Template>");?>
                <tr align="center">
                  <td><?= $PIN ?></td>
                  <td><?= $FingerID ?></td>
                  <td><?= $Size ?></td>
                  <td><?= $Valid ?></td>
                  <td><?= $Template ?></td>
                </tr>
                <?php }?>
              </table>
            </div>
          </div>
        @endif

      </div>

    </div>
  </div>
@endsection
