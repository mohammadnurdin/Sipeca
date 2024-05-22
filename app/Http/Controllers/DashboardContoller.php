<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Pengajuan;
use App\Models\Promo;
use App\Models\ViewPencabutan;
use App\Models\ViewPengajuan;
use Illuminate\Http\Request;

class DashboardContoller extends Controller
{
    public function index(){
        $jml_brg = Barang::count();
        $jml_paket = Paket::count();
        $jml_pelanggan = Pelanggan::count();
        $jml_pengajuan = Pengajuan::count();
        
        return view('dashboard')->with([
            'jml_brg'=> $jml_brg,
            'jml_paket'=>$jml_paket,
            'jml_pelanggan'=>$jml_pelanggan,
            'jml_pengajuan'=>$jml_pengajuan
        ]);
    }



    public function pengajuan(){
        $jml_peng = ViewPengajuan::all();
        return response()->json($jml_peng);
    }
    public function pencabutan(){
        $jml_pen = ViewPencabutan::all();
        return response()->json($jml_pen);
    }
}
