<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <title>Edit Stok Bahan Baku - Konveksi A2M</title>
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

        .btn-warning-clear {
            background-color: #f39c12;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(243, 156, 18, 0.22);
        }

        .btn-warning-clear:hover {
            background-color: #d68910;
        }

        .input-field {
            width: 100%;
            padding: 16px;
            background-color: #f7fafd;
            border: 1px solid #c4c6d3;
            border-radius: 0.5rem;
            color: #181c1e;
            outline: none;
            transition: all 0.2s ease;
        }

        .input-field:focus {
            border-color: #2d4ea0;
            box-shadow: 0 0 0 3px rgba(45, 78, 160, 0.16);
        }

        .input-field::placeholder {
            color: #747683;
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

            .desktop-search {
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

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .form-actions a,
            .form-actions button {
                width: 100%;
                justify-content: center;
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

            .preview-square {
                min-height: 260px;
            }
        }
    </style>
</head>

<body class="font-body-main text-on-surface">

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
            <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200" href="/">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-nav-label">Dashboard</span>
            </a>

            <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200" href="/karyawan">
                <span class="material-symbols-outlined">groups</span>
                <span class="font-nav-label">Karyawan</span>
            </a>

            <a class="flex items-center gap-md bg-primary text-on-primary rounded-lg px-md py-sm border-l-4 border-primary-fixed translate-x-1 transition-transform duration-200" href="/stok">
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

    <!-- Main Content Area -->
    <main class="min-h-screen transition-all bg-surface-bright">

        <!-- Top App Bar -->
        <header class="fixed top-0 right-0 z-40 bg-white/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex justify-between items-center h-16 px-xl transition-all">
            <div class="flex items-center gap-md min-w-0">
                <button class="mr-2 md:mr-4 p-2 rounded-full hover:bg-surface-container transition-all text-on-surface-variant flex items-center justify-center active:scale-95 shrink-0" id="sidebar-toggle" type="button">
                    <span class="material-symbols-outlined" id="toggle-icon">menu</span>
                </button>

                <h2 class="font-heading-lg text-2xl font-bold text-on-surface truncate">
                    STOK PRODUKSI
                </h2>
            </div>

            <div class="flex items-center gap-lg top-actions shrink-0">
                <div class="relative desktop-search">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant text-base">
                        search
                    </span>

                    <input
                        class="pl-10 pr-4 py-1.5 bg-surface-container-low border border-outline-variant rounded-full text-sm text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all w-64"
                        placeholder="Cari data stok..."
                        type="text">
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

        <!-- Page Content -->
        <div class="page-content pt-24 px-xl pb-xl space-y-lg">

            <!-- Breadcrumbs / Context Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-md">
                <div>
                    <div class="flex items-center gap-sm text-sm text-on-surface-variant mb-sm">
                        <a href="/stok" class="hover:text-primary transition-colors no-underline">
                            Manajemen Stok
                        </a>
                        <span class="material-symbols-outlined text-base">chevron_right</span>
                        <span class="text-primary font-bold">Edit Bahan Baku</span>
                    </div>

                    <h1 class="font-heading-lg text-3xl font-bold text-on-surface">
                        Edit Data Bahan Baku
                    </h1>

                    <p class="font-body-main text-on-surface-variant mt-xs max-w-2xl">
                        Perbarui rincian bahan baku, jumlah stok, satuan, dan batas kritis agar data gudang tetap sesuai dengan kondisi terbaru.
                    </p>
                </div>

                <a href="/stok" class="w-11 h-11 flex items-center justify-center rounded-full hover:bg-surface-container-high text-on-surface-variant transition-colors no-underline border border-outline-variant bg-white soft-industrial-shadow">
                    <span class="material-symbols-outlined text-2xl">close</span>
                </a>
            </div>

            <!-- Form Card -->
            <form action="/stok/{{ $stok->id_bahan }}" method="POST" class="bg-surface-container-lowest border border-outline-variant rounded-xl soft-industrial-shadow overflow-hidden">
                @csrf
                @method('PUT')

                <div class="p-xl border-b border-outline-variant">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-xl">

                        <!-- Form Section -->
                        <div class="lg:col-span-8 space-y-lg">

                            <!-- Nama Bahan -->
                            <div class="space-y-sm">
                                <label class="font-heading-md text-sm text-on-surface flex items-center gap-xs" for="nama_bahan">
                                    Nama Bahan / Atribut
                                    <span class="text-error">*</span>
                                </label>

                                <input
                                    class="input-field font-body-main"
                                    id="nama_bahan"
                                    name="nama_bahan"
                                    value="{{ $stok->nama_bahan }}"
                                    placeholder="Contoh: Kain Fleece Hitam"
                                    type="text"
                                    required
                                    autofocus>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-lg">

                                <!-- Jumlah Stok -->
                                <div class="space-y-sm">
                                    <label class="font-heading-md text-sm text-on-surface flex items-center gap-xs" for="stok_sekarang">
                                        Jumlah Stok
                                        <span class="text-error">*</span>
                                    </label>

                                    <input
                                        class="input-field font-body-main"
                                        id="stok_sekarang"
                                        name="stok_sekarang"
                                        value="{{ $stok->stok_sekarang }}"
                                        placeholder="0"
                                        type="number"
                                        step="0.01"
                                        required>
                                </div>

                                <!-- Satuan -->
                                <div class="space-y-sm">
                                    <label class="font-heading-md text-sm text-on-surface flex items-center gap-xs" for="satuan">
                                        Satuan
                                        <span class="text-error">*</span>
                                    </label>

                                    <input
                                        class="input-field font-body-main"
                                        id="satuan"
                                        name="satuan"
                                        value="{{ $stok->satuan }}"
                                        placeholder="Contoh: Roll, Pcs, Bobbin"
                                        type="text"
                                        required>
                                </div>

                                <!-- Batas Kritis -->
                                <div class="space-y-sm sm:col-span-2">
                                    <label class="font-heading-md text-sm text-on-surface flex items-center gap-xs" for="batas_kritis">
                                        Batas Kritis (Alert Warning)
                                        <span class="text-error">*</span>
                                    </label>

                                    <input
                                        class="input-field font-body-main"
                                        id="batas_kritis"
                                        name="batas_kritis"
                                        value="{{ $stok->batas_kritis }}"
                                        placeholder="Batas minimal sebelum status menjadi merah"
                                        type="number"
                                        step="0.01"
                                        required>
                                </div>
                            </div>

                            <!-- Info Box -->
                            <div class="bg-surface-container-low p-md rounded-lg border border-outline-variant/60 flex gap-md items-start">
                                <span class="material-symbols-outlined text-primary mt-0.5">info</span>

                                <div>
                                    <h4 class="font-heading-md text-sm text-primary">
                                        Petunjuk Edit Bahan Baku
                                    </h4>

                                    <p class="font-caption text-on-surface-variant leading-relaxed mt-xs">
                                        Pastikan data bahan sudah sesuai dengan kondisi gudang. Batas kritis digunakan sistem untuk menandai stok yang mulai menipis.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Preview Section -->
                        <div class="lg:col-span-4 space-y-lg">
                            <div class="bg-surface p-lg rounded-xl border border-outline-variant flex flex-col gap-md">
                                <h3 class="font-heading-md text-on-surface border-b border-outline-variant pb-sm">
                                    Pratinjau Kartu Stok
                                </h3>

                                <div class="preview-square aspect-square bg-surface-container-highest rounded-lg flex flex-col items-center justify-center text-center p-lg relative overflow-hidden group">
                                    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_1px_1px,#747683_1px,transparent_0)] [background-size:18px_18px]"></div>

                                    <div class="w-16 h-16 bg-primary/10 rounded-xl flex items-center justify-center mb-md relative z-10">
                                        <span class="material-symbols-outlined text-4xl text-primary">
                                            inventory_2
                                        </span>
                                    </div>

                                    <p class="font-heading-md text-on-surface relative z-10" id="preview-name">
                                        {{ $stok->nama_bahan }}
                                    </p>

                                    <p class="font-body-data text-outline relative z-10 mt-xs" id="preview-stock">
                                        {{ $stok->stok_sekarang }} {{ $stok->satuan }}
                                    </p>

                                    <div class="mt-md relative z-10">
                                        <span class="px-3 py-1 bg-error-container text-on-error-container text-[10px] font-bold rounded-full uppercase tracking-wider">
                                            Batas Kritis: <span id="preview-critical">{{ $stok->batas_kritis }}</span>
                                        </span>
                                    </div>
                                </div>

                                <p class="font-caption text-on-surface-variant text-center">
                                    Preview ini membantu memastikan data stok yang diedit sudah sesuai sebelum disimpan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="form-actions px-xl py-lg bg-surface-container-low flex justify-end items-center gap-md">
                    <a href="/stok" class="px-xl py-md font-heading-md text-sm text-error border border-error bg-transparent hover:bg-error/10 rounded-lg transition-all active:scale-95 no-underline inline-flex items-center gap-xs">
                        <span class="material-symbols-outlined text-[18px]">close</span>
                        Batal
                    </a>

                    <button type="submit" class="px-xl py-md font-heading-md text-sm btn-warning-clear transition-all rounded-lg active:scale-95 flex items-center gap-xs">
                        <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">
                            save
                        </span>
                        Simpan Perubahan
                    </button>
                </div>
            </form>

            <!-- Footer Meta Info -->
            <footer class="mt-xl py-md flex flex-col sm:flex-row justify-between items-center gap-md text-on-surface-variant border-t border-outline-variant/30">
                <p class="font-caption">
                    © 2024 Konveksi A2M - Warehouse Management System
                </p>

                <div class="flex items-center gap-lg">
                    <a class="font-caption hover:text-primary transition-colors no-underline" href="/stok">
                        Kembali ke Stok
                    </a>
                    <a class="font-caption hover:text-primary transition-colors no-underline" href="/">
                        Dashboard
                    </a>
                </div>
            </footer>
        </div>
    </main>

    <script>
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const toggleIcon = document.getElementById('toggle-icon');
        const mobileOverlay = document.getElementById('mobile-overlay');

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
                        toggleIcon.textContent = document.body.classList.contains('mobile-sidebar-open')
                            ? 'close'
                            : 'menu';
                    }
                } else {
                    document.body.classList.toggle('sidebar-collapsed');

                    if (toggleIcon) {
                        toggleIcon.textContent = document.body.classList.contains('sidebar-collapsed')
                            ? 'menu_open'
                            : 'menu';
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
                    toggleIcon.textContent = document.body.classList.contains('sidebar-collapsed')
                        ? 'menu_open'
                        : 'menu';
                }
            } else {
                document.body.classList.remove('sidebar-collapsed');

                if (toggleIcon) {
                    toggleIcon.textContent = document.body.classList.contains('mobile-sidebar-open')
                        ? 'close'
                        : 'menu';
                }
            }
        });

        document.querySelectorAll('#main-sidebar nav a').forEach((link) => {
            link.addEventListener('click', () => {
                if (isMobileLayout()) {
                    closeMobileSidebar();
                }
            });
        });

        const namaBahanInput = document.getElementById('nama_bahan');
        const stokInput = document.getElementById('stok_sekarang');
        const satuanInput = document.getElementById('satuan');
        const batasKritisInput = document.getElementById('batas_kritis');

        const previewName = document.getElementById('preview-name');
        const previewStock = document.getElementById('preview-stock');
        const previewCritical = document.getElementById('preview-critical');

        function updatePreview() {
            const nama = namaBahanInput?.value.trim() || 'Belum Ada Nama';
            const stok = stokInput?.value || '0';
            const satuan = satuanInput?.value.trim() || 'Satuan';
            const batasKritis = batasKritisInput?.value || '0';

            if (previewName) {
                previewName.textContent = nama;
            }

            if (previewStock) {
                previewStock.textContent = `${stok} ${satuan}`;
            }

            if (previewCritical) {
                previewCritical.textContent = batasKritis;
            }
        }

        [namaBahanInput, stokInput, satuanInput, batasKritisInput].forEach((input) => {
            if (!input) return;

            input.addEventListener('input', updatePreview);
        });
    </script>

</body>

</html>