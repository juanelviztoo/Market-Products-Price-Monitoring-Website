@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Komoditi</h1>
    <a href="{{ route('komoditi.create') }}" class="btn btn-primary mb-3">Tambah Komoditi</a>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-light" style="text-align: center;">
            <tr>
                <th>Nama Kategori</th>
                <th>Jenis Komoditi</th>
                <th>Gambar Komoditi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($komoditis as $komoditi)
                <tr>
                    <td>{{ $komoditi->kategori->nama_kategori }}</td>
                    <td>{{ $komoditi->jenis_komoditi }}</td>
                    <td><img src="{{ asset('storage/gambar_komoditi/' . $komoditi->gambar_komoditi) }}" alt="{{ $komoditi->jenis_komoditi }}" width="100"></td>
                    <td>
                        <a href="{{ route('komoditi.edit', $komoditi->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('komoditi.destroy', $komoditi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection