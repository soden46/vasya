<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    public $table = "transaksi_pembelian";
    protected $fillable = [
        'id_transaksi_pembelian',
        'kode_barang',
        'nama_barang',
        'jumlah',
        'harga',
    ];
    protected $primaryKey = 'id_transaksi_pembelian';
    public $incrementing = false;
    public $timestamps = false;
}
