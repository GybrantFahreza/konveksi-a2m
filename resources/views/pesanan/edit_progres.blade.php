<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Progres Pekerjaan</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f9fafb;
            max-width: 500px;
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

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .info-box {
            background: #e0f2fe;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #3b82f6;
        }

        .info-box p {
            margin: 5px 0;
            color: #1e3a8a;
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
            font-size: 16px;
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
    </style>
</head>

<body>

    <a href="/pesanan/{{ $pesanan->id_pesanan }}/detail"
        style="text-decoration: none; color: #153752; font-weight: bold; display: block; margin-bottom: 20px;">⬅ Batal &
        Kembali</a>

    <div class="card">
        <h2 style="margin-top: 0; color: #111;">Koreksi Progres Harian</h2>

        <div class="info-box">
            <p><strong>Pesanan:</strong> {{ $pesanan->nama_pesanan }}</p>
            <p><strong>Karyawan:</strong> {{ $log->karyawan->nama_karyawan }}</p>
            <p><strong>Posisi / Tugas:</strong> {{ $log->tarifPeran->peran }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($log->tanggal_input)->format('d M Y') }}</p>
        </div>

        <form action="/pesanan/{{ $pesanan->id_pesanan }}/progres/{{ $log->id_log }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Revisi Rincian Banyak Selesai (Pcs)</label>
                <div class="size-grid">
                    <div class="size-item"><label>S</label><input type="number" name="ukuran_s"
                            value="{{ $log->ukuran_s }}" min="0"></div>
                    <div class="size-item"><label>M</label><input type="number" name="ukuran_m"
                            value="{{ $log->ukuran_m }}" min="0"></div>
                    <div class="size-item"><label>L</label><input type="number" name="ukuran_l"
                            value="{{ $log->ukuran_l }}" min="0"></div>
                    <div class="size-item"><label>XL</label><input type="number" name="ukuran_xl"
                            value="{{ $log->ukuran_xl }}" min="0"></div>
                    <div class="size-item"><label>XXL</label><input type="number" name="ukuran_xxl"
                            value="{{ $log->ukuran_xxl }}" min="0"></div>
                    <div class="size-item"><label>3XL</label><input type="number" name="ukuran_3xl"
                            value="{{ $log->ukuran_3xl }}" min="0"></div>
                </div>
            </div>

            <button type="submit">Update Progres</button>
        </form>
    </div>

</body>

</html>
