<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Gaji {{ $karyawan->nama_karyawan }}</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f9fafb;
        }

        .panel {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            text-align: left;
        }

        th {
            background-color: #f3f4f6;
        }

        .total-row {
            background-color: #eff6ff;
            font-weight: bold;
            font-size: 1.1em;
        }
    </style>
</head>

<body>
    <a href="/keuangan" style="text-decoration: none; color: #153752; font-weight: bold;">⬅ Kembali ke Keuangan</a>

    <div class="panel" style="margin-top: 20px;">
        <h2>Laporan Progres & Gaji: {{ $karyawan->nama_karyawan }}</h2>
        <p style="color: gray;">Status: Menunggu Pembayaran</p>

        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Pesanan</th>
                    <th>Tugas/Posisi</th>
                    <th>Rincian Ukuran (S - 3XL)</th>
                    <th>Banyak</th>
                    <th>Harga/Pcs</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($log->tanggal_input)->format('d/m/Y') }}</td>
                        <td><strong>{{ $log->tarifPeran->pesanan->nama_pesanan }}</strong></td>
                        <td>{{ $log->tarifPeran->peran }}</td>
                        <td style="font-size: 0.8em; color: gray;">
                            S:{{ $log->ukuran_s }} M:{{ $log->ukuran_m }} L:{{ $log->ukuran_l }}
                            XL:{{ $log->ukuran_xl }}
                        </td>
                        <td>{{ $log->jumlah_selesai_hari_ini }} pcs</td>
                        <td>Rp {{ number_format($log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}</td>
                        <td style="font-weight: bold;">
                            Rp
                            {{ number_format($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}
                        </td>
                    </tr>
                    @php $grandTotal += ($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs); @endphp
                @endforeach
                <tr class="total-row">
                    <td colspan="6" style="text-align: right;">Total Gaji yang Harus Dibayar:</td>
                    <td style="color: #1e3a8a;">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
