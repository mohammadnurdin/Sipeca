<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pelangganseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelanggan')->insert(
            [
        
                'nama_pelanggan' => 'Al',
                'alamat'=>'Tasik',
                'no_telp'=>'0987736232',
                'kode_pos'=>'464352',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            );    }
}
