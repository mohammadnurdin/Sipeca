<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pelanggan',
        'id_paket',
        'tgl_pemasangan',
        'id_pegawai',
        'no_telp',
        'status',
    ];

    protected $table = 'pengajuan';

    public function pencabutan()
    {
        return $this->hasMany(Pencabutan::class, "id_pengajuan");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "id_pegawai", "id");
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, "id_pelanggan","id");
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, "id_paket","id");
    }  


}

