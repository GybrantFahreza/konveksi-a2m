<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Karyawan</title>
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

        input,
        select {
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

        .nav {
            margin-bottom: 20px;
        }

        .nav a {
            text-decoration: none;
            color: blue;
        }
    </style>
</head>

<body>

    <div class="nav">
        <a href="/karyawan">⬅ Kembali ke Daftar Karyawan</a>
    </div>

    <h1>Tambah Karyawan Baru</h1>

    <!-- FORM DIMULAI DI SINI -->
    <form action="/karyawan" method="POST">
        <!-- @csrf WAJIB ADA DI LARAVEL! Ini untuk keamanan agar form tidak dibajak (Cross-Site Request Forgery) -->
        @csrf

        <div class="form-group">
            <label>Nama Lengkap Karyawan</label>
            <input type="text" name="nama_karyawan" required placeholder="Masukkan nama...">
        </div>

        <div class="form-group">
            <label>No. HP / WhatsApp</label>
            <input type="text" name="no_hp" placeholder="Contoh: 0812...">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
        </div>

        <button type="submit">Simpan Data Karyawan</button>
    </form>

</body>

</html>
