<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public $table = "owner";
    protected $fillable = [
        'id_owner',
        'username',
        'password',
    ];
    protected $primaryKey = 'id_owner';
    public $timestamps = false;
}
