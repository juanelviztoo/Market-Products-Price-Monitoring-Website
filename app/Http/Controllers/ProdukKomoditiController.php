<?php

namespace App\Http\Controllers;

use App\Models\ProdukKomoditi;
use App\Models\Komoditi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukKomoditiController extends Controller
{
    public function index()
    {
        $produks = ProdukKomoditi::all();
        return view('produk_komoditi.index', compact('produks'));
    }

    public function create()
    {
        $komoditis = Komoditi::all();
        return view('produk_komoditi.create', compact('komoditis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'komoditi_id' => 'required',
            'nama_produk' => 'required',
            'gambar_produk' => 'nullable|image',
        ]);

        if ($request->hasFile('gambar_produk')) {
            $path = $request->file('gambar_produk')->store('public/gambar_produk');
            $gambar_produk = basename($path);
        } else {
            $gambar_produk = null;
        }

        ProdukKomoditi::create([
            'komoditi_id' => $request->komoditi_id,
            'nama_produk' => $request->nama_produk,
            'gambar_produk' => $gambar_produk,
        ]);

        return redirect()->route('produk_komoditi.index')->with('success', 'Produk Komoditi Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukKomoditi $produkKomoditi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukKomoditi $produkKomoditi)
    {
        $komoditis = Komoditi::all();
        return view('produk_komoditi.edit', compact('produkKomoditi', 'komoditis'));
    }

    public function update(Request $request, ProdukKomoditi $produkKomoditi)
    {
        $request->validate([
            'komoditi_id' => 'required',
            'nama_produk' => 'required',
            'gambar_produk' => 'nullable|image',
        ]);

        $data = $request->only(['komoditi_id', 'nama_produk']);
        if ($request->hasFile('gambar_produk')) {
            // Hapus gambar lama jika ada
            if ($produkKomoditi->gambar_produk) {
                Storage::delete('public/gambar_produk/' . $produkKomoditi->gambar_produk);
            }
            $path = $request->file('gambar_produk')->store('public/gambar_produk');
            $data['gambar_produk'] = basename($path);
        }

        $produkKomoditi->update($data);

        return redirect()->route('produk_komoditi.index')->with('success', 'Produk Komoditi Updated Successfully.');
    }

    public function destroy(ProdukKomoditi $produkKomoditi)
    {
        // Delete image if exists
        if ($produkKomoditi->gambar_produk) {
            Storage::delete('public/gambar_produk/' . $produkKomoditi->gambar_produk);
        }

        $produkKomoditi->delete();
        return redirect()->route('produk_komoditi.index')->with('success', 'Produk Komoditi Deleted Successfully.');
    }
}
