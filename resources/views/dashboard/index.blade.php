<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Konveksi A2M</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN + Plugins -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Carlito:wght@400;700&family=Newsreader:opsz,wght@6..72,400;500;600;700&family=Caladea:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <!-- Tailwind Custom Config -->
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
      .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      }
      body {
        background-color: #f7fafd;
      }
      .soft-industrial-shadow {
        box-shadow: 0 2px 12px rgba(24, 93, 131, 0.05);
      }
      aside, header, main {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }
      body.sidebar-collapsed aside { width: 80px; }
      body.sidebar-collapsed aside h1,
      body.sidebar-collapsed aside .font-nav-label,
      body.sidebar-collapsed aside .mt-auto p { display: none; }
      body.sidebar-collapsed aside nav a {
        padding-left: 0; padding-right: 0; justify-content: center;
        width: 48px; height: 48px; margin: 0 auto;
      }
      body.sidebar-collapsed header { width: calc(100% - 80px); margin-left: 80px; }
      body.sidebar-collapsed main { margin-left: 80px; }
      header { width: calc(100% - 260px); margin-left: 260px; }
      main { margin-left: 260px; }
    </style>
</head>
<body class="font-body-main text-on-surface">

<!-- Sidebar -->
<aside class="fixed left-0 top-0 h-screen w-[260px] bg-surface border-r border-outline-variant shadow-sm flex flex-col gap-lg p-lg z-50 transition-all">
  <div class="flex items-center gap-sm mb-xl">
    <div class="w-10 h-10 bg-primary-container rounded-lg flex items-center justify-center text-on-primary-container">
      <span class="material-symbols-outlined">factory</span>
    </div>
    <h1 class="font-display-brand text-2xl text-primary">KONVEKSI A2M</h1>
  </div>
  <nav class="flex flex-col gap-sm">
    <a class="flex items-center gap-md bg-primary text-on-primary rounded-lg px-md py-sm border-l-4 border-primary-fixed translate-x-1 transition-transform duration-200" href="#">
      <span class="material-symbols-outlined">dashboard</span>
      <span class="font-nav-label">Dashboard</span>
    </a>
    <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200" href="/karyawan">
      <span class="material-symbols-outlined">groups</span>
      <span class="font-nav-label">Karyawan</span>
    </a>
    <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200" href="/stok">
      <span class="material-symbols-outlined">inventory_2</span>
      <span class="font-nav-label">Stok</span>
    </a>
    <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200" href="/pesanan">
      <span class="material-symbols-outlined">shopping_cart</span>
      <span class="font-nav-label">Pesanan</span>
    </a>
    <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200" href="/keuangan">
      <span class="material-symbols-outlined">payments</span>
      <span class="font-nav-label">Keuangan</span>
    </a>
  </nav>
  <div class="mt-auto pt-lg border-t border-outline-variant">
    <div class="flex items-center gap-sm px-md">
      <div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center">
        <span class="material-symbols-outlined text-secondary">person</span>
      </div>
      <div class="overflow-hidden">
        <p class="text-xs font-bold text-on-surface truncate">Administrator</p>
        <p class="text-[10px] text-on-surface-variant truncate">admin@a2mkonveksi.com</p>
      </div>
    </div>
  </div>
</aside>

