<?php

namespace App\Http\Controllers;

use App\Models\Pasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasars = Pasar::all();
        return view('pasar.index', compact('pasars'));
    }

    public function create()
    {
        return view('pasar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_kota' => 'required|alpha_num|between:2,4',
            'nama_pasar' => 'required',
            'gambar_pasar' => 'required|image',
        ]);

        $path = $request->file('gambar_pasar')->store('public/gambar_pasar');

        Pasar::create([
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kode_kota' => $request->kode_kota,
            'nama_pasar' => $request->nama_pasar,
            'gambar_pasar' => basename($path),
        ]);

        return redirect()->route('pasar.index')->with('success', 'Pasar Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasar $pasar)
    {
        return view('pasar.show', compact('pasar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasar $pasar)
    {
        return view('pasar.edit', compact('pasar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasar $pasar)
    {
        $request->validate([
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_kota' => 'required|alpha_num|between:2,4',
            'nama_pasar' => 'required',
            'gambar_pasar' => 'image',
        ]);

        $data = $request->only(['provinsi', 'kota', 'kode_kota', 'nama_pasar']);
        if ($request->hasFile('gambar_pasar')) {
            // Hapus gambar lama jika ada
            if ($pasar->gambar_pasar) {
                Storage::delete('public/gambar_pasar/' . $pasar->gambar_pasar);
            }
            $path = $request->file('gambar_pasar')->store('public/gambar_pasar');
            $data['gambar_pasar'] = basename($path);
        }

        $pasar->update($data);

        return redirect()->route('pasar.index')->with('success', 'Pasar Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasar $pasar)
    {
        // Delete image if exists
        if ($pasar->gambar_pasar) {
            Storage::delete('public/gambar_pasar/' . $pasar->gambar_pasar);
        }

        $pasar->delete();
        return redirect()->route('pasar.index')->with('success', 'Pasar Deleted Successfully.');
    }
}
