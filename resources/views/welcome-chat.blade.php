<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AnamChat — Aplikasi Chat Cepat & Aman</title>
  <meta name="description" content="AnamChat adalah aplikasi chat modern dengan enkripsi end‑to‑end, pesan realtime, dan panggilan video. Coba gratis sekarang.">
  <link rel="icon" href="{{ url('chats2') }}/assets/favicon.svg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ url('chats2') }}/styles.css" />
</head>

<body>
  <header class="site-header">
    <div class="container nav">
      <a class="brand" href="#home">
        <img src="{{ url('chats2') }}/assets/logo.svg" alt="AnamChat Logo" class="logo" />
        <span>AnamChat</span>
      </a>
      <nav class="nav-links" id="navLinks">
        <a href="#fitur">Fitur</a>
        <a href="#screens">Tampilan</a>
        <a href="#harga">Harga</a>
        <a href="#faq">FAQ</a>
        <a class="btn small ghost" href="#download">Download</a>
      </nav>
      <button class="hamburger" id="hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>

  <section class="hero" id="home">
    <div class="container hero-inner">
      <div class="hero-copy">
        <h1>Chat Lebih <span class="gradient">Cepat</span> & <span class="gradient">Aman</span></h1>
        <p>AnamChat menghadirkan pengalaman berkirim pesan yang ringan, realtime, dan terenkripsi. Buat grup, kirim file, dan lakukan panggilan video tanpa ribet.</p>
        <div class="cta">
          <a href="{{ route('dashboard.index') }}" class="btn primary">Coba Gratis</a>
          <a href="#fitur" class="btn ghost">Lihat Fitur</a>
        </div>
        <div class="trust">
          <img src="{{ url('chats2') }}/assets/trust-iso.svg" alt="ISO" />
          <img src="{{ url('chats2') }}/assets/trust-gdpr.svg" alt="GDPR" />
          <img src="{{ url('chats2') }}/assets/trust-ssl.svg" alt="SSL" />
        </div>
      </div>
      <div class="hero-art">
        <img src="{{ url('chats2') }}/assets/hero-ui.png" alt="Tampilan AnamChat" class="hero-img" />
        <div class="glass stats">
          <div><strong>99.99%</strong><span>Uptime</span></div>
          <div><strong>&lt;100ms</strong><span>Latency</span></div>
          <div><strong>1jt+</strong><span>Pesan/Hari</span></div>
        </div>
      </div>
    </div>
    <div class="blur blob-1"></div>
    <div class="blur blob-2"></div>
  </section>

  <section class="features" id="fitur">
    <div class="container">
      <h2>Fitur Unggulan</h2>
      <p class="lead">Semuanya yang Anda butuhkan untuk komunikasi yang efektif — di satu aplikasi.</p>
      <div class="grid features-grid">
        <div class="card feature">
          <img src="{{ url('chats2') }}/assets/ic-realtime.svg" alt="Realtime">
          <h3>Realtime</h3>
          <p>Pesan masuk dalam sekejap berkat arsitektur socket yang super cepat.</p>
        </div>
        <div class="card feature">
          <img src="{{ url('chats2') }}/assets/ic-shield.svg" alt="Keamanan">
          <h3>End‑to‑End</h3>
          <p>Enkripsi end‑to‑end menjaga privasi percakapan Anda setiap saat.</p>
        </div>
        <div class="card feature">
          <img src="{{ url('chats2') }}/assets/ic-video.svg" alt="Video Call">
          <h3>Video Call</h3>
          <p>Panggilan video jernih dengan noise‑cancellation bawaan.</p>
        </div>
        <div class="card feature">
          <img src="{{ url('chats2') }}/assets/ic-groups.svg" alt="Grup">
          <h3>Grup & Channel</h3>
          <p>Kelola komunitas dan tim dalam grup ratusan anggota.</p>
        </div>
        <div class="card feature">
          <img src="{{ url('chats2') }}/assets/ic-file.svg" alt="File">
          <h3>Berbagi File</h3>
          <p>Kirim foto, video, dan dokumen besar dengan kompresi pintar.</p>
        </div>
        <div class="card feature">
          <img src="{{ url('chats2') }}/assets/ic-bots.svg" alt="Bots">
          <h3>Bot & Integrasi</h3>
          <p>Hubungkan dengan alat kerja: Zapier, Slack, Webhook, dan API.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="screens" id="screens">
    <div class="container">
      <h2>Tampilan Aplikasi</h2>
      <p class="lead">UI bersih dan modern untuk fokus pada percakapan.</p>
      <div class="grid screenshots">
        <img src="{{ url('chats2') }}/assets/screen-1.png" alt="Daftar Chat">
        <img src="{{ url('chats2') }}/assets/screen-2.png" alt="Percakapan">
        <img src="{{ url('chats2') }}/assets/screen-3.png" alt="Panggilan Video">
      </div>
    </div>
  </section>

  <section class="pricing" id="harga">
    <div class="container">
      <h2>Paket Harga</h2>
      <p class="lead">Gratis untuk memulai. Upgrade kapan saja.</p>
      <div class="grid pricing-grid">
        <div class="card price">
          <h3>Gratis</h3>
          <p class="price-tag">Rp 0</p>
          <ul>
            <li>Chat 1:1 tanpa batas</li>
            <li>Grup s.d. 50 anggota</li>
            <li>Penyimpanan 2 GB</li>
          </ul>
          <a href="#download" class="btn ghost">Mulai</a>
        </div>
        <div class="card price highlight">
          <div class="badge">Terpopuler</div>
          <h3>Pro</h3>
          <p class="price-tag">Rp 49.000<span>/bulan</span></p>
          <ul>
            <li>Grup s.d. 500 anggota</li>
            <li>Video call grup</li>
            <li>Penyimpanan 50 GB</li>
            <li>Dukungan prioritas</li>
          </ul>
          <a href="#download" class="btn primary">Pilih Pro</a>
        </div>
        <div class="card price">
          <h3>Bisnis</h3>
          <p class="price-tag">Hubungi Kami</p>
          <ul>
            <li>Single sign‑on (SSO)</li>
            <li>Audit & compliance</li>
            <li>On‑premise / Private cloud</li>
          </ul>
          <a href="mailto:hairulanam21@gmail.com?subject=AnamChat%20Bisnis" class="btn ghost">Konsultasi</a>
        </div>
      </div>
    </div>
  </section>

  <section class="social-proof">
    <div class="container logos">
      <img src="{{ url('chats2') }}/assets/logo1.svg" alt="Partner 1">
      <img src="{{ url('chats2') }}/assets/logo2.svg" alt="Partner 2">
      <img src="{{ url('chats2') }}/assets/logo3.svg" alt="Partner 3">
      <img src="{{ url('chats2') }}/assets/logo4.svg" alt="Partner 4">
      <img src="{{ url('chats2') }}/assets/logo5.svg" alt="Partner 5">
    </div>
  </section>

  <section class="faq" id="faq">
    <div class="container">
      <h2>Pertanyaan Umum</h2>
      <div class="accordion" id="faqAcc">
        <details open>
          <summary>Apa itu enkripsi end‑to‑end?</summary>
          <p>Hanya pengirim dan penerima yang bisa membaca isi pesan. Server tidak dapat mengakses konten.</p>
        </details>
        <details>
          <summary>Apakah AnamChat punya aplikasi mobile?</summary>
          <p>Ya. Android & iOS tersedia. Versi desktop dan web juga tersedia.</p>
        </details>
        <details>
          <summary>Bagaimana cara migrasi dari aplikasi lain?</summary>
          <p>Kami sediakan alat impor kontak, grup, dan riwayat chat tertentu.</p>
        </details>
      </div>
    </div>
  </section>

  <section class="download" id="download">
    <div class="container dl-grid">
      <div class="dl-copy">
        <h2>Download Sekarang</h2>
        <p class="lead">Mulai gratis, tanpa kartu kredit.</p>
        <div class="stores">
          <a class="store" href="#" aria-label="Google Play">
            <img src="{{ url('chats2') }}/assets/store-play.svg" alt="Google Play">
          </a>
          <a class="store" href="#" aria-label="App Store">
            <img src="{{ url('chats2') }}/assets/store-apple.svg" alt="App Store">
          </a>
          <a class="store" href="#" aria-label="Web">
            <img src="{{ url('chats2') }}/assets/store-web.svg" alt="Web">
          </a>
        </div>
      </div>
      <form class="dl-form" id="waitlistForm">
        <label for="email">Ingin kabar rilis lebih dulu?</label>
        <div class="input-row">
          <input id="email" name="email" type="email" placeholder="email@domain.com" required />
          <button class="btn primary" type="submit">Gabung Waitlist</button>
        </div>
        <p class="form-msg" id="formMsg" role="status" aria-live="polite"></p>
      </form>
    </div>
  </section>

  <footer class="site-footer">
    <div class="container foot">
      <div class="brand-col">
        <a class="brand" href="#home">
          <img src="{{ url('chats2') }}/assets/logo.svg" alt="AnamChat Logo" class="logo" />
          <span>AnamChat</span>
        </a>
        <p>© 2025 Anam Techno • All rights reserved</p>
      </div>
      <div class="links">
        <a href="#fitur">Fitur</a>
        <a href="#harga">Harga</a>
        <a href="#faq">FAQ</a>
        <a href="mailto:hairulanam21@gmail.com">Kontak</a>
      </div>
      <div class="sns">
        <a href="#" aria-label="Twitter">🐦</a>
        <a href="#" aria-label="YouTube">▶️</a>
        <a href="#" aria-label="WhatsApp">💬</a>
      </div>
    </div>
  </footer>

  <script src="{{ url('chats2') }}/app.js"></script>
</body>

</html>
