<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Pesanan</title>
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

        .card-container {
            display: flex;
            gap: 20px;
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
            border: 1px solid #e5e7eb;
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 8px;
        }

        .text-box h4 {
            margin: 0;
            color: gray;
            font-weight: normal;
            font-size: 0.9em;
        }

        .text-box h2 {
            margin: 5px 0 0 0;
            font-size: 1.5em;
            color: #111;
        }

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
        }

        .btn-blue {
            background-color: #93c5fd;
            color: #1e3a8a;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

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
            text-align: left;
            font-size: 0.9em;
        }

        th {
            background-color: #f3f4f6;
            color: #374151;
        }

        .progress-bg {
            background-color: #e5e7eb;
            width: 100px;
            height: 8px;
            border-radius: 4px;
            margin-top: 5px;
        }

        .progress-fill {
            background-color: #22c55e;
            height: 100%;
            border-radius: 4px;
        }

        /* Tombol Aksi Baru */
        .btn-detail {
            padding: 5px 10px;
            background-color: #e5e7eb;
            border-radius: 4px;
            text-decoration: none;
            color: #374151;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-selesai {
            padding: 5px 10px;
            background-color: #22c55e;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-disabled {
            padding: 5px 10px;
            background-color: #d1d5db;
            border-radius: 4px;
            color: #6b7280;
            font-weight: bold;
            border: none;
            cursor: not-allowed;
        }
    </style>
</head>

<body>

    <div class="nav">
        <a href="/">⬅ Kembali ke Dashboard</a>
    </div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            {{ session('error') }}
        </div>
    @endif

    <div class="card-container">
        <div class="top-card">
            <div class="icon-box" style="background-color: #60a5fa;"></div>
            <div class="text-box">
                <h4>Total Pesanan Aktif</h4>
                <h2>{{ $totalPesananAktif }} types</h2>
            </div>
        </div>
        <div class="top-card">
            <div class="icon-box" style="background-color: #86efac;"></div>
            <div class="text-box">
                <h4>Target Pcs Pesanan</h4>
                <h2>{{ $targetPcsPesanan }} Pcs</h2>
            </div>
        </div>
        <div class="top-card">
            <div class="icon-box" style="background-color: #fdba74;"></div>
            <div class="text-box">
                <h4>Pesanan selesai</h4>
                <h2>{{ $pesananSelesai }} Items</h2>
            </div>
        </div>
    </div>

    <div class="action-bar">
        <a href="/pesanan/create" class="btn-green">+ Tambah Pesanan Baru</a>
        <a href="/progres/create" class="btn-blue">+ Input Progres Kerja</a>
    </div>

    <div class="panel">
        <h2 style="margin-top: 0; color: #1e3a8a;">Daftar Pesanan Aktif</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pesanan</th>
                    <th>Klien</th>
                    <th>Nomor HP</th>
                    <th>Target</th>
                    <th>Selesai</th>
                    <th>Progress</th>
                    <th>Deadline</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesananAktif as $index => $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $p->nama_pesanan }}</strong></td>
                        <td>{{ $p->nama_klien }}</td>
                        <td>{{ $p->no_hp_klien ?? '-' }}</td>
                        <td>{{ $p->target_total_pcs }} pcs</td>
                        <td>{{ $p->selesai_pcs }} pcs</td>
                        <td>
                            <span style="font-size: 0.85em; font-weight: bold;">{{ $p->progress_persen }}%</span>
                            <div class="progress-bg">
                                <div class="progress-fill" style="width: {{ $p->progress_persen }}%;"></div>
                            </div>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_deadline)->format('d M Y') }}</td>
                        <td style="display: flex; gap: 5px;">
                            <a href="/pesanan/{{ $p->id_pesanan }}/detail" class="btn-detail">📄 Detail</a>

                            @if ($p->progress_persen >= 100)
                                <form action="/pesanan/{{ $p->id_pesanan }}/selesai" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn-selesai"
                                        style="background: #10b981; color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer; font-weight: bold;"
                                        onclick="return confirm('Mantap nih! Yakin mau tandai selesai?')">
                                        ✅ Tandai Selesai
                                    </button>
                                </form>
                            @else
                                <button class="btn-disabled" title="Progres harus 100% untuk diselesaikan">⏳ Belum
                                    Selesai</button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" style="text-align: center; padding: 20px; color: gray;">Tidak ada pesanan
                            aktif saat ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="panel">
        <h2 style="margin-top: 0; color: #166534;">Daftar Pesanan Selesai</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pesanan</th>
                    <th>Klien</th>
                    <th>Total Dikerjakan</th>
                    <th>Diselesaikan Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($daftarSelesai as $index => $p)
                    <tr style="background-color: #f8fafc;">
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $p->nama_pesanan }}</strong></td>
                        <td>{{ $p->nama_klien }}</td>
                        <td><strong style="color: #166534;">{{ $p->selesai_pcs }} pcs</strong></td>
                        <td>{{ \Carbon\Carbon::parse($p->updated_at)->format('d M Y, H:i') }}</td>
                        <td>
                            <a href="/pesanan/{{ $p->id_pesanan }}/detail" class="btn-detail">📄 Lihat Arsip Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 20px; color: gray;">Belum ada pesanan
                            yang selesai dikerjakan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
