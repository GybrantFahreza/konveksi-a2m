<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Karyawan: {{ $karyawan->nama_karyawan }}</title>
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

        .panel {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #f3f4f6;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .panel-header h2 {
            margin: 0;
            color: #111;
            font-size: 1.5em;
        }

        .close-btn {
            font-size: 1.5em;
            text-decoration: none;
            color: #111;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border-bottom: 1px solid #e5e7eb;
            padding: 12px 8px;
            text-align: center;
            font-size: 0.9em;
        }

        th {
            background-color: #f3f4f6;
            color: #374151;
            font-weight: bold;
        }

        /* Meratakan teks ke kiri khusus untuk nama pesanan dan posisi */
        td:nth-child(2),
        td:nth-child(3) {
            text-align: left;
        }

        th:nth-child(2),
        th:nth-child(3) {
            text-align: left;
        }

        .total-row {
            background-color: #f8fafc;
            font-weight: bold;
            font-size: 1em;
        }

        .total-box {
            display: inline-block;
            background-color: #e5e7eb;
            padding: 8px 15px;
            border-radius: 6px;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8em;
            font-weight: bold;
        }

        .bg-green {
            background-color: #bbf7d0;
            color: #166534;
        }

        .bg-red {
            background-color: #fecaca;
            color: #991b1b;
        }

        .bg-yellow {
            background-color: #fef08a;
            color: #854d0e;
        }
    </style>
</head>

<body>

    <div class="nav">
        <a href="/karyawan">⬅ Kembali ke Daftar Karyawan</a>
    </div>

    <div class="panel">
        <div class="panel-header">
            <h2>Detail Pengerjaan {{ $karyawan->nama_karyawan }}</h2>
            <a href="/karyawan" class="close-btn">❌</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pesanan</th>
                    <th>Posisi</th>
                    <th>Harga/Pcs</th>
                    <th>S</th>
                    <th>M</th>
                    <th>L</th>
                    <th>XL</th>
                    <th>XXL</th>
                    <th>3XL</th>
                    <th>Banyak</th>
                    <th>Total Gaji</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @forelse($karyawan->logProgres as $log)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $log->tarifPeran->pesanan->nama_pesanan ?? '-' }}</strong></td>
                        <td>{{ $log->tarifPeran->peran }}</td>
                        <td>Rp {{ number_format($log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}</td>

                        <td>{{ $log->ukuran_s > 0 ? $log->ukuran_s : '' }}</td>
                        <td>{{ $log->ukuran_m > 0 ? $log->ukuran_m : '' }}</td>
                        <td>{{ $log->ukuran_l > 0 ? $log->ukuran_l : '' }}</td>
                        <td>{{ $log->ukuran_xl > 0 ? $log->ukuran_xl : '' }}</td>
                        <td>{{ $log->ukuran_xxl > 0 ? $log->ukuran_xxl : '' }}</td>
                        <td>{{ $log->ukuran_3xl > 0 ? $log->ukuran_3xl : '' }}</td>

                        <td><strong>{{ $log->jumlah_selesai_hari_ini }}</strong></td>
                        <td>Rp
                            {{ number_format($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}
                        </td>
                    </tr>
                    @php $grandTotal += ($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs); @endphp
                @empty
                    <tr>
                        <td colspan="12" style="text-align: center; color: gray; padding: 20px;">Belum ada riwayat
                            pengerjaan.</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="11" style="text-align: right; padding-right: 20px;">Total Semua Gaji :</td>
                    <td>
                        <div class="total-box">Rp {{ number_format($grandTotal, 0, ',', '.') }}</div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="panel" style="max-width: 500px;">
        <h3 style="margin-top: 0; color: #1e3a8a;">Riwayat Absensi</h3>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th style="text-align: left;">Tanggal</th>
                    <th style="text-align: center;">Status Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($karyawan->absensi as $absen)
                    <tr>
                        <td style="text-align: left;">{{ \Carbon\Carbon::parse($absen->tanggal)->format('d F Y') }}
                        </td>
                        <td>
                            {{-- GANTI status_kehadiran MENJADI status_hadir DI BAWAH INI --}}
                            @if (strtolower($absen->status_hadir) == 'hadir')
                                <span
                                    style="background-color: #dcfce3; color: #166534; padding: 4px 10px; border-radius: 6px; font-weight: bold; font-size: 0.85em;">
                                    ✅ Hadir
                                </span>
                            @elseif(strtolower($absen->status_hadir) == 'sakit')
                                <span
                                    style="background-color: #fef08a; color: #854d0e; padding: 4px 10px; border-radius: 6px; font-weight: bold; font-size: 0.85em;">
                                    💊 Sakit
                                </span>
                            @elseif(strtolower($absen->status_hadir) == 'izin')
                                <span
                                    style="background-color: #e0f2fe; color: #075985; padding: 4px 10px; border-radius: 6px; font-weight: bold; font-size: 0.85em;">
                                    📝 Izin
                                </span>
                            @else
                                <span
                                    style="background-color: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 6px; font-weight: bold; font-size: 0.85em;">
                                    ❌ Alpa
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align: center; color: gray;">Belum ada riwayat absensi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
