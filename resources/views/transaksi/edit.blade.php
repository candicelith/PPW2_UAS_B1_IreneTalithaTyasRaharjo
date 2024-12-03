@extends('layouts')

@section('content')
    <h2>Edit Transaksi</h2>
    <div class="card">
        <div class="card-header bg-white">
            <a href="{{ route('transaksi.index') }}" class="btn btn-outline-danger">Kembali</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action={{ route('transaksi.update', $transaksi->id) }}>
                @csrf
                @method('PUT')
                <div class="d-flex flex-column mb-4 gap-4">
                    <div class="form-group">
                        <label>Tanggal Pembelian</label>
                        <input type="date" class="form-control" name="tanggal_pembelian"
                            value="{{ $transaksi->tanggal_pembelian }}" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Total</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" name="total_harga"
                                value="{{ $transaksi->total_harga }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Bayar</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" name="bayar" value="{{ $transaksi->bayar }}"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kembalian</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" name="kembalian" value="{{ $transaksi->kembalian }}"
                                disabled>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>


    {{-- customjs --}}
    <script>
        $(document).ready(function() {
            function calculateKembalian() {
                const total_harga = parseInt($('input[name="total_harga"]').val()) || 0;
                const bayar = parseInt($('input[name="bayar"]').val()) || 0;
                const kembalian = bayar - total_harga;
                $('input[name="kembalian"]').val(kembalian);
            }

            $('input[name="bayar"]').on('', function() {
                calculateKembalian();
            });
        });
    </script>
@endsection
