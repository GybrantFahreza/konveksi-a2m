<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Konveksi A2M</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f1f5f9;
            margin: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            color: #1e3a8a;
            font-size: 2em;
        }

        .date-box {
            background: white;
            padding: 8px 15px;
            border-radius: 6px;
            font-weight: bold;
            color: #475569;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Kartu Rangkuman Atas */
        .card-container {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .top-card {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border-left: 6px solid;
        }

        .top-card h4 {
            margin: 0;
            color: #64748b;
            font-size: 1em;
            font-weight: normal;
        }

        .top-card h2 {
            margin: 10px 0 0 0;
            font-size: 1.8em;
            color: #0f172a;
        }

        /* Tombol Menu Utama (Navigasi Cepat) */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .menu-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-decoration: none;
            color: #1e3a8a;
            font-weight: bold;
            font-size: 1.1em;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            border: 2px solid transparent;
        }

        .menu-btn:hover {
            border-color: #3b82f6;
            transform: translateY(-3px);
        }

        .menu-icon {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        /* Panel Bawah (Peringatan & Jadwal) */
        .panel-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .panel {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .panel h3 {
            margin-top: 0;
            color: #0f172a;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .alert-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .alert-item {
            background: #fef2f2;
            border-left: 4px solid #ef4444;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
        }

        .alert-item span.kritis {
            color: #991b1b;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border-bottom: 1px solid #e2e8f0;
            padding: 10px;
            text-align: left;
            font-size: 0.9em;
        }

        th {
            color: #475569;
        }

        .badge {
            background: #dbeafe;
            color: #1e40af;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.8em;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Dashboard Konveksi A2M</h1>
        <div style="display: flex; align-items: center; gap: 15px;">
            <div class="date-box">📅 {{ \Carbon\Carbon::now()->format('l, d F Y') }}</div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    style="background-color: #ef4444; color: white; border: none; padding: 10px 18px; border-radius: 8px; font-weight: bold; cursor: pointer; display: flex; align-items: center; gap: 8px; transition: 0.3s;">
                    <span>🚪</span> Keluar
                </button>
            </form>
        </div>
    </div>

    <div class="card-container">
        <div class="top-card" style="border-color: #3b82f6;">
            <h4>Keuangan Perusahaan</h4>
            <h2>Rp {{ number_format($saldoKas, 0, ',', '.') }}</h2>
        </div>
        <div class="top-card" style="border-color: #10b981;">
            <h4>Karyawan Hadir Hari Ini</h4>
            <h2>{{ $karyawanHadir }} <span style="font-size: 0.5em; color: gray;">/ {{ $totalKaryawan }} Orang</span>
            </h2>
        </div>
        <div class="top-card" style="border-color: #f59e0b;">
            <h4>Pesanan Sedang Dikerjakan</h4>
            <h2>{{ $pesananAktif }} <span style="font-size: 0.5em; color: gray;">Proyek</span></h2>
        </div>
    </div>

    <div class="menu-grid">
        <a href="/karyawan" class="menu-btn">
            <span class="menu-icon">👥</span> Manajemen Karyawan
        </a>
        <a href="/stok" class="menu-btn">
            <span class="menu-icon">📦</span> Gudang & Stok
        </a>
        <a href="/pesanan" class="menu-btn">
            <span class="menu-icon">📋</span> Daftar Pesanan
        </a>
        <a href="/progres" class="menu-btn" style="background-color: #eff6ff;">
            <span class="menu-icon">⚙️</span> Input Progres
        </a>
        <a href="/keuangan" class="menu-btn">
            <span class="menu-icon">💰</span> Buku Keuangan
        </a>
    </div>

    <div class="panel-container">

        <div class="panel">
            <h3>⚠️ Peringatan Stok Kritis</h3>
            <ul class="alert-list">
                @forelse($stokBahanKritis as $bahan)
                    <li class="alert-item">
                        <span>(Bahan) <strong>{{ $bahan->nama_bahan }}</strong></span>
                        <span class="kritis">Sisa: {{ $bahan->stok_sekarang }} {{ $bahan->satuan }}</span>
                    </li>
                @empty
                @endforelse

                @forelse($stokBarangJadiKritis as $barang)
                    <li class="alert-item">
                        <span>(Baju) <strong>{{ $barang->nama_barang }} ({{ $barang->ukuran }})</strong></span>
                        <span class="kritis">Sisa: {{ $barang->stok_sekarang }} Pcs</span>
                    </li>
                @empty
                @endforelse

                @if ($stokBahanKritis->isEmpty() && $stokBarangJadiKritis->isEmpty())
                    <div
                        style="text-align: center; color: #166534; padding: 20px; background: #f0fdf4; border-radius: 6px;">
                        ✅ Semua stok bahan baku dan barang jadi aman terkendali!
                    </div>
                @endif
            </ul>
        </div>

        <div class="panel">
            <h3>⏳ Deadline Pesanan Terdekat</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama Proyek</th>
                        <th>Klien</th>
                        <th>Tenggat Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesananMendesak as $pesanan)
                        <tr>
                            <td><strong>{{ $pesanan->nama_pesanan }}</strong></td>
                            <td>{{ $pesanan->nama_klien }}</td>
                            <td>
                                <span class="badge"
                                    style="{{ \Carbon\Carbon::parse($pesanan->tanggal_deadline)->isPast() ? 'background: #fee2e2; color: #991b1b;' : '' }}">
                                    {{ \Carbon\Carbon::parse($pesanan->tanggal_deadline)->format('d M Y') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center; color: gray;">Tidak ada pesanan aktif saat
                                ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