<!-- Main Content Area -->
<main class="min-h-screen transition-all bg-surface-bright">

  <!-- TopAppBar / Header -->
  <header class="fixed top-0 right-0 z-40 bg-white/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex justify-between items-center h-16 px-xl transition-all">
    <div class="flex items-center gap-md">
      <button class="mr-4 p-2 rounded-full hover:bg-surface-container transition-all text-on-surface-variant flex items-center justify-center active:scale-95" id="sidebar-toggle">
        <span class="material-symbols-outlined" id="toggle-icon">menu</span>
      </button>
      <h2 class="font-heading-lg text-2xl font-bold text-on-surface">DASHBOARD</h2>
    </div>
    <div class="flex items-center gap-lg">
      <!-- Live Date -->
      <div class="hidden lg:flex items-center gap-2 bg-surface-container-low border border-outline-variant px-4 py-1.5 rounded-full text-sm text-on-surface-variant font-bold">
        <span class="material-symbols-outlined text-base">calendar_month</span>
        <span id="live-date">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</span>
      </div>
      <!-- Notification & Settings -->
      <div class="flex items-center gap-sm">
        <button class="hover:bg-surface-container rounded-full p-2 text-on-surface-variant transition-all active:scale-95">
          <span class="material-symbols-outlined">notifications</span>
        </button>
        <button class="hover:bg-surface-container rounded-full p-2 text-on-surface-variant transition-all active:scale-95">
          <span class="material-symbols-outlined">settings</span>
        </button>
      </div>
      <!-- Logout -->
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-error text-on-error border-none px-5 py-2 rounded-lg font-bold flex items-center gap-2 hover:bg-error/80 transition-all text-sm">
          <span class="material-symbols-outlined text-base">logout</span> Keluar
        </button>
      </form>
    </div>
  </header>

  <!-- Page Content -->
  <div class="pt-24 px-xl pb-xl space-y-lg">

    <!-- Statistics Bento Grid — 4 kolom -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-lg">

      <!-- Pesanan Aktif -->
      <div class="bg-white p-lg rounded-xl border border-outline-variant soft-industrial-shadow group hover:border-primary transition-colors">
        <div class="flex justify-between items-start mb-md">
          <div class="p-sm bg-primary/10 rounded-lg">
            <span class="material-symbols-outlined text-primary">shopping_basket</span>
          </div>
          <span class="text-xs text-primary font-bold bg-primary/5 px-2 py-0.5 rounded">Real-time</span>
        </div>
        <p class="text-on-surface-variant text-sm font-body-main">Pesanan Sedang Dikerjakan</p>
        <h3 class="text-3xl font-heading-lg mt-1">{{ $pesananAktif }} <span class="text-base text-on-surface-variant font-normal">Proyek</span></h3>
      </div>

      <!-- Karyawan Hadir -->
      <div class="bg-white p-lg rounded-xl border border-outline-variant soft-industrial-shadow group hover:border-primary transition-colors">
        <div class="flex justify-between items-start mb-md">
          <div class="p-sm bg-secondary/10 rounded-lg">
            <span class="material-symbols-outlined text-secondary">badge</span>
          </div>
          <span class="text-xs text-secondary font-bold bg-secondary/5 px-2 py-0.5 rounded">Hari Ini</span>
        </div>
        <p class="text-on-surface-variant text-sm font-body-main">Karyawan Hadir</p>
        <div class="flex items-baseline gap-1 mt-1">
          <h3 class="text-3xl font-heading-lg">{{ $karyawanHadir }}</h3>
          <span class="text-on-surface-variant font-heading-md">/ {{ $totalKaryawan }} Orang</span>
        </div>
      </div>

      <!-- Saldo / Keuangan -->
      <div class="bg-white p-lg rounded-xl border border-outline-variant soft-industrial-shadow group hover:border-primary transition-colors">
        <div class="flex justify-between items-start mb-md">
          <div class="p-sm bg-tertiary/10 rounded-lg">
            <span class="material-symbols-outlined text-tertiary">account_balance_wallet</span>
          </div>
          <span class="text-xs text-tertiary font-bold bg-tertiary/5 px-2 py-0.5 rounded">Saldo Kas</span>
        </div>
        <p class="text-on-surface-variant text-sm font-body-main">Keuangan Perusahaan</p>
        <h3 class="text-2xl font-heading-lg mt-1">Rp {{ number_format($saldoKas, 0, ',', '.') }}</h3>
      </div>

      <!-- Stok Kritis (jumlah item kritis) -->
      <div class="bg-white p-lg rounded-xl border border-outline-variant soft-industrial-shadow group hover:border-error transition-colors">
        <div class="flex justify-between items-start mb-md">
          <div class="p-sm bg-error/10 rounded-lg">
            <span class="material-symbols-outlined text-error">warning</span>
          </div>
          <span class="text-xs text-error font-bold bg-error/5 px-2 py-0.5 rounded">Perlu Tindakan</span>
        </div>
        <p class="text-on-surface-variant text-sm font-body-main">Stok Kritis</p>
        <h3 class="text-3xl font-heading-lg mt-1">
          {{ $stokBahanKritis->count() + $stokBarangJadiKritis->count() }}
          <span class="text-base text-on-surface-variant font-normal">Item</span>
        </h3>
      </div>

    </div>

    <!-- Panel Bawah: Deadline + Stok Kritis -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-lg">

      <!-- Deadline Pesanan Terdekat (2/3 width) -->
      <div class="xl:col-span-2 bg-white rounded-xl border border-outline-variant soft-industrial-shadow overflow-hidden flex flex-col">
        <div class="p-lg border-b border-outline-variant flex justify-between items-center">
          <h3 class="font-heading-md text-on-surface flex items-center gap-sm">
            <span class="material-symbols-outlined text-primary">schedule</span>
            Deadline Pesanan Terdekat
          </h3>
          <a href="/pesanan" class="text-primary text-sm font-bold hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead class="bg-surface-container-low">
              <tr>
                <th class="px-lg py-md font-heading-md text-sm text-on-surface-variant">Nama Proyek</th>
                <th class="px-lg py-md font-heading-md text-sm text-on-surface-variant">Klien</th>
                <th class="px-lg py-md font-heading-md text-sm text-on-surface-variant">Tenggat Waktu</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant">
              @forelse($pesananMendesak as $pesanan)
                <tr class="hover:bg-surface-container-lowest transition-colors">
                  <td class="px-lg py-md font-bold text-on-surface">{{ $pesanan->nama_pesanan }}</td>
                  <td class="px-lg py-md font-body-main text-on-surface-variant">{{ $pesanan->nama_klien }}</td>
                  <td class="px-lg py-md">
                    <span class="inline-block px-3 py-1 rounded font-bold text-xs
                      {{ \Carbon\Carbon::parse($pesanan->tanggal_deadline)->isPast() ? 'bg-error/15 text-error' : 'bg-primary/10 text-primary' }}">
                      {{ \Carbon\Carbon::parse($pesanan->tanggal_deadline)->format('d M Y') }}
                    </span>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="3" class="text-center text-on-surface-variant py-8">
                    <span class="material-symbols-outlined block mx-auto mb-2 text-3xl text-surface-container-high">check_circle</span>
                    Tidak ada pesanan aktif saat ini.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Peringatan Stok Kritis (1/3 width) -->
      <div class="bg-white rounded-xl border border-outline-variant soft-industrial-shadow flex flex-col">
        <div class="p-lg border-b border-outline-variant flex justify-between items-center">
          <h3 class="font-heading-md text-on-surface flex items-center gap-sm">
            <span class="material-symbols-outlined text-error">inventory</span>
            Stok Kritis
          </h3>
        </div>
        <div class="p-lg space-y-md flex-1 overflow-y-auto">

          @forelse($stokBahanKritis as $bahan)
            <div class="flex justify-between items-center p-sm rounded-lg bg-surface-container-low border border-transparent hover:border-error/40 transition-all">
              <div class="flex items-center gap-md">
                <div class="w-10 h-10 bg-white rounded border border-outline-variant flex items-center justify-center flex-shrink-0">
                  <span class="material-symbols-outlined text-on-surface-variant">texture</span>
                </div>
                <div>
                  <p class="font-body-main font-bold text-sm">{{ $bahan->nama_bahan }}</p>
                  <p class="text-xs text-on-surface-variant font-body-data">Bahan Baku</p>
                </div>
              </div>
              <div class="text-right flex-shrink-0">
                <p class="font-body-data font-bold text-sm">{{ $bahan->stok_sekarang }} {{ $bahan->satuan }}</p>
                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-error/15 text-error">Kritis</span>
              </div>
            </div>
          @empty
          @endforelse

          @forelse($stokBarangJadiKritis as $barang)
            <div class="flex justify-between items-center p-sm rounded-lg bg-surface-container-low border border-transparent hover:border-error/40 transition-all">
              <div class="flex items-center gap-md">
                <div class="w-10 h-10 bg-white rounded border border-outline-variant flex items-center justify-center flex-shrink-0">
                  <span class="material-symbols-outlined text-on-surface-variant">checkroom</span>
                </div>
                <div>
                  <p class="font-body-main font-bold text-sm">{{ $barang->nama_barang }}</p>
                  <p class="text-xs text-on-surface-variant font-body-data">Ukuran {{ $barang->ukuran }}</p>
                </div>
              </div>
              <div class="text-right flex-shrink-0">
                <p class="font-body-data font-bold text-sm">{{ $barang->stok_sekarang }} Pcs</p>
                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-error/15 text-error">Kritis</span>
              </div>
            </div>
          @empty
          @endforelse

          @if ($stokBahanKritis->isEmpty() && $stokBarangJadiKritis->isEmpty())
            <div class="text-center text-tertiary py-8">
              <span class="material-symbols-outlined block mx-auto mb-2 text-4xl">verified</span>
              <p class="font-bold text-sm">Semua stok aman!</p>
              <p class="text-xs text-on-surface-variant mt-1">Bahan baku &amp; barang jadi terkendali.</p>
            </div>
          @endif

        </div>
        <div class="p-lg pt-0">
          <a href="/stok" class="w-full py-2 bg-primary text-on-primary rounded-lg font-bold text-sm hover:bg-primary-container hover:text-on-primary-container transition-colors flex items-center justify-center gap-sm">
            <span class="material-symbols-outlined text-sm">open_in_new</span>
            Kelola Stok
          </a>
        </div>
      </div>

    </div>

    <!-- Banner CTA -->
    <div class="bg-primary-container rounded-xl overflow-hidden relative min-h-[160px] flex items-center">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
      </div>
      <div class="relative z-10 p-xl flex flex-col md:flex-row justify-between items-center w-full gap-lg">
        <div class="text-on-primary-container max-w-lg">
          <h2 class="font-heading-lg text-xl font-bold mb-sm">Optimalkan Produksi Anda</h2>
          <p class="font-body-main opacity-90 text-sm">Sistem manajemen terintegrasi membantu memantau setiap detail produksi. Pastikan kualitas terbaik untuk pelanggan A2M dengan data yang akurat.</p>
        </div>
        <div class="flex gap-md flex-shrink-0">
          <a href="/keuangan" class="px-lg py-2.5 bg-white text-primary rounded-lg font-bold text-sm shadow-sm hover:bg-surface-container-low transition-all">Laporan Keuangan</a>
          <a href="/pesanan" class="px-lg py-2.5 border border-white/30 text-on-primary-container rounded-lg font-bold text-sm hover:bg-white/10 transition-all">Kelola Pesanan</a>
        </div>
      </div>
    </div>

  </div><!-- /Page Content -->
</main>

<!-- FAB -->
<a href="/pesanan/create" class="fixed bottom-lg right-lg w-14 h-14 bg-primary text-on-primary rounded-full shadow-lg flex items-center justify-center hover:scale-105 active:scale-95 transition-all z-50">
  <span class="material-symbols-outlined text-2xl">add</span>
</a>

<!-- Sidebar Toggle Script -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('sidebar-toggle');
    const toggleIcon = document.getElementById('toggle-icon');
    const body = document.body;
    if (toggleBtn) {
      toggleBtn.addEventListener('click', () => {
        body.classList.toggle('sidebar-collapsed');
        toggleIcon.textContent = body.classList.contains('sidebar-collapsed') ? 'menu_open' : 'menu';
      });
    }
  });
</script>
</body>
</html>