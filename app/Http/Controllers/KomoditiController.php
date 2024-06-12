<?php

namespace App\Http\Controllers;

use App\Models\Komoditi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KomoditiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komoditis = Komoditi::all();
        return view('komoditi.index', compact('komoditis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('komoditi.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'jenis_komoditi' => 'required',
            'gambar_komoditi' => 'required|image',
        ]);

        $path = $request->file('gambar_komoditi')->store('public/gambar_komoditi');

        Komoditi::create([
            'kategori_id' => $request->kategori_id,
            'jenis_komoditi' => $request->jenis_komoditi,
            'gambar_komoditi' => basename($path),
        ]);

        return redirect()->route('komoditi.index')->with('success', 'Komoditi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Komoditi $komoditi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komoditi $komoditi)
    {
        $kategoris = Kategori::all();
        return view('komoditi.edit', compact('komoditi', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komoditi $komoditi)
    {
        $request->validate([
            'kategori_id' => 'required',
            'jenis_komoditi' => 'required',
            'gambar_komoditi' => 'image',
        ]);

        $data = $request->only(['kategori_id', 'jenis_komoditi']);
        if ($request->hasFile('gambar_komoditi')) {
            // Hapus gambar lama jika ada
            if ($komoditi->gambar_komoditi) {
                Storage::delete('public/gambar_komoditi/' . $komoditi->gambar_komoditi);
            }
            $path = $request->file('gambar_komoditi')->store('public/gambar_komoditi');
            $data['gambar_komoditi'] = basename($path);
        }

        $komoditi->update($data);

        return redirect()->route('komoditi.index')->with('success', 'Komoditi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komoditi $komoditi)
    {
        // Delete image if exists
        if ($komoditi->gambar_komoditi) {
            Storage::delete('public/gambar_komoditi/' . $komoditi->gambar_komoditi);
        }

        $komoditi->delete();
        return redirect()->route('komoditi.index')->with('success', 'Komoditi deleted successfully.');
    }
}
