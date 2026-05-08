<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Buat Pesanan Baru</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            max-width: 600px;
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

        .box {
            border: 1px solid #ccc;
            padding: 20px;
            background: white;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>
    <div style="margin-bottom: 20px;">
        <a href="/pesanan" style="text-decoration: none; color: #153752; font-weight: bold;">⬅ Batal</a>
    </div>

    <h1 style="color: #111;">Detail Pesanan Baru</h1>

    @if (session('error'))
        <div
            style="background-color: #fee2e2; color: #991b1b; padding: 15px; margin-bottom: 15px; border-left: 5px solid #ef4444; border-radius: 4px;">
            <strong>Error Database:</strong><br>
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div
            style="background-color: #fee2e2; color: #991b1b; padding: 15px; margin-bottom: 15px; border-left: 5px solid #ef4444; border-radius: 4px;">
            <strong>Periksa kembali form Anda:</strong>
            <ul style="margin-top: 5px; margin-bottom: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/pesanan" method="POST">
        @csrf

        <div class="box">
            <h3 style="margin-top: 0; color: #153752;">Informasi Klien & Proyek</h3>
            <div class="form-group">
                <label>Nama Proyek (Contoh: Kemeja PDH BEM)</label>
                <input type="text" name="nama_pesanan" value="{{ old('nama_pesanan') }}" required>
            </div>
            <div class="form-group">
                <label>Nama Klien / Instansi</label>
                <input type="text" name="nama_klien" value="{{ old('nama_klien') }}" required>
            </div>
            <div class="form-group">
                <label>No. HP Klien</label>
                <input type="text" name="no_hp_klien" value="{{ old('no_hp_klien') }}">
            </div>
            <div class="form-group">
                <label>Tanggal Deadline Kesepakatan</label>
                <input type="date" name="tanggal_deadline" value="{{ old('tanggal_deadline') }}" required>
            </div>
        </div>
        <div class="panel">
            <h3>Rincian Target per Ukuran</h3>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
                <div class="form-group">
                    <label>Size S</label>
                    <input type="number" name="target_s" value="0" min="0">
                </div>
                <div class="form-group">
                    <label>Size M</label>
                    <input type="number" name="target_m" value="0" min="0">
                </div>
                <div class="form-group">
                    <label>Size L</label>
                    <input type="number" name="target_l" value="0" min="0">
                </div>
                <div class="form-group">
                    <label>Size XL</label>
                    <input type="number" name="target_xl" value="0" min="0">
                </div>
                <div class="form-group">
                    <label>Size XXL</label>
                    <input type="number" name="target_xxl" value="0" min="0">
                </div>
                <div class="form-group">
                    <label>Size 3XL</label>
                    <input type="number" name="target_3xl" value="0" min="0">
                </div>
            </div>
        </div>
        <div class="box" style="border-left: 4px solid #153752;">
            <h3 style="margin-top: 0; color: #153752;">Pengaturan Harga Borongan</h3>
            <p style="font-size: 0.9em; color: gray; margin-bottom: 15px;">Kosongkan jika peran ini tidak ada dalam
                pesanan.</p>

            <div class="form-group">
                <label>Tarif Pola & Potong (Rp/Pcs)</label>
                <input type="number" name="tarif_potong" value="{{ old('tarif_potong') }}" placeholder="Contoh: 15000">
            </div>
            <div class="form-group">
                <label>Tarif Menjahit (Rp/Pcs)</label>
                <input type="number" name="tarif_jahit" value="{{ old('tarif_jahit') }}" placeholder="Contoh: 20000">
            </div>
            <div class="form-group">
                <label>Tarif Packaging (Rp/Pcs)</label>
                <input type="number" name="tarif_packaging" value="{{ old('tarif_packaging') }}"
                    placeholder="Contoh: 2000">
            </div>
        </div>

        <button type="submit"
            style="padding: 12px 20px; background: #153752; color: white; border: none; font-size: 16px; font-weight: bold; width: 100%; cursor: pointer; border-radius: 6px;">Simpan
            Proyek & Tarif</button>
    </form>
</body>

</html>
