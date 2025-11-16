@php
  $isYajra = $isYajra ?? false;
  $isAjax = $isAjax ?? false;
  $isAjaxYajra = $isAjaxYajra ?? false;
  $cat = ucwords(implode(' ', explode('-', $category)));
@endphp

@extends($_is_superadmin ? 'stisla.layouts.app' : 'stisla.layouts.app-top-nav')

@section('title')
  {{ $title }}
@endsection

@section('content')
  {{-- <div class="section-header">
    <h1>{{ $title }} ({{ $cat }})</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Chat</a></div>
      <div class="breadcrumb-item">{{ $cat }}</div>
    </div>
  </div> --}}
  {{-- @include('stisla.includes.breadcrumbs.breadcrumb-table')
  @include('stisla.includes.others.alert-password') --}}
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
    @if (is_superadmin())
      {{-- <h2 class="section-title">Chating Yuk</h2>
      <p class="section-lead">Menampilkan percakapan yang sedang berlangsung.</p> --}}
    @endif

    @if (is_user() && config('app.is_mobile'))
      <a href="{{ route('dashboard.index') }}" class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Kembali Ke Beranda</a>
      <a href="#" onclick="if(confirm('Anda yakin?')) { location.href='{{ route('chatting-yuk-delete', $category) }}'; }" class="btn btn-danger btn-icon mb-3"><i class="fa fa-trash"></i> Hapus
        Riwayat Chat</a>
    @elseif(is_user() && is_desktop())
      <a href="{{ route('dashboard.index') }}" class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Kembali Ke Beranda</a>
      <a href="#" onclick="if(confirm('Anda yakin?')) { location.href='{{ route('chatting-yuk-delete', $category) }}'; }" class="btn btn-danger btn-icon mb-3"><i class="fa fa-trash"></i> Hapus
        Riwayat Chat</a>
    @endif

    <div class="row align-items-center justify-content-center">
      @if ($_is_superadmin)
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="card">
            @verbatim
              <div class="card-header">
                <h4>Pengguna ({{ users . length }})</h4>
              </div>
            @endverbatim
            <div class="card-body">
              @verbatim
                <input v-if="users2.length > 5" type="text" class="form-control mb-3" placeholder="Cari Pengguna" v-model="searchUser"
                  v-on:input="users = users2.filter(u => u.name.toLowerCase().includes(searchUser.toLowerCase()))">
                <ul class="list-unstyled list-unstyled-border" style="max-height: 400px; overflow: auto;">
                  <li class="media" v-for="user1 in users" :key="user1.id" style="cursor: pointer;" v-on:click="changeUser(user1)">
                    <img alt="image" class="mr-3 rounded-circle" width="50" :src="(user1 && user1.avatar_url) || avatar">
                    <div class="media-body">
                      <div class="mt-0 mb-1 font-weight-bold">{{ user1 . name }}</div>
                      <div :class="user1.is_online ? 'text-success text-small font-600-bold' : 'text-danger text-small font-600-bold'">
                        <i class="fas fa-circle"></i>
                        {{ user1 . is_online ? 'Online' : 'Offline' }}
                      </div>
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

      <div class="col-12 @if ($_is_superadmin) col-lg-9 @endif">
        @verbatim
          <div class="card chat-box" id="mychatboxVue">
            <div class="card-header">
              <h4>Chat dengan {{ user && user . name }}</h4>
            </div>
            <div class="card-body chat-content" tabindex="2" style="overflow: hidden; outline: none; height: 450px;">
              <template v-for="chat in messages">
                <div v-if="chat.typing" :key="chat.id" :class="chat.side === 'left' ? 'chat-item chat-left chat-typing' : 'chat-item chat-right chat-typing'" style="">
                  <img :src="avatar" />
                  <div class="chat-details">
                    <div class="chat-text"></div>
                  </div>
                </div>
                <div v-else :key="chat.id" :class="chat.side === 'left' ? 'chat-item chat-left' : 'chat-item chat-right'" style="">
                  <img :src="chat.side === 'left' ? (!isSuperAdmin ? avatar : user.avatar_url) : (chat.avatar || avatar)" />
                  <div class="chat-details">
                    <div class="chat-text" v-if="chat.file_path">
                      <a :class="{ 'text-white': chat.side === 'right' }" :href="chat.file_url" target="_blank">
                        <i class="fa fa-paperclip"></i>
                        Lihat File
                      </a>
                    </div>
                    <div class="chat-text" v-else>{{ chat . message }}</div>
                    <div class="chat-time">{{ chat . time }}</div>
                  </div>
                </div>
              </template>
            </div>
            <div class="card-footer chat-form">

              <input id="message-chat" type="text" class="form-control" placeholder="Type a message" v-on:keyup.enter.prevent="onSendMessage" v-model="message">
              <button class="btn btn-info" v-on:click.prevent="onAttachFile" style="right: 40px;">
                <i class="fa fa-paperclip"></i>
              </button>
              <button class="btn btn-primary" v-on:click.prevent="onSendMessage">
                <i class="far fa-paper-plane"></i>
              </button>

            </div>
            <input type="file" id="chat-file-input" style="display: none;" v-on:change="onFileSelected" accept="image/*" />
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
  <script src="{{ config('stisla.chat_base_url') }}/socket.io/socket.io.js"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/js-md5@0.8.3/src/md5.min.js"></script> --}}
  <script src="{{ url('stisla') }}/assets/js/page/components-chat-box.js?id=1"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16"></script>
