<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Progres Harian - KONVEKSI A2M</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Carlito:ital,wght@0,400;0,700;1,400;1,700&family=Caladea:ital,wght@0,400;0,700;1,400;1,700&family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              'outline-variant': '#c4c6d3',
              'on-error-container': '#93000a',
              'surface-container-low': '#f1f4f7',
              'secondary-container': '#98d3fe',
              'on-background': '#181c1e',
              'on-primary': '#ffffff',
              'on-error': '#ffffff',
              'inverse-surface': '#2d3133',
              'surface-tint': '#3a5aac',
              'surface-container-high': '#e5e8eb',
              'on-primary-fixed-variant': '#1e4293',
              'inverse-primary': '#b3c5ff',
              'error': '#ba1a1a',
              'surface-bright': '#f7fafd',
              'on-tertiary-container': '#baff9f',
              'inverse-on-surface': '#eef1f4',
              'tertiary-container': '#1e7c00',
              'secondary': '#22648a',
              'primary': '#2d4ea0',
              'on-secondary': '#ffffff',
              'on-tertiary': '#ffffff',
              'error-container': '#ffdad6',
              'tertiary': '#156000',
              'primary-fixed': '#dbe1ff',
              'on-secondary-fixed-variant': '#004c6e',
              'on-primary-container': '#e9ecff',
              'primary-fixed-dim': '#b3c5ff',
              'on-surface-variant': '#444651',
              'surface-variant': '#e0e3e6',
              'surface-container-highest': '#e0e3e6',
              'on-surface': '#181c1e',
              'on-primary-fixed': '#00184a',
              'surface-dim': '#d7dadd',
              'surface-container': '#ebeef1',
              'secondary-fixed': '#c9e6ff',
              'background': '#f7fafd',
              'on-secondary-container': '#155b81',
              'surface': '#f7fafd',
              'outline': '#747683',
              'surface-container-lowest': '#ffffff',
              'primary-container': '#4867ba',
              'on-secondary-fixed': '#001e2f',
              'secondary-fixed-dim': '#93cdf8'
            },
            borderRadius: {
              'DEFAULT': '0.25rem',
              'lg': '0.5rem',
              'xl': '0.75rem',
              'full': '9999px'
            },
            spacing: {
              'unit': '4px',
              'lg': '24px',
              'container-padding': '24px',
              'md': '16px',
              'sm': '8px',
              'xl': '32px',
              'gutter': '20px',
              'xs': '4px'
            },
            fontFamily: {
              'heading-md': ['Carlito'],
              'body-main': ['Carlito'],
              'caption': ['Carlito'],
              'heading-lg': ['Carlito'],
              'nav-label': ['Newsreader'],
              'display-brand': ['Newsreader'],
              'body-data': ['Caladea']
            }
          }
        }
      };
    </script>
    <style>
      * { box-sizing: border-box; }

      html, body {
        width: 100%;
        min-height: 100%;
        overflow-x: hidden;
      }

      body { background-color: #f7fafd; }

      .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      }

      .soft-industrial-shadow {
        box-shadow: 0 2px 12px rgba(24, 93, 131, 0.05);
      }

      #main-sidebar, header, main {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }

      #main-sidebar { width: 260px; }

      header {
        width: calc(100% - 260px);
        margin-left: 260px;
      }

      main { margin-left: 260px; }

      body.sidebar-collapsed #main-sidebar { width: 80px; }

      body.sidebar-collapsed #main-sidebar h1,
      body.sidebar-collapsed #main-sidebar .font-nav-label,
      body.sidebar-collapsed #main-sidebar .mt-auto p { display: none; }

      body.sidebar-collapsed #main-sidebar nav a {
        padding-left: 0; padding-right: 0;
        justify-content: center;
        width: 48px; height: 48px; margin: 0 auto;
      }

      body.sidebar-collapsed header {
        width: calc(100% - 80px);
        margin-left: 80px;
      }

      body.sidebar-collapsed main { margin-left: 80px; }

      .mobile-overlay { display: none; }

      @media (max-width: 1024px) {
        #main-sidebar { width: 220px; }
        header { width: calc(100% - 220px); margin-left: 220px; }
        main { margin-left: 220px; }
        body.sidebar-collapsed #main-sidebar { width: 80px; }
        body.sidebar-collapsed header { width: calc(100% - 80px); margin-left: 80px; }
        body.sidebar-collapsed main { margin-left: 80px; }
      }

      @media (max-width: 768px) {
        #main-sidebar {
          position: fixed; left: 0; top: 0;
          width: 260px; height: 100vh;
          transform: translateX(-100%); z-index: 70;
        }
        body.mobile-sidebar-open #main-sidebar { transform: translateX(0); }
        body.sidebar-collapsed #main-sidebar { width: 260px; }
        body.sidebar-collapsed #main-sidebar h1,
        body.sidebar-collapsed #main-sidebar .font-nav-label,
        body.sidebar-collapsed #main-sidebar .mt-auto p { display: block; }
        body.sidebar-collapsed #main-sidebar nav a {
          width: auto; height: auto; margin: 0;
          justify-content: flex-start;
          padding-left: 16px; padding-right: 16px;
        }
        header, body.sidebar-collapsed header {
          width: 100%; margin-left: 0;
          padding-left: 16px; padding-right: 16px;
        }
        main, body.sidebar-collapsed main { margin-left: 0; width: 100%; }
        .mobile-overlay {
          display: block; position: fixed; inset: 0;
          background-color: rgba(0,0,0,0.35); z-index: 60;
          opacity: 0; pointer-events: none;
          transition: opacity 0.25s ease;
        }
        body.mobile-sidebar-open .mobile-overlay { opacity: 1; pointer-events: auto; }
        header h2 { font-size: 18px; white-space: nowrap; }
        .page-content { padding-left: 16px; padding-right: 16px; padding-top: 88px; }
        .logout-text { display: none; }
        .logout-btn { padding: 8px 10px; }
      }

      @media (max-width: 480px) {
        header { height: 60px; }
        header h2 { font-size: 16px; }
        .page-content { padding-top: 80px; padding-left: 12px; padding-right: 12px; }
        .top-actions { gap: 6px; }
        .hide-on-small { display: none; }
      }
    </style>
