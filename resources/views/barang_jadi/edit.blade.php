<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Barang Jadi</title>
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
        <h1 style="margin-top: 0; font-size: 1.5em;">Edit Barang Jadi: <br><span
                style="color: #153752;">{{ $barang->nama_barang }}</span></h1>

        <form action="/barang-jadi/{{ $barang->id_barang }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Pakaian / Barang Jadi</label>
                <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" required>
            </div>

            <div class="form-group">
                <label>Ukuran</label>
                <select name="ukuran" required>
                    <option value="S" {{ $barang->ukuran == 'S' ? 'selected' : '' }}>S</option>
                    <option value="M" {{ $barang->ukuran == 'M' ? 'selected' : '' }}>M</option>
                    <option value="L" {{ $barang->ukuran == 'L' ? 'selected' : '' }}>L</option>
                    <option value="XL" {{ $barang->ukuran == 'XL' ? 'selected' : '' }}>XL</option>
                    <option value="XXL" {{ $barang->ukuran == 'XXL' ? 'selected' : '' }}>XXL</option>
                    <option value="All Size" {{ $barang->ukuran == 'All Size' ? 'selected' : '' }}>All Size</option>
                </select>
            </div>

            <div class="form-group">
                <label>Update Jumlah Stok</label>
                <input type="number" name="stok_sekarang" value="{{ $barang->stok_sekarang }}" required>
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" value="{{ $barang->satuan }}" required>
            </div>

            <button type="submit">Update Barang Jadi</button>
        </form>
    </div>

</body>

</html>
