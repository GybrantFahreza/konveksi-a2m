<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangJadi;

class BarangJadiController extends Controller
{
    public function create()
    {
        return view('barang_jadi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'ukuran' => 'required|string|max:10',
            'stok_sekarang' => 'required|integer',
            'satuan' => 'required|string|max:20',
        ]);

        BarangJadi::create($request->all());
        return redirect('/stok')->with('success', 'Barang Jadi baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = BarangJadi::findOrFail($id);
        return view('barang_jadi.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'ukuran' => 'required|string|max:10',
            'stok_sekarang' => 'required|integer',
            'satuan' => 'required|string|max:20',
        ]);

        $barang = BarangJadi::findOrFail($id);
        $barang->update($request->all());

        return redirect('/stok')->with('success', 'Data Barang Jadi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = BarangJadi::findOrFail($id);
        $barang->delete();

        return redirect('/stok')->with('success', 'Data Barang Jadi berhasil dihapus!');
    }
}
