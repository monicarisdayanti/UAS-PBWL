<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('supplier.index', [
            "title" => "Supplier",
            "dataSupplier" => User::all()->sortBy(['email', 'asc'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create', [
            "title" => "Supplier"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required',
            'nama' => 'required',
            'alamat' => '',
            'hp' => 'required',
            'pos' => 'required',
            'role' => 'required',
            'aktif' => 'required'
        ]);

        $data['password'] = Hash::make($data['password']);
        
        User::create($data);
        
        return redirect('/supplier')->with('berhasil', "<strong>Data berhasil ditambahkan!</strong>");
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
        return view('supplier.edit', [
            "title" => "Supplier",
            "dataSupplier" => User::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'password' => 'required',
            'nama' => 'required',
            'alamat' => '',
            'hp' => 'required',
            'pos' => 'required',
            'role' => 'required',
            'aktif' => 'required'
        ];
        
        $dataSupplier = User::where('id', $id)->first();
        
        if ($request->email != $dataSupplier->email) {
            $data['email'] = 'required|unique:users';
        }
        
        $validatedData = $request->validate($data);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $id)->first()->update($validatedData);
                
        return redirect('/supplier')->with('berhasil', '<strong>Data berhasil diubah!</strong>');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        
        return redirect('/supplier')->with('berhasil', '<strong>Data berhasil dihapus!</strong>');
    }
}
