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
                            <!-- <form action="{{ route('uangkeluar.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️</button>
                                    </form> -->
                            <!-- Button trigger modal -->
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

                                            <!-- TOMBOL HAPUS (FORM DI DALAM MODAL) -->
                                            <form action="{{ route('uangkeluar.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Ya, Hapus
                                                </button>
                                            </form>
                                            <!-- </form> -->

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection