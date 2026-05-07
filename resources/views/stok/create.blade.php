<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Stok</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            max-width: 500px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 15px;
            background-color: #153752;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <a href="/stok" style="text-decoration: none; color: blue;">⬅ Batal</a>
    <h1>Tambah Bahan Baku Baru</h1>

    <form action="/stok" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Bahan / Atribut</label>
            <input type="text" name="nama_bahan" placeholder="Contoh: Kain Fleece Hitam" required>
        </div>
        <div class="form-group">
            <label>Jumlah Stok Awal</label>
            <input type="number" step="0.01" name="stok_sekarang" required>
        </div>
        <div class="form-group">
            <label>Satuan</label>
            <input type="text" name="satuan" placeholder="Contoh: Roll, Pcs, Bobbin" required>
        </div>
        <div class="form-group">
            <label>Batas Kritis (Alert Warning)</label>
            <input type="number" step="0.01" name="batas_kritis"
                placeholder="Batas minimal sebelum status jadi merah" required>
        </div>
        <button type="submit">Simpan Item</button>
    </form>
</body>

</html>
