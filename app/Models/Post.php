<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nomor_pro',
        'nama_barang',
        'jumlah_barang',
        'departement',
        'remark',
        'tanggal',
        'status',
    ];
}