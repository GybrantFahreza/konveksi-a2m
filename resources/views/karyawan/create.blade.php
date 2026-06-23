<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan Baru - KONVEKSI A2M</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Carlito:wght@400;700&family=Newsreader:wght@400;500;700&family=Caladea:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "surface-dim": "#d7dadd",
              "surface-container-lowest": "#ffffff",
              "secondary": "#22648a",
              "on-tertiary-container": "#baff9f",
              "on-primary-fixed": "#00184a",
              "outline": "#747683",
              "inverse-primary": "#b3c5ff",
              "surface": "#f7fafd",
              "on-background": "#181c1e",
              "inverse-on-surface": "#eef1f4",
              "primary-fixed-dim": "#b3c5ff",
              "on-secondary-fixed-variant": "#004c6e",
              "secondary-fixed-dim": "#93cdf8",
              "on-tertiary": "#ffffff",
              "on-secondary-container": "#155b81",
              "tertiary": "#156000",
              "primary": "#2d4ea0",
              "surface-variant": "#e0e3e6",
              "secondary-container": "#98d3fe",
              "on-secondary-fixed": "#001e2f",
              "on-secondary": "#ffffff",
              "on-error-container": "#93000a",
              "error": "#ba1a1a",
              "surface-container-highest": "#e0e3e6",
              "surface-container-high": "#e5e8eb",
              "primary-fixed": "#dbe1ff",
              "on-primary-container": "#e9ecff",
              "surface-container": "#ebeef1",
              "surface-bright": "#f7fafd",
              "inverse-surface": "#2d3133",
              "surface-tint": "#3a5aac",
              "primary-container": "#4867ba",
              "on-primary-fixed-variant": "#1e4293",
              "tertiary-container": "#1e7c00",
              "surface-container-low": "#f1f4f7",
              "outline-variant": "#c4c6d3",
              "on-error": "#ffffff",
              "error-container": "#ffdad6",
              "background": "#f7fafd",
              "secondary-fixed": "#c9e6ff",
              "on-surface": "#181c1e",
              "on-surface-variant": "#444651",
              "on-primary": "#ffffff"
            },
            borderRadius: {
              "DEFAULT": "0.25rem",
              "lg": "0.5rem",
              "xl": "0.75rem",
              "full": "9999px"
            },
            spacing: {
              "gutter": "20px",
              "md": "16px",
              "xs": "4px",
              "sm": "8px",
              "container-padding": "24px",
              "xl": "32px",
              "lg": "24px",
              "unit": "4px"
            },
            fontFamily: {
              "body-data": ["Caladea"],
              "heading-lg": ["Carlito"],
              "caption": ["Carlito"],
              "nav-label": ["Newsreader"],
              "display-brand": ["Newsreader"],
              "heading-md": ["Carlito"],
              "body-main": ["Carlito"]
            }
          }
        }
      };
    </script>
    <style>
      * {
        box-sizing: border-box;
      }

      html,
      body {
        width: 100%;
        min-height: 100%;
        overflow-x: hidden;
      }

      body {
        background-color: #f7fafd;
      }

      .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      }

      .soft-industrial-shadow {
        box-shadow: 0 2px 12px rgba(24, 93, 131, 0.05);
      }

      #main-sidebar,
      header,
      main {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }

      #main-sidebar {
        width: 260px;
      }

      header {
        width: calc(100% - 260px);
        margin-left: 260px;
      }

      main {
        margin-left: 260px;
      }

      body.sidebar-collapsed #main-sidebar {
        width: 80px;
      }

      body.sidebar-collapsed #main-sidebar h1,
      body.sidebar-collapsed #main-sidebar .font-nav-label,
      body.sidebar-collapsed #main-sidebar .mt-auto p {
        display: none;
      }

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

      body.sidebar-collapsed main {
        margin-left: 80px;
      }

      .mobile-overlay {
        display: none;
      }

      @media (max-width: 1024px) {
        #main-sidebar {
          width: 220px;
        }

        header {
          width: calc(100% - 220px);
          margin-left: 220px;
        }

        main {
          margin-left: 220px;
        }

        body.sidebar-collapsed #main-sidebar {
          width: 80px;
        }

        body.sidebar-collapsed header {
          width: calc(100% - 80px);
          margin-left: 80px;
        }

        body.sidebar-collapsed main {
          margin-left: 80px;
        }
      }

      @media (max-width: 768px) {
        #main-sidebar {
          position: fixed;
          left: 0;
          top: 0;
          width: 260px;
          height: 100vh;
          transform: translateX(-100%);
          z-index: 70;
        }

        body.mobile-sidebar-open #main-sidebar {
          transform: translateX(0);
        }

        body.sidebar-collapsed #main-sidebar {
          width: 260px;
        }

        body.sidebar-collapsed #main-sidebar h1,
        body.sidebar-collapsed #main-sidebar .font-nav-label,
        body.sidebar-collapsed #main-sidebar .mt-auto p {
          display: block;
        }

        body.sidebar-collapsed #main-sidebar nav a {
          width: auto;
          height: auto;
          margin: 0;
          justify-content: flex-start;
          padding-left: 16px;
          padding-right: 16px;
        }

        header,
        body.sidebar-collapsed header {
          width: 100%;
          margin-left: 0;
          padding-left: 16px;
          padding-right: 16px;
        }

        main,
        body.sidebar-collapsed main {
          margin-left: 0;
          width: 100%;
        }

        .mobile-overlay {
          display: block;
          position: fixed;
          inset: 0;
          background-color: rgba(0, 0, 0, 0.35);
          z-index: 60;
          opacity: 0;
          pointer-events: none;
          transition: opacity 0.25s ease;
        }

        body.mobile-sidebar-open .mobile-overlay {
          opacity: 1;
          pointer-events: auto;
        }

        .dashboard-date-pill {
          display: none;
        }

        header h2 {
          font-size: 18px;
          white-space: nowrap;
        }

        .page-content {
          padding-left: 16px;
          padding-right: 16px;
          padding-top: 88px;
        }

        .logout-text {
          display: none;
        }

        .logout-btn {
          padding: 8px 10px;
        }
      }

      @media (max-width: 480px) {
        header {
          height: 60px;
        }

        header h2 {
          font-size: 16px;
        }

        .page-content {
          padding-top: 80px;
          padding-left: 12px;
          padding-right: 12px;
        }

        .top-actions {
          gap: 6px;
        }

        .hide-on-small {
          display: none;
        }
      }
    </style>
