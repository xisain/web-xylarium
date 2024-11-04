@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tabel Pengovenan</h2>
    <a href="{{ route('pengeringan.create') }}" class="btn btn-primary mb-3">Data Baru</a>
    <a href="{{ route('pengeringan.export') }}"class="btn btn-success mb-3">Unduh Data</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nomor ID</th>
            <th>Nomor Koleksi</th>
            <th>Nama Tanaman</th>
            <th>suku</th>
            <th>Habitus</th>
            <th>lokasi</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Pelaksana</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

            @foreach($pengeringan as $kering)
            <tr>
        <td>{{ $kering->id }}</td>
        <td>{{ $kering->tanaman->no_ketukan }}</td>
        <td>{{ $kering->tanaman->jenis }}</td>
        <td>{{ $kering->tanaman->famili }}</td>
        <td></td>
        <td>{{ $kering->tanaman->lokasi }}</td>

        <td>{{ $kering->tanggal_masuk }}</td>
        <td>{{ $kering->tanggal_keluar }}</td>
        <td>{{ $kering->user->name }}</td>
        <td>
            <form id="delete-form-{{ $kering->id }}" action="{{ route('pengeringan.destroy', $kering->id) }}" method="POST">

                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $kering->id }})">Delete</button>
            </form>
        </td>
    </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
