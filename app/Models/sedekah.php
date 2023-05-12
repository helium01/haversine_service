<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sedekah extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_outlite',
        'harga_koin',
        'nama_barang',
        'deskripsi',
    ];
}
