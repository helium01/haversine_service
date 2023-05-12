<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSampah extends Model
{
    use HasFactory;
    protected $table="request_sampahs";
    protected $fillable = [
        'id_user',
        'jumlah_sampah',
        'status',
    ];
}
