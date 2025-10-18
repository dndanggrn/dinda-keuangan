@extends('layouts.app')

@section('title', 'Dashboard Keuangan')

@section('content')
<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-md-4">
      <div class="card bg-success text-white">
        <div class="card-body">
          <i class="fa-solid fa-arrow-down"></i> Total Uang Masuk
          <h4 class="fw-bold">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-danger text-white">
        <div class="card-body">
          <i class="fa-solid fa-arrow-up"></i> Total Uang Keluar
          <h4 class="fw-bold">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-primary text-white">
        <div class="card-body">
          <i class="fa-solid fa-wallet"></i> Saldo Akhir
          <h4 class="fw-bold">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</h4>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h5><i class="fa-solid fa-chart-column"></i> Grafik Arus Kas Bulanan</h5>
    </div>
    <div class="card-body">
      <canvas id="kasChart"></canvas>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('kasChart').getContext('2d');
  const kasChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! json_encode($bulan) !!},
      datasets: [
        {
          label: 'Uang Masuk',
          data: {!! json_encode($uangMasukPerBulan) !!},
          backgroundColor: '#28a745'
        },
        {
          label: 'Uang Keluar',
          data: {!! json_encode($uangKeluarPerBulan) !!},
          backgroundColor: '#dc3545'
        }
      ]
    }
  });
</script>
@endpush
