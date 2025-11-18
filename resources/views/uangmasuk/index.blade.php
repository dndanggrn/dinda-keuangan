@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">📥 Data Uang Masuk</h3>
        <a href="{{ route('uangmasuk.create') }}" class="btn btn-success mb-3">➕ Tambah Data</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                            <a href="{{ route('uangmasuk.edit', $item->id) }}" class="btn btn-sm btn-primary">✏️</a>

                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalHapus-{{ $item->id }}">
                                🗑️
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalHapus-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            Anda yakin ingin menghapus data <b>{{ $item->kategori }}</b> ini?
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Batal
                                            </button>

                                            <form action="{{ route('uangmasuk.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Ya, Hapus
                                                </button>

                                            </form>
                                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection