<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['poli'] = \App\Models\Poli::latest()->paginate(10);
        return view('poli_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required',
            'biaya' => 'required|numeric',
            'keterangan' => 'nullable',
        ]);
        $poli = new \App\Models\Poli;
        $poli->fill($requestData);
        $poli->save();
        flash('Data berhasil ditambah')->success();
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
        $data['poli'] = \App\Models\Poli::findOrFail($id);
        return view('poli_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|unique:pasiens,no_pasien',
            'biaya' => 'required|numeric',
            'keterangan' => 'nullable',
        ]);
        $poli_id = \App\Models\Poli::findOrFail($id);
        $poli_id->fill($requestData);
        $poli_id->save();
        flash('Data berhasil diubah')->success();
        return redirect('/poli');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poli = \App\Models\Poli::findOrFail($id);
        if ($poli->daftar) {
            flash('Oops.. Data tidak bisa dhapus karena terkait dengan data pendaftaran')->error();
            return back();
        }
        $poli->delete();
        flash('Data berhasil dihapus')->success();
        return back();
    }
}