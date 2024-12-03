@extends('layouts')

@section('content')
    <h2>Data Detail Transaksi</h2>
    <div class="card">
        <div class="card-header bg-white">
            <a href="{{ route('transaksi.index') }}" class="btn btn-outline-danger">Kembali</a>
        </div>
        <div class="card-body">
            @if (Session::has('pesan'))
                <div class="alert alert-success mb-4">
                    {{ Session::get('pesan') }}
                </div>
            @endif
            <ul class="list-group mb-4">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Tanggal Pembelian</h6>
                    {{ \Carbon\Carbon::parse($transaksi->tanggal_pembelian)->format('d F Y') }}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Total</h6>
                    {{ number_format($transaksi->total_harga, 0, '.', '.') }}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Pembayaran</h6>
                    {{ number_format($transaksi->bayar, 0, '.', '.') }}
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Kembalian</h6>
                    {{ number_format($transaksi->kembalian, 0, '.', '.') }}
                </li>
            </ul>
            <table class="table-bordered table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembelian</th>
                        <th>Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th width="1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi->details as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->transaksi->tanggal_pembelian)->format('d/m/Y') }}</td>
                            <td>{{ $data->nama_produk }}</td>
                            <td class="text-end">{{ number_format($data->harga_satuan, 0, '.', '.') }}</td>
                            <td class="text-end">{{ number_format($data->jumlah, 0, '.', '.') }}</td>
                            <td class="text-end">{{ number_format($data->subtotal, 0, '.', '.') }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('transaksidetail.edit', $data->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('transaksidetail.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin mau dihapus?')" type="submit"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5">Total</th>
                        <th class="text-end">{{ number_format($transaksi->details->sum('subtotal'), 0, '.', '.') }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
