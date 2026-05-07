<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Stok Bahan Baku</title>
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

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 15px;
            background-color: #f39c12;
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
        <h1 style="margin-top: 0; font-size: 1.5em;">Edit Data Bahan: <br><span
                style="color: #153752;">{{ $stok->nama_bahan }}</span></h1>

        <form action="/stok/{{ $stok->id_bahan }}" method="POST">
            @csrf

            @method('PUT')

            <div class="form-group">
                <label>Nama Bahan / Atribut</label>
                <input type="text" name="nama_bahan" value="{{ $stok->nama_bahan }}" required>
            </div>

            <div class="form-group">
                <label>Jumlah Stok Awal</label>
                <input type="number" step="0.01" name="stok_sekarang" value="{{ $stok->stok_sekarang }}" required>
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" value="{{ $stok->satuan }}" required>
            </div>

            <div class="form-group">
                <label>Batas Kritis (Alert Warning)</label>
                <input type="number" step="0.01" name="batas_kritis" value="{{ $stok->batas_kritis }}" required>
            </div>

            <button type="submit">Update Data Stok</button>
        </form>
    </div>

</body>

</html>
