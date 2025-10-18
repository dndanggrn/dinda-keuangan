@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">➕ Tambah Data Uang Masuk</h3>

    <form action="{{ route('uangmasuk.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="2" required></textarea>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah (Rp)</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">💾 Simpan</button>
        <a href="{{ route('uangmasuk.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
    </form>
</div>
@endsection
