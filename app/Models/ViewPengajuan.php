<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewPengajuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'jumlah_pengajuan',
        'bulan_pemasangan',
    ];
    protected $table = 'view_pengajuan';
}
