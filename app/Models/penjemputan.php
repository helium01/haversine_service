<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjemputan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'jumlah_sampah',
        'long',
        'lat',
    ];
}
