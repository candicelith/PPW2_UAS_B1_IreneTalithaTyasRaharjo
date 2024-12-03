@extends('layouts')

@section('content')
    <h2>Edit Detail Transaksi</h2>
    <div class="card">
        <div class="card-header bg-white">
            <a href="{{ route('transaksidetail.detail', $transaksidetail->id_transaksi) }}"
                class="btn btn-outline-danger">Kembali</a>
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
            <form method="POST" action={{ route('transaksidetail.update', $transaksidetail->id) }}>
                @csrf
                @method('PUT')
                <div class="d-flex flex-column mb-4 gap-4">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk"
                            value="{{ $transaksidetail->nama_produk }}" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Satuan</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" name="harga_satuan"
                                value="{{ $transaksidetail->harga_satuan }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" name="jumlah" value="{{ $transaksidetail->jumlah }}"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subtotal</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" name="subtotal"
                                value="{{ $transaksidetail->subtotal }}" disabled>
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
            function calculateSubtotal() {
                const hargaSatuan = parseInt($('input[name="harga_satuan"]').val()) || 0;
                const jumlah = parseInt($('input[name="jumlah"]').val()) || 0;
                const subtotal = hargaSatuan * jumlah;
                $('input[name="subtotal"]').val(subtotal);
            }

            $('input[name="harga_satuan"], input[name="jumlah"]').on('', function() {
                calculateSubtotal();
            });
        });
    </script>
@endsection
