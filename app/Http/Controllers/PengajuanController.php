<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detailpengajuan;
use App\Models\Detailpromo;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Pencabutan;
use App\Models\Pengajuan;
use App\Models\Promo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = Pengajuan::with(['user', 'pelanggan'])->get();
        // dd($pengajuan);
        return view('pengajuan.index')->with([
            'pengajuans' => $pengajuan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $users = User::all();
        $paket = Paket::all();

        return view('pengajuan.create')->with([
            'pelanggan' => $pelanggan,
            'users' => $users,
            'paket' => $paket,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => ['required', 'integer'],
            'id_paket' => ['required'],
            'tgl_pemasangan' => ['required', 'date'],
            'id_pegawai' => ['required', 'integer'],
            'status' => ['required', 'integer'],
        ]);

        $data = [
            'id_pelanggan' => $request->input('id_pelanggan'),
            'id_paket' => $request->input('id_paket'),
            'tgl_pemasangan' => $request->input('tgl_pemasangan'),
            'id_pegawai' => $request->input('id_pegawai'),
            'status' => $request->input('status'),
        ];

        $pengajuan=Pengajuan::create($data);


        $tgl_pemasangan = Carbon::createFromFormat('Y-m-d', $request->input('tgl_pemasangan'));

        $bulan = str_pad($tgl_pemasangan->month, 2, "0", STR_PAD_LEFT);
        $tahun = $tgl_pemasangan->year;
        // dd($bulan);
        $promoquery = Promo::query();
        $promoquery->where('id_paket', $request->input('id_paket'));
        $promoquery->whereYear('expired', $tahun);
        $promoquery->whereMonth('expired', $bulan);
        $promo = $promoquery->first();

        if($promo){
            Detailpromo::create([
                'id_pengajuan'=> $pengajuan->id,
                'id_promo'=> $promo->id,
            ]);
        }
        // dd($promo);

        // $date = Carbon::now()->format('Y-m');
        // echo $date;

        // Pengajuan::create($data);

        // return back();
        return redirect()->route('pengajuan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $users = User::all();
        $barang = Barang::all();
        $detail = Detailpengajuan::where('id_pengajuan', $id)->get();
        $detailpromo = Detailpromo::with('promo')->where('id_pengajuan',$id)->first();
        // dd($promo);
        return view('pengajuan.show')->with([
            'pengajuan' => $pengajuan,
            'users' => $users,
            'barang' => $barang,
            'detail' => $detail,
            'detailpromo'=> $detailpromo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $users = User::all();
        $pelanggan = Pelanggan::all();
        $paket = Paket::all();

        return view('pengajuan.edit')->with([
            'pengajuan' => $pengajuan,
            'users' => $users,
            'pelanggan' => $pelanggan,
            'paket' => $paket,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_pelanggan' => ['required', 'integer'],
            'id_paket' => ['required'],
            'tgl_pemasangan' => ['required', 'date'],
            'id_pegawai' => ['required', 'integer'],
        ]);

        $pengajuan = Pengajuan::findOrFail($id);

        if (Auth::user()->role == 'A' || Auth::user()->role == 'C') {
            $data = [
                'id_pelanggan' => $request->input('id_pelanggan'),
                'id_paket' => $request->input('id_paket'),
                'tgl_pemasangan' => $request->input('tgl_pemasangan'),
                'id_pegawai' => $request->input('id_pegawai'),
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'id_pelanggan' => $request->input('id_pelanggan'),
                'id_paket' => $request->input('id_paket'),
                'tgl_pemasangan' => $request->input('tgl_pemasangan'),
                'id_pegawai' => $request->input('id_pegawai'),
            ];
        }

        $pengajuan->update($data);

        return redirect()->route('pengajuan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pencabutan = Pencabutan::where('id_pengajuan', $id);

        $pengajuan->delete();
        $pencabutan->delete();

        return back();
    }
}
