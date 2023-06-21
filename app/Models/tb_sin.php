<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_sin extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_sin',
        'id_barang',
        'jumlah',
        'tanggal_sin',
    ];
}
