<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Stok - Konveksi A2M</title>
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

        aside,
        header,
        main {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        aside {
            width: 260px;
        }

        header {
            width: calc(100% - 260px);
            margin-left: 260px;
        }

        main {
            margin-left: 260px;
        }

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

        .btn-primary-clear {
            background-color: #2d4ea0;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(45, 78, 160, 0.25);
        }

        .btn-primary-clear:hover {
            background-color: #243f83;
            color: #ffffff;
        }

        .edit-icon-clear {
            color: #4d64c8;
            font-variation-settings: 'FILL' 0, 'wght' 650, 'GRAD' 0, 'opsz' 24;
        }

        .edit-icon-clear:hover {
            color: #2d4ea0;
        }

        .delete-icon-clear {
            color: #d32020;
            font-variation-settings: 'FILL' 0, 'wght' 650, 'GRAD' 0, 'opsz' 24;
        }

        .delete-icon-clear:hover {
            color: #9e1414;
        }

        .collapse-content {
            overflow: hidden;
            transition: max-height 0.35s ease, opacity 0.25s ease;
            max-height: 1200px;
            opacity: 1;
        }

        .collapse-content.is-hidden {
            max-height: 0;
            opacity: 0;
        }

        .toggle-table-btn {
            border: none;
            background: transparent;
            cursor: pointer;
            padding: 8px;
            border-radius: 9999px;
            color: #444651;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .toggle-table-btn:hover {
            background-color: #e5e8eb;
        }

        .toggle-table-btn:active {
            transform: scale(0.92);
        }

        .filter-dropdown {
            min-width: 288px;
        }

        .modal-card {
            animation: modalPop 0.2s ease;
        }

        @keyframes modalPop {
            from {
                opacity: 0;
                transform: scale(0.96) translateY(8px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @media (max-width: 1024px) {
            aside {
                width: 220px;
            }

            header {
                width: calc(100% - 220px);
                margin-left: 220px;
            }

            main {
                margin-left: 220px;
            }

            body.sidebar-collapsed aside {
                width: 80px;
            }

            body.sidebar-collapsed header {
                width: calc(100% - 80px);
                margin-left: 80px;
            }

            body.sidebar-collapsed main {
                margin-left: 80px;
            }

            body.sidebar-collapsed aside h1,
            body.sidebar-collapsed aside .font-nav-label,
            body.sidebar-collapsed aside .mt-auto p {
                display: none;
            }
        }

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

            header h2 {
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

            .action-bar {
                align-items: stretch;
            }

            .action-left,
            .action-left > a,
            .action-left > div,
            .filter-area,
            .filter-area > button {
                width: 100%;
            }

            .action-left > a,
            .filter-area > button {
                justify-content: center;
            }

            #table-search {
                width: 100%;
            }

            .filter-dropdown {
                left: 0;
                right: auto;
                width: 100%;
                min-width: 100%;
            }

            .stat-card {
                padding: 18px;
            }

            .stat-icon {
                width: 52px;
                height: 52px;
            }

            .stat-value {
                font-size: 24px;
            }

            .table-title {
                font-size: 22px;
            }

            table {
                min-width: 760px;
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

            .stat-card {
                gap: 14px;
                padding: 16px;
            }

            .stat-icon {
                width: 48px;
                height: 48px;
            }

            .stat-icon span {
                font-size: 26px;
            }

            .stat-label {
                font-size: 12px;
            }

            .stat-value {
                font-size: 22px;
            }

            .table-title {
                font-size: 20px;
            }

            .table-header {
                padding-left: 16px;
                padding-right: 12px;
            }

            .table-wrapper th,
            .table-wrapper td {
                padding-left: 16px;
                padding-right: 16px;
            }
        }
    </style>
</head>

<body class="font-body-main text-on-surface">

    <div class="mobile-overlay" id="mobile-overlay"></div>

    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 h-screen bg-surface border-r border-outline-variant shadow-sm flex flex-col gap-lg p-lg z-50 transition-all">
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
                        id="global-search"
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

            @if (session('success'))
                <div class="rounded-xl border border-tertiary-container/20 bg-tertiary-container/10 px-lg py-md text-tertiary-container soft-industrial-shadow flex items-start gap-sm">
                    <span class="material-symbols-outlined text-tertiary">check_circle</span>
                    <p class="font-heading-md text-sm">
                        {{ session('success') }}
                    </p>
                </div>
            @endif

            <!-- Statistik Stok -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-lg">
                <div class="stat-card bg-white border border-outline-variant rounded-xl p-lg flex items-center gap-lg soft-industrial-shadow border-l-4 border-l-primary group hover:border-primary transition-colors">
                    <div class="stat-icon w-16 h-16 bg-primary/10 rounded-lg flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-3xl">inventory</span>
                    </div>

                    <div class="min-w-0">
                        <p class="stat-label text-on-surface-variant text-sm font-body-main uppercase tracking-wide">
                           <b> Total Jenis Bahan </b>
                        </p>
                        <h3 class="stat-value text-3xl font-heading-lg mt-1">
                            {{ $totalJenisBahan }}
                            <span class="text-base text-on-surface-variant font-normal">types</span>
                        </h3>
                    </div>
                </div>

                <div class="stat-card bg-white border border-outline-variant rounded-xl p-lg flex items-center gap-lg soft-industrial-shadow border-l-4 border-l-tertiary-container group hover:border-tertiary transition-colors">
                    <div class="stat-icon w-16 h-16 bg-tertiary/10 rounded-lg flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-tertiary text-3xl">check_circle</span>
                    </div>

                    <div class="min-w-0">
                        <p class="stat-label text-on-surface-variant text-sm font-body-main uppercase tracking-wide">
                            <b> Total Pesanan Siap </b>
                        </p>
                        <h3 class="stat-value text-3xl font-heading-lg mt-1">
                            {{ $totalPesananSiap }}
                            <span class="text-base text-on-surface-variant font-normal">Pcs</span>
                        </h3>
                    </div>
                </div>

                <div class="stat-card bg-white border border-outline-variant rounded-xl p-lg flex items-center gap-lg soft-industrial-shadow border-l-4 border-l-error group hover:border-error transition-colors md:col-span-2 xl:col-span-1">
                    <div class="stat-icon w-16 h-16 bg-error-container rounded-lg flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-error text-3xl">warning</span>
                    </div>

                    <div class="min-w-0">
                        <p class="stat-label text-on-surface-variant text-sm font-body-main uppercase tracking-wide">
                           <b> Stok Kritis </b>
                        </p>
                        <h3 class="stat-value text-3xl font-heading-lg mt-1">
                            {{ $stokKritis }}
                            <span class="text-base text-on-surface-variant font-normal">Items</span>
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="action-bar flex flex-wrap items-center justify-between gap-md">
                <div class="action-left flex flex-wrap items-center gap-md">
                    <a href="/stok/create" class="btn-primary-clear px-lg py-sm rounded-lg font-bold flex items-center gap-sm transition-all no-underline">
                        <span class="material-symbols-outlined">add</span>
                        Tambah Stok Baru
                    </a>

                    <a href="/stok/barang-jadi/create" class="bg-tertiary hover:bg-tertiary-container text-on-tertiary px-lg py-sm rounded-lg font-bold flex items-center gap-sm transition-all shadow-md no-underline">
                        <span class="material-symbols-outlined">add_box</span>
                        Tambah Barang Jadi
                    </a>

                </div>

                <!-- Filter Button -->
                <div class="filter-area relative" id="filter-dropdown-container">
                    <button id="filter-button" type="button" class="flex items-center gap-sm bg-white border border-outline-variant px-md py-sm rounded-lg hover:bg-surface-container transition-all">
                        <span class="material-symbols-outlined">filter_list</span>
                        <span class="font-bold text-sm">Filter</span>
                        <span class="material-symbols-outlined" id="filter-icon">expand_more</span>
                    </button>

                    <div id="filter-dropdown" class="filter-dropdown absolute right-0 mt-2 w-72 bg-white border border-outline-variant rounded-xl shadow-lg z-50 overflow-hidden soft-industrial-shadow hidden">
                        <div class="p-lg space-y-lg">
                            <div>
                                <p class="font-bold text-sm mb-md text-on-surface">Status</p>

                                <div class="space-y-sm">
                                    <label class="flex items-center gap-md cursor-pointer">
                                        <input type="checkbox" class="filter-status rounded border-outline-variant text-primary focus:ring-primary" value="kritis">
                                        <span class="text-sm">Kritis</span>
                                    </label>

                                    <label class="flex items-center gap-md cursor-pointer">
                                        <input type="checkbox" class="filter-status rounded border-outline-variant text-primary focus:ring-primary" value="menipis">
                                        <span class="text-sm">Menipis</span>
                                    </label>

                                    <label class="flex items-center gap-md cursor-pointer">
                                        <input type="checkbox" class="filter-status rounded border-outline-variant text-primary focus:ring-primary" value="aman">
                                        <span class="text-sm">Aman</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <p class="font-bold text-sm mb-md text-on-surface">Ukuran</p>

                                <div class="grid grid-cols-3 gap-sm">
                                    <label class="flex items-center gap-sm cursor-pointer">
                                        <input type="checkbox" class="filter-size rounded border-outline-variant text-primary focus:ring-primary" value="S">
                                        <span class="text-sm">S</span>
                                    </label>

                                    <label class="flex items-center gap-sm cursor-pointer">
                                        <input type="checkbox" class="filter-size rounded border-outline-variant text-primary focus:ring-primary" value="M">
                                        <span class="text-sm">M</span>
                                    </label>

                                    <label class="flex items-center gap-sm cursor-pointer">
                                        <input type="checkbox" class="filter-size rounded border-outline-variant text-primary focus:ring-primary" value="L">
                                        <span class="text-sm">L</span>
                                    </label>

                                    <label class="flex items-center gap-sm cursor-pointer">
                                        <input type="checkbox" class="filter-size rounded border-outline-variant text-primary focus:ring-primary" value="XL">
                                        <span class="text-sm">XL</span>
                                    </label>

                                    <label class="flex items-center gap-sm cursor-pointer">
                                        <input type="checkbox" class="filter-size rounded border-outline-variant text-primary focus:ring-primary" value="XXL">
                                        <span class="text-sm">XXL</span>
                                    </label>

                                    <label class="flex items-center gap-sm cursor-pointer">
                                        <input type="checkbox" class="filter-size rounded border-outline-variant text-primary focus:ring-primary" value="3XL">
                                        <span class="text-sm">3XL</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="bg-surface-container-low p-md flex justify-end gap-md border-t border-outline-variant">
                            <button type="button" id="clear-filter" class="px-md py-sm text-sm font-bold text-on-surface-variant hover:text-primary transition-colors">
                                Clear
                            </button>

                            <button type="button" id="apply-filter" class="px-md py-sm text-sm font-bold bg-primary text-on-primary rounded-lg shadow-sm hover:bg-primary-container transition-all">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Bahan Baku -->
            <div class="bg-white rounded-xl border border-outline-variant soft-industrial-shadow overflow-hidden">
                <div class="table-header px-lg py-md border-b border-outline-variant flex justify-between items-center bg-surface-container-low">
                    <h3 class="table-title font-nav-label text-2xl font-bold text-on-surface">
                        Daftar Bahan Baku
                    </h3>

                    <button type="button" class="toggle-table-btn" id="toggle-bahan-baku" aria-label="Tampilkan atau sembunyikan tabel bahan baku">
                        <span class="material-symbols-outlined" id="icon-bahan-baku">
                            expand_less
                        </span>
                    </button>
                </div>

                <div class="collapse-content" id="content-bahan-baku">
                    <div class="table-wrapper overflow-x-auto">
                        <table class="w-full border-collapse searchable-table">
                            <thead>
                                <tr class="bg-surface-container-highest/50 border-b border-outline-variant">
                                    <th class="px-lg py-md text-left font-heading-md text-sm text-on-surface-variant">No</th>
                                    <th class="px-lg py-md text-left font-heading-md text-sm text-on-surface-variant">Nama Bahan</th>
                                    <th class="px-lg py-md text-left font-heading-md text-sm text-on-surface-variant">Stok</th>
                                    <th class="px-lg py-md text-left font-heading-md text-sm text-on-surface-variant">Satuan</th>
                                    <th class="px-lg py-md text-left font-heading-md text-sm text-on-surface-variant">Status</th>
                                    <th class="px-lg py-md text-center font-heading-md text-sm text-on-surface-variant">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="font-body-data text-base divide-y divide-outline-variant/30">
                                @foreach ($stokBahan as $index => $item)
                                    @php
                                        if ($item->stok_sekarang <= $item->batas_kritis) {
                                            $statusBahan = 'kritis';
                                            $statusLabelBahan = 'Kritis';
                                            $statusClassBahan = 'bg-error-container text-on-error-container';
                                        } elseif ($item->stok_sekarang <= $item->batas_kritis + 10) {
                                            $statusBahan = 'menipis';
                                            $statusLabelBahan = 'Menipis';
                                            $statusClassBahan = 'bg-[#A7D3F5] text-[#155B81]';
                                        } else {
                                            $statusBahan = 'aman';
                                            $statusLabelBahan = 'Aman';
                                            $statusClassBahan = 'bg-[#E5EDE1] text-tertiary-container';
                                        }
                                    @endphp

                                    <tr class="hover:bg-surface-container-low transition-colors filterable-row"
                                        data-status="{{ $statusBahan }}"
                                        data-ukuran=""
                                        data-search="{{ strtolower($item->nama_bahan . ' ' . $item->stok_sekarang . ' ' . $item->satuan . ' ' . $statusLabelBahan) }}">
                                        <td class="px-lg py-md">
                                            {{ $index + 1 }}
                                        </td>

                                        <td class="px-lg py-md font-bold">
                                            {{ $item->nama_bahan }}
                                        </td>

                                        <td class="px-lg py-md">
                                            {{ $item->stok_sekarang }}
                                        </td>

                                        <td class="px-lg py-md">
                                            {{ $item->satuan }}
                                        </td>

                                        <td class="px-lg py-md">
                                            <span class="px-sm py-xs {{ $statusClassBahan }} text-xs font-bold rounded">
                                                {{ $statusLabelBahan }}
                                            </span>
                                        </td>

                                        <td class="px-lg py-md text-center">
                                            <div class="flex justify-center gap-md">
                                                <a href="/stok/{{ $item->id_bahan }}/edit" class="material-symbols-outlined edit-icon-clear no-underline" title="Edit">
                                                    edit_square
                                                </a>

                                                <form id="delete-bahan-{{ $item->id_bahan }}" action="/stok/{{ $item->id_bahan }}" method="POST" class="m-0">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="material-symbols-outlined delete-icon-clear bg-transparent border-0 cursor-pointer p-0 delete-trigger" data-form-id="delete-bahan-{{ $item->id_bahan }}" title="Hapus">
                                                        delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tabel Barang Jadi -->
            <div class="bg-white rounded-xl border border-outline-variant soft-industrial-shadow overflow-hidden">
                <div class="table-header px-lg py-md border-b border-outline-variant flex justify-between items-center bg-surface-container-low">
                    <h3 class="table-title font-nav-label text-2xl font-bold text-on-surface">
                        Daftar Barang Jadi
                    </h3>

                    <button type="button" class="toggle-table-btn" id="toggle-barang-jadi" aria-label="Tampilkan atau sembunyikan tabel barang jadi">
                        <span class="material-symbols-outlined" id="icon-barang-jadi">
                            expand_less
                        </span>
                    </button>
                </div>

                <div class="collapse-content" id="content-barang-jadi">
                    <div class="table-wrapper overflow-x-auto">
                        <table class="w-full border-collapse searchable-table">
                            <thead>
                                <tr class="bg-surface-container-highest/50 border-b border-outline-variant">
                                    <th class="px-lg py-md text-left font-heading-md text-sm text-on-surface-variant">No</th>
                                    <th class="px-lg py-md text-left font-heading-md text-sm text-on-surface-variant">Nama Produk</th>
                                    <th class="px-lg py-md text-left font-heading-md text-sm text-on-surface-variant">Ukuran</th>
                                    <th class="px-lg py-md text-left font-heading-md text-sm text-on-surface-variant">Stok</th>
                                    <th class="px-lg py-md text-left font-heading-md text-sm text-on-surface-variant">Satuan</th>
                                    <th class="px-lg py-md text-left font-heading-md text-sm text-on-surface-variant">Status</th>
                                    <th class="px-lg py-md text-center font-heading-md text-sm text-on-surface-variant">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="font-body-data text-base divide-y divide-outline-variant/30">
                                @forelse ($barangJadi as $index => $bj)
                                    @php
                                        if ($bj->stok_sekarang <= 10) {
                                            $statusBarang = 'kritis';
                                            $statusLabelBarang = 'Kritis';
                                            $statusClassBarang = 'bg-error-container text-on-error-container';
                                        } elseif ($bj->stok_sekarang <= 30) {
                                            $statusBarang = 'menipis';
                                            $statusLabelBarang = 'Menipis';
                                            $statusClassBarang = 'bg-[#A7D3F5] text-[#155B81]';
                                        } else {
                                            $statusBarang = 'aman';
                                            $statusLabelBarang = 'Aman';
                                            $statusClassBarang = 'bg-[#E5EDE1] text-tertiary-container';
                                        }

                                        $ukuranBarang = $bj->ukuran ?? '';
                                        $satuanBarang = $bj->satuan ?? 'Pcs';
                                    @endphp

                                    <tr class="hover:bg-surface-container-low transition-colors filterable-row"
                                        data-status="{{ $statusBarang }}"
                                        data-ukuran="{{ $ukuranBarang }}"
                                        data-search="{{ strtolower($bj->nama_barang . ' ' . $ukuranBarang . ' ' . $bj->stok_sekarang . ' ' . $satuanBarang . ' ' . $statusLabelBarang) }}">
                                        <td class="px-lg py-md">
                                            {{ $index + 1 }}
                                        </td>

                                        <td class="px-lg py-md font-bold">
                                            {{ $bj->nama_barang }}
                                        </td>

                                        <td class="px-lg py-md font-bold text-primary">
                                            {{ $bj->ukuran }}
                                        </td>

                                        <td class="px-lg py-md">
                                            {{ $bj->stok_sekarang }}
                                        </td>

                                        <td class="px-lg py-md">
                                            {{ $bj->satuan ?? 'Pcs' }}
                                        </td>

                                        <td class="px-lg py-md">
                                            <span class="px-sm py-xs {{ $statusClassBarang }} text-xs font-bold rounded">
                                                {{ $statusLabelBarang }}
                                            </span>
                                        </td>

                                        <td class="px-lg py-md text-center">
                                            <div class="flex justify-center gap-md">
                                                <a href="/stok/barang-jadi/{{ $bj->id_barang }}/edit" class="material-symbols-outlined edit-icon-clear no-underline" title="Edit">
                                                    edit_square
                                                </a>

                                                <form id="delete-barang-{{ $bj->id_barang }}" action="/stok/barang-jadi/{{ $bj->id_barang }}" method="POST" class="m-0">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="material-symbols-outlined delete-icon-clear bg-transparent border-0 cursor-pointer p-0 delete-trigger" data-form-id="delete-barang-{{ $bj->id_barang }}" title="Hapus">
                                                        delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="empty-row">
                                        <td colspan="7" class="px-lg py-xl text-center text-on-surface-variant">
                                            Belum ada data barang jadi di gudang.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Delete Modal -->
    <div id="delete-modal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-md">
        <div class="delete-modal-backdrop fixed inset-0 bg-black/50 backdrop-blur-sm"></div>

        <div class="modal-card relative bg-white border border-outline-variant rounded-xl shadow-2xl max-w-md w-full p-lg soft-industrial-shadow">
            <div class="flex items-center gap-md mb-lg">
                <div class="w-12 h-12 bg-error-container rounded-full flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-error text-2xl">
                        warning
                    </span>
                </div>

                <h3 class="font-heading-md text-lg text-on-surface">
                    Konfirmasi Hapus
                </h3>
            </div>

            <p class="text-body-main text-on-surface-variant mb-xl">
                Apakah yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan.
            </p>

            <div class="flex justify-end gap-md">
                <button id="close-delete-modal" type="button" class="px-lg py-sm font-bold text-sm text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-colors">
                    Batal
                </button>

                <button id="confirm-delete-button" type="button" class="px-lg py-sm font-bold text-sm bg-error text-on-error rounded-lg shadow-sm hover:opacity-90 transition-opacity">
                    Hapus
                </button>
            </div>
        </div>
    </div>

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

        const sidebarLinks = document.querySelectorAll('aside nav a');

        sidebarLinks.forEach((link) => {
            link.addEventListener('click', () => {
                if (isMobileLayout()) {
                    closeMobileSidebar();
                }
            });
        });

        const tableSearch = document.getElementById('table-search');
        const globalSearch = document.getElementById('global-search');

        function getSelectedValues(selector) {
            return Array.from(document.querySelectorAll(selector + ':checked')).map((checkbox) => checkbox.value.toLowerCase());
        }

        function applyCombinedFilter() {
            const keyword = (tableSearch?.value || globalSearch?.value || '').toLowerCase().trim();
            const selectedStatuses = getSelectedValues('.filter-status');
            const selectedSizes = getSelectedValues('.filter-size');

            document.querySelectorAll('.filterable-row').forEach((row) => {
                const rowSearch = (row.dataset.search || row.innerText || '').toLowerCase();
                const rowStatus = (row.dataset.status || '').toLowerCase();
                const rowSize = (row.dataset.ukuran || '').toLowerCase();

                const matchesKeyword = keyword === '' || rowSearch.includes(keyword);
                const matchesStatus = selectedStatuses.length === 0 || selectedStatuses.includes(rowStatus);
                const matchesSize = selectedSizes.length === 0 || (rowSize !== '' && selectedSizes.includes(rowSize));

                row.style.display = matchesKeyword && matchesStatus && matchesSize ? '' : 'none';
            });
        }

        [tableSearch, globalSearch].forEach((input) => {
            if (!input) return;

            input.addEventListener('input', (event) => {
                if (input === tableSearch && globalSearch) {
                    globalSearch.value = event.target.value;
                }

                if (input === globalSearch && tableSearch) {
                    tableSearch.value = event.target.value;
                }

                applyCombinedFilter();
            });
        });

        const filterButton = document.getElementById('filter-button');
        const filterDropdown = document.getElementById('filter-dropdown');
        const filterIcon = document.getElementById('filter-icon');
        const clearFilter = document.getElementById('clear-filter');
        const applyFilter = document.getElementById('apply-filter');

        if (filterButton && filterDropdown) {
            filterButton.addEventListener('click', (event) => {
                event.stopPropagation();
                filterDropdown.classList.toggle('hidden');

                if (filterIcon) {
                    filterIcon.textContent = filterDropdown.classList.contains('hidden') ? 'expand_more' : 'expand_less';
                }
            });

            filterDropdown.addEventListener('click', (event) => {
                event.stopPropagation();
            });

            document.addEventListener('click', () => {
                filterDropdown.classList.add('hidden');

                if (filterIcon) {
                    filterIcon.textContent = 'expand_more';
                }
            });
        }

        if (applyFilter) {
            applyFilter.addEventListener('click', () => {
                applyCombinedFilter();

                if (filterDropdown) {
                    filterDropdown.classList.add('hidden');
                }

                if (filterIcon) {
                    filterIcon.textContent = 'expand_more';
                }
            });
        }

        if (clearFilter) {
            clearFilter.addEventListener('click', () => {
                document.querySelectorAll('.filter-status, .filter-size').forEach((checkbox) => {
                    checkbox.checked = false;
                });

                applyCombinedFilter();
            });
        }

        const toggleBahanBaku = document.getElementById('toggle-bahan-baku');
        const iconBahanBaku = document.getElementById('icon-bahan-baku');
        const contentBahanBaku = document.getElementById('content-bahan-baku');

        if (toggleBahanBaku && iconBahanBaku && contentBahanBaku) {
            toggleBahanBaku.addEventListener('click', () => {
                contentBahanBaku.classList.toggle('is-hidden');

                if (contentBahanBaku.classList.contains('is-hidden')) {
                    iconBahanBaku.textContent = 'expand_more';
                } else {
                    iconBahanBaku.textContent = 'expand_less';
                }
            });
        }

        const toggleBarangJadi = document.getElementById('toggle-barang-jadi');
        const iconBarangJadi = document.getElementById('icon-barang-jadi');
        const contentBarangJadi = document.getElementById('content-barang-jadi');

        if (toggleBarangJadi && iconBarangJadi && contentBarangJadi) {
            toggleBarangJadi.addEventListener('click', () => {
                contentBarangJadi.classList.toggle('is-hidden');

                if (contentBarangJadi.classList.contains('is-hidden')) {
                    iconBarangJadi.textContent = 'expand_more';
                } else {
                    iconBarangJadi.textContent = 'expand_less';
                }
            });
        }

        const deleteModal = document.getElementById('delete-modal');
        const closeDeleteModal = document.getElementById('close-delete-modal');
        const confirmDeleteButton = document.getElementById('confirm-delete-button');
        const deleteBackdrop = document.querySelector('.delete-modal-backdrop');
        let selectedDeleteFormId = null;

        function showDeleteModal(formId) {
            selectedDeleteFormId = formId;

            if (deleteModal) {
                deleteModal.classList.remove('hidden');
            }
        }

        function hideDeleteModal() {
            selectedDeleteFormId = null;

            if (deleteModal) {
                deleteModal.classList.add('hidden');
            }
        }

        document.querySelectorAll('.delete-trigger').forEach((button) => {
            button.addEventListener('click', () => {
                showDeleteModal(button.dataset.formId);
            });
        });

        if (closeDeleteModal) {
            closeDeleteModal.addEventListener('click', hideDeleteModal);
        }

        if (deleteBackdrop) {
            deleteBackdrop.addEventListener('click', hideDeleteModal);
        }

        if (confirmDeleteButton) {
            confirmDeleteButton.addEventListener('click', () => {
                if (!selectedDeleteFormId) return;

                const selectedForm = document.getElementById(selectedDeleteFormId);

                if (selectedForm) {
                    selectedForm.submit();
                }
            });
        }

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                hideDeleteModal();

                if (filterDropdown) {
                    filterDropdown.classList.add('hidden');
                }

                if (filterIcon) {
                    filterIcon.textContent = 'expand_more';
                }
            }
        });
    </script>

</body>

</html>