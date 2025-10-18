<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMasuk = DB::table('uang_masuk')->sum('jumlah');
        $totalKeluar = DB::table('uang_keluar')->sum('jumlah');
        $saldoAkhir = $totalMasuk - $totalKeluar;

        // Nama bulan
        $bulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Ambil total per bulan dari tabel uang_masuk
        $masukPerBulan = DB::table('uang_masuk')
            ->selectRaw('MONTH(tanggal) as bulan, SUM(jumlah) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        // Ambil total per bulan dari tabel uang_keluar
        $keluarPerBulan = DB::table('uang_keluar')
            ->selectRaw('MONTH(tanggal) as bulan, SUM(jumlah) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        // Inisialisasi data 12 bulan (Jan–Des)
        $dataMasuk = [];
        $dataKeluar = [];
        $totalKas = [];

        for ($i = 1; $i <= 12; $i++) {
            $masuk = isset($masukPerBulan[$i]) ? (float)$masukPerBulan[$i] : 0;
            $keluar = isset($keluarPerBulan[$i]) ? (float)$keluarPerBulan[$i] : 0;
            $dataMasuk[] = $masuk;
            $dataKeluar[] = $keluar;
            $totalKas[] = $masuk - $keluar; // Arus kas bersih tiap bulan
        }

        return view('dashboard', compact(
            'totalMasuk',
            'totalKeluar',
            'saldoAkhir',
            'bulan',
            'dataMasuk',
            'dataKeluar',
            'totalKas'
        ));
    }
}
