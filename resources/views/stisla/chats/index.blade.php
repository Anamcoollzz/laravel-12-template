@php
  $isYajra = $isYajra ?? false;
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
@endphp

@extends('stisla.layouts.app')

@section('title')
  {{ $title }}
@endsection

@section('content')
  @include('stisla.includes.breadcrumbs.breadcrumb-table')
  @include('stisla.includes.others.alert-password')
  {{-- <div class="section-body">
    <h2 class="section-title">{{ $title }}</h2>
    <p class="section-lead">{{ __('Menampilkan halaman ' . $title) }}.</p>
    <div class="row">
      <div class="col-12">

        @yield('filter_top')

        @if ($data->count() > 0 || $isYajra || $isAjaxYajra)
          @if ($canExport)
            <div class="card">
              <div class="card-header">
                <h4><i class="fa fa-print"></i> {!! __('Aksi Ekspor <small>(Server Side)</small>') !!}</h4>
                <div class="card-header-action">
                  @include('stisla.includes.forms.buttons.btn-pdf-download', ['link' => $routePdf . '?' . request()->getQueryString()])
                  @include('stisla.includes.forms.buttons.btn-excel-download', ['link' => $routeExcel . '?' . request()->getQueryString()])
                  @include('stisla.includes.forms.buttons.btn-csv-download', ['link' => $routeCsv . '?' . request()->getQueryString()])
                  @include('stisla.includes.forms.buttons.btn-json-download', ['link' => $routeJson . '?' . request()->getQueryString()])
                </div>
              </div>
            </div>
          @endif

          @yield('panel1')
          @yield('panel2')

          <div class="card">
            <div class="card-header">
              <h4><i class="{{ $moduleIcon }}"></i> Data {{ $title }}</h4>

              <div class="card-header-action">
                @if ($canImportExcel)
                  @include('stisla.includes.forms.buttons.btn-import-excel')
                @endif
                @if ($canCreate)
                  @include('stisla.includes.forms.buttons.btn-add', ['link' => $route_create])
                @endif
                @yield('btn-action-header')
              </div>
            </div>
            <div class="card-body">
              @include('stisla.includes.forms.buttons.btn-datatable')
              <div class="table-responsive" id="datatable-view">
                <input type="hidden" id="isYajra" value="{{ $isYajra }}">
                <input type="hidden" id="isAjax" value="{{ $isAjax }}">
                <input type="hidden" id="isAjaxYajra" value="{{ $isAjaxYajra }}">
                @if ($isYajra || $isAjaxYajra)
                  <textarea name="yajraColumns" id="yajraColumns" cols="30" rows="10" style="display: none;">{!! $yajraColumns !!}</textarea>
                @endif
                @yield('table')
              </div>
            </div>
          </div>
        @else
          @include('stisla.includes.others.empty-state', ['title' => 'Data ' . $title, 'icon' => $moduleIcon, 'link' => $route_create])
        @endif
      </div>

    </div>
  </div> --}}


  <div class="section-body" id="app-chat">
    <h2 class="section-title">Chat Boxes</h2>
    <p class="section-lead">The chat component and is equipped with a JavaScript API, making it easy for you to integrate with Back-end.</p>

    <div class="row align-items-center justify-content-center">
      @if ($_is_superadmin)
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Who's Online?</h4>
            </div>
            <div class="card-body">
              @verbatim
                <ul class="list-unstyled list-unstyled-border">
                  <li class="media" v-for="user1 in users" :key="user1.id" style="cursor: pointer;" v-on:click="changeUser(user1)">
                    <img alt="image" class="mr-3 rounded-circle" width="50" :src="avatar">
                    <div class="media-body">
                      <div class="mt-0 mb-1 font-weight-bold">{{ user1 . name }}</div>
                      <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                    </div>
                  </li>
                </ul>
              @endverbatim
              {{-- <ul class="list-unstyled list-unstyled-border">
              <li class="media">
                <img alt="image" class="mr-3 rounded-circle" width="50" src="{{ url('stisla') }}/assets/img/avatar/avatar-1.png">
                <div class="media-body">
                  <div class="mt-0 mb-1 font-weight-bold">Hasan Basri</div>
                  <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                </div>
              </li>
              <li class="media">
                <img alt="image" class="mr-3 rounded-circle" width="50" src="{{ url('stisla') }}/assets/img/avatar/avatar-2.png">
                <div class="media-body">
                  <div class="mt-0 mb-1 font-weight-bold">Bagus Dwi Cahya</div>
                  <div class="text-small font-weight-600 text-muted"><i class="fas fa-circle"></i> Offline</div>
                </div>
              </li>
              <li class="media">
                <img alt="image" class="mr-3 rounded-circle" width="50" src="{{ url('stisla') }}/assets/img/avatar/avatar-3.png">
                <div class="media-body">
                  <div class="mt-0 mb-1 font-weight-bold">Wildan Ahdian</div>
                  <div class="text-small font-weight-600 text-success"><i class="fas fa-circle"></i> Online</div>
                </div>
              </li>
              <li class="media">
                <img alt="image" class="mr-3 rounded-circle" width="50" src="{{ url('stisla') }}/assets/img/avatar/avatar-4.png">
                <div class="media-body">
                  <div class="mt-0 mb-1 font-weight-bold">Rizal Fakhri</div>
                  <div class="text-small font-weight-600 text-success"><i class="fas fa-circle"></i> Online</div>
                </div>
              </li>
            </ul> --}}
            </div>
          </div>
        </div>
      @endif

      <div class="col-12 @if ($_is_superadmin) col-lg-8 @endif">
        @verbatim
          <div class="card chat-box" id="mychatboxVue">
            <div class="card-header">
              <h4>Chat with {{ user && user . name }}</h4>
            </div>
            <div class="card-body chat-content" tabindex="2" style="overflow: hidden; outline: none">
              <template v-for="chat in messages">
                <div v-if="chat.typing" :key="chat.id" :class="chat.side === 'left' ? 'chat-item chat-left chat-typing' : 'chat-item chat-right chat-typing'" style="">
                  <img :src="chat.avatar" />
                  <div class="chat-details">
                    <div class="chat-text"></div>
                  </div>
                </div>
                <div v-else :key="chat.id" :class="chat.side === 'left' ? 'chat-item chat-left' : 'chat-item chat-right'" style="">
                  <img :src="chat.avatar" />
                  <div class="chat-details">
                    <div class="chat-text">{{ chat . message }}</div>
                    <div class="chat-time">{{ chat . time }}</div>
                  </div>
                </div>
              </template>
            </div>
            <div class="card-footer chat-form">

              <input id="message-chat" type="text" class="form-control" placeholder="Type a message" v-on:keyup.enter.prevent="onSendMessage" v-model="message">
              <button class="btn btn-primary" v-on:click.prevent="onSendMessage">
                <i class="far fa-paper-plane"></i>
              </button>

            </div>
          </div>
        @endverbatim
      </div>

      {{-- <div class="col-12 col-sm-6 col-lg-4">
        <div class="card chat-box card-success" id="mychatbox2">
          <div class="card-header">
            <h4><i class="fas fa-circle text-success mr-2" title="Online" data-toggle="tooltip"></i> Chat with Ryan</h4>
          </div>
          <div class="card-body chat-content">
          </div>
          <div class="card-footer chat-form">
            <form id="chat-form2">
              <input type="text" class="form-control" placeholder="Type a message">
              <button class="btn btn-primary">
                <i class="far fa-paper-plane"></i>
              </button>
            </form>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
@endsection

@push('css')
@endpush

@push('js')
  <!-- Page Specific JS File -->
  <script src="{{ url('stisla') }}/assets/js/page/components-chat-box.js?id=1"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16"></script>
@endpush

@push('scripts')
  <script>
    var vm = new Vue({
      el: '#app-chat',
      data: {
        userLoggedInId: {{ auth_user()->id }},
        avatar: '{{ url('stisla') }}/assets/img/avatar/avatar-1.png',
        users: @json($users),
        user: null,
        message: '',
        messages: [{
            "side": "left",
            "avatar": "http://127.0.0.1:8000/stisla/assets/img/avatar/avatar-1.png",
            "text": "Hi, dude!",
            "time": "09:22"
          },
          {
            "side": "right",
            "avatar": "http://127.0.0.1:8000/stisla/assets/img/avatar/avatar-2.png",
            "text": "Wat?",
            "time": "09:22"
          },
          {
            "side": "left",
            "avatar": "http://127.0.0.1:8000/stisla/assets/img/avatar/avatar-1.png",
            "text": "You wanna know?",
            "time": "09:22"
          },
          {
            "side": "right",
            "avatar": "http://127.0.0.1:8000/stisla/assets/img/avatar/avatar-2.png",
            "text": "Wat?!",
            "time": "09:22"
          },
          {
            "side": "left",
            "avatar": "http://127.0.0.1:8000/stisla/assets/img/avatar/avatar-1.png",
            "text": "",
            "typing": true
          }
        ]

      },
      methods: {
        onSendMessage: function() {
          var self = this;
          if (this.message.trim().length > 0) {
            // this.messages.push({
            //   side: 'right',
            //   avatar: '{{ url('stisla') }}/assets/img/avatar/avatar-2.png',
            //   text: this.message || $('#message-chat').val(),
            //   time: new Date().toLocaleTimeString()
            // });
            // this.message = '';
            axios.post('{{ url('chats') }}', {
              to_user_id: self.user.id, // for demo purpose, send to user id 1
              message: this.message || $('#message-chat').val()
            }, {
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
              }
            }).then(function(response) {
              self.message = '';
              console.log(response.data);
              self.fetchList();
            });
          }
        },
        fetchList: function() {
          var self = this;
          axios.get('{{ url('chats') }}', {
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Content-Type': 'application/json',
              'X-Requested-With': 'XMLHttpRequest'
            },
            params: {
              to_user_id: self.user.id
            }
          }).then(function(response) {
            if (response.data.status === 'success') {
              console.log(response.data.data);
              if (self.message.length != response.data.data.length) {
                self.messages = response.data.data;
                // scroll to bottom
                var chatContent = document.querySelector('.chat-content');
                chatContent.scrollTop = chatContent.scrollHeight;
                // process response.data.data
              } else if (response.data.data.length === 0) {
                self.messages = [];
              }
            }
          });
        },
        changeUser: function(user) {
          if (user.id === this.user.id) return;
          this.user = user;
          this.messages = [];
          this.fetchList();
        }
      },
      mounted: function() {
        @if ($_is_superadmin)
          if (this.users.length > 0) {
            this.user = this.users[0];
            this.fetchList();
            setInterval(() => {
              this.fetchList();
            }, 5000)
          }
        @else
          this.user = {
            name: 'Admin'
          }
          this.fetchList();
          setInterval(() => {
            this.fetchList();
          }, 5000)
        @endif
      }
    });
  </script>
@endpush

@push('modals')
  {{-- @if ($canImportExcel)
    @include('stisla.includes.modals.modal-import-excel', [
        'formAction' => $routeImportExcel,
        'downloadLink' => $routeExampleExcel,
    ])
  @endif

  @if ($canCreate)
    @include('stisla.includes.modals.modal-form', [
        'formAction' => $routeImportExcel,
        'downloadLink' => $routeExampleExcel,
    ])
  @endif --}}
@endpush
