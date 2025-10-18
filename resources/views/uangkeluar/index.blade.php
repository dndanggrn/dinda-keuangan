@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">💸 Data Uang Keluar</h3>

    <a href="{{ route('uangkeluar.create') }}" class="btn btn-success mb-3">
        ➕ Tambah Data
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Jumlah (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('uangkeluar.edit', $item->id) }}" class="btn btn-primary btn-sm">✏️</a>
                    <form action="{{ route('uangkeluar.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
