<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('barang.index', [
            "title" => "Barang",
            "dataBarang" => Barang::with(['supplier'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create', [
            "title" => "Barang",
            "dataUser" => User::all()->sortBy(['nama', 'asc'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_supplier' => '',
            'kode' => 'required|unique:barang',
            'nama' => '',
            'keterangan' => ''
        ]);
        
        Barang::create($data);
        
        return redirect('/barang')->with('berhasil', "<strong>Data berhasil ditambahkan!</strong>");
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
        return view('barang.edit', [
            "title" => "Barang",
            "dataBarang" => Barang::where('id', $id)->first(),
            "dataUser" => User::all()->sortBy(['nama', 'asc'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'id_supplier' => '',
            'nama' => '',
            'keterangan' => ''
        ];
        
        $dataBarang = Barang::where('id', $id)->first();
        
        if ($request->kode != $dataBarang->kode) {
            $data['kode'] = 'required|unique:barang';
        }
        
        $validatedData = $request->validate($data);
        Barang::where('id', $id)->first()->update($validatedData);
                
        return redirect('/barang')->with('berhasil', '<strong>Data berhasil diubah!</strong>');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Barang::where('id', $id)->delete();
        
        return redirect('/barang')->with('berhasil', '<strong>Data berhasil dihapus!</strong>');
    }
}
