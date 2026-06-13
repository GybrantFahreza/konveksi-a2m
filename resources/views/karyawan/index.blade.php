<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Karyawan - Konveksi A2M</title>
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
                        primary: '#2d4ea0',
                        'primary-container': '#4867ba',
                        'primary-fixed': '#dbe1ff',
                        'on-primary': '#ffffff',
                        'on-primary-container': '#e9ecff',
                        secondary: '#22648a',
                        'secondary-container': '#98d3fe',
                        tertiary: '#156000',
                        'tertiary-container': '#1e7c00',
                        error: '#ba1a1a',
                        'error-container': '#ffdad6',
                        surface: '#f7fafd',
                        'surface-bright': '#f7fafd',
                        'surface-container': '#ebeef1',
                        'surface-container-low': '#f1f4f7',
                        'surface-container-high': '#e5e8eb',
                        'surface-container-highest': '#e0e3e6',
                        'on-surface': '#181c1e',
                        'on-surface-variant': '#444651',
                        outline: '#747683',
                        'outline-variant': '#c4c6d3',
                        background: '#f7fafd',
                        'on-error': '#ffffff',
                        'on-error-container': '#93000a'
                    },
                    spacing: {
                        xl: '32px',
                        lg: '24px',
                        md: '16px',
                        sm: '8px',
                        xs: '4px'
                    },
                    fontFamily: {
                        'heading-lg': ['Carlito'],
                        'body-main': ['Carlito'],
                        'nav-label': ['Newsreader'],
                        'display-brand': ['Newsreader'],
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
            font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 24;
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

        .soft-industrial-shadow {
            box-shadow: 0 2px 12px rgba(24, 93, 131, 0.05);
        }

        .btn-primary-clear {
            background-color: #2d4ea0;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(45, 78, 160, 0.25);
        }

        .btn-primary-clear:hover {
            background-color: #243f83;
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

        .filter-dropdown {
            min-width: 360px;
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
            color: inherit;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .toggle-table-btn:hover {
            background-color: rgba(255, 255, 255, 0.12);
        }

        .toggle-table-btn:active {
            transform: scale(0.92);
        }

        .mobile-overlay {
            display: none;
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

            .hide-on-small {
                display: none;
            }

            .stat-card {
                padding: 16px;
                gap: 14px;
            }

            .stat-icon {
                width: 52px;
                height: 52px;
            }

            .stat-value {
                font-size: 24px;
            }

            .table-title {
                font-size: 20px;
            }
        }
    </style>
</head>

<body class="font-body-main text-on-surface">

    <div class="mobile-overlay" id="mobile-overlay"></div>

    <!-- Sidebar kiri utama -->
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

            <a class="flex items-center gap-md bg-primary text-on-primary rounded-lg px-md py-sm border-l-4 border-primary-fixed translate-x-1 transition-transform duration-200" href="/karyawan">
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

    <main class="min-h-screen transition-all bg-surface-bright">

        <!-- Navbar atas -->
        <header class="fixed top-0 right-0 z-40 bg-white/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex justify-between items-center h-16 px-xl transition-all">
            <div class="flex items-center gap-md min-w-0">
                <button class="mr-2 md:mr-4 p-2 rounded-full hover:bg-surface-container transition-all text-on-surface-variant flex items-center justify-center active:scale-95 shrink-0" id="sidebar-toggle" type="button">
                    <span class="material-symbols-outlined" id="toggle-icon">menu</span>
                </button>

                <h2 class="font-heading-lg text-2xl font-bold text-on-surface truncate">
                    MANAJEMEN KARYAWAN
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
                        placeholder="Cari karyawan..."
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

        <div class="page-content pt-24 px-xl pb-xl space-y-lg">

            @if (session('success'))
                <div class="rounded-xl border border-tertiary-container/20 bg-tertiary-container/10 px-lg py-md text-tertiary-container soft-industrial-shadow flex items-start gap-sm">
                    <span class="material-symbols-outlined text-tertiary">check_circle</span>
                    <p class="font-heading-md text-sm">
                        {{ session('success') }}
                    </p>
                </div>
            @endif

            @php
                $totalKaryawan = count($dataKaryawan);
                $totalHadir = $dataKaryawan->where('status_hari_ini', 'Hadir')->count();
                $totalEstimasiGaji = $dataKaryawan->sum('estimasi_gaji');
            @endphp

            <!-- 3 Card Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                <div class="stat-card bg-white border border-outline-variant rounded-xl p-lg flex items-center gap-lg soft-industrial-shadow border-l-4 border-l-primary">
                    <div class="stat-icon w-16 h-16 bg-primary/10 rounded-lg flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-3xl">groups</span>
                    </div>

                    <div>
                        <p class="text-on-surface-variant text-sm uppercase tracking-wide">
                            Total Karyawan
                        </p>
                        <h3 class="stat-value text-4xl font-heading-lg mt-1">
                            {{ $totalKaryawan }}
                            <span class="text-lg text-on-surface-variant font-normal">orang</span>
                        </h3>
                    </div>
                </div>

                <div class="stat-card bg-white border border-outline-variant rounded-xl p-lg flex items-center gap-lg soft-industrial-shadow border-l-4 border-l-tertiary-container">
                    <div class="stat-icon w-16 h-16 bg-tertiary/10 rounded-lg flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-tertiary text-3xl">check_circle</span>
                    </div>

                    <div>
                        <p class="text-on-surface-variant text-sm uppercase tracking-wide">
                            Hadir Hari Ini
                        </p>
                        <h3 class="stat-value text-4xl font-heading-lg mt-1">
                            {{ $totalHadir }}
                            <span class="text-lg text-on-surface-variant font-normal">orang</span>
                        </h3>
                    </div>
                </div>

                <div class="stat-card bg-white border border-outline-variant rounded-xl p-lg flex items-center gap-lg soft-industrial-shadow border-l-4 border-l-error">
                    <div class="stat-icon w-16 h-16 bg-error-container rounded-lg flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-error text-3xl">payments</span>
                    </div>

                    <div>
                        <p class="text-on-surface-variant text-sm uppercase tracking-wide">
                            Estimasi Gaji
                        </p>
                        <h3 class="stat-value text-3xl font-heading-lg mt-1">
                            Rp {{ number_format($totalEstimasiGaji, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Layout utama -->
            <div class="grid grid-cols-1 xl:grid-cols-[minmax(0,2fr)_380px] gap-lg items-start">

                <!-- Kolom kiri -->
                <section class="space-y-lg min-w-0">

                    <div class="action-bar flex flex-wrap items-center justify-between gap-md">
                        <div class="action-left flex flex-wrap items-center gap-md">
                            <a href="/karyawan/create" class="btn-primary-clear px-lg py-sm rounded-lg font-bold flex items-center gap-sm transition-all no-underline">
                                <span class="material-symbols-outlined">person_add</span>
                                Tambah Karyawan Baru
                            </a>

                        </div>

                        <div class="filter-area relative" id="filter-dropdown-container">
                            <button id="filter-button" type="button" class="flex items-center gap-sm bg-white border border-outline-variant px-md py-sm rounded-lg hover:bg-surface-container transition-all">
                                <span class="material-symbols-outlined">filter_list</span>
                                <span class="font-bold text-sm">Filter Status</span>
                                <span class="material-symbols-outlined" id="filter-icon">expand_more</span>
                            </button>

                            <div id="filter-dropdown" class="filter-dropdown absolute right-0 mt-2 w-96 bg-white border border-outline-variant rounded-xl shadow-lg z-50 overflow-hidden soft-industrial-shadow hidden">
                                <div class="p-lg space-y-lg">
                                    <div>
                                        <p class="font-bold text-sm mb-md text-on-surface">Absensi</p>

                                        <div class="space-y-sm">
                                            <label class="flex items-center gap-md cursor-pointer">
                                                <input type="checkbox" class="filter-absensi rounded border-outline-variant text-primary focus:ring-primary" value="hadir">
                                                <span class="text-sm">Hadir</span>
                                            </label>

                                            <label class="flex items-center gap-md cursor-pointer">
                                                <input type="checkbox" class="filter-absensi rounded border-outline-variant text-primary focus:ring-primary" value="tanpa-keterangan">
                                                <span class="text-sm">Tanpa keterangan</span>
                                            </label>

                                            <label class="flex items-center gap-md cursor-pointer">
                                                <input type="checkbox" class="filter-absensi rounded border-outline-variant text-primary focus:ring-primary" value="sakit">
                                                <span class="text-sm">Sakit</span>
                                            </label>

                                            <label class="flex items-center gap-md cursor-pointer">
                                                <input type="checkbox" class="filter-absensi rounded border-outline-variant text-primary focus:ring-primary" value="izin-cuti">
                                                <span class="text-sm">Izin/cuti</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div>
                                        <p class="font-bold text-sm mb-md text-on-surface">Rentang Estimasi Gaji</p>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-md">
                                            <input type="number" id="filter-salary-min" class="rounded-lg border-outline-variant text-sm focus:ring-primary focus:border-primary" placeholder="Minimal">
                                            <input type="number" id="filter-salary-max" class="rounded-lg border-outline-variant text-sm focus:ring-primary focus:border-primary" placeholder="Maksimal">
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

                    <!-- Daftar Karyawan Aktif -->
                    <div class="bg-white rounded-xl border border-outline-variant soft-industrial-shadow overflow-hidden">
                        <div class="table-header px-lg py-md border-b border-outline-variant flex justify-between items-center bg-white">
                            <h3 class="table-title font-nav-label text-2xl font-bold italic text-on-surface">
                                Daftar Karyawan Aktif
                            </h3>

                            <span class="text-sm text-on-surface-variant">
                                Menampilkan {{ $totalKaryawan }} Karyawan
                            </span>
                        </div>

                        <div class="table-wrapper overflow-x-auto">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-surface-container-high text-on-surface-variant text-left uppercase tracking-wide">
                                        <th class="px-lg py-md font-bold text-xs">No</th>
                                        <th class="px-lg py-md font-bold text-xs">Nama Karyawan</th>
                                        <th class="px-lg py-md font-bold text-xs">Nomor HP</th>
                                        <th class="px-lg py-md font-bold text-xs">Status</th>
                                        <th class="px-lg py-md font-bold text-xs">Kehadiran / Bulan</th>
                                        <th class="px-lg py-md font-bold text-xs text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-outline-variant font-body-data">
                                    @foreach ($dataKaryawan as $index => $k)
                                        @php
                                            $statusAbsensiRaw = strtolower($k->status_hari_ini ?? '');

                                            if ($statusAbsensiRaw === 'hadir') {
                                                $statusAbsensi = 'hadir';
                                                $statusLabel = 'Hadir';
                                                $statusClass = 'bg-tertiary-container/20 text-tertiary';
                                            } elseif ($statusAbsensiRaw === 'sakit') {
                                                $statusAbsensi = 'sakit';
                                                $statusLabel = 'Sakit';
                                                $statusClass = 'bg-secondary-container/40 text-secondary';
                                            } elseif ($statusAbsensiRaw === 'izin' || $statusAbsensiRaw === 'cuti') {
                                                $statusAbsensi = 'izin-cuti';
                                                $statusLabel = 'Cuti';
                                                $statusClass = 'bg-primary/10 text-primary';
                                            } else {
                                                $statusAbsensi = 'tanpa-keterangan';
                                                $statusLabel = 'Tanpa Keterangan';
                                                $statusClass = 'bg-error-container/40 text-error';
                                            }

                                            $initialName = collect(explode(' ', $k->nama_karyawan))->map(function($word) {
                                                return strtoupper(substr($word, 0, 1));
                                            })->take(2)->implode('');
                                        @endphp

                                        <tr class="hover:bg-surface-container-low transition-colors filterable-row"
                                            data-search="{{ strtolower(($k->nama_karyawan ?? '') . ' ' . ($k->no_hp ?? '') . ' ' . ($k->status_hari_ini ?? '') . ' ' . ($k->persentase_hadir ?? '') . ' ' . ($k->estimasi_gaji ?? '')) }}"
                                            data-absensi="{{ $statusAbsensi }}"
                                            data-salary="{{ $k->estimasi_gaji ?? 0 }}">
                                            <td class="px-lg py-lg text-on-surface-variant">
                                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </td>

                                            <td class="px-lg py-lg">
                                                <div class="flex items-center gap-md">
                                                    <div class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs font-bold">
                                                        {{ $initialName }}
                                                    </div>

                                                    <span class="font-bold text-on-surface">
                                                        {{ $k->nama_karyawan }}
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="px-lg py-lg">
                                                {{ $k->no_hp }}
                                            </td>

                                            <td class="px-lg py-lg">
                                                <span class="px-md py-xs {{ $statusClass }} text-[11px] font-bold rounded-full">
                                                    {{ $statusLabel }}
                                                </span>
                                            </td>

                                            <td class="px-lg py-lg min-w-[180px]">
                                                <div class="flex items-center gap-md">
                                                    <span class="font-bold text-primary">
                                                        {{ $k->persentase_hadir }}%
                                                    </span>

                                                    <div class="flex-1 h-2 bg-surface-container-highest rounded-full overflow-hidden">
                                                        <div class="bg-tertiary h-full rounded-full" style="width: {{ $k->persentase_hadir }}%;"></div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-lg py-lg">
                                                <div class="flex justify-center gap-md">
                                                    <a href="/karyawan/{{ $k->id_karyawan }}/edit" class="material-symbols-outlined edit-icon-clear no-underline" title="Edit">
                                                        edit_square
                                                    </a>

                                                    <form id="delete-karyawan-{{ $k->id_karyawan }}" action="/karyawan/{{ $k->id_karyawan }}" method="POST" class="m-0">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="button"
                                                            class="material-symbols-outlined delete-icon-clear bg-transparent border-0 cursor-pointer p-0 delete-trigger"
                                                            data-form-id="delete-karyawan-{{ $k->id_karyawan }}"
                                                            data-name="{{ $k->nama_karyawan }}"
                                                            title="Hapus">
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
                </section>

                <!-- Kolom kanan -->
                <section class="w-full min-w-0 bg-transparent border-0 shadow-none p-0 flex flex-col gap-lg">

                    <!-- Absensi Hari Ini -->
                    <div class="bg-white rounded-xl border border-outline-variant soft-industrial-shadow overflow-hidden">
                        <div class="px-lg py-md bg-secondary text-on-primary flex justify-between items-center">
                            <div>
                                <h3 class="font-bold text-lg">
                                    Absensi Hari Ini
                                </h3>
                                <p class="text-sm opacity-90">
                                    {{ \Carbon\Carbon::parse($hariIni)->translatedFormat('l, d F Y') }}
                                </p>
                            </div>

                            <button type="button" class="toggle-table-btn w-9 h-9 flex items-center justify-center text-white hover:bg-white/10" id="toggle-absensi" aria-label="Tampilkan atau sembunyikan absensi hari ini">
                                <span class="material-symbols-outlined text-[24px]" id="icon-absensi">
                                    expand_less
                                </span>
                            </button>
                        </div>

                        <div class="collapse-content" id="content-absensi">
                            <form action="/karyawan/absensi" method="POST">
                                @csrf

                                <div class="p-lg space-y-md max-h-[430px] overflow-y-auto">
                                    @foreach ($dataKaryawan as $k)
                                        <div class="flex items-center justify-between gap-md border border-outline-variant rounded-lg px-md py-sm bg-white">
                                            <span class="font-bold text-sm text-on-surface">
                                                {{ $k->nama_karyawan }}
                                            </span>

                                            <select name="absensi[{{ $k->id_karyawan }}]" class="rounded-md border-outline-variant text-sm py-xs focus:ring-primary focus:border-primary">
                                                <option value="Hadir" {{ $k->status_hari_ini == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                                <option value="Izin" {{ $k->status_hari_ini == 'Izin' ? 'selected' : '' }}>Cuti</option>
                                                <option value="Sakit" {{ $k->status_hari_ini == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                                <option value="Alpa" {{ $k->status_hari_ini == 'Alpa' || $k->status_hari_ini == 'Belum Absen' ? 'selected' : '' }}>TK</option>
                                            </select>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="p-lg pt-0">
                                    <button type="submit" class="btn-primary-clear w-full px-lg py-sm rounded-lg font-bold flex items-center justify-center gap-sm transition-all">
                                        <span class="material-symbols-outlined">save</span>
                                        Simpan Absensi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Ringkasan Gaji -->
                    <div class="bg-white rounded-xl border border-outline-variant soft-industrial-shadow overflow-hidden">
                        <div class="px-lg py-md bg-secondary text-on-primary flex justify-between items-center">
                            <div>
                                <h3 class="font-bold text-lg">
                                    Ringkasan Gaji
                                </h3>
                                <p class="text-sm opacity-90">
                                    Estimasi terbaru
                                </p>
                            </div>

                            <button type="button" class="toggle-table-btn w-9 h-9 flex items-center justify-center text-white hover:bg-white/10" id="toggle-gaji" aria-label="Tampilkan atau sembunyikan ringkasan gaji">
                                <span class="material-symbols-outlined text-[24px]" id="icon-gaji">
                                    expand_less
                                </span>
                            </button>
                        </div>

                        <div class="collapse-content" id="content-gaji">
                            <div class="table-wrapper overflow-x-auto">
                                <table class="w-full border-collapse">
                                    <thead>
                                        <tr class="bg-surface-container-high text-on-surface-variant text-left uppercase tracking-wide">
                                            <th class="px-md py-md font-bold text-xs">No</th>
                                            <th class="px-md py-md font-bold text-xs">Nama</th>
                                            <th class="px-md py-md font-bold text-xs">Pengerjaan</th>
                                            <th class="px-md py-md font-bold text-xs">Gaji</th>
                                            <th class="px-md py-md font-bold text-xs text-center">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-outline-variant font-body-data">
                                        @foreach ($dataKaryawan as $index => $k)
                                            <tr class="hover:bg-surface-container-low transition-colors filterable-row"
                                                data-search="{{ strtolower(($k->nama_karyawan ?? '') . ' ' . ($k->total_pcs ?? '') . ' ' . ($k->estimasi_gaji ?? '') . ' gaji') }}"
                                                data-absensi="{{ strtolower($k->status_hari_ini ?? '') === 'hadir' ? 'hadir' : (strtolower($k->status_hari_ini ?? '') === 'sakit' ? 'sakit' : ((strtolower($k->status_hari_ini ?? '') === 'izin' || strtolower($k->status_hari_ini ?? '') === 'cuti') ? 'izin-cuti' : 'tanpa-keterangan')) }}"
                                                data-salary="{{ $k->estimasi_gaji ?? 0 }}">
                                                <td class="px-md py-md">
                                                    {{ $index + 1 }}
                                                </td>

                                                <td class="px-md py-md font-bold">
                                                    {{ $k->nama_karyawan }}
                                                </td>

                                                <td class="px-md py-md">
                                                    {{ $k->total_pcs }} Pcs
                                                </td>

                                                <td class="px-md py-md font-bold text-primary whitespace-nowrap">
                                                    Rp {{ number_format($k->estimasi_gaji, 0, ',', '.') }}
                                                </td>

                                                <td class="px-md py-md text-center">
                                                    <a href="/karyawan/{{ $k->id_karyawan }}/detail" class="inline-flex items-center justify-center gap-xs px-md py-xs bg-tertiary-container/10 text-tertiary rounded-lg font-bold text-[12px] hover:bg-tertiary-container hover:text-on-primary transition-all no-underline">
                                                        <span class="material-symbols-outlined text-[15px]">visibility</span>
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <!-- Delete Modal -->
    <div id="delete-modal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-md">
        <div class="delete-modal-backdrop fixed inset-0 bg-black/50 backdrop-blur-sm"></div>

        <div class="modal-card relative bg-white border border-outline-variant rounded-xl shadow-2xl max-w-md w-full p-lg soft-industrial-shadow">
            <div class="flex items-center gap-md mb-lg">
                <div class="w-12 h-12 bg-error-container rounded-full flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-error text-2xl">warning</span>
                </div>

                <h3 class="font-heading-md text-lg text-on-surface">
                    Konfirmasi Hapus
                </h3>
            </div>

            <p class="text-body-main text-on-surface-variant mb-sm">
                Apakah yakin ingin menghapus karyawan ini?
            </p>

            <p id="delete-item-name" class="font-bold text-on-surface mb-xl"></p>

            <p class="text-sm text-on-surface-variant mb-xl">
                Data karyawan yang sudah dihapus tidak dapat dikembalikan.
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

        const tableSearch = document.getElementById('table-search');
        const globalSearch = document.getElementById('global-search');

        function getSelectedValues(selector) {
            return Array.from(document.querySelectorAll(selector + ':checked')).map((checkbox) => checkbox.value.toLowerCase());
        }

        function applyCombinedFilter() {
            const keyword = (tableSearch?.value || globalSearch?.value || '').toLowerCase().trim();
            const selectedAbsensi = getSelectedValues('.filter-absensi');
            const salaryMin = document.getElementById('filter-salary-min')?.value;
            const salaryMax = document.getElementById('filter-salary-max')?.value;

            document.querySelectorAll('.filterable-row').forEach((row) => {
                const rowSearch = (row.dataset.search || row.innerText || '').toLowerCase();
                const rowAbsensi = (row.dataset.absensi || '').toLowerCase();
                const rowSalary = parseFloat(row.dataset.salary || '0');

                const matchesKeyword = keyword === '' || rowSearch.includes(keyword);
                const matchesAbsensi = selectedAbsensi.length === 0 || selectedAbsensi.includes(rowAbsensi);
                const matchesSalaryMin = salaryMin === '' || rowSalary >= parseFloat(salaryMin);
                const matchesSalaryMax = salaryMax === '' || rowSalary <= parseFloat(salaryMax);

                row.style.display = matchesKeyword && matchesAbsensi && matchesSalaryMin && matchesSalaryMax ? '' : 'none';
            });
        }

        [tableSearch, globalSearch].forEach((input) => {
            if (!input) return;

            input.addEventListener('input', (event) => {
                if (input === tableSearch && globalSearch) globalSearch.value = event.target.value;
                if (input === globalSearch && tableSearch) tableSearch.value = event.target.value;

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

                if (filterIcon) filterIcon.textContent = 'expand_more';
            });
        }

        if (applyFilter) {
            applyFilter.addEventListener('click', () => {
                applyCombinedFilter();

                if (filterDropdown) filterDropdown.classList.add('hidden');
                if (filterIcon) filterIcon.textContent = 'expand_more';
            });
        }

        if (clearFilter) {
            clearFilter.addEventListener('click', () => {
                document.querySelectorAll('.filter-absensi').forEach((checkbox) => {
                    checkbox.checked = false;
                });

                const salaryMin = document.getElementById('filter-salary-min');
                const salaryMax = document.getElementById('filter-salary-max');

                if (salaryMin) salaryMin.value = '';
                if (salaryMax) salaryMax.value = '';

                applyCombinedFilter();
            });
        }

        ['filter-salary-min', 'filter-salary-max'].forEach((id) => {
            const input = document.getElementById(id);

            if (input) {
                input.addEventListener('input', applyCombinedFilter);
            }
        });

        function setupCollapse(toggleId, iconId, contentId) {
            const toggle = document.getElementById(toggleId);
            const icon = document.getElementById(iconId);
            const content = document.getElementById(contentId);

            if (toggle && icon && content) {
                toggle.addEventListener('click', () => {
                    content.classList.toggle('is-hidden');

                    icon.textContent = content.classList.contains('is-hidden') ? 'expand_more' : 'expand_less';
                });
            }
        }

        setupCollapse('toggle-absensi', 'icon-absensi', 'content-absensi');
        setupCollapse('toggle-gaji', 'icon-gaji', 'content-gaji');

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