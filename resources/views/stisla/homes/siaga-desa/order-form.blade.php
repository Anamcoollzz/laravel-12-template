<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pesan Mobil Siaga - Desa Sendangsari</title>
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
          animation: {
            float: "float 6s ease-in-out infinite",
          },
          keyframes: {
            float: {
              "0%, 100%": {
                transform: "translateY(0px)"
              },
              "50%": {
                transform: "translateY(-10px)"
              },
            },
          },
        },
      },
    };
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    .form-card {
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
        0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .step-active {
      @apply border-primary text-primary font-bold;
    }

    .step-done {
      @apply bg-primary text-white;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-teal-50 to-emerald-50 min-h-screen flex items-center justify-center p-4">
  <!-- Ilustrasi Mobil (Opsional - Background Element) -->
  <div class="absolute top-10 right-10 text-primary opacity-10 animate-float">
    <i class="fas fa-car fa-5x"></i>
  </div>
  <div class="absolute bottom-10 left-10 text-primary opacity-10 animate-float" style="animation-delay: 2s">
    <i class="fas fa-ambulance fa-4x"></i>
  </div>

  <!-- Form Card -->
  <div class="bg-white rounded-2xl form-card w-full max-w-2xl overflow-hidden">
    <!-- Header -->
    <div class="bg-primary text-white p-6 text-center relative">
      <h1 class="text-2xl font-bold flex items-center justify-center gap-2">
        <i class="fas fa-calendar-plus"></i> Pesan Mobil Siaga
      </h1>
      <p class="text-teal-100 text-sm mt-1">
        Desa Sendangsari, Kec. Bener, Kab. Purworejo
      </p>

      <!-- Progress Steps -->
      <!-- <div class="flex justify-between max-w-md mx-auto mt-4">
          <div class="flex flex-col items-center">
            <div
              class="w-8 h-8 rounded-full bg-white text-primary flex items-center justify-center text-sm step-done"
            >
              1
            </div>
            <span class="text-xs mt-1">Data Diri</span>
          </div>
          <div class="flex flex-col items-center">
            <div
              class="w-8 h-8 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center text-sm step-active"
            >
              2
            </div>
            <span class="text-xs mt-1">Rute</span>
          </div>
          <div class="flex flex-col items-center">
            <div
              class="w-8 h-8 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center text-sm"
            >
              3
            </div>
            <span class="text-xs mt-1">Mobil</span>
          </div>
          <div class="flex flex-col items-center">
            <div
              class="w-8 h-8 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center text-sm"
            >
              4
            </div>
            <span class="text-xs mt-1">Konfirmasi</span>
          </div>
        </div> -->
    </div>

    <!-- Form Content -->
    <div class="p-6">
      <form id="pemesananForm" class="space-y-5" action="" method="POST">
        @csrf
        <!-- Nama & HP -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" placeholder="Contoh: Budi Santoso" value="{{ old('nama_lengkap', Auth::user()->name) }}"
              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
            <input type="tel" name="nomor_hp" placeholder="081234567890" value="{{ old('nomor_hp', Auth::user()->phone_number) }}"
              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required />
          </div>
        </div>

        <!-- Lokasi Keberangkatan -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">📍 Lokasi Keberangkatan</label>
          <input type="text" name="lokasi_keberangkatan" placeholder="Contoh: Dusun Gembong, RT 02/RW 01" value="{{ old('lokasi_keberangkatan', Auth::user()->dusun_rt_rw) }}"
            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required />
          <p class="text-xs text-gray-500 mt-1">
            Pastikan lokasi mudah dijangkau oleh mobil siaga
          </p>
        </div>

        <!-- Alamat Tujuan -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">🏁 Alamat Tujuan Layanan</label>
          <select id="alamatTujuan" name="alamat_tujuan" onchange="toggleOtherInput(this.value)"
            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
            <option value="">-- Pilih Tujuan --</option>
            <option value="Puskesmas Bener" {{ old('alamat_tujuan') == 'Puskesmas Bener' ? 'selected' : '' }}>Puskesmas Bener</option>
            <option value="Puskesmas Maron" {{ old('alamat_tujuan') == 'Puskesmas Maron' ? 'selected' : '' }}>Puskesmas Maron</option>
            <option value="RSUD dr. Tjitrowardojo, Purworejo" {{ old('alamat_tujuan') == 'RSUD dr. Tjitrowardojo, Purworejo' ? 'selected' : '' }}>
              RSUD dr. Tjitrowardojo, Purworejo
            </option>
            <option value="RSUD Kebumen" {{ old('alamat_tujuan') == 'RSUD Kebumen' ? 'selected' : '' }}>RSUD Kebumen</option>
            <option value="lainnya" {{ old('alamat_tujuan') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
          </select>
        </div>

        <!-- Input "Lainnya" -->
        <div id="otherAlamatContainer" class="{{ old('alamat_tujuan') == 'lainnya' ? '' : 'hidden' }}">
          <label class="block text-sm font-medium text-gray-700 mb-1">Jika lainnya, tulis alamat lengkap:</label>
          <textarea id="alamatLainnya" name="alamat_lainnya" rows="2" placeholder="Contoh: Jl. Ahmad Yani No. 45, Kec. Loano, Kab. Purworejo"
            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">{{ old('alamat_lainnya') }}</textarea>
        </div>

        <!-- Jenis Mobil -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">🚗 Jenis Mobil yang Dibutuhkan</label>
          <div class="grid grid-cols-2 gap-3">
            <label class="flex items-center gap-2 p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
              <input type="radio" name="jenis_mobil" value="ambulans" class="text-primary" {{ old('jenis_mobil') == 'ambulans' ? 'checked' : '' }} required />
              <span><i class="fas fa-ambulance text-red-500"></i> Ambulans</span>
            </label>
            <label class="flex items-center gap-2 p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
              <input type="radio" name="jenis_mobil" value="logistik" class="text-primary" {{ old('jenis_mobil') == 'logistik' ? 'checked' : '' }} required />
              <span><i class="fas fa-truck"></i> Logistik</span>
            </label>
            <label class="flex items-center gap-2 p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
              <input type="radio" name="jenis_mobil" value="antarjemput" class="text-primary" {{ old('jenis_mobil') == 'antarjemput' ? 'checked' : '' }} required />
              <span><i class="fas fa-users"></i> Antar-Jemput</span>
            </label>
            <label class="flex items-center gap-2 p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
              <input type="radio" name="jenis_mobil" value="lainnya" class="text-primary" {{ old('jenis_mobil') == 'lainnya' ? 'checked' : '' }} required />
              <span><i class="fas fa-ellipsis-h"></i> Lainnya</span>
            </label>
          </div>
        </div>

        <!-- Tanggal & Waktu -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">🗓️ Tanggal Penggunaan</label>
            <input type="date" name="tanggal_penggunaan" value="{{ old('tanggal_penggunaan') }}"
              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" min="" required />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">⏰ Perkiraan Waktu</label>
            <input type="time" name="waktu_penggunaan" value="{{ old('waktu_penggunaan') }}"
              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required />
          </div>
        </div>

        <!-- Catatan Tambahan -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">📝 Catatan Tambahan</label>
          <textarea name="catatan_tambahan" placeholder="Contoh: Pasien lansia, butuh kursi roda" rows="2"
            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">{{ old('catatan_tambahan') }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit"
          class="w-full bg-gradient-to-r from-primary to-secondary text-white font-bold py-3.5 rounded-lg hover:from-secondary hover:to-primary transition-all duration-300 shadow-lg">
          <i class="fas fa-paper-plane mr-2"></i> Ajukan Permohonan Sekarang
        </button>
      </form>
    </div>

    <!-- Footer Info -->
    <div class="bg-gray-50 px-6 py-3 text-center text-xs text-gray-600 border-t">
      <p>
        Respons dalam 1 jam • Gratis untuk kebutuhan darurat • Didukung
        Pemerintah Desa Sendangsari
      </p>
    </div>
  </div>

  <script>
    // Set min date to today
    document.addEventListener("DOMContentLoaded", () => {
      const today = new Date().toISOString().split("T")[0];
      document.querySelector('input[type="date"]').setAttribute("min", today);
    });

    function toggleOtherInput(value) {
      const container = document.getElementById("otherAlamatContainer");
      if (value === "lainnya") {
        container.classList.remove("hidden");
      } else {
        container.classList.add("hidden");
      }
    }

    document
      .getElementById("pemesananForm")
      .addEventListener("submit", function(e) {
        // e.preventDefault();
        // alert(
        //   "✅ Permohonan berhasil diajukan!\n\nTim Mobil Siaga Desa Sendangsari akan segera menghubungi Anda via WhatsApp atau telepon dalam 1 jam."
        // );
        // Di sistem nyata: kirim ke backend
      });
  </script>
</body>

</html>
