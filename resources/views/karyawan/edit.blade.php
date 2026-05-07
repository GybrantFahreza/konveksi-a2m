<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Karyawan</title>
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
            background-color: #f39c12;
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

    <h1>Edit Data: {{ $karyawan->nama_karyawan }}</h1>

    <form action="/karyawan/{{ $karyawan->id_karyawan }}" method="POST">
        @csrf
        <!-- MANTRA KHUSUS LARAVEL UNTUK UPDATE DATA -->
        @method('PUT')

        <div class="form-group">
            <label>Nama Lengkap Karyawan</label>
            <input type="text" name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}" required>
        </div>

        <div class="form-group">
            <label>No. HP / WhatsApp</label>
            <input type="text" name="no_hp" value="{{ $karyawan->no_hp }}">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="Pria" {{ $karyawan->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                <option value="Wanita" {{ $karyawan->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>Wanita</option>
            </select>
        </div>

        <div class="form-group">
            <label>Status Karyawan</label>
            <select name="status_karyawan" required>
                <option value="Aktif" {{ $karyawan->status_karyawan == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Cuti" {{ $karyawan->status_karyawan == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                <option value="Keluar" {{ $karyawan->status_karyawan == 'Keluar' ? 'selected' : '' }}>Keluar</option>
            </select>
        </div>

        <button type="submit">Update Data</button>
    </form>

</body>

</html>
