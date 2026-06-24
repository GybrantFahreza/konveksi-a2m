<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan - KONVEKSI A2M</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Carlito:wght@400;700&family=Newsreader:opsz,wght@6..72,400;500;600;700&family=Caladea:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              'primary': '#2d4ea0',
              'on-tertiary-fixed-variant': '#115300',
              'primary-fixed-dim': '#b3c5ff',
              'surface-container-lowest': '#ffffff',
              'on-secondary-fixed': '#001e2f',
              'surface-container-low': '#f1f4f7',
              'on-error-container': '#93000a',
              'tertiary-fixed': '#7aff54',
              'background': '#f7fafd',
              'on-secondary-container': '#155b81',
              'on-primary-fixed-variant': '#1e4293',
              'on-tertiary-fixed': '#032100',
              'tertiary': '#156000',
              'outline': '#747683',
              'secondary-fixed-dim': '#93cdf8',
              'secondary-fixed': '#c9e6ff',
              'surface': '#f7fafd',
              'surface-bright': '#f7fafd',
              'on-primary-fixed': '#00184a',
              'secondary-container': '#98d3fe',
              'on-surface-variant': '#444651',
              'on-secondary': '#ffffff',
              'primary-container': '#4867ba',
              'on-primary-container': '#e9ecff',
              'surface-dim': '#d7dadd',
              'error-container': '#ffdad6',
              'on-background': '#181c1e',
              'tertiary-container': '#1e7c00',
              'tertiary-fixed-dim': '#50e328',
              'outline-variant': '#c4c6d3',
              'primary-fixed': '#dbe1ff',
              'inverse-on-surface': '#eef1f4',
              'on-surface': '#181c1e',
              'on-error': '#ffffff',
              'inverse-primary': '#b3c5ff',
              'surface-variant': '#e0e3e6',
              'error': '#ba1a1a',
              'secondary': '#22648a',
              'inverse-surface': '#2d3133',
              'surface-container-highest': '#e0e3e6',
              'on-primary': '#ffffff',
              'surface-container': '#ebeef1',
              'on-secondary-fixed-variant': '#004c6e',
              'surface-tint': '#3a5aac',
              'surface-container-high': '#e5e8eb',
              'on-tertiary': '#ffffff',
              'on-tertiary-container': '#baff9f'
            },
            borderRadius: {
              'DEFAULT': '0.25rem',
              'lg': '0.5rem',
              'xl': '0.75rem',
              'full': '9999px'
            },
            spacing: {
              'xl': '32px',
              'container-padding': '24px',
              'md': '16px',
              'lg': '24px',
              'unit': '4px',
              'sm': '8px',
              'xs': '4px',
              'gutter': '20px'
            },
            fontFamily: {
              'heading-lg': ['Carlito'],
              'body-main': ['Carlito'],
              'nav-label': ['Newsreader'],
              'display-brand': ['Newsreader'],
              'caption': ['Carlito'],
              'heading-md': ['Carlito'],
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
          position: fixed;
          left: 0; top: 0;
          width: 260px;
          height: 100vh;
          transform: translateX(-100%);
          z-index: 70;
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
          display: block;
          position: fixed; inset: 0;
          background-color: rgba(0,0,0,0.35);
          z-index: 60; opacity: 0;
          pointer-events: none;
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

<!-- Sidebar — persis sama dengan dashboard -->
<aside id="main-sidebar" class="fixed left-0 top-0 h-screen bg-surface border-r border-outline-variant shadow-sm flex flex-col gap-lg p-lg z-50 transition-all">
  <div class="flex items-center gap-sm mb-xl">
    <div class="w-10 h-10 bg-primary-container rounded-lg flex items-center justify-center text-on-primary-container shrink-0">
      <span class="material-symbols-outlined">factory</span>
    </div>
    <h1 class="font-display-brand text-2xl text-primary">KONVEKSI A2M</h1>
  </div>

  <nav class="flex flex-col gap-sm">
    <!-- Dashboard — non-aktif, ada hover -->
    <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200 rounded-lg" href="/">
      <span class="material-symbols-outlined">dashboard</span>
      <span class="font-nav-label">Dashboard</span>
    </a>
    <!-- Karyawan — AKTIF, tidak ada hover -->
    <a class="flex items-center gap-md bg-primary text-on-primary rounded-lg px-md py-sm border-l-4 border-primary-fixed translate-x-1 transition-transform duration-200 pointer-events-none" href="/karyawan">
      <span class="material-symbols-outlined">groups</span>
      <span class="font-nav-label">Karyawan</span>
    </a>
    <!-- Stok — non-aktif, ada hover -->
    <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200 rounded-lg" href="/stok">
      <span class="material-symbols-outlined">inventory_2</span>
      <span class="font-nav-label">Stok</span>
    </a>
    <!-- Pesanan — non-aktif, ada hover -->
    <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200 rounded-lg" href="/pesanan">
      <span class="material-symbols-outlined">shopping_cart</span>
      <span class="font-nav-label">Pesanan</span>
    </a>
    <!-- Keuangan — non-aktif, ada hover -->
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

<!-- Header — persis sama dengan dashboard -->
<header class="fixed top-0 right-0 z-40 bg-white/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex justify-between items-center h-16 px-xl transition-all">
  <div class="flex items-center gap-md min-w-0">
    <button class="mr-2 md:mr-4 p-2 rounded-full hover:bg-surface-container transition-all text-on-surface-variant flex items-center justify-center active:scale-95 shrink-0" id="sidebar-toggle" type="button">
      <span class="material-symbols-outlined" id="toggle-icon">menu</span>
    </button>
    <a href="/karyawan" class="p-2 rounded-full hover:bg-surface-container transition-all text-on-surface-variant flex items-center justify-center active:scale-95 shrink-0" title="Kembali ke Daftar Karyawan">
      <span class="material-symbols-outlined">arrow_back</span>
    </a>
    <h2 class="font-heading-lg text-xl font-bold text-on-surface truncate">Edit Data Karyawan</h2>
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
<main class="min-h-screen transition-all bg-surface-bright">
  <div class="page-content pt-24 px-xl pb-xl">

    <!-- Breadcrumb -->
    <div class="mb-lg flex items-center gap-sm">
      <a class="text-primary hover:underline font-body-main text-sm" href="/karyawan">Karyawan</a>
      <span class="material-symbols-outlined text-outline" style="font-size:16px;">chevron_right</span>
      <span class="text-on-surface-variant font-body-main text-sm">Edit Data Karyawan</span>
    </div>

    <!-- Hero / Title Area -->
    <section class="mb-xl flex items-center justify-between">
      <div>
        <h2 class="font-heading-lg text-2xl font-bold text-primary">Edit Data Karyawan</h2>
        <p class="font-body-main text-on-surface-variant mt-1">Perbarui informasi profil dan status operasional karyawan.</p>
      </div>
      <div class="h-16 w-16 bg-secondary-container rounded-xl flex items-center justify-center shadow-md flex-shrink-0 soft-industrial-shadow">
        <span class="material-symbols-outlined text-secondary text-4xl">badge</span>
      </div>
    </section>

    <!-- Edit Form Card -->
    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-md overflow-hidden">

      <!-- Card Section Header -->
      <div class="p-lg bg-surface-container-low border-b border-outline-variant">
        <h3 class="font-nav-label text-on-surface font-bold">Informasi Dasar</h3>
      </div>

      <!-- Form -->
      <form action="/karyawan/{{ $karyawan->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="p-lg grid grid-cols-1 md:grid-cols-2 gap-xl">

          <!-- Kolom Kiri -->
          <div class="space-y-lg">

            <!-- Nama Karyawan -->
            <div class="flex flex-col gap-xs">
              <label class="font-heading-md text-sm text-on-surface-variant" for="nama_karyawan">Nama Karyawan</label>
              <input
                class="bg-surface border border-outline-variant rounded-lg p-md focus:ring-2 focus:ring-primary focus:border-primary font-body-data outline-none transition-all shadow-inner"
                id="nama_karyawan"
                name="nama_karyawan"
                type="text"
                placeholder="Masukkan nama lengkap"
                value="{{ old('nama_karyawan', $karyawan->nama_karyawan) }}"
                required
              >
            </div>

            <!-- Jenis Kelamin — radio card -->
            <div class="flex flex-col gap-xs">
              <label class="font-heading-md text-sm text-on-surface-variant">Jenis Kelamin</label>
              <div class="flex gap-md">
                <label id="label-pria" class="flex-1 flex items-center justify-between p-md border-2 rounded-lg cursor-pointer transition-all
                  {{ old('jenis_kelamin', $karyawan->jenis_kelamin) === 'Pria' ? 'border-primary bg-primary/5' : 'border-outline-variant bg-surface hover:bg-surface-variant' }}">
                  <span class="font-body-main font-bold {{ old('jenis_kelamin', $karyawan->jenis_kelamin) === 'Pria' ? 'text-primary' : 'text-on-surface-variant' }}">Pria</span>
                  <input
                    class="text-primary focus:ring-primary h-5 w-5"
                    name="jenis_kelamin"
                    type="radio"
                    value="Pria"
                    {{ old('jenis_kelamin', $karyawan->jenis_kelamin) === 'Pria' ? 'checked' : '' }}
                    onchange="updateGenderCard()"
                  >
                </label>
                <label id="label-wanita" class="flex-1 flex items-center justify-between p-md border-2 rounded-lg cursor-pointer transition-all
                  {{ old('jenis_kelamin', $karyawan->jenis_kelamin) === 'Wanita' ? 'border-primary bg-primary/5' : 'border-outline-variant bg-surface hover:bg-surface-variant' }}">
                  <span class="font-body-main font-bold {{ old('jenis_kelamin', $karyawan->jenis_kelamin) === 'Wanita' ? 'text-primary' : 'text-on-surface-variant' }}">Wanita</span>
                  <input
                    class="text-primary focus:ring-primary h-5 w-5"
                    name="jenis_kelamin"
                    type="radio"
                    value="Wanita"
                    {{ old('jenis_kelamin', $karyawan->jenis_kelamin) === 'Wanita' ? 'checked' : '' }}
                    onchange="updateGenderCard()"
                  >
                </label>
              </div>
            </div>

          </div>

          <!-- Kolom Kanan -->
          <div class="space-y-lg">

            <!-- Nomor HP -->
            <div class="flex flex-col gap-xs">
              <label class="font-heading-md text-sm text-on-surface-variant" for="no_hp">Nomor HP</label>
              <div class="relative">
                <span class="absolute left-md top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">phone_iphone</span>
                <input
                  class="w-full bg-surface border border-outline-variant rounded-lg p-md pl-11 focus:ring-2 focus:ring-primary focus:border-primary font-body-data outline-none transition-all shadow-inner"
                  id="no_hp"
                  name="no_hp"
                  type="text"
                  placeholder="08xx-xxxx-xxxx"
                  value="{{ old('no_hp', $karyawan->no_hp) }}"
                >
              </div>
            </div>

            <!-- Status -->
            <div class="flex flex-col gap-xs">
              <label class="font-heading-md text-sm text-on-surface-variant" for="status">Status</label>
              <div class="relative">
                <select
                  class="w-full bg-surface border border-outline-variant rounded-lg p-md appearance-none focus:ring-2 focus:ring-primary focus:border-primary font-body-data outline-none transition-all shadow-inner"
                  id="status"
                  name="status"
                >
                  <option value="Tanpa Keterangan" {{ old('status', $karyawan->status) === 'Tanpa Keterangan' ? 'selected' : '' }}>Tanpa Keterangan</option>
                  <option value="Hadir"            {{ old('status', $karyawan->status) === 'Hadir'            ? 'selected' : '' }}>Hadir</option>
                  <option value="Izin"             {{ old('status', $karyawan->status) === 'Izin'             ? 'selected' : '' }}>Izin</option>
                  <option value="Sakit"            {{ old('status', $karyawan->status) === 'Sakit'            ? 'selected' : '' }}>Sakit</option>
                  <option value="Cuti"             {{ old('status', $karyawan->status) === 'Cuti'             ? 'selected' : '' }}>Cuti</option>
                </select>
                <span class="absolute right-md top-1/2 -translate-y-1/2 material-symbols-outlined pointer-events-none text-outline">expand_more</span>
              </div>
            </div>

          </div>
        </div>

        <!-- Meta Info -->
        <div class="px-lg py-md bg-surface-container-high/30 border-t border-outline-variant grid grid-cols-1 md:grid-cols-3 gap-lg">
          <div class="flex items-center gap-md">
            <div class="h-10 w-10 rounded-full bg-surface-dim flex items-center justify-center flex-shrink-0">
              <span class="material-symbols-outlined text-outline">calendar_today</span>
            </div>
            <div>
              <p class="font-caption text-xs text-on-surface-variant uppercase tracking-wider">Terdaftar Sejak</p>
              <p class="font-body-data text-on-surface text-sm">{{ \Carbon\Carbon::parse($karyawan->created_at)->format('d F Y') }}</p>
            </div>
          </div>
          <div class="flex items-center gap-md">
            <div class="h-10 w-10 rounded-full bg-surface-dim flex items-center justify-center flex-shrink-0">
              <span class="material-symbols-outlined text-outline">engineering</span>
            </div>
            <div>
              <p class="font-caption text-xs text-on-surface-variant uppercase tracking-wider">Departemen</p>
              <p class="font-body-data text-on-surface text-sm">Produksi</p>
            </div>
          </div>
          <div class="flex items-center gap-md">
            <div class="h-10 w-10 rounded-full bg-surface-dim flex items-center justify-center flex-shrink-0">
              <span class="material-symbols-outlined text-outline">history</span>
            </div>
            <div>
              <p class="font-caption text-xs text-on-surface-variant uppercase tracking-wider">Terakhir Diperbarui</p>
              <p class="font-body-data text-on-surface text-sm">{{ \Carbon\Carbon::parse($karyawan->updated_at)->diffForHumans() }}</p>
            </div>
          </div>
        </div>

        <!-- Action Footer -->
        <div class="p-lg bg-surface flex flex-col sm:flex-row items-center justify-end gap-md border-t border-outline-variant">
          <a href="/karyawan"
            class="w-full sm:w-auto px-xl py-md border-2 border-secondary text-secondary font-heading-md font-bold rounded-lg hover:bg-secondary/5 transition-colors text-center text-sm">
            Batal
          </a>
          <button
            type="submit"
            class="w-full sm:w-auto px-xl py-md bg-primary text-on-primary font-heading-md font-bold rounded-lg shadow-md hover:bg-primary-container hover:text-on-primary-container transition-all flex items-center justify-center gap-sm text-sm">
            <span class="material-symbols-outlined text-sm">save</span>
            Simpan Perubahan
          </button>
        </div>

      </form>
    </div>

    <!-- Info Bottom Panel -->
    <div class="mt-xl grid grid-cols-1 md:grid-cols-3 gap-xl">

      <!-- Panduan Edit -->
      <div class="md:col-span-2 bg-surface-container-highest rounded-xl border border-outline-variant p-lg flex flex-col md:flex-row gap-lg items-center soft-industrial-shadow">
        <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden shrink-0 bg-surface-container-high flex items-center justify-center">
          <span class="material-symbols-outlined text-outline-variant" style="font-size:56px;">factory</span>
        </div>
        <div>
          <h4 class="font-heading-md font-bold text-primary mb-xs">Panduan Edit Data</h4>
          <p class="font-body-data text-on-surface-variant text-sm">Pastikan semua informasi sesuai dengan kartu identitas karyawan. Perubahan status akan langsung berpengaruh pada laporan absensi harian dan perhitungan payroll bulan berjalan.</p>
        </div>
      </div>

      <!-- Keamanan Data -->
      <div class="bg-primary text-on-primary p-lg rounded-xl shadow-lg flex flex-col justify-between soft-industrial-shadow">
        <span class="material-symbols-outlined text-4xl opacity-20">info</span>
        <div>
          <p class="font-caption text-xs opacity-80 mb-xs uppercase tracking-wider">Keamanan Data</p>
          <p class="font-body-main font-bold text-sm">Semua perubahan data dicatat dalam sistem log audit untuk menjaga integritas operasional KONVEKSI A2M.</p>
        </div>
      </div>

    </div>

  </div><!-- /page-content -->

  <!-- Footer -->
  <footer class="px-xl py-lg flex justify-between items-center text-on-surface-variant/60 font-caption text-xs">
    <p>© 2024 KONVEKSI A2M Management System. All Rights Reserved.</p>
    <div class="flex gap-md">
      <span class="flex items-center gap-xs">
        <span class="material-symbols-outlined text-xs">verified_user</span> Security Protocol Active
      </span>
      <span class="flex items-center gap-xs">
        <span class="material-symbols-outlined text-xs">lan</span> Hub-Server 01
      </span>
    </div>
  </footer>

</main>

<!-- Scripts — identik dengan dashboard -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn    = document.getElementById('sidebar-toggle');
    const toggleIcon   = document.getElementById('toggle-icon');
    const mobileOverlay = document.getElementById('mobile-overlay');

    function isMobileLayout() { return window.innerWidth <= 768; }

    function closeMobileSidebar() {
      document.body.classList.remove('mobile-sidebar-open');
      if (toggleIcon) toggleIcon.textContent = 'menu';
    }

    if (toggleBtn) {
      toggleBtn.addEventListener('click', () => {
        if (isMobileLayout()) {
          document.body.classList.toggle('mobile-sidebar-open');
          if (toggleIcon) {
            toggleIcon.textContent = document.body.classList.contains('mobile-sidebar-open') ? 'close' : 'menu';
          }
        } else {
          document.body.classList.toggle('sidebar-collapsed');
          if (toggleIcon) {
            toggleIcon.textContent = document.body.classList.contains('sidebar-collapsed') ? 'menu_open' : 'menu';
          }
        }
      });
    }

    if (mobileOverlay) {
      mobileOverlay.addEventListener('click', closeMobileSidebar);
    }

    window.addEventListener('resize', () => {
      if (!isMobileLayout()) {
        document.body.classList.remove('mobile-sidebar-open');
        if (toggleIcon) {
          toggleIcon.textContent = document.body.classList.contains('sidebar-collapsed') ? 'menu_open' : 'menu';
        }
      } else {
        document.body.classList.remove('sidebar-collapsed');
        if (toggleIcon) {
          toggleIcon.textContent = document.body.classList.contains('mobile-sidebar-open') ? 'close' : 'menu';
        }
      }
    });

    document.querySelectorAll('#main-sidebar nav a').forEach((link) => {
      link.addEventListener('click', () => {
        if (isMobileLayout()) closeMobileSidebar();
      });
    });
  });

  // Radio gender card highlight
  function updateGenderCard() {
    const pria   = document.querySelector('input[name="jenis_kelamin"][value="Pria"]');
    const wanita = document.querySelector('input[name="jenis_kelamin"][value="Wanita"]');
    const lblP   = document.getElementById('label-pria');
    const lblW   = document.getElementById('label-wanita');
    const spanP  = lblP.querySelector('span');
    const spanW  = lblW.querySelector('span');

    if (pria.checked) {
      lblP.classList.add('border-primary', 'bg-primary/5');
      lblP.classList.remove('border-outline-variant');
      spanP.classList.add('text-primary');
      spanP.classList.remove('text-on-surface-variant');

      lblW.classList.remove('border-primary', 'bg-primary/5');
      lblW.classList.add('border-outline-variant');
      spanW.classList.remove('text-primary');
      spanW.classList.add('text-on-surface-variant');
    } else {
      lblW.classList.add('border-primary', 'bg-primary/5');
      lblW.classList.remove('border-outline-variant');
      spanW.classList.add('text-primary');
      spanW.classList.remove('text-on-surface-variant');

      lblP.classList.remove('border-primary', 'bg-primary/5');
      lblP.classList.add('border-outline-variant');
      spanP.classList.remove('text-primary');
      spanP.classList.add('text-on-surface-variant');
    }
  }
</script>
</body>
</html>