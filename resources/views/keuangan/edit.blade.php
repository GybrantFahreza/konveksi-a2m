<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi Kas - KONVEKSI A2M</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

        /* Navigasi & Struktur Utama */
        aside,
        header.main-top-bar,
        main {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        aside {
            width: 260px;
        }

        header.main-top-bar {
            width: calc(100% - 260px);
            margin-left: 260px;
        }

        main {
            margin-left: 260px;
        }

        /* Efek collapse sidebar kiri */
        body.sidebar-collapsed aside {
            width: 80px;
        }

        body.sidebar-collapsed aside h1,
        body.sidebar-collapsed aside .font-nav-label,
        body.sidebar-collapsed aside .mt-auto p {
            display: none;
        }

        body.sidebar-collapsed aside nav a {
            padding-left: 0;
            padding-right: 0;
            justify-content: center;
            width: 48px;
            height: 48px;
            margin: 0 auto;
        }

        body.sidebar-collapsed header.main-top-bar {
            width: calc(100% - 80px);
            margin-left: 80px;
        }

        body.sidebar-collapsed main {
            margin-left: 80px;
        }

        .mobile-overlay {
            display: none;
        }

        .form-input-focus:focus {
            outline: none;
            border-color: #2d4ea0;
            box-shadow: 0 0 0 2px rgba(45, 78, 160, 0.1);
        }

        /* Responsif Tablet / Laptop Kecil */
        @media (max-width: 1024px) {
            aside {
                width: 220px;
            }

            header.main-top-bar {
                width: calc(100% - 220px);
                margin-left: 220px;
            }

            main {
                margin-left: 220px;
            }

            body.sidebar-collapsed aside {
                width: 80px;
            }

            body.sidebar-collapsed header.main-top-bar {
                width: calc(100% - 80px);
                margin-left: 80px;
            }

            body.sidebar-collapsed main {
                margin-left: 80px;
            }
        }

        /* Responsif Handphone (Mobile) */
        @media (max-width: 768px) {
            aside {
                position: fixed;
                left: 0;
                top: 0;
                width: 260px;
                height: 100vh;
                transform: translateX(-100%);
                z-index: 70;
                transition: transform 0.3s ease;
            }

            body.mobile-sidebar-open aside {
                transform: translateX(0);
            }

            body.sidebar-collapsed aside {
                width: 260px;
            }

            body.sidebar-collapsed aside h1,
            body.sidebar-collapsed aside .font-nav-label,
            body.sidebar-collapsed aside .mt-auto p {
                display: block;
            }

            body.sidebar-collapsed aside nav a {
                width: auto;
                height: auto;
                margin: 0;
                justify-content: flex-start;
                padding-left: 16px;
                padding-right: 16px;
            }

            header.main-top-bar,
            body.sidebar-collapsed header.main-top-bar {
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

            header.main-top-bar h2 {
                font-size: 18px;
                white-space: nowrap;
            }

            .desktop-search {
                display: none;
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
            header.main-top-bar {
                height: 60px;
            }

            header.main-top-bar h2 {
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

    <div class="mobile-overlay" id="mobile-overlay"></div>

    <aside class="fixed left-0 top-0 h-screen bg-surface border-r border-outline-variant shadow-sm flex flex-col gap-lg p-lg z-50 transition-all">
        <div class="flex items-center gap-sm mb-xl">
            <div class="w-10 h-10 bg-primary-container rounded-lg flex items-center justify-center text-on-primary-container shrink-0">
                <span class="material-symbols-outlined">factory</span>
            </div>
            <h1 class="font-display-brand text-2xl text-primary">KONVEKSI A2M</h1>
        </div>

        <nav class="flex flex-col gap-sm">
            <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200" href="/">
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
            <a class="flex items-center gap-md bg-primary text-on-primary rounded-lg px-md py-sm border-l-4 border-primary-fixed translate-x-1 transition-transform duration-200" href="/keuangan">
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

    <main class="min-h-screen transition-all bg-surface-bright">

        <header class="main-top-bar fixed top-0 right-0 z-40 bg-white/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex justify-between items-center h-16 px-xl transition-all">
            <div class="flex items-center gap-md min-w-0">
                <button class="mr-2 md:mr-4 p-2 rounded-full hover:bg-surface-container transition-all text-on-surface-variant flex items-center justify-center active:scale-95 shrink-0" id="sidebar-toggle" type="button">
                    <span class="material-symbols-outlined" id="toggle-icon">menu</span>
                </button>
                <h2 class="font-heading-lg text-2xl font-bold text-on-surface truncate">MANAJEMEN KEUANGAN</h2>
            </div>

            <div class="flex items-center gap-lg top-actions shrink-0">
                <div class="relative desktop-search">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant text-base">search</span>
                    <input class="pl-10 pr-4 py-1.5 bg-surface-container-low border border-outline-variant rounded-full text-sm text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all w-64" id="global-search" placeholder="Cari data keuangan..." type="text">
                </div>
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

        <div class="page-content pt-24 px-4 sm:px-6 md:px-xl pb-xl w-full flex flex-col justify-start">
            
            <div class="w-full max-w-4xl mx-auto transition-all duration-300">

                <a class="inline-flex items-center gap-sm text-primary font-bold hover:underline mb-lg transition-all group no-underline" href="/keuangan">
                    <span class="material-symbols-outlined text-[20px] transition-transform group-hover:-translate-x-1">arrow_back</span>
                    <span class="font-heading-md">Batal & Kembali</span>
                </a>

                <div class="bg-surface-container-lowest rounded-xl soft-industrial-shadow border border-outline-variant p-6 md:p-xl w-full">
                    
                    <div class="mb-xl border-b border-surface-container-high pb-lg text-left w-full">
                        <h2 class="font-nav-label text-2xl md:text-[32px] text-on-surface font-bold leading-tight text-left">Edit Data Transaksi Kas</h2>
                        <p class="text-on-surface-variant mt-2 font-body-data text-sm md:text-base text-left">Perbarui detail rincian transaksi kas masuk atau kas keluar yang telah tersimpan.</p>
                    </div>

                    <form action="/keuangan/{{ $kas->id }}" method="POST" class="space-y-lg text-left">
                        @csrf
                        @method('PUT')

                        <div class="space-y-xs">
                            <label class="block font-heading-md text-on-surface text-sm md:text-base">Tanggal Transaksi</label>
                            <div class="relative">
                                <input class="w-full px-md py-3 border border-outline-variant rounded-lg font-body-data form-input-focus bg-surface-container-lowest appearance-none" type="date" name="tanggal_transaksi" value="{{ $kas->tanggal_transaksi }}" required>
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant material-symbols-outlined">calendar_today</span>
                            </div>
                        </div>

                        <div class="space-y-xs">
                            <label class="block font-heading-md text-on-surface text-sm md:text-base">Tipe Transaksi</label>
                            <select class="w-full px-md py-3 border border-outline-variant rounded-lg font-body-data form-input-focus transition-all duration-200 font-bold" id="tipe_arus" name="tipe_arus" required>
                                <option value="Masuk" class="bg-emerald-50 text-emerald-700 font-bold" {{ $kas->tipe_arus == 'Masuk' ? 'selected' : '' }}>Pemasukan (Masuk)</option>
                                <option value="Keluar" class="bg-rose-50 text-rose-700 font-bold" {{ $kas->tipe_arus == 'Keluar' ? 'selected' : '' }}>Pengeluaran (Keluar)</option>
                            </select>
                        </div>

                        <div class="space-y-xs">
                            <label class="block font-heading-md text-on-surface text-sm md:text-base">Kategori</label>
                            <input class="w-full px-md py-3 border border-outline-variant rounded-lg font-body-data form-input-focus bg-surface-container-lowest" type="text" name="kategori" value="{{ $kas->kategori }}" required>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-lg">
                            <div class="space-y-xs">
                                <label class="block font-heading-md text-on-surface text-sm md:text-base">Banyak</label>
                                <input class="w-full px-md py-3 border border-outline-variant rounded-lg font-body-data form-input-focus bg-surface-container-lowest" min="1" type="number" name="banyak" value="{{ $kas->banyak }}" required>
                            </div>
                            <div class="space-y-xs">
                                <label class="block font-heading-md text-on-surface text-sm md:text-base">Harga Satuan (Rp)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant font-bold">Rp</span>
                                    <input class="w-full pl-12 pr-md py-3 border border-outline-variant rounded-lg font-body-data form-input-focus bg-surface-container-lowest" type="number" name="harga" value="{{ $kas->harga }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-xs">
                            <label class="block font-heading-md text-on-surface text-sm md:text-base">Status Pembayaran</label>
                            <select class="w-full px-md py-3 border border-outline-variant rounded-lg font-body-data form-input-focus transition-all duration-200 font-bold" id="status_transaksi" name="status_transaksi" required>
                                <option value="Lunas" class="bg-emerald-50 text-emerald-700 font-bold" {{ $kas->status_transaksi == 'Lunas' ? 'selected' : '' }}>Lunas (Selesai)</option>
                                <option value="Belum Lunas" class="bg-rose-50 text-rose-700 font-bold" {{ $kas->status_transaksi == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas (Tempo)</option>
                            </select>
                        </div>

                        <div class="space-y-xs">
                            <label class="block font-heading-md text-on-surface text-sm md:text-base">Keterangan / Deskripsi</label>
                            <textarea class="w-full px-md py-md border border-outline-variant rounded-lg font-body-data form-input-focus bg-surface-container-lowest resize-none" rows="4" name="deskripsi">{{ $kas->deskripsi }}</textarea>
                        </div>

                        <div class="pt-lg">
                            <button class="w-full bg-primary text-on-primary font-heading-lg py-4 rounded-lg shadow-md hover:bg-primary-container active:scale-[0.98] transition-all flex items-center justify-center gap-md" type="submit">
                                <span class="material-symbols-outlined">save</span>
                                Update Transaksi
                            </button>
                        </div>
                    </form>
                </div>

                <div class="mt-xl grid grid-cols-1 sm:grid-cols-2 gap-lg w-full text-left">
                    <div class="p-lg bg-secondary-container/10 border border-secondary-container/30 rounded-xl flex items-start gap-md">
                        <span class="material-symbols-outlined text-secondary">info</span>
                        <div>
                            <p class="font-heading-md text-secondary text-sm md:text-base">Riwayat Perubahan</p>
                            <p class="text-[12px] text-on-surface-variant leading-relaxed">Setiap modifikasi data akan dicatat pada sistem log finansial internal secara otomatis untuk kebutuhan audit.</p>
                        </div>
                    </div>
                    <div class="p-lg bg-surface-container-high rounded-xl flex items-start gap-md">
                        <span class="material-symbols-outlined text-on-surface-variant">schedule</span>
                        <div>
                            <p class="font-heading-md text-on-surface text-sm md:text-base">Waktu Perubahan</p>
                            <p class="text-[12px] text-on-surface-variant leading-relaxed font-bold">16 Mei 2026, 14:20 WIB</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script>
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const toggleIcon = document.getElementById('toggle-icon');
        const mobileOverlay = document.getElementById('mobile-overlay');
        const tipeArusSelect = document.getElementById('tipe_arus');
        const statusTransaksiSelect = document.getElementById('status_transaksi');

        // Fungsi Auto-Highlight Warna Kolom Tipe Arus Kas
        function updateTipeArusColor() {
            if (tipeArusSelect.value === 'Masuk') {
                tipeArusSelect.className = "w-full px-md py-3 border border-emerald-300 rounded-lg font-body-data form-input-focus bg-emerald-50 text-emerald-800 font-bold";
            } else if (tipeArusSelect.value === 'Keluar') {
                tipeArusSelect.className = "w-full px-md py-3 border border-rose-300 rounded-lg font-body-data form-input-focus bg-rose-50 text-rose-800 font-bold";
            }
        }

        // Fungsi Auto-Highlight Warna Kolom Status Pembayaran
        function updateStatusTransaksiColor() {
            if (statusTransaksiSelect.value === 'Lunas') {
                statusTransaksiSelect.className = "w-full px-md py-3 border border-emerald-300 rounded-lg font-body-data form-input-focus bg-emerald-50 text-emerald-800 font-bold";
            } else if (statusTransaksiSelect.value === 'Belum Lunas') {
                statusTransaksiSelect.className = "w-full px-md py-3 border border-rose-300 rounded-lg font-body-data form-input-focus bg-rose-50 text-rose-800 font-bold";
            }
        }

        // Jalankan pendeteksi warna saat halaman dimuat
        if (tipeArusSelect) {
            updateTipeArusColor();
            tipeArusSelect.addEventListener('change', updateTipeArusColor);
        }
        
        if (statusTransaksiSelect) {
            updateStatusTransaksiColor();
            statusTransaksiSelect.addEventListener('change', updateStatusTransaksiColor);
        }

        function isMobileLayout() {
            return window.innerWidth <= 768;
        }

        function closeMobileSidebar() {
            document.body.classList.remove('mobile-sidebar-open');
            if (toggleIcon) {
                toggleIcon.textContent = 'menu';
            }
        }

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
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
    </script>
</body>

</html>