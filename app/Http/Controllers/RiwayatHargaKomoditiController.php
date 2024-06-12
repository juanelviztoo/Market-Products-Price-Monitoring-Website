<?php

namespace App\Http\Controllers;

use App\Models\RiwayatHargaKomoditi;
use App\Models\Pasar;
use App\Models\Komoditi;
use App\Models\ProdukKomoditi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RiwayatHargaKomoditiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayats = RiwayatHargaKomoditi::all();
        return view('riwayat_harga_komoditi.index', compact('riwayats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasars = Pasar::all();
        $komoditis = Komoditi::all();
        $produkKomoditis = ProdukKomoditi::all();
        return view('riwayat_harga_komoditi.create', compact('pasars', 'komoditis', 'produkKomoditis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pasar_id' => 'required',
            'komoditi_id' => 'required',
            'produk_komoditi_id' => 'nullable',
            'tanggal_update' => 'required|date',
            'harga' => 'required|numeric',
            'status' => 'required',
        ]);

        // // Log the request data
        // Log::info('Request data: ', $request->all());

        // // Log to check if the create method is reached
        // Log::info('Creating RiwayatHargaKomoditi');

        RiwayatHargaKomoditi::create($request->all());

        // // Log to check if the data is successfully created
        // Log::info('RiwayatHargaKomoditi created successfully');

        return redirect()->route('riwayat_harga_komoditi.index')->with('success', 'Riwayat Harga Komoditi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RiwayatHargaKomoditi $riwayatHargaKomoditi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RiwayatHargaKomoditi $riwayatHargaKomoditi)
    {
        $pasars = Pasar::all();
        $komoditis = Komoditi::all();
        $produkKomoditis = ProdukKomoditi::all();
        return view('riwayat_harga_komoditi.edit', compact('riwayatHargaKomoditi', 'pasars', 'komoditis', 'produkKomoditis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RiwayatHargaKomoditi $riwayatHargaKomoditi)
    {
        $request->validate([
            'pasar_id' => 'required',
            'komoditi_id' => 'required',
            'produk_komoditi_id' => 'nullable',
            'tanggal_update' => 'required|date',
            'harga' => 'required|numeric',
            'status' => 'required',
        ]);

        $riwayatHargaKomoditi->update($request->all());

        return redirect()->route('riwayat_harga_komoditi.index')->with('success', 'Riwayat Harga Komoditi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RiwayatHargaKomoditi $riwayatHargaKomoditi)
    {
        $riwayatHargaKomoditi->delete();
        return redirect()->route('riwayat_harga_komoditi.index')->with('success', 'Riwayat Harga Komoditi deleted successfully.');
    }
}
