<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Pesanan - Konveksi A2M</title>
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

        .btn-secondary-clear {
            background-color: #98d3fe;
            color: #001e2f;
            box-shadow: 0 4px 12px rgba(34, 100, 138, 0.18);
        }

        .btn-secondary-clear:hover {
            filter: brightness(0.96);
        }

        .delete-icon-clear {
            color: #d32020;
            font-variation-settings: 'FILL' 0, 'wght' 650, 'GRAD' 0, 'opsz' 24;
        }

        .delete-icon-clear:hover {
            color: #9e1414;
        }

        .filter-dropdown {
            min-width: 320px;
        }

        .collapse-content {
            overflow: hidden;
            transition: max-height 0.35s ease, opacity 0.25s ease;
            max-height: 1400px;
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
                min-width: 980px;
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

            <a class="flex items-center gap-md text-on-surface-variant hover:text-primary px-md py-sm hover:bg-surface-container-high transition-colors duration-200" href="/stok">
                <span class="material-symbols-outlined">inventory_2</span>
                <span class="font-nav-label">Stok</span>
            </a>

            <a class="flex items-center gap-md bg-primary text-on-primary rounded-lg px-md py-sm border-l-4 border-primary-fixed translate-x-1 transition-transform duration-200" href="/pesanan">
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
                    MANAJEMEN PESANAN
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
                        placeholder="Cari pesanan..."
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

            @if (session('error'))
                <div class="rounded-xl border border-error/20 bg-error-container px-lg py-md text-on-error-container soft-industrial-shadow flex items-start gap-sm">
                    <span class="material-symbols-outlined text-error">error</span>
                    <p class="font-heading-md text-sm">
                        {{ session('error') }}
                    </p>
                </div>
            @endif

            <!-- Statistik Pesanan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                <div class="stat-card bg-white border border-outline-variant rounded-xl p-lg flex items-center gap-lg soft-industrial-shadow border-l-4 border-l-secondary group hover:border-secondary transition-colors">
                    <div class="stat-icon w-16 h-16 bg-secondary-container rounded-lg flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-secondary text-3xl">inventory</span>
                    </div>

                    <div class="min-w-0">
                        <p class="stat-label text-on-surface-variant text-sm font-body-main uppercase tracking-wide">
                            Total Pesanan Aktif
                        </p>
                        <h3 class="stat-value text-3xl font-heading-lg mt-1">
                            {{ $totalPesananAktif }}
                            <span class="text-base text-on-surface-variant font-normal">types</span>
                        </h3>
                    </div>
                </div>

                <div class="stat-card bg-white border border-outline-variant rounded-xl p-lg flex items-center gap-lg soft-industrial-shadow border-l-4 border-l-tertiary-container group hover:border-tertiary transition-colors">
                    <div class="stat-icon w-16 h-16 bg-tertiary-fixed-dim/20 rounded-lg flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-tertiary text-3xl">ads_click</span>
                    </div>

                    <div class="min-w-0">
                        <p class="stat-label text-on-surface-variant text-sm font-body-main uppercase tracking-wide">
                            Target Pcs Pesanan
                        </p>
                        <h3 class="stat-value text-3xl font-heading-lg mt-1">
                            {{ $targetPcsPesanan }}
                            <span class="text-base text-on-surface-variant font-normal">Pcs</span>
                        </h3>
                    </div>
                </div>

                <div class="stat-card bg-white border border-outline-variant rounded-xl p-lg flex items-center gap-lg soft-industrial-shadow border-l-4 border-l-primary group hover:border-primary transition-colors">
                    <div class="stat-icon w-16 h-16 bg-primary/10 rounded-lg flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-3xl">verified</span>
                    </div>

                    <div class="min-w-0">
                        <p class="stat-label text-on-surface-variant text-sm font-body-main uppercase tracking-wide">
                            Pesanan Selesai
                        </p>
                        <h3 class="stat-value text-3xl font-heading-lg mt-1">
                            {{ $pesananSelesai }}
                            <span class="text-base text-on-surface-variant font-normal">Items</span>
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="action-bar flex flex-wrap items-center justify-between gap-md">
                <div class="action-left flex flex-wrap items-center gap-md">
                    <a href="/pesanan/create" class="btn-secondary-clear px-lg py-sm rounded-lg font-bold flex items-center gap-sm transition-all no-underline">
                        <span class="material-symbols-outlined">add_circle</span>
                        Tambah Pesanan Baru
                    </a>

                    <a href="/progres/create" class="btn-primary-clear px-lg py-sm rounded-lg font-bold flex items-center gap-sm transition-all no-underline">
                        <span class="material-symbols-outlined">edit_note</span>
                        Input Progres Kerja
                    </a>

                </div>

                <!-- Filter Button -->
                <div class="filter-area relative" id="filter-dropdown-container">
                    <button id="filter-button" type="button" class="flex items-center gap-sm bg-white border border-outline-variant px-md py-sm rounded-lg hover:bg-surface-container transition-all">
                        <span class="material-symbols-outlined">filter_list</span>
                        <span class="font-bold text-sm">Filter</span>
                        <span class="material-symbols-outlined" id="filter-icon">expand_more</span>
                    </button>

                    <div id="filter-dropdown" class="filter-dropdown absolute right-0 mt-2 w-80 bg-white border border-outline-variant rounded-xl shadow-lg z-50 overflow-hidden soft-industrial-shadow hidden">
                        <div class="p-lg space-y-lg">
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

                            <div>
                                <p class="font-bold text-sm mb-md text-on-surface">Progres</p>

                                <div class="space-y-sm">
                                    <label class="flex items-center gap-md cursor-pointer">
                                        <input type="checkbox" class="filter-progress rounded border-outline-variant text-primary focus:ring-primary" value="0-25">
                                        <span class="text-sm">0% - 25%</span>
                                    </label>

                                    <label class="flex items-center gap-md cursor-pointer">
                                        <input type="checkbox" class="filter-progress rounded border-outline-variant text-primary focus:ring-primary" value="26-50">
                                        <span class="text-sm">26% - 50%</span>
                                    </label>

                                    <label class="flex items-center gap-md cursor-pointer">
                                        <input type="checkbox" class="filter-progress rounded border-outline-variant text-primary focus:ring-primary" value="51-75">
                                        <span class="text-sm">51% - 75%</span>
                                    </label>

                                    <label class="flex items-center gap-md cursor-pointer">
                                        <input type="checkbox" class="filter-progress rounded border-outline-variant text-primary focus:ring-primary" value="76-100">
                                        <span class="text-sm">76% - 100%</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <p class="font-bold text-sm mb-md text-on-surface">Status Penyelesaian</p>

                                <div class="space-y-sm">
                                    <label class="flex items-center gap-md cursor-pointer">
                                        <input type="checkbox" class="filter-status rounded border-outline-variant text-primary focus:ring-primary" value="belum-selesai">
                                        <span class="text-sm">Belum Selesai</span>
                                    </label>

                                    <label class="flex items-center gap-md cursor-pointer">
                                        <input type="checkbox" class="filter-status rounded border-outline-variant text-primary focus:ring-primary" value="tandai-selesai">
                                        <span class="text-sm">Tandai Selesai</span>
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

            <!-- Daftar Pesanan Aktif -->
            <div class="bg-white rounded-xl border border-outline-variant soft-industrial-shadow overflow-hidden">
                <div class="table-header px-lg py-md border-b border-outline-variant flex justify-between items-center bg-surface-container-low">
                    <div class="flex items-center gap-md">
                        <h3 class="table-title font-nav-label text-2xl font-bold text-primary">
                            Daftar Pesanan Aktif
                        </h3>

                        <span class="bg-secondary-container/30 text-secondary text-xs font-bold px-md py-xs rounded-full">
                            {{ $totalPesananAktif }} Aktif
                        </span>
                    </div>

                    <button type="button" class="toggle-table-btn" id="toggle-pesanan-aktif" aria-label="Tampilkan atau sembunyikan daftar pesanan aktif">
                        <span class="material-symbols-outlined" id="icon-pesanan-aktif">
                            expand_less
                        </span>
                    </button>
                </div>

                <div class="collapse-content" id="content-pesanan-aktif">
                    <div class="table-wrapper overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-surface-container-high text-on-surface-variant text-left">
                                    <th class="px-lg py-md font-bold text-sm">No</th>
                                    <th class="px-lg py-md font-bold text-sm">Nama Pesanan</th>
                                    <th class="px-lg py-md font-bold text-sm">Klien</th>
                                    <th class="px-lg py-md font-bold text-sm">Nomor HP</th>
                                    <th class="px-lg py-md font-bold text-sm">Target & Size</th>
                                    <th class="px-lg py-md font-bold text-sm">Selesai</th>
                                    <th class="px-lg py-md font-bold text-sm">Progress</th>
                                    <th class="px-lg py-md font-bold text-sm">Deadline</th>
                                    <th class="px-lg py-md font-bold text-sm text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-outline-variant font-body-data">
                                @forelse($pesananAktif as $index => $p)
                                    @php
                                        $targetS = $p->target_s ?? 0;
                                        $targetM = $p->target_m ?? 0;
                                        $targetL = $p->target_l ?? 0;
                                        $targetXL = $p->target_xl ?? 0;
                                        $targetXXL = $p->target_xxl ?? 0;
                                        $target3XL = $p->target_3xl ?? 0;

                                        $ukuranAktif = [];
                                        if ($targetS > 0) $ukuranAktif[] = 'S';
                                        if ($targetM > 0) $ukuranAktif[] = 'M';
                                        if ($targetL > 0) $ukuranAktif[] = 'L';
                                        if ($targetXL > 0) $ukuranAktif[] = 'XL';
                                        if ($targetXXL > 0) $ukuranAktif[] = 'XXL';
                                        if ($target3XL > 0) $ukuranAktif[] = '3XL';

                                        $progressPesanan = (int) ($p->progress_persen ?? 0);
                                        $statusSelesai = $progressPesanan >= 100 ? 'tandai-selesai' : 'belum-selesai';

                                        if ($progressPesanan <= 25) {
                                            $progressRange = '0-25';
                                        } elseif ($progressPesanan <= 50) {
                                            $progressRange = '26-50';
                                        } elseif ($progressPesanan <= 75) {
                                            $progressRange = '51-75';
                                        } else {
                                            $progressRange = '76-100';
                                        }
                                    @endphp

                                    <tr class="hover:bg-surface-container-low transition-colors filterable-row"
                                        data-search="{{ strtolower($p->nama_pesanan . ' ' . $p->nama_klien . ' ' . ($p->no_hp_klien ?? '') . ' ' . $p->target_total_pcs . ' ' . $p->selesai_pcs . ' ' . $progressPesanan) }}"
                                        data-sizes="{{ strtolower(implode(',', $ukuranAktif)) }}"
                                        data-progress="{{ $progressRange }}"
                                        data-status="{{ $statusSelesai }}">
                                        <td class="px-lg py-md">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-lg py-md font-bold text-on-surface">
                                            {{ $p->nama_pesanan }}
                                        </td>

                                        <td class="px-lg py-md">
                                            {{ $p->nama_klien }}
                                        </td>

                                        <td class="px-lg py-md">
                                            {{ $p->no_hp_klien ?? '-' }}
                                        </td>

                                        <td class="px-lg py-md leading-tight">
                                            <span class="block font-bold">
                                                {{ $p->target_total_pcs }} pcs
                                            </span>

                                            <span class="text-xs text-on-surface-variant whitespace-nowrap">
                                                S:{{ $targetS }} | M:{{ $targetM }} | L:{{ $targetL }} | XL:{{ $targetXL }}
                                                @if(isset($p->target_xxl))
                                                    | XXL:{{ $targetXXL }}
                                                @endif
                                                @if(isset($p->target_3xl))
                                                    | 3XL:{{ $target3XL }}
                                                @endif
                                            </span>
                                        </td>

                                        <td class="px-lg py-md">
                                            {{ $p->selesai_pcs }} pcs
                                        </td>

                                        <td class="px-lg py-md min-w-[150px]">
                                            <div class="flex items-center gap-sm">
                                                <span class="font-bold">
                                                    {{ $p->progress_persen }}%
                                                </span>

                                                <div class="flex-1 h-2 bg-surface-container-highest rounded-full overflow-hidden">
                                                    <div class="bg-primary h-full rounded-full" style="width: {{ $p->progress_persen }}%;"></div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-lg py-md">
                                            <span class="inline-flex px-3 py-1 rounded font-bold text-xs
                                                {{ \Carbon\Carbon::parse($p->tanggal_deadline)->isPast() ? 'bg-error/15 text-error' : 'bg-primary/10 text-primary' }}">
                                                {{ \Carbon\Carbon::parse($p->tanggal_deadline)->format('d M Y') }}
                                            </span>
                                        </td>

                                        <td class="px-lg py-md">
                                            <div class="flex flex-col gap-1.5 w-full max-w-[150px] mx-auto">
                                                <a href="/pesanan/{{ $p->id_pesanan }}/detail" class="w-full px-3 py-1.5 bg-surface-container-high hover:bg-outline-variant text-on-surface-variant font-bold text-xs rounded transition-all flex items-center justify-center gap-1 no-underline">
                                                    <span class="material-symbols-outlined text-[14px]">visibility</span>
                                                    Detail
                                                </a>

                                                @if ($p->progress_persen >= 100)
                                                    <form action="/pesanan/{{ $p->id_pesanan }}/selesai" method="POST" class="m-0">
                                                        @csrf
                                                        <button type="submit" class="w-full px-3 py-1.5 bg-tertiary/10 hover:bg-tertiary/20 text-tertiary font-bold text-xs rounded transition-all flex items-center justify-center gap-1">
                                                            <span class="material-symbols-outlined text-[14px]">check_circle</span>
                                                            Tandai Selesai
                                                        </button>
                                                    </form>
                                                @else
                                                    <button type="button" class="w-full px-3 py-1.5 bg-yellow-100 text-yellow-800 font-bold text-xs rounded flex items-center justify-center gap-1 cursor-not-allowed" title="Progres harus 100% untuk diselesaikan">
                                                        <span class="material-symbols-outlined text-[14px]">hourglass_empty</span>
                                                        Belum Selesai
                                                    </button>
                                                @endif

                                                <form id="delete-pesanan-{{ $p->id_pesanan }}" action="/pesanan/{{ $p->id_pesanan }}" method="POST" class="m-0">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button"
                                                        class="w-full px-3 py-1.5 bg-error/10 hover:bg-error/20 text-error font-bold text-xs rounded transition-all flex items-center justify-center gap-1 delete-trigger"
                                                        data-form-id="delete-pesanan-{{ $p->id_pesanan }}"
                                                        data-name="{{ $p->nama_pesanan }}">
                                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">
                                                            delete
                                                        </span>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="px-lg py-xl text-center text-on-surface-variant">
                                            Tidak ada pesanan aktif saat ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Daftar Pesanan Selesai -->
            <div class="bg-white rounded-xl border border-outline-variant soft-industrial-shadow overflow-hidden">
                <div class="table-header px-lg py-md border-b border-outline-variant flex justify-between items-center bg-surface-container-low">
                    <h3 class="table-title font-nav-label text-2xl font-bold text-tertiary">
                        Daftar Pesanan Selesai
                    </h3>

                    <button type="button" class="toggle-table-btn" id="toggle-pesanan-selesai" aria-label="Tampilkan atau sembunyikan daftar pesanan selesai">
                        <span class="material-symbols-outlined" id="icon-pesanan-selesai">
                            expand_less
                        </span>
                    </button>
                </div>

                <div class="collapse-content" id="content-pesanan-selesai">
                    <div class="table-wrapper overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-surface-container-high text-on-surface-variant text-left">
                                    <th class="px-lg py-md font-bold text-sm">No</th>
                                    <th class="px-lg py-md font-bold text-sm">Nama Pesanan</th>
                                    <th class="px-lg py-md font-bold text-sm">Klien</th>
                                    <th class="px-lg py-md font-bold text-sm">Total Dikerjakan</th>
                                    <th class="px-lg py-md font-bold text-sm">Diselesaikan Pada</th>
                                    <th class="px-lg py-md font-bold text-sm text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-outline-variant font-body-data">
                                @forelse($daftarSelesai as $index => $p)
                                    <tr class="hover:bg-surface-container-low transition-colors bg-surface-container-lowest">
                                        <td class="px-lg py-md">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-lg py-md font-bold text-on-surface">
                                            {{ $p->nama_pesanan }}
                                        </td>

                                        <td class="px-lg py-md">
                                            {{ $p->nama_klien }}
                                        </td>

                                        <td class="px-lg py-md text-tertiary font-bold">
                                            {{ $p->selesai_pcs }} pcs
                                        </td>

                                        <td class="px-lg py-md">
                                            {{ \Carbon\Carbon::parse($p->updated_at)->format('d M Y, H:i') }}
                                        </td>

                                        <td class="px-lg py-md text-center">
                                            <a href="/pesanan/{{ $p->id_pesanan }}/detail" class="w-full max-w-[160px] mx-auto px-4 py-2 bg-surface-container-high hover:bg-outline-variant text-on-surface-variant font-bold text-xs rounded-lg transition-all flex items-center justify-center gap-2 no-underline">
                                                <span class="material-symbols-outlined text-[16px]">visibility</span>
                                                Lihat Arsip
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-lg py-xl text-center text-on-surface-variant">
                                            Belum ada pesanan yang selesai dikerjakan.
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

            <p class="text-body-main text-on-surface-variant mb-sm">
                Apakah yakin ingin menghapus pesanan ini?
            </p>

            <p id="delete-item-name" class="font-bold text-on-surface mb-xl"></p>

            <p class="text-sm text-on-surface-variant mb-xl">
                Semua riwayat progres dan data terkait pesanan ini akan ikut hilang permanen.
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
            const selectedSizes = getSelectedValues('.filter-size');
            const selectedProgress = getSelectedValues('.filter-progress');
            const selectedStatus = getSelectedValues('.filter-status');

            document.querySelectorAll('.filterable-row').forEach((row) => {
                const rowSearch = (row.dataset.search || row.innerText || '').toLowerCase();
                const rowSizes = (row.dataset.sizes || '').toLowerCase().split(',').filter(Boolean);
                const rowProgress = (row.dataset.progress || '').toLowerCase();
                const rowStatus = (row.dataset.status || '').toLowerCase();

                const matchesKeyword = keyword === '' || rowSearch.includes(keyword);
                const matchesSize = selectedSizes.length === 0 || selectedSizes.some((size) => rowSizes.includes(size));
                const matchesProgress = selectedProgress.length === 0 || selectedProgress.includes(rowProgress);
                const matchesStatus = selectedStatus.length === 0 || selectedStatus.includes(rowStatus);

                row.style.display = matchesKeyword && matchesSize && matchesProgress && matchesStatus ? '' : 'none';
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
                document.querySelectorAll('.filter-size, .filter-progress, .filter-status').forEach((checkbox) => {
                    checkbox.checked = false;
                });

                applyCombinedFilter();
            });
        }

        const togglePesananAktif = document.getElementById('toggle-pesanan-aktif');
        const iconPesananAktif = document.getElementById('icon-pesanan-aktif');
        const contentPesananAktif = document.getElementById('content-pesanan-aktif');

        if (togglePesananAktif && iconPesananAktif && contentPesananAktif) {
            togglePesananAktif.addEventListener('click', () => {
                contentPesananAktif.classList.toggle('is-hidden');

                if (contentPesananAktif.classList.contains('is-hidden')) {
                    iconPesananAktif.textContent = 'expand_more';
                } else {
                    iconPesananAktif.textContent = 'expand_less';
                }
            });
        }

        const togglePesananSelesai = document.getElementById('toggle-pesanan-selesai');
        const iconPesananSelesai = document.getElementById('icon-pesanan-selesai');
        const contentPesananSelesai = document.getElementById('content-pesanan-selesai');

        if (togglePesananSelesai && iconPesananSelesai && contentPesananSelesai) {
            togglePesananSelesai.addEventListener('click', () => {
                contentPesananSelesai.classList.toggle('is-hidden');

                if (contentPesananSelesai.classList.contains('is-hidden')) {
                    iconPesananSelesai.textContent = 'expand_more';
                } else {
                    iconPesananSelesai.textContent = 'expand_less';
                }
            });
        }

        const deleteModal = document.getElementById('delete-modal');
        const closeDeleteModal = document.getElementById('close-delete-modal');
        const confirmDeleteButton = document.getElementById('confirm-delete-button');
        const deleteBackdrop = document.querySelector('.delete-modal-backdrop');
        const deleteItemName = document.getElementById('delete-item-name');
        let selectedDeleteFormId = null;

        function showDeleteModal(formId, itemName) {
            selectedDeleteFormId = formId;

            if (deleteItemName) {
                deleteItemName.textContent = itemName ? itemName : '';
            }

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
                showDeleteModal(button.dataset.formId, button.dataset.name);
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