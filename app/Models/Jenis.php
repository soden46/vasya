<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    public $table = "jenis";
    protected $fillable = [
        'kode_jenis',
        'nama_jenis',
        'kode_kategori',
    ];
    protected $primaryKey = 'kode_jenis';
    public $incrementing = false;
    public $timestamps = false;
}
