<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestPenjemputan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jenis_sampah',
        'id_user',
        'id_outlite',
        'tanggal_penjemputan',
        'alamat',
        'catatan',
        'status',
    ];

    public function jenisSampah()
    {
        return $this->belongsTo(JenisSampah::class, 'id_jenis_sampah');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
