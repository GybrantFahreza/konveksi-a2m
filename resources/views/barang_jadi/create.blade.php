<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Barang Jadi</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            max-width: 500px;
            background-color: #f9fafb;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #374151;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 15px;
            background-color: #153752;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            font-weight: bold;
            width: 100%;
            margin-top: 10px;
        }

        .nav {
            margin-bottom: 20px;
        }

        .nav a {
            text-decoration: none;
            color: #153752;
            font-weight: bold;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="nav">
        <a href="/stok">⬅ Batal & Kembali</a>
    </div>

    <div class="card">
        <h1 style="margin-top: 0; font-size: 1.5em; color: #153752;">Tambah Barang Jadi</h1>

        <form action="/barang-jadi" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Pakaian / Barang Jadi</label>
                <input type="text" name="nama_barang" placeholder="Contoh: Seragam Batik SDN 12" required>
            </div>

            <div class="form-group">
                <label>Ukuran</label>
                <select name="ukuran" required>
                    <option value="">-- Pilih Ukuran --</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="All Size">All Size</option>
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah Stok Awal</label>
                <input type="number" name="stok_sekarang" placeholder="Masukkan jumlah Pcs" required>
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" value="Pcs" required>
            </div>

            <button type="submit">Simpan Barang Jadi</button>
        </form>
    </div>

</body>

</html>