</head>
<body class="font-body-main text-on-surface">

<!-- Mobile Overlay -->
<div class="mobile-overlay" id="mobile-overlay"></div>

<!-- Sidebar — style dashboard, aktif di Pesanan -->
<aside id="main-sidebar" class="fixed left-0 top-0 h-screen bg-surface border-r border-outline-variant shadow-sm flex flex-col gap-lg p-lg z-50 transition-all">
  <div class="flex items-center gap-sm mb-xl">
    <div class="w-10 h-10 bg-primary-container rounded-lg flex items-center justify-center text-on-primary-container shrink-0">
      <span class="material-symbols-outlined">factory</span>
    </div>
    <h1 class="font-display-brand text-2xl text-primary">KONVEKSI A2M</h1>
  </div>

  <nav class="flex flex-col gap-sm">
    <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200 rounded-lg" href="/">
      <span class="material-symbols-outlined">dashboard</span>
      <span class="font-nav-label">Dashboard</span>
    </a>
    <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200 rounded-lg" href="/karyawan">
      <span class="material-symbols-outlined">groups</span>
      <span class="font-nav-label">Karyawan</span>
    </a>
    <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200 rounded-lg" href="/stok">
      <span class="material-symbols-outlined">inventory_2</span>
      <span class="font-nav-label">Stok</span>
    </a>
    <!-- Pesanan — AKTIF (progres kerja adalah sub-bagian dari Pesanan) -->
    <a class="flex items-center gap-md bg-primary text-on-primary rounded-lg px-md py-sm border-l-4 border-primary-fixed translate-x-1 transition-transform duration-200 pointer-events-none" href="/pesanan">
      <span class="material-symbols-outlined">shopping_cart</span>
      <span class="font-nav-label">Pesanan</span>
    </a>
    <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200 rounded-lg" href="/keuangan">
      <span class="material-symbols-outlined">payments</span>
      <span class="font-nav-label">Keuangan</span>
    </a>
  </nav>

  <div class="mt-auto pt-lg border-t border-outline-variant">
    <div class="flex items-center gap-sm px-md">
      <div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center shrink-0">
        <span class="material-symbols-outlined text-secondary">person</span>
      </div>
      <div class="overflow-hidden">
        <p class="text-xs font-bold text-on-surface truncate">Administrator</p>
        <p class="text-[10px] text-on-surface-variant truncate">admin@a2mkonveksi.com</p>
      </div>
    </div>
  </div>
