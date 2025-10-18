@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <h4>Rekapitulasi Keuangan</h4>

  <div class="card mb-3">
    <div class="card-body">
      <p><strong>Total Uang Masuk:</strong> Rp {{ number_format($totalMasuk, 0, ',', '.') }}</p>
      <p><strong>Total Uang Keluar:</strong> Rp {{ number_format($totalKeluar, 0, ',', '.') }}</p>
      <p><strong>Saldo Akhir:</strong> Rp {{ number_format($saldo, 0, ',', '.') }}</p>
      <a href="{{ route('rekapitulasi.cetak') }}" class="btn btn-danger mt-2">📄 Cetak PDF</a>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <h5>Data Uang Masuk</h5>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Jumlah</th>
          </tr>
        </thead>
        <tbody>
          @foreach($uangMasuk as $item)
          <tr>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="col-md-6">
      <h5>Data Uang Keluar</h5>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Jumlah</th>
          </tr>
        </thead>
        <tbody>
          @foreach($uangKeluar as $item)
          <tr>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
