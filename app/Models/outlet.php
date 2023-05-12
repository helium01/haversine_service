<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class outlet extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'nama_outlite',
        'kodepos',
        'alamat',
        'long',
        'lat',
    ];
    public function distance($lat, $lng)
    {
        $earthRadius = 6371; // radius bumi dalam km
        $dLat = deg2rad($this->lat - $lat);
        $dLng = deg2rad($this->long - $lng);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat)) * cos(deg2rad($this->lat)) * sin($dLng / 2) * sin($dLng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;
        return $distance; // jarak dalam km
    }
}
