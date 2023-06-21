<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_po extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_po',
        'id_pro',
        'nomor_po',
        'nama_barang',
        'jumlah_barang',
        'satuan',
        'harga',
        'tanggal',
        'nama_supplier',
        'status',
    ];
}
