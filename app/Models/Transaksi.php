<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'tanggal_pembelian',
        'total_harga',
        'bayar',
        'kembalian',
    ];

    public function transaksidetail()
    {
        return $this->hasMany(TransaksiDetail::class, 'id_transaksi', 'id');
    }
}
