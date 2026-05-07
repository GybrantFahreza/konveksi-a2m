<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log Progres Harian</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .nav a {
            margin-right: 15px;
            text-decoration: none;
            color: blue;
        }
    </style>
</head>

<body>
    <div class="nav">
        <a href="/">⬅ Kembali ke Dashboard</a>
    </div>

    <h1>Riwayat Setoran Progres Karyawan</h1>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="/progres/create"
        style="padding: 8px 12px; background-color: green; color: white; text-decoration: none; border-radius: 4px;">+
        Input Progres Hari Ini</a>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Karyawan</th>
                <th>Proyek Pesanan</th>
                <th>Tugas / Peran</th>
                <th>Jumlah Pcs</th>
                <th>Total Upah (Otomatis)</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->tanggal_input }}</td>
                    <td>{{ $log->karyawan->nama_karyawan }}</td>
                    <td>{{ $log->tarifPeran->pesanan->nama_pesanan }}</td>
                    <td>{{ $log->tarifPeran->peran }} (Rp
                        {{ number_format($log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}/pcs)</td>
                    <td><strong>{{ $log->jumlah_selesai_hari_ini }}</strong></td>
                    <!-- INI DIA MAGISNYA! Kita kalikan langsung di view atau controller -->
                    <td style="color: blue; font-weight: bold;">
                        Rp
                        {{ number_format($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}
                    </td>
                    <td>
                        <span style="color: {{ $log->status_penggajian == 'Sudah Dibayar' ? 'green' : 'red' }}">
                            {{ $log->status_penggajian }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
