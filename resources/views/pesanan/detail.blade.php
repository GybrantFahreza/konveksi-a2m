<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Riwayat Pengerjaan - KONVEKSI A2M</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Carlito:wght@400;700&family=Caladea:wght@400;700&family=Newsreader:opsz,wght@6..72,400;6..72,500;6..72,700&display=swap" rel="stylesheet">
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

      html, body { width: 100%; min-height: 100%; overflow-x: hidden; }

      body { background-color: #f7fafd; font-family: 'Carlito', sans-serif; }

      .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      }

      .soft-industrial-shadow { box-shadow: 0 2px 12px rgba(24, 93, 131, 0.05); }

      #main-sidebar, header, main {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }

      #main-sidebar { width: 260px; }

      header { width: calc(100% - 260px); margin-left: 260px; }

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

      body.sidebar-collapsed header { width: calc(100% - 80px); margin-left: 80px; }
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
    <h2 class="font-heading-lg text-xl font-bold text-on-surface truncate">Riwayat Pengerjaan</h2>
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
  <div class="page-content pt-20 p-lg">

    <!-- Back Navigation -->
    <a class="inline-flex items-center gap-sm text-primary font-heading-md hover:underline mb-lg transition-all text-sm font-bold" href="/pesanan">
      <span class="material-symbols-outlined">arrow_back</span>
      Kembali ke Daftar Pesanan
    </a>

    <!-- Session: Success -->
    @if (session('success'))
      <div class="bg-tertiary-container/10 text-tertiary border border-tertiary/30 p-md mb-lg rounded-lg flex items-center gap-sm">
        <span class="material-symbols-outlined shrink-0">check_circle</span>
        <span>{{ session('success') }}</span>
      </div>
    @endif

    <!-- Content Card -->
    <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant overflow-hidden">

      <!-- Card Header: Judul + Target -->
      <div class="p-xl flex justify-between items-start gap-lg">
        <div class="space-y-sm flex-1 min-w-0">
          <h2 class="font-heading-lg text-xl font-bold text-on-surface">
            Detail Riwayat Pengerjaan:
            <span class="text-primary">{{ $pesanan->nama_pesanan }}</span>
          </h2>

          <!-- Target Bar -->
          <div class="inline-flex flex-wrap items-center gap-md bg-tertiary-container/10 text-tertiary px-lg py-md rounded-lg border border-tertiary-container/20">
            <div class="flex items-center gap-sm">
              <span class="material-symbols-outlined text-tertiary">ads_click</span>
              <span class="font-heading-md text-sm font-bold">Total Target: {{ $pesanan->target_total_pcs }} Pcs</span>
            </div>
            <div class="flex flex-wrap gap-sm ml-lg">
              @foreach ([
                ['S',   $pesanan->target_s   ?? 0],
                ['M',   $pesanan->target_m   ?? 0],
                ['L',   $pesanan->target_l   ?? 0],
                ['XL',  $pesanan->target_xl  ?? 0],
                ['XXL', $pesanan->target_xxl ?? 0],
                ['3XL', $pesanan->target_3xl ?? 0],
              ] as [$label, $val])
                <span class="bg-surface-container-high px-sm py-xs rounded text-xs border border-outline-variant font-body-data font-bold">{{ $label }} : {{ $val }}</span>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Close Button -->
        <a href="/pesanan" class="p-sm text-on-surface-variant hover:text-error transition-colors shrink-0">
          <span class="material-symbols-outlined text-3xl">close</span>
        </a>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="w-full border-collapse">
          <thead>
            <tr class="bg-surface-container text-on-surface-variant font-heading-md border-y border-outline-variant text-sm">
              <th class="py-md px-lg text-left w-12">No</th>
              <th class="py-md px-lg text-left">Nama &amp; Tanggal</th>
              <th class="py-md px-lg text-left">Posisi</th>
              <th class="py-md px-lg text-right">Harga/Pcs</th>
              <th class="py-md px-sm text-center bg-surface-container-high">S</th>
              <th class="py-md px-sm text-center bg-surface-container-high">M</th>
              <th class="py-md px-sm text-center bg-surface-container-high">L</th>
              <th class="py-md px-sm text-center bg-surface-container-high">XL</th>
              <th class="py-md px-sm text-center bg-surface-container-high">XXL</th>
              <th class="py-md px-sm text-center bg-surface-container-high">3XL</th>
              <th class="py-md px-lg text-center font-bold">Total Pcs</th>
              <th class="py-md px-lg text-right">Total Gaji (Hari itu)</th>
              <th class="py-md px-lg text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-outline-variant font-body-data">
            @forelse($logs as $index => $log)
              <tr class="hover:bg-surface-container-low transition-colors">
                <td class="py-lg px-lg text-on-surface-variant text-sm">{{ $index + 1 }}</td>

                <!-- Nama & Tanggal -->
                <td class="py-lg px-lg">
                  <span class="block text-xs text-on-primary-container bg-primary-fixed px-sm py-xs rounded mb-xs w-fit">
                    {{ \Carbon\Carbon::parse($log->tanggal_input)->format('d M Y') }}
                  </span>
                  <p class="font-bold text-on-surface text-sm">{{ $log->karyawan->nama_karyawan }}</p>
                </td>

                <td class="py-lg px-lg text-on-surface text-sm">{{ $log->tarifPeran->peran }}</td>
                <td class="py-lg px-lg text-right text-on-surface-variant text-sm">
                  Rp {{ number_format($log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}
                </td>

                <!-- Ukuran -->
                @foreach (['ukuran_s','ukuran_m','ukuran_l','ukuran_xl','ukuran_xxl','ukuran_3xl'] as $uk)
                  <td class="py-lg px-sm text-center text-sm {{ $log->$uk ? 'text-on-surface bg-surface-bright' : 'text-outline' }}">
                    {{ $log->$uk ?: '-' }}
                  </td>
                @endforeach

                <td class="py-lg px-lg text-center font-bold text-on-surface">
                  {{ $log->jumlah_selesai_hari_ini }}
                </td>
                <td class="py-lg px-lg text-right font-bold text-primary">
                  Rp {{ number_format($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}
                </td>

                <!-- Aksi -->
                <td class="py-lg px-lg text-center">
                  <div class="flex justify-center gap-sm">
                    <a href="/pesanan/{{ $pesanan->id_pesanan }}/progres/{{ $log->id_log }}/edit"
                      class="material-symbols-outlined text-primary-container hover:text-primary transition-colors"
                      title="Edit">edit_square</a>

                    <form action="/pesanan/{{ $pesanan->id_pesanan }}/progres/{{ $log->id_log }}"
                      method="POST"
                      onsubmit="return confirm('Hapus riwayat ini?');"
                      style="margin:0; display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="material-symbols-outlined text-error hover:text-on-error-container transition-colors"
                        title="Hapus">delete</button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="13" class="text-center text-on-surface-variant py-xl">
                  <span class="material-symbols-outlined block mx-auto mb-sm text-3xl text-surface-container-high">inbox</span>
                  Belum ada progres yang tercatat.
                </td>
              </tr>
            @endforelse
          </tbody>

          <!-- Tfoot: Total Realisasi -->
          @if($logs->count() > 0)
          <tfoot class="bg-surface-container-low border-t border-outline font-heading-md text-sm">
            <tr>
              <td class="py-md px-lg text-right text-on-surface-variant font-bold" colspan="4">TOTAL REALISASI:</td>
              @php
                $totalPerUkuran = ['ukuran_s','ukuran_m','ukuran_l','ukuran_xl','ukuran_xxl','ukuran_3xl'];
                $grandTotalPcs  = $logs->sum('jumlah_selesai_hari_ini');
                $grandTotalGaji = $logs->sum(fn($l) => $l->jumlah_selesai_hari_ini * $l->tarifPeran->tarif_per_pcs);
              @endphp
              @foreach($totalPerUkuran as $uk)
                @php $tot = $logs->sum($uk); @endphp
                <td class="py-md px-sm text-center {{ $tot > 0 ? 'text-primary font-bold' : 'text-outline' }}">
                  {{ $tot > 0 ? $tot : '-' }}
                </td>
              @endforeach
              <td class="py-md px-lg text-center text-primary font-extrabold">{{ $grandTotalPcs }}</td>
              <td class="py-md px-lg text-right text-primary font-extrabold">
                Rp {{ number_format($grandTotalGaji, 0, ',', '.') }}
              </td>
              <td></td>
            </tr>
          </tfoot>
          @endif

        </table>
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
  });
</script>
</body>
</html>