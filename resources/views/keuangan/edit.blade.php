<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi Kas</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            max-width: 500px;
            background-color: #f9fafb;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
        select,
        textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            padding: 12px 15px;
            background-color: #f39c12;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            font-weight: bold;
            width: 100%;
            margin-top: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <a href="/keuangan"
        style="text-decoration: none; color: #153752; font-weight: bold; display: block; margin-bottom: 20px;">⬅ Batal &
        Kembali</a>

    <div class="card">
        <h2 style="margin-top: 0; color: #111;">Edit Transaksi</h2>

        <form action="/keuangan/{{ $kas->id_kas }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" value="{{ $kas->tanggal_transaksi }}" required>
            </div>

            <div class="form-group">
                <label>Tipe Transaksi</label>
                <select name="tipe_arus" required>
                    <option value="Masuk" {{ $kas->tipe_arus == 'Masuk' ? 'selected' : '' }}>Pemasukan (Masuk)</option>
                    <option value="Keluar" {{ $kas->tipe_arus == 'Keluar' ? 'selected' : '' }}>Pengeluaran (Keluar)
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" value="{{ $kas->kategori }}" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div class="form-group">
                    <label>Banyak</label>
                    <input type="number" name="banyak" value="{{ $kas->banyak }}" min="1" required>
                </div>
                <div class="form-group">
                    <label>Harga Satuan (Rp)</label>
                    <input type="number" name="harga" value="{{ $kas->harga }}" required>
                </div>
            </div>

            <div class="form-group">
                <label>Status Pembayaran</label>
                <select name="status_transaksi" required>
                    <option value="Lunas" {{ $kas->status_transaksi == 'Lunas' ? 'selected' : '' }}>Lunas (Selesai)
                    </option>
                    <option value="Belum Lunas" {{ $kas->status_transaksi == 'Belum Lunas' ? 'selected' : '' }}>Belum
                        Lunas (Tempo)</option>
                </select>
            </div>

            <div class="form-group">
                <label>Keterangan / Deskripsi</label>
                <textarea name="deskripsi" rows="3">{{ $kas->deskripsi }}</textarea>
            </div>

            <button type="submit">Update Transaksi</button>
        </form>
    </div>

</body>

</html>
