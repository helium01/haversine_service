<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSedekah extends Model
{
    use HasFactory;
    protected $table="request_sedekahs";
    protected $fillable = [
        'id_user',
        'id_sedekah',
        'status',
    ];
}
