<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Input Progres Harian</title>
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

        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style khusus untuk grid ukuran */
        .size-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            background: #f8fafc;
            padding: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
        }

        .size-item label {
            font-size: 0.9em;
            text-align: center;
            color: #1e293b;
        }

        .size-item input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            text-align: center;
        }

        button {
            padding: 12px 15px;
            background-color: #153752;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            font-weight: bold;
            width: 100%;
            margin-top: 15px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div style="margin-bottom: 20px;">
        <a href="/pesanan" style="text-decoration: none; color: #153752; font-weight: bold;">⬅ Batal & Kembali</a>
    </div>

    <div class="card">
        <h1 style="margin-top: 0; color: #111;">Input Progress Kerja</h1>

        @if (session('error'))
            <div
                style="background-color: #fee2e2; color: #991b1b; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                {{ session('error') }}
            </div>
        @endif

        <form action="/progres" method="POST">
            @csrf

            <div class="form-group">
                <label>Tanggal Pengerjaan</label>
                <input type="date" name="tanggal_input" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label>Nama Karyawan</label>
                <select name="id_karyawan" required>
                    <option value="">-- Pilih Karyawan --</option>
                    @foreach ($karyawan as $k)
                        <option value="{{ $k->id_karyawan }}">{{ $k->nama_karyawan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Posisi & Nama Pesanan</label>
                <select name="id_tarif_peran" required>
                    <option value="">-- Pilih Posisi Pekerjaan --</option>
                    @foreach ($tarifPeran as $tp)
                        <option value="{{ $tp->id_tarif_peran }}">
                            {{ $tp->pesanan->nama_pesanan }} - {{ $tp->peran }} (Rp
                            {{ number_format($tp->tarif_per_pcs, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Rincian Banyak Selesai (Pcs)</label>
                <div class="size-grid">
                    <div class="size-item">
                        <label>S</label>
                        <input type="number" name="ukuran_s" value="0" min="0">
                    </div>
                    <div class="size-item">
                        <label>M</label>
                        <input type="number" name="ukuran_m" value="0" min="0">
                    </div>
                    <div class="size-item">
                        <label>L</label>
                        <input type="number" name="ukuran_l" value="0" min="0">
                    </div>
                    <div class="size-item">
                        <label>XL</label>
                        <input type="number" name="ukuran_xl" value="0" min="0">
                    </div>
                    <div class="size-item">
                        <label>XXL</label>
                        <input type="number" name="ukuran_xxl" value="0" min="0">
                    </div>
                    <div class="size-item">
                        <label>3XL</label>
                        <input type="number" name="ukuran_3xl" value="0" min="0">
                    </div>
                </div>
            </div>

            <button type="submit">Save Progress</button>
        </form>
    </div>
</body>

</html>
