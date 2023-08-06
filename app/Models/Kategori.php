<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $table = "kategori";
    protected $fillable = [
        'kode_kategori',
        'nama_kategori',
    ];
    protected $primaryKey = 'kode_kategori';
    public $incrementing = false;
    public $timestamps = false;
}