</aside>

<!-- Header — style dashboard -->
<header class="fixed top-0 right-0 z-40 bg-white/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex justify-between items-center h-16 px-xl transition-all">
  <div class="flex items-center gap-md min-w-0">
    <button class="mr-2 md:mr-4 p-2 rounded-full hover:bg-surface-container transition-all text-on-surface-variant flex items-center justify-center active:scale-95 shrink-0" id="sidebar-toggle" type="button">
      <span class="material-symbols-outlined" id="toggle-icon">menu</span>
    </button>
    <a href="/pesanan" class="p-2 rounded-full hover:bg-surface-container transition-all text-on-surface-variant flex items-center justify-center active:scale-95 shrink-0" title="Batal & Kembali">
      <span class="material-symbols-outlined">arrow_back</span>
    </a>
    <h2 class="font-heading-lg text-xl font-bold text-on-surface truncate">Input Progres Kerja</h2>
  </div>
  <div class="flex items-center gap-lg top-actions shrink-0">
    <div class="flex items-center gap-sm">
      <button class="hover:bg-surface-container rounded-full p-2 text-on-surface-variant transition-all active:scale-95 hide-on-small" type="button">
        <span class="material-symbols-outlined">notifications</span>
      </button>
      <button class="hover:bg-surface-container rounded-full p-2 text-on-surface-variant transition-all active:scale-95 hide-on-small" type="button">
        <span class="material-symbols-outlined">settings</span>
      </button>
    </div>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="logout-btn bg-error text-on-error border-none px-5 py-2 rounded-lg font-bold flex items-center gap-2 hover:bg-error/80 transition-all text-sm">
        <span class="material-symbols-outlined text-base">logout</span>
        <span class="logout-text">Keluar</span>
      </button>
    </form>
  </div>
</header>

