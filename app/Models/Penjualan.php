<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    public $table = "transaksi_penjualan";
    protected $fillable = [
        'id_transaksi_penjualan',
        'kode_barang',
        'nama_barang',
        'tanggal',
        'harga',
        'Qty',
    ];
    protected $primaryKey = 'id_transaksi_penjualan';
    public $incrementing = false;
    public $timestamps = false;
}
