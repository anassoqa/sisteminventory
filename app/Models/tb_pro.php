<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_pro extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_pro',
        'nama_barang',
        'jumlah_barang',
        'departement',
        'remark',
        'tanggal',
        'status',
        'satuan',
    ];

}
