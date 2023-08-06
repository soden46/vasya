<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarang extends Model
{
    public $table = "detail_barang";
    protected $fillable = [
        'kode_detail_barang',
        'kode_barang',
        'size',
        'Qty',
    ];
    protected $primaryKey = 'kode_detail_barang';
    public $incrementing = false;
    public $timestamps = false;
}
