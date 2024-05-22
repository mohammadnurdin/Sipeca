<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
        
                'name' => 'Nurdin',
                'jk' => '1',
                'alamat'=>'Tasik',
                'no_telp'=>'086544421',
                'email' => 'nurdin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'A',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            
            );
            
    }
}
