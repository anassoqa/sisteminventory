<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_grn extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_barang',
        'jumlah',
        'harga',
        'tanggal_grn',
    ];
}
