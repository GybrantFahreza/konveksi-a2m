<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Keuangan</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f9fafb;
        }

        .nav {
            margin-bottom: 20px;
        }

        .nav a {
            text-decoration: none;
            color: #153752;
            font-weight: bold;
        }

        /* Top Cards */
        .card-container {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .top-card {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        .text-box h4 {
            margin: 0;
            color: gray;
            font-weight: normal;
            font-size: 0.9em;
        }

        .text-box h2 {
            margin: 5px 0 0 0;
            font-size: 1.3em;
            color: #111;
        }

        /* Action Buttons */
        .action-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .btn-green {
            background-color: #86efac;
            color: #166534;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-blue {
            background-color: #93c5fd;
            color: #1e3a8a;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        /* Tables */
        .panel {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
            padding: 12px 8px;
            text-align: center;
            font-size: 0.9em;
        }

        th {
            background-color: #f3f4f6;
            color: #374151;
        }

        td:nth-child(2),
        td:nth-child(3),
        td:nth-child(4) {
            text-align: left;
        }

        /* Rata kiri untuk text */

        /* Badges & Actions */
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8em;
            font-weight: bold;
        }

        .badge-lunas {
            background-color: #bbf7d0;
            color: #166534;
        }

        .badge-belum {
            background-color: #fca5a5;
            color: #991b1b;
        }

        .btn-icon {
            padding: 4px 8px;
            border-radius: 4px;
            text-decoration: none;
            color: #374151;
            background: #e5e7eb;
            margin: 0 2px;
        }

        .btn-detail {
            background-color: #a7f3d0;
            color: #065f46;
            text-decoration: none;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.85em;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="nav"><a href="/">⬅ Kembali ke Dashboard Utama</a></div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            {{ session('success') }}</div>
    @endif

    <div class="card-container">
        <div class="top-card">
            <div class="icon-box" style="background-color: #60a5fa;">💼</div>
            <div class="text-box">
                <h4>Saldo Saat ini</h4>
                <h2>Rp {{ number_format($saldoSaatIni, 0, ',', '.') }}</h2>
            </div>
        </div>
        <div class="top-card">
            <div class="icon-box" style="background-color: #86efac;">+</div>
            <div class="text-box">
                <h4>Pemasukan / Bulan</h4>
                <h2>Rp {{ number_format($pemasukanBulanIni, 0, ',', '.') }}</h2>
            </div>
        </div>
        <div class="top-card">
            <div class="icon-box" style="background-color: #fca5a5;">-</div>
            <div class="text-box">
                <h4>Pengeluaran / Bulan</h4>
                <h2>Rp {{ number_format($pengeluaranBulanIni, 0, ',', '.') }}</h2>
            </div>
        </div>
        <div class="top-card">
            <div class="icon-box" style="background-color: #d1d5db; color: #374151;">💰</div>
            <div class="text-box">
                <h4>Total Seluruh Gaji</h4>
                <h2>Rp {{ number_format($totalSeluruhGaji, 0, ',', '.') }}</h2>
            </div>
        </div>
    </div>

    <div class="action-bar">
        <a href="/keuangan/create" class="btn-green">+ Tambah Transaksi</a>
        <a href="/keuangan/cetak" target="_blank" class="btn-blue">📄 Cetak Laporan Keuangan</a>
    </div>

    <div class="panel">
        <h2 style="margin-top: 0; color: #111;">Buku Keuangan</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Tipe</th>
                    <th>Banyak</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($arusKas as $kas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($kas->tanggal_transaksi)->format('d F Y') }}</td>
                        <td><strong>{{ $kas->kategori }}</strong></td>
                        <td>{{ $kas->deskripsi ?: '-' }}</td>
                        <td>{{ $kas->tipe_arus }}</td>
                        <td>{{ $kas->banyak }}</td>
                        <td>Rp {{ number_format($kas->harga, 0, ',', '.') }}</td>
                        <td style="font-weight: bold;">Rp {{ number_format($kas->nominal, 0, ',', '.') }}</td>
                        <td>
                            <span
                                class="badge {{ $kas->status_transaksi == 'Lunas' ? 'badge-lunas' : 'badge-belum' }}">{{ $kas->status_transaksi }}</span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 5px; justify-content: center;">
                                <a href="/keuangan/{{ $kas->id_kas }}/edit" class="btn-icon">✏️</a>
                                <form action="/keuangan/{{ $kas->id_kas }}" method="POST"
                                    onsubmit="return confirm('Hapus transaksi ini?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon"
                                        style="border:none; cursor:pointer;">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" style="color: gray; padding: 20px;">Belum ada transaksi di buku keuangan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="panel">
        <h2 style="margin-top: 0; color: #111;">Penggajian Karyawan</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Total Pengerjaan</th>
                    <th>Total Gaji</th>
                    <th>Periode</th>
                    <th>Status</th>
                    <th>Sisa Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rekapGaji as $gaji)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="text-align: left;"><strong>{{ $gaji->nama_karyawan }}</strong></td>
                        <td>{{ $gaji->total_pcs }}</td>
                        <td style="font-weight: bold;">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                        <td>Hari ini</td>
                        <td><span class="badge badge-belum">Belum Lunas</span></td>
                        <td style="color: #991b1b;">Rp {{ number_format($gaji->sisa_gaji, 0, ',', '.') }}</td>
                        <td style="display: flex; justify-content: center; gap: 5px;">
                            <a href="/keuangan/gaji/{{ $gaji->id_karyawan }}/detail" class="btn-detail">Detail
                                Penggajian</a>
                            <form action="/gaji/bayar/{{ $gaji->id_karyawan }}" method="POST"
                                onsubmit="return confirm('Bayar gaji orang ini?');" style="margin:0;">
                                @csrf
                                <button type="submit" class="btn-icon"
                                    style="background: white; border: 1px solid #ccc; cursor: pointer;">💸</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="color: gray; padding: 20px;">Semua gaji karyawan sudah dilunasi!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
