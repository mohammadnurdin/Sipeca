<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpromo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengajuan',
        'id_promo',
        
    ];

    protected $table = 'detailpromo';

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, "id_pengajuan", "id_pengajuan");
    }
    public function promo()
    {
        return $this->belongsTo(Promo::class, "id_promo", "id");
    }

}
