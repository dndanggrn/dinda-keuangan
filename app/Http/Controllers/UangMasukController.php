<?php

namespace App\Http\Controllers;

use App\Models\UangMasuk;
use Illuminate\Http\Request;

class UangMasukController extends Controller
{
    public function index()
    {
        $data = UangMasuk::orderBy('tanggal', 'desc')->get();
        return view('uangmasuk.index', compact('data'));
    }

    public function create()
    {
        return view('uangmasuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|numeric',
        ]);

        UangMasuk::create($request->all());
        return redirect()->route('uangmasuk.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = UangMasuk::findOrFail($id);
        return view('uangmasuk.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|numeric',
        ]);

        $data = UangMasuk::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('uangmasuk.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = UangMasuk::findOrFail($id);
        $data->delete();

        return redirect()->route('uangmasuk.index')->with('success', 'Data berhasil dihapus!');
    }
}
