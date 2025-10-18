@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">✏️ Edit Data Uang Keluar</h3>

    <form action="{{ route('uangkeluar.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $item->kategori }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="2" required>{{ $item->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah (Rp)</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $item->jumlah }}" required>
        </div>

        <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
        <a href="{{ route('uangkeluar.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
    </form>
</div>
@endsection
