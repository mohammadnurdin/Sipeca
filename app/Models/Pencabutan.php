<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencabutan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengajuan',
        'id_pelanggan',
        'id_paket',

        'tgl_pencabutan',
        'id_pegawai',
        'alasan',
        'status',
    ];

    protected $table = 'pencabutan';


    public function user()
    {
        return $this->belongsTo(User::class, "id_pegawai", "id");
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, "id_pelanggan","id");
    }
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, "id_pengajuan","id");
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class, "id_paket","id");
    }  
}
