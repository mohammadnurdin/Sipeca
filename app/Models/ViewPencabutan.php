<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewPencabutan extends Model
{
    use HasFactory;
    protected $fillable = [
        'jumlah_pencabutan',
        'bulan_pencabutan',
    ];
    protected $table = 'view_pencabutan';
}
