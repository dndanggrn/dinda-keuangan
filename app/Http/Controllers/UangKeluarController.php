<?php

namespace App\Http\Controllers;

use App\Models\UangKeluar;
use Illuminate\Http\Request;

class UangKeluarController extends Controller
{
    public function index()
    {
        $data = UangKeluar::orderBy('tanggal', 'desc')->get();
        return view('uangkeluar.index', compact('data'));
    }

    public function create()
    {
        return view('uangkeluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|numeric',
        ]);

        // Simpan data
        UangKeluar::create([
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('uangkeluar.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = UangKeluar::findOrFail($id);
        return view('uangkeluar.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|numeric',
        ]);

        $data = UangKeluar::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('uangkeluar.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = UangKeluar::findOrFail($id);
        $item->delete();

        return redirect()->route('uangkeluar.index')->with('success', 'Data berhasil dihapus!');
    }
}