<!-- Main Content -->
<main class="min-h-screen bg-background">
  <div class="page-content pt-24 px-xl pb-xl">
    <div class="max-w-4xl mx-auto">

      <!-- Back Button -->
      <a href="/pesanan" class="inline-flex items-center gap-xs text-secondary hover:text-primary mb-lg transition-colors font-heading-md text-sm font-bold">
        <span class="material-symbols-outlined">arrow_back</span>
        <span>Batal &amp; Kembali</span>
      </a>

      <!-- Session Messages -->
      @if (session('success'))
        <div class="bg-tertiary-container/20 text-tertiary border border-tertiary/30 p-md mb-lg rounded-lg flex items-start gap-sm">
          <span class="material-symbols-outlined shrink-0">check_circle</span>
          <span>{{ session('success') }}</span>
        </div>
      @endif

      @if (session('error'))
        <div class="bg-error-container text-on-error-container p-md mb-lg rounded-lg border-l-4 border-error flex items-start gap-sm">
          <span class="material-symbols-outlined shrink-0">error</span>
          <span>{{ session('error') }}</span>
        </div>
      @endif

      <!-- Main Form Card -->
      <div class="bg-surface-container-lowest border border-outline-variant rounded-xl soft-industrial-shadow p-xl">

        <div class="mb-xl">
          <h2 class="font-heading-lg text-2xl font-bold text-on-surface mb-xs">Input Progress Kerja</h2>
          <p class="text-on-surface-variant font-body-main">Catat hasil produksi harian karyawan dengan teliti untuk akurasi data stok.</p>
        </div>

        <form action="/progres" method="POST" class="space-y-xl">
          @csrf

          <!-- Baris 1: Tanggal + Karyawan -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">

            <!-- Tanggal Pengerjaan -->
            <div class="flex flex-col gap-sm">
              <label class="font-heading-md text-sm text-on-surface-variant" for="tanggal_input">
                Tanggal Pengerjaan
              </label>
              <div class="relative">
                <input
                  class="w-full bg-surface border border-outline-variant rounded-lg p-md font-body-data focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all appearance-none"
                  id="tanggal_input"
                  name="tanggal_input"
                  type="date"
                  value="{{ date('Y-m-d') }}"
                  required
                >
                <span class="material-symbols-outlined absolute right-md top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">calendar_today</span>
              </div>
            </div>

            <!-- Nama Karyawan -->
            <div class="flex flex-col gap-sm">
              <label class="font-heading-md text-sm text-on-surface-variant" for="id_karyawan">
                Nama Karyawan
              </label>
              <div class="relative">
                <select
                  class="w-full bg-surface border border-outline-variant rounded-lg p-md font-body-data focus:border-primary focus:ring-1 focus:ring-primary outline-none appearance-none transition-all"
                  id="id_karyawan"
                  name="id_karyawan"
                  required
                >
                  <option value="" disabled selected>-- Pilih Karyawan --</option>
                  @foreach ($karyawan as $k)
                    <option value="{{ $k->id_karyawan }}">{{ $k->nama_karyawan }}</option>
                  @endforeach
                </select>
                <span class="material-symbols-outlined absolute right-md top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">expand_more</span>
              </div>
            </div>

            <!-- Posisi & Nama Pesanan — full width -->
            <div class="flex flex-col gap-sm md:col-span-2">
              <label class="font-heading-md text-sm text-on-surface-variant" for="id_tarif_peran">
                Posisi &amp; Nama Pesanan
              </label>
              <div class="relative">
                <select
                  class="w-full bg-surface border border-outline-variant rounded-lg p-md font-body-data focus:border-primary focus:ring-1 focus:ring-primary outline-none appearance-none transition-all"
                  id="id_tarif_peran"
                  name="id_tarif_peran"
                  required
                >
                  <option value="" disabled selected>-- Pilih Posisi Pekerjaan --</option>
                  @foreach ($tarifPeran as $tp)
                    <option value="{{ $tp->id_tarif_peran }}">
                      {{ $tp->pesanan->nama_pesanan }} - {{ $tp->peran }} (Rp {{ number_format($tp->tarif_per_pcs, 0, ',', '.') }})
                    </option>
                  @endforeach
                </select>
                <span class="material-symbols-outlined absolute right-md top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">expand_more</span>
              </div>
            </div>

          </div>

          <!-- Size Matrix Grid -->
          <div class="space-y-sm">
            <label class="font-heading-md text-sm text-on-surface-variant">
              Rincian Banyak Selesai (Pcs)
            </label>
            <div class="bg-surface-container-low border border-outline-variant rounded-lg p-lg">
              <div class="grid grid-cols-3 gap-lg">
                @foreach ([
                  ['S',   'ukuran_s'],
                  ['M',   'ukuran_m'],
                  ['L',   'ukuran_l'],
                  ['XL',  'ukuran_xl'],
                  ['XXL', 'ukuran_xxl'],
                  ['3XL', 'ukuran_3xl'],
                ] as [$size, $name])
                <div class="flex flex-col items-center gap-xs">
                  <span class="font-heading-md font-bold text-on-surface">{{ $size }}</span>
                  <input
                    class="w-full max-w-[120px] text-center bg-surface border border-outline-variant rounded-lg p-sm font-body-data focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all"
                    name="{{ $name }}"
                    type="number"
                    value="0"
                    min="0"
                    oninput="hitungTotal()"
                  >
                </div>
                @endforeach
              </div>
              <!-- Total real-time -->
              <div class="mt-lg pt-md border-t border-outline-variant flex justify-between items-center">
                <span class="font-body-main text-sm text-on-surface-variant">Total Selesai Hari Ini</span>
                <span class="font-heading-md font-bold text-primary" id="total-pcs">0 Pcs</span>
              </div>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="pt-md">
            <button
              class="w-full bg-primary text-on-primary font-heading-md py-lg rounded-lg shadow-md hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-sm font-bold"
              type="submit"
            >
              <span class="material-symbols-outlined">save</span>
              Simpan Progress Kerja
            </button>
          </div>

        </form>
      </div>

      <!-- Info Cards Bento -->
      <div class="mt-xl grid grid-cols-1 md:grid-cols-3 gap-lg">

        <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-lg soft-industrial-shadow flex items-start gap-md">
          <div class="w-10 h-10 rounded-full bg-tertiary-container/10 flex items-center justify-center text-tertiary flex-shrink-0">
            <span class="material-symbols-outlined">check_circle</span>
          </div>
          <div>
            <h4 class="font-heading-md text-sm font-bold text-on-surface">Target Harian</h4>
            <p class="text-xs text-on-surface-variant font-caption mt-xs">Pastikan progres dicatat setiap hari.</p>
          </div>
        </div>

        <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-lg soft-industrial-shadow flex items-start gap-md">
          <div class="w-10 h-10 rounded-full bg-secondary-container/10 flex items-center justify-center text-secondary flex-shrink-0">
            <span class="material-symbols-outlined">info</span>
          </div>
          <div>
            <h4 class="font-heading-md text-sm font-bold text-on-surface">Akurasi Data</h4>
            <p class="text-xs text-on-surface-variant font-caption mt-xs">Data progres mempengaruhi laporan stok barang jadi.</p>
          </div>
        </div>

        <div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-lg soft-industrial-shadow flex items-start gap-md">
          <div class="w-10 h-10 rounded-full bg-primary-container/10 flex items-center justify-center text-primary flex-shrink-0">
            <span class="material-symbols-outlined">pending_actions</span>
          </div>
          <div>
            <h4 class="font-heading-md text-sm font-bold text-on-surface">Riwayat Progres</h4>
            <p class="text-xs text-on-surface-variant font-caption mt-xs">Cek halaman pesanan untuk detail progres per order.</p>
          </div>
        </div>

      </div>

    </div>
  </div>
