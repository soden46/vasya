<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $table = "supplier";
    protected $fillable = [
        'Id_Supplier',
        'Nama_Supplier',
    ];
    protected $primaryKey = 'Id_Supplier';
    public $incrementing = false;
    public $timestamps = false;
}
