<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanBaku;
use App\Models\BarangJadi;

class StokController extends Controller
{
    // 1. Tampilkan Daftar Stok (Bahan & Barang Jadi)
    public function index()
    {
        $stokBahan = BahanBaku::orderBy('nama_bahan', 'asc')->get();
        $barangJadi = BarangJadi::orderBy('nama_barang', 'asc')->get();

        $totalJenisBahan = $stokBahan->count();
        $totalPesananSiap = $barangJadi->sum('stok_sekarang');

        $stokKritis = 0;
        foreach ($stokBahan as $bahan) {
            if ($bahan->stok_sekarang <= $bahan->batas_kritis) {
                $stokKritis++;
            }
        }

        return view('stok.index', [
            'stokBahan' => $stokBahan,
            'bahanBaku' => $stokBahan, // Alias untuk menghindari error di view
            'barangJadi' => $barangJadi,
            'totalJenisBahan' => $totalJenisBahan,
            'totalPesananSiap' => $totalPesananSiap,
            'stokKritis' => $stokKritis
        ]);
    }

    // 2. Form Tambah Stok Baru (KEMBALIKAN FUNGSI INI)
    public function create()
    {
        return view('stok.create');
    }

    // 3. Simpan Bahan Baku Baru
    public function storeBahan(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:100',
            'stok_sekarang' => 'required|numeric',
            'satuan' => 'required|string|max:20',
            'batas_kritis' => 'required|numeric'
        ]);

        BahanBaku::create($request->all());

        return redirect('/stok')->with('success', 'Bahan baku baru berhasil ditambahkan!');
    }

    // 4. Simpan Barang Jadi Baru
    // Simpan Barang Jadi Baru
    public function storeBarangJadi(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'ukuran' => 'required|string|max:10',
            'stok_sekarang' => 'required|integer|min:0',
            'satuan' => 'nullable|string|max:20', // Tambahkan ini
        ]);

        BarangJadi::create([
            'nama_barang' => $request->nama_barang,
            'ukuran' => $request->ukuran,
            'stok_sekarang' => $request->stok_sekarang,
            'satuan' => $request->satuan ?? 'Pcs', // Tambahkan ini (Otomatis jadi 'Pcs' kalau tidak diisi)
        ]);

        return redirect('/stok')->with('success', 'Produk barang jadi berhasil ditambah!');
    }

    // 5. Form Edit Stok (KEMBALIKAN FUNGSI INI)
    public function edit($id)
    {
        $stok = BahanBaku::findOrFail($id);
        return view('stok.edit', compact('stok'));
    }

    // 6. Update Data Stok Bahan
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

    // 7. Hapus Data Stok Bahan
    public function destroy($id)
    {
        $stok = BahanBaku::findOrFail($id);
        $stok->delete();

        return redirect('/stok')->with('success', 'Data bahan baku berhasil dihapus.');
    }

    // Menampilkan halaman form Tambah Barang Jadi
    public function createBarangJadi()
    {
        return view('stok.create-barang');
    }

    // Menampilkan halaman edit barang jadi
    public function editBarangJadi($id)
    {
        // Mencari data barang berdasarkan ID
        $barangJadi = \App\Models\BarangJadi::findOrFail($id);
        return view('stok.edit-barang', compact('barangJadi'));
    }

    // Memproses update data ke database
    public function updateBarangJadi(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'ukuran' => 'required|string|max:10',
            'stok_sekarang' => 'required|numeric',
            'satuan' => 'required|string|max:20',
        ]);

        $barang = \App\Models\BarangJadi::findOrFail($id);
        $barang->update($request->all());

        return redirect('/stok')->with('success', 'Data barang jadi berhasil diperbarui!');
    }

    // Menghapus data barang jadi
    public function destroyBarangJadi($id)
    {
        $barang = \App\Models\BarangJadi::findOrFail($id);
        $barang->delete();

        return redirect('/stok')->with('success', 'Data barang jadi berhasil dihapus dari gudang.');
    }
}
