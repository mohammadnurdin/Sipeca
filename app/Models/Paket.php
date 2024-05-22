<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'bandwith',
        'harga',
        'jenis_paket',

    ];

    protected $table = 'paket';

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, "id_paket");
    }
    public function pencabutan()
    {
        return $this->hasMany(Pencabutan::class, "id_paket");
    }

    public function promo()
    {
        return $this->hasMany(Pencabutan::class, "id_paket");
    }
    public function detailpromo()
    {
        return $this->hasMany(Pencabutan::class, "id_paket");
    }

}
