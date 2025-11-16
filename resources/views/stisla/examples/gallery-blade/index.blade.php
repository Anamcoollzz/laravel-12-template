@extends('stisla.layouts.app')

@section('title')
  {{ $title = 'Galeri' }}
@endsection

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>{{ $title }}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a>
        </div>
        <div class="breadcrumb-item">{{ $title }}</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Gallery</h2>
      <p class="section-lead">Grouping multiple images on one component.</p>

      <div class="row">
        <div class="col-12 col-sm-12 col-lg-4">
          <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Gallery</h4>
                </div>
                <div class="card-body">
                  <div class="gallery">
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img01.jpg" data-title="Image 1"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img02.jpg" data-title="Image 2"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img03.jpg" data-title="Image 3"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img04.jpg" data-title="Image 4"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img05.jpg" data-title="Image 5"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img06.jpg" data-title="Image 6"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img07.jpg" data-title="Image 7"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img08.jpg" data-title="Image 8"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Gallery</h4>
                </div>
                <div class="card-body">
                  <div class="gallery">
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img05.jpg" data-title="Image 1"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img08.jpg" data-title="Image 2"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img04.jpg" data-title="Image 3"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img11.jpg" data-title="Image 4"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img02.jpg" data-title="Image 5"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img05.jpg" data-title="Image 6"></div>
                    <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img03.jpg" data-title="Image 7"></div>
                    <div class="gallery-item gallery-more" data-image="{{ asset('stisla/assets') }}/img/news/img02.jpg" data-title="Image 8">
                      <div>+2</div>
                    </div>
                    <div class="gallery-item gallery-hide" data-image="{{ asset('stisla/assets') }}/img/news/img11.jpg" data-title="Image 9"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Gallery <code>.gallery-md</code></h4>
            </div>
            <div class="card-body">
              <div class="gallery gallery-md">
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img03.jpg" data-title="Image 1"></div>
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img14.jpg" data-title="Image 2"></div>
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img08.jpg" data-title="Image 3"></div>
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img05.jpg" data-title="Image 4"></div>
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img11.jpg" data-title="Image 5"></div>
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img09.jpg" data-title="Image 6"></div>
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img12.jpg" data-title="Image 8"></div>
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img13.jpg" data-title="Image 9"></div>
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img14.jpg" data-title="Image 10"></div>
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img15.jpg" data-title="Image 11"></div>
                <div class="gallery-item gallery-more" data-image="{{ asset('stisla/assets') }}/img/news/img08.jpg" data-title="Image 12">
                  <div>+2</div>
                </div>
                <div class="gallery-item gallery-hide" data-image="{{ asset('stisla/assets') }}/img/news/img01.jpg" data-title="Image 9"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Gallery <code>.gallery-fw</code></h4>
            </div>
            <div class="card-body">
              <div class="gallery gallery-fw" data-item-height="100">
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img09.jpg" data-title="Image 1"></div>
                <div class="gallery-item" data-image="{{ asset('stisla/assets') }}/img/news/img10.jpg" data-title="Image 2"></div>
                <div class="gallery-item gallery-more" data-image="{{ asset('stisla/assets') }}/img/news/img08.jpg" data-title="Image 3">
                  <div>+2</div>
                </div>
                <div class="gallery-item gallery-hide" data-image="{{ asset('stisla/assets') }}/img/news/img01.jpg" data-title="Image 4"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('js')
  <script src="{{ asset('stisla') }}/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
@endpush

@push('css')
  <link rel="stylesheet" href="{{ asset('stisla') }}/node_modules/chocolat/dist/css/chocolat.css">
@endpush
