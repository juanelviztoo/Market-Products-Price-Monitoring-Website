@extends('layouts.app')

@section('content')
<div class="container container-form container-produk">
    <h1>Tambah Produk Komoditi</h1>
    <form action="{{ route('produk_komoditi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="komoditi_id" class="form-label">Komoditi</label>
            <select class="form-control" id="komoditi_id" name="komoditi_id" required>
                @foreach($komoditis as $komoditi)
                <option value="{{ $komoditi->id }}">{{ $komoditi->jenis_komoditi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>
        <div class="mb-3">
            <label for="gambar_produk" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
        </div>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
    </form>
</div>
@endsection
