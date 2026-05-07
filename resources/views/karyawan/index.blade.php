<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Karyawan</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f9fafb;
        }

        .container {
            display: flex;
            gap: 20px;
        }

        /* Bagian Kiri (Tabel Induk) */
        .left-panel {
            flex: 2;
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
        }

        th {
            background-color: #f3f4f6;
            color: #374151;
        }

        .btn-add {
            padding: 8px 15px;
            background-color: #86efac;
            color: #166534;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        /* Progress Bar Kehadiran */
        .progress-bg {
            background-color: #e5e7eb;
            width: 100%;
            height: 8px;
            border-radius: 4px;
            margin-top: 5px;
        }

        .progress-fill {
            background-color: #22c55e;
            height: 100%;
            border-radius: 4px;
        }

        /* Bagian Kanan (Panel Absen & Gaji) */
        .right-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .absen-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            border-bottom: 1px solid #f3f4f6;
            padding-bottom: 5px;
        }

        select {
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .btn-save {
            padding: 8px 15px;
            background-color: #22c55e;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
            margin-top: 10px;
        }

        .btn-detail {
            padding: 4px 10px;
            background-color: #a7f3d0;
            color: #065f46;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.85em;
        }

        .nav {
            margin-bottom: 20px;
        }

        .nav a {
            text-decoration: none;
            color: #153752;
            font-weight: bold;
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

    <div class="container">
        <!-- KIRI: TABEL UTAMA -->
        <div class="left-panel">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Daftar Karyawan Aktif</h2>
                <a href="/karyawan/create" class="btn-add">+ Tambah Karyawan Baru</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Nomor HP</th>
                        <th>Status Hari Ini</th>
                        <th>Kehadiran / Bulan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKaryawan as $index => $k)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $k->nama_karyawan }}</strong></td>
                            <td>{{ $k->no_hp }}</td>
                            <td>
                                @php
                                    $color =
                                        $k->status_hari_ini == 'Hadir'
                                            ? 'green'
                                            : ($k->status_hari_ini == 'Izin'
                                                ? 'orange'
                                                : ($k->status_hari_ini == 'Sakit'
                                                    ? 'blue'
                                                    : 'red'));
                                @endphp
                                <span
                                    style="color: {{ $color }}; font-weight: bold;">{{ $k->status_hari_ini }}</span>
                            </td>
                            <td>
                                <span style="font-size: 0.85em; font-weight: bold;">{{ $k->persentase_hadir }}%</span>
                                <div class="progress-bg">
                                    <div class="progress-fill" style="width: {{ $k->persentase_hadir }}%;"></div>
                                </div>
                            </td>
                            <td style="display: flex; gap: 5px;">
                                <a href="/karyawan/{{ $k->id_karyawan }}/edit"
                                    style="padding: 4px 8px; background: #f39c12; color: white; text-decoration: none; border-radius: 4px; font-size: 0.8em;">Edit</a>
                                <form action="/karyawan/{{ $k->id_karyawan }}" method="POST"
                                    onsubmit="return confirm('Hapus karyawan?');" style="margin:0;">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        style="padding: 4px 8px; background: #e74c3c; color: white; border: none; border-radius: 4px; font-size: 0.8em; cursor: pointer;">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- KANAN: PANEL ABSEN & GAJI -->
        <div class="right-panel">

            <!-- PANEL ABSENSI -->
            <div class="card">
                <h3 style="margin-top: 0;">Absensi Hari ini</h3>
                <p style="font-size: 0.85em; color: gray;">
                    {{ \Carbon\Carbon::parse($hariIni)->translatedFormat('l, d F Y') }}</p>

                <form action="/karyawan/absensi" method="POST">
                    @csrf
                    @foreach ($dataKaryawan as $k)
                        <div class="absen-row">
                            <span style="font-weight: bold;">{{ $k->nama_karyawan }}</span>
                            <select name="absensi[{{ $k->id_karyawan }}]">
                                <option value="Hadir" {{ $k->status_hari_ini == 'Hadir' ? 'selected' : '' }}>Hadir
                                </option>
                                <option value="Izin" {{ $k->status_hari_ini == 'Izin' ? 'selected' : '' }}>Cuti /
                                    Izin</option>
                                <option value="Sakit" {{ $k->status_hari_ini == 'Sakit' ? 'selected' : '' }}>Sakit
                                </option>
                                <option value="Alpa"
                                    {{ $k->status_hari_ini == 'Alpa' || $k->status_hari_ini == 'Belum Absen' ? 'selected' : '' }}>
                                    Tanpa Keterangan</option>
                            </select>
                        </div>
                    @endforeach
                    <button type="submit" class="btn-save">Simpan Absensi</button>
                </form>
            </div>

            <!-- PANEL RINGKASAN GAJI -->
            <div class="card">
                <h3 style="margin-top: 0;">Ringkasan Gaji Terbaru</h3>
                <p style="font-size: 0.85em; color: gray;">(Belum Dibayarkan)</p>

                <table style="margin-top: 0;">
                    <thead>
                        <tr>
                            <th style="font-size: 0.8em;">Nama</th>
                            <th style="font-size: 0.8em;">Pengerjaan</th>
                            <th style="font-size: 0.8em;">Est. Gaji</th>
                            <th style="font-size: 0.8em;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKaryawan as $k)
                            <tr>
                                <td style="font-size: 0.9em; font-weight: bold;">{{ $k->nama_karyawan }}</td>
                                <td style="font-size: 0.9em;">{{ $k->total_pcs }}</td>
                                <td style="font-size: 0.9em; color: #153752; font-weight: bold;">
                                    Rp {{ number_format($k->estimasi_gaji, 0, ',', '.') }}
                                </td>
                                <td>
                                    <a href="/karyawan/{{ $k->id_karyawan }}/detail" class="btn-detail">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
