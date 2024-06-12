@extends('layouts.app')

@section('content')
<div class="container container-form container-komoditi">
    <h1>Tambah Komoditi</h1>
    <form action="{{ route('komoditi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select class="form-control" id="kategori_id" name="kategori_id">
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jenis_komoditi" class="form-label">Jenis Komoditi</label>
            <input type="text" class="form-control" id="jenis_komoditi" name="jenis_komoditi" required>
        </div>
        <div class="mb-3">
            <label for="gambar_komoditi" class="form-label">Gambar Komoditi</label>
            <input type="file" class="form-control" id="gambar_komoditi" name="gambar_komoditi" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection