<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promo = Promo::all();
        return view('promo.index')->with([
            'promos' => $promo,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paket = Paket::all();


        return view('promo.create')->with([
            'paket' => $paket,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_paket' => ['required'],
            'diskon' => ['required'],
            'expired' => ['required'],
        ]);

        $data = [
            'id_paket' => $request->input('id_paket'),
            'diskon' => $request->input('diskon'),
            'expired' => $request->input('expired'),
        ];

        // dd($data);
        Promo::create($data);

        // return back();
        return redirect()->route('promo.index');
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
        $promo = Promo::findOrFail($id);
        $paket = Paket::all();
        return view('promo.edit')->with([
            'promo' => $promo,
            'paket' => $paket,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_paket' => ['required'],
            'diskon' => ['required'],
            'expired' => ['required'],
        ]);

        $promo = Promo::findOrFail($id);
        $data = [
            'id_paket' => $request->input('id_paket'),
            'diskon' => $request->input('diskon'),
            'expired' => $request->input('expired'),
        ];

        $promo->update($data);

        // return back();
        return redirect()->route('promo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promo = Promo::findOrFail($id);

        $promo->delete();

        return back();
    }
}
