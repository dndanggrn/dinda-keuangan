<?php

namespace App\Http\Controllers;

use App\Models\UangMasuk;
use App\Models\UangKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RekapitulasiController extends Controller
{
    public function index()
    {
        $uangMasuk = UangMasuk::all();
        $uangKeluar = UangKeluar::all();

        $totalMasuk = $uangMasuk->sum('jumlah');
        $totalKeluar = $uangKeluar->sum('jumlah');
        $saldo = $totalMasuk - $totalKeluar;

        return view('rekapitulasi.index', compact('uangMasuk', 'uangKeluar', 'totalMasuk', 'totalKeluar', 'saldo'));
    }

    public function cetakPdf()
    {
        $uangMasuk = UangMasuk::all();
        $uangKeluar = UangKeluar::all();

        $totalMasuk = $uangMasuk->sum('jumlah');
        $totalKeluar = $uangKeluar->sum('jumlah');
        $saldo = $totalMasuk - $totalKeluar;

        $pdf = Pdf::loadView('rekapitulasi.laporan', compact('uangMasuk', 'uangKeluar', 'totalMasuk', 'totalKeluar', 'saldo'));
        return $pdf->download('laporan-keuangan.pdf');
    }
}