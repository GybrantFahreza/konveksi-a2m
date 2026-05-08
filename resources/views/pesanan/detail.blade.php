<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Pengerjaan Pesanan</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f9fafb;
        }

        .panel {
            background: white;
            padding: 20px;
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
            font-size: 0.9em;
        }

        th {
            background-color: #f3f4f6;
            color: #374151;
        }

        .nav {
            margin-bottom: 20px;
        }

        .nav a {
            text-decoration: none;
            color: #153752;
            font-weight: bold;
        }

        .badge-date {
            font-size: 0.8em;
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 3px 6px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    <div class="nav">
        <a href="/pesanan">⬅ Kembali ke Daftar Pesanan</a>
    </div>

    <div class="panel">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 style="margin: 0;">Detail Riwayat Pengerjaan: {{ $pesanan->nama_pesanan }}</h2>
            <a href="/pesanan" style="font-size: 1.5em; text-decoration: none; color: black;">❌</a>
        </div>
        <div
            style="background-color: #f0fdf4; border: 1px solid #bbf7d0; padding: 15px; border-radius: 8px; margin-top: 15px; margin-bottom: 20px; display: flex; flex-wrap: wrap; gap: 15px; align-items: center;">
            <div style="margin-right: auto;">
                <span style="color: #166534; font-weight: bold; font-size: 1.1em;">🎯 Total Target:
                    {{ $pesanan->target_total_pcs }} Pcs</span>
            </div>
            <div
                style="background: white; padding: 5px 12px; border-radius: 6px; border: 1px solid #e2e8f0; font-weight: bold; color: #334155;">
                S : {{ $pesanan->target_s ?? 0 }}</div>
            <div
                style="background: white; padding: 5px 12px; border-radius: 6px; border: 1px solid #e2e8f0; font-weight: bold; color: #334155;">
                M : {{ $pesanan->target_m ?? 0 }}</div>
            <div
                style="background: white; padding: 5px 12px; border-radius: 6px; border: 1px solid #e2e8f0; font-weight: bold; color: #334155;">
                L : {{ $pesanan->target_l ?? 0 }}</div>
            <div
                style="background: white; padding: 5px 12px; border-radius: 6px; border: 1px solid #e2e8f0; font-weight: bold; color: #334155;">
                XL : {{ $pesanan->target_xl ?? 0 }}</div>
            <div
                style="background: white; padding: 5px 12px; border-radius: 6px; border: 1px solid #e2e8f0; font-weight: bold; color: #334155;">
                XXL : {{ $pesanan->target_xxl ?? 0 }}</div>
            <div
                style="background: white; padding: 5px 12px; border-radius: 6px; border: 1px solid #e2e8f0; font-weight: bold; color: #334155;">
                3XL : {{ $pesanan->target_3xl ?? 0 }}</div>
        </div>
        @if (session('success'))
            <div
                style="background-color: #d4edda; color: #155724; padding: 10px; margin-top: 15px; border-radius: 4px;">
                {{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama & Tanggal</th>
                    <th>Posisi</th>
                    <th>Harga/Pcs</th>
                    <th style="background-color: #f8fafc; text-align: center;">S</th>
                    <th style="background-color: #f8fafc; text-align: center;">M</th>
                    <th style="background-color: #f8fafc; text-align: center;">L</th>
                    <th style="background-color: #f8fafc; text-align: center;">XL</th>
                    <th style="background-color: #f8fafc; text-align: center;">XXL</th>
                    <th style="background-color: #f8fafc; text-align: center;">3XL</th>
                    <th>Total Pcs</th>
                    <th>Total Gaji (Hari itu)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $index => $log)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <span
                                class="badge-date">{{ \Carbon\Carbon::parse($log->tanggal_input)->format('d M Y') }}</span><br>
                            <strong>{{ $log->karyawan->nama_karyawan }}</strong>
                        </td>
                        <td>{{ $log->tarifPeran->peran }}</td>
                        <td>Rp {{ number_format($log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}</td>

                        <td style="text-align: center;">{{ $log->ukuran_s ?: '-' }}</td>
                        <td style="text-align: center;">{{ $log->ukuran_m ?: '-' }}</td>
                        <td style="text-align: center;">{{ $log->ukuran_l ?: '-' }}</td>
                        <td style="text-align: center;">{{ $log->ukuran_xl ?: '-' }}</td>
                        <td style="text-align: center;">{{ $log->ukuran_xxl ?: '-' }}</td>
                        <td style="text-align: center;">{{ $log->ukuran_3xl ?: '-' }}</td>

                        <td><strong style="font-size: 1.1em;">{{ $log->jumlah_selesai_hari_ini }}</strong></td>
                        <td style="font-weight: bold; color: #153752;">
                            Rp
                            {{ number_format($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs, 0, ',', '.') }}
                        </td>
                        <td style="display: flex; gap: 5px;">
                            <a href="/pesanan/{{ $pesanan->id_pesanan }}/progres/{{ $log->id_log }}/edit"
                                style="padding: 4px 10px; background: #f39c12; color: white; border-radius: 4px; text-decoration: none;">Edit</a>

                            <form action="/pesanan/{{ $pesanan->id_pesanan }}/progres/{{ $log->id_log }}"
                                method="POST" onsubmit="return confirm('Hapus riwayat hari ini saja?');"
                                style="margin:0;">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    style="padding: 4px 10px; background: #e74c3c; color: white; border: none; border-radius: 4px; cursor: pointer;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" style="text-align: center; color: gray; padding: 20px;">Belum ada progres
                            yang tercatat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
