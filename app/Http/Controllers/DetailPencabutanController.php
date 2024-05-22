<?php

namespace App\Http\Controllers;

use App\Models\Detailpencabutan;
use Illuminate\Http\Request;

class DetailPencabutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailpencabutan = Detailpencabutan::with(['barang'])->get();
        // dd($pencabutan);
        return view('detailpencabutan.index')->with([
            'detailpencabutans' => $detailpencabutan,
        ]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pencabutan' => ['required', 'integer'],
            'id_barang' => ['required', 'integer'],
        ]);

        $data = [
            'id_pencabutan' => $request->input('id_pencabutan'),
            'id_barang' => $request->input('id_barang'),
        ];

        Detailpencabutan::create($data);

        return back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = Detailpencabutan::findOrFail($id);

        $detail->delete();

        return back();
    }
}
