<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <title>Laporan Gaji {{ $karyawan->nama_karyawan }} - KONVEKSI A2M</title>
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
                <h2 class="font-heading-lg text-2xl font-bold text-on-surface truncate">RINCIAN PENGGAJIAN</h2>
            </div>

            <div class="flex items-center gap-lg top-actions shrink-0">
                <div class="relative desktop-search">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant text-base">search</span>
                    <input class="pl-10 pr-4 py-1.5 bg-surface-container-low border border-outline-variant rounded-full text-sm text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all w-64" id="global-search" placeholder="Cari rincian gaji..." type="text">
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
            
            <div class="w-full max-w-full mx-auto space-y-lg">

                <div class="flex items-center justify-between gap-md border-b border-outline-variant pb-md">
                    <a class="inline-flex items-center gap-xs text-primary font-bold hover:underline group no-underline text-sm md:text-base" href="/keuangan">
                        <span class="material-symbols-outlined text-[20px] transition-transform group-hover:-translate-x-1">arrow_back</span>
                        <span>Kembali ke Keuangan</span>
                    </a>
                </div>

                <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 soft-industrial-shadow flex flex-col sm:flex-row sm:items-center sm:justify-between gap-md text-left">
                    <div class="flex items-center gap-md">
                        <div class="w-14 h-14 rounded-xl bg-primary-container text-on-primary-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-[32px]">badge</span>
                        </div>
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-on-surface-variant">Karyawan Terkait</span>
                            <h3 class="font-nav-label text-2xl md:text-3xl font-bold text-on-surface leading-tight mt-0.5">{{ $karyawan->nama_karyawan }}</h3>
                        </div>
                    </div>
                    <div class="bg-surface-container-high px-md py-sm rounded-lg border border-outline-variant/60 w-fit">
                        <p class="text-xs text-on-surface-variant font-bold">Status Berkas</p>
                        <span class="inline-flex items-center gap-xs text-sm font-bold text-tertiary mt-0.5">
                            <span class="w-2 h-2 bg-tertiary rounded-full animate-pulse"></span> Aktif Terbuka
                        </span>
                    </div>
                </div>

                <div class="bg-surface-container-lowest border border-outline-variant rounded-xl soft-industrial-shadow overflow-hidden text-left">
                    <div class="p-lg bg-surface-container border-b border-outline-variant">
                        <h4 class="font-heading-md font-bold text-on-surface text-base md:text-lg">Lembar Rincian Log Kerja Harian Berjalan</h4>
                    </div>

                    <div class="overflow-x-auto w-full">
                        <div class="inline-block min-w-full align-middle">
                            <table class="w-full table-fixed border-collapse min-w-full md:min-w-0">
                                <thead>
                                    <tr class="bg-surface-container-low text-on-surface-variant text-xs md:text-sm font-bold border-b border-outline-variant">
                                        <th class="py-4 px-3 font-heading-md w-[11%]">Tanggal</th>
                                        <th class="py-4 px-3 font-heading-md w-[22%]">Pesanan</th>
                                        <th class="py-4 px-3 font-heading-md w-[13%]">Peran Tugas</th>
                                        <th class="py-4 px-3 font-heading-md w-[22%]">Rincian Ukuran</th>
                                        <th class="py-4 px-3 font-heading-md w-[9%]">Jumlah</th>
                                        <th class="py-4 px-3 font-heading-md w-[11%]">Tarif / Pcs</th>
                                        <th class="py-4 px-4 font-heading-md w-[12%] text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $grandTotal = 0; @endphp
                                    @foreach ($logs as $log)
                                        <tr class="border-b border-surface-container-high hover:bg-surface-container-low/40 transition-colors font-body-main text-sm md:text-base">
                                            <td class="py-4 px-3 font-body-data whitespace-nowrap text-on-surface-variant">
                                                {{ \Carbon\Carbon::parse($log->tanggal_input)->format('d/m/Y') }}
                                            </td>
                                            <td class="py-4 px-3 font-bold text-on-surface break-words pr-2">
                                                {{ $log->tarifPeran->pesanan->nama_pesanan }}
                                            </td>
                                            <td class="py-4 px-3">
                                                <span class="bg-secondary/10 text-on-secondary-container px-2 py-0.5 rounded text-xs font-bold block w-fit">
                                                    {{ $log->tarifPeran->peran }}
                                                </span>
                                            </td>
                                            <td class="py-4 px-3 text-xs font-body-data text-on-surface-variant">
                                                <div class="grid grid-cols-2 gap-x-2 gap-y-0.5">
                                                    <span>S: <b class="text-on-surface">{{ $log->ukuran_s }}</b></span>
                                                    <span>M: <b class="text-on-surface">{{ $log->ukuran_m }}</b></span>
                                                    <span>L: <b class="text-on-surface">{{ $log->ukuran_l }}</b></span>
                                                    <span>XL: <b class="text-on-surface">{{ $log->ukuran_xl }}</b></span>
                                                    <span>XXL: <b class="text-on-surface">{{ $log->ukuran_xxl }}</b></span>
                                                    <span>3XL: <b class="text-on-surface">{{ $log->ukuran_3xl }}</b></span>
                                                </div>
                                            </td>
                                            <td class="py-4 px-3 font-bold text-on-surface font-body-data whitespace-nowrap">
                                                {{ $log->jumlah_selesai_hari_ini }} pcs
                                            </td>
                                            <td class="py-4 px-3 font-body-data text-on-surface-variant whitespace-nowrap">
                                                Rp {{ number_format($log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}
                                            </td>
                                            <td class="py-4 px-4 font-bold font-body-data text-right text-on-surface whitespace-nowrap">
                                                Rp {{ number_format($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        @php $grandTotal += ($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs); @endphp
                                    @endforeach

                                    <tr class="bg-primary/5 font-heading-lg text-base border-t border-primary/20">
                                        <td colspan="6" class="py-5 px-3 text-right text-on-surface-variant font-bold">
                                            Total Gaji Yang Harus Dibayar:
                                        </td>
                                        <td class="py-5 px-4 text-right text-primary font-bold font-body-data text-xl whitespace-nowrap">
                                            Rp {{ number_format($grandTotal, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-lg pt-md">
                    <div class="md:col-span-2 bg-surface-container-lowest border border-outline-variant rounded-xl p-lg flex items-center gap-lg text-left shadow-sm">
                        <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center text-primary shrink-0">
                            <span class="material-symbols-outlined text-[32px]">verified_user</span>
                        </div>
                        <div>
                            <h4 class="font-heading-md text-on-surface font-bold text-sm md:text-base">Verifikasi Produksi</h4>
                            <p class="font-body-main text-on-surface-variant text-xs md:text-sm leading-relaxed mt-0.5">Laporan penggajian harian ini telah dihitung otomatis dan divalidasi silang berdasarkan log kuantitas riil input lantai produksi konveksi.</p>
                        </div>
                    </div>
                    
                    <div class="bg-primary text-on-primary rounded-xl p-lg relative overflow-hidden group text-left shadow-md flex flex-col justify-center">
                        <div class="relative z-10">
                            <h4 class="font-heading-md text-base mb-xs font-bold">Sinkronisasi Log</h4>
                            <p class="font-body-main text-primary-fixed text-xs leading-relaxed mb-3">Waktu pembaharuan berkas terakhir:</p>
                            <div class="flex items-center gap-xs text-xs font-bold bg-white/10 px-3 py-1.5 rounded-lg w-fit">
                                <span class="material-symbols-outlined text-sm">schedule</span>
                                <span>16 Mei 2026, 14:20 WIB</span>
                            </div>
                        </div>
                        <div class="absolute -bottom-4 -right-4 w-20 h-20 bg-secondary-container/20 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                    </div>
                </div>

            </div>
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