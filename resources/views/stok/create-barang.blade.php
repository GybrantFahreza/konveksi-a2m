<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Barang Jadi - Manajemen Stok</title>
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
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
            /* Supaya posisinya di tengah */
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #374151;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .btn-submit {
            background-color: #10b981;
            color: white;
            padding: 12px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #059669;
        }
    </style>
</head>

<body>

    <div class="nav">
        <a href="/stok">⬅ Batal & Kembali ke Daftar Stok</a>
    </div>

    <div class="panel">
        <h2 style="margin-top: 0; margin-bottom: 20px; color: #111;">Tambah Barang Jadi</h2>

        <form action="/stok/barang-jadi" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Pakaian / Barang</label>
                <input type="text" name="nama_barang" placeholder="Contoh: Seragam Batik SDN 12" required autofocus>
            </div>

            <div class="form-group">
                <label>Ukuran</label>
                <input type="text" name="ukuran" placeholder="Contoh: S, M, L, XL" required>
            </div>

            <div class="form-group">
                <label>Jumlah Stok Awal</label>
                <input type="number" name="stok_sekarang" value="0" min="0" required>
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" value="Pcs" placeholder="Contoh: Pcs, Lusin, Kodi" required>
            </div>

            <button type="submit" class="btn-submit">Simpan Barang Jadi</button>

        </form>
    </div>

</body>

</html>
