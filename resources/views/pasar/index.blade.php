@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pasar</h1>
    <a href="{{ route('pasar.create') }}" class="btn btn-primary mb-3">Tambah Pasar</a>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-light" style="text-align: center;">
            <tr>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Kode Kota</th>
                <th>Nama Pasar</th>
                <th>Gambar Pasar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasars as $pasar)
                <tr>
                    <td>{{ $pasar->provinsi }}</td>
                    <td>{{ $pasar->kota }}</td>
                    <td>{{ $pasar->kode_kota }}</td>
                    <td>{{ $pasar->nama_pasar }}</td>
                    <td><img src="{{ asset('storage/gambar_pasar/' . $pasar->gambar_pasar) }}" alt="{{ $pasar->nama_pasar }}" width="100"></td>
                    <td>
                        <a href="{{ route('pasar.edit', $pasar->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pasar.destroy', $pasar->id) }}" method="POST" style="display:inline;">
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