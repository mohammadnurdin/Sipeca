<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpencabutan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pencabutan',
        'id_barang',
        
    ];

    protected $table = 'detailpencabutan';

    public function pencabutan()
    {
        return $this->belongsTo(Pencabutan::class, "id_pencabutan", "id_pencabutan");
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, "id_barang", "id");
    }
}
