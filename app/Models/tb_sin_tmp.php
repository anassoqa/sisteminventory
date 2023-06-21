<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_sin_tmp extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_sin',
        'id_barang',
        'jumlah_sin',
        'tanggal_sin',
    ];
}
