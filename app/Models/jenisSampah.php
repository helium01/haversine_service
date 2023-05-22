<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisSampah extends Model
{
    use HasFactory;

    protected $fillable = ['jenis_sampah', 'deskripsi', 'harga'];
}
