<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Laporan Keuangan</title>
  <style>
    body { font-family: sans-serif; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    h3, h4 { text-align: center; }
  </style>
</head>
<body>
  <h3>LAPORAN KEUANGAN ORGANISASI</h3>
  <h4>Periode: {{ date('d F Y') }}</h4>

  <h4>Data Uang Masuk</h4>
  <table>
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

  <h4>Data Uang Keluar</h4>
  <table>
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

  <h4>Rekapitulasi</h4>
  <table>
    <tr>
      <th>Total Uang Masuk</th>
      <td>Rp {{ number_format($totalMasuk, 0, ',', '.') }}</td>
    </tr>
    <tr>
      <th>Total Uang Keluar</th>
      <td>Rp {{ number_format($totalKeluar, 0, ',', '.') }}</td>
    </tr>
    <tr>
      <th>Saldo Akhir</th>
      <td>Rp {{ number_format($saldo, 0, ',', '.') }}</td>
    </tr>
  </table>
</body>
</html>
