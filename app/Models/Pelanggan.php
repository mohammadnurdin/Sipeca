<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'kode_pos',
        'no_telp',
    ];

    protected $table = 'pelanggan';

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, "id_pelanggan");
    }
    public function pencabutan()
    {
        return $this->hasMany(Pencabutan::class, "id_pelanggan");
    }
}
