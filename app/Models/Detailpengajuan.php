<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpengajuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengajuan',
        'id_barang',
        'qty'
        
    ];

    protected $table = 'detailpengajuan';

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, "id_pengajuan", "id_pengajuan");
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, "id_barang", "id");
    }
}
