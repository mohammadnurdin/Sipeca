<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = Paket::all();
        return view('paket.index')->with([
            'pakets' => $paket
        ]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => ['required'],
            'bandwith' => ['required'],
            'harga' => ['required'],
            'jenis_paket' => ['required'],
        ]);

        $data = [
            'nama_paket' => $request->input('nama_paket'),
            'bandwith' => $request->input('bandwith'),
            'harga' => $request->input('harga'),
            'jenis_paket' => $request->input('jenis_paket')

        ];

        Paket::create($data);

        // return back();
        return redirect()->route('paket.index');    }

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
        $paket = Paket::findOrFail($id);
        return view('paket.edit')->with([
            'paket' => $paket
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_paket' => ['required'],
            'bandwith' => ['required'],
            'harga' => ['required'],
            'jenis_paket' => ['required'],
        ]);

        $paket = Paket::findOrFail($id);
        $data = [
            'nama_paket' => $request->input('nama_paket'),
            'bandwith' => $request->input('bandwith'),
            'harga' => $request->input('harga'),
            'jenis_paket' => $request->input('jenis_paket')
        ];

        $paket->update($data);

        // return back();
        return redirect()->route('paket.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = Paket::findOrFail($id);

        $paket->delete();

        return back();    
    }
}
