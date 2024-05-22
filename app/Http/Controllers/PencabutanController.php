<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detailpencabutan;
use App\Models\Detailpengajuan;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Pencabutan;
use App\Models\Pengajuan;
use App\Models\User;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;

class PencabutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pencabutan = Pencabutan::with(['user','pelanggan','pengajuan'])->get();
        // dd($pencabutan);
        return view('pencabutan.index')->with([
            'pencabutans' => $pencabutan
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan=Pelanggan::all();
        $users=User::all();
        $pengajuan=Pengajuan::all();
        $paket=Paket::all();

        // dd($pengajuan);

        return view('pencabutan.create')->with([
            'pelanggan' => $pelanggan,
            'users' => $users,
            'paket'=> $paket,
            'pengajuan'=> $pengajuan,

        ]);       
        return redirect()->route('pencabutan.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pengajuan' => ['required', 'integer'],
            'id_pelanggan' => ['required', 'integer'],
            'id_paket' => ['required', 'integer'],
            'tgl_pencabutan' => ['required','date'],
            'id_pegawai' => ['required','integer'],
            'alasan'=> ['required'],
            'status'=> ['required'],
            
        ]);
       
        $data = [
            'id_pengajuan' => $request->input('id_pengajuan'),
            'id_pelanggan' => $request->input('id_pelanggan'),
            'id_paket' => $request->input('id_paket'),
            'tgl_pencabutan' => $request->input('tgl_pencabutan'),
            'id_pegawai' => $request->input('id_pegawai'),
            'alasan' => $request->input('alasan'),
            'status' => $request->input('status'),


        ];

        Pencabutan::create($data);

        // return back();
        return redirect()->route('pencabutan.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pencabutan = Pencabutan::findOrFail($id);
        $users=User::all();
        $barang=Barang::all();
        $paket=Paket::all();
        $detail=Detailpencabutan::where('id_pencabutan',$id)->get();
                // dd($pencabutan);

        return view('pencabutan.show')->with([
            'pencabutan' => $pencabutan,
            'users' => $users,
            'barang'=> $barang,
            'detail'=> $detail,
            'paket'=> $paket,


        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pencabutan = Pencabutan::findOrFail($id);
        $users=User::all();
        $paket=Paket::all();

        return view('pencabutan.edit')->with([
            'pencabutan' => $pencabutan,
            'users' => $users,
            'paket'=> $paket,


        ]); 
        return redirect()->route('pencabutan.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_pengajuan' => ['required'],
            'id_pelanggan' => ['required'],
            'id_paket' => ['required'],
            'tgl_pencabutan' => ['required'],
            'id_pegawai' => ['required'],
            'alasan'=> ['required'],
            'status'=> ['required'],
            
        ]);
       
      

        $pencabutan = Pencabutan::findOrFail($id);
        $data = [
            'id_pengajuan' => $request->input('id_pengajuan'),
            'id_pelanggan' => $request->input('id_pelanggan'),
            'id_paket' => $request->input('id_paket'),
            'tgl_pencabutan' => $request->input('tgl_pencabutan'),
            'id_pegawai' => $request->input('id_pegawai'),
            'alasan' => $request->input('alasan'),
            'status' => $request->input('status'),


        ];

// dd($data);
        $pencabutan->update($data);

        // return back();
        return redirect()->route('pencabutan.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pencabutan = Pencabutan::findOrFail($id);

        // $pengajuan = Pengajuan::findOrFail($pencabutan->id_pengajuan);
        
        $pencabutan->delete();
        
        // $pengajuan->delete();
        

        return back();   
    }
}
