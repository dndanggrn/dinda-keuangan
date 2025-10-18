<aside class="main-sidebar bg-body shadow">
  <div class="p-3">
    <a href="{{ route('dashboard') }}" class="brand-link text-decoration-none d-flex align-items-center mb-3">
      <img src="{{ asset('dist/assets/img/logo-dinda.png') }}" alt="Logo" class="brand-image me-2" width="35">
      <span class="fw-bold">KeuanganApp</span>
    </a>

    <ul class="nav nav-pills flex-column">
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('uangmasuk.index') }}" class="nav-link">
          <i class="nav-icon fas fa-arrow-down me-2"></i> Uang Masuk
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('uangkeluar.index') }}" class="nav-link">
          <i class="nav-icon fas fa-arrow-up me-2"></i> Uang Keluar
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('rekapitulasi.index') }}" class="nav-link">
          <i class="nav-icon fas fa-file-alt me-2"></i> Rekapitulasi
        </a>
      </li>
    </ul>
  </div>
</aside>
