<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Absensi;
use Carbon\Carbon;

class KaryawanController extends Controller
{
    // 1. Tampilkan Halaman Karyawan (Tabel Induk, Absen Panel, Gaji Panel)
    public function index()
    {
        $hariIni = Carbon::now()->toDateString();
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        // Ambil semua karyawan aktif beserta relasi absensi (bulan ini) dan log progres (belum dibayar)
        $karyawan = Karyawan::where('status_karyawan', '!=', 'Keluar')
            ->with(['absensi' => function ($q) use ($bulanIni, $tahunIni) {
                $q->whereMonth('tanggal', $bulanIni)->whereYear('tanggal', $tahunIni);
            }, 'logProgres' => function ($q) {
                $q->where('status_penggajian', 'Belum Dibayar')->with('tarifPeran');
            }])->get();

        // Format datanya agar gampang dilooping di HTML/Tailwind kamu
        $dataKaryawan = $karyawan->map(function ($k) use ($hariIni) {
            // A. Cek Status Absen Hari Ini (Untuk Dropdown di Panel Kanan)
            $absenHariIni = $k->absensi->where('tanggal', $hariIni)->first();
            $statusHariIni = $absenHariIni ? $absenHariIni->status_hadir : 'Belum Absen';

            // B. Hitung Persentase Kehadiran Bulan Ini
            $totalAbsenTercatat = $k->absensi->count();
            $totalHadir = $k->absensi->where('status_hadir', 'Hadir')->count();
            // Cegah error dibagi 0
            $persentaseHadir = $totalAbsenTercatat > 0 ? round(($totalHadir / $totalAbsenTercatat) * 100) : 0;

            // C. Hitung Ringkasan Gaji Terbaru (Belum Dibayar)
            $totalPcs = 0;
            $estimasiGaji = 0;
            foreach ($k->logProgres as $log) {
                $totalPcs += $log->jumlah_selesai_hari_ini;
                $estimasiGaji += ($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs);
            }

            return (object)[
                'id_karyawan' => $k->id_karyawan,
                'nama_karyawan' => $k->nama_karyawan,
                'no_hp' => $k->no_hp,
                'status_hari_ini' => $statusHariIni,
                'persentase_hadir' => $persentaseHadir,
                'total_pcs' => $totalPcs,
                'estimasi_gaji' => $estimasiGaji
            ];
        });

        return view('karyawan.index', compact('dataKaryawan', 'hariIni'));
    }

    // 2. Fungsi untuk menampilkan halaman Form Tambah
    public function create()
    {
        return view('karyawan.create');
    }

    // 3. Fungsi untuk memproses data yang dikirim dari Form Tambah
    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:100',
            'no_hp' => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
        ]);

        Karyawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_karyawan' => 'Aktif'
        ]);

        return redirect('/karyawan')->with('success', 'Karyawan baru berhasil ditambahkan!');
    }

    // 4. Fungsi menampilkan form Edit
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    // 5. Fungsi memproses data Edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:100',
            'no_hp' => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'status_karyawan' => 'required|in:Aktif,Cuti,Keluar',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update([
            'nama_karyawan' => $request->nama_karyawan,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_karyawan' => $request->status_karyawan
        ]);

        return redirect('/karyawan')->with('success', 'Data Karyawan berhasil diperbarui!');
    }

    // 6. Fungsi menghapus data
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect('/karyawan')->with('success', 'Data Karyawan berhasil dihapus!');
    }

    // 7. Fungsi Simpan Absensi Massal (Tombol Save Hijau)
    public function simpanAbsensi(Request $request)
    {
        $hariIni = Carbon::now()->toDateString();
        $dataAbsen = $request->absensi;

        if ($dataAbsen) {
            foreach ($dataAbsen as $id_karyawan => $status) {
                Absensi::updateOrCreate(
                    ['id_karyawan' => $id_karyawan, 'tanggal' => $hariIni],
                    ['status_hadir' => $status]
                );
            }
        }

        return redirect('/karyawan')->with('success', 'Data absensi hari ini berhasil disimpan!');
    }

    // 8. Fungsi Menampilkan Halaman Detail Lengkap (Diklik dari Tombol Detail)
    public function detailLaporan($id)
    {
        $karyawan = Karyawan::with(['absensi' => function ($q) {
            $q->orderBy('tanggal', 'desc');
        }, 'logProgres.tarifPeran.pesanan'])->findOrFail($id);

        return view('karyawan.detail', compact('karyawan'));
    }
}
