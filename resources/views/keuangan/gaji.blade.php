<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rekap Penggajian</title>
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

        .btn-pay {
            padding: 8px 12px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-pay:hover {
            background-color: #2ecc71;
        }
    </style>
</head>

<body>
    <div class="nav">
        <a href="/keuangan">⬅ Kembali ke Menu Keuangan</a>

        <a href="/progres">📝 Lihat Log Progres</a>
    </div>

    <h1>Rekapitulasi Gaji Karyawan (Belum Dibayar)</h1>

    @if (session('success'))
        <div
            style="background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 15px; border-left: 5px solid #28a745;">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Total Pcs Dikerjakan</th>
                <th>Total Gaji Diakumulasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rekapGaji as $rekap)
                <tr>
                    <td style="font-size: 1.1em; font-weight: bold;">{{ $rekap->nama_karyawan }}</td>
                    <td>{{ $rekap->total_pcs }} Pcs</td>
                    <td style="color: blue; font-weight: bold; font-size: 1.1em;">
                        Rp {{ number_format($rekap->total_gaji, 0, ',', '.') }}
                    </td>
                    <td>
                        <form action="/gaji/bayar/{{ $rekap->id_karyawan }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin membayar gaji sejumlah Rp {{ number_format($rekap->total_gaji, 0, ',', '.') }} kepada {{ $rekap->nama_karyawan }}?');">
                            @csrf
                            <button type="submit" class="btn-pay">💸 Bayar Gaji Sekarang</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 20px; color: gray;">
                        Hore! Semua karyawan sudah lunas dibayar. Tidak ada tunggakan gaji.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
