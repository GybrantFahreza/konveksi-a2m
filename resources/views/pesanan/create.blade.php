<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan Baru - KONVEKSI A2M</title>
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

      .form-card {
        box-shadow: 0 2px 12px rgba(24, 93, 131, 0.05);
      }

      input::placeholder {
        color: #94A3B8;
        font-style: italic;
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
      body.sidebar-collapsed #main-sidebar .sidebar-sub { display: none; }

      body.sidebar-collapsed #main-sidebar nav a {
        padding-left: 0;
        padding-right: 0;
        justify-content: center;
        width: 48px;
        height: 48px;
        margin: 0 auto;
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
        body.sidebar-collapsed #main-sidebar .sidebar-sub { display: block; }
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
    <!-- Pesanan — AKTIF -->
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
    <a href="/pesanan" class="p-2 rounded-full hover:bg-surface-container transition-all text-on-surface-variant flex items-center justify-center active:scale-95 shrink-0" title="Kembali ke Daftar Pesanan">
      <span class="material-symbols-outlined">arrow_back</span>
    </a>
    <h2 class="font-heading-lg text-xl font-bold text-on-surface truncate">Tambah Pesanan Baru</h2>
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
  <div class="page-content pt-24 px-xl pb-24">
    <div class="max-w-5xl mx-auto">

      <!-- Breadcrumb / Header -->
      <div class="mb-xl">
        <a class="flex items-center gap-xs text-primary hover:underline mb-sm w-fit" href="/pesanan">
          <span class="material-symbols-outlined text-lg">arrow_back</span>
          <span class="font-body-main">Kembali ke Daftar Pesanan</span>
        </a>
        <h2 class="font-heading-lg text-2xl font-bold text-on-surface">Detail Pesanan Baru</h2>
        <p class="text-on-surface-variant font-body-main mt-1">Lengkapi formulir di bawah ini untuk mendaftarkan proyek produksi baru ke dalam sistem.</p>
      </div>

      <!-- Error / Validation Messages -->
      @if (session('error'))
        <div class="bg-error-container text-on-error-container p-md mb-lg rounded-lg border-l-4 border-error flex items-start gap-sm">
          <span class="material-symbols-outlined shrink-0">error</span>
          <div>
            <strong>Error Database:</strong><br>{{ session('error') }}
          </div>
        </div>
      @endif

      @if ($errors->any())
        <div class="bg-error-container text-on-error-container p-md mb-lg rounded-lg border-l-4 border-error flex items-start gap-sm">
          <span class="material-symbols-outlined shrink-0">error</span>
          <div>
            <strong>Periksa kembali form Anda:</strong>
            <ul class="mt-sm list-disc list-inside">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      @endif

      <!-- FORM -->
      <form action="/pesanan" method="POST" class="space-y-lg">
        @csrf

        <!-- Section 1: Informasi Klien & Proyek -->
        <div class="form-card bg-surface-container-lowest border border-outline-variant p-xl rounded-xl">
          <div class="flex items-center gap-sm mb-lg border-b border-outline-variant pb-md">
            <span class="material-symbols-outlined text-primary">assignment</span>
            <h3 class="font-nav-label text-lg text-primary font-bold">Informasi Klien &amp; Proyek</h3>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-xl">

            <!-- Nama Proyek -->
            <div class="space-y-xs">
              <label class="block font-heading-md text-sm text-on-surface-variant" for="nama_pesanan">
                Nama Proyek <span class="text-error">*</span>
              </label>
              <input
                class="w-full bg-surface border border-outline-variant rounded-lg p-md focus:ring-2 focus:ring-primary focus:border-primary font-body-main outline-none transition-all"
                id="nama_pesanan"
                name="nama_pesanan"
                type="text"
                placeholder="Contoh: Kemeja PDH BEM..."
                value="{{ old('nama_pesanan') }}"
                required
              >
            </div>

            <!-- Nama Klien -->
            <div class="space-y-xs">
              <label class="block font-heading-md text-sm text-on-surface-variant" for="nama_klien">
                Nama Klien / Instansi <span class="text-error">*</span>
              </label>
              <input
                class="w-full bg-surface border border-outline-variant rounded-lg p-md focus:ring-2 focus:ring-primary focus:border-primary font-body-main outline-none transition-all"
                id="nama_klien"
                name="nama_klien"
                type="text"
                placeholder="Nama pemesan atau organisasi..."
                value="{{ old('nama_klien') }}"
                required
              >
            </div>

            <!-- No HP Klien -->
            <div class="space-y-xs">
              <label class="block font-heading-md text-sm text-on-surface-variant" for="no_hp_klien">
                No. HP Klien
              </label>
              <div class="relative">
                <span class="absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant font-body-data text-sm">+62</span>
                <input
                  class="w-full bg-surface border border-outline-variant rounded-lg p-md pl-[52px] focus:ring-2 focus:ring-primary focus:border-primary font-body-main outline-none transition-all"
                  id="no_hp_klien"
                  name="no_hp_klien"
                  type="tel"
                  placeholder="812-3456-7890"
                  value="{{ old('no_hp_klien') }}"
                >
              </div>
            </div>

            <!-- Tanggal Deadline -->
            <div class="space-y-xs">
              <label class="block font-heading-md text-sm text-on-surface-variant" for="tanggal_deadline">
                Tanggal Deadline Kesepakatan <span class="text-error">*</span>
              </label>
              <div class="relative">
                <input
                  class="w-full bg-surface border border-outline-variant rounded-lg p-md focus:ring-2 focus:ring-primary focus:border-primary font-body-main outline-none transition-all"
                  id="tanggal_deadline"
                  name="tanggal_deadline"
                  type="date"
                  value="{{ old('tanggal_deadline') }}"
                  required
                >
                <span class="material-symbols-outlined absolute right-md top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none">calendar_today</span>
              </div>
            </div>

          </div>
        </div>

        <!-- Section 2: Rincian Target per Ukuran -->
        <div class="form-card bg-surface-container-lowest border border-outline-variant p-xl rounded-xl">
          <div class="flex items-center gap-sm mb-lg border-b border-outline-variant pb-md">
            <span class="material-symbols-outlined text-primary">straighten</span>
            <h3 class="font-nav-label text-lg text-primary font-bold">Rincian Target per Ukuran (Pcs)</h3>
          </div>

          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-md">
            @foreach ([
              ['S',   'target_s'],
              ['M',   'target_m'],
              ['L',   'target_l'],
              ['XL',  'target_xl'],
              ['XXL', 'target_xxl'],
              ['3XL', 'target_3xl'],
            ] as [$size, $name])
            <div class="space-y-xs">
              <label class="block font-heading-md text-sm text-center text-on-surface-variant">Size {{ $size }}</label>
              <input
                class="w-full text-center bg-surface border border-outline-variant rounded-lg p-md font-body-data text-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                name="{{ $name }}"
                type="number"
                value="{{ old($name, 0) }}"
                min="0"
                id="{{ $name }}"
                oninput="hitungRingkasan()"
              >
            </div>
            @endforeach
          </div>
        </div>

        <!-- Section 3: Harga Borongan + Ringkasan -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">

          <!-- Harga Borongan (2/3) -->
          <div class="md:col-span-2 form-card bg-surface-container-lowest border border-outline-variant border-l-4 border-l-secondary p-xl rounded-xl">
            <div class="flex items-center gap-sm mb-sm">
              <span class="material-symbols-outlined text-secondary">payments</span>
              <h3 class="font-nav-label text-lg text-secondary font-bold">Pengaturan Harga Borongan</h3>
            </div>
            <p class="font-caption text-on-surface-variant mb-lg italic text-sm">
              Kosongkan jika peran ini tidak ada dalam pesanan atau menggunakan sistem gaji tetap.
            </p>

            <div class="space-y-md">
              <!-- Tarif Potong -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-md items-center">
                <label class="font-heading-md text-sm" for="tarif_potong">Tarif Pola &amp; Potong (Rp/Pcs)</label>
                <div class="relative">
                  <span class="absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant font-body-data text-sm">Rp</span>
                  <input
                    class="w-full bg-surface border border-outline-variant rounded-lg p-md pl-xl font-body-data focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                    id="tarif_potong"
                    name="tarif_potong"
                    type="number"
                    placeholder="Contoh: 15000"
                    value="{{ old('tarif_potong') }}"
                    min="0"
                    oninput="hitungRingkasan()"
                  >
                </div>
              </div>

              <!-- Tarif Jahit -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-md items-center">
                <label class="font-heading-md text-sm" for="tarif_jahit">Tarif Menjahit (Rp/Pcs)</label>
                <div class="relative">
                  <span class="absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant font-body-data text-sm">Rp</span>
                  <input
                    class="w-full bg-surface border border-outline-variant rounded-lg p-md pl-xl font-body-data focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                    id="tarif_jahit"
                    name="tarif_jahit"
                    type="number"
                    placeholder="Contoh: 20000"
                    value="{{ old('tarif_jahit') }}"
                    min="0"
                    oninput="hitungRingkasan()"
                  >
                </div>
              </div>

              <!-- Tarif Packaging -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-md items-center">
                <label class="font-heading-md text-sm" for="tarif_packaging">Tarif Packaging (Rp/Pcs)</label>
                <div class="relative">
                  <span class="absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant font-body-data text-sm">Rp</span>
                  <input
                    class="w-full bg-surface border border-outline-variant rounded-lg p-md pl-xl font-body-data focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                    id="tarif_packaging"
                    name="tarif_packaging"
                    type="number"
                    placeholder="Contoh: 2000"
                    value="{{ old('tarif_packaging') }}"
                    min="0"
                    oninput="hitungRingkasan()"
                  >
                </div>
              </div>
            </div>
          </div>

          <!-- Ringkasan Produksi (1/3) -->
          <div class="space-y-lg">
            <!-- Ringkasan -->
            <div class="form-card bg-primary-container text-on-primary-container p-xl rounded-xl border border-outline-variant">
              <h4 class="font-heading-md text-base mb-md flex items-center gap-xs">
                <span class="material-symbols-outlined text-xl">info</span>
                Ringkasan Produksi
              </h4>
              <div class="space-y-sm font-body-data">
                <div class="flex justify-between border-b border-primary-fixed/30 pb-xs">
                  <span>Total Item</span>
                  <span class="font-bold" id="ringkasan-total">0 Pcs</span>
                </div>
                <div class="flex justify-between border-b border-primary-fixed/30 pb-xs">
                  <span>Estimasi Biaya</span>
                  <span class="font-bold text-secondary-container" id="ringkasan-biaya">Rp 0</span>
                </div>
                <div class="flex justify-between">
                  <span>Status Awal</span>
                  <span class="bg-surface/20 px-sm py-[2px] rounded text-xs uppercase tracking-wider font-bold">Antrian</span>
                </div>
              </div>
            </div>

            <!-- Info Panel -->
            <div class="p-lg bg-surface-variant rounded-xl border border-outline-variant flex flex-col items-center justify-center gap-md text-center">
              <div class="w-16 h-16 rounded-lg bg-surface-container-high flex items-center justify-center">
                <span class="material-symbols-outlined text-outline text-4xl">factory</span>
              </div>
              <p class="font-caption text-on-surface-variant text-sm">
                Pastikan semua rincian ukuran sudah sesuai dengan Purchase Order klien sebelum menyimpan.
              </p>
            </div>
          </div>

        </div>

        <!-- Footer Actions -->
        <div class="pt-xl flex flex-col sm:flex-row items-center justify-between gap-lg border-t border-outline-variant">
          <a href="/pesanan"
            class="order-2 sm:order-1 text-error font-heading-md flex items-center gap-xs hover:bg-error-container/20 px-lg py-md rounded-lg transition-colors text-sm font-bold">
            <span class="material-symbols-outlined">cancel</span>
            Batalkan Input
          </a>
          <div class="order-1 sm:order-2 flex items-center gap-md w-full sm:w-auto">
            <button
              class="flex-1 sm:flex-none border border-primary text-primary font-heading-md px-xl py-md rounded-lg hover:bg-primary-fixed transition-colors text-sm font-bold"
              type="button"
              onclick="alert('Fitur simpan draft belum tersedia.')">
              Simpan Draft
            </button>
            <button
              class="flex-1 sm:flex-none bg-primary text-on-primary font-heading-md px-xl py-md rounded-lg shadow-md hover:brightness-110 active:scale-95 transition-all flex items-center justify-center gap-md text-sm font-bold"
              type="submit">
              <span class="material-symbols-outlined">save</span>
              Simpan Proyek &amp; Tarif
            </button>
          </div>
        </div>

      </form>
    </div>
  </div>
</main>

<!-- Scripts -->
<script>
  // Sidebar toggle
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

    // Hitung ringkasan saat halaman load (isi dari old())
    hitungRingkasan();
  });

  // Live ringkasan produksi
  function hitungRingkasan() {
    const sizes = ['target_s', 'target_m', 'target_l', 'target_xl', 'target_xxl', 'target_3xl'];
    const tarifs = ['tarif_potong', 'tarif_jahit', 'tarif_packaging'];

    const total = sizes.reduce((sum, id) => {
      return sum + (parseInt(document.getElementById(id)?.value) || 0);
    }, 0);

    const totalTarif = tarifs.reduce((sum, id) => {
      return sum + (parseInt(document.getElementById(id)?.value) || 0);
    }, 0);

    const estimasi = total * totalTarif;

    document.getElementById('ringkasan-total').textContent = total + ' Pcs';
    document.getElementById('ringkasan-biaya').textContent = 'Rp ' + estimasi.toLocaleString('id-ID');
  }
</script>
</body>
</html>