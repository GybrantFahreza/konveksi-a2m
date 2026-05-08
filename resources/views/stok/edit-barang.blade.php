<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Barang Jadi - Manajemen Stok</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f9fafb;
        }

        .panel {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .btn-update {
            background-color: #f39c12;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div style="margin-bottom: 20px;">
        <a href="/stok" style="text-decoration: none; color: #153752; font-weight: bold;">⬅ Batal</a>
    </div>

    <div class="panel">
        <h2 style="margin-top: 0;">Edit Barang Jadi</h2>
        <form action="/stok/barang-jadi/{{ $barangJadi->id_barang }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Pakaian</label>
                <input type="text" name="nama_barang" value="{{ $barangJadi->nama_barang }}" required>
            </div>

            <div class="form-group">
                <label>Ukuran</label>
                <input type="text" name="ukuran" value="{{ $barangJadi->ukuran }}" required>
            </div>

            <div class="form-group">
                <label>Jumlah Stok</label>
                <input type="number" name="stok_sekarang" value="{{ $barangJadi->stok_sekarang }}" required>
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" value="{{ $barangJadi->satuan ?? 'Pcs' }}" required>
            </div>

            <button type="submit" class="btn-update">Simpan Perubahan</button>
        </form>
    </div>
</body>

</html>