</head>
<body class="font-body-main text-on-surface">

<!-- Mobile Overlay -->
<div class="mobile-overlay" id="mobile-overlay"></div>

<!-- Sidebar -->
<aside id="main-sidebar" class="fixed left-0 top-0 h-screen bg-surface border-r border-outline-variant shadow-sm flex flex-col gap-lg p-lg z-50 transition-all">
  <div class="flex items-center gap-sm mb-xl">
    <div class="w-10 h-10 bg-primary-container rounded-lg flex items-center justify-center text-on-primary-container shrink-0">
      <span class="material-symbols-outlined">factory</span>
    </div>

    <h1 class="font-display-brand text-2xl text-primary">
      KONVEKSI A2M
    </h1>
  </div>

  <nav class="flex flex-col gap-sm">
    <a class="flex items-center gap-md bg-primary text-on-primary rounded-lg px-md py-sm border-l-4 border-primary-fixed translate-x-1 transition-transform duration-200" href="/">
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
      <div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center shrink-0">
        <span class="material-symbols-outlined text-secondary">person</span>
      </div>

      <div class="overflow-hidden">
        <p class="text-xs font-bold text-on-surface truncate">
          Administrator
        </p>
        <p class="text-[10px] text-on-surface-variant truncate">
          admin@a2mkonveksi.com
        </p>
      </div>
    </div>
  </div>
</aside>

<!-- Header -->
<header class="fixed top-0 z-40 bg-surface border-b border-outline-variant shadow-sm flex items-center justify-between h-16 px-lg">
  <div class="flex items-center gap-md">
    <button class="p-sm hover:bg-surface-container-high transition-colors rounded-full text-on-surface-variant" id="sidebar-toggle">
      <span class="material-symbols-outlined" id="toggle-icon">menu</span>
    </button>
    <a href="/karyawan" class="p-sm hover:bg-surface-container-high transition-colors rounded-full text-on-surface-variant" title="Kembali ke Daftar Karyawan">
      <span class="material-symbols-outlined">arrow_back</span>
    </a>
    <h2 class="font-heading-md font-bold text-primary">Tambah Karyawan Baru</h2>
  </div>
  <div class="flex items-center gap-md top-actions">
    <button class="p-sm hover:bg-surface-container-high transition-colors rounded-full text-on-surface-variant hide-on-small">
      <span class="material-symbols-outlined">notifications</span>
    </button>
    <button class="p-sm hover:bg-surface-container-high transition-colors rounded-full text-on-surface-variant hide-on-small">
      <span class="material-symbols-outlined">settings</span>
    </button>
    <div class="flex items-center gap-sm cursor-pointer hover:bg-surface-container-high px-sm py-xs rounded-lg transition-colors hide-on-small">
      <span class="material-symbols-outlined text-primary">account_circle</span>
      <span class="font-body-main font-bold text-on-surface text-sm">Administrator</span>
    </div>
  </div>
</header>

