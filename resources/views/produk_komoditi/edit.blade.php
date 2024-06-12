@extends('layouts.app')

@section('content')
<div class="container container-form container-produk">
    <h1>Edit Produk Komoditi</h1>
    <form action="{{ route('produk_komoditi.update', $produkKomoditi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="komoditi_id" class="form-label">Komoditi</label>
            <select class="form-control" id="komoditi_id" name="komoditi_id" required>
                @foreach($komoditis as $komoditi)
                <option value="{{ $komoditi->id }}" {{ $produkKomoditi->komoditi_id == $komoditi->id ? 'selected' : '' }}>{{ $komoditi->jenis_komoditi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $produkKomoditi->nama_produk }}" required>
        </div>
        <div class="mb-3">
            <label for="gambar_produk" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
            @if($produkKomoditi->gambar_produk)
            <img src="{{ asset('storage/gambar_produk/'.$produkKomoditi->gambar_produk) }}" alt="{{ $produkKomoditi->nama_produk }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
