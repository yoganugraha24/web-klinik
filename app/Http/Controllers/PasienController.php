<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::latest()->paginate(10);
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required|unique:pasiens,no_pasien',
            'no_pasien' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'nullable',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $pasien = new \App\Models\Pasien;
        $pasien->fill($requestData);
        $pasien->foto  = $request->file('foto')->store('public');
        $pasien->save();
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
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        return view('pasien_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|unique:pasiens,no_pasien',
            'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id,
            'umur' => 'required|numeric',
            'alamat' => 'nullable',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->fill($requestData);
        if ($request->hasFile('foto')); {
            Storage::delete($pasien->foto);
            $pasien->foto  = $request->file('foto')->store('public');
        }
        $pasien->save();
        flash('Data berhasil diubah')->success();
        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);

        if ($pasien->daftar->count() >= 1) {
            flash('Oops.. Data tidak bisa dhapus karena terkait dengan data pendaftaran')->error();
            return back();
        }

        if ($pasien->foto != null && Storage::exists($pasien->foto)) {
            Storage::delete($pasien->foto);
        }
        $pasien->delete();
        flash('Data berhasil dihapus')->success();
        return back();
    }
}
