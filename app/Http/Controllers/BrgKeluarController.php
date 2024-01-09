<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrgKeluar;
use App\Models\Barang;

class BrgKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('brg-keluar.index', [
            "title" => "Barang Keluar",
            "dataBrgKeluar" => BrgKeluar::with(['barang'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brg-keluar.create', [
            "title" => "Barang Keluar",
            "dataBarang" => Barang::all()->sortBy(['nama', 'asc'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required',
            'keterangan' => ''
        ]);
        
        BrgKeluar::create($data);
        
        return redirect('/barang-keluar')->with('berhasil', "<strong>Data berhasil ditambahkan!</strong>");
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
        return view('brg-keluar.edit', [
            "title" => "Barang Keluar",
            "dataBrgKeluar" => BrgKeluar::where('id', $id)->first(),
            "dataBarang" => Barang::all()->sortBy(['nama', 'asc'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required',
            'keterangan' => ''
        ]);

        BrgKeluar::where('id', $id)->first()->update($validatedData);
                
        return redirect('/barang-keluar')->with('berhasil', '<strong>Data berhasil diubah!</strong>');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BrgKeluar::where('id', $id)->delete();
        
        return redirect('/barang-keluar')->with('berhasil', '<strong>Data berhasil dihapus!</strong>');
    }
}
