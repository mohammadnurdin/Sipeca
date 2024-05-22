<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'qty',
        'satuan',
        'status',
    ];

    protected $table = 'barang';

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, "id_pelanggan");
    }

}
