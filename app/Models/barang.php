<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = "barang";
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kode_jenis',
        'satuan',
    ];
    protected $primaryKey = 'kode_barang';
    public $incrementing = false;
    public $timestamps = false;
}