</main>

<!-- Scripts -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn     = document.getElementById('sidebar-toggle');
    const toggleIcon    = document.getElementById('toggle-icon');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const isMobile      = () => window.innerWidth <= 768;

    function closeMobileSidebar() {
      document.body.classList.remove('mobile-sidebar-open');
      if (toggleIcon) toggleIcon.textContent = 'menu';
    }

    if (toggleBtn) {
      toggleBtn.addEventListener('click', () => {
        if (isMobile()) {
          document.body.classList.toggle('mobile-sidebar-open');
          if (toggleIcon) toggleIcon.textContent = document.body.classList.contains('mobile-sidebar-open') ? 'close' : 'menu';
        } else {
          document.body.classList.toggle('sidebar-collapsed');
          if (toggleIcon) toggleIcon.textContent = document.body.classList.contains('sidebar-collapsed') ? 'menu_open' : 'menu';
        }
      });
    }

    if (mobileOverlay) {
      mobileOverlay.addEventListener('click', closeMobileSidebar);
    }

    window.addEventListener('resize', () => {
      if (!isMobile()) {
        document.body.classList.remove('mobile-sidebar-open');
        if (toggleIcon) toggleIcon.textContent = document.body.classList.contains('sidebar-collapsed') ? 'menu_open' : 'menu';
      }
    });

    hitungTotal();
  });

  // Live total pcs
  function hitungTotal() {
    const fields = ['ukuran_s', 'ukuran_m', 'ukuran_l', 'ukuran_xl', 'ukuran_xxl', 'ukuran_3xl'];
    const total = fields.reduce((sum, name) => {
      const el = document.querySelector(`input[name="${name}"]`);
      return sum + (parseInt(el?.value) || 0);
    }, 0);
    const el = document.getElementById('total-pcs');
    if (el) el.textContent = total + ' Pcs';
  }
</script>
</body>
</html>