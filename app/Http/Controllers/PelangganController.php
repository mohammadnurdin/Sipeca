<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index')->with([
            'pelanggans' => $pelanggan
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:255'],
            'alamat' => ['required'],
            'kode_pos' => ['required'],
            'no_telp' => ['required'],
        ]);

        $data = [
            'nama_pelanggan' => $request->input('nama_pelanggan'),
            'alamat' => $request->input('alamat'),           
            'kode_pos' => $request->input('kode_pos'),
            'no_telp' => $request->input('no_telp'),

        ];

        Pelanggan::create($data);

        // return back();    
        return redirect()->route('pelanggan.index');

    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit')->with([
            'pelanggan' => $pelanggan
        ]);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:255'],
            'alamat' => ['required'],
            'kode_pos' => ['required'],
            'no_telp' => ['required'],
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $data = [
            'nama_pelanggan' => $request->input('nama_pelanggan'),
            'alamat' => $request->input('alamat'),           
            'kode_pos' => $request->input('kode_pos'),
            'no_telp' => $request->input('no_telp'),
        ];

        $pelanggan->update($data);

        // return back();
        return redirect()->route('pelanggan.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->delete();

        return back();     }
}