<!-- Main Content -->
<main class="min-h-screen bg-background pt-24 page-content">
  <div class="px-xl pb-xl flex justify-center items-start">
    <div class="w-full max-w-2xl bg-surface-container-lowest border border-outline-variant shadow-[0px_2px_12px_rgba(24,93,131,0.05)] rounded-xl overflow-hidden">

      <!-- Form Header Decoration -->
      <div class="h-32 relative overflow-hidden bg-primary-container">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, rgba(255,255,255,0.04) 0px, rgba(255,255,255,0.04) 1px, transparent 1px, transparent 12px); background-size: 12px 12px;"></div>
        <div class="absolute inset-0 flex flex-col justify-end p-lg bg-gradient-to-t from-primary-container/90 to-transparent">
          <h3 class="font-nav-label text-on-primary-container text-2xl font-bold">Informasi Personel</h3>
          <p class="font-caption text-on-primary-container/80 text-sm">Lengkapi data untuk mendaftarkan karyawan baru ke sistem produksi.</p>
        </div>
      </div>

      <!-- Form Content -->
      <form action="/karyawan" method="POST" class="p-lg space-y-lg">
        @csrf

        <!-- Nama Lengkap -->
        <div class="space-y-xs">
          <label class="font-nav-label text-on-surface-variant font-bold flex items-center gap-xs text-sm" for="nama_karyawan">
            <span class="material-symbols-outlined text-sm">person</span>
            Nama Lengkap Karyawan
          </label>
          <input
            class="w-full bg-surface border border-outline-variant rounded-lg px-md py-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-main placeholder:text-outline-variant"
            id="nama_karyawan"
            name="nama_karyawan"
            type="text"
            placeholder="Masukkan nama lengkap"
            required
          >
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
          <!-- No. HP -->
          <div class="space-y-xs">
            <label class="font-nav-label text-on-surface-variant font-bold flex items-center gap-xs text-sm" for="no_hp">
              <span class="material-symbols-outlined text-sm">call</span>
              No. HP / WhatsApp
            </label>
            <input
              class="w-full bg-surface border border-outline-variant rounded-lg px-md py-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-main placeholder:text-outline-variant"
              id="no_hp"
              name="no_hp"
              type="text"
              placeholder="Contoh: 0812..."
            >
          </div>

          <!-- Jenis Kelamin -->
          <div class="space-y-xs">
            <label class="font-nav-label text-on-surface-variant font-bold flex items-center gap-xs text-sm" for="jenis_kelamin">
              <span class="material-symbols-outlined text-sm">wc</span>
              Jenis Kelamin
            </label>
            <div class="relative">
              <select
                class="w-full appearance-none bg-surface border border-outline-variant rounded-lg px-md py-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-main cursor-pointer"
                id="jenis_kelamin"
                name="jenis_kelamin"
                required
              >
                <option value="" disabled selected>-- Pilih --</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-sm pointer-events-none text-outline">
                <span class="material-symbols-outlined">expand_more</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Info Banner -->
        <div class="pt-md border-t border-outline-variant/30">
          <div class="bg-surface-container-low p-md rounded-lg flex items-start gap-md border border-outline-variant/20">
            <div class="p-sm bg-secondary-container text-on-secondary-container rounded-full flex-shrink-0">
              <span class="material-symbols-outlined">info</span>
            </div>
            <div class="space-y-xs">
              <p class="font-body-main font-bold text-on-surface">Status Aktivasi Otomatis</p>
              <p class="font-caption text-on-surface-variant text-xs">Karyawan yang baru ditambahkan akan langsung berstatus <strong>Aktif</strong> dan tersedia untuk penugasan di modul Produksi.</p>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end gap-md pt-lg">
          <a href="/karyawan"
            class="px-xl py-sm font-heading-md text-secondary border-2 border-secondary rounded-lg hover:bg-secondary/5 transition-colors font-bold text-sm">
            Batal
          </a>
          <button
            type="submit"
            class="px-xl py-sm font-heading-md text-on-primary bg-primary rounded-lg shadow-md hover:bg-primary-container hover:text-on-primary-container transition-all font-bold text-sm">
            Simpan Karyawan
          </button>
        </div>

      </form>

      <!-- Form Footer -->
      <div class="bg-surface-variant/20 px-lg py-sm border-t border-outline-variant/20 flex justify-between items-center">
        <span class="font-caption text-outline text-xs italic">Form: Pendaftaran Karyawan Baru</span>
        <div class="flex gap-xs items-center opacity-50">
          <span class="w-2 h-2 rounded-full bg-secondary"></span>
          <span class="w-2 h-2 rounded-full bg-outline-variant"></span>
          <span class="w-2 h-2 rounded-full bg-outline-variant"></span>
        </div>
      </div>

    </div>
  </div>

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

<!-- Sidebar Toggle Script -->
<script>
  const toggleBtn = document.getElementById('sidebar-toggle');
  const toggleIcon = document.getElementById('toggle-icon');
  const overlay = document.getElementById('mobile-overlay');
  const body = document.body;
  const isMobile = () => window.innerWidth <= 768;

  if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
      if (isMobile()) {
        body.classList.toggle('mobile-sidebar-open');
      } else {
        body.classList.toggle('sidebar-collapsed');
        toggleIcon.textContent = body.classList.contains('sidebar-collapsed') ? 'menu_open' : 'menu';
      }
    });
  }

  if (overlay) {
    overlay.addEventListener('click', () => {
      body.classList.remove('mobile-sidebar-open');
    });
  }
</script>
</body>
</html>