@endpush

@push('scripts')
  <script>
    var vm = new Vue({
      el: '#app-chat',
      data: {
        userLoggedInId: {{ auth_user()->id }},
        isSuperAdmin: {{ $_is_superadmin ? 'true' : 'false' }},
        roomId: '{{ $roomId }}',
        avatar: '{{ url('stisla') }}/assets/img/avatar/avatar-1.png',
        users: @json($users),
        users2: @json($users),
        searchUser: '',
        socket: null,
        user: null,
        message: '',
        category: '{{ $category ?? '' }}',
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
              //   to_user_id: self.user.id, // for demo purpose, send to user id 1
              uuid: self.user.uuid,
              message: this.message || $('#message-chat').val(),
              category: self.category
            }, {
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
              }
            }).then(function(response) {
              self.getUsers();
              //   console.log(response.data);
              self.socket.emit('sendMessage', {
                roomId: self.roomId,
                content: self.message,
              });
              self.message = '';
              //   self.fetchList();
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
              //   to_user_id: self.user.id,
              uuid: self.user.uuid,
              category: self.category
            }
          }).then(function(response) {
            if (response.data.status === 'success') {
              //   console.log(response.data.data);
              if (self.message.length != response.data.data.length) {
                self.messages = response.data.data;
                // scroll to bottom
                setTimeout(() => {
                  var chatContent = document.querySelector('.chat-content');
                  chatContent.scrollTop = chatContent.scrollHeight;
                }, 500);
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
          this.getRoomId().then((roomId) => {
            this.roomId = roomId;
            this.fetchList();
          });
        },
        getRoomId: function(cb) {
          let self = this;
          return axios.get('{{ url('chats/get-room-id') }}', {
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Content-Type': 'application/json',
              'X-Requested-With': 'XMLHttpRequest'
            },
            params: {
              //   to_user_id: self.user.id
              uuid: self.user.uuid
            }
          }).then(function(response) {
            if (response.data.success) {
              self.roomId = response.data.roomId;
              self.socket.emit('leaveRoom', self.roomId);
              console.log('Joining room', response.data.roomId);
              self.socket.emit('joinRoom', response.data.roomId);
              return Promise.resolve(response.data.roomId)
            }
          });
        },
        getUsers: function() {
          let self = this;
          return axios.get('{{ url('chatting-yuk-users') }}', {
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Content-Type': 'application/json',
              'X-Requested-With': 'XMLHttpRequest'
            }
          }).then(function(response) {
            if (response.data.status === 'success') {
              console.log('users refreshed');
              self.users = response.data.data;
              self.users2 = response.data.data.map(user => Object.assign({}, user));
            }
          });
        },
        onAttachFile: function() {
          document.getElementById('chat-file-input').click();
        },
        onFileSelected: function(event) {
          var self = this;
          var file = event.target.files[0];
          if (file) {
            var formData = new FormData();
            // formData.append('to_user_id', self.user.id);
            formData.append('uuid', self.user.uuid);
            formData.append('category', self.category);
            formData.append('file', file);

            axios.post('{{ url('chats') }}', formData, {
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'multipart/form-data',
                'X-Requested-With': 'XMLHttpRequest'
              }
            }).then(function(response) {
              if (response.data.status === 'success') {
                self.getUsers();
                self.socket.emit('sendMessage', {
                  roomId: self.roomId,
                  content: '[File] ' + response.data.file_name,
                });
                //   self.fetchList();
              }
            });
          }
        }
      },
      mounted: function() {
        @if ($_is_superadmin)
          if (this.users.length > 0) {
            this.user = this.users[0];
            this.getRoomId().then((roomId) => {
              //   this.roomId = roomId;
              this.fetchList();
            });
            // this.fetchList();
            // setInterval(() => {
            //   this.fetchList();
            // }, 5000)
          }
        @else
          this.user = {
            name: 'Admin'
          }
          this.fetchList();
          //   setInterval(() => {
          //     this.fetchList();
          //   }, 5000)
        @endif

        this.socket = io('{{ config('stisla.chat_base_url') }}', {
          auth: {
            // token: window.token
          }
        });
        // var hash = md5.create();
        console.log('roomId', this.roomId);
        this.socket.on('connect', () => {
          if (this.roomId) {
            this.socket.emit('joinRoom', this.roomId);
            @if (is_user())
              this.socket.emit('sendMessage', {
                roomId: this.roomId,
                content: 'refreshUsers',
              });
            @endif

          }
        });

        this.socket.on('message', (m) => {
          console.log('message received', m);
          if (m.roomId === this.roomId) {
            console.log('message added', m);
            this.fetchList()
            @if ($_is_superadmin)
              this.getUsers()
            @endif
          };

          @if (is_superadmin())
            if (m.content === 'refreshUsers') {
              this.getUsers();
            }
          @endif
        });
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
