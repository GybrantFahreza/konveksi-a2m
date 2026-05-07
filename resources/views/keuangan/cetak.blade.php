<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Keuangan Konveksi</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            padding: 20px;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        .header p {
            margin: 5px 0 0 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .summary {
            margin-top: 20px;
            width: 300px;
            float: right;
            border: 1px solid black;
            padding: 10px;
        }

        .summary p {
            margin: 5px 0;
            display: flex;
            justify-content: space-between;
            font-weight: bold;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="header">
        <h1>LAPORAN BUKU KEUANGAN</h1>
        <p>KONVEKSI A2M</p>
        <p>Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Tipe</th>
                <th>Masuk (Rp)</th>
                <th>Keluar (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($arusKas as $kas)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($kas->tanggal_transaksi)->format('d/m/Y') }}</td>
                    <td class="text-left">{{ $kas->kategori }}</td>
                    <td class="text-left">{{ $kas->deskripsi }}</td>
                    <td>{{ $kas->tipe_arus }}</td>
                    <td class="text-right">
                        {{ $kas->tipe_arus == 'Masuk' ? number_format($kas->nominal, 0, ',', '.') : '-' }}</td>
                    <td class="text-right">
                        {{ $kas->tipe_arus == 'Keluar' ? number_format($kas->nominal, 0, ',', '.') : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <p><span>Total Pemasukan:</span> <span>Rp {{ number_format($pemasukan, 0, ',', '.') }}</span></p>
        <p><span>Total Pengeluaran:</span> <span>Rp {{ number_format($pengeluaran, 0, ',', '.') }}</span></p>
        <hr>
        <p style="font-size: 14px;"><span>SALDO AKHIR:</span> <span>Rp {{ number_format($saldo, 0, ',', '.') }}</span>
        </p>
    </div>

</body>

</html>
