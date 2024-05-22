<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_paket',
        'diskon',
        'expired',
        
    ];

    protected $table = 'promo';


    public function detailpromo()
    {
        return $this->hasMany(Detailpromo::class, "id_promo");
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, "id_paket","id");
    }  
}
