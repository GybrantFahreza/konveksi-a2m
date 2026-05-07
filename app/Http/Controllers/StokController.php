<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanBaku;

class StokController extends Controller
{
    // 1. Tampilkan Daftar Stok
    public function index()
    {
        // 1. Tarik kedua data dari database
        $stokBahan = \App\Models\BahanBaku::orderBy('nama_bahan', 'asc')->get();
        $barangJadi = \App\Models\BarangJadi::orderBy('nama_barang', 'asc')->get();

        // 2. Hitung angka untuk Top Cards (Sesuai desain Figma)
        $totalJenisBahan = $stokBahan->count();
        $totalPesananSiap = $barangJadi->sum('stok_sekarang'); // Total seluruh pcs barang jadi

        $stokKritis = 0;
        foreach ($stokBahan as $bahan) {
            if ($bahan->stok_sekarang <= $bahan->batas_kritis) {
                $stokKritis++;
            }
        }

        // 3. Lempar semua data ke View
        return view('stok.index', compact('stokBahan', 'barangJadi', 'totalJenisBahan', 'totalPesananSiap', 'stokKritis'));
    }

    // 2. Form Tambah Stok Baru
    public function create()
    {
        return view('stok.create');
    }

    // 3. Simpan Stok Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:100',
            'stok_sekarang' => 'required|numeric',
            'satuan' => 'required|string|max:20',
            'batas_kritis' => 'required|numeric'
        ]);

        BahanBaku::create($request->all());

        return redirect('/stok')->with('success', 'Bahan baku baru berhasil ditambahkan ke gudang!');
    }

    // 4. Form Edit Stok
    public function edit($id)
    {
        $stok = BahanBaku::findOrFail($id);
        return view('stok.edit', compact('stok'));
    }

    // 5. Update Data Stok
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:100',
            'stok_sekarang' => 'required|numeric',
            'satuan' => 'required|string|max:20',
            'batas_kritis' => 'required|numeric'
        ]);

        $stok = BahanBaku::findOrFail($id);
        $stok->update($request->all());

        return redirect('/stok')->with('success', 'Data stok ' . $request->nama_bahan . ' berhasil diupdate!');
    }

    // 6. Hapus Data Stok
    public function destroy($id)
    {
        $stok = BahanBaku::findOrFail($id);
        $stok->delete();

        return redirect('/stok')->with('success', 'Data bahan baku berhasil dihapus dari sistem.');
    }
}
