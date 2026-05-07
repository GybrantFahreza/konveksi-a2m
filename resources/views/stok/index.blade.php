<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Stok</title>
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

        /* Top Cards Style */
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

        /* Table & Panel Style */
        .panel {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
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
            font-size: 0.9em;
        }

        /* Buttons & Badges */
        .btn-add {
            padding: 8px 15px;
            background-color: #86efac;
            color: #166534;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.85em;
            font-weight: bold;
            color: #111;
        }

        .btn-action {
            padding: 4px 8px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 0.8em;
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

    <div class="card-container">
        <div class="top-card">
            <div class="icon-box" style="background-color: #93c5fd;"></div>
            <div class="text-box">
                <h4>Total Jenis Bahan</h4>
                <h2>{{ $totalJenisBahan }} types</h2>
            </div>
        </div>
        <div class="top-card">
            <div class="icon-box" style="background-color: #86efac;"></div>
            <div class="text-box">
                <h4>Total Pesanan Siap</h4>
                <h2>{{ $totalPesananSiap }} Pcs</h2>
            </div>
        </div>
        <div class="top-card">
            <div class="icon-box" style="background-color: #fca5a5;"></div>
            <div class="text-box">
                <h4>Stok Kritis</h4>
                <h2>{{ $stokKritis }} Items</h2>
            </div>
        </div>
    </div>

    <div class="panel">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 style="margin: 0;">Daftar Bahan Baku</h2>
            <a href="/stok/create" class="btn-add">+ Tambah Bahan Baru</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bahan</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stokBahan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $item->nama_bahan }}</strong></td>
                        <td>{{ $item->stok_sekarang }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>
                            @if ($item->stok_sekarang <= $item->batas_kritis)
                                <span class="badge" style="background-color: #fca5a5; color: #991b1b;">Kritis</span>
                            @elseif($item->stok_sekarang <= $item->batas_kritis + 10)
                                <span class="badge" style="background-color: #fef08a; color: #854d0e;">Menipis</span>
                            @else
                                <span class="badge" style="background-color: #bbf7d0; color: #166534;">Aman</span>
                            @endif
                        </td>
                        <td style="display: flex; gap: 5px;">
                            <a href="/stok/{{ $item->id_bahan }}/edit" class="btn-action"
                                style="background: #f39c12;">Edit</a>
                            <form action="/stok/{{ $item->id_bahan }}" method="POST"
                                onsubmit="return confirm('Hapus item ini?');" style="margin:0;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-action" style="background: #e74c3c;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="panel">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 style="margin: 0;">Daftar Barang Jadi</h2>
            <a href="/barang-jadi/create" class="btn-add">+ Tambah Barang Jadi</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pakaian</th>
                    <th>Ukuran</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangJadi as $index => $bj)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $bj->nama_barang }}</strong></td>
                        <td style="font-weight: bold; color: #153752;">{{ $bj->ukuran }}</td>
                        <td>{{ $bj->stok_sekarang }}</td>
                        <td>{{ $bj->satuan }}</td>
                        <td>
                            @if ($bj->stok_sekarang <= 10)
                                <span class="badge" style="background-color: #fca5a5; color: #991b1b;">Kritis</span>
                            @elseif($bj->stok_sekarang <= 30)
                                <span class="badge" style="background-color: #fef08a; color: #854d0e;">Menipis</span>
                            @else
                                <span class="badge" style="background-color: #bbf7d0; color: #166534;">Aman</span>
                            @endif
                        </td>
                        <td style="display: flex; gap: 5px;">
                            <a href="/barang-jadi/{{ $bj->id_barang }}/edit" class="btn-action"
                                style="background: #f39c12;">Edit</a>
                            <form action="/barang-jadi/{{ $bj->id_barang }}" method="POST"
                                onsubmit="return confirm('Hapus barang jadi ini?');" style="margin:0;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-action" style="background: #e74c3c;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
