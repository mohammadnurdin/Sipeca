<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detailpengajuan;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use DataTables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        $data = [];
        foreach ($barang as $no => $brg) {
            $detailpengajuan = Detailpengajuan::where('id_barang', $brg->id)->get();
            $qty = 0;
            foreach ($detailpengajuan as $no => $detail) {
                $qty += $detail->qty;
            }
            array_push($data, [
                "id" => $brg->id,
                "nama_barang" => $brg->nama_barang,
                "qty" => $brg->qty - $qty,
                "satuan" => $brg->satuan,
                "status" => $brg->status
            ]);
        }
        // dd($data);
        return view('barang.index')->with([
            'data' => $data


        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => ['required', 'string', 'max:255'],
            'qty' => ['required'],
            'satuan' => ['required'],
            'status' => ['required'],
        ]);

        $data = [
            'nama_barang' => $request->input('nama_barang'),
            'qty' => $request->input('qty'),
            'satuan' => $request->input('satuan'),
            'status' => $request->input('status')
        ];

        // dd($data);
        Barang::create($data);

        // return back();
        return redirect()->route('barang.index');
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
        $barang = Barang::findOrFail($id);
        $detailpengajuan = Detailpengajuan::where('id_barang',$id)->get();
        $qty = 0;
        foreach ($detailpengajuan as $no => $detail) {
            $qty += $detail->qty;
    
        }

        // dd($qty);
        return view('barang.edit')->with([
            'barang' => $barang,
            'qty'=> $qty


        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang' => ['required', 'string', 'max:255'],
            'qty' => ['required'],
            'satuan' => ['required'],
            'status' => ['required'],
        ]);

        $barang = Barang::findOrFail($id);
        $data = [
            'nama_barang' => $request->input('nama_barang'),
            'qty' => $request->input('qty'),
            'satuan' => $request->input('satuan'),
            'status' => $request->input('status')
        ];

        $barang->update($data);

        // return back();
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return back();    
    }


}
