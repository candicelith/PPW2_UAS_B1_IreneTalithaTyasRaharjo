@extends('layouts')

@section('content')
    <h2>Data Transaksi</h2>
    <div class="card">
        <div class="card-header bg-white">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-danger">Kembali</a>
        </div>
        <div class="card-body">
            @if (Session::has('pesan'))
                <div class="alert alert-success mb-4">
                    {{ Session::get('pesan') }}
                </div>
            @endif
            <table class="table-bordered datatable table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembelian</th>
                        <th>Harga Total</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
                        <th width="1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal_)->format('d/m/Y') }}</td>
                            <td class="text-end">{{ number_format($data->harga_total, 0, '.', '.') }}</td>
                            <td class="text-end">{{ number_format($data->bayar, 0, '.', '.') }}</td>
                            <td class="text-end">{{ number_format($data->kembalian, 0, '.', '.') }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('transaksi.edit', $data->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('transaksi.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin mau dihapus?')" type="submit"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                    <a href="{{ route('transaksidetail.detail', $data->id) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
