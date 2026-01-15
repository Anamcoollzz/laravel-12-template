<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riwayat Pemesanan - Mobil Siaga Desa Sendangsari</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ $_favicon ?? asset('favicon.ico') }}" type="image/x-icon">
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: "#0f766e",
            secondary: "#0d9488",
          },
        },
      },
    };
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    .status-menunggu {
      @apply bg-yellow-100 text-yellow-800;
    }

    .status-disetujui {
      @apply bg-green-100 text-green-800;
    }

    .status-ditolak {
      @apply bg-red-100 text-red-800;
    }

    .status-selesai {
      @apply bg-blue-100 text-blue-800;
    }
  </style>
</head>

<body class="bg-gray-50 min-h-screen">
  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div class="flex items-center gap-2 cursor-pointer" onclick="window.location.href = '/'">
        <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">
          DS
        </div>
        <div>
          <h1 class="text-lg font-bold text-gray-800">Mobil Siaga Desa</h1>
          <p class="text-xs text-gray-600">Sendangsari, Bener, Purworejo</p>
        </div>
      </div>

      <!-- Tombol Aksi -->
      <div id="actionButtons" class="flex flex-wrap gap-2 justify-center">
        <!-- Tombol Pemesanan Baru -->
        <button id="btnPesan" onclick="handlePesan()"
          class="bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow">
          <i class="fas fa-plus mr-1"></i> Pemesanan Baru
        </button>
        <!-- Login / Logout -->
        <button id="authBtn" onclick="toggleAuth()" class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
          <i class="fas fa-sign-in-alt mr-1"></i> Login
        </button>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container mx-4 sm:mx-auto px-0 sm:px-4 py-8 max-w-4xl">

    @if (session('success'))
      <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-800 rounded-lg flex items-center gap-3">
        <i class="fas fa-check-circle text-lg"></i>
        <div>
          <p class="font-medium">Berhasil!</p>
          <p class="text-sm">{{ session('success') }}</p>
        </div>
        <button onclick="this.parentElement.style.display='none'" class="ml-auto text-green-800 hover:text-green-900">
          <i class="fas fa-times"></i>
        </button>
      </div>
    @endif

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
      <div class="p-5 border-b">
        <h2 class="text-xl font-bold text-gray-800">
          Riwayat Pemesanan Anda
        </h2>
        <p class="text-sm text-gray-600 mt-1">
          Daftar permohonan mobil siaga yang pernah Anda ajukan
        </p>
      </div>

      <!-- Tabel Riwayat -->
      <!-- Tabel Riwayat (dengan overflow horizontal yang benar) -->
      <div id="historyTable" class="overflow-x-auto px-4 md:px-0">
        <table class="min-w-full text-sm text-left text-gray-700">
          <thead class="bg-gray-50 text-xs uppercase">
            <tr>
              <th class="px-4 py-3 whitespace-nowrap">No</th>
              <th class="px-4 py-3 whitespace-nowrap">Tanggal Penggunaan</th>
              <th class="px-4 py-3 whitespace-nowrap">Jenis Mobil</th>
              <th class="px-4 py-3 whitespace-nowrap">Tujuan</th>
              <th class="px-4 py-3 whitespace-nowrap">Status</th>
            </tr>
          </thead>
          <tbody class="divide-y">
            @foreach ($data as $item)
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                <td class="px-4 py-3">{{ $item->tgl_penggunaan }}</td>
                <td class="px-4 py-3">{{ $item->car_type }}</td>
                <td class="px-4 py-3">{{ $item->alamat_tujuan }}</td>
                <td class="px-4 py-3">
                  <span class="px-2 py-1 rounded-full text-xs font-medium status-{{ strtolower($item->status) }}">{{ $item->status }}</span>
                </td>
              </tr>
            @endforeach
            @if ($data->isEmpty())
              <tr>
                <td colspan="5" class="px-4 py-12 text-center">
                  <i class="fas fa-inbox text-4xl text-gray-300 mb-3 block"></i>
                  <p class="text-gray-500 font-medium">Belum ada riwayat pemesanan</p>
                  <p class="text-sm text-gray-400 mt-1">Mulai dengan membuat pemesanan baru untuk mobil siaga desa</p>
                  <button onclick="handlePesan()" class="mt-4 bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                    <i class="fas fa-plus mr-1"></i> Buat Pemesanan
                  </button>
                </td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>

      <!-- Info Jika Belum Login -->
      <div id="loginPrompt" class="p-6 text-center text-gray-600 hidden">
        <i class="fas fa-lock text-3xl mb-3 text-gray-400"></i>
        <p class="font-medium">
          Silakan login untuk melihat riwayat pemesanan Anda
        </p>
        <p class="text-sm mt-1">
          Data riwayat hanya tersedia untuk warga yang telah terdaftar
        </p>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6 mt-12">
    <div class="container mx-auto px-4 text-center">
      <p class="font-medium">Desa Sendangsari</p>
      <p class="text-gray-400 text-sm mt-1">
        Kec. Bener, Kab. Purworejo, Jawa Tengah
      </p>
      <p class="text-gray-500 text-xs mt-3">
        © 2026 Program Mobil Siaga Desa
      </p>
    </div>
  </footer>

  <script>
    // Simulasi login state
    let isLoggedIn = false;

    function updateUI() {
      const authBtn = document.getElementById("authBtn");
      const loginPrompt = document.getElementById("loginPrompt");
      const historyTable = document.getElementById("historyTable");
      const btnPesan = document.getElementById("btnPesan");

      if (isLoggedIn) {
        // Sudah login
        authBtn.innerHTML = '<i class="fas fa-sign-out-alt mr-1"></i> Logout';
        authBtn.onclick = logout;
        loginPrompt.classList.add("hidden");
        historyTable.classList.remove("hidden");
        // Ubah warna tombol pesan jadi solid
        btnPesan.classList.replace("from-primary", "from-emerald-600");
        btnPesan.classList.replace("to-secondary", "to-emerald-700");
      } else {
        // Belum login
        authBtn.innerHTML = '<i class="fas fa-sign-in-alt mr-1"></i> Login';
        authBtn.onclick = showLogin;
        loginPrompt.classList.remove("hidden");
        historyTable.classList.add("hidden");
        // Kembalikan warna awal
        btnPesan.classList.replace("from-emerald-600", "from-primary");
        btnPesan.classList.replace("to-emerald-700", "to-secondary");
      }
    }

    function handlePesan() {
      if (isLoggedIn) {
        // Di sistem nyata: window.location.href = 'form-pemesanan.html';
        //   alert("✅ Anda akan diarahkan ke halaman pemesanan baru!");
        // Simulasi: buka form pemesanan
        window.location.href = "{{ route('siaga-desa.order-form') }}";
      } else {
        if (
          confirm(
            "Anda perlu login terlebih dahulu untuk memesan. Lanjutkan ke login?"
          )
        ) {
          showLogin();
        }
      }
    }

    function showLogin() {
      // alert("Arahkan ke halaman login...\n(Klik OK untuk demo login)");
      isLoggedIn = true;
      updateUI();
    }

    function logout() {
      if (confirm("Yakin ingin keluar?")) {
        isLoggedIn = false;
        updateUI();
        window.location.href = "{{ route('siaga-desa.logout-get') }}";
      }
    }

    function toggleAuth() {
      if (isLoggedIn) {
        logout();
      } else {
        showLogin();
      }
    }

    toggleAuth();

    // Inisialisasi
    updateUI();
  </script>
</body>

</html>
