@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Card Uang Masuk -->
        <div class="col-md-4 mb-3">
            <div class="card text-bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fa-solid fa-circle-arrow-down me-2"></i> Uang Masuk
                    </h5>
                    <h3 class="mt-2">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Uang Keluar -->
        <div class="col-md-4 mb-3">
            <div class="card text-bg-danger shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fa-solid fa-circle-arrow-up me-2"></i> Uang Keluar
                    </h5>
                    <h3 class="mt-2">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Saldo Akhir -->
        <div class="col-md-4 mb-3">
            <div class="card text-bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fa-solid fa-wallet me-2"></i> Saldo Akhir
                    </h5>
                    <h3 class="mt-2">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Arus Kas Bulanan -->
    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="card-title mb-0">
                <i class="fa-solid fa-chart-line me-2"></i> Grafik Arus Kas Bulanan
            </h5>
        </div>
        <div class="card-body">
            <canvas id="kasChart" height="100"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('kasChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($bulan),
            datasets: [
                {
                    label: 'Uang Masuk',
                    data: @json($dataMasuk),
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                },
                {
                    label: 'Uang Keluar',
                    data: @json($dataKeluar),
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                },
                {
                    label: 'Saldo Akhir',
                    data: @json($totalKas),
                    type: 'line',
                    fill: false,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    tension: 0.3,
                    borderWidth: 2,
                    yAxisID: 'y',
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
</script>
@endsection